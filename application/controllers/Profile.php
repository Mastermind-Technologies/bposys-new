<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('Owner_m');
		$this->load->model('Business_m');
		$this->load->model('Role_m');
		$this->load->model('Payment_m');
		$this->load->library('form_validation');
		$this->load->model('Assessment_m');

		$this->load->model('Business_Address_m');
	}

	public function _init($data = null)
	{
		if($this->encryption->decrypt($this->session->userdata['userdata']['role']) != "Applicant")
		{
			redirect('dashboard');
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


	public function index()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$data['user'] = new User($this->encryption->decrypt($this->session->userdata['userdata']['userId']));

		$this->load->view('profile/index', $data);
	}

	public function isLogin()
	{
		if(!isset($this->session->userdata['userdata']))
		{
			redirect('error/error403b');
		}
		else
		{
			if($this->encryption->decrypt($this->session->userdata['userdata']['role']) != "Applicant")
			{
					redirect('error/error403');
			}
		}
	}

	public function edit()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$data['user'] = new User($user_id);

		$this->load->view('profile/edit_profile', $data);
	}

	public function save_edit_info($fields = null)
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('birth-date', 'Birth Date', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('civil-status', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('contact-number', 'Contact Number', 'required');
		// $this->form_validation->set_rules('position', 'Position', 'required');
		// $this->form_validation->set_rules('house-bldg-no', 'Civil Status', 'required');
		// $this->form_validation->set_rules('bldg-name', 'Building Name', 'required');
		// $this->form_validation->set_rules('unit-no', 'Unit Number', 'required');
		// $this->form_validation->set_rules('street', 'Street', 'required');
		// $this->form_validation->set_rules('barangay', 'Barangay', 'required');
		// $this->form_validation->set_rules('subdivision', 'Subdivision', 'required');
		// $this->form_validation->set_rules('city-municipality', 'City/Municipality', 'required');
		// $this->form_validation->set_rules('province', 'Province', 'required');
		// $this->form_validation->set_rules('contact-number', 'Contact Number', 'required');
		// $this->form_validation->set_rules('business-area', 'Business Area', 'required');
		// $this->form_validation->set_rules('num-of-employees', 'Number of Employees', 'required');


		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('profile/edit');
		}
		else
		{
			$fields = array(
				'firstName' => $this->input->post('fname'),
				'lastName' => $this->input->post('lname'),
				'middleName' => $this->input->post('mname'),
				'suffix' => $this->input->post('suffix'),
				'gender' => $this->input->post('gender'),
				'birthDate' => $this->input->post('birth-date'),
				'civilStatus' => $this->input->post('civil-status'),
				'email' => $this->input->post('email'),
				'contactNum' => $this->input->post('contact-number'),
				);
			$this->User_m->update_user($fields);
			$this->session->set_flashdata('message', 'Profile updated successfully!');
			redirect('profile');
		}
	}

	public function owners()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "owner";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$query['userId'] = $user_id;
		$owner = $this->Owner_m->get_all_owners($query);
		$unapplied = $this->Owner_m->get_unapplied_business_owners($user_id);

		foreach ($owner as $key => $o)
		{
			$data['owner'][$key] = new Owner($o->ownerId);
			if(count($unapplied) != 0)
			{
				foreach ($unapplied as $u) {
					if($o->ownerId == $u->ownerId)
					{
						$data['owner'][$key]->set_IsApplied(0);
						break;
					}
					else
					{
						$data['owner'][$key]->set_IsApplied(1);
					}
				}
			}
			else
			{
				$data['owner'][$key]->set_IsApplied(1);
			}
		}
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();


		$this->load->view('profile/manage_owners', $data);
	}


	public function view_owner()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "owner";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$owner_id = $this->input->get('n');

		$data['owner'] = new Owner($owner_id);

		$this->load->view('profile/view-owner',$data);
	}

	public function edit_owner()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "owner";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$owner_id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $this->input->get('ownr')));

		$data['owner'] = new Owner($owner_id);

		$this->load->view('profile/edit-owner',$data);
	}

	public function add_owner()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "owner";
		$this->_init($nav_data);
		$userId = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		if($this->input->get('ft') == "1")
		{
			$this->session->set_flashdata('message', 'Welcome to <strong>BPOSYS</strong>! Please set up your initial owner profile before you can proceed. Just fill up the fields below.');
		}
		$this->load->view('profile/add-owner');
	}

	public function save_edit_owner($owner_id)
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('house-bldg-no', 'Civil Status', 'required');
		$this->form_validation->set_rules('bldg-name', 'Building Name', 'required');
		$this->form_validation->set_rules('unit-no', 'Unit Number', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('barangay', 'Barangay', 'required');
		$this->form_validation->set_rules('subdivision', 'Subdivision', 'required');
		$this->form_validation->set_rules('city-municipality', 'City/Municipality', 'required');
		$this->form_validation->set_rules('province', 'Province', 'required');
		$this->form_validation->set_rules('PIN', 'Zip/Postal Code', 'required');
		$this->form_validation->set_rules('contact-number', 'Contact Number', 'required');
		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('profile/add_owner');
		}
		else
		{
			$owner_id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $owner_id));
			$fields = array(
				'userId' => $user_id,
				'firstName' => $this->input->post('fname'),
				'middleName' => $this->input->post('mname'),
				'lastName' => $this->input->post('lname'),
				'suffix' => $this->input->post('suffix'),
				'gender' => $this->input->post('gender'),
				'bldgName' => $this->input->post('bldg-name'),
				'houseBldgNo' => $this->input->post('house-bldg-no'),
				'unitNum' => $this->input->post('unit-no'),
				'street' => $this->input->post('street'),
				'barangay' => $this->input->post('barangay'),
				'subdivision' => $this->input->post('subdivision'),
				'cityMunicipality' => $this->input->post('city-municipality'),
				'province' => $this->input->post('province'),
				'PIN' => $this->input->post('PIN'),
				'contactNum' => $this->input->post('contact-number'),
				'telNum' => $this->input->post('telephone-number'),
				'email' => $this->input->post('email'),
				);
			$this->Owner_m->update_owner($owner_id, $fields);

			$this->session->set_flashdata('message','Owner details updated successfully!');
			redirect('profile/owners');
		}
	}

	public function save_owner()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('house-bldg-no', 'Civil Status', 'required');
		$this->form_validation->set_rules('bldg-name', 'Building Name', 'required');
		$this->form_validation->set_rules('unit-no', 'Unit Number', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('barangay', 'Barangay', 'required');
		$this->form_validation->set_rules('subdivision', 'Subdivision', 'required');
		$this->form_validation->set_rules('city-municipality', 'City/Municipality', 'required');
		$this->form_validation->set_rules('province', 'Province', 'required');
		$this->form_validation->set_rules('PIN', 'Zip/Postal Code', 'required');
		$this->form_validation->set_rules('contact-number', 'Contact Number', 'required');
		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('profile/add_owner');
		}
		else
		{
			$fields = array(
				'userId' => $user_id,
				'firstName' => $this->input->post('fname'),
				'middleName' => $this->input->post('mname'),
				'lastName' => $this->input->post('lname'),
				'suffix' => $this->input->post('suffix'),
				'gender' => $this->input->post('gender'),
				'bldgName' => $this->input->post('bldg-name'),
				'houseBldgNo' => $this->input->post('house-bldg-no'),
				'unitNum' => $this->input->post('unit-no'),
				'street' => $this->input->post('street'),
				'barangay' => $this->input->post('barangay'),
				'subdivision' => $this->input->post('subdivision'),
				'cityMunicipality' => $this->input->post('city-municipality'),
				'province' => $this->input->post('province'),
				'PIN' => $this->input->post('PIN'),
				'contactNum' => $this->input->post('contact-number'),
				'telNum' => $this->input->post('telephone-number'),
				'email' => $this->input->post('email'),
				);

			$this->Owner_m->insert($fields);

			if($this->Business_m->count_businesses() > 0)
				redirect('profile/owners');
			else
				redirect('profile/add_business?ft=1');
		}
	}

	public function businesses()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "business";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$query['userId'] = $user_id;
		$business = $this->Business_m->get_all_businesses($query);
		foreach ($business as $key => $b) {
			$data['business'][] = new Business($b->businessId);
		}

		$unapplied = $this->Business_m->get_all_unapplied_businesses($user_id);
		foreach ($data['business'] as $key => $b) {
			if(count($unapplied) != 0)
			{
				foreach ($unapplied as $key => $u) {
					if($b->get_BusinessName() == $u->businessName)
					{
						$b->set_IsApplied(0);
						break;
					}
					else
					{
						$b->set_IsApplied(1);
					}
				}
			}
			else
			{
				$b->set_IsApplied(1);
			}
		}

		$this->load->view('profile/manage_businesses', $data);
	}

	public function view_business()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "business";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$business_id = $this->input->get("n");

		$data['business'] = new Business($business_id);

		$this->load->view('profile/view-business', $data);
	}

	public function edit_business()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "business";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$business_id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $this->input->get('app')));

		$data['business'] = new Business($business_id);
		$query['userId'] = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$data['owner'] = $this->Owner_m->get_all_owners($query);

		$this->load->view('profile/edit-business', $data);
	}

	public function add_business()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "business";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		if($this->input->get('ft') == 1)
		{
			$this->session->set_flashdata('message', '<strong>You\'re almost there</strong>! Please set up your initial business profile before you can proceed to your dashboard and apply for your permits/clearances.');
			$this->session->set_flashdata('ft','1');
		}
		if($this->Owner_m->count_owners() > 0)
		{
			$query['userId'] = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
			$data['owner'] = $this->Owner_m->get_all_owners($query);
			$this->load->view('profile/add-business', $data);
		}
		else
		{
			redirect('profile/manage_owners?ft=1');
		}
	}

	public function save_edit_business($business_id)
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$this->form_validation->set_rules('business-owner','Business Owner','required');
		$this->form_validation->set_rules('business-name','Business Name','required');
		$this->form_validation->set_rules('company-name','Company Name','required');
		$this->form_validation->set_rules('trade-name','Trade/Franchise Name','required');
		$this->form_validation->set_rules('signage-name','Signage Name','required');
		$this->form_validation->set_rules('zone-type', 'Zone Type', 'required');
		// $this->form_validation->set_rules('nature-of-business','Nature of Business','required');
		$this->form_validation->set_rules('organization-type','Organization Type','required');
		if($this->input->post('organization-type') == 'Corporation')
			$this->form_validation->set_rules('corporation-name', 'Corporation Name', 'required');
		$this->form_validation->set_rules('date-of-operation','Date of Operation','required');
		$this->form_validation->set_rules('business-area','Business Area','required');
		$this->form_validation->set_rules('business-desc','Business Description', 'required');
		$this->form_validation->set_rules('house-bldg-no','HouseN No./Bldg No.','required');
		$this->form_validation->set_rules('bldg-name','Building Name','required');
		$this->form_validation->set_rules('unit-no','Unit No.','required');
		$this->form_validation->set_rules('street','Street','required');
		$this->form_validation->set_rules('subdivision','Subdivision','required');
		$this->form_validation->set_rules('barangay','Barangay','required');
		// $this->form_validation->set_rules('g-address', 'Please point your business location on google maps.', 'required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('PIN','Zip/Postal Code','required');
		$this->form_validation->set_rules('telephone-number','Telephone Number','required');
		$this->form_validation->set_rules('pollution-control-officer','Pollution Control Officer','required');
		$this->form_validation->set_rules('male-employees','No. of Male Employees','required|numeric');
		$this->form_validation->set_rules('female-employees','No. of Female Employees','required|numeric');
		$this->form_validation->set_rules('pwd-employees','No. of PWD Employees','required|numeric');
		$this->form_validation->set_rules('lgu-employees', 'No. of Employees Residing in LGU', 'required|numeric');
		$this->form_validation->set_rules('president-treasurer-name', 'Name of President/Treasurer of Corporation','required');
		$this->form_validation->set_rules('emergency-contact-name', "Lessor's Address", 'required');
		$this->form_validation->set_rules('emergency-tel-cel-no', "Lessor's Address", 'required|numeric');
		$this->form_validation->set_rules('emergency-email', "Lessor's Address", 'required');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('profile/add_business');
		}
		else
		{
			$business_id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $business_id));
			$barangay = $this->encryption->decrypt($this->input->post('barangay'));
			switch($barangay)
			{
				case "Biñan": break;
				case "Bungahan": break;
				case "Canlalay": break;
				case "Casile": break;
				case "Dela Paz": break;
				case "Ganado": break;
				case "Langkiwa": break;
				case "Loma": break;
				case "Malaban": break;
				case "Malamig": break;
				case "Mampalasan": break;
				case "Platero": break;
				case "Poblacion": break;
				case "San Antonio": break;
				case "San Francisco (Halang)": break;
				case "San Jose": break;
				case "San Vicente": break;
				case "Santo Domingo": break;
				case "Soro-Soro": break;
				case "Sto. Niño": break;
				case "Sto. Tomas (Calabuso)": break;
				case "Timbao": break;
				case "Tubigan": break;
				case "Zapote": break;
				default:
				$this->session->set_flashdata('error', 'Invalid Barangay!');
				redirect('profile/add_business');
				break;
			}

			$fields = array(
				'userId' => $user_id,
				'ownerId' => $this->encryption->decrypt($this->input->post('business-owner')),
				'businessName' => $this->input->post('business-name'),
				'companyName' => $this->input->post('company-name'),
				'tradeName' => $this->input->post('trade-name'),
				'signageName' => $this->input->post('signage-name'),
				'zoneType' => $this->input->post('zone-type'),
				// 'natureOfBusiness' => $this->input->post('nature-of-business'),
				'organizationType' => $this->input->post('organization-type'),
				'corporationName' => $this->input->post('organization-type')=="Corporation" ? $this->input->post('corporation-name') : "NA",
				'dateOfOperation' => $this->input->post('date-of-operation'),
				'businessDesc' => $this->input->post('business-desc'),
				'bldgName' => $this->input->post('bldg-name'),
				'houseBldgNum' => $this->input->post('house-bldg-no'),
				'unitNum' => $this->input->post('unit-no'),
				'street' => $this->input->post('street'),
				'barangay' => $barangay,
				'subdivision' => $this->input->post('subdivision'),
				'cityMunicipality' => "Biñan City",
				'province' => "Laguna",
				'lat' => $this->input->post('lat') == "" ? "NA" : $this->input->post('lat'),
				'lng' => $this->input->post('lng') == "" ? "NA" : $this->input->post('lng'),
				'gmapAddress' => $this->input->post('g-address') == "" ? "NA" : $this->input->post('g-address'),
				'PIN' => $this->input->post('PIN'),
				'telNum' => $this->input->post('telephone-number'),
				'email' => $this->input->post('email'),
				'pollutionControlOfficer' => $this->input->post('pollution-control-officer'),
				'maleEmployees' => $this->input->post('male-employees'),
				'femaleEmployees' => $this->input->post('female-employees'),
				'PWDEmployees' => $this->input->post('pwd-employees'),
				'LGUResidingEmployees' => $this->input->post('lgu-employees'),
				'businessArea' => $this->input->post('business-area'),
				'presidentTreasurerName' => $this->input->post('president-treasurer-name'),
				'emergencyContactPerson' => $this->input->post('emergency-contact-name'),
				'emergencyTelNum' => $this->input->post('emergency-tel-cel-no'),
				'emergencyEmail' => $this->input->post('emergency-email'),
				);
			$this->Business_m->update_business($business_id, $fields);

			$this->session->set_flashdata('message','Business details updated successfully!');
			redirect('profile/businesses');
		}
	}

	public function save_business()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$this->form_validation->set_rules('business-owner','Business Owner','required');
		$this->form_validation->set_rules('business-name','Business Name','required');
		$this->form_validation->set_rules('company-name','Company Name','required');
		$this->form_validation->set_rules('trade-name','Trade/Franchise Name','required');
		$this->form_validation->set_rules('signage-name','Signage Name','required');
		$this->form_validation->set_rules('zone-type', 'Zone Type', 'required');
		// $this->form_validation->set_rules('nature-of-business','Nature of Business','required');
		$this->form_validation->set_rules('organization-type','Organization Type','required');
		if($this->input->post('organization-type') == 'Corporation')
			$this->form_validation->set_rules('corporation-name', 'Corporation Name', 'required');
		$this->form_validation->set_rules('date-of-operation','Date of Operation','required');
		$this->form_validation->set_rules('business-area','Business Area','required');
		$this->form_validation->set_rules('business-desc','Business Description', 'required');
		$this->form_validation->set_rules('house-bldg-no','HouseN No./Bldg No.','required');
		$this->form_validation->set_rules('bldg-name','Building Name','required');
		$this->form_validation->set_rules('unit-no','Unit No.','required');
		$this->form_validation->set_rules('street','Street','required');
		$this->form_validation->set_rules('subdivision','Subdivision','required');
		$this->form_validation->set_rules('barangay','Barangay','required');
		// $this->form_validation->set_rules('g-address', 'Please point your business location on google maps.', 'required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('PIN','Zip/Postal Code','required');
		$this->form_validation->set_rules('telephone-number','Telephone Number','required');
		$this->form_validation->set_rules('pollution-control-officer','Pollution Control Officer','required');
		$this->form_validation->set_rules('male-employees','No. of Male Employees','required|numeric');
		$this->form_validation->set_rules('female-employees','No. of Female Employees','required|numeric');
		$this->form_validation->set_rules('pwd-employees','No. of PWD Employees','required|numeric');
		$this->form_validation->set_rules('lgu-employees', 'No. of Employees Residing in LGU', 'required|numeric');
		$this->form_validation->set_rules('president-treasurer-name', 'Name of President/Treasurer of Corporation','required');
		$this->form_validation->set_rules('emergency-contact-name', "Lessor's Address", 'required');
		$this->form_validation->set_rules('emergency-tel-cel-no', "Lessor's Address", 'required|numeric');
		$this->form_validation->set_rules('emergency-email', "Lessor's Address", 'required');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('profile/add_business');
		}
		else
		{
			$barangay = $this->encryption->decrypt($this->input->post('barangay'));
			switch($barangay)
			{
				case "Biñan": break;
				case "Bungahan": break;
				case "Canlalay": break;
				case "Casile": break;
				case "Dela Paz": break;
				case "Ganado": break;
				case "Langkiwa": break;
				case "Loma": break;
				case "Malaban": break;
				case "Malamig": break;
				case "Mampalasan": break;
				case "Platero": break;
				case "Poblacion": break;
				case "San Antonio": break;
				case "San Francisco (Halang)": break;
				case "San Jose": break;
				case "San Vicente": break;
				case "Santo Domingo": break;
				case "Soro-Soro": break;
				case "Sto. Niño": break;
				case "Sto. Tomas (Calabuso)": break;
				case "Timbao": break;
				case "Tubigan": break;
				case "Zapote": break;
				default:
				$this->session->set_flashdata('error', 'Invalid Barangay!');
				redirect('profile/add_business');
				break;
			}

			$fields = array(
				'userId' => $user_id,
				'ownerId' => $this->encryption->decrypt($this->input->post('business-owner')),
				'businessName' => $this->input->post('business-name'),
				'companyName' => $this->input->post('company-name'),
				'tradeName' => $this->input->post('trade-name'),
				'signageName' => $this->input->post('signage-name'),
				'zoneType' => $this->input->post('zone-type'),
				// 'natureOfBusiness' => $this->input->post('nature-of-business'),
				'organizationType' => $this->input->post('organization-type'),
				'corporationName' => $this->input->post('organization-type')=="Corporation" ? $this->input->post('corporation-name') : "NA",
				'dateOfOperation' => $this->input->post('date-of-operation'),
				'businessDesc' => $this->input->post('business-desc'),
				'bldgName' => $this->input->post('bldg-name'),
				'houseBldgNum' => $this->input->post('house-bldg-no'),
				'unitNum' => $this->input->post('unit-no'),
				'street' => $this->input->post('street'),
				'barangay' => $barangay,
				'subdivision' => $this->input->post('subdivision'),
				'cityMunicipality' => "Biñan City",
				'province' => "Laguna",
				'lat' => $this->input->post('lat') == "" ? "NA" : $this->input->post('lat'),
				'lng' => $this->input->post('lng') == "" ? "NA" : $this->input->post('lng'),
				'gmapAddress' => $this->input->post('g-address') == "" ? "NA" : $this->input->post('g-address'),
				'PIN' => $this->input->post('PIN'),
				'telNum' => $this->input->post('telephone-number'),
				'email' => $this->input->post('email'),
				'pollutionControlOfficer' => $this->input->post('pollution-control-officer'),
				'maleEmployees' => $this->input->post('male-employees'),
				'femaleEmployees' => $this->input->post('female-employees'),
				'PWDEmployees' => $this->input->post('pwd-employees'),
				'LGUResidingEmployees' => $this->input->post('lgu-employees'),
				'businessArea' => $this->input->post('business-area'),
				'presidentTreasurerName' => $this->input->post('president-treasurer-name'),
				'emergencyContactPerson' => $this->input->post('emergency-contact-name'),
				'emergencyTelNum' => $this->input->post('emergency-tel-cel-no'),
				'emergencyEmail' => $this->input->post('emergency-email'),
				);
			$this->Business_m->insert($fields);

			if($this->input->get('ft'))
			{
				redirect('dashboard');
			}
			else
			{
				redirect('profile/businesses');
			}

		}
	}

	public function payment_history()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "payment_history";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$data['payments'] = $this->Payment_m->get_user_payments($user_id);

		$this->load->view('profile/view_payment_history',$data);
	}

	public function unsettled_charges()
	{
		$this->isLogin();
		$nav_data['notifications'] = User::get_notifications();
		$nav_data['title'] = "unsettled_charges";
		$this->_init($nav_data);
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

		$today = strtotime('October 20 2017');
		$Q1 = new DateTime('January 21 '. date('Y'));
		$Q2 = new DateTime('April 21 '. date('Y'));
		$Q3 = new DateTime('July 21 '. date('Y'));
		$Q4 = new DateTime('October 21 '. date('Y'));
		$now = new DateTime('October 20 2017');
		$test2 = new DateTime('April 2017');


		$query = "users.userId = '$user_id' and charges.status = 'not paid' and (charges.period = 'F1' or charges.period = 'Q1' or charges.period = 'Q2' or charges.period = 'Q3' or charges.period = 'Q4')";

		// if($now >= $Q2 && $now < $Q3)
		// {
		// 	$currentQuarter = 'Q2';
		// 	// $query = "users.userId = '$user_id' and charges.status = 'Unpaid' and (charges.period = 'Q1' or charges.period = 'Q2')";
		// }
		// else if($now >= $Q3 && $now < $Q4)
		// {
		// 	$currentQuarter = 'Q3';
		// 	// $query = "users.userId = '$user_id' and charges.status = 'Unpaid' and (charges.period = 'Q1' or charges.period = 'Q2' or charges.period = 'Q3')";
		// }
		// else if($now >= $Q4)
		// {
		// 	$currentQuarter = 'Q4';
		// 	// $query = "users.userId = '$user_id' and charges.status = 'Unpaid' and (charges.period = 'Q1' or charges.period = 'Q2' or charges.period = 'Q3' or charges.period = 'Q4')";
		// }
		// else
		// {
		// 	$currentQuarter = 'Q1';
		// 	// $query = "users.userId = '$user_id' and charges.status = 'Unpaid' and (charges.period = 'F1' or charges.period = 'Q1' or charges.period = 'Q2' or charges.period = 'Q3' or charges.period = 'Q4')";
		// }

		//if($today >)
		$data['unsettled_charges'] = $this->Assessment_m->get_unsettled_charges($query);

		// for($i=0;$i<count($data['unsettled_charges']);$i=$i+1)
		// {
		// 	$createdAt = new DateTime($data['unsettled_charges'][$i]->createdAt);
		// 	$updatedAt = new DateTime($data['unsettled_charges'][$i]->updatedAt);
		// 	$tax = 0;
		// 	$surcharge = 0;
		// 	switch($data['unsettled_charges'][$i]->period)
		// 	{
		// 		case 'Q1':
		// 		{
		// 			if($currentQuarter == 'Q1' || $currentQuarter == 'Q2' || $currentQuarter == 'Q3' || $currentQuarter == 'Q4')
		// 			{
		// 				print_r("aw1a");
		// 			}
		// 		}break;
		// 		case 'F1':
		// 		{
		// 			if($currentQuarter == 'Q1' || $currentQuarter == 'Q2' || $currentQuarter == 'Q3' || $currentQuarter == 'Q4')
		// 			{
		// 				print_r("aw1b");
		// 			}
		// 		}break;
		// 		case 'Q2':
		// 		{
		// 			if($currentQuarter == 'Q2' || $currentQuarter == 'Q3' || $currentQuarter == 'Q4')
		// 			{
		// 				$difference = $createdAt->diff($now);
		// 				for($j = $difference->format('%m'); $j != 0; $j = $j - 1)
		// 				{
		// 					if($j == $difference->format('%m'))
		// 					{
		// 						$surcharge = $data['unsettled_charges'][$i]->due * 0.25;
		//
		// 					}
		// 					else
		// 					{
		// 						$tax = $tax +  $data['unsettled_charges'][$i]->due * 0.02;
		// 					}
		// 				}
		// 				print_r("<br />Particular: " . $data['unsettled_charges'][$i]->particulars);
		// 				print_r("<br />Due: " . $data['unsettled_charges'][$i]->due);
		// 				print_r("<br />Surcharge: " . $surcharge);
		// 				print_r("<br />Tax: " . $tax);
		// 			}
		// 		}break;
		// 		case 'Q3':
		// 		{
		// 			if($currentQuarter == 'Q3' || $currentQuarter == 'Q4')
		// 			{
		// 				print_r("aw3");
		// 			}
		// 		}break;
		// 		case 'Q4':
		// 		{
		// 			if($currentQuarter == 'Q4')
		// 			{
		//
		// 			}
		// 			else
		// 			{
		// 				print_r("<br />Particular: " . $data['unsettled_charges'][$i]->particulars);
		// 				print_r("<br />Due: " . $data['unsettled_charges'][$i]->due);
		// 				print_r("<br />Surcharge: " . $surcharge);
		// 				print_r("<br />Tax: " . $tax);
		// 			}
		// 		}break;
		// 	}
		// }

		// echo '<pre>';
		// print_r($data['unsettled_charges']);
		// echo '</pre>';
		$this->load->view('profile/view_unsettled_charges', $data);
	}

	// public function manage_business_address()
	// {
	// 	$this->isLogin();
	// 	$this->_init();
	// 	$userId = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

	// 	$query['userId'] = $userId;
	// 	$data['business_addresses'] = $this->Business_Address_m->get_all_business_addresses($query);

	// 	$this->load->view('profile/manage_business_address', $data);
	// }

	// public function save_business_address()
	// {
	// 	$this->isLogin();
	// 	$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);

	// 	$this->form_validation->set_rules('business-address-name', 'Address Name', 'required');
	// 	$this->form_validation->set_rules('house-bldg-no', 'House No./Building No.', 'required');
	// 	$this->form_validation->set_rules('bldg-name', 'Building Name', 'required');
	// 	$this->form_validation->set_rules('unit-no', 'Unit Number', 'required');
	// 	$this->form_validation->set_rules('street', 'Street', 'required');
	// 	$this->form_validation->set_rules('barangay', 'Barangay', 'required');
	// 	$this->form_validation->set_rules('subdivision', 'Subdivision', 'required');
	// 	$this->form_validation->set_rules('city-municipality', 'City/Municipality', 'required');
	// 	$this->form_validation->set_rules('province', 'Province', 'required');

	// 	if($this->form_validation->run() == false)
	// 	{
	// 		$this->session->set_flashdata('error', validation_errors());
	// 		redirect('profile/manage_business_address');
	// 	}
	// 	else
	// 	{
	// 		$fields = array(
	// 			'userId' => $user_id,
	// 			'addressName' => $this->input->post('business-address-name'),
	// 			'bldgName' => $this->input->post('bldg-name'),
	// 			'houseBldgNum' => $this->input->post('house-bldg-no'),
	// 			'unitNum' => $this->input->post('unit-no'),
	// 			'street' => $this->input->post('street'),
	// 			'barangay' => $this->input->post('barangay'),
	// 			'subdivision' => $this->input->post('subdivision'),
	// 			'cityMunicipality' => $this->input->post('city-municipality'),
	// 			'province' => $this->input->post('province'),
	// 			);
	// 		if($this->Business_Address_m->insert($fields))
	// 		{
	// 			redirect('profile/manage_business_address');
	// 		}
	// 		else
	// 		{
	// 			$this->session->set_flashdata('error', "Address Name already exists!");
	// 			redirect('profile/manage_business_address');
	// 		}

	// 	}
	// }
}//END OF CLASS
