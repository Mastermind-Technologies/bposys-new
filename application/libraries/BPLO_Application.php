<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BPLO_Application extends Business {

    private $applicationId = null;
    private $referenceNum = null;
    private $userId = null;
    private $user = null;
    private $taxYear = null;
    private $businessId = null;
    private $applicationDate = null;
    private $modeOfPayment = null;
    private $idPresented = null;
    private $DTISECCDA_RegNum = null;
    private $DTISECCDA_Date = null;
    private $brgyClearanceDateIssued = null;
    private $CTCNum = null;
    private $TIN = null;
    private $entityName = null;
    private $status = null;
    private $businessActivities = null;
    private $lessors = null;
    private $dateStarted = null;
    private $dateIssued = null;
    private $applicationType = null;
    private $assessment = null;
    private $charges = null;
    private $lineOfBusiness = null;
    private $capital = null;
    private $lastEdited = null;
    private $totalAssessment = null;
    private $requirements = null;
    private $quarterPayment = null;
    private $isRecentlyChanged = null;
    private $gross_receipts = null;
    private $approvals = null;
    private $lastUpdate = null;

    public function __construct($reference_num = null){
        $this->CI =& get_instance();
        $this->CI->load->model('Application_m');
        $this->CI->load->model('Approval_m');
        $this->CI->load->model('Business_Activity_m');
        $this->CI->load->model('Lessor_m');
        $this->CI->load->model('Notification_m');
        $this->CI->load->model('Renewal_m');
        $this->CI->load->model('Assessment_m');
        $this->CI->load->model('Requirement_m');
        $this->CI->load->model('Gross_m');
        $this->CI->load->model('Change_m');

        $this->isRecentlyChanged = $this->CI->Change_m->check_recent_change($reference_num);

        $isExisting = $this->CI->Renewal_m->check_application($reference_num);

        if($isExisting)
        {
            $this->applicationType = "Renew";
        }
        else
        {
            $this->applicationType = "New";
        }

        if(isset($reference_num))
        {
            return $this->get_application($reference_num);
        }
    }

    public function get_application($reference_num = null)
    {
        $query['referenceNum'] = $reference_num;

        $application = $this->CI->Application_m->get_all_bplo_applications($query);
        if(count($application) > 0)
        {
            $this->set_application_all($application[0]);
            if($application[0]->businessId != null)
            {
                $this->get_business_information($application[0]->businessId);
            }
        }
        $this->unset_CI();
        return $this;
    }

    public function change_status($referenceNum = null, $status = null)
    {
        $this->CI =& get_instance();
        $query = array(
            'referenceNum' => $referenceNum,
            'status' => $status,
            );
        $this->CI->Application_m->update_application($query, 'bplo');
        $this->status = $status;
        $this->unset_CI();
    }

    public static function update_status($reference_num = null, $status = null)
    {
        $var = get_instance();
        $query = array(
            'referenceNum' => $reference_num,
            'status' => $status,
            );
        $var->Application_m->update_application($query, 'bplo');
        unset($var);
    }


    public function check_expiry()
    {
        if(!isset($this->CI))
            $this->CI =& get_instance();
        //check if status is active
        if($this->status == 'Active')
        {
            $reference_num = $this->CI->encryption->decrypt($this->referenceNum);
            $query = array(
                'referenceNum' => $reference_num,
                'role' => 4,
                'type' => 'Issue',
                );
            $approval = $this->CI->Approval_m->get_latest_approval($query);
            //if this year is greater than application date, expire application
            if(date('Y') > date('Y', strtotime($approval[0]->createdAt)))
            {
                $reference_num = $this->CI->encryption->decrypt($this->referenceNum);
                $this->change_status($reference_num, 'Expired');
                $this->status = 'Expired';
                $query = array(
                    'referenceNum' => $reference_num,
                    'status' => 'Unread',
                    'role' => '3',
                    'notifMessage' => $this->businessName . " application has expired, please check application details for renewal request.",
                    );
                $var = get_instance();
                $var->Notification_m->insert($query);
                unset($var);
            }
        }
        $this->unset_CI();
    }

    public function set_application_all($param = null)
    {
        if(!isset($this->CI))
            $this->CI =& get_instance();

        $this->approvals = $this->CI->Approval_m->get_approvals($param->referenceNum, date($param->taxYear));
        $query['bploId'] = $param->applicationId;
        $lessors = $this->CI->Lessor_m->get_all_lessor($query);
        // echo "<pre>";
        // print_r($lessors);
        // echo "</pre>";
        // exit();
        $business_activities = $this->CI->Business_Activity_m->get_all_business_activity($query);

        $total_capital = 0;
        unset($query);
        foreach ($business_activities as $business_activity)
        {
            if($this->applicationType == "Renew")
            {
                $query['activityId'] = $business_activity->activityId;
                $business_activity->previousGross = $this->CI->Gross_m->get_all($query);
            }
            else
            {
                if($param->status == "For Retirement" || $param->status == "Closed")
                {
                    $query['activityId'] = $business_activity->activityId;
                    $business_activity->previousGross = $this->CI->Gross_m->get_all($query);
                }
            }
            $business_activity->activityId = $this->CI->encryption->encrypt($business_activity->activityId);

            $total_capital += $business_activity->capitalization;
        }

        if(count($business_activities) > 0)
            $lineOfBusiness = $business_activities[0]->lineOfBusiness;

        unset($query);
        $assessment = $this->CI->Assessment_m->get_assessment(['referenceNum' => $param->referenceNum]);

        $quarter_payment[0] = 0;
        $quarter_payment[1] = 0;
        $quarter_payment[2] = 0;
        $quarter_payment[3] = 0;
        if(count($assessment) > 0)
        {
            $charges = $this->CI->Assessment_m->get_charges(['assessmentId' => $assessment[0]->assessmentId]);
            $totalCharges = 0;
            if(count($charges) > 0)
            {
                foreach ($charges as $key => $c) {
                    $totalCharges += (double)$c->due;
                    $totalCharges += (double)$c->surcharge;
                    $totalCharges += (double)$c->interest;

                    switch($c->period)
                    {
                        case "F1": $quarter_payment[0] += $c->due + $c->surcharge + $c->interest;
                        break;
                        case "Q1": $quarter_payment[0] += $c->due + $c->surcharge + $c->interest;
                        break;
                        case "Q2": $quarter_payment[1] += $c->due + $c->surcharge + $c->interest;
                        break;
                        case "Q3": $quarter_payment[2] += $c->due + $c->surcharge + $c->interest;
                        break;
                        case "Q4": $quarter_payment[3] += $c->due + $c->surcharge + $c->interest;
                        break;
                    }
                }
            }
        }


        unset($query);
        foreach ($lessors as $lessor) {
            $lessor->lessorId = $this->CI->encryption->encrypt($lessor->lessorId);

        }

        $this->applicationId = $this->CI->encryption->encrypt($param->applicationId);
        $this->referenceNum = $this->CI->encryption->encrypt($param->referenceNum);
        $this->userId = $this->CI->encryption->encrypt($param->userId);
        $this->businessId = $this->CI->encryption->encrypt($param->businessId);
        $this->taxYear = $param->taxYear;
        $this->applicationDate = $param->applicationDate;
        $this->modeOfPayment = $param->modeOfPayment;
        $this->idPresented = $param->idPresented;
        $this->DTISECCDA_RegNum = $param->DTISECCDA_RegNum;
        $this->DTISECCDA_Date = $param->DTISECCDA_Date;
        $this->brgyClearanceDateIssued = $param->brgyClearanceDateIssued;
        $this->CTCNum = $param->CTCNum;
        $this->TIN = $param->TIN;
        $this->entityName = $param->entityName;
        $this->status = $param->status;
        $this->businessActivities = $business_activities;
        $this->dateStarted = $param->createdAt;
        $this->lastUpdate = $param->updatedAt;
        if(isset($lineOfBusiness))
            $this->lineOfBusiness = $lineOfBusiness;
        $this->capital = $total_capital;
        $this->lastEdited = $param->updatedAt;
        $this->requirements = $this->CI->Requirement_m->get_requirements(4);
        if(isset($quarter_payment))
            $this->quarterPayment = $quarter_payment;
        if(isset($totalCharges))
            $this->totalAssessment = $totalCharges;
        if(count($assessment) > 0)
        {
            $this->assessment = $assessment[0];
            $this->charges = $charges;
        }

        if($lessors != null)
            $this->lessors = $lessors[0];

        $this->unset_CI();

        return $this;

    }

    public static function check_penalties($assessment_id)
    {  
        $var = get_instance();

        $query['assessmentId'] = $assessment_id;
        $query['status'] = 'not paid';
        $charges = $var->Assessment_m->get_charges($query);

        if(count($charges) > 0)
        {
            foreach ($charges as $key => $charge) {
                $surcharge = $charge->surcharge;
                $interest = $charge->interest;
                $current_date = date('M j, Y');
                $month = date('M', strtotime($current_date));

                switch($month)
                {
                    case "Apr":
                    if(strtotime($current_date) >=  strtotime('April 20,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('April 20,'.date('Y')))
                        {
                            if($surcharge == 0)
                                $surcharge += $charge->due*.25;
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                    case "May":
                    if(strtotime($current_date) >=  strtotime('May 1,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('May 1,'.date('Y')))
                        {
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                    case "Jun":
                    if(strtotime($current_date) >=  strtotime('June 1,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('June 1,'.date('Y')))
                        {
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                    case "Jul":
                    if(strtotime($current_date) >=  strtotime('July 20,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('July 20,'.date('Y')))
                        {
                            if($surcharge == 0)
                                $surcharge += $charge->due*.25;
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                    case "Aug":
                    if(strtotime($current_date) >=  strtotime('August 1,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('August 1,'.date('Y')))
                        {
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                    case "Sep":
                    if(strtotime($current_date) >=  strtotime('September 1,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('September 1,'.date('Y')))
                        {
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                    case "Oct":
                    if(strtotime($current_date) >=  strtotime('October 20,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('October 20,'.date('Y')))
                        {
                            if($surcharge == 0)
                                $surcharge += $charge->due*.25;
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                    case "Nov":
                    if(strtotime($current_date) >=  strtotime('November 1,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('November 1,'.date('Y')))
                        {
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                    case "Dec":
                    if(strtotime($current_date) >=  strtotime('December 1,'.date('Y')))
                    {
                        if(strtotime($charge->updatedAt) < strtotime('December 1,'.date('Y')))
                        {
                            $interest += $charge->due*.02;
                        }
                    }
                    break;
                }

                $charge_field = array(
                    'surcharge' => $surcharge,
                    'interest' => $interest,
                    );
                $var->Assessment_m->update_charge($charge->chargeId, $charge_field);
            }
            $var->Assessment_m->refresh_assessment_amount(['assessmentId' => $assessment_id]);
        }
    }


    /**
    * Gets the value of applicationId.
    *
    * @return mixed
    */
    public function get_ApplicationId()
    {
        return $this->applicationId;
    }

    /**
    * Sets the value of applicationId.
    *
    * @param mixed $applicationId the application id
    *
    * @return self
    */
    public function set_ApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
    }

    /**
    * get_s the value of referenceNum.
    *
    * @return mixed
    */
    public function get_ReferenceNum()
    {
        return $this->referenceNum;
    }

    /**
    * Sets the value of referenceNum.
    *
    * @param mixed $referenceNum the reference num
    *
    * @return self
    */
    public function set_ReferenceNum($referenceNum)
    {
        $this->referenceNum = $referenceNum;
    }

    /**
    * get_s the value of userId.
    *
    * @return mixed
    */
    public function get_UserId()
    {
        return $this->userId;
    }

    /**
    * Sets the value of userId.
    *
    * @param mixed $userId the user id
    *
    * @return self
    */
    public function set_UserId($userId)
    {
        $this->userId = $userId;
    }

    /**
    * get_s the value of taxYear.
    *
    * @return mixed
    */
    public function get_TaxYear()
    {
        return $this->taxYear;
    }

    /**
    * Sets the value of taxYear.
    *
    * @param mixed $taxYear the tax year
    *
    * @return self
    */
    public function set_TaxYear($taxYear)
    {
        $this->taxYear = $taxYear;
    }

    /**
    * get_s the value of applicationDate.
    *
    * @return mixed
    */
    public function get_ApplicationDate()
    {
        return $this->applicationDate;
    }

    /**
    * Sets the value of applicationDate.
    *
    * @param mixed $applicationDate the application date
    *
    * @return self
    */
    public function set_ApplicationDate($applicationDate)
    {
        $this->applicationDate = $applicationDate;
    }

    /**
    * get_s the value of DTISECCDA_RegNum.
    *
    * @return mixed
    */
    public function get_DTISECCDARegNum()
    {
        return $this->DTISECCDA_RegNum;
    }

    /**
    * Sets the value of DTISECCDA_RegNum.
    *
    * @param mixed $DTISECCDA_RegNum the reg num
    *
    * @return self
    */
    public function set_DTISECCDARegNum($DTISECCDA_RegNum)
    {
        $this->DTISECCDA_RegNum = $DTISECCDA_RegNum;
    }

    /**
    * get_s the value of DTISECCDA_Date.
    *
    * @return mixed
    */
    public function get_DTISECCDADate()
    {
        return $this->DTISECCDA_Date;
    }

    /**
    * Sets the value of DTISECCDA_Date.
    *
    * @param mixed $DTISECCDA_Date the date
    *
    * @return self
    */
    public function set_DTISECCDADate($DTISECCDA_Date)
    {
        $this->DTISECCDA_Date = $DTISECCDA_Date;
    }

    /**
    * get_s the value of CTCNum.
    *
    * @return mixed
    */
    public function get_CTCNum()
    {
        return $this->CTCNum;
    }

    /**
    * Sets the value of CTCNum.
    *
    * @param mixed $CTCNum the cnum
    *
    * @return self
    */
    public function set_CTCNum($CTCNum)
    {
        $this->CTCNum = $CTCNum;
    }

    /**
    * get_s the value of TIN.
    *
    * @return mixed
    */
    public function get_TIN()
    {
        return $this->TIN;
    }

    /**
    * Sets the value of TIN.
    *
    * @param mixed $TIN the 
    *
    * @return self
    */
    public function set_TIN($TIN)
    {
        $this->TIN = $TIN;
    }

    /**
    * get_s the value of entityName.
    *
    * @return mixed
    */
    public function get_EntityName()
    {
        return $this->entityName;
    }

    /**
    * Sets the value of entityName.
    *
    * @param mixed $entityName the entity name
    *
    * @return self
    */
    public function set_EntityName($entityName)
    {
        $this->entityName = $entityName;
    }

    /**
    * get_s the value of status.
    *
    * @return mixed
    */
    public function get_Status()
    {
        return $this->status;
    }

    /**
    * Sets the value of status.
    *
    * @param mixed $status the status
    *
    * @return self
    */
    public function set_Status($status)
    {
        $this->status = $status;
    }

    /**
    * get_s the value of businessActivities.
    *
    * @return mixed
    */
    public function get_BusinessActivities()
    {
        return $this->businessActivities;
    }

    /**
    * Sets the value of businessActivities.
    *
    * @param mixed $businessActivities the business activities
    *
    * @return self
    */
    public function set_BusinessActivities($businessActivities)
    {
        $this->businessActivities = $businessActivities;
    }

    /**
    * get_s the value of lessors.
    *
    * @return mixed
    */
    public function get_Lessors()
    {
        return $this->lessors;
    }

    /**
    * Sets the value of lessors.
    *
    * @param mixed $lessors the lessors
    *
    * @return self
    */
    public function set_Lessors($lessors)
    {
        $this->lessors = $lessors;
    }

    /**
    * get_s the value of dateStarted.
    *
    * @return mixed
    */
    public function get_DateStarted()
    {
        return $this->dateStarted;
    }

    /**
    * Sets the value of dateStarted.
    *
    * @param mixed $dateStarted the date started
    *
    * @return self
    */
    public function set_DateStarted($dateStarted)
    {
        $this->dateStarted = $dateStarted;
    }
    public function get_BusinessId()
    {
        return $this->businessId;
    }

    /**
    * Sets the value of businessId.
    *
    * @param mixed $businessId the date started
    *
    * @return self
    */
    public function set_BusinessId($businessId)
    {
        $this->businessId = $businessId;
    }
    public function get_BrgyClearanceDateIssued()
    {
        return $this->brgyClearanceDateIssued;
    }

    /**
    * Sets the value of brgyClearanceDateIssued.
    *
    * @param mixed $brgyClearanceDateIssued the date started
    *
    * @return self
    */
    public function set_BrgyClearanceDateIssued($brgyClearanceDateIssued)
    {
        $this->brgyClearanceDateIssued = $brgyClearanceDateIssued;
    }

    /**
    * Gets the value of data_issued.
    *
    * @return mixed
    */
    public function getDataIssued()
    {
        return $this->data_issued;
    }

    /**
    * Sets the value of data_issued.
    *
    * @param mixed $data_issued the data issued
    *
    * @return self
    */
    private function _setDataIssued($data_issued)
    {
        $this->data_issued = $data_issued;

        return $this;
    }

    /**
    * Gets the value of date_issued.
    *
    * @return mixed
    */
    public function get_DateIssued()
    {
        return $this->date_issued;
    }

    /**
    * Sets the value of date_issued.
    *
    * @param mixed $date_issued the date issued
    *
    * @return self
    */
    public function set_DateIssued($date_issued)
    {
        $this->date_issued = $date_issued;

        return $this;
    }

    /**
    * Gets the value of modeOfPayment.
    *
    * @return mixed
    */
    public function get_ModeOfPayment()
    {
        return $this->modeOfPayment;
    }

    /**
    * Sets the value of modeOfPayment.
    *
    * @param mixed $modeOfPayment the mode of payment
    *
    * @return self
    */
    public function set_ModeOfPayment($modeOfPayment)
    {
        $this->modeOfPayment = $modeOfPayment;

        return $this;
    }

    /**
    * Gets the value of idPresented.
    *
    * @return mixed
    */
    public function get_IdPresented()
    {
        return $this->idPresented;
    }

    /**
    * Sets the value of idPresented.
    *
    * @param mixed $idPresented the id presented
    *
    * @return self
    */
    public function set_IdPresented($idPresented)
    {
        $this->idPresented = $idPresented;

        return $this;
    }

    /**
    * Gets the value of applicationType.
    *
    * @return mixed
    */
    public function get_ApplicationType()
    {
        return $this->applicationType;
    }

    /**
    * Sets the value of applicationType.
    *
    * @param mixed $applicationType the application type
    *
    * @return self
    */
    public function set_ApplicationType($applicationType)
    {
        $this->applicationType = $applicationType;

        return $this;
    }

    /**
    * Gets the value of assessment.
    *
    * @return mixed
    */
    public function get_Assessment()
    {
        return $this->assessment;
    }

    /**
    * Sets the value of assessment.
    *
    * @param mixed $assessment the assessment
    *
    * @return self
    */
    public function set_Assessment($assessment)
    {
        $this->assessment = $assessment;

        return $this;
    }

    /**
    * Gets the value of charges.
    *
    * @return mixed
    */
    public function get_Charges()
    {
        return $this->charges;
    }

    /**
    * Sets the value of charges.
    *
    * @param mixed $charges the charges
    *
    * @return self
    */
    public function set_Charges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
    * Gets the value of lineOfBusiness.
    *
    * @return mixed
    */
    public function get_LineOfBusiness()
    {
        return $this->lineOfBusiness;
    }

    /**
    * Sets the value of lineOfBusiness.
    *
    * @param mixed $lineOfBusiness the line of business
    *
    * @return self
    */
    public function set_LineOfBusiness($lineOfBusiness)
    {
        $this->lineOfBusiness = $lineOfBusiness;

        return $this;
    }

    /**
    * Gets the value of capital.
    *
    * @return mixed
    */
    public function get_Capital()
    {
        return $this->capital;
    }

    /**
    * Sets the value of capital.
    *
    * @param mixed $capital the capital
    *
    * @return self
    */
    public function set_Capital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
    * Sets the value of lastEdited.
    *
    * @param mixed $lastEdited the last edited
    *
    * @return self
    */
    private function set_LastEdited($lastEdited)
    {
        $this->lastEdited = $lastEdited;

        return $this;
    }

    /**
    * Gets the value of lastEdited.
    *
    * @return mixed
    */
    public function get_LastEdited()
    {
        return $this->lastEdited;
    }

    /**
    * Gets the value of totalAssessment.
    *
    * @return mixed
    */
    public function get_TotalAssessment()
    {
        return $this->totalAssessment;
    }

    /**
    * Sets the value of totalAssessment.
    *
    * @param mixed $totalAssessment the total assessment
    *
    * @return self
    */
    private function set_TotalAssessment($totalAssessment)
    {
        $this->totalAssessment = $totalAssessment;

        return $this;
    }

    /**
    * Gets the value of requirements.
    *
    * @return mixed
    */
    public function get_Requirements()
    {
        return $this->requirements;
    }

    /**
    * Sets the value of requirements.
    *
    * @param mixed $requirements the requirements
    *
    * @return self
    */
    public function set_Requirements($requirements)
    {
        $this->requirements = $requirements;

        return $this;
    }

    /**
    * Gets the value of quarter_payment.
    *
    * @return mixed
    */
    public function get_QuarterPayment()
    {
        return $this->quarterPayment;
    }

    /**
    * Sets the value of quarter_payment.
    *
    * @param mixed $quarter_payment the quarter payment
    *
    * @return self
    */
    public function set_QuarterPayment($quarterPayment)
    {
        $this->quarterPayment = $quarterPayment;

        return $this;
    }


    /**
     * Gets the value of isRecentlyChanged.
     *
     * @return mixed
     */
    public function get_IsRecentlyChanged()
    {
        return $this->isRecentlyChanged;
    }

    /**
     * Sets the value of isRecentlyChanged.
     *
     * @param mixed $isRecentlyChanged the is recently changed
     *
     * @return self
     */
    public function set_IsRecentlyChanged($isRecentlyChanged)
    {
        $this->isRecentlyChanged = $isRecentlyChanged;

        return $this;
    }

    /**
     * Gets the value of gross_receipts.
     *
     * @return mixed
     */
    public function get_GrossReceipts()
    {
        return $this->gross_receipts;
    }

    /**
     * Sets the value of gross_receipts.
     *
     * @param mixed $gross_receipts the gross receipts
     *
     * @return self
     */
    public function set_GrossReceipts($gross_receipts)
    {
        $this->gross_receipts = $gross_receipts;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function get_User()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function set_User($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of approvals.
     *
     * @return mixed
     */
    public function get_Approvals()
    {
        return $this->approvals;
    }

    /**
     * Sets the value of approvals.
     *
     * @param mixed $approvals the approvals
     *
     * @return self
     */
    public function set_Approvals($approvals)
    {
        $this->approvals = $approvals;

        return $this;
    }

    /**
     * Gets the value of lastUpdate.
     *
     * @return mixed
     */
    public function get_LastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Sets the value of lastUpdate.
     *
     * @param mixed $lastUpdate the last update
     *
     * @return self
     */
    public function set_LastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }
}

