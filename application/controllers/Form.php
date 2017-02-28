<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('Owner_m');
		$this->load->model('Role_m');
		$this->load->model('Application_m');
		$this->load->model('Lessor_m');
		$this->load->model('Business_Activity_m');
		$this->load->model('Approval_m');
		$this->load->model('Gross_m');
		$this->load->model('Archive_m');
		$this->load->model('Notification_m');
		$this->load->model('Renewal_m');
		$this->load->model('Payment_m');
		$this->load->model('Assessment_m');
		$this->load->model('Retirement_m');
		$this->load->model('Issued_Application_m');
		$this->load->library('form_validation');
	}

	public function _init($data = null)
	{
		if($this->encryption->decrypt($this->session->userdata['userdata']['role']) != "Applicant")
		{
			redirect('error/error403');
		}
		else
		{
			$this->load->view('templates/sb_admin2/sb_admin2_includes');
			if($data != null)
				$this->load->view('templates/sb_admin2/sb_admin2_navbar', $data);
			else
				$this->load->view('templates/sb_admin2/sb_admin2_navbar');
		}
	}

	public function _init_matrix($data = null)
	{
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		if($role == "Applicant")
		{
			redirect('error/error403');
		}
		else

		{
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$data['issued'] = count($this->Issued_Application_m->get_all($query));


			if($role == "BPLO")
			{
// $query['status'] = 'For validation...';
// $data['incoming'] = count($this->Application_m->get_all_bplo_applications($query));

// $query['status'] = 'For applicant visit';
// $data['pending'] = count($this->Application_m->get_all_bplo_applications($query));

				unset($query);

				$query['status'] = 'On process';
				$data['process'] = count($this->Application_m->get_all_bplo_applications($query));

				$query['status'] = 'Completed';
				$data['complete'] = count($this->Application_m->get_all_bplo_applications($query));

				$query['status'] = 'For applicant visit';
				$data['incoming'] = count($this->Application_m->get_all_bplo_applications($query));

				$query['status'] = "For approval";
				$data['retirements'] = count($this->Retirement_m->get_all($query));

				$data['total'] = $data['process'];
			}
			else if($role == 'Zoning')
			{
				unset($query);
				$query['status'] = 'For applicant visit';
				$data['incoming'] = count($this->Application_m->get_all_zoning_applications($query));

				$query['status'] = 'On process';
				$data['process'] = count($this->Application_m->get_all_zoning_applications($query));

// $query['status'] = 'Active';
// $data['issued'] = count($this->Application_m->get_all_zoning_applications($query));

				$data['total'] = $data['incoming'];
			}
			else if($role == 'BFP')
			{
				unset($query);
				$query['status'] = 'For applicant visit';
				$data['incoming'] = count($this->Application_m->get_all_bfp_applications($query));

				$query['status'] = 'On process';
				$data['process'] = count($this->Application_m->get_all_bfp_applications($query));

// $query['status'] = 'Active';
// $data['issued'] = count($this->Application_m->get_all_bfp_applications($query));

				$data['total'] = $data['incoming'];
			}
			else if($role == 'CENRO')
			{
				unset($query);
				$query['status'] = 'For applicant visit';
				$data['incoming'] = count($this->Application_m->get_all_cenro_applications($query));

				$query['status'] = 'On process';
				$data['process'] = count($this->Application_m->get_all_cenro_applications($query));

// $query['status'] = 'Active';
// $data['issued'] = count($this->Application_m->get_all_cenro_applications($query));

				$data['total'] = $data['incoming'];
			}
			else if($role == "CHO")
			{
				unset($query);
				$query['status'] = 'For applicant visit';
				$data['incoming'] = count($this->Application_m->get_all_sanitary_applications($query));

				$query['status'] = 'On process';
				$data['process'] = count($this->Application_m->get_all_sanitary_applications($query));

// $query['status'] = 'Active';
// $data['issued'] = count($this->Application_m->get_all_sanitary_applications($query));

				$data['total'] = $data['incoming'];
			}

			else if($role == "Engineering")
			{
				unset($query);
				$query['status'] = 'For applicant visit';
				$data['incoming'] = count($this->Application_m->get_all_engineering_applications($query));

				$query['status'] = 'On process';
				$data['process'] = count($this->Application_m->get_all_engineering_applications($query));

// $query['status'] = 'Active';
// $data['issued'] = count($this->Application_m->get_all_engineering_applications($query));

				$data['total'] = $data['incoming'];
			}

			$this->load->view('templates/matrix/matrix_includes');
			$this->load->view('templates/matrix/matrix_navbar', $data);
		}
	}

	public function isLogin()
	{
		if(!isset($this->session->userdata['userdata']))
		{
			// $this->session->set_flashdata('failed', 'You are not logged in!');
			redirect('error/error403b');
		}
	}

	public function view($application_param = null)
	{
		$this->isLogin();
		$user_Id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

//get notifications
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = 'dashboard';
		$this->_init($nav_data);


//decrypt application_param
		$data['custom_crypto'] = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);

		$application_param = $this->encryption->decrypt(hex2bin($application_param), $data['custom_crypto']);
		$pieces = explode('|',$application_param);
		$referenceNum = $pieces[1];
		if($referenceNum == null)
		{
			$this->session->set_flashdata('message','Invalid URL');
			redirect('dashboard');
		}

		$data['application'] = new BPLO_Application($referenceNum);

		$query['referenceNum'] = $referenceNum;
		$query['YEAR(createdAt)'] = date('Y');

		$query['dept'] = 'Zoning';
		$data['zoning'] = $this->Issued_Application_m->get_current_issued($query);

		$query['dept'] = 'CHO';
		$data['sanitary'] = $this->Issued_Application_m->get_current_issued($query);

		$query['dept'] = 'BFP';
		$data['bfp'] = $this->Issued_Application_m->get_current_issued($query);

		$query['dept'] = 'CENRO';
		$data['cenro'] = $this->Issued_Application_m->get_current_issued($query);

		$query['dept'] = 'Engineering';
		$data['engineering'] = $this->Issued_Application_m->get_current_issued($query);


		$submitted_requirements = $this->Requirement_m->get_submitted_requirements($referenceNum);

		$data['checklist'] = [];
		if(count($submitted_requirements) > 0)
		{
			for($i = 0 ; $i < count($submitted_requirements); $i = $i +1)
			{
				$checklist['requirement'.$submitted_requirements[$i]->requirementId] = true;
			}
			$data['checklist'] = $checklist;
		}

		// echo '<pre>';
		// print_r(array($data));
		// echo '</pre>';
		//exit();


		$this->load->view('dashboard/applicant/view_application', $data);
	}

	public function renew($application_param)
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

//get notifications
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = 'dashboard';
		$this->_init($nav_data);

//decrypt application_param
		$custom_decrypt = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);
		$application_param = $this->encryption->decrypt(hex2bin($application_param), $custom_decrypt);
		$pieces = explode('|',$application_param);
		$referenceNum = $pieces[1];
		if($referenceNum == null)
		{
			$this->session->set_flashdata('message','Invalid URL');
			redirect('dashboard');
		}

		$data['line_of_business'] = $this->Fee_m->get_all_line_of_businesses();

		$data['application'] = new BPLO_Application($referenceNum);
		$data['bfp'] = new BFP_Application($referenceNum);
		$data['cenro'] = new CENRO_Application($referenceNum);
		$data['business'] = new Business($this->encryption->decrypt($data['application']->get_BusinessID()));
		$data['sanitary'] = new Sanitary_Application($referenceNum);

		$this->load->view('dashboard/applicant/renew-application', $data);
	}

	public function submit_renewal_application()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$this->form_validation->set_rules("pollution-control-officer", "Pollution Control Officer", 'required');
		$this->form_validation->set_rules("male-employees", "Male Employees", 'required');
		$this->form_validation->set_rules("female-employees", "Female Employees", 'required');
		$this->form_validation->set_rules("pwd-employees", "PWD Employees", 'required');
		$this->form_validation->set_rules("lgu-employees", "LGU Employees", 'required');
		$this->form_validation->set_rules("president-treasurer-name", "Name of President/Treasurer of Corporation", 'required');
		$this->form_validation->set_rules("telnum", "Telephone Number", 'required');
		$this->form_validation->set_rules("email", "Email", 'required');
		$this->form_validation->set_rules("emergency-contact-name", "Emergency Contact Name", 'required');
		$this->form_validation->set_rules("emergency-tel-cel-no", "Emergency Tel/Cel Number", 'required');
		$this->form_validation->set_rules("emergency-email", "Emergency Email", 'required');

		$this->form_validation->set_rules('DTISECCDA_RegNum', 'DTI/SEC/CDA Registration Number', 'required|numeric');
		$this->form_validation->set_rules('DTISECCDA_Date', 'DTI/SEC/CDA Date', 'required');
		$this->form_validation->set_rules('brgy-clearance-date-issued','Barangay Clearance Date Issued', 'required');
		$this->form_validation->set_rules('ctc-number', 'CTC Number', 'required|numeric');
		$this->form_validation->set_rules('tin', 'TIN', 'required');
		$this->form_validation->set_rules('occupancy-permit-number', 'Occupancy Permit Number', 'required');
		$this->form_validation->set_rules('id-presented', 'ID Presented', 'required');
		$this->form_validation->set_rules('mode-of-payment', 'Mode of Payment', 'required');
// $this->form_validation->set_rules('capital-invested', 'Capital Invested', 'required|numeric');
// $this->form_validation->set_rules('business', 'Business Profile', 'required');

		if($this->input->post('tax-incentive'))
		{
			$this->form_validation->set_rules('entity', 'Entity', 'required');
		}

		if($this->input->post('rented'))
		{
			$this->form_validation->set_rules('lessor-first-name', "Lessor's First Name", 'required');
			$this->form_validation->set_rules('lessor-last-name', "Lessor's Last Name", 'required');
			$this->form_validation->set_rules('lessor-address', "Lessor's Address", 'required');
			$this->form_validation->set_rules('lessor-subdivision', "Lessor's Subdivision", 'required');
			$this->form_validation->set_rules('lessor-barangay', "Lessor's Barangay", 'required');
			$this->form_validation->set_rules('lessor-city-municipality', "Lessor's City/Municipality", 'required');
			$this->form_validation->set_rules('lessor-province', "Lessor's Province", 'required');
			$this->form_validation->set_rules('lessor-monthly-rental', "Lessor's Monthly Rental", 'required');
			$this->form_validation->set_rules('lessor-tel-cel-no', "Lessor's Telephone/Cellphone Number", 'required|numeric');
			$this->form_validation->set_rules('lessor-email', "Lessor's Email", 'required|valid_email');
			$this->form_validation->set_rules('lessor-address', "Lessor's Address", 'required');
		}

// $this->form_validation->set_rules('code', 'Code', 'required');
// $this->form_validation->set_rules('line-of-business', 'Line of Business', 'required');
// $this->form_validation->set_rules('num-of-units', 'Number of Units', 'required');
// $this->form_validation->set_rules('capitalization', 'Capitalization', 'required');
		$this->form_validation->set_rules('previous-gross[]', 'Previous Gross', 'required|numeric');
		$this->form_validation->set_rules('essential[]', 'Essential', 'required|numeric');
		$this->form_validation->set_rules('non-essential[]', 'Non-essential', 'required|numeric');

		if($this->input->post('cnc'))
		{
			$this->form_validation->set_rules('cnc-date-issued', 'CNC Date Issued', 'required');
		}
		if($this->input->post('llda'))
		{
			$this->form_validation->set_rules('llda-date-issued', 'LLDA Date Issued','required');
		}
		if($this->input->post('discharge-permit'))
		{
			$this->form_validation->set_rules('discharge-permit-date-issued','Discharge Permit Date Issued', 'required');
		}
		if($this->input->post('apsci'))
		{
			$this->form_validation->set_rules('apsci-date-issued','Permit to Operate/APSCI', 'required');
		}
//dumped steam-generator-specify serverside validation

		$this->form_validation->set_rules('air-pollution-control-devices','Air Pollution Control Devices Being Used', 'required');
		$this->form_validation->set_rules('stack-height','Stack Height', 'required');

		$this->form_validation->set_rules('wastewater-treatment-facility', 'Wastewater Treatment Facility', 'required');
		if($this->input->post('pending-llda-case'))
		{
			$this->form_validation->set_rules('llda-case-no', 'LLDA Case Number', 'required');
		}

		$this->form_validation->set_rules('type-of-solid-wastes', 'Type of Solid Wastes', 'required');
		$this->form_validation->set_rules('qty-per-day', 'Quantity per day', 'required');
		$this->form_validation->set_rules('method-of-garbage-collection', 'required');

//dumpled garbage-collection-specify serverside validation

		$this->form_validation->set_rules('collector', 'Person / Company Collecting Solid Wastes', 'required');
		$this->form_validation->set_rules('collector-address', 'Collector\'s Address', 'required');
		$this->form_validation->set_rules('water-supply-type', 'Type of Water Supply/Source', 'required');
		$this->form_validation->set_rules('storeys','No. of Storeys','required');
		$this->form_validation->set_rules('portion-occupied','Portion Occupied','required');
		$this->form_validation->set_rules('area-per-floor','Area per Floor','required');


		if($this->form_validation->run() == false)
		{
// $data['error'] = "Error: Please resolve invalid inputs.";

//test mode
			$data['error'] = validation_errors();
			$this->session->set_flashdata('error', validation_errors());

			$custom_crypto = array(
				'cipher' => 'blowfish',
				'mode' => 'ecb',
				'key' => $this->config->item('encryption_key'),
				'hmac' => false
				);
			$reference_num = $this->encryption->decrypt($this->input->post('ref'));
			$application_id = $this->encryption->decrypt($this->input->post('aid'));
			$param = bin2hex($this->encryption->encrypt($application_id."|".$reference_num, $custom_crypto));

// $data['1'] = $param;
// $data['2'] = validation_errors();

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// exit();


			redirect("form/renew/".$param);
		}
		else
		{
			if($this->input->post('tax-incentive'))
			{
				$entity = $this->input->post('entity');
			}
			else
			{
				$entity = "NA";
			}

			$tax_payer_name = $this->input->post('tax-first-name') . " " . $this->input->post('tax-middle-name') . ", " . $this->input->post('tax-last-name');
			$president_treasurer_name = $this->input->post('pt-first-name') . " " . $this->input->post('pt-middle-name') . ", " . $this->input->post('pt-last-name');

//validate first to avoid script kiddies
			$reference_num = $this->encryption->decrypt($this->input->post('ref'));

			$this->archive_record($reference_num);

			$business_id = $this->encryption->decrypt($this->input->post('business'));

//BUSINESS INFORMATION
			$business_fields = array(
				'presidentTreasurerName' => $this->input->post('president-treasurer-name'),
				'pollutionControlOfficer' => $this->input->post('pollution-control-officer'),
				'maleEmployees' => $this->input->post('male-employees'),
				'femaleEmployees' => $this->input->post('female-employees'),
				'PWDEmployees' => $this->input->post('pwd-employees'),
				'LGUResidingEmployees' => $this->input->post('lgu-employees'),
				'telNum' => $this->input->post('telnum'),
				'email' => $this->input->post('email'),
				'emergencyContactPerson' => $this->input->post('emergency-contact-name'),
				'emergencyTelNum' => $this->input->post('emergency-tel-cel-no'),
				'emergencyEmail' => $this->input->post('emergency-email'),
				);
			$this->Business_m->update_business($business_id, $business_fields);
//END BUSINESS INFORMATION

//archive old records
//then update

//START BPLO FORM
			$bplo_fields = array(
				'referenceNum' => $reference_num,
				'userId' => $user_id,
				'businessId' => $this->encryption->decrypt($this->input->post('business')),
				'taxYear' => $this->input->post('tax-year'),
				'applicationDate' => $this->input->post('application-date'),
				'modeOfPayment' => $this->input->post('mode-of-payment'),
				'idPresented' => $this->input->post('id-presented'),
				'DTISECCDA_RegNum' => $this->input->post('DTISECCDA_RegNum'),
				'DTISECCDA_Date' => $this->input->post('DTISECCDA_Date'),
				'brgyClearanceDateIssued' => $this->input->post('brgy-clearance-date-issued'),
				'CTCNum' => $this->input->post('ctc-number'),
				'TIN' => $this->input->post('tin'),
				'entityName' => $entity,
				'status' => 'Visit the Office of the Building Official'
				);

			$bplo_id = $this->Application_m->update_bplo($bplo_fields);

			if($this->input->post('rented'))
			{
				$lessor_fields = array(
					'bploId' => $bplo_id,
					'firstName' => $this->input->post('lessor-first-name'),
					'middleName' => $this->input->post('lessor-middle-name')==''?'NA':$this->input->post('lessor-middle-name'),
					'lastName' => $this->input->post('lessor-last-name'),
					'address' => $this->input->post('lessor-address'),
					'subdivision' => $this->input->post('lessor-subdivision'),
					'barangay' => $this->input->post('lessor-barangay'),
					'cityMunicipality' => $this->input->post('lessor-city-municipality'),
					'province' => $this->input->post('lessor-province'),
					'monthlyRental' => $this->input->post('lessor-monthly-rental'),
					'telNum' => $this->input->post('lessor-tel-cel-no'),
					'email' => $this->input->post('lessor-email'),
					);

				$this->Lessor_m->update_lessor($lessor_fields);
			}

//insert gross
			$activities = $this->input->post('activity-id');
			$previousGross = $this->input->post('previous-gross');
			$essential = $this->input->post('essential');
			$non_essential = $this->input->post('non-essential');
			foreach ($activities as $key => $activity) {
				$gross_field = array(
					'activityId' => $this->encryption->decrypt($activity),
					'previousGross' => $previousGross[$key],
					'essentials' => $essential[$key],
					'nonEssentials' => $non_essential[$key],
					);
				$this->Gross_m->insert($gross_field);
			}
			// $this->process_renewal_tax($activities, $previousGross, $essential, $non_essential, $reference_num);
//END BPLO

//START ZONING
			$zoning_fields = array(
				'userId' => $user_id,
				'referenceNum' => $reference_num,
				'businessId' =>$business_id,
				'status' => 'standby',
				);
			$this->Application_m->update_zoning($zoning_fields);
//END ZONING

//START CENRO
			if($this->input->post('fugitive-particulates'))
			{
				$fugitive_particulates = "";
				$result = $this->input->post('fugitive-particulates');
				foreach ($result as $r) {
					$fugitive_particulates = $fugitive_particulates."|".$r;
				}
				$fugitive_particulates = substr($fugitive_particulates, 1);
			}
			else
			{
				$fugitive_particulates = "NA";
			}

			if($this->input->post('steam-generators'))
			{
				$steam_generator = "";
				$result = $this->input->post('steam-generators');
				foreach ($result as $r) {
					$steam_generator = $steam_generator."|".$r;
				}
				$steam_generator = substr($steam_generator, 1);
			}
			else
			{
				$steam_generator = "NA";
			}

			if($this->input->post('waste-minimization'))
			{
				$waste_minimization = "";
				$result = $this->input->post('waste-minimization');
				foreach ($result as $r) {
					$waste_minimization = $waste_minimization."|".$r;
				}
				$waste_minimization = substr($waste_minimization, 1);
			}
			else
			{
				$waste_minimization = "NA";
			}

			$cenro_fields = array(
				'userId' => $user_id,
				'referenceNum' => $reference_num,
				'businessId' => $business_id,
				'CNC' => $this->input->post('cnc') ? $this->input->post('cnc-date-issued') : 'NA',
				'LLDAClearance' => $this->input->post('llda') ? $this->input->post('llda-date-issued') : 'NA',
				'dischargePermit' => $this->input->post('discharge-permit') ? $this->input->post('discharge-permit-date-issued') : 'NA',
				'apsci' => $this->input->post('apsci') ? $this->input->post('apsci-date-issued') : "NA",
				'productsAndByProducts' => $this->input->post('products-by-products'),
				'smokeEmission' => $this->input->post('smoke-emission') ? 1 : 0,
				'volatileCompound' => $this->input->post('volatile-compound') ? 1 : 0,
				'fugitiveParticulates' => $fugitive_particulates,
				'steamGenerator' => $steam_generator,
				'APCD' => $this->input->post('air-pollution-control-devices'),
				'stackHeight' => $this->input->post('stack-height'),
				'wastewaterTreatmentFacility' => $this->input->post('wastewater-treatment-facility'),
				'wastewaterTreatmentOperationAndProcess' => $this->input->post('wastewater-treatment-operation') ? 1 : 0,
				'pendingCaseWithLLDA' => $this->input->post('pending-llda-case') ? $this->input->post('llda-case-no') : "NA",
				'typeOfSolidWastesGenerated' => $this->input->post('type-of-solid-wastes'),
				'qtyPerDay' => $this->input->post('qty-per-day'),
				'garbageCollectionMethod' => $this->input->post('method-of-garbage-collection'),
				'frequencyOfGarbageCollection' => $this->input->post('garbage-collection-frequency'),
				'wasteCollector' => $this->input->post('collector'),
				'collectorAddress' => $this->input->post('collector-address'),
				'garbageDisposalMethod' => $this->input->post('garbage-disposal-method'),
				'wasteMinimizationMethod' => $waste_minimization,
				'drainageSystem' => $this->input->post('drainage-system') ? 1 : 0,
				'drainageType' => $this->input->post('drainage-system') ? $this->input->post('drainage-system-type') : "NA",
				'drainageDischargeLocation' => $this->input->post('drainage-system') ? $this->input->post('drainage-where-discharged') : "NA",
				'sewerageSystem' => $this->input->post('sewerage-system') ? 1 : 0,
				'septicTank' => $this->input->post('septic-tank') ? 1 : 0,
				'sewerageDischargeLocation' => $this->input->post('septic-tank') ? $this->input->post('sewerage-where-discharged') : "NA",
				'waterSupply' => $this->input->post('water-supply'),
				'status' => 'standby',
				);
			$this->Application_m->update_cenro($cenro_fields);
//END CENRO

//SANITARY
			$sanitary_fields = array(
				'referenceNum' => $reference_num,
				'userId' =>  $user_id,
				'businessId' => $business_id,
				'applicationDate' => $this->input->post('application-date'),
				'annualEmployeePhysicalExam' => $this->input->post('annual-exams')=="Yes" ? 1 : 0,
				'typeLevelOfWaterSource' => $this->input->post('water-supply-type'),
				'status' => 'standby',
				);
			$this->Application_m->update_sanitary($sanitary_fields);
//END OF SANITARY

//BFP
			$bfp_fields = array(
				'referenceNum' => $reference_num,
				'userId' => $user_id,
				'businessId' => $business_id,
				'applicationDate' => $this->input->post('application-date'),
				'storeys'  => $this->input->post('storeys'),
				'occupiedPortion' => $this->input->post('portion-occupied'),
				'areaPerFloor' => $this->input->post('area-per-floor'),
				'occupancyPermitNum' => $this->input->post('occupancy-permit-number'),
				'status' => 'standby',
				);
			$this->Application_m->update_bfp($bfp_fields);
//END OF BFP

//ENGINEERING
			$engineering_fields = array(
				'referenceNum' => $reference_num,
				'userId' => $user_id,
				'businessId' => $business_id,
				'status' => 'For applicant visit',
				);
			$this->Application_m->update_engineering($engineering_fields);
//END ENGINEERING

//SEND NOTIFICATION TO ALL OFFICES
//4,5,7,8,9,10
			// for($i = 4; $i <= 10 ; $i++)
			// {
			// 	if($i != 6)
			// 	{
			// 		$query = array(
			// 			'referenceNum' => $reference_num,
			// 			'status' => "Unread",
			// 			'role' => $i,
			// 			'notifMessage' => "Incoming",
			// 			);

			// 		$this->Notification_m->insert($query);
			// 	}
			// }

			//SEND NOTIFICATION TO ENGINEERING
			$query = array(
				'referenceNum' => $reference_num,
				'status' => "Unread",
				'role' => 9,
				'notifMessage' => "Incoming",
				);
			$this->Notification_m->insert($query);

			//prepare new assessment assessment
			$assessment_fields = array(
				'referenceNum' => $reference_num,
				'amount' => 0,
				'paidUpTo' => "None",
				'status' => "New",
				);
			$assessmentId = $this->Assessment_m->insert_assessment($assessment_fields);

			$renewal_field = array(
				'referenceNum' => $reference_num,
				'year' => date('Y'),
				);
			$this->Renewal_m->insert($renewal_field);
			$this->session->set_flashdata('message', 'Renewal request has been sent successfully!');

// redirect('dashboard');
			$data['referenceNum'] = $bplo_id;
			echo json_encode($data);
		}
}//END OF SUBMIT RENEWAL APPLICATION

// private function process_renewal_tax($activities, $previous_gross, $essential, $non_essential, $reference_num)
// {
// 	$assessment_field = array(
// 		'referenceNum' => $reference_num,
// 		'amount' => 0,
// 		'paidUpTo' => 'None',
// 		'status' => "Renew",
// 		);
// 	$assessment_id = $this->Assessment_m->insert_assessment($assessment_field);

// 	$bplo = new BPLO_Application($reference_num);
// 	$work_force = $bplo->get_MaleEmployees() + $bplo->get_FemaleEmployees() + $bplo->get_PWDEmployees();

// 	$environmental = 0;
// 	$garbage_service = 0;
// 	$zoning_fee = 0;

// 	foreach ($activities as $key => $activity) 
// 	{
// 		$total_gross = $essential[$key] + $non_essential[$key];
// 		$query['activityId'] = $this->encryption->decrypt($activity);
// 		$lineOfBusiness = $this->Business_Activity_m->get_all_business_activity($query);
// 		$lineOfBusiness[0]->capitalization = $total_gross;
// 		$imposition_of_tax = $lineOfBusiness[0]->impositionOfTaxCategory;
// 		if($imposition_of_tax == "A" && $imposition_of_tax == "B" && $imposition_of_tax == "D")
// 		{
// 			$fee = Assessment::compute_renewal_tax($imposition_of_tax, $essential[$key], "essential");
// 			$charge_field = array(
// 				'assessmentId' => $assessment_id,
// 				'due' => $fee,
// 				'surcharge' => 0,
// 				'interest' => 0,
// 				'particulars' => "TAX ON ".strtoupper($line_of_business[0]->lineOfBusiness)." (ESSENTIAL)",
// 				'computed' => 0,
// 				);
// 			$this->Assessment_m->add_charge($charge_field);

// 			$fee = Assessment::compute_renewal_tax($imposition_of_tax, $non_essential[$key], "non-essential");
// 			$charge_field = array(
// 				'assessmentId' => $assessment_id,
// 				'due' => $fee,
// 				'surcharge' => 0,
// 				'interest' => 0,
// 				'particulars' => "TAX ON ".strtoupper($line_of_business[0]->lineOfBusiness)." (NON-ESSENTIAL)",
// 				'computed' => 0,
// 				);
// 			$this->Assessment_m->add_charge($charge_field);
// 		}
// 		else
// 		{
// 			$fee = Assessment::compute_renewal_tax($imposition_of_tax, $total_gross);
// 			$charge_field = array(
// 				'assessmentId' => $assessment_id,
// 				'due' => $fee,
// 				'surcharge' => 0,
// 				'interest' => 0,
// 				'particulars' => "TAX ON ".strtoupper($line_of_business[0]->lineOfBusiness),
// 				'computed' => 0,
// 				);
// 			$this->Assessment_m->add_charge($charge_field);
// 		}

// 		$fees = Assessment::compute_mayors_permit_fee($line_of_business[0], $work_force);
// 		$environmental_total += Assessment::compute_environmental_clearance_fee($line_of_business[0]->capitalization);
// 		$garbage_service_fee[] = $fees['garbage_service_fee'];
// 		$charge_field = array(
// 			'assessmentId' => $assessment_id,
// 			'due' => $fees['mayor_fee'],
// 			'surcharge' => 0,
// 			'interest' => 0,
// 			'particulars' => 'MAYOR\'S PERMIT FEE ('.strtoupper($line_of_business[0]->lineOfBusiness).')',
// 			'computed' => 0,
// 			);
// 		$this->Assessment_m->add_charge($charge_field);
// 		if($fees['tax'] > 1000)
// 		{
// 			switch($bplo->get_modeOfPayment())
// 			{
// 				case "Anually":
// 				$tax[0] = $fees['tax'];
// 				break;
// 				case "Semi-Anually":
// 				$tax[0] = $fees['tax']/2;
// 				$tax[1] = $fees['tax']/2;
// 				break;
// 				case "Quarterly":
// 				$tax[0] = $fees['tax']/4;
// 				$tax[1] = $fees['tax']/4;
// 				$tax[2] = $fees['tax']/4;
// 				$tax[3] = $fees['tax']/4;
// 				break;
// 			}

// 			foreach ($tax as $key => $t) {
// 				$charge_field = array(
// 					'assessmentId' => $assessment_id,
// 					'period' => "Q" . ($key+1),
// 					'due' => $t,
// 					'surcharge' => 0,
// 					'interest' => 0,
// 					'particulars' => 'TAX ON '.strtoupper($line_of_business[0]->lineOfBusiness)
// 					);
// 				$this->Assessment_m->add_charge($charge_field);
// 			}
// 		}
// 		else
// 		{
// 			$charge_field = array(
// 				'assessmentId' => $assessment_id,
// 				'period' => "F1",
// 				'due' => $fees['tax'],
// 				'surcharge' => 0,
// 				'interest' => 0,
// 				'particulars' => 'TAX ON '.strtoupper($line_of_business[0]->lineOfBusiness)
// 				);
// 			$this->Assessment_m->add_charge($charge_field);
// 		}
// 	}

// 	$sanitary_fee = Assessment::compute_sanitary_permit_fee($bplo->get_BusinessArea());
// 	$fixed_fees = Assessment::get_fixed_fees($work_force);

// 	$charge_field = array(
// 		'assessmentId' => $assessment_id,
// 		'due' => $environmental_total,
// 		'surcharge' => 0,
// 		'interest' => 0,
// 		'particulars' => 'ENVIRONMENTAL CLEARANCE FEE',
// 		'computed' => 0,
// 		);
// 	$this->Assessment_m->add_charge($charge_field);
// 	$charge_field = array(
// 		'assessmentId' => $assessment_id,
// 		'due' => $garbage_service_fee[0],
// 		'surcharge' => 0,
// 		'interest' => 0,
// 		'particulars' => 'GARBAGE SERVICE FEE',
// 		'computed' => 0,
// 		);
// 	$this->Assessment_m->add_charge($charge_field);

// 	$health_card_fee = Assessment::compute_health_card_fee($work_force);
// 	$charge_field = array(
// 		'assessmentId' => $assessment_id,
// 		'due' => $health_card_fee,
// 		'period' => 'F1',
// 		'surcharge' => 0,
// 		'interest' => 0,
// 		'computed' => 0,
// 		'particulars' => 'HEALTH CARD FEE',
// 		);
// 	$this->Assessment_m->add_charge($charge_field);

// 	$sanitary_fee = Assessment::compute_sanitary_permit_fee($bplo->get_BusinessArea());
// 	$charge_field = array(
// 		'assessmentId' => $assessment_id,
// 		'due' => $sanitary_fee,
// 		'period' => 'F1',
// 		'surcharge' => 0,
// 		'interest' => 0,
// 		'computed' => 0,
// 		'particulars' => 'SANITARY PERMIT FEE',
// 		);
// 	$this->Assessment_m->add_charge($charge_field);

// 	$fixed_fees = Assessment::get_fixed_fees();
// 	foreach ($fixed_fees['fee'] as $key => $fee) {
// 		$charge_field = array(
// 			'assessmentId' => $assessment_id,
// 			'due' => $fee,
// 			'period' => 'F1',
// 			'surcharge' => 0,
// 			'interest' => 0,
// 			'computed' => 0,
// 			'particulars' => strtoupper($fixed_fees['particular'][$key]),
// 			);
// 		$this->Assessment_m->add_charge($charge_field);
// 	}

// 	$this->Assessment_m->refresh_assessment_amount(['referenceNum' => $reference_num]);
// }

private function archive_record($reference_num)
{
	$bplo = new BPLO_Application($reference_num);
	$cenro = new CENRO_Application($reference_num);
	$bfp = new BFP_Application($reference_num);
	$sanitary = new Sanitary_Application($reference_num);

// $data['bplo'] = $bplo;
// $data['cenro'] = $cenro;
// $data['bfp'] = $bfp;
// $data['sanitary'] = $sanitary;

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// exit();

//fugitiveParticulates
	$fugitive_particulates = null;
	foreach ($cenro->get_FugitiveParticulates() as $key => $value) {
		$fugitive_particulates .= "|".$value;
	}
	$fugitive_particulates = substr($fugitive_particulates, 1);

//steamGenerator
	$steam_generator = null;
	foreach ($cenro->get_SteamGenerator() as $key => $value) {
		$steam_generator .= "|".$value;
	}
	$steam_generator = substr($steam_generator, 1);

//wasteMinimizationMethod
	$waste_minimization_method = null;
	foreach ($cenro->get_WasteMinimizationMethod() as $key => $value) {
		$waste_minimization_method .= "|".$value;
	}
	$waste_minimization_method = substr($waste_minimization_method, 1);
// echo "<pre>";
// var_dump($fugitive_particulates." ".$steam_generator." ".$waste_minimization_method);
// echo "</pre>";
// exit();


	$archive_application_field = array(
		'referenceNum' => $reference_num,
		'userId' => $this->encryption->decrypt($bplo->get_UserId()),
		'taxYear' => $bplo->get_taxyear(),
		'applicationDate' => $bplo->get_ApplicationDate(),
		'modeOfPayment' => $bplo->get_ModeOfPayment(),
		'idPresented' => $bplo->get_IdPresented(),
		'DTISECCDA_RegNum' => $bplo->get_DTISECCDARegNum(),
		'DTISECCDA_Date' => $bplo->get_DTISECCDADate(),
		'brgyClearanceDateIssued' => $bplo->get_BrgyClearanceDateIssued(),
		'CTCNum' => $bplo->get_CTCNum(),
		'TIN' => $bplo->get_TIN(),
		'entityName' => $bplo->get_EntityName(),
		'dateStarted' => $bplo->get_DateStarted(),
		'presidentTreasurerName' => $bplo->get_PresidentTreasurerName(),
		'businessName' => $bplo->get_BusinessName(),
		'companyName' => $bplo->get_CompanyName(),
		'tradeName' => $bplo->get_TradeName(),
		'signageName' => $bplo->get_SignageName(),
		'organizationType' => $bplo->get_OrganizationType(),
		'corporationName' => $bplo->get_CorporationName(),
		'dateOfOperation' => $bplo->get_DateOfOperation(),
		'businessDesc' => $bplo->get_BusinessDesc(),
		'PIN' => $bplo->get_PIN(),
		'bldgName' => $bplo->get_BldgName(),
		'houseBldgNum' => $bplo->get_HouseBldgNum(),
		'unitNum' => $bplo->get_UnitNum(),
		'street' => $bplo->get_Street(),
		'subdivision' => $bplo->get_Subdivision(),
		'barangay' => $bplo->get_Barangay(),
		'cityMunicipality' => $bplo->get_CityMunicipality(),
		'province' => $bplo->get_province(),
		'telNum' => $bplo->get_TelNum(),
		'email' => $bplo->get_Email(),
		'pollutionControlOfficer' => $bplo->get_PollutionControlOfficer(),
		'maleEmployees' => $bplo->get_MaleEmployees(),
		'femaleEmployees' => $bplo->get_FemaleEmployees(),
		'PWDEmployees' => $bplo->get_PWDEmployees(),
		'LGUEMployees' => $bplo->get_LGUEmployees(),
		'businessArea' => $bplo->get_BusinessArea(),
		'emergencyContactPerson' => $bplo->get_EmergencyContactPerson(),
		'emergencyTelNum' => $bplo->get_EmergencyTelNum(),
		'emergencyEmail' => $bplo->get_EmergencyEmail(),
		'zoneType' => $bplo->get_ZoneType(),
		'lat' => $bplo->get_lat(),
		'lng' => $bplo->get_lng(),
		'gmapAddress' => $bplo->get_GmapAddress(),
		'ownerFirstName' => $bplo->get_FirstName(),
		'ownerMiddleName' => $bplo->get_MiddleName(),
		'ownerLastName' => $bplo->get_LastName(),
		'ownerHouseBldgNum' => $bplo->get_OwnerHouseBldgNo(),
		'ownerBldgName' => $bplo->get_OwnerBldgName(),
		'ownerUnitNum' => $bplo->get_OwnerUnitNum(),
		'ownerStreet' => $bplo->get_OwnerStreet(),
		'ownerBarangay' => $bplo->get_OwnerBarangay(),
		'ownerSubdivision' => $bplo->get_OwnerSubdivision(),
		'ownerCityMunicipality' => $bplo->get_OwnerCityMunicipality(),
		'ownerProvince' => $bplo->get_OwnerProvince(),
		'ownerContactNum' => $bplo->get_OwnerContactNum(),
		'ownerTelNum' => $bplo->get_OwnerTelnum(),
		'ownerEmail' => $bplo->get_OwnerEmail(),
		'ownerPIN' => $bplo->get_OwnerPIN(),
		'CNC' => $cenro->get_CNC(),
		'LLDAClearance' => $cenro->get_LLDAClearance(),
		'dischargePermit' => $cenro->get_DischargePermit(),
		'apsci' => $cenro->get_APSCI(),
		'productsAndByProducts' => $cenro->get_productsAndByProducts(),
		'smokeEmission' => $cenro->get_SmokeEmission(),
		'volatileCompound' => $cenro->get_VolatileCompound(),
		'fugitiveParticulates' => $fugitive_particulates,
		'steamGenerator' => $steam_generator,
		'APCD' => $cenro->get_APCD(),
		'stackHeight' => $cenro->get_StackHeight(),
		'wastewaterTreatmentFacility' => $cenro->get_WasteWaterTreatmentFacility(),
		'wastewaterTreatmentOperationAndProcess' => $cenro->get_WasteWaterTreatmentOperationAndProcess(),
		'pendingCaseWithLLDA' => $cenro->get_pendingCaseWithLLDA(),
		'typeOfSolidWastesGenerated' => $cenro->get_TypeOfSolidWastesGenerated(),
		'qtyPerDay' => $cenro->get_QtyPerDay(),
		'garbageCollectionMethod' => $cenro->get_GarbageCollectionMethod(),
		'frequencyOfGarbageCollection' => $cenro->get_FrequencyOfGarbageCollection(),
		'wasteCollector' => $cenro->get_WasteCollector(),
		'collectorAddress' => $cenro->get_CollectorAddress(),
		'garbageDisposalMethod' => $cenro->get_GarbageDisposalMethod(),
		'wasteMinimizationMethod' => $waste_minimization_method,
		'drainageSystem' => $cenro->get_DrainageSystem(),
		'drainageType' => $cenro->get_DrainageType(),
		'drainageDischargeLocation' => $cenro->get_DrainageDischargeLocation(),
		'sewerageSystem' => $cenro->get_SewerageSystem(),
		'septicTank' => $cenro->get_SepticTank(),
		'sewerageDischargeLocation' => $cenro->get_SewerageDischargeLocation(),
		'waterSupply' => $cenro->get_WaterSupply(),
		'storeys' => $bfp->get_Storeys(),
		'occupiedPortion' => $bfp->get_OccupiedPortion(),
		'areaPerFloor' => $bfp->get_AreaPerFloor(),
		'occupancyPermitNum' => $bfp->get_OccupancyPermitNum(),
		'annualEmployeePhysicalExam' => $sanitary->get_AnnualEmployeePhysicalExam(),
		'typeLevelOfWaterSource' => $sanitary->get_typeLevelOfWaterSource()
		);
$archive_application_id = $this->Archive_m->insert_application($archive_application_field);

foreach ($bplo->get_BusinessActivities() as $key => $activity) {
	$business_activity_field = array(
		'archiveApplicationId' => $archive_application_id,
		'lineOfBusiness' => $activity->lineOfBusiness,
		'capitalization' => $activity->capitalization,
		);
	$this->Archive_m->insert_business_activity($business_activity_field);
}

if($bplo->get_lessors() != null)
{
	$lessors_field = array(
		'archiveApplicationId' => $archive_application_id,
		'firstName' => $bplo->get_lessors()->firstName,
		'middleName' => $bplo->get_lessors()->middleName,
		'lastName' => $bplo->get_lessors()->lastName,
		'address' => $bplo->get_lessors()->address,
		'subdivision' => $bplo->get_lessors()->subdivision,
		'barangay' => $bplo->get_lessors()->barangay,
		'cityMunicipality' => $bplo->get_lessors()->cityMunicipality,
		'province' => $bplo->get_lessors()->province,
		'monthlyRental' => $bplo->get_lessors()->monthlyRental,
		'telNum' => $bplo->get_lessors()->telNum,
		'email' => $bplo->get_lessors()->email,
		);
	$this->Archive_m->insert_lessor($lessors_field);
}
}

public function payment($reference_num)
{
	$this->isLogin();
	echo script_tag('assets/js/jquery.min.js');
	echo script_tag('assets/js/parsley.min.js');
	$navdata['title'] = 'BPLO - Finalize';
	$navdata['active'] = 'Applications';
//get notifications
	$navdata['notifications'] = User::get_notifications();
	$navdata['completed'] = User::get_complete_notifications();
	$this->_init_matrix($navdata);
	$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $reference_num));

	$data['application'] = new BPLO_Application($reference_num);
	$payments = $this->Payment_m->get_recent_payments($data['application']->get_assessment()->assessmentId);
	$data['total_paid'] = 0;
	if(count($payments) > 0)
	{
		$total_recent_payment = 0;
		foreach ($payments as $key => $payment) {
			$data['total_paid'] += $payment->amountPaid;
		}
	}

	$this->load->view('dashboard/bplo/finalization', $data);
}

public function pay_unsettled_charges($reference_num)
{
	$this->isLogin();
	echo script_tag('assets/js/jquery.min.js');
	echo script_tag('assets/js/parsley.min.js');
	$navdata['title'] = 'BPLO - Finalize';
	$navdata['active'] = 'Applications';
//get notifications
	$navdata['notifications'] = User::get_notifications();
	$navdata['completed'] = User::get_complete_notifications();
	$this->_init_matrix($navdata);
	$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $reference_num));

	$data['application'] = new BPLO_Application($reference_num);
	$payments = $this->Payment_m->get_recent_payments($data['application']->get_assessment()->assessmentId);
	$data['total_paid'] = 0;
	if(count($payments) > 0)
	{
		$total_recent_payment = 0;
		foreach ($payments as $key => $payment) {
			$data['total_paid'] += $payment->amountPaid;
		}
	}

	$this->load->view('dashboard/bplo/payments-view', $data);
}

public function accept_payment($assessment_id)
{
	$this->isLogin();
	$assessment_id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $assessment_id));

	$this->form_validation->set_rules('hidden-paid-up-to', 'Paid Up To','required');
	$this->form_validation->set_rules('or-number', 'OR Number','required');

	if($this->form_validation->run() == false)
	{
		$reference_num = str_replace(['/','+','='], ['-','_','='], $this->input->post('ref'));
		$this->session->set_flashdata('message', validation_errors());
		echo validation_errors();
	}
	else
	{
		$amount_paid = str_replace(',', '', $this->input->post('amount-paid'));
		$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $this->input->post('ref')));

		$query['referenceNum'] = $reference_num;
		$paid_up_to = $this->input->post('hidden-paid-up-to');
		$this->Assessment_m->update_assessment($query, $amount_paid, $paid_up_to);

		$payment_field = array(
			'referenceNum' => $reference_num,
			'assessmentId' => $assessment_id,
			'orNumber' =>  $this->input->post('or-number'),
			'amountPaid' => $amount_paid,
			'quarterPaid' => $paid_up_to,
			);
		$this->Payment_m->insert_payment($payment_field);

		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$role_Id = $this->Role_m->get_roleId($role);
		// BPLO_Application::update_status($reference_num, 'Active');

		$query = array(
			'referenceNum' => $reference_num,
			'role' => $role_Id->roleId,
			'type' => "Issue",
			'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
			);
		$this->Approval_m->insert($query);

		$bplo = new BPLO_Application($reference_num);

		unset($query);
		switch($paid_up_to)
		{
			case "First Quarter":
			$query = "assessmentId = '".$assessment_id."' AND (period = 'Q1' OR period = 'F1')";
			$set['status'] = 'paid';
			$this->Assessment_m->update_charges($query, $set);
			break;

			case "Second Quarter": 
			$query = "assessmentId = '".$assessment_id."' AND (period = 'Q1' OR period = 'F1' OR period = 'Q2')";
			$set['status'] = 'paid';
			$this->Assessment_m->update_charges($query, $set);
			break;

			case "Third Quarter": 
			$query = "assessmentId = '".$assessment_id."' AND (period = 'Q1' OR period = 'F1' OR period = 'Q2' OR period = 'Q3')";
			$set['status'] = 'paid';
			$this->Assessment_m->update_charges($query, $set);
			break;

			case "Fourth Quarter": 
			$query = "assessmentId = '".$assessment_id."' AND (period = 'Q1' OR period = 'F1' OR period = 'Q2' OR period = 'Q3' OR period = 'Q4')";
			$set['status'] = 'paid';
			$this->Assessment_m->update_charges($query, $set);
			break;
		}

		// $fields = array(
		// 	'referenceNum' => $reference_num,
		// 	'dept' => $role,
		// 	'type' => $bplo->get_ApplicationType()=="New" ? 'New' : 'Renew',
		// 	);
		// $this->Issued_Application_m->insert($fields);

		$this->session->set_flashdata('message', 'Payment Received');

		redirect('dashboard');
	}
}

public function submit_payment($assessment_id)
{
	$this->isLogin();
	$assessment_id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $assessment_id));

	$this->form_validation->set_rules('hidden-paid-up-to', 'Paid Up To','required');
	$this->form_validation->set_rules('or-number', 'OR Number','required');

	if($this->form_validation->run() == false)
	{
// echo "<script> console.log('validation_errors()')</script>";
		$reference_num = str_replace(['/','+','='], ['-','_','='], $this->input->post('ref'));
		$this->session->set_flashdata('message', validation_errors());
		echo validation_errors();

	// redirect("form/finalize/".$reference_num);
	}
	else
	{
		$amount_paid = str_replace(',', '', $this->input->post('amount-paid'));
		$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $this->input->post('ref')));

		// $bplo = new BPLO_Application($reference_num);
		// echo "<pre>";
		// print_r($bplo);
		// echo "</pre>";
		// exit();

		$query['referenceNum'] = $reference_num;
		$paid_up_to = $this->input->post('hidden-paid-up-to');
		$this->Assessment_m->update_assessment($query, $amount_paid, $paid_up_to);

		$payment_field = array(
			'referenceNum' => $reference_num,
			'assessmentId' => $assessment_id,
			'orNumber' =>  $this->input->post('or-number'),
			'amountPaid' => $amount_paid,
			'quarterPaid' => $paid_up_to,
			);
		$this->Payment_m->insert_payment($payment_field);

		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$role_Id = $this->Role_m->get_roleId($role);
		BPLO_Application::update_status($reference_num, 'Active');

		$query = array(
			'referenceNum' => $reference_num,
			'role' => $role_Id->roleId,
			'type' => "Issue",
			'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
			);
		$this->Approval_m->insert($query);

		$bplo = new BPLO_Application($reference_num);

		unset($query);
		switch($paid_up_to)
		{
			case "First Quarter":
			$query = "assessmentId = '".$assessment_id."' AND (period = 'Q1' OR period = 'F1')";
			$set['status'] = 'paid';
			$this->Assessment_m->update_charges($query, $set);
			break;

			case "Second Quarter": 
			$query = "assessmentId = '".$assessment_id."' AND (period = 'Q1' OR period = 'F1' OR period = 'Q2')";
			$set['status'] = 'paid';
			$this->Assessment_m->update_charges($query, $set);
			break;

			case "Third Quarter": 
			$query = "assessmentId = '".$assessment_id."' AND (period = 'Q1' OR period = 'F1' OR period = 'Q2' OR period = 'Q3')";
			$set['status'] = 'paid';
			$this->Assessment_m->update_charges($query, $set);
			break;

			case "Fourth Quarter": 
			$query = "assessmentId = '".$assessment_id."' AND (period = 'Q1' OR period = 'F1' OR period = 'Q2' OR period = 'Q3' OR period = 'Q4')";
			$set['status'] = 'paid';
			$this->Assessment_m->update_charges($query, $set);
			break;
		}

		$fields = array(
			'referenceNum' => $reference_num,
			'dept' => $role,
			'type' => $bplo->get_ApplicationType()=="New" ? 'New' : 'Renew',
			);
		$this->Issued_Application_m->insert($fields);

		$this->session->set_flashdata('message', 'Payment validated, applicant can now claim his/her business permit and business plate');

		redirect('dashboard');
	}
}

public function submit_retirement($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $reference_num));
	$this->form_validation->set_rules('activity-id[]', 'Activity ID', 'required');
	$this->form_validation->set_rules('reason', 'Reason for retirement / Closure of Business', 'required');
	$this->form_validation->set_rules('essentials[]', 'Essentials', 'required');
	$this->form_validation->set_rules('non-essentials[]', 'Non-Essentials', 'required');

	if($this->form_validation->run() == false)
	{
		$this->session->set_flashdata('error', validation_errors());
		$application = new BPLO_Application($reference_num);
//bin2hex($this->encryption->encrypt($application->get_applicationId().'|'.$this->encryption->decrypt($application->get_reference_num()), $custom_encrypt))
		$custom_encrypt = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);
		$encrypted_url = bin2hex($this->encryption->encrypt($application->get_applicationId()."|".$reference_num, $custom_encrypt));
		redirect('form/view/'.$encrypted_url);
	}
	else
	{
		$application = new BPLO_Application($reference_num);
//$previous_gross = $application->get_applicationType() == "New" ? $activity->capitalization : $activity->previousGross[0]->essentials + $activity->previousGross[0]->nonEssentials;
		$activity_id = $this->input->post('activity-id');
		$essentials = $this->input->post('essentials');
		$non_essentials = $this->input->post('non-essentials');

		foreach ($application->get_BusinessActivities() as $key => $activity) {
			$previous_gross[] = $application->get_applicationType() == "New" ? $activity->capitalization : $activity->previousGross[0]->essentials + $activity->previousGross[0]->nonEssentials;
		}

		foreach ($activity_id as $key => $activity) {
			$gross_fields = array(
				'activityId' => $this->encryption->decrypt($activity),
				'previousGross' => $previous_gross[$key],
				'essentials' => $essentials[$key],
				'nonEssentials' => $non_essentials[$key]
				);
			$this->Gross_m->insert($gross_fields);
		}

		$retirement_field = array(
			'referenceNum' => $reference_num,
			'reason' => $this->input->post('reason'),
			'status' => 'For approval',
			);
		$this->Retirement_m->insert($retirement_field);

		BPLO_Application::update_status($reference_num, 'For Retirement');

//send notification to BPLO for retirement
		$notification_fields = array(
			'referenceNum' => $reference_num,
			'status' => 'Unread',
			'role' => 4,
			'notifMessage' => 'Retirement',
			);
		$this->Notification_m->insert($notification_fields);

		redirect('dashboard');
	}
}

public function get_total_payment()
{
	$this->isLogin();
	$paid_up_to = $this->input->post('paid_up_to');
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $this->input->post('ref')));
	$assessment_id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $this->input->post('aid')));

	$application = new BPLO_Application($reference_num);

	switch($paid_up_to)
	{
		case "First Quarter":
		$amount_paid = $application->get_quarterPayment()[0];
		break;
		case "Second Quarter":
		$amount_paid = $application->get_quarterPayment()[0] + $application->get_quarterPayment()[1];
		break;
		case "Third Quarter":
		$amount_paid = $application->get_quarterPayment()[0] + $application->get_quarterPayment()[1] + $application->get_quarterPayment()[2];
		break;
		case "Fourth Quarter":
		$amount_paid = $application->get_quarterPayment()[0] + $application->get_quarterPayment()[1] + $application->get_quarterPayment()[2] + $application->get_quarterPayment()[3];
		break;
	}

	$recent_payments = $this->Payment_m->get_recent_payments($assessment_id);

	if(count($recent_payments) > 0)
	{
		$total_recent_payment = 0;
		foreach ($recent_payments as $key => $payment) {
			$total_recent_payment += $payment->amountPaid;
		}
		$amount_paid -= $total_recent_payment;
	}
	echo json_encode(number_format($amount_paid,2));
// echo json_encode($assessment_id);
}


}//END OF CLASS
