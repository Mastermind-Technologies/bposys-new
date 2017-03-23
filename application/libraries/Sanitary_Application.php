<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanitary_Application extends Business {

	private $applicationId = null;
	private $referenceNum = null;
	private $userId = null;
    private $businessId = null;
    private $annualEmployeePhysicalExam = null;
    private $typeLevelOfWaterSource = null;
    private $status = null;
    private $applicationDate = null;
    private $applicationType = null;
    private $lineOfBusiness = null;
    private $requirements = null;

    public function __construct($reference_num = null){
      $this->CI =& get_instance();
      $this->CI->load->model('Approval_m');
      $this->CI->load->model('Application_m');
      $this->CI->load->model('Notification_m');
      $this->CI->load->model('Renewal_m');
      $this->CI->load->model('Business_Activity_m');
      $this->CI->load->model('Requirement_m');

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
     return $this->get_application($reference_num);
}

public function get_application($reference_num = null)
{
  $query['referenceNum'] = $reference_num;

  $application = $this->CI->Application_m->get_all_sanitary_applications($query);
  if(count($application) > 0)
  {
      $this->set_application_all($application[0]);
      if($application[0]->businessId != null)
          $this->get_business_information($application[0]->businessId);
  }
  $this->unset_CI();
  return $this;
}

public function change_status($reference_num = null, $status = null)
{
  $this->CI =& get_instance();
  $query = array(
     'referenceNum' => $reference_num,
     'status' => $status,
     );
  $this->CI->Application_m->update_application($query, 'sanitary');
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
    $var->Application_m->update_application($query, 'sanitary');
        // $query = array(
        //     'referenceNum' => $reference_num,
        //     );
        // $var->Approval_m->
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
        'role' => 10,
        'type' => 'Approve',
        );
    $approval = $this->CI->Approval_m->get_latest_approval($query);
                //if this year is greater than application date, expire application
    if(date('Y') > date('Y', strtotime($approval[0]->createdAt)))
    {
        $reference_num = $this->CI->encryption->decrypt($this->referenceNum);
        $this->change_status($reference_num, 'Expired');
        $this->status = 'Expired';
    }
}
$this->unset_CI();
}

public function set_application_all($param = null)
{
    $line_of_business = $this->CI->Business_Activity_m->get_all_business_activity_by_reference_num($param->referenceNum);
    if(count($line_of_business) > 0)
        $line_of_business = $line_of_business[0]->lineOfBusiness;
    if(!isset($this->CI))
     $this->CI =& get_instance();

 $submitted = $this->CI->Requirement_m->get_submitted_requirements($param->referenceNum);
 $requirements = $this->CI->Requirement_m->get_requirements(10);

 foreach ($requirements as $key => $req) {
    foreach ($submitted as $key => $submit) {
        if($req->requirementId == $submit->requirementId)
        {
            $req->submitted = 1;
            $req->expirationDate = $submit->expirationDate;
        }
    }
}

$this->applicationId = $this->CI->encryption->encrypt($param->applicationId);
$this->referenceNum = $this->CI->encryption->encrypt($param->referenceNum);
$this->businessId = $this->CI->encryption->encrypt($param->businessId);
$this->userId = $this->CI->encryption->encrypt($param->userId);
$this->annualEmployeePhysicalExam = $param->annualEmployeePhysicalExam;
$this->typeLevelOfWaterSource = $param->typeLevelOfWaterSource;
$this->applicationDate = $param->applicationDate;
$this->status = $param->status;
$this->lineOfBusiness = $line_of_business;
$this->requirements = $requirements;
$this->unset_CI();
return $this;
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

        return $this;
    }

    /**
     * Gets the value of referenceNum.
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

        return $this;
    }

    /**
     * Gets the value of userId.
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

        return $this;
    }

    /**
     * Gets the value of businessId.
     *
     * @return mixed
     */
    public function get_BusinessId()
    {
        return $this->businessId;
    }

    /**
     * Sets the value of businessId.
     *
     * @param mixed $businessId the business id
     *
     * @return self
     */
    public function set_BusinessId($businessId)
    {
        $this->businessId = $businessId;

        return $this;
    }

    /**
     * Gets the value of annualEmployeePhysicalExam.
     *
     * @return mixed
     */
    public function get_AnnualEmployeePhysicalExam()
    {
        return $this->annualEmployeePhysicalExam;
    }

    /**
     * Sets the value of annualEmployeePhysicalExam.
     *
     * @param mixed $annualEmployeePhysicalExam the annual employee physical exam
     *
     * @return self
     */
    public function set_AnnualEmployeePhysicalExam($annualEmployeePhysicalExam)
    {
        $this->annualEmployeePhysicalExam = $annualEmployeePhysicalExam;

        return $this;
    }

    /**
     * Gets the value of typeLevelOfWaterSource.
     *
     * @return mixed
     */
    public function get_TypeLevelOfWaterSource()
    {
        return $this->typeLevelOfWaterSource;
    }

    /**
     * Sets the value of typeLevelOfWaterSource.
     *
     * @param mixed $typeLevelOfWaterSource the type level of water source
     *
     * @return self
     */
    public function set_TypeLevelOfWaterSource($typeLevelOfWaterSource)
    {
        $this->typeLevelOfWaterSource = $typeLevelOfWaterSource;

        return $this;
    }

    /**
     * Gets the value of status.
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
     * Gets the value of applicationDate.
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
    private function set_Requirements($requirements)
    {
        $this->requirements = $requirements;

        return $this;
    }
}//END OF CLASS