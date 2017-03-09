<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		//object classes are autoloaded from config/autoload.php
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('Owner_m');
		$this->load->model('Role_m');
		$this->load->model('Renewal_m');
		$this->load->model('Reference_Number_m');
		$this->load->model('Application_m');
		$this->load->model('Lessor_m');
		$this->load->model('Gross_m');
		$this->load->model('Business_Activity_m');
		$this->load->model('Issued_Application_m');
		$this->load->model('Business_m');
		$this->load->model('Approval_m');
		$this->load->model('Payment_m');
		$this->load->model('Notification_m');
		$this->load->model('Retirement_m');
		$this->load->model('Assessment_m');
		$this->load->model('Business_Address_m');
		$this->load->model('Fee_m');
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
		$data['name'] = $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'];

		// var_dump($role)
		// exit();
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
			// $query['status'] = 'For applicant visit';
			// $data['pending'] = count($this->Application_m->get_all_bplo_applications($query));
				unset($query);

				$query['status'] = 'BPLO Interview and Assessment of Fees';
				$data['incoming'] = count($this->Application_m->get_all_bplo_applications($query));

				$query['status'] = 'On process';
				$data['process'] = count($this->Application_m->get_all_bplo_applications($query));

				$query['status'] = 'Completed';
				$data['complete'] = count($this->Application_m->get_all_bplo_applications($query));

				// $query['userId'] = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
				// // $query['status'] = 'For finalization';
				// // $data['finalization'] = count($this->Application_m->get_all_bplo_applications($query));

				$query['status'] = "For approval";
				$data['retirements'] = count($this->Retirement_m->get_all($query));

				$data['total'] = $data['incoming'];
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

	public function index()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$name = $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'];
		if($role != 'Applicant')
		{
			$permissionLevel = $this->session->userdata['userdata']['permissionLevel'];
			switch($this->encryption->decrypt($this->session->userdata['userdata']['role']))
			{
				case 'BPLO' : $role_id = '4'; break;
				case 'BFP' : $role_id = '5'; break;
				case 'CENRO' : $role_id = '7'; break;
				case 'Zoning' : $role_id = '8'; break;
				case 'Engineering' : $role_id = '9'; break;
				case 'CHO' : $role_id = '10'; break;
			}
		}


		if($role == 'Applicant')
		{
			$is_registered = $this->Owner_m->check_owner($user_id);
			if($is_registered)
			{
				$data['user'] = new User($user_id);

				$query['userId'] = $user_id;
				$data['applications'] = $this->Application_m->get_all_bplo_applications($query);
				foreach ($data['applications'] as $key => $value) {
					$data['applications'][$key] = new BPLO_Application($value->referenceNum);
					$data['applications'][$key]->set_applicationId($this->encryption->decrypt($data['applications'][$key]->get_applicationId()));
					$data['applications'][$key]->check_expiry();
				}

				//get applicant notifications
				$nav_data['notifications'] = User::get_notifications();
				$nav_data['title'] = "dashboard";

				//custom encryption credentials for URL encryption
				$data['custom_encrypt'] = array(
					'cipher' => 'blowfish',
					'mode' => 'ecb',
					'key' => $this->config->item('encryption_key'),
					'hmac' => false
					);
				// if($nav_data['notifications'] == "")
				// 	$this->_init();
				// else
				// echo "<pre>";
				// print_r($nav_data);
				// echo "</pre>";
				// exit();

				$this->_init($nav_data);

				if($this->Business_m->count_businesses() > 0)
					$this->load->view('dashboard/applicant/index', $data);
				else
					redirect('profile/add_business?ft=1');
			}
			//if applicant is still not a registered owner, force register.
			else
			{
				redirect('profile/add_owner?ft=1');
			}
		}
		else if($role == 'BPLO')
		{
			//CHECK EXPIRY
			$reference_numbers = $this->Reference_Number_m->get_all_reference_numbers();
			if(count($reference_numbers) > 0)
			{
				foreach ($reference_numbers as $key => $reference)
				{
					$application = new BPLO_Application($reference->referenceNum);
					if($application->get_assessment() != null)
						BPLO_Application::check_penalties($application->get_assessment()->assessmentId);
					$application->check_expiry();
					$application = new CENRO_Application($reference->referenceNum);
					$application->check_expiry();
					$application = new Zoning_Application($reference->referenceNum);
					$application->check_expiry();
					$application = new Sanitary_Application($reference->referenceNum);
					$application->check_expiry();
					$application = new BFP_Application($reference->referenceNum);
					$application->check_expiry();
					$application = new Engineering_Application($reference->referenceNum);
					$application->check_expiry();
				}
				unset($application);
			}

			$navdata['title'] = 'BPLO Dashboard';
			$navdata['active'] = 'Dashboard';
			//get notifications
			$navdata['new'] = User::get_notifications();
			$navdata['completed'] = User::get_complete_notifications();
			$this->_init_matrix($navdata);

			$query['status'] = 'On process';
			$application = $this->Application_m->get_latest_bplo_applications($query);
			foreach ($application as $key => $a) {
				$data['latest_applications'][] = new BPLO_Application($a->referenceNum);
			}

			$application = $this->Issued_Application_m->get_latest_issued(['dept' => 'BPLO']);
			foreach ($application as $key => $a) {
				$data['latest_issued'][] = new BPLO_Application($a->referenceNum);
				$data['latest_issued'][$key]->set_DateIssued(date('F j, o',strtotime($a->createdAt)));
			}
			// echo "<pre>";
			// print_r($data['latest_issued']);
			// echo "</pre>";
			// exit();


			// $data['applications'] = count($this->Application_m->get_all_bplo_applications());

			unset($query);
			if($permissionLevel == '1')
			{
				$query['staff'] = $name;
			}
			$query['role'] = $role_id;
			$query['DAY(createdAt)'] = date('d');
			$query['MONTH(createdAt)'] = date('m');
			$query['YEAR(createdAt)'] = date('Y');
			$data['dailylog'] = $this->Approval_m->get_all_sorted($query);

			// echo "<pre>";
			// print_r($data['latest_issued']);
			// echo "</pre>";
			// exit();ch

			unset($query);

			$data['total_issued'] = count($this->Issued_Application_m->get_all(['dept' => 'BPLO']));

			$data['renewed'] = count($this->Issued_Application_m->get_all(['type' => 'Renew']));

			$query['status'] = 'Expired';
			$data['expired'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = 'Cancelled';
			$data['cancelled'] = count($this->Application_m->get_all_bplo_applications($query));

			// $query['status'] = 'For finalization';
			// $data['finalization'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = 'BPLO Interview and Assessment of Fees';
			$data['incoming'] = count($this->Application_m->get_all_bplo_applications($query));

			// $query['status'] = 'For applicant visit';
			// $data['pending'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = 'On Process';
			$data['process'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = 'Completed';
			$data['complete'] = count($this->Application_m->get_all_bplo_applications($query));

			$data['unsettled_accounts'] = count($this->Application_m->get_all_bplo_applications_with_unsettled_charges());

			//CHANGE TO ISSUED_M
			unset($query);
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$data['issued'] = count($this->Issued_Application_m->get_all($query));

			unset($query);
			$query['status'] = 'For approval';
			$data['retirement'] = count($this->Retirement_m->get_all($query));

			$data['user'] = new User($user_id);
			$this->load->view('dashboard/bplo/index', $data);
		}
		else if($role == "CENRO")
		{
			$navdata['title'] = 'CENRO Dashboard';
			$navdata['active'] = 'Dashboard';
			$navdata['notifications'] = User::get_notifications();
			$this->_init_matrix($navdata);

			$query['status'] = 'For applicant visit';
			$data['incoming'] = count($this->Application_m->get_all_cenro_applications($query));

			$query['status'] = 'On process';
			$data['on_process'] = count($this->Application_m->get_all_cenro_applications($query));

			// $query['status'] = 'Active';
			// $data['issued'] =count($this->Application_m->get_all_cenro_applications($query));
			unset($query);
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$data['issued'] = count($this->Issued_Application_m->get_all($query));

			unset($query);

			$data['user'] = new User($user_id);
			$this->load->view('dashboard/cenro/index', $data);
		}
		else if($role == "Zoning")
		{
			$navdata['title'] = 'Zoning Dashboard(not final)';
			$navdata['active'] = 'Dashboard';
			$navdata['notifications'] = User::get_notifications();
			$this->_init_matrix($navdata);

			$query['status'] = 'For applicant visit';
			$data['incoming'] = count($this->Application_m->get_all_zoning_applications($query));

			$query['status'] = 'On Process';
			$data['on_process'] = count($this->Application_m->get_all_zoning_applications($query));

			// $query['status'] = 'Active';
			// $data['issued'] =count($this->Application_m->get_all_zoning_applications($query));
			unset($query);
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$data['issued'] = count($this->Issued_Application_m->get_all($query));

			unset($query);

			$data['user'] = new User($user_id);
			$this->load->view('dashboard/zoning/index', $data);
		}
		else if($role == "CHO")
		{
			$navdata['title'] = 'CHO Dashboard';
			$navdata['active'] = 'Dashboard';
			$navdata['notifications'] = User::get_notifications();
			$this->_init_matrix($navdata);


			$query['status'] = 'For applicant visit';
			$data['incoming'] = count($this->Application_m->get_all_sanitary_applications($query));

			$query['status'] = 'On Process';
			$data['on_process'] = count($this->Application_m->get_all_sanitary_applications($query));

			// $query['status'] = 'Active';
			// $data['issued'] =count($this->Application_m->get_all_sanitary_applications($query));
			unset($query);
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$data['issued'] = count($this->Issued_Application_m->get_all($query));

			unset($query);

			$data['user'] = new User($user_id);
			$this->load->view('dashboard/cho/index', $data);
		}
		else if($role == "Engineering")
		{
			$navdata['title'] = 'Engineering Dashboard';
			$navdata['active'] = 'Dashboard';
			$navdata['notifications'] = User::get_notifications();
			$this->_init_matrix($navdata);

			$query['status'] = 'For applicant visit';
			$data['incoming'] = count($this->Application_m->get_all_engineering_applications($query));

			$query['status'] = 'On Process';
			$data['on_process'] = count($this->Application_m->get_all_engineering_applications($query));

			// $query['status'] = 'Active';
			// $data['issued'] =count($this->Application_m->get_all_engineering_applications($query));
			unset($query);
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$data['issued'] = count($this->Issued_Application_m->get_all($query));

			unset($query);

			$data['user'] = new User($user_id);
			$this->load->view('dashboard/engineering/index', $data);
		}
		else if($role == "BFP")
		{
			$navdata['title'] = 'BFP Dashboard';
			$navdata['active'] = 'Dashboard';
			$navdata['notifications'] = User::get_notifications();
			$this->_init_matrix($navdata);

			$query['status'] = 'For applicant visit';
			$data['incoming'] = count($this->Application_m->get_all_bfp_applications($query));

			$query['status'] = 'On Process';
			$data['on_process'] = count($this->Application_m->get_all_bfp_applications($query));

			// $query['status'] = 'Active';
			// $data['issued'] =count($this->Application_m->get_all_bfp_applications($query));
			unset($query);
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$data['issued'] = count($this->Issued_Application_m->get_all($query));

			unset($query);

			$data['user'] = new User($user_id);
			$this->load->view('dashboard/bfp/index', $data);
		}
	}

	public function new_application()
	{
		//$this->load->js('templates/sb_admin2/sb_admin2_includes');
		echo script_tag('assets/js/dashboard.js');
		echo script_tag('assets/js/parsley.min.js');
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$data['line_of_business'] = $this->Fee_m->get_all_line_of_businesses();
		$data['business'] = $this->Business_m->get_all_unapplied_businesses($user_id);

		$this->load->view('dashboard/applicant/new_application',$data);
	}

	public function new_application_validate()
	{
		$this->isLogin();
		$this->_init();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$this->load->view('dashboard/applicant/new_application');
	}

	public function delete_draft($reference_num)
	{
		$this->isLogin();
		$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $reference_num));

		$isDraft = $this->Application_m->check_drafted_application($reference_num);
		if($isDraft)
		{
			$this->Reference_Number_m->delete_reference_number($reference_num);
		}

		redirect('Dashboard');
	}

	public function save_draft()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

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

		//check if application is existing or not
		if($this->input->post('ref'))
		{
			$isExisting = true;
			$reference_num = $this->encryption->decrypt($this->input->post('ref'));
		}
		else
		{
			$isExisting = false;
			//generate reference_number
			$reference_num = $this->Reference_Number_m->generate_reference_number();
		}


		if($this->input->post('business')==null)
		{
			$business_id = null;
		}
		else
		{
			$business_id = $this->encryption->decrypt($this->input->post('business'));
		}


		//START BPLO FORM
		$data['application_fields'] = array(
			'referenceNum' => $reference_num,
			'userId' => $user_id,
			'businessId' => $business_id,
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
			'status' => 'Draft'
			);
		//END BPLO FORM

		//START ZONING
		$zoning_fields = array(
			'userId' => $user_id,
			'referenceNum' => $reference_num,
			'businessId' =>$business_id,
				// 'capitalInvested' => 0,
			'status' => 'Draft',
			);
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
			'status' => 'Draft',
			);
		//END CENRO

		//SANITARY
		$sanitary_fields = array(
			'referenceNum' => $reference_num,
			'userId' =>  $user_id,
			'businessId' => $business_id,
			'applicationDate' => $this->input->post('application-date'),
			'annualEmployeePhysicalExam' => $this->input->post('annual-exams')=="Yes" ? 1 : 0,
			'typeLevelOfWaterSource' => $this->input->post('water-supply-type'),
			'status' => 'Draft',
			);
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
			'status' => 'Draft',
			);
		//END OF BFP

		//ENGINEERING
		$engineering_fields = array(
			'referenceNum' => $reference_num,
			'userId' => $user_id,
			'businessId' => $business_id,
			'status' => 'Draft',
			);
		//END ENGINEERING

		if(!$isExisting)
		{
			$bplo_id = $this->Application_m->insert_bplo($data['application_fields']);
			if ($this->input->post('rented')) {
				$data['lessor_fields'] = array(
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
				$this->Lessor_m->insert_lessor($data['lessor_fields']);
			}
			$this->Application_m->insert_zoning($zoning_fields);
			$this->Application_m->insert_cenro($cenro_fields);
			$this->Application_m->insert_sanitary($sanitary_fields);
			$this->Application_m->insert_bfp($bfp_fields);
			$this->Application_m->insert_engineering($engineering_fields);
		}
		else
		{
			$bplo_id = $this->Application_m->update_bplo($data['application_fields']);
			if ($this->input->post('rented'))
			{
				$data['lessor_fields'] = array(
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
				$isExisting = $this->Lessor_m->check_existing_lessor($bplo_id);
				if($isExisting)
				{
					$this->Lessor_m->update_lessor($data['lessor_fields']);
				}
				else
				{
					$this->Lessor_m->insert_lessor($data['lessor_fields']);
				}
			}
			else
			{
				$isExisting = $this->Lessor_m->check_existing_lessor($bplo_id);
				if($isExisting)
				{
					$this->Lessor_m->delete_lessor($bplo_id);
				}
			}
			$this->Application_m->update_zoning($zoning_fields);
			$this->Application_m->update_cenro($cenro_fields);
			$this->Application_m->update_sanitary($sanitary_fields);
			$this->Application_m->update_bfp($bfp_fields);
			$this->Application_m->update_engineering($engineering_fields);
		}

		echo json_encode("success");

	}//END OF DRAFT_APPLICATION

	public function draft_application($reference_num)
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		if($reference_num == null)
		{
			redirect('dashboard');
		}

		$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $reference_num));
		// echo "<pre>";
		// var_dump($reference_num);
		// echo "</pre>";
		// exit();

			//get notifications
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = 'dashboard';
		$this->_init($nav_data);

		$data['line_of_business'] = $this->Fee_m->get_all_line_of_businesses();
		// $data['financial_institutions'] = $this->Fee_m->get_financial_institution_fees();
		// echo "<pre>";
		// print_r($data['financial_institutions']);
		// echo "</pre>";
		// exit();
		$data['application'] = new BPLO_Application($reference_num);
		$data['bfp'] = new BFP_Application($reference_num);
		$data['cenro'] = new CENRO_Application($reference_num);
		$data['sanitary'] = new Sanitary_Application($reference_num);
		if($this->encryption->decrypt($data['application']->get_BusinessID()) != "")
			$data['business'] = new Business($this->encryption->decrypt($data['application']->get_BusinessID()));
		$data['businesses'] = $this->Business_m->get_all_unapplied_businesses($user_id);

		// echo "<pre>";
		// print_r($data['application']->get_entityName());
		// echo "</pre>";
		// exit();

		$this->load->view('dashboard/applicant/draft-application', $data);
	}

	public function submit_application()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$this->form_validation->set_rules('DTISECCDA_RegNum', 'DTI/SEC/CDA Registration Number', 'required|numeric');
		$this->form_validation->set_rules('DTISECCDA_Date', 'DTI/SEC/CDA Date', 'required');
		$this->form_validation->set_rules('brgy-clearance-date-issued','Barangay Clearance Date Issued', 'required');
		$this->form_validation->set_rules('ctc-number', 'CTC Number', 'required|numeric');
		$this->form_validation->set_rules('tin', 'TIN', 'required');
		$this->form_validation->set_rules('occupancy-permit-number', 'Occupancy Permit Number', 'required');
		$this->form_validation->set_rules('id-presented', 'ID Presented', 'required');
		$this->form_validation->set_rules('mode-of-payment', 'Mode of Payment', 'required');
		// $this->form_validation->set_rules('capital-invested', 'Capital Invested', 'required|numeric');
		$this->form_validation->set_rules('business', 'Business Profile', 'required');

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
		$this->form_validation->set_rules('line-of-business', 'Line of Business', 'required');
		// $this->form_validation->set_rules('num-of-units', 'Number of Units', 'required');
		$this->form_validation->set_rules('capitalization', 'Capitalization', 'required');

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
			echo json_encode($data);
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

			//check if application is existing or not
			if($this->input->post('ref'))
			{
				$isExisting = true;
				$reference_num = $this->encryption->decrypt($this->input->post('ref'));
			}
			else
			{
				$isExisting = false;
				//generate reference_number
				$reference_num = $this->Reference_Number_m->generate_reference_number();
			}


			if($this->input->post('business')==null)
			{
				$business_id = null;
			}
			else
			{
				$business_id = $this->encryption->decrypt($this->input->post('business'));
			}

			//START BPLO FORM
			$data['application_fields'] = array(
				'referenceNum' => $reference_num,
				'userId' => $user_id,
				'businessId' => $business_id,
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
			//END BPLO FORM

			//START ZONING
			$zoning_fields = array(
				'userId' => $user_id,
				'referenceNum' => $reference_num,
				'businessId' =>$business_id,
				'status' => 'standby',
				);
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
			//END OF BFP

			//ENGINEERING
			$engineering_fields = array(
				'referenceNum' => $reference_num,
				'userId' => $user_id,
				'businessId' => $business_id,
				'status' => 'For applicant visit',
				);
			//END ENGINEERING

			//SUBMIT FIELDS
			if(!$isExisting)
			{
				$bplo_id = $this->Application_m->insert_bplo($data['application_fields']);
				if ($this->input->post('rented')) {
					$data['lessor_fields'] = array(
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
					$this->Lessor_m->insert_lessor($data['lessor_fields']);
				}
				$this->Application_m->insert_zoning($zoning_fields);
				$this->Application_m->insert_cenro($cenro_fields);
				$this->Application_m->insert_sanitary($sanitary_fields);
				$this->Application_m->insert_bfp($bfp_fields);
				$this->Application_m->insert_engineering($engineering_fields);
			}
			else
			{
				$bplo_id = $this->Application_m->update_bplo($data['application_fields']);
				if ($this->input->post('rented'))
				{
					$data['lessor_fields'] = array(
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
					$isExisting = $this->Lessor_m->check_existing_lessor($bplo_id);
					if($isExisting)
					{
						$this->Lessor_m->update_lessor($data['lessor_fields']);
					}
					else
					{
						$this->Lessor_m->insert_lessor($data['lessor_fields']);
					}
				}
				else
				{
					$isExisting = $this->Lessor_m->check_existing_lessor($bplo_id);
					if($isExisting)
					{
						$this->Lessor_m->delete_lessor($bplo_id);
					}
				}
				$this->Application_m->update_zoning($zoning_fields);
				$this->Application_m->update_cenro($cenro_fields);
				$this->Application_m->update_sanitary($sanitary_fields);
				$this->Application_m->update_bfp($bfp_fields);
				$this->Application_m->update_engineering($engineering_fields);
			}//END SUBMIT FIELDS

			//SEND NOTIFICATION TO ENGINEERING
			$query = array(
				'referenceNum' => $reference_num,
				'status' => "Unread",
				'role' => 9,
				'notifMessage' => "Incoming",
				);
			$this->Notification_m->insert($query);

			//prepare assessment
			$assessment_fields = array(
				'referenceNum' => $reference_num,
				'amount' => 0,
				'paidUpTo' => "None",
				'status' => "New",
				);
			$assessmentId = $this->Assessment_m->insert_assessment($assessment_fields);

			$data['referenceNum'] = $bplo_id; //referenceNum changed to bploId
			echo json_encode($data);
		}
	}//END OF SUBMIT_APPLICATION

	public function store_business_activity()
	{
		if($this->input->post('lineOfBusiness') != "" && $this->input->post('capitalization') != "")
		{
			$bplo_id = $this->input->post('referenceNum');
			$line_of_business = $this->encryption->decrypt($this->input->post('lineOfBusiness'));
			$capitalization = $this->input->post('capitalization');
			$isExisting = $this->Business_Activity_m->check_business_activity($bplo_id, $line_of_business);

			$query['applicationId'] = $bplo_id;
			$application = $this->Application_m->get_all_bplo_applications($query);
			$bplo = new BPLO_Application($application[0]->referenceNum);

			//check if line of business is existing on specific user.
			//if not, insert new business activity
			//if is existing, get business activity and add current capitalization to new user input capitalization then update business activity
			if(!$isExisting)
			{
				$fields = array(
					'bploId' => $bplo_id,
					'lineOfBusiness' => $line_of_business,
					'capitalization' => $capitalization,
					'activityStatus' => $bplo->get_applicationType()=='New' ? 'active' : 'new',
					);
				$this->Business_Activity_m->insert_business_activity($fields);
			}
			else
			{
				if($bplo->get_applicationType() == "New")
				{
					$total_capitalization = $isExisting[0]->capitalization + $capitalization;
					$activity_id = $isExisting[0]->activityId;
					$set['capitalization'] = $total_capitalization;
					$this->Business_Activity_m->update_business_activity($activity_id, $set);
				}
			}

		}
		$ctr = $this->input->post('ctr');
		$total = $this->input->post('total_rows');
		if($ctr == $total)
		{
			echo json_encode("success");
		}
		else
		{
			echo json_encode($ctr." out of ".$total);
		}
	}

	public function get_business_activities()
	{
		$this->isLogin();
		$data['business_activity'] = $this->Fee_m->get_all_line_of_businesses();
		$this->load->view('dashboard/applicant/ajax-business-activities', $data);
	}

	public function remove_business_activity($activity_id)
	{
		$this->isLogin();
		$activity_id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $activity_id));

		$set = array(
			'status' => 'removed'
			);
		$this->Business_Activity_m->update_business_activity($activity_id, $set);

		echo json_encode("Success");
	}

	public function incoming_applications()
	{
		$this->isLogin();
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$navdata['title'] = 'Incoming Applications';
		$navdata['active'] = 'Applications';


		if($role == "BPLO")
		{
			$this->update_notif('New');
			$navdata['new'] = User::get_notifications();
			$navdata['completed'] = User::get_complete_notifications();
		}
		else
		{
			$this->update_notif("Incoming");
			$navdata['notifications'] = User::get_notifications();
		}
		

		$this->_init_matrix($navdata);

		if($role == "BPLO")
		{
			$query['status'] = 'BPLO Interview and Assessment of Fees';
			$applications = $this->Application_m->get_all_bplo_applications($query);

			if(count($applications) > 0)
			{
				foreach ($applications as $key => $value) {
					$data['incoming'][$key] = new BPLO_Application($value->referenceNum);
			//decrypting appId property for custom encryption
					$data['incoming'][$key]->set_applicationId($this->encryption->decrypt($data['incoming'][$key]->get_applicationId()));
				}
			}
			else
			{
				$data['incoming'] = [];
			}
		}
		else if ($role == "Zoning")
		{
			$query['status'] = 'For applicant visit';
			$applications = $this->Application_m->get_all_zoning_applications($query);

			foreach ($applications as $key => $value) {
				$data['incoming'][$key] = new Zoning_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['incoming'][$key]->set_applicationId($this->encryption->decrypt($data['incoming'][$key]->get_applicationId()));
			}
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// exit();
		}
		else if ($role == "CENRO")
		{
			$query['status'] = 'For applicant visit';
			$applications = $this->Application_m->get_all_cenro_applications($query);

			foreach ($applications as $key => $value) {
				$data['incoming'][$key] = new CENRO_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['incoming'][$key]->set_applicationId($this->encryption->decrypt($data['incoming'][$key]->get_applicationId()));
			}
		}
		else if ($role == "CHO")
		{
			$query['status'] = 'For applicant visit';
			$applications = $this->Application_m->get_all_sanitary_applications($query);

			foreach ($applications as $key => $value) {
				$data['incoming'][$key] = new Sanitary_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['incoming'][$key]->set_applicationId($this->encryption->decrypt($data['incoming'][$key]->get_applicationId()));
			}
		}
		else if ($role == "BFP")
		{
			$query['status'] = 'For applicant visit';
			$applications = $this->Application_m->get_all_bfp_applications($query);

			foreach ($applications as $key => $value) {
				$data['incoming'][$key] = new BFP_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['incoming'][$key]->set_applicationId($this->encryption->decrypt($data['incoming'][$key]->get_applicationId()));
			}
		}
		else if ($role == "Engineering")
		{
			$query['status'] = 'For applicant visit';
			$applications = $this->Application_m->get_all_engineering_applications($query);

			foreach ($applications as $key => $value) {
				$data['incoming'][$key] = new Engineering_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['incoming'][$key]->set_applicationId($this->encryption->decrypt($data['incoming'][$key]->get_applicationId()));
			}
		}

		//custom encryption credentials for URL encryption
		$data['custom_encrypt'] = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);

		$this->load->view('dashboard/incoming', $data);
	}

	// public function pending_applications()
	// {
	// 	$this->isLogin();
	// 	$navdata['title'] = "Pending Applications";
	// 	$navdata['active'] = 'Applications';
	// 	$navdata['notifications'] = User::get_notifications();
	// 	$this->_init_matrix($navdata);
	// 	$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
	// 	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);

	// 	if($role == 'BPLO')
	// 	{
	// 		$query['status'] = 'For applicant visit';
	// 		$applications = $this->Application_m->get_all_bplo_applications($query);

	// 		foreach ($applications as $key => $value) {
	// 			$data['pending'][$key] = new BPLO_Application($value->referenceNum);
	// 		//decrypting appId property for custom encryption
	// 			$data['pending'][$key]->set_applicationId($this->encryption->decrypt($data['pending'][$key]->get_applicationId()));
	// 		}
	// 	}

	// 	//custom encryption credentials for URL encryption
	// 	$data['custom_encrypt'] = array(
	// 		'cipher' => 'blowfish',
	// 		'mode' => 'ecb',
	// 		'key' => $this->config->item('encryption_key'),
	// 		'hmac' => false
	// 		);

	// 	$this->load->view('dashboard/pending',$data);
	// }

	public function task_logs()
	{
		if($this->session->userdata['userdata']['permissionLevel'] == 2)
		{
			$this->isLogin();

			$navdata['title'] = "Task Logs";
			$navdata['active'] = 'Dashboard';
			$navdata['new'] = User::get_notifications();
			$navdata['completed'] = User::get_complete_notifications();
			$this->_init_matrix($navdata);

			$query['role'] = 4;
			$data['approvals'] = $this->Approval_m->get_all_desc($query);

			$this->load->view('dashboard/bplo/task-logs', $data);
		}
	}

	public function payments()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$navdata['title'] = "Payments";
		$navdata['active'] = 'Applications';
		if($role == "BPLO")
		{
			$navdata['new'] = User::get_notifications();
			$navdata['completed'] = User::get_complete_notifications();
		}
		else
		{
			$navdata['notifications'] = User::get_notifications();
		}
		$this->_init_matrix($navdata);
		

		$application = $this->Application_m->get_all_bplo_applications_with_unsettled_charges();
		$data['payment'] = [];
		foreach ($application as $key => $app) {
			$data['payment'][$key] = new BPLO_Application($app->referenceNum);
			$data['payment'][$key]->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['payment'][$key]->get_referenceNum()));
		}

		$this->load->view('dashboard/bplo/payment-table', $data);
	}

	public function on_process_applications()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$navdata['title'] = "On Process Applications";
		$navdata['active'] = 'Applications';
		if($role == "BPLO")
		{
			$navdata['new'] = User::get_notifications();
			$navdata['completed'] = User::get_complete_notifications();
		}
		else
		{
			$navdata['notifications'] = User::get_notifications();
		}
		$this->_init_matrix($navdata);
		

		if($role == "BPLO")
		{
			$query['status'] = 'On Process';
			$applications = $this->Application_m->get_all_bplo_applications($query);

			foreach ($applications as $key => $value) {
				$data['on_process'][$key] = new BPLO_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['on_process'][$key]->set_applicationId($this->encryption->decrypt($data['on_process'][$key]->get_applicationId()));
			}
		}
		else if($role == "Zoning")
		{
			$query['status'] = 'On Process';
			$applications = $this->Application_m->get_all_zoning_applications($query);

			foreach ($applications as $key => $value) {
				$data['on_process'][$key] = new Zoning_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['on_process'][$key]->set_applicationId($this->encryption->decrypt($data['on_process'][$key]->get_applicationId()));
			}
		}
		else if($role == "CENRO")
		{
			$query['status'] = 'On Process';
			$applications = $this->Application_m->get_all_cenro_applications($query);

			foreach ($applications as $key => $value) {
				$data['on_process'][$key] = new CENRO_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['on_process'][$key]->set_applicationId($this->encryption->decrypt($data['on_process'][$key]->get_applicationId()));
			}
		}
		else if($role == "CHO")
		{
			$query['status'] = 'On Process';
			$applications = $this->Application_m->get_all_sanitary_applications($query);

			foreach ($applications as $key => $value) {
				$data['on_process'][$key] = new Sanitary_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['on_process'][$key]->set_applicationId($this->encryption->decrypt($data['on_process'][$key]->get_applicationId()));
			}
		}
		else if($role == "BFP")
		{
			$query['status'] = 'On Process';
			$applications = $this->Application_m->get_all_bfp_applications($query);

			foreach ($applications as $key => $value) {
				$data['on_process'][$key] = new BFP_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['on_process'][$key]->set_applicationId($this->encryption->decrypt($data['on_process'][$key]->get_applicationId()));
			}
		}
		else if($role == "Engineering")
		{
			$query['status'] = 'On Process';
			$applications = $this->Application_m->get_all_engineering_applications($query);

			foreach ($applications as $key => $value) {
				$data['on_process'][$key] = new Engineering_Application($value->referenceNum);
			//decrypting appId property for custom encryption
				$data['on_process'][$key]->set_applicationId($this->encryption->decrypt($data['on_process'][$key]->get_applicationId()));
			}
		}

		//custom encryption credentials for URL encryption
		$data['custom_encrypt'] = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);
		if(!isset($data['on_process']))
		{
			$data['on_process'] = [];
		}
		$this->load->view('dashboard/on-process',$data);
	}

	public function completed_applications()
	{
		$this->isLogin();
		$this->update_notif('Completed');
		$navdata['title'] = "Complete Requirements";
		$navdata['active'] = 'Applications';
		$navdata['new'] = User::get_notifications();
		$navdata['completed'] = User::get_complete_notifications();
		$this->_init_matrix($navdata);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$query = array(
			'status' => 'Completed',
			);
		$application = $this->Application_m->get_all_bplo_applications($query);

		foreach ($application as $key => $app) {
			$data['complete'][$key] = new BPLO_Application($app->referenceNum);
			$data['complete'][$key]->set_applicationId($this->encryption->decrypt($data['complete'][$key]->get_applicationId()));
		}

		//custom encryption credentials for URL encryption
		$data['custom_encrypt'] = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);

		$this->load->view('dashboard/bplo/complete',$data);
	}

	public function issue_permit($reference_num = null)
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$role_Id = $this->Role_m->get_roleId($role);
		$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $reference_num));

		BPLO_Application::update_status($reference_num, 'Active');

		$query = array(
			'referenceNum' => $reference_num,
			'role' => $role_Id->roleId,
			'type' => "Issue",
			'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
			);
		$this->Approval_m->insert($query);

		$bplo = new BPLO_Application($reference_num);
		$fields = array(
			'referenceNum' => $reference_num,
			'dept' => $role,
			'type' => $bplo->get_ApplicationType()=="New" ? 'New' : 'Renew',
			);
		$this->Issued_Application_m->insert($fields);

		$this->session->set_flashdata('message','Permit issued! You can now print your applicant\'s Business Permit.');
		redirect('dashboard');
	}

	// public function finalize_applications()
	// {
	// 	$this->isLogin();
	// 	$navdata['title'] = "Issued Applications";
	// 	$navdata['active'] = 'Applications';
	// 	$navdata['notifications'] = User::get_notifications();
	// 	$navdata['completed'] = User::get_complete_notifications();
	// 	$this->_init_matrix($navdata);
	// 	$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
	// 	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);

	// 	$query['status'] = 'For finalization';
	// 	$application = $this->Application_m->get_all_bplo_applications($query);
	// 	foreach ($application as $key => $app) {
	// 		$data['finalize'][$key] = new BPLO_Application($app->referenceNum);
	// 		$data['finalize'][$key]->set_applicationId($this->encryption->decrypt($data['finalize'][$key]->get_applicationId()));
	// 	}

	// 	//custom encryption credentials for URL encryption
	// 	$data['custom_encrypt'] = array(
	// 		'cipher' => 'blowfish',
	// 		'mode' => 'ecb',
	// 		'key' => $this->config->item('encryption_key'),
	// 		'hmac' => false
	// 		);

	// 	$this->load->view('dashboard/bplo/finalize',$data);
	// }

	public function issued_applications()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$navdata['title'] = "Issued Applications";
		$navdata['active'] = 'Applications';

		if($role == "BPLO")
		{
			$navdata['new'] = User::get_notifications();
			$navdata['completed'] = User::get_complete_notifications();
		}
		else
		{
			$navdata['notifications'] = User::get_notifications();
		}
		$this->_init_matrix($navdata);

		$query['YEAR(createdAt)'] = date('Y');
		$query['dept'] = $role;

		if($role == "BPLO")
		{
			$application = $this->Issued_Application_m->get_all($query);
			// $application = $this->Application_m->get_all_bplo_applications($query);
			foreach ($application as $key => $app) {
				$data['issued'][$key] = new BPLO_Application($app->referenceNum);
				$data['issued'][$key]->set_applicationId($this->encryption->decrypt($data['issued'][$key]->get_applicationId()));
				$data['issued'][$key]->set_applicationType($app->type);
			}
		}
		else if($role == "CHO")
		{
			$application = $this->Issued_Application_m->get_all($query);
			foreach ($application as $key => $app) {
				$data['issued'][$key] = new Sanitary_Application($app->referenceNum);
				$data['issued'][$key]->set_applicationId($this->encryption->decrypt($data['issued'][$key]->get_applicationId()));
				$data['issued'][$key]->set_applicationType($app->type);
			}
		}
		else if($role == "Zoning")
		{
			$application = $this->Issued_Application_m->get_all($query);
			foreach ($application as $key => $app) {
				$data['issued'][$key] = new Zoning_Application($app->referenceNum);
				$data['issued'][$key]->set_applicationId($this->encryption->decrypt($data['issued'][$key]->get_applicationId()));
				$data['issued'][$key]->set_applicationType($app->type);
			}
		}
		else if($role == "CENRO")
		{
			$application = $this->Issued_Application_m->get_all($query);
			foreach ($application as $key => $app) {
				$data['issued'][$key] = new CENRO_Application($app->referenceNum);
				$data['issued'][$key]->set_applicationId($this->encryption->decrypt($data['issued'][$key]->get_applicationId()));
				$data['issued'][$key]->set_applicationType($app->type);
			}
		}
		else if($role == "BFP")
		{
			$application = $this->Issued_Application_m->get_all($query);
			foreach ($application as $key => $app) {
				$data['issued'][$key] = new BFP_Application($app->referenceNum);
				$data['issued'][$key]->set_applicationId($this->encryption->decrypt($data['issued'][$key]->get_applicationId()));
				$data['issued'][$key]->set_applicationType($app->type);
			}
		}
		else if($role == "Engineering")
		{
			$application = $this->Issued_Application_m->get_all($query);
			foreach ($application as $key => $app) {
				$data['issued'][$key] = new Engineering_Application($app->referenceNum);
				$data['issued'][$key]->set_applicationId($this->encryption->decrypt($data['issued'][$key]->get_applicationId()));
				$data['issued'][$key]->set_applicationType($app->type);
			}
		}

		//custom encryption credentials for URL encryption
		$data['custom_encrypt'] = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);

		$this->load->view('dashboard/issued',$data);
	}

	public function retirements()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$navdata['title'] = "Retirements";
		$navdata['active'] = 'Dashboard';
		if($role == "BPLO")
		{
			$navdata['new'] = User::get_notifications();
			$navdata['completed'] = User::get_complete_notifications();
		}
		else
		{
			$navdata['notifications'] = User::get_notifications();
		}
		$this->_init_matrix($navdata);
		
		if($role != "BPLO")
		{
			redirect('dashboard');
		}

		// $query['status'] = 'For approval';
		$retirements = $this->Retirement_m->get_all();

		foreach ($retirements as $key => $application) {
			$data['retirements'][$key] = new BPLO_Application($application->referenceNum);
			$data['retirements'][$key]->set_applicationId($this->encryption->decrypt($data['retirements'][$key]->get_applicationId()));
		}

		$data['custom_encrypt'] = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);

		$this->load->view('dashboard/bplo/retirements', $data);
	}

	public function view_retirement($application_id)
	{
		$this->isLogin();
		$navdata['title'] = "View Retirement";
		$navdata['active'] = 'Applications';
		$navdata['notifications'] = User::get_notifications();
		$navdata['completed'] = User::get_complete_notifications();
		$this->_init_matrix($navdata);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		if($role != "BPLO")
		{
			redirect('dashboard');
		}

		//custom encryption credentials for decrypting appId
		$decrypt_credentials = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);
		$application_id = $this->encryption->decrypt(hex2bin($application_id), $decrypt_credentials);

		$query['applicationId'] = $application_id;
			//get application using model then map to application object
		$data['application'] = $this->Application_m->get_all_bplo_applications($query);
				//map to application object
		$data['application'] = new BPLO_Application($data['application'][0]->referenceNum);
		$data['retirement'] = $this->Retirement_m->get_all(['referenceNum' => $this->encryption->decrypt($data['application']->get_referenceNum())]);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();
		$this->load->view('dashboard/bplo/view-retirement',$data);
	}

	public function approve_retirement($reference_num)
	{
		$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $reference_num));
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$role_Id = $this->Role_m->get_roleId($role);

		$this->isLogin();
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		if($role != "BPLO")
		{
			redirect('dashboard');
		}

		$set['status'] = 'Approved';
		$this->Retirement_m->update_retirement_status($reference_num, $set);

		BPLO_Application::update_status($reference_num, 'Closed');

		$notification_fields = array(
			'referenceNum' => $reference_num,
			'status' => 'Unread',
			'role' => 3,
			'notifMessage' => '<strong>Retirement approved</strong>. You may now proceed to the treasury for payment and then claim your certificate at Business Permit and Licensing Office. Thank you.');
		$this->Notification_m->insert($notification_fields);

		$query = array(
			'referenceNum' => $reference_num,
			'role' => $role_Id->roleId,
			'type' => "Approve Retirement",
			'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
			);
		$this->Approval_m->insert($query);

		//process assessment?

		$this->session->set_flashdata('message','Retirement Approved!');

		redirect('dashboard');
	}

	public function validate_application($referenceNum = null)
	{
		$this->isLogin();
		// var_dump($referenceNum);
		$referenceNum = str_replace(['-','_','='], ['/','+','='], $referenceNum);
		// var_dump($referenceNum);
		$referenceNum = $this->encryption->decrypt($referenceNum);
		$userId = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$role_Id = $this->Role_m->get_roleId($role);

		if($role == "BPLO")
		{
			$application = new BPLO_Application($referenceNum);
			//validate
			$application->change_status($referenceNum, 'For applicant visit');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>validated</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of BPLO. Please check your application status.";
		}
		else if ($role == "Zoning")
		{
			$application = new Zoning_Application($referenceNum);
			//validate
			$application->change_status($referenceNum, 'On process');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>validated</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of Zoning Department. Please check application status.";
		}
		else if ($role == "CENRO")
		{
			$application = new CENRO_Application($referenceNum);
			//validate
			$application->change_status($referenceNum, 'On process');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>validated</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of City Environment and Natural Resources. Please check application status.";
		}
		else if ($role == "CHO")
		{
			$application = new Sanitary_Application($referenceNum);
			//validate
			$application->change_status($referenceNum, 'On process');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>validated</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of City Health Office. Please check application status.";
		}
		else if ($role == "BFP")
		{
			$application = new BFP_Application($referenceNum);
			//validate
			$application->change_status($referenceNum, 'On process');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>validated</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of Bureau of Fire Protection. Please check application status.";
		}
		else if ($role == "Engineering")
		{
			$application = new Engineering_Application($referenceNum);
			//validate
			$application->change_status($referenceNum, 'On process');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>validated</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> from the Office of the Building Official. Please check application status.";
		}

		//approvals
		$query = array(
			'referenceNum' => $referenceNum,
			'role' => $role_Id->roleId,
			'type' => "Validate",
			'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
			);
		$this->Approval_m->insert($query);

		//notifications
		$query = array(
			'referenceNum' => $referenceNum,
			'status' => 'Unread',
			'role' => '3',
			'notifMessage' => $notif_message,
			);
		$this->Notification_m->insert($query);

		$custom_encrypt = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);

		$application_id = bin2hex($this->encryption->encrypt($this->encryption->decrypt($application->get_applicationId()), $custom_encrypt));

		$this->session->set_flashdata('message', 'Application validated successfully!');
		redirect('dashboard/view_application/'.$application_id);
	}

	public function approve_application($referenceNum = null)
	{
		$this->isLogin();
		$referenceNum = str_replace(['-','_','='], ['/','+','='], $referenceNum);
		$referenceNum = $this->encryption->decrypt($referenceNum);
		$userId = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$role_Id = $this->Role_m->get_roleId($role);

		if($role != "Engineering")
		{
			$this->form_validation->set_rules('requirements[]', 'Requirements', 'required');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('message','Approval failed, requirements not completed.');
				redirect('dashboard');
			}
			else
			{
				$requirements = $this->input->post('requirements');
			}
		}

		//validate if application is legitimately validated
		// $query = array(
		// 	'referenceNum' => $referenceNum,
		// 	'type' => "Validate",
		// 	);
		// $result = $this->Approval_m->get_all($query);

		// if(count($result) > 0)
		// {
		// if($role == 'BPLO')
		// {
		// 	$application = new BPLO_Application($referenceNum);
		// 		//update application status
		// 	$application->change_status($referenceNum, 'On process');
		// 	Zoning_Application::update_status($referenceNum, 'For applicant visit');
		// 	CENRO_Application::update_status($referenceNum, 'For applicant visit');
		// 	Sanitary_Application::update_status($referenceNum, 'For applicant visit');
		// 	BFP_Application::update_status($referenceNum, 'For applicant visit');
		// 	Engineering_Application::update_status($referenceNum,'For applicant visit');

		// 	// $notif_message = $application->get_businessName() . " has been approved by ".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']." of BPLO. You can now go to other required offices to process your application.";


		// }
		if ($role == "Zoning")
		{
			$application = new Zoning_Application($referenceNum);
			$application->change_status($referenceNum, 'Active');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>approved</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of Zoning Department.";
			foreach ($requirements as $key => $requirement) {
				$submitted_requirements_field = array(
					'referenceNum' => $referenceNum,
					'requirementId' => $this->encryption->decrypt($requirement),
					);
				$this->Requirement_m->insert_submitted_requirements($submitted_requirements_field);
			}
		}
		else if ($role == "CENRO")
		{
			$application = new CENRO_Application($referenceNum);
			$application->change_status($referenceNum, 'Active');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>approved</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of City Environment and Natural Resources.";
			foreach ($requirements as $key => $requirement) {
				$submitted_requirements_field = array(
					'referenceNum' => $referenceNum,
					'requirementId' => $this->encryption->decrypt($requirement),
					);
				$this->Requirement_m->insert_submitted_requirements($submitted_requirements_field);
			}
		}
		else if ($role == "CHO")
		{
			$application = new Sanitary_Application($referenceNum);
			$application->change_status($referenceNum, 'Active');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>approved</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of City Health Office.";
			foreach ($requirements as $key => $requirement) {
				$submitted_requirements_field = array(
					'referenceNum' => $referenceNum,
					'requirementId' => $this->encryption->decrypt($requirement),
					);
				$this->Requirement_m->insert_submitted_requirements($submitted_requirements_field);
			}
		}
		else if ($role == "BFP")
		{
			$application = new BFP_Application($referenceNum);
			$application->change_status($referenceNum, 'Active');
			$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>approved</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> of Bureau of Fire Protection.";
			foreach ($requirements as $key => $requirement) {
				$submitted_requirements_field = array(
					'referenceNum' => $referenceNum,
					'requirementId' => $this->encryption->decrypt($requirement),
					);
				$this->Requirement_m->insert_submitted_requirements($submitted_requirements_field);
			}
		}
		else if ($role == "Engineering")
		{
			$application = new Engineering_Application($referenceNum);

			$this->form_validation->set_rules('annual-inspection-fee', 'Annual Insepction Fee', 'required');

			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('message', 'Approval for '.$application->get_businessName().' failed, please provide Annual Inspection Fee');
				redirect('dashboard/on_process_applications');
				exit();
			}
			else
			{
				$assessment = $this->Assessment_m->get_assessment(['referenceNum' => $referenceNum]);
				$charge_field = array(
					'assessmentId' => $assessment[0]->assessmentId,
					'period' => "F1",
					'due' => $this->input->post('annual-inspection-fee'),
					'surcharge' => 0,
					'interest' => 0,
					'particulars' => "ANNUAL INSPECTION FEE",
					);
				$this->Assessment_m->add_charge($charge_field);

				$this->Assessment_m->refresh_assessment_amount(['referenceNum' => $referenceNum]);
				$application->change_status($referenceNum, 'Active');
				$notif_message = "<strong>".$application->get_businessName() . "</strong> has been <strong>approved</strong> by <strong>".$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName']."</strong> from the Office of the Building Official.";

				BPLO_Application::update_status($referenceNum, 'BPLO Interview and Assessment of Fees');
				// Zoning_Application::update_status($referenceNum, 'For applicant visit');
				// CENRO_Application::update_status($referenceNum, 'For applicant visit');
				// Sanitary_Application::update_status($referenceNum, 'For applicant visit');

				//notify BPLO
				$query = array(
					'referenceNum' => $referenceNum,
					'status' => 'Unread',
					'role' => 4,
					'notifMessage' => 'New',
					);
				$this->Notification_m->insert($query);

				//notify all departments
				// for ($i=5; $i <= 10 ; $i++)
				// {
				// 	if($i != 6 && $i != 9 && $i != 5) //6 == assessors, 9 == engineering, 5 == BFP
				// 	{
				// 		$query = array(
				// 			'referenceNum' => $reference_num,
				// 			'status' => 'Unread',
				// 			'role' => $i,
				// 			'notifMessage' => 'Incoming',
				// 			);
				// 		$this->Notification_m->insert($query);
				// 	}
				// }

			}
		}

		if($role != "BPLO")
		{
			$fields = array(
				'referenceNum' => $referenceNum,
				'dept' => $role,
				'type' => $application->get_applicationType(),
				);
			$this->Issued_Application_m->insert($fields);
		}

			//approvals
		$query = array(
			'referenceNum' => $referenceNum,
			'role' => $role_Id->roleId,
			'type' => "Approve",
			'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
			);
		$this->Approval_m->insert($query);

		$bplo = new BPLO_Application($referenceNum);
			// if($bplo->get_applicationType() == "New")
			// {
				//NEW
		if(count($this->Approval_m->check_action_count($referenceNum)) == 10)
		{
			BPLO_Application::update_status($referenceNum, 'Completed');
			$query = array(
				'referenceNum' => $referenceNum,
				'status' => 'Unread',
				'role' => 4,
				'notifMessage' => 'Completed',
				);
			$this->Notification_m->insert($query);
		}
			// }
			// else
			// {	//RENEW
			// 	// echo "<pre>";
			// 	// print_r($this->Approval_m->check_action_count($referenceNum));
			// 	// echo "<pre>";
			// 	// exit();

			// 	if(count($this->Approval_m->check_action_count($referenceNum)) == 10)
			// 	{
			// 		BPLO_Application::update_status($referenceNum, 'Completed');
			// 		$query = array(
			// 			'referenceNum' => $referenceNum,
			// 			'status' => 'Unread',
			// 			'role' => 4,
			// 			'notifMessage' => 'Completed',
			// 			);
			// 		$this->Notification_m->insert($query);
			// 	}
			// }

			//notifications
			//notify applicant
		$query = array(
			'referenceNum' => $referenceNum,
			'status' => 'Unread',
			'role' => '3',
			'notifMessage' => $notif_message,
			);
		$this->Notification_m->insert($query);

		$this->session->set_flashdata('message', 'Application approved!');
		redirect('dashboard');
		// }
		// else
		// {
		// 	$this->session->set_flashdata('message', 'ERROR: Invalid action!');
		// 	redirect('dashboard/pending_applications');
		// }

	}

	public function cancel_application($reference_num = null)
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$decrypt_credentials = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);
		$reference_num = $this->encryption->decrypt(hex2bin($reference_num), $decrypt_credentials);
		// var_dump($reference_num);
		// exit();

		BPLO_Application::update_status($reference_num, 'Cancelled');
		CENRO_Application::update_status($reference_num, 'Cancelled');
		Zoning_Application::update_status($reference_num, 'Cancelled');
		Sanitary_Application::update_status($reference_num, 'Cancelled');
		redirect('dashboard');
	}

	public function view_application($application_id)
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$navdata['title'] = "View Application";
		$navdata['active'] = "Applications";
		$navdata['notifications'] = User::get_notifications();
		$this->_init_matrix($navdata);

		//custom encryption credentials for decrypting appId
		$decrypt_credentials = array(
			'cipher' => 'blowfish',
			'mode' => 'ecb',
			'key' => $this->config->item('encryption_key'),
			'hmac' => false
			);
		$application_id = $this->encryption->decrypt(hex2bin($application_id), $decrypt_credentials);
			// var_dump($application_id);
			// exit();
		$query['applicationId'] = $application_id;

		if($role == 'BPLO')
		{
				//get application using model then map to application object
			$data['application'] = $this->Application_m->get_all_bplo_applications($query);
				//map to application object
			$data['application'] = new BPLO_Application($data['application'][0]->referenceNum);
			// echo "<pre>";
			// print_r($data['application']);
			// echo "</pre>";
			// exit();

			if($data['application']->get_status() == 'Completed' || $data['application']->get_status() == 'Active' || $data['application']->get_status() == 'On process')
			{
				$reference_num = $this->encryption->decrypt($data['application']->get_referenceNum());
				unset($query);
				$query['referenceNum'] = $reference_num;
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
			}
			$data['application']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['application']->get_referenceNum()));
			$data['financial_institutions'] = $this->Fee_m->get_financial_institution_fees();
			$data['amusement_devices'] = $this->Fee_m->get_all_amusement_devices();
			//instantiate Owner of this application
			// $data['owner'] = new Owner($this->encryption->decrypt($data['application']->get_userId()));
			// echo "<pre>";
			// print_r($data['application']);
			// echo "</pre>";
			// exit();

			$this->load->view('dashboard/bplo/view',$data);
		}
		else if($role == "Zoning")
		{
			//get application using model then map to application object
			$data['application'] = $this->Application_m->get_all_zoning_applications($query);
			//map to application object
			$data['application'] = new Zoning_Application($data['application'][0]->referenceNum);
			$data['bplo'] = new BPLO_Application($this->encryption->decrypt($data['application']->get_referenceNum()));
			$data['application']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['application']->get_referenceNum()));

				//map to application object


			if($data['bplo']->get_status() == 'Completed' || $data['bplo']->get_status() == 'Active' || $data['bplo']->get_status() == 'On process')
			{
				$reference_num = $this->encryption->decrypt($data['bplo']->get_referenceNum());
				unset($query);
				$query['referenceNum'] = $reference_num;
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
			}
			$data['bplo']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['bplo']->get_referenceNum()));

			$this->load->view('dashboard/zoning/view', $data);
		}
		else if($role == "CENRO")
		{
			//get application using model then map to application object
			$data['application'] = $this->Application_m->get_all_cenro_applications($query);
			//map to application object
			$data['application'] = new CENRO_Application($data['application'][0]->referenceNum);
			$data['bplo'] = new BPLO_Application($this->encryption->decrypt($data['application']->get_referenceNum()));
			$data['application']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['application']->get_referenceNum()));
			//instantiate Owner of this application
			// $data['owner'] = new Owner($this->encryption->decrypt($data['application']->get_userId()));

			if($data['bplo']->get_status() == 'Completed' || $data['bplo']->get_status() == 'Active' || $data['bplo']->get_status() == 'On process')
			{
				$reference_num = $this->encryption->decrypt($data['bplo']->get_referenceNum());
				unset($query);
				$query['referenceNum'] = $reference_num;
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
			}
			$data['bplo']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['bplo']->get_referenceNum()));

			$this->load->view('dashboard/cenro/view', $data);
		}
		else if($role == "CHO")
		{
			//get application using model then map to application object
			$data['application'] = $this->Application_m->get_all_sanitary_applications($query);
			//map to application object
			$data['application'] = new Sanitary_Application($data['application'][0]->referenceNum);
			$data['bplo'] = new BPLO_Application($this->encryption->decrypt($data['application']->get_referenceNum()));
			$data['application']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['application']->get_referenceNum()));

			if($data['bplo']->get_status() == 'Completed' || $data['bplo']->get_status() == 'Active' || $data['bplo']->get_status() == 'On process')
			{
				$reference_num = $this->encryption->decrypt($data['bplo']->get_referenceNum());
				unset($query);
				$query['referenceNum'] = $reference_num;
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
			}
			$data['bplo']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['bplo']->get_referenceNum()));

			$this->load->view('dashboard/cho/view', $data);
		}
		else if($role == "BFP")
		{
			//get application using model then map to application object
			$data['application'] = $this->Application_m->get_all_bfp_applications($query);
			//map to application object
			$data['application'] = new BFP_Application($data['application'][0]->referenceNum);
			$data['bplo'] = new BPLO_Application($this->encryption->decrypt($data['application']->get_referenceNum()));
			$data['application']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['application']->get_referenceNum()));

			if($data['bplo']->get_status() == 'Completed' || $data['bplo']->get_status() == 'Active' || $data['bplo']->get_status() == 'On process')
			{
				$reference_num = $this->encryption->decrypt($data['bplo']->get_referenceNum());
				unset($query);
				$query['referenceNum'] = $reference_num;
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
			}
			$data['bplo']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['bplo']->get_referenceNum()));
			$data['representative'] = new User($user_id);

			$this->load->view('dashboard/bfp/view', $data);
		}
		else if($role == "Engineering")
		{
			//get application using model then map to application object
			$data['application'] = $this->Application_m->get_all_engineering_applications($query);
			//map to application object
			$data['application'] = new Engineering_Application($data['application'][0]->referenceNum);
			$data['bplo'] = new BPLO_Application($this->encryption->decrypt($data['application']->get_referenceNum()));
			$data['application']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['application']->get_referenceNum()));

			if($data['bplo']->get_status() == 'Completed' || $data['bplo']->get_status() == 'Active' || $data['bplo']->get_status() == 'On process')
			{
				$reference_num = $this->encryption->decrypt($data['bplo']->get_referenceNum());
				unset($query);
				$query['referenceNum'] = $reference_num;
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
			}
			$data['bplo']->set_referenceNum(str_replace(['/','+','='], ['-','_','='], $data['bplo']->get_referenceNum()));

			$this->load->view('dashboard/engineering/view', $data);
		}
	}

	public function approve_capitalization($reference_num)
	{
		$reference_num = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $reference_num));

		$this->form_validation->set_rules('capitalization[]', 'Capitalization', 'required');
		$this->form_validation->set_rules('activityId[]', 'activity ID', 'required');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('message','Approval failed, fields must be complete.');
			redirect('dashboard/completed_applications');
		}
		else
		{
			$activity_id = $this->input->post('activityId');
			$capitalization = $this->input->post('capitalization');
			foreach ($activity_id as $key => $id) {
				$id = $this->encryption->decrypt($id);
				$activity = $this->Business_Activity_m->get_all_business_activity(['activityId' => $id]);
				if($activity[0]->type == "Financial Institution")
				{
					$this->form_validation->set_rules('financial-institution', 'Financial Institution', 'required');
				}
				else if($activity[0]->type == "Amusement")
				{
					$this->form_validation->set_rules('device[]', 'Financial Institution', 'required');
					$this->form_validation->set_rules('holes', 'Minimum number of Golf link is 0','required|numeric');
					$this->form_validation->set_rules('automatic-lanes', 'Minimum number of input lanes is 0','required|numeric');
					$this->form_validation->set_rules('non-automatic-lanes', 'Minimum number of input lanes is 0','required|numeric');
				}
			}

			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('message','Approval failed, fields must be complete.');
				redirect('dashboard/completed_applications');
			}
			else
			{
				$bplo = new BPLO_Application($reference_num);
				if($bplo->get_applicationType() == "Renew")
				{
					$previous_gross = $this->input->post('previous-gross');
					$essentials = $this->input->post('essentials');
					$non_essentials = $this->input->post('non-essential');
					$gross_id = $this->input->post('gross-id');
				}

				$gross_index = 0;
				foreach ($activity_id as $key => $id) {
					$activity = $this->Business_Activity_m->get_business_activity($this->encryption->decrypt($id));

					if($bplo->get_applicationType() == "New")
					{
						$business_activity_fields = array(
							'capitalization' => $capitalization[$key],
							);
						$this->Business_Activity_m->update_business_activity($this->encryption->decrypt($id), $business_activity_fields);
					}
					else
					{
						if($activity[0]->activityStatus == "new")
						{
							$business_activity_fields = array(
								'capitalization' => $capitalization[$key],
								// 'activityStatus' => "active",
								);
							$this->Business_Activity_m->update_business_activity($this->encryption->decrypt($id), $business_activity_fields);
						}
						else
						{
							$gross_fields = array(
								'previousGross' => $previous_gross[$gross_index],
								'essentials' => $essentials[$gross_index],
								'nonEssentials' => $non_essentials[$gross_index],
								);
							$this->Gross_m->update_gross($this->encryption->decrypt($gross_id[$gross_index]),$gross_fields);
							$gross_index++;
						}
					}

					$id = $this->encryption->decrypt($id);
					// $activity = $this->Business_Activity_m->get_all_business_activity(['activityId' => $id]);
					if($activity[0]->type == "Financial Institution")
					{
						if($this->input->post('financial-institution'))
						{
							$financial_institution = $this->input->post('financial-institution');
							$financial_institution_field = array(
								'financialInstitutionId' => $this->encryption->decrypt($financial_institution),
								'activityId' => $id,
								);
							$this->Business_Activity_m->insert_financial_institution($financial_institution_field);
						}
					}
					else if($activity[0]->type == "Amusement")
					{
						if($this->input->post('device'))
						{
							$devices = $this->input->post('device');
							foreach ($devices as $key => $device) {
								if($device != null || $device != 0)
								{
									$d = explode("|", $device);
									if($d[1] != 0 && $d[1] != "")
									{
										$amusement_device_field = array(
											'amusementDeviceId' => $this->encryption->decrypt($d[0]),
											'activityId' => $id,
											'units' => $d[1],
											);
										$this->Business_Activity_m->insert_amusement_device($amusement_device_field);
									}
								}
							}
						}
						if($this->input->post('holes'))
						{
							$holes = $this->input->post('holes');
							if($holes != "" || $holes != 0)
							{
								$holes_field = array(
									'activityId' => $id,
									'holes' => $holes,
									);
								$this->Business_Activity_m->insert_golf_link($holes_field);
							}
						}

						if($this->input->post('non-automatic-lanes') || $this->input->post('automatic-lanes'))
						{
							// if($this->input->post('non-automatic-lanes')!= 0 && $this->input->post('automatic-lanes')!= 0)
							// {
							$bowling_alley_fields = array(
								'activityId' => $id,
								'nonAutomaticLanes' => !$this->input->post('non-automatic-lanes')||$this->input->post('non-automatic-lanes')=="" ? 0 : $this->input->post('non-automatic-lanes'),
								'automaticLanes' => !$this->input->post('automatic-lanes')||$this->input->post('automatic-lanes')=="" ? 0 : $this->input->post('automatic-lanes'),
								);
							$this->Business_Activity_m->insert_bowling_alley($bowling_alley_fields);
							// }
						}
					}
				}
				$this->session->set_flashdata('message', 'Capital approved!');
			// var_dump("test update");

				$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
				$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
				$role_Id = $this->Role_m->get_roleId($role);
				BPLO_Application::update_status($reference_num, 'On process');

				$query = array(
					'referenceNum' => $reference_num,
					'role' => $role_Id->roleId,
					'type' => "Approve Capital",
					'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
					);
				$this->Approval_m->insert($query);

				$this->process_assessments($reference_num);



			// notify all departments
				for ($i=5; $i <= 10 ; $i++)
				{
				if($i != 6 && $i != 9) //6 == assessors, 9 == engineering, 5 == BFP
				{
					$query = array(
						'referenceNum' => $reference_num,
						'status' => 'Unread',
						'role' => $i,
						'notifMessage' => 'Incoming',
						);
					$this->Notification_m->insert($query);
				}
			}

			Zoning_Application::update_status($reference_num, 'For applicant visit');
			Sanitary_Application::update_status($reference_num, 'For applicant visit');
			CENRO_Application::update_status($reference_num, 'For applicant visit');
			BFP_Application::update_status($reference_num, 'For applicant visit');

			$notification_fields = array(
				'referenceNum' => $reference_num,
				'status' => 'Unread',
				'role' => 3,
				'notifMessage' => "<strong>Capitalization</strong> for <strong>".$bplo->get_businessName()."</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements."
				);
			$this->Notification_m->insert($notification_fields);


			redirect('dashboard');
		}
	}
}


	// public function get_bplo_info()
	// {
	// 	$data['application'] = $this->Application_m->get_all_bplo_applications();
	// 	$data['application'] = new BPLO_Application('9E9E1D64A2');
	//
	// 	$this->load->view('dashboard/bplo/bplo_printable',$data);
	// }


public function get_reference_info_printable()
{
	$data['application'] = $this->Application_m->get_all_bplo_applications();
	$data['application'] = new BPLO_Application('739862FF5C');

	$this->load->view('dashboard/bplo/reference_info_printable',$data);
}

public function get_sanitary_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$payment = $this->Payment_m->get_initial_payment($reference_num);

	$data['application'] = new BPLO_Application($reference_num);
	$data['application2'] = new Sanitary_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Form",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/cho/sanitary_printable',$data);
}


public function get_bfp_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$payment = $this->Payment_m->get_initial_payment($reference_num);

	$data['application'] = new BPLO_Application($reference_num);
	$data['application2'] = new BFP_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Form",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/bfp/bfp_printable',$data);
}


public function get_zoning_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$payment = $this->Payment_m->get_initial_payment($reference_num);

	$data['application'] = new BPLO_Application($reference_num);
	$data['application2'] = new Zoning_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Form",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);


	$this->load->view('dashboard/zoning/zoning_printable',$data);
}


public function get_cenro_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$payment = $this->Payment_m->get_initial_payment($reference_num);

	$data['application'] = new BPLO_Application($reference_num);
	$data['application2'] = new CENRO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Form",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/cenro/cenro_printable',$data);
}


public function get_bplo_form_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$payment = $this->Payment_m->get_initial_payment($reference_num);

	$data['application'] = new BPLO_Application($reference_num);

	$data['approvals'] = $this->Approval_m->get_approvals($reference_num, date('Y', strtotime($data['application']->get_taxYear())));

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Form",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	//ETO YUNG APPROVALS
	// echo "<pre>";
	// print_r($data['approvals']);
	// echo "</pre>";
	// exit();


	$this->load->view('dashboard/bplo/bplo_form_printable',$data);
}

public function get_cert_closure_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$payment = $this->Payment_m->get_initial_payment($reference_num);
	$data['application'] = new BPLO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Form",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/bplo/cert_closure_printable',$data);
}

public function get_cert_closure_form_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$payment = $this->Payment_m->get_initial_payment($reference_num);
	$data['application'] = new BPLO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Permit",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/bplo/certicate_closure_form',$data);
}

public function get_bplo_certificate_info($reference_num)
{

	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$data['payment'] = $this->Payment_m->get_initial_payment($reference_num)[0];

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Permit",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$data['application'] = new BPLO_Application($reference_num);

	$this->load->view('dashboard/bplo/bplo_certificate_printable',$data);
}

public function get_sanitary_permit_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$data['application'] = new BPLO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Permit",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/cho/sanitary_permit',$data);
}

public function get_engineering_clearance_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$data['application'] = new BPLO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Form",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/engineering/engineering_clearance',$data);
}

public function get_environmental_clearance_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$data['application'] = new BPLO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Permit",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/cenro/environmental_clearance',$data);
}

public function get_zoning_clearance_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$data['application'] = new BPLO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Permit",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/zoning/zoning_clearance',$data);
}
//
public function get_fire_inspection_certificate_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$data['application'] = new BPLO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Permit",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/bfp/fire_inspection_certificate',$data);
}
public function get_demographic_report_info()
{
		//
	$barangay = $this->Business_m->count_businesses_by_barangay();
	$expired = $this->Business_m->count_expired_businesses_by_barangay();

		//merge expired applications to barangay
	foreach($barangay as $key => $b)
	{
		if(count($expired) > 0)
		{
			foreach ($expired as $e) {
				if($b->barangay == $e->barangay)
				{
					$data['barangay_array'][] = (object) array_merge((array)$b, (array)$e);
					unset($barangay[$key]);
						// $reindex = array_values($barangay);
						// $barangay = $reindex;
						// array_splice($barangay, $key, 1);
				}
			}
		}
	}

	if(count($barangay) > 0)
	{
		foreach ($barangay as $key => $b) {
			$data['barangay_array'][] = (object) $b;
		}
	}

	unset($query);
	$query['status'] = 'Expired';
	$data['expired'] = count($this->Application_m->get_all_bplo_applications($query));
		//total number of businesses (active + expired)
	$data['businesses'] = (int)$data['businesses'] + (int)$data['expired'];

	$query['status'] = 'Cancelled';
	$data['cancelled'] = count($this->Application_m->get_all_bplo_applications($query));

	$query['status'] = 'Closed';
	$data['closed'] = count($this->Application_m->get_all_bplo_applications($query));



	$business = $this->Owner_m->get_all_applied_businesses();

	$data['total_male'] = 0;
	$data['total_female'] = 0;
	foreach ($business as $key => $b) {
		$data['total_male'] += $b->maleEmployees;
		$data['total_female'] += $b->femaleEmployees;
	}

	$this->load->view('dashboard/bplo/demographic_report',$data);
}
public function get_issued_business_permit_report_info()
{
		//New & Renewal
	$query['YEAR(createdAt)'] = date('Y');
	$query['dept'] = "BPLO";
	$query['type'] = "New";
	for ($i=1; $i <= 12 ; $i++) {
		$query['MONTH(createdAt)'] = $i;
		switch ($i)
		{
			case 1:
			$data['n_january'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 2:
			$data['n_february'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 3:
			$data['n_march'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 4:
			$data['n_april'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 5:
			$data['n_may'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 6:
			$data['n_june'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 7:
			$data['n_july'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 8:
			$data['n_august'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 9:
			$data['n_september'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 10:
			$data['n_october'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 11:
			$data['n_november'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 12:
			$data['n_december'] = count($this->Issued_Application_m->get_all($query));
			break;
		}
	}

	$query['type'] = 'Renew';
	for ($i=1; $i <= 12 ; $i++) {
		$query['MONTH(createdAt)'] = $i;
		switch ($i)
		{
			case 1:
			$data['r_january'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 2:
			$data['r_february'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 3:
			$data['r_march'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 4:
			$data['r_april'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 5:
			$data['r_may'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 6:
			$data['r_june'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 7:
			$data['r_july'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 8:
			$data['r_august'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 9:
			$data['r_september'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 10:
			$data['r_october'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 11:
			$data['r_november'] = count($this->Issued_Application_m->get_all($query));
			break;
			case 12:
			$data['r_december'] = count($this->Issued_Application_m->get_all($query));
			break;
		}
	}

		//
	unset($query);
	$query['status'] = 'Active';
	$data['businesses'] = count($this->Application_m->get_all_bplo_applications($query));

	unset($query);
	$query['dept'] = 'BPLO';
	$query['type'] = 'New';
	$new = count($this->Issued_Application_m->get_all($query));

	$query['dept'] = 'BPLO';
	$query['type'] = 'Renew';
	$renew = count($this->Issued_Application_m->get_all($query));
	$data['renew'] = $renew;
	$data['issued'] = $new + $renew;


	$this->load->view('dashboard/bplo/employees_accomplishment_report',$data);
}

public function get_order_of_payment_info($reference_num)
{
	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
	$payment = $this->Payment_m->get_initial_payment($reference_num);

	$data['application'] = new BPLO_Application($reference_num);

	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_Id = $this->Role_m->get_roleId($role);

	$query = array(
		'referenceNum' => $reference_num,
		'role' => $role_Id->roleId,
		'type' => "Print Tax Order",
		'staff' => $this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['lastName'],
		);
	$this->Approval_m->insert($query);

	$this->load->view('dashboard/bplo/order_of_payment',$data);
}

// public function get_assessment_form_info($reference_num)
// {
// 	$reference_num = $this->encryption->decrypt(str_replace(['-','_','='],['/','+','='],$reference_num));
// 	$payment = $this->Payment_m->get_initial_payment($reference_num);

// 	$data['application'] = new BPLO_Application($reference_num);
// 	$this->load->view('dashboard/bplo/assessment_form_printable',$data);
// }

	//FOR AJAX PURPOSES
public function update_notif($type = null)
{
	$this->isLogin();
	$role_id = $this->Role_m->get_roleId($this->encryption->decrypt($this->session->userdata['userdata']['role']));
	$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

	if($role_id->roleId == '3')
	{

		$notifications = $this->Notification_m->get_applicant_unread($role_id->roleId, $user_id);

		foreach ($notifications as $notification) {
			$query = array(
				'role' => $role_id->roleId,
				'referenceNum' => $notification->referenceNum
				);
			$set['status'] = "Read";
			$this->Notification_m->update($query,$set);
		}

		$latest = $this->Notification_m->get_applicant_notif($role_id->roleId, $user_id);
		// echo "<pre>";
		// print_r($latest);
		// echo "</pre>";
		// exit();

		for($i=0;$i<count($latest);$i=$i+1)
		{
			date_default_timezone_set('Asia/Manila');
			$date1 = new DateTime($latest[$i]->createdAt);
			$date2 = new DateTime("now");
			$interval = $date1->diff($date2);
			$years = $interval->format('%y');
			$months = $interval->format('%m');
			$days = $interval->format('%d');
			$hours = $interval->format('%G');
			$minutes = $interval->format('%i');

			if($years!=0){
				if($years==1)
				{
					$latest[$i]->createdAt = $years.' year ago';
				}else{
					$latest[$i]->createdAt = $years.' years ago';
				}
			}else{
				if($months!=0)
				{
					if($months==1)
					{
						$latest[$i]->createdAt = $months.' month ago';
					}else{
						$latest[$i]->createdAt = $months.' months ago';
					}
				}else{
					if($days!=0)
					{
						if($days==1)
						{
							$latest[$i]->createdAt = $days.' day ago';
						}else{
							$latest[$i]->createdAt = $days.' days ago';
						}
					}else{
						if($hours!=0)
						{
							if($hours==1)
							{
								$latest[$i]->createdAt = $hours.' hour ago';
							}else{
								$latest[$i]->createdAt = $hours.' hours ago';
							}
						}else{
							if($minutes!=0)
							{
								if($minutes==1)
								{
									$latest[$i]->createdAt = $minutes.' minute ago';
								}else{
									$latest[$i]->createdAt = $minutes.' minutes ago';
								}
							}else{
								$latest[$i]->createdAt = 'a few moments ago';
							}
						}
					}
				}
			}

			$custom_encrypt = array(
				'cipher' => 'blowfish',
				'mode' => 'ecb',
				'key' => $this->config->item('encryption_key'),
				'hmac' => false
				);


			$latest[$i]->referenceNum = bin2hex($this->encryption->encrypt($latest[$i]->applicationId."|".$latest[$i]->referenceNum, $custom_encrypt));

		}

		$data['notifications'] = $latest;
		$this->load->view('dashboard/applicant/notif-view', $data);
	}
	else
	{
		$query = array(
			'role' => $role_id->roleId,
			'status' => 'Unread',
			'notifMessage' => $type
			);
		$notifications = $this->Notification_m->get_all($query);

		if(count($notifications) > 0)
		{
			$set['status'] = "Read";
			$this->Notification_m->update($query, $set);
		}
	}
}

public function check_notif()
{
	$this->isLogin();
	$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
	$role_id = $this->Role_m->get_roleId($role);

	if($role_id->roleId == 4)
	{
		$data['new'] = count(User::get_notifications());
		$data['complete'] = count(User::get_complete_notifications());

		if($this->session->userdata['userdata']['permissionLevel'] == 2)
		{
			$query['status'] = 'BPLO Interview and Assessment of Fees';
			$data['incoming'] = count($this->Application_m->get_all_bplo_applications($query));
		}
		

		$query['status'] = 'On process';
		$data['process'] = count($this->Application_m->get_all_bplo_applications($query));

		$query['status'] = 'Completed';
		$data['completed'] = count($this->Application_m->get_all_bplo_applications($query));
	}
	else
	{
		$data['notifications'] = count(User::get_notifications());
		$query['status'] = 'For applicant visit';

		if($role=="Zoning")
			$data['incoming'] = count($this->Application_m->get_all_zoning_applications($query));
		else if($role == "BFP")
			$data['incoming'] = count($this->Application_m->get_all_bfp_applications($query));
		else if($role == "CHO")
			$data['incoming'] = count($this->Application_m->get_all_sanitary_applications($query));
		else if($role == "CENRO")
			$data['incoming'] = count($this->Application_m->get_all_cenro_applications($query));
		else if($role == "Engineering")
			$data['incoming'] = count($this->Application_m->get_all_engineering_applications($query));
	}

	echo json_encode($data);
}

public function check_application_status()
{
	$this->isLogin();
	$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
	$query['userId'] = $user_id;
	$applications = $this->Application_m->get_all_bplo_applications($query);
	foreach ($applications as $key => $value) {
		$data['applications'][$key] = new BPLO_Application($value->referenceNum);
		$data['applications'][$key]->set_applicationId($this->encryption->decrypt($data['applications'][$key]->get_applicationId()));
	}

		//get notifications
	$data['notifications'] = User::get_notifications();


	if($data['notifications'] == "")
		unset($data['notifications']);
	else
		$data['notifications'] = count($data['notifications']);


	$data['custom_encrypt'] = array(
		'cipher' => 'blowfish',
		'mode' => 'ecb',
		'key' => $this->config->item('encryption_key'),
		'hmac' => false
		);

	$this->load->view('dashboard/applicant/application-table-body',$data);
}

public function check_app_status()
{
	$custom_encrypt = array(
		'cipher' => 'blowfish',
		'mode' => 'ecb',
		'key' => $this->config->item('encryption_key'),
		'hmac' => false
		);
	if($this->input->post('application_object'))
	{
		$application = $this->input->post('application_object');
		// echo json_encode($application);
		// exit();
		$status_array = [];
		$buttons = [];
		foreach ($application as $key => $value) {
			$query['applicationId'] = $this->encryption->decrypt($value['id']);
			$app = $this->Application_m->get_all_bplo_applications($query);
			$isExisting = $this->Renewal_m->check_application($app[0]->referenceNum);
			$status_array[$key] = $app[0]->status;
			switch($status_array[$key])
			{
				case "Draft":
				$buttons[$key] = "
				<a
				href='".base_url()."dashboard/draft_application/".str_replace(['/','+','='], ['-','_','='], $this->encryption->encrypt($app[0]->referenceNum))."'
				class='btn btn-success'><i class='fa fa-pencil-square-o' aria-hidden='true'></a>
				<button
				class='btn btn-danger btn-delete'
				id='".base_url()."dashboard/delete_draft/".str_replace(['/','+','='], ['-','_','='], $this->encryption->encrypt($app[0]->referenceNum))."'><i class='fa fa-trash' aria-hidden='true'></button>";
				break;
				case "Expired":
				$buttons[$key] = "
				<a
				href='".base_url('form/view/'.bin2hex($this->encryption->encrypt($value['id'].'|'.$app[0]->referenceNum, $custom_encrypt)))."'
				id='btn-view-details'
				class='btn btn-primary'><i class='fa fa-info-circle' aria-hidden='true'></i></a>
				<a
				type='button'
				class='btn btn-warning'
				href='".base_url('form/renew/'.bin2hex($this->encryption->encrypt($value['id'].'|'.$app[0]->referenceNum, $custom_encrypt)))."'><i class='fa fa-plus' aria-hidden='true'></i></a>";
				break;
				case "Active":
				$buttons[$key] = "<a
				href='".base_url('form/view/'.bin2hex($this->encryption->encrypt($value['id'].'|'.$app[0]->referenceNum, $custom_encrypt)))."'
				id='btn-view-details'
				class='btn btn-primary'><i class='fa fa-info-circle' aria-hidden='true'></i></a>";
				break;
				case "On process":
				if($isExisting)
				{
					$buttons[$key] = "<a
					href='".base_url('form/view/'.bin2hex($this->encryption->encrypt($value['id'].'|'.$app[0]->referenceNum, $custom_encrypt)))."'
					id='btn-view-details'
					class='btn btn-primary'><i class='fa fa-info-circle' aria-hidden='true'></i></a>";
				}
				else
				{
					$buttons[$key] = "<a
					href='".base_url('form/view/'.bin2hex($this->encryption->encrypt($value['id'].'|'.$app[0]->referenceNum, $custom_encrypt)))."'
					id='btn-view-details'
					class='btn btn-primary'><i class='fa fa-info-circle' aria-hidden='true'></i></a>
					<button
					id='".base_url('dashboard/cancel_application/'.bin2hex($this->encryption->encrypt($app[0]->referenceNum,$custom_encrypt)))."'
					value='Cancel'
					class='btn btn-danger btn-cancel'><i class='fa fa-ban' aria-hidden='true'></button>";
				}
				break;
				// case "For finalization":
				// $buttons[$key] = "<a
				// href='".base_url('form/view/'.bin2hex($this->encryption->encrypt($value['id'].'|'.$app[0]->referenceNum, $custom_encrypt)))."'
				// id='btn-view-details'
				// class='btn btn-primary'><i class='fa fa-info-circle' aria-hidden='true'></i></a>";
				// break;
				case "For Retirement":
				$buttons[$key] = "<a
				href='".base_url('form/view/'.bin2hex($this->encryption->encrypt($value['id'].'|'.$app[0]->referenceNum, $custom_encrypt)))."'
				id='btn-view-details'
				class='btn btn-primary'><i class='fa fa-info-circle' aria-hidden='true'></i></a>";
				break;
			}
		}
			// echo "<pre>";
			// print_r($status_array);
			// echo "</pre>";
			// exit();


		$data['buttons'] = $buttons;
		$data['status_array'] = $status_array;
	}

	$data['notifications'] = User::get_notifications();

	echo json_encode($data);
}

public function get_business_profile()
{
	$this->isLogin();
	$business_id = $this->encryption->decrypt($this->input->get('id'));
	$query['businessId'] = $business_id;
	$data['business'] = $this->Business_m->get_all_businesses($query);
	$data['owner_name'] = $this->Owner_m->get_owner_name($data['business'][0]->ownerId);

	$result = (object) array_merge((array) $data['business'][0], (array) $data['owner_name'][0]);

	echo json_encode($result);
}

public function process_assessments($reference_number)
{
	$this->isLogin();
	$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

	$bplo = new BPLO_Application($reference_number);
	$business_activity = $bplo->get_BusinessActivities();
		// echo "<pre>";
		// print_r($business_activity);
		// echo "</pre>";
		// exit();
	$query['referenceNum'] = $reference_number;
	$assessment = $this->Assessment_m->get_assessment($query);
	$assessmentId = $assessment[0]->assessmentId;
	$work_force = $bplo->get_MaleEmployees() + $bplo->get_FemaleEmployees() + $bplo->get_PWDEmployees();

	if ($bplo->get_applicationType() == "New") {
		$total = 0;
		$environmental_total = 0;
		foreach ($business_activity as $key => $activity) {
			$fees = Assessment::compute_mayors_permit_fee($activity, $work_force);
			$environmental_total += Assessment::compute_environmental_clearance_fee($activity->capitalization);
			$garbage_service_fee[] = $fees['garbage_service_fee'];
			$charge_field = array(
				'assessmentId' => $assessmentId,
				'due' => $fees['mayor_fee'],
				'period' => 'F1',
				'surcharge' => 0,
				'interest' => 0,
				'particulars' => 'MAYOR\'S PERMIT FEE ('.strtoupper($activity->lineOfBusiness).')'
				);
			$this->Assessment_m->add_charge($charge_field);
			$total += $fees['mayor_fee'];

			if($fees['tax'] > 200)
			{
				switch($bplo->get_modeOfPayment())
				{
					case "Anually":
					$tax[0] = $fees['tax'];
					break;
					case "Semi-Anually":
					$tax[0] = $fees['tax']/2;
					$tax[1] = $fees['tax']/2;
					break;
					case "Quarterly":
					$tax[0] = $fees['tax']/4;
					$tax[1] = $fees['tax']/4;
					$tax[2] = $fees['tax']/4;
					$tax[3] = $fees['tax']/4;
					break;
				}

				if($bplo->get_modeOfPayment() == "Semi-Anually")
				{
					for ($i=0; $i < count($tax); $i++) 
					{ 
						if ($i == 0) {
							$charge_field = array(
								'assessmentId' => $assessmentId,
								'period' => "Q1",
								'due' => $tax[$i],
								'surcharge' => 0,
								'interest' => 0,
								'particulars' => 'TAX ON '.strtoupper($activity->lineOfBusiness)
								);
							$this->Assessment_m->add_charge($charge_field);
						}
						else if($i == 1)
						{
							$charge_field = array(
								'assessmentId' => $assessmentId,
								'period' => "Q3",
								'due' => $tax[$i],
								'surcharge' => 0,
								'interest' => 0,
								'particulars' => 'TAX ON '.strtoupper($activity->lineOfBusiness)
								);
							$this->Assessment_m->add_charge($charge_field);
						}
					}
				}
				else
				{
					foreach ($tax as $key => $t) {
						$charge_field = array(
							'assessmentId' => $assessmentId,
							'period' => "Q" . ($key+1),
							'due' => $t,
							'surcharge' => 0,
							'interest' => 0,
							'particulars' => 'TAX ON '.strtoupper($activity->lineOfBusiness)
							);
						$this->Assessment_m->add_charge($charge_field);
						$total += $t;
					}
				}
			}
			else
			{
				$charge_field = array(
					'assessmentId' => $assessmentId,
					'period' => "F1",
					'due' => $fees['tax'],
					'surcharge' => 0,
					'interest' => 0,
					'particulars' => 'TAX ON '.strtoupper($activity->lineOfBusiness)
					);
				$this->Assessment_m->add_charge($charge_field);
				$total += $fees['tax'];
			}
		}
			//END OF FOREACH

		$charge_field = array(
			'assessmentId' => $assessmentId,
			'due' => $garbage_service_fee[0],
			'period' => 'F1',
			'surcharge' => 0,
			'interest' => 0,
			'particulars' => 'GARBAGE SERVICE FEE',
			);
		$this->Assessment_m->add_charge($charge_field);
		$total += $garbage_service_fee[0];

		$charge_field = array(
			'assessmentId' => $assessmentId,
			'due' => $environmental_total,
			'period' => 'F1',
			'surcharge' => 0,
			'interest' => 0,
			'particulars' => 'ENVIRONMENTAL CLEARANCE FEE',
			);
		$this->Assessment_m->add_charge($charge_field);
		$total += $environmental_total;

		$health_card_fee = Assessment::compute_health_card_fee($work_force);
		$charge_field = array(
			'assessmentId' => $assessmentId,
			'due' => $health_card_fee,
			'period' => 'F1',
			'surcharge' => 0,
			'interest' => 0,
			'particulars' => 'HEALTH CARD FEE',
			);
		$this->Assessment_m->add_charge($charge_field);
		$total += $health_card_fee;

		$sanitary_fee = Assessment::compute_sanitary_permit_fee($bplo->get_BusinessArea());
		$charge_field = array(
			'assessmentId' => $assessmentId,
			'due' => $sanitary_fee,
			'period' => 'F1',
			'surcharge' => 0,
			'interest' => 0,
			'particulars' => 'SANITARY PERMIT FEE',
			);
		$this->Assessment_m->add_charge($charge_field);
		$total += $sanitary_fee;

		$fixed_fees = Assessment::get_fixed_fees();
		foreach ($fixed_fees['fee'] as $key => $fee) {
			$charge_field = array(
				'assessmentId' => $assessmentId,
				'due' => $fee,
				'period' => 'F1',
				'surcharge' => 0,
				'interest' => 0,
				'particulars' => strtoupper($fixed_fees['particular'][$key]),
				);
			$this->Assessment_m->add_charge($charge_field);
			$total += $fee;
		}
	}
	else
	{
		//CHECK FOR DELINQUENCIES FIRST
		$delinquents = $this->Assessment_m->get_delinquencies($reference_number);
		foreach ($delinquents as $key => $charge) {
			$set['status'] = 'delinquent';
			$this->Assessment_m->update_charge($charge->chargeId, $set);

			$charge_field = array(
				'assessmentId' => $assessmentId,
				'due' => $charge->due,
				'period' => "F1",
				'surcharge' => $charge->surcharge,
				'interest' => $charge->interest,
				'particulars' => "[".$charge->period."|DEL|".date('Y', strtotime($charge->createdAt))."] ".$charge->particulars,
				);
			$this->Assessment_m->add_charge($charge_field);
		}
		unset($query);

		$environmental_total = 0;
		foreach ($business_activity as $key => $activity) {
			$fees = Assessment::compute_mayors_permit_fee($activity, $work_force);
			$environmental_total += Assessment::compute_environmental_clearance_fee($activity->capitalization);
			$garbage_service_fee[] = $fees['garbage_service_fee'];
			$charge_field = array(
				'assessmentId' => $assessmentId,
				'due' => $fees['mayor_fee'],
				'period' => 'F1',
				'surcharge' => 0,
				'interest' => 0,
				'particulars' => 'MAYOR\'S PERMIT FEE ('.strtoupper($activity->lineOfBusiness).')'
				);
			$this->Assessment_m->add_charge($charge_field);

			if($activity->activityStatus == "active")
			{
				$renewal_tax = 0;
				$total_gross = $activity->previousGross[0]->essentials + $activity->previousGross[0]->nonEssentials;
				$activity->capitalization = $total_gross;

				$imposition_of_tax = $activity->impositionOfTaxCategory;
				if($imposition_of_tax == "A" && $imposition_of_tax == "B" && $imposition_of_tax == "D")
				{
					$fee = Assessment::compute_renewal_tax($imposition_of_tax, $essential[$key], "essential");
					$renewal_tax += $fee;

					$fee = Assessment::compute_renewal_tax($imposition_of_tax, $non_essential[$key], "non-essential");
					$renewal_tax += $fee;
				}
				else
				{
					$fee = Assessment::compute_renewal_tax($imposition_of_tax, $total_gross);
					$renewal_tax += $fee;
				}
				$fees['tax'] += $renewal_tax;
			}

			if($fees['tax'] > 200)
			{
				switch($bplo->get_modeOfPayment())
				{
					case "Anually":
					$tax[0] = $fees['tax'];
					break;
					case "Semi-Anually":
					$tax[0] = $fees['tax']/2;
					$tax[1] = $fees['tax']/2;
					break;
					case "Quarterly":
					$tax[0] = $fees['tax']/4;
					$tax[1] = $fees['tax']/4;
					$tax[2] = $fees['tax']/4;
					$tax[3] = $fees['tax']/4;
					break;
				}

				foreach ($tax as $key => $t) {
					$charge_field = array(
						'assessmentId' => $assessmentId,
						'period' => "Q" . ($key+1),
						'due' => $t,
						'surcharge' => 0,
						'interest' => 0,
						'particulars' => 'TAX ON '.strtoupper($activity->lineOfBusiness)
						);
					$this->Assessment_m->add_charge($charge_field);
				}
			}
			else
			{
				$charge_field = array(
					'assessmentId' => $assessmentId,
					'period' => "F1",
					'due' => $fees['tax'],
					'surcharge' => 0,
					'interest' => 0,
					'particulars' => 'TAX ON '.strtoupper($activity->lineOfBusiness)
					);
				$this->Assessment_m->add_charge($charge_field);
			}
		}
			//END OF FOREACH

		$charge_field = array(
			'assessmentId' => $assessmentId,
			'due' => $garbage_service_fee[0],
			'period' => 'F1',
			'surcharge' => 0,
			'interest' => 0,
			'particulars' => 'GARBAGE SERVICE FEE',
			);
		$this->Assessment_m->add_charge($charge_field);

		$charge_field = array(
			'assessmentId' => $assessmentId,
			'due' => $environmental_total,
			'period' => 'F1',
			'surcharge' => 0,
			'interest' => 0,
			'particulars' => 'ENVIRONMENTAL CLEARANCE FEE',
			);
		$this->Assessment_m->add_charge($charge_field);

		$health_card_fee = Assessment::compute_health_card_fee($work_force);
		$charge_field = array(
			'assessmentId' => $assessmentId,
			'due' => $health_card_fee,
			'period' => 'F1',
			'surcharge' => 0,
			'interest' => 0,
			'particulars' => 'HEALTH CARD FEE',
			);
		$this->Assessment_m->add_charge($charge_field);

		$sanitary_fee = Assessment::compute_sanitary_permit_fee($bplo->get_BusinessArea());
		$charge_field = array(
			'assessmentId' => $assessmentId,
			'due' => $sanitary_fee,
			'period' => 'F1',
			'surcharge' => 0,
			'interest' => 0,
			'particulars' => 'SANITARY PERMIT FEE',
			);
		$this->Assessment_m->add_charge($charge_field);

		$fixed_fees = Assessment::get_fixed_fees();
		foreach ($fixed_fees['fee'] as $key => $fee) {
			$charge_field = array(
				'assessmentId' => $assessmentId,
				'due' => $fee,
				'period' => 'F1',
				'surcharge' => 0,
				'interest' => 0,
				'particulars' => strtoupper($fixed_fees['particular'][$key]),
				);
			$this->Assessment_m->add_charge($charge_field);
		}
	}

	$this->Assessment_m->refresh_assessment_amount(['referenceNum' => $reference_number]);

}
	//END AJAX FUNCTIONS

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

}
//END OF CLASS,
