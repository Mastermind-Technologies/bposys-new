<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends Owner {
	private $businessId = null;
	private $presidentTreasurerName = null;
	protected $businessName = null;
	private $companyName = null;
	private $tradeName = null;
	private $signageName = null;
	private $organizationType = null;
	private $corporationName = null;
	private $dateOfOperation = null;
	private $businessDesc = null;
	private $PIN = null;
	private $bldgName = null;
	private $houseBldgNum = null;
	private $unitNum = null;
	private $street = null;
    private $subdivision = null;
    private $barangay = null;
    private $cityMunicipality = null;
    private $province = null;
    private $telnum = null;
    private $email = null;
    private $pollutionControlOfficer = null;
    private $maleEmployees = null;
    private $femaleEmployees = null;
    private $PWDEmployees = null;
    private $LGUEmployees = null;
    private $businessArea = null;
    private $isApplied = null;
    private $emergencyContactPerson = null;
    private $emergencyTelNum = null;
    private $emergencyEmail = null;
    private $zoneType = null;
    private $lat = null;
    private $lng = null;
    private $gmapAddress = null;

    // private $natureOfBusiness = null;
    // private $capitalInvested = null;

    public function __construct($business_id = null)
    {
      $this->CI =& get_instance();
      $this->CI->load->model('Business_m');
      if(isset($business_id))
       return $this->get_business_information($business_id);
}

    /**
     * get_s the value of businessId.
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
    }

    /**
     * get_s the value of presidentTreasurerName.
     *
     * @return mixed
     */
    public function get_PresidentTreasurerName()
    {
    	return $this->presidentTreasurerName;
    }

    /**
     * Sets the value of presidentTreasurerName.
     *
     * @param mixed $presidentTreasurerName the president treasurer name
     *
     * @return self
     */
    public function set_PresidentTreasurerName($presidentTreasurerName)
    {
    	$this->presidentTreasurerName = $presidentTreasurerName;
    }

    /**
     * get_s the value of businessName.
     *
     * @return mixed
     */
    public function get_BusinessName()
    {
    	return $this->businessName;
    }

    /**
     * Sets the value of businessName.
     *
     * @param mixed $businessName the business name
     *
     * @return self
     */
    public function set_BusinessName($businessName)
    {
    	$this->businessName = $businessName;
    }

    /**
     * get_s the value of companyName.
     *
     * @return mixed
     */
    public function get_CompanyName()
    {
    	return $this->companyName;
    }

    /**
     * Sets the value of companyName.
     *
     * @param mixed $companyName the company name
     *
     * @return self
     */
    public function set_CompanyName($companyName)
    {
    	$this->companyName = $companyName;
    }

    /**
     * get_s the value of tradeName.
     *
     * @return mixed
     */
    public function get_TradeName()
    {
    	return $this->tradeName;
    }

    /**
     * Sets the value of tradeName.
     *
     * @param mixed $tradeName the trade name
     *
     * @return self
     */
    public function set_TradeName($tradeName)
    {
    	$this->tradeName = $tradeName;
    }

    /**
     * get_s the value of signageName.
     *
     * @return mixed
     */
    public function get_SignageName()
    {
    	return $this->signageName;
    }

    /**
     * Sets the value of signageName.
     *
     * @param mixed $signageName the signage name
     *
     * @return self
     */
    public function set_SignageName($signageName)
    {
    	$this->signageName = $signageName;
    }

    /**
     * get_s the value of natureOfBusiness.
     *
     * @return mixed
     */
    // public function get_NatureOfBusiness()
    // {
    // 	return $this->natureOfBusiness;
    // }

    /**
     * Sets the value of natureOfBusiness.
     *
     * @param mixed $natureOfBusiness the nature of business
     *
     * @return self
     */
    // public function set_NatureOfBusiness($natureOfBusiness)
    // {
    // 	$this->natureOfBusiness = $natureOfBusiness;
    // }

    /**
     * get_s the value of organizationType.
     *
     * @return mixed
     */
    public function get_OrganizationType()
    {
    	return $this->organizationType;
    }

    /**
     * Sets the value of organizationType.
     *
     * @param mixed $organizationType the organization type
     *
     * @return self
     */
    public function set_OrganizationType($organizationType)
    {
    	$this->organizationType = $organizationType;
    }

    /**
     * get_s the value of corporationName.
     *
     * @return mixed
     */
    public function get_CorporationName()
    {
    	return $this->corporationName;
    }

    /**
     * Sets the value of corporationName.
     *
     * @param mixed $corporationName the corporation name
     *
     * @return self
     */
    public function set_CorporationName($corporationName)
    {
    	$this->corporationName = $corporationName;
    }

    /**
     * get_s the value of dateOfOperation.
     *
     * @return mixed
     */
    public function get_DateOfOperation()
    {
    	return $this->dateOfOperation;
    }

    /**
     * Sets the value of dateOfOperation.
     *
     * @param mixed $dateOfOperation the date of operation
     *
     * @return self
     */
    public function set_DateOfOperation($dateOfOperation)
    {
    	$this->dateOfOperation = $dateOfOperation;
    }

    /**
     * get_s the value of businessDesc.
     *
     * @return mixed
     */
    public function get_BusinessDesc()
    {
    	return $this->businessDesc;
    }

    /**
     * Sets the value of businessDesc.
     *
     * @param mixed $businessDesc the business desc
     *
     * @return self
     */
    public function set_BusinessDesc($businessDesc)
    {
    	$this->businessDesc = $businessDesc;
    }

    /**
     * get_s the value of PIN.
     *
     * @return mixed
     */
    public function get_PIN()
    {
    	return $this->PIN;
    }

    /**
     * Sets the value of PIN.
     *
     * @param mixed $PIN the 
     *
     * @return self
     */
    public function set_PIN($PIN)
    {
    	$this->PIN = $PIN;
    }

    /**
     * get_s the value of bldgName.
     *
     * @return mixed
     */
    public function get_BldgName()
    {
    	return $this->bldgName;
    }

    /**
     * Sets the value of bldgName.
     *
     * @param mixed $bldgName the bldg name
     *
     * @return self
     */
    public function set_BldgName($bldgName)
    {
    	$this->bldgName = $bldgName;
    }

    /**
     * get_s the value of houseBldgNum.
     *
     * @return mixed
     */
    public function get_HouseBldgNum()
    {
    	return $this->houseBldgNum;
    }

    /**
     * Sets the value of houseBldgNum.
     *
     * @param mixed $houseBldgNum the house bldg num
     *
     * @return self
     */
    public function set_HouseBldgNum($houseBldgNum)
    {
    	$this->houseBldgNum = $houseBldgNum;
    }

    /**
     * get_s the value of unitNum.
     *
     * @return mixed
     */
    public function get_UnitNum()
    {
    	return $this->unitNum;
    }

    /**
     * Sets the value of unitNum.
     *
     * @param mixed $unitNum the unit num
     *
     * @return self
     */
    public function set_UnitNum($unitNum)
    {
    	$this->unitNum = $unitNum;
    }

    /**
     * get_s the value of street.
     *
     * @return mixed
     */
    public function get_Street()
    {
    	return $this->street;
    }

    /**
     * Sets the value of street.
     *
     * @param mixed $street the street
     *
     * @return self
     */
    public function set_Street($street)
    {
    	$this->street = $street;
    }

     /**
     * get_s the value of barangay.
     *
     * @return mixed
     */
     public function get_Subdivision()
     {
        return $this->subdivision;
    }

    /**
     * Sets the value of barangay.
     *
     * @param mixed $barangay the barangay
     *
     * @return self
     */
    public function set_Subdivision($subdivision)
    {
        $this->subdivision = $subdivision;
    }

    /**
     * get_s the value of barangay.
     *
     * @return mixed
     */
    public function get_Barangay()
    {
    	return $this->barangay;
    }

    /**
     * Sets the value of barangay.
     *
     * @param mixed $barangay the barangay
     *
     * @return self
     */
    public function set_Barangay($barangay)
    {
    	$this->barangay = $barangay;
    }

    /**
     * get_s the value of cityMunicipality.
     *
     * @return mixed
     */
    public function get_CityMunicipality()
    {
    	return $this->cityMunicipality;
    }

    /**
     * Sets the value of cityMunicipality.
     *
     * @param mixed $cityMunicipality the city municipality
     *
     * @return self
     */
    public function set_CityMunicipality($cityMunicipality)
    {
    	$this->cityMunicipality = $cityMunicipality;
    }

    /**
     * get_s the value of province.
     *
     * @return mixed
     */
    public function get_Province()
    {
    	return $this->province;
    }

    /**
     * Sets the value of province.
     *
     * @param mixed $province the province
     *
     * @return self
     */
    public function set_Province($province)
    {
    	$this->province = $province;
    }

    /**
     * get_s the value of telnum.
     *
     * @return mixed
     */
    public function get_Telnum()
    {
    	return $this->telnum;
    }

    /**
     * Sets the value of telnum.
     *
     * @param mixed $telnum the telnum
     *
     * @return self
     */
    public function set_Telnum($telnum)
    {
    	$this->telnum = $telnum;
    }

    /**
     * get_s the value of email.
     *
     * @return mixed
     */
    public function get_Email()
    {
    	return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function set_Email($email)
    {
    	$this->email = $email;
    }
    public function get_LGUEmployees()
    {
        return $this->LGUEmployees;
    }

    /**
     * Sets the value of LGUEmployees.
     *
     * @param mixed $LGUEmployees the LGUEmployees
     *
     * @return self
     */
    public function set_LGUEmployees($LGUEmployees)
    {
        $this->LGUEmployees = $LGUEmployees;
    }

    /**
     * get_s the value of pollutionControlOfficer.
     *
     * @return mixed
     */
    public function get_PollutionControlOfficer()
    {
    	return $this->pollutionControlOfficer;
    }

    /**
     * Sets the value of pollutionControlOfficer.
     *
     * @param mixed $pollutionControlOfficer the pollution control office
     *
     * @return self
     */
    public function set_PollutionControlOfficer($pollutionControlOfficer)
    {
    	$this->pollutionControlOfficer = $pollutionControlOfficer;
    }

    /**
     * get_s the value of maleEmployees.
     *
     * @return mixed
     */
    public function get_MaleEmployees()
    {
    	return $this->maleEmployees;
    }

    /**
     * Sets the value of maleEmployees.
     *
     * @param mixed $maleEmployees the male employees
     *
     * @return self
     */
    public function set_MaleEmployees($maleEmployees)
    {
    	$this->maleEmployees = $maleEmployees;
    }

    /**
     * get_s the value of femaleEmployees.
     *
     * @return mixed
     */
    public function get_FemaleEmployees()
    {
    	return $this->femaleEmployees;
    }

    /**
     * Sets the value of femaleEmployees.
     *
     * @param mixed $femaleEmployees the female employees
     *
     * @return self
     */
    public function set_FemaleEmployees($femaleEmployees)
    {
    	$this->femaleEmployees = $femaleEmployees;
    }

    /**
     * get_s the value of PWDEmployees.
     *
     * @return mixed
     */
    public function get_PWDEmployees()
    {
    	return $this->PWDEmployees;
    }

    /**
     * Sets the value of PWDEmployees.
     *
     * @param mixed $PWDEmployees the demployees
     *
     * @return self
     */
    public function set_PWDEmployees($PWDEmployees)
    {
    	$this->PWDEmployees = $PWDEmployees;
    }

    /**
     * get_s the value of businessArea.
     *
     * @return mixed
     */
    public function get_BusinessArea()
    {
    	return $this->businessArea;
    }

    /**
     * Sets the value of businessArea.
     *
     * @param mixed $businessArea the business area
     *
     * @return self
     */
    public function set_BusinessArea($businessArea)
    {
    	$this->businessArea = $businessArea;
    }

    public function get_business_information($id = null)
    {
    	if(!isset($this->CI))
    		$this->CI = get_instance();
    	$query['businessId'] = $id;

        if($this->CI->encryption->decrypt($this->CI->session->userdata['userdata']['role']) == "Applicant")
            $query['userId'] = $this->CI->encryption->decrypt($this->CI->session->userdata['userdata']['userId']);

        $result = $this->CI->Business_m->get_all_businesses($query);

        if(count($result) > 0)
        {
         $this->get_owner_information($result[0]->ownerId);
         $this->set_all($result[0]);
         $this->unset_CI();
         return $this;
        }
        else
        {
            $this->CI->session->set_flashdata('failed','Invalid Input');
            $this->unset_CI();
            redirect('home');
        }
}

        /**
     * Gets the value of isApplied.
     *
     * @return mixed
     */
        public function get_IsApplied()
        {
            return $this->isApplied;
        }

    /**
     * Sets the value of isApplied.
     *
     * @param mixed $isApplied the is applied
     *
     * @return self
     */
    public function set_IsApplied($isApplied)
    {
        $this->isApplied = $isApplied;

        return $this;
    }
        /**
     * Gets the value of emergencyContactPerson.
     *
     * @return mixed
     */
    public function get_EmergencyContactPerson()
    {
        return $this->emergencyContactPerson;
    }

    /**
     * Sets the value of emergencyContactPerson.
     *
     * @param mixed $emergencyContactPerson the emergency contact person
     *
     * @return self
     */
    public function set_EmergencyContactPerson($emergencyContactPerson)
    {
        $this->emergencyContactPerson = $emergencyContactPerson;

        return $this;
    }

    /**
     * Gets the value of emergencyTelNum.
     *
     * @return mixed
     */
    public function get_EmergencyTelNum()
    {
        return $this->emergencyTelNum;
    }

    /**
     * Sets the value of emergencyTelNum.
     *
     * @param mixed $emergencyTelNum the emergency tel num
     *
     * @return self
     */
    public function set_EmergencyTelNum($emergencyTelNum)
    {
        $this->emergencyTelNum = $emergencyTelNum;

        return $this;
    }

    /**
     * Gets the value of emergencyEmail.
     *
     * @return mixed
     */
    public function get_EmergencyEmail()
    {
        return $this->emergencyEmail;
    }

    /**
     * Sets the value of emergencyEmail.
     *
     * @param mixed $emergencyEmail the emergency email
     *
     * @return self
     */
    public function set_EmergencyEmail($emergencyEmail)
    {
        $this->emergencyEmail = $emergencyEmail;

        return $this;
    }

    public function set_all($param = null)
    {
    	if(!isset($this->CI))
    		$this->CI = get_instance();
    	$this->businessId = $this->CI->encryption->encrypt($param->businessId);
    	$this->presidentTreasurerName = $param->presidentTreasurerName;
    	$this->businessName = $param->businessName;
    	$this->companyName = $param->companyName;
    	$this->tradeName = $param->tradeName;
    	$this->signageName = $param->signageName;
    	// $this->natureOfBusiness = $param->natureOfBusiness;
    	$this->organizationType = $param->organizationType;
    	$this->corporationName = $param->corporationName;
    	$this->dateOfOperation = $param->dateOfOperation;
    	$this->businessDesc = $param->businessDesc;
    	$this->PIN = $param->PIN;
    	$this->bldgName = $param->bldgName;
    	$this->houseBldgNum = $param->houseBldgNum;
    	$this->unitNum = $param->unitNum;
    	$this->street = $param->street;
        $this->subdivision = $param->subdivision;
        $this->barangay = $param->barangay;
        $this->cityMunicipality = $param->cityMunicipality;
        $this->province = $param->province;
        $this->telnum = $param->telNum;
        $this->email = $param->email;
        $this->pollutionControlOfficer = $param->pollutionControlOfficer;
        $this->maleEmployees = $param->maleEmployees;
        $this->femaleEmployees = $param->femaleEmployees;
        $this->PWDEmployees = $param->PWDEmployees;
        $this->LGUEmployees = $param->LGUResidingEmployees;
        $this->businessArea = $param->businessArea;
        $this->emergencyContactPerson = $param->emergencyContactPerson;
        $this->emergencyTelNum = $param->emergencyTelNum;
        $this->emergencyEmail = $param->emergencyEmail;
        $this->zoneType = $param->zoneType;
        $this->lng = $param->lng;
        $this->lat = $param->lat;
        $this->gmapAddress = $param->gmapAddress;

        $this->unset_CI();
        return $this;
    }

    /**
     * Gets the value of zoneType.
     *
     * @return mixed
     */
    public function get_ZoneType()
    {
        return $this->zoneType;
    }

    /**
     * Sets the value of zoneType.
     *
     * @param mixed $zoneType the zone type
     *
     * @return self
     */
    public function set_ZoneType($zoneType)
    {
        $this->zoneType = $zoneType;

        return $this;
    }

    /**
     * Gets the value of lat.
     *
     * @return mixed
     */
    public function get_Lat()
    {
        return $this->lat;
    }

    /**
     * Sets the value of lat.
     *
     * @param mixed $lat the lat
     *
     * @return self
     */
    public function set_Lat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Gets the value of lng.
     *
     * @return mixed
     */
    public function get_Lng()
    {
        return $this->lng;
    }

    /**
     * Sets the value of lng.
     *
     * @param mixed $lng the lng
     *
     * @return self
     */
    public function set_Lng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Gets the value of gmapAddress.
     *
     * @return mixed
     */
    public function get_GmapAddress()
    {
        return $this->gmapAddress;
    }

    /**
     * Sets the value of gmapAddress.
     *
     * @param mixed $gmapAddress the gmap address
     *
     * @return self
     */
    public function set_GmapAddress($gmapAddress)
    {
        $this->gmapAddress = $gmapAddress;

        return $this;
    }
}//END OF CLASS