<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('Owner_m');
		$this->load->model('Role_m');
		$this->load->model('Reference_Number_m');
		$this->load->model('Application_m');
		$this->load->model('Lessor_m');
		$this->load->model('Business_Activity_m');
		$this->load->model('Issued_Application_m');
		$this->load->model('Business_m');
		$this->load->model('Approval_m');
		$this->load->model('Retirement_m');
		$this->load->model('Fee_m');
		$this->load->model('Business_Address_m');

		$this->load->library('form_validation');
		
	}

	public function isLogin()
	{
		if(!isset($this->session->userdata['userdata']))
		{
			// $this->session->set_flashdata('failed', 'You are not logged in!');
			redirect('home');
		}
	}

	public function _init_matrix($data = null)
	{
		if($this->encryption->decrypt($this->session->userdata['userdata']['role']) != "Master Admin")
		{
			redirect('dashboard');
		}
		else
		{
			// $query['status'] = 'On process';
			// $data['process'] = count($this->Application_m->get_all_bplo_applications($query));

			// $query['status'] = 'Completed';
			// $data['complete'] = count($this->Application_m->get_all_bplo_applications($query));

			// $query['status'] = 'For finalization';
			// $data['finalization'] = count($this->Application_m->get_all_bplo_applications($query));

			// $query['status'] = 'Active';
			// $data['issued'] = count($this->Application_m->get_all_bplo_applications($query));

			// $query['status'] = "For approval";
			// $data['retirements'] = count($this->Retirement_m->get_all($query));

			// $data['total'] = $data['process'];
			$this->load->view('templates/matrix/matrix_includes');
			$this->load->view('templates/matrix/matrix_navbar', $data);
		}
	}

	public function index()
	{
		$this->isLogin();
		$navdata['title'] = 'Settings';
		$navdata['active'] = 'settings';
		$this->_init_matrix($navdata);
		
		$this->load->view('system_settings/index');
	}

	public function line_of_businesses()
	{
		$this->isLogin();
		$navdata['title'] = 'Line of Businesses';
		$navdata['active'] = 'settings';
		$this->_init_matrix($navdata);

		$data['line_of_business'] = $this->Fee_m->get_all_line_of_businesses();
		$data['bowling_alley_fees'] = $this->Fee_m->get_bowling_alley_fee();

		$data['financial_institution_fees'] = $this->Fee_m->get_financial_institution_fees();
		$data['unapplied_common_enterprise'] = $this->Fee_m->get_unapplied_common_enterprises();
		$data['fee_common_enterprise'] = $this->Fee_m->get_common_enterprises_fees();
		$data['amusement_device'] = $this->Fee_m->get_all_amusement_devices();
		$data['golf_link_fees'] = $this->Fee_m->get_golf_link_fees();


		$this->load->view('system_settings/line-of-businesses', $data);
	}

	public function environmental_clearance()
	{
		$this->isLogin();
		$navdata['title'] = 'Environmental Clearance';
		$navdata['active'] = 'settings';
		$this->_init_matrix($navdata);

		$data['conditions'] = $this->Fee_m->get_all_environmental_conditions();
		// echo "<pre>";
		// print_r($data);
		// echo "<pre>";
		// exit();

		$this->load->view('system_settings/environmental-clearance', $data);
	}

	public function sanitary_permit()
	{
		$this->isLogin();
		$navdata['title'] = 'Sanitary Permit';
		$navdata['active'] = 'settings';
		$this->_init_matrix($navdata);

		$data['sanitary'] = $this->Fee_m->get_sanitary_fee();

		$this->load->view('system_settings/sanitary-permit', $data);
	}

	public function fixed_fees()
	{
		$this->isLogin();
		$navdata['title'] = 'Fixed Fees';
		$navdata['active'] = 'settings';
		$this->_init_matrix($navdata);

		$data['fixed_fees'] = $this->Fee_m->get_all_fixed_fees();

		$this->load->view('system_settings/fixed-fees', $data);
	}

	public function save_line_of_business()
	{
		$this->isLogin();

		$this->form_validation->set_rules('line-of-business-name','Line of Business Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('type','Type','required');
		$this->form_validation->set_rules('tax-rate','Tax Rate','required|numeric');
		$this->form_validation->set_rules('imposition-of-tax','Imposition of Tax','required');
		$this->form_validation->set_rules('garbage-service-fee','Garbage Service Fee','required|numeric');

		if($this->form_validation->run() == false)
		{
			// echo validation_errors();
			$this->session->set_flashdata('error', validation_errors());
			redirect('settings/line_of_businesses');
		}
		else
		{
			$line_of_business_field = array(
				'name' => $this->input->post('line-of-business-name'),
				'description' => $this->input->post('description'),
				'impositionOfTaxCategory' => $this->input->post('imposition-of-tax'),
				'type' => $this->input->post('type'),
				'taxRate' => $this->input->post('tax-rate'),
				'garbageServiceFee' => $this->input->post('garbage-service-fee'),
				);
			$this->Fee_m->insert_line_of_business($line_of_business_field);

			$this->session->set_flashdata('message','Line of Business inserted successfully.');
			redirect('settings/line_of_businesses');
		}
	}

	public function save_common_enterprise()
	{
		$this->isLogin();

		$this->form_validation->set_rules('line-of-business','Line of Business','required');
		$this->form_validation->set_rules('cottage-fee','Cottage Fee','required|numeric');
		$this->form_validation->set_rules('small-scale-fee','Small Scale Fee','required|numeric');
		$this->form_validation->set_rules('medium-scale-fee','Medium Scale Fee','required|numeric');
		$this->form_validation->set_rules('large-scale-fee','Large Scale Fee','required|numeric');

		if($this->form_validation->run() == false)
		{
			$this->session->set_rules('error',validation_errors());
			redirect('settings/line_of_businesses');
		}
		else
		{
			$common_enterprise_fields = array(
				'lineOfBusinessId' => $this->encryption->decrypt($this->input->post('line-of-business')),
				'cottageFee' => $this->input->post('cottage-fee'),
				'smallScaleFee' => $this->input->post('small-scale-fee'),
				'mediumScaleFee' => $this->input->post('medium-scale-fee'),
				'largeScaleFee' => $this->input->post('large-scale-fee'),
				);
			$this->Fee_m->insert_common_enterprise($common_enterprise_fields);

			$this->session->set_flashdata('message','Common Enterprise Fees inserted successfully.');
			redirect('settings/line_of_businesses');
		}
	}

	public function add_amusement_device()
	{
		$this->isLogin();

		$this->form_validation->set_rules('amusement-device-name', 'Amusement Device Name', 'required');
		$this->form_validation->set_rules('rate-per-unit', 'Rate Per Unit', 'required|numeric');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('settings/line_of_businesses');
		}
		else
		{
			$amusement_device_fields = array(
				'name' => $this->input->post('amusement-device-name'),
				'ratePerUnit' => $this->input->post('rate-per-unit'),
				);
			$this->Fee_m->insert_amusement_device($amusement_device_fields);

			$this->session->set_flashdata('message','Amusement Device inserted successfully.');
			redirect('settings/line_of_businesses');
		}
	}

	public function add_golf_link_fees()
	{
		$this->isLogin();

		$this->form_validation->set_rules('above','required|numeric');
		$this->form_validation->set_rules('below','required|numeric');
		$this->form_validation->set_rules('range-fee','required|numeric');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('settings/line_of_businesses');
		}
		else
		{
			$golf_link_fields = array(
				'above' => $this->input->post('above'),
				'below' => $this->input->post('below'),
				'range-fee' => $this->input->post('range-fee'),
				);
			$this->Fee_m->insert_golf_link($fields);

			$this->session->set_flashdata('message','Golf Link inserted successfully.');
			redirect('settings/line_of_businesses');
		}
	}

	public function update_bowling_alley_fee()
	{
		$this->isLogin();

		$this->form_validation->set_rules('automatic-lane-fee', 'Automatic Lane Fee', 'required|numeric');
		$this->form_validation->set_rules('non-automatic-lane-fee', 'Non-automatic Lane Fee', 'required|numeric');

		if($this->form_validation->run() == false)
		{
			// echo validation_errors();
			$this->session->set_flashdata('error', validation_errors());
			redirect('settings/line_of_businesses');
		}
		else
		{
			$bowling_alley_fields = array(
				'automaticLaneFee' => $this->input->post('automatic-lane-fee'),
				'nonAutomaticLaneFee' => $this->input->post('non-automatic-lane-fee'),
				);
			$this->Fee_m->update_bowling_alley($bowling_alley_fields);

			$this->session->set_flashdata('message','Golf Link updated successfully.');
			redirect('settings/line_of_businesses');
		}
	}

	public function add_financial_institution()
	{
		$this->isLogin();

		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('scale','Scale','required');

		if($this->form_validation->run() == false)
		{
			// echo validation_errors();
			$this->session->set_flashdata('error', validation_errors());
			redirect('settings/line_of_businesses');
		}
		else
		{
			$financial_institution_field = array(
				'description' => $this->input->post('description'),
				'scale' => $this->input->post('scale'),
				);
			$this->Fee_m->insert_financial_institution($financial_institution_field);

			$this->session->set_flashdata('message','Financial Institution inserted successfully');
			redirect('settings/line_of_businesses');
		}
	}

	public function add_environmental_fee_condition()
	{
		$this->isLogin();

		$this->form_validation->set_rules('capitalization-above','Capitalization Above','required|numeric');
		$this->form_validation->set_rules('capitalization-below','Capitalization Below','required|numeric');
		$this->form_validation->set_rules('range-fee','Range Fee','required|numeric');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('settings/line_of_businesses');
		}
		else
		{
			$environmental_condition_fields = array(
				'above' => $this->input->post('capitalization-above'),
				'below' => $this->input->post('capitalization-below'),
				'fee' => $this->input->post('range-fee'),
				);
			$this->Fee_m->insert_environmental_clearance($environmental_condition_fields);

			$this->session->set_flashdata('message','Environmental Fee Condition inserted successfully');
			redirect('settings/environmental_clearance');
		}
	}

	public function update_sanitary_fees()
	{
		$this->isLogin();

		$this->form_validation->set_rules('first-square-meters', 'First Square Meters', 'required|numeric');
		$this->form_validation->set_rules('fee', 'First Square Meters Fee', 'required|numeric');
		$this->form_validation->set_rules('succeeding-fee', 'Succeeding Fee', 'required|numeric');
		$this->form_validation->set_rules('health-card-fee', 'Health Card Fee', 'required|numeric');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('settings/sanitary_permit');
		}
		else
		{
			$sanitary_fields = array(
				'firstUnits' => $this->input->post('first-square-meters'),
				'firstFee' => $this->input->post('fee'),
				'succeedingFee' => $this->input->post('succeeding-fee'),
				'healthCardFee' => $this->input->post('health-card-fee'),
				);
			$this->Fee_m->update_sanitary_fees($sanitary_fields);

			$this->session->set_flashdata('message','Sanitary permit fees updated successfully');
			redirect('settings/sanitary_permit');
		}
	}

	public function add_fixed_fees()
	{
		$this->isLogin();

		$this->form_validation->set_rules('particular', 'Particular','required');
		$this->form_validation->set_rules('fixed-fee', 'Fee','required|numeric');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('settings/fixed_fees');
		}
		else
		{
			$fixed_fee_fields = array(
				'particular' => $this->input->post('particular'),
				'fee' => $this->input->post('fixed-fee'),
				);
			$this->Fee_m->insert_fixed_fees($fixed_fee_fields);

			$this->session->set_flashdata('message','Fixed fee successfully added');
			redirect('settings/fixed_fees');
		}
	}

	public function edit_line_of_business($id)
	{
		$this->isLogin();
		$navdata['title'] = 'Line of Businesses';
		$navdata['active'] = 'settings';
		$this->_init_matrix($navdata);
		$id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $id));

		$query['lineOfBusinessId'] = $id;
		$data['line_of_business'] = $this->Fee_m->get_all_line_of_businesses($query)[0];
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();
		$this->load->view('system_settings/edit-line-of-business', $data);
	}

	public function save_edit_line_of_business($id)
	{
		$id = $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='], $id));
		
		$this->isLogin();

		$this->form_validation->set_rules('line-of-business-name','Line of Business Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('type','Type','required');
		$this->form_validation->set_rules('tax-rate','Tax Rate','required|numeric');
		$this->form_validation->set_rules('imposition-of-tax','Imposition of Tax','required');
		$this->form_validation->set_rules('garbage-service-fee','Garbage Service Fee','required|numeric');

		if($this->form_validation->run() == false)
		{
			// echo validation_errors();
			$this->session->set_flashdata('message', "Failed updating line of business information");
			redirect('settings/line_of_businesses');
		}
		else
		{
			$line_of_business_field = array(
				'name' => $this->input->post('line-of-business-name'),
				'description' => $this->input->post('description'),
				'impositionOfTaxCategory' => $this->input->post('imposition-of-tax'),
				'type' => $this->input->post('type'),
				'taxRate' => $this->input->post('tax-rate'),
				'garbageServiceFee' => $this->input->post('garbage-service-fee'),
				);
			$this->Fee_m->update_line_of_business($id, $line_of_business_field);
			// $this->Fee_m->insert_line_of_business($line_of_business_field);

			$this->session->set_flashdata('message','Line of Business updated successfully.');
			redirect('settings/line_of_businesses');
		}
	}
	
}