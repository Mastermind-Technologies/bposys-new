<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CENRO_Application extends Business {

	private $applicationId = null;
	private $referenceNum = null;
	private $userId = null;
    private $businessId = null;
    private $CNC = null;
    private $LLDAClearance = null;
    private $dischargePermit = null;
    private $apsci = null;
    private $productsAndByProducts = null;
    private $smokeEmission = null;
    private $volatileCompound = null;
    private $fugitiveParticulates = null;
    private $steamGenerator = null;
    private $APCD = null;
    private $stackHeight = null;
    private $wastewaterTreatmentFacility = null;
    private $wastewaterTreatmentOperationAndProcess = null;
    private $pendingCaseWithLLDA = null;
    private $typeOfSolidWastesGenerated = null;
    private $qtyPerDay = null;
    private $garbageCollectionMethod = null;
    private $frequencyOfGarbageCollection = null;
    private $wasteCollector = null;
    private $collectorAddress = null;
    private $garbageDisposalMethod = null;
    private $wasteMinimizationMethod = null;
    private $drainageSystem = null;
    private $drainageType = null;
    private $drainageDischargeLocation = null;
    private $sewerageSystem = null;
    private $septicTank = null;
    private $sewerageDischargeLocation = null;
    private $waterSupply = null;
    private $status = null;
    private $applicationType = null;
    private $lineOfBusiness = null;
    private $requirements = null;

    public function __construct($reference_num = null)
    {
      $this->CI =& get_instance();
      $this->CI->load->model('Application_m');
      $this->CI->load->model('Notification_m');
      $this->CI->load->model('Renewal_m');
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
  $application = $this->CI->Application_m->get_all_cenro_applications($query);
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
  $this->CI->Application_m->update_application($query, 'cenro');
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
    $var->Application_m->update_application($query, 'cenro');
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
        'role' => 7,
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
  if(!isset($this->CI))
     $this->CI =& get_instance();

 $fugitive_particulates = $param->fugitiveParticulates!=null ? explode('|', $param->fugitiveParticulates) : [];
 $steam_generator = $param->steamGenerator!=null ? explode('|', $param->steamGenerator) : [];
 $waste_minimization = $param->wasteMinimizationMethod!=null ? explode('|', $param->wasteMinimizationMethod) : [];

 $line_of_business = $this->CI->Business_Activity_m->get_all_business_activity_by_reference_num($param->referenceNum);
 if(count($line_of_business) > 0)
 $line_of_business = $line_of_business[0]->lineOfBusiness;

 $this->applicationId = $this->CI->encryption->encrypt($param->applicationId);
 $this->referenceNum = $this->CI->encryption->encrypt($param->referenceNum);
 $this->userId = $this->CI->encryption->encrypt($param->userId);
 $this->businessId = $this->CI->encryption->encrypt($param->businessId);
 $this->CNC = $param->CNC;
 $this->LLDAClearance = $param->LLDAClearance;
 $this->dischargePermit = $param->dischargePermit;
 $this->apsci = $param->apsci;
 $this->productsAndByProducts = $param->productsAndByProducts;
 $this->smokeEmission = $param->smokeEmission;
 $this->volatileCompound = $param->volatileCompound;
        $this->fugitiveParticulates = $fugitive_particulates;//$param->fugitiveParticulates;
        $this->steamGenerator = $steam_generator;//$param->steamGenerator;
        $this->APCD = $param->APCD;
        $this->stackHeight = $param->stackHeight;
        $this->wastewaterTreatmentFacility = $param->wastewaterTreatmentFacility;
        $this->wastewaterTreatmentOperationAndProcess = $param->wastewaterTreatmentOperationAndProcess;
        $this->pendingCaseWithLLDA = $param->pendingCaseWithLLDA;
        $this->typeOfSolidWastesGenerated = $param->typeOfSolidWastesGenerated;
        $this->qtyPerDay = $param->qtyPerDay;
        $this->garbageCollectionMethod = $param->garbageCollectionMethod;
        $this->frequencyOfGarbageCollection = $param->frequencyOfGarbageCollection;
        $this->wasteCollector = $param->wasteCollector;
        $this->collectorAddress = $param->collectorAddress;
        $this->garbageDisposalMethod = $param->garbageDisposalMethod;
        $this->wasteMinimizationMethod = $waste_minimization;//$param->wasteMinimizationMethod;
        $this->drainageSystem = $param->drainageSystem;
        $this->drainageType = $param->drainageType;
        $this->drainageDischargeLocation = $param->drainageDischargeLocation;
        $this->sewerageSystem = $param->sewerageSystem;
        $this->septicTank = $param->septicTank;
        $this->sewerageDischargeLocation = $param->sewerageDischargeLocation;
        $this->waterSupply = $param->waterSupply;
        $this->status = $param->status;
        $this->lineOfBusiness = $line_of_business;
        $this->requirements = $this->CI->Requirement_m->get_requirements(7);


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
     * Gets the value of CNC.
     *
     * @return mixed
     */
    public function get_CNC()
    {
        return $this->CNC;
    }

    /**
     * Sets the value of CNC.
     *
     * @param mixed $CNC the
     *
     * @return self
     */
    public function set_CNC($CNC)
    {
        $this->CNC = $CNC;

        return $this;
    }

    /**
     * Gets the value of LLDAClearance.
     *
     * @return mixed
     */
    public function get_LLDAClearance()
    {
        return $this->LLDAClearance;
    }

    /**
     * Sets the value of LLDAClearance.
     *
     * @param mixed $LLDAClearance the aclearance
     *
     * @return self
     */
    public function set_LLDAClearance($LLDAClearance)
    {
        $this->LLDAClearance = $LLDAClearance;

        return $this;
    }

    /**
     * Gets the value of dischargePermit.
     *
     * @return mixed
     */
    public function get_DischargePermit()
    {
        return $this->dischargePermit;
    }

    /**
     * Sets the value of dischargePermit.
     *
     * @param mixed $dischargePermit the discharge permit
     *
     * @return self
     */
    public function set_DischargePermit($dischargePermit)
    {
        $this->dischargePermit = $dischargePermit;

        return $this;
    }

    /**
     * Gets the value of apsci.
     *
     * @return mixed
     */
    public function get_Apsci()
    {
        return $this->apsci;
    }

    /**
     * Sets the value of apsci.
     *
     * @param mixed $apsci the apsci
     *
     * @return self
     */
    public function set_Apsci($apsci)
    {
        $this->apsci = $apsci;

        return $this;
    }

    /**
     * Gets the value of productsAndByProducts.
     *
     * @return mixed
     */
    public function get_ProductsAndByProducts()
    {
        return $this->productsAndByProducts;
    }

    /**
     * Sets the value of productsAndByProducts.
     *
     * @param mixed $productsAndByProducts the products and by products
     *
     * @return self
     */
    public function set_ProductsAndByProducts($productsAndByProducts)
    {
        $this->productsAndByProducts = $productsAndByProducts;

        return $this;
    }

    /**
     * Gets the value of smokeEmission.
     *
     * @return mixed
     */
    public function get_SmokeEmission()
    {
        return $this->smokeEmission;
    }

    /**
     * Sets the value of smokeEmission.
     *
     * @param mixed $smokeEmission the smoke emission
     *
     * @return self
     */
    public function set_SmokeEmission($smokeEmission)
    {
        $this->smokeEmission = $smokeEmission;

        return $this;
    }

    /**
     * Gets the value of volatileCompound.
     *
     * @return mixed
     */
    public function get_VolatileCompound()
    {
        return $this->volatileCompound;
    }

    /**
     * Sets the value of volatileCompound.
     *
     * @param mixed $volatileCompound the volatile compound
     *
     * @return self
     */
    public function set_VolatileCompound($volatileCompound)
    {
        $this->volatileCompound = $volatileCompound;

        return $this;
    }

    /**
     * Gets the value of fugitiveParticulates.
     *
     * @return mixed
     */
    public function get_FugitiveParticulates()
    {
        return $this->fugitiveParticulates;
    }

    /**
     * Sets the value of fugitiveParticulates.
     *
     * @param mixed $fugitiveParticulates the fugitive particulates
     *
     * @return self
     */
    public function set_FugitiveParticulates($fugitiveParticulates)
    {
        $this->fugitiveParticulates = $fugitiveParticulates;

        return $this;
    }

    /**
     * Gets the value of steamGenerator.
     *
     * @return mixed
     */
    public function get_SteamGenerator()
    {
        return $this->steamGenerator;
    }

    /**
     * Sets the value of steamGenerator.
     *
     * @param mixed $steamGenerator the steam generator
     *
     * @return self
     */
    public function set_SteamGenerator($steamGenerator)
    {
        $this->steamGenerator = $steamGenerator;

        return $this;
    }

    /**
     * Gets the value of APCD.
     *
     * @return mixed
     */
    public function get_APCD()
    {
        return $this->APCD;
    }

    /**
     * Sets the value of APCD.
     *
     * @param mixed $APCD the
     *
     * @return self
     */
    public function set_APCD($APCD)
    {
        $this->APCD = $APCD;

        return $this;
    }

    /**
     * Gets the value of stackHeight.
     *
     * @return mixed
     */
    public function get_StackHeight()
    {
        return $this->stackHeight;
    }

    /**
     * Sets the value of stackHeight.
     *
     * @param mixed $stackHeight the stack height
     *
     * @return self
     */
    public function set_StackHeight($stackHeight)
    {
        $this->stackHeight = $stackHeight;

        return $this;
    }

    /**
     * Gets the value of wastewaterTreatmentFacility.
     *
     * @return mixed
     */
    public function get_WasteWaterTreatmentFacility()
    {
        return $this->wastewaterTreatmentFacility;
    }

    /**
     * Sets the value of wastewaterTreatmentFacility.
     *
     * @param mixed $wastewaterTreatmentFacility the waste water treatment facility
     *
     * @return self
     */
    public function set_WasteWaterTreatmentFacility($wastewaterTreatmentFacility)
    {
        $this->wastewaterTreatmentFacility = $wastewaterTreatmentFacility;

        return $this;
    }

    /**
     * Gets the value of wastewaterTreatmentOperationAndProcess.
     *
     * @return mixed
     */
    public function get_WasteWaterTreatmentOperationAndProcess()
    {
        return $this->wastewaterTreatmentOperationAndProcess;
    }

    /**
     * Sets the value of wastewaterTreatmentOperationAndProcess.
     *
     * @param mixed $wastewaterTreatmentOperationAndProcess the waste water treatment operation and process
     *
     * @return self
     */
    public function set_WasteWaterTreatmentOperationAndProcess($wastewaterTreatmentOperationAndProcess)
    {
        $this->wastewaterTreatmentOperationAndProcess = $wastewaterTreatmentOperationAndProcess;

        return $this;
    }

    /**
     * Gets the value of pendingCaseWithLLDA.
     *
     * @return mixed
     */
    public function get_PendingCaseWithLLDA()
    {
        return $this->pendingCaseWithLLDA;
    }

    /**
     * Sets the value of pendingCaseWithLLDA.
     *
     * @param mixed $pendingCaseWithLLDA the pending case with
     *
     * @return self
     */
    public function set_PendingCaseWithLLDA($pendingCaseWithLLDA)
    {
        $this->pendingCaseWithLLDA = $pendingCaseWithLLDA;

        return $this;
    }

    /**
     * Gets the value of typeOfSolidWastesGenerated.
     *
     * @return mixed
     */
    public function get_TypeOfSolidWastesGenerated()
    {
        return $this->typeOfSolidWastesGenerated;
    }

    /**
     * Sets the value of typeOfSolidWastesGenerated.
     *
     * @param mixed $typeOfSolidWastesGenerated the type of solid wastes generated
     *
     * @return self
     */
    public function set_TypeOfSolidWastesGenerated($typeOfSolidWastesGenerated)
    {
        $this->typeOfSolidWastesGenerated = $typeOfSolidWastesGenerated;

        return $this;
    }

    /**
     * Gets the value of qtyPerDay.
     *
     * @return mixed
     */
    public function get_QtyPerDay()
    {
        return $this->qtyPerDay;
    }

    /**
     * Sets the value of qtyPerDay.
     *
     * @param mixed $qtyPerDay the qty per day
     *
     * @return self
     */
    public function set_QtyPerDay($qtyPerDay)
    {
        $this->qtyPerDay = $qtyPerDay;

        return $this;
    }

    /**
     * Gets the value of garbageCollectionMethod.
     *
     * @return mixed
     */
    public function get_GarbageCollectionMethod()
    {
        return $this->garbageCollectionMethod;
    }

    /**
     * Sets the value of garbageCollectionMethod.
     *
     * @param mixed $garbageCollectionMethod the garbage collection method
     *
     * @return self
     */
    public function set_GarbageCollectionMethod($garbageCollectionMethod)
    {
        $this->garbageCollectionMethod = $garbageCollectionMethod;

        return $this;
    }

    /**
     * Gets the value of frequencyOfGarbageCollection.
     *
     * @return mixed
     */
    public function get_FrequencyOfGarbageCollection()
    {
        return $this->frequencyOfGarbageCollection;
    }

    /**
     * Sets the value of frequencyOfGarbageCollection.
     *
     * @param mixed $frequencyOfGarbageCollection the frequency of garbage collection
     *
     * @return self
     */
    public function set_FrequencyOfGarbageCollection($frequencyOfGarbageCollection)
    {
        $this->frequencyOfGarbageCollection = $frequencyOfGarbageCollection;

        return $this;
    }

    /**
     * Gets the value of wasteCollector.
     *
     * @return mixed
     */
    public function get_WasteCollector()
    {
        return $this->wasteCollector;
    }

    /**
     * Sets the value of wasteCollector.
     *
     * @param mixed $wasteCollector the waste collector
     *
     * @return self
     */
    public function set_WasteCollector($wasteCollector)
    {
        $this->wasteCollector = $wasteCollector;

        return $this;
    }

    /**
     * Gets the value of collectorAddress.
     *
     * @return mixed
     */
    public function get_CollectorAddress()
    {
        return $this->collectorAddress;
    }

    /**
     * Sets the value of collectorAddress.
     *
     * @param mixed $collectorAddress the collector address
     *
     * @return self
     */
    public function set_CollectorAddress($collectorAddress)
    {
        $this->collectorAddress = $collectorAddress;

        return $this;
    }

    /**
     * Gets the value of garbageDisposalMethod.
     *
     * @return mixed
     */
    public function get_GarbageDisposalMethod()
    {
        return $this->garbageDisposalMethod;
    }

    /**
     * Sets the value of garbageDisposalMethod.
     *
     * @param mixed $garbageDisposalMethod the garbage disposal method
     *
     * @return self
     */
    public function set_GarbageDisposalMethod($garbageDisposalMethod)
    {
        $this->garbageDisposalMethod = $garbageDisposalMethod;

        return $this;
    }

    /**
     * Gets the value of wasteMinimizationMethod.
     *
     * @return mixed
     */
    public function get_WasteMinimizationMethod()
    {
        return $this->wasteMinimizationMethod;
    }

    /**
     * Sets the value of wasteMinimizationMethod.
     *
     * @param mixed $wasteMinimizationMethod the waste minimization method
     *
     * @return self
     */
    public function set_WasteMinimizationMethod($wasteMinimizationMethod)
    {
        $this->wasteMinimizationMethod = $wasteMinimizationMethod;

        return $this;
    }

    /**
     * Gets the value of drainageSystem.
     *
     * @return mixed
     */
    public function get_DrainageSystem()
    {
        return $this->drainageSystem;
    }

    /**
     * Sets the value of drainageSystem.
     *
     * @param mixed $drainageSystem the drainage system
     *
     * @return self
     */
    public function set_DrainageSystem($drainageSystem)
    {
        $this->drainageSystem = $drainageSystem;

        return $this;
    }

    /**
     * Gets the value of drainageType.
     *
     * @return mixed
     */
    public function get_DrainageType()
    {
        return $this->drainageType;
    }

    /**
     * Sets the value of drainageType.
     *
     * @param mixed $drainageType the drainage type
     *
     * @return self
     */
    public function set_DrainageType($drainageType)
    {
        $this->drainageType = $drainageType;

        return $this;
    }

    /**
     * Gets the value of drainageDischargeLocation.
     *
     * @return mixed
     */
    public function get_DrainageDischargeLocation()
    {
        return $this->drainageDischargeLocation;
    }

    /**
     * Sets the value of drainageDischargeLocation.
     *
     * @param mixed $drainageDischargeLocation the drainage discharge location
     *
     * @return self
     */
    public function set_DrainageDischargeLocation($drainageDischargeLocation)
    {
        $this->drainageDischargeLocation = $drainageDischargeLocation;

        return $this;
    }

    /**
     * Gets the value of sewerageSystem.
     *
     * @return mixed
     */
    public function get_SewerageSystem()
    {
        return $this->sewerageSystem;
    }

    /**
     * Sets the value of sewerageSystem.
     *
     * @param mixed $sewerageSystem the sewerage system
     *
     * @return self
     */
    public function set_SewerageSystem($sewerageSystem)
    {
        $this->sewerageSystem = $sewerageSystem;

        return $this;
    }

    /**
     * Gets the value of septicTank.
     *
     * @return mixed
     */
    public function get_SepticTank()
    {
        return $this->septicTank;
    }

    /**
     * Sets the value of septicTank.
     *
     * @param mixed $septicTank the septic tank
     *
     * @return self
     */
    public function set_SepticTank($septicTank)
    {
        $this->septicTank = $septicTank;

        return $this;
    }

    /**
     * Gets the value of sewerageDischargeLocation.
     *
     * @return mixed
     */
    public function get_SewerageDischargeLocation()
    {
        return $this->sewerageDischargeLocation;
    }

    /**
     * Sets the value of sewerageDischargeLocation.
     *
     * @param mixed $sewerageDischargeLocation the sewerage discharge location
     *
     * @return self
     */
    public function set_SewerageDischargeLocation($sewerageDischargeLocation)
    {
        $this->sewerageDischargeLocation = $sewerageDischargeLocation;

        return $this;
    }

    /**
     * Gets the value of waterSupply.
     *
     * @return mixed
     */
    public function get_WaterSupply()
    {
        return $this->waterSupply;
    }

    /**
     * Sets the value of waterSupply.
     *
     * @param mixed $waterSupply the water supply
     *
     * @return self
     */
    public function set_WaterSupply($waterSupply)
    {
        $this->waterSupply = $waterSupply;

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
   public function get_LineOfBusiness()
   {
       return $this->lineOfBusiness;
   }

	 /**
		* Sets the value of applicationType.
		*
		* @param mixed $applicationType the application type
		*
		* @return self
		*/
     public function set_LineOfBusiness($param)
     {
       $this->lineOfBusiness = $param;

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
}//END OF CLASS
