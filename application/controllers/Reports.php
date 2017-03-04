<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{
		//object classes are autoloaded from config/autoload.php
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
		$this->load->model('Notification_m');
		$this->load->model('Retirement_m');
		$this->load->library('form_validation');

		$this->load->model('Business_Address_m');
	}

	public function isLogin()
	{
		if(!isset($this->session->userdata['userdata']))
		{
			// $this->session->set_flashdata('failed', 'You are not logged in!');
			redirect('error/error403b');
		}
		else
		{
			if($this->encryption->decrypt($this->session->userdata['userdata']['role']) == "Applicant")
			{
				redirect('error/error403');
			}
		}
	}

	public function _init_matrix($data = null)
	{
		if($this->encryption->decrypt($this->session->userdata['userdata']['role']) == "Applicant")
		{
			redirect('dashboard');
		}
		else
		{
			$query['status'] = 'On process';
			$data['process'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = 'Completed';
			$data['complete'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = 'BPLO Interview and Assessment of Fees';
			$data['incoming'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = 'Active';
			$data['issued'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = "For approval";
			$data['retirements'] = count($this->Retirement_m->get_all($query));

			$data['total'] = $data['incoming'];
			$this->load->view('templates/matrix/matrix_includes');
			$this->load->view('templates/matrix/matrix_navbar', $data);
		}
	}

	public function index()
	{
		$navdata['title'] = 'View Reports';
		$navdata['active'] = 'Reports';
		$navdata['notifications'] = User::get_notifications();
		$navdata['completed'] = User::get_complete_notifications();
		$this->_init_matrix($navdata);
		$this->isLogin();
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		// var_dump($role);
		// exit();

		$query['dept'] = $role;
		if($role == "BPLO")
		{
			//BY YEAR
			$query['YEAR(createdAt)'] = date('Y');
			
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

		//PEITY CHARTS / SUMMARY
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

			$data['issued'] = $new + $renew;

			unset($query);
			$query['status'] = 'Expired';
			$data['expired'] = count($this->Application_m->get_all_bplo_applications($query));
		//total number of businesses (active + expired)
			$data['businesses'] = (int)$data['businesses'] + (int)$data['expired'];

			$query['status'] = 'Cancelled';
			$data['cancelled'] = count($this->Application_m->get_all_bplo_applications($query));

			$query['status'] = 'Closed';
			$data['closed'] = count($this->Application_m->get_all_bplo_applications($query));


		//BY GENDER
			unset($query);
			$data['male'] = $this->Owner_m->count_male_owners();
			$data['female'] = $this->Owner_m->count_female_owners();
			$business = $this->Owner_m->get_all_applied_businesses();

			$data['total_male'] = 0;
			$data['total_female'] = 0;
			foreach ($business as $key => $b) {
				$data['total_male'] += $b->maleEmployees;
				$data['total_female'] += $b->femaleEmployees;
			}


		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();


		//BY BARANGAY
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

		//RANGE
			for ($i=2012; $i <= date('Y') ; $i++) {

				$data['new'][$i] = new stdClass();
				$data['new'][$i]->year = $i;

				$data['renew'][$i] = new stdClass();
				$data['renew'][$i]->year = $i;

				$data['expected'][$i] = new stdClass();
				$data['expected'][$i]->year = $i;

				$query['dept'] = "BPLO";
				$query['type'] = "New";

				$query['YEAR(createdAt)'] = $i;
				$data['new'][$i]->count = count($this->Issued_Application_m->get_all($query));

				$query['type'] = "Renew";
				$data['renew'][$i]->count = count($this->Issued_Application_m->get_all($query));

				$query['YEAR(createdAt)'] = $i-1;
				$query['type'] = "New";
				$data['expected'][$i]->count = count($this->Issued_Application_m->get_all($query));
				$query['type'] = "Renew";
				$data['expected'][$i]->count = $data['expected'][$i]->count + count($this->Issued_Application_m->get_all($query));
			}
			$this->load->view('dashboard/bplo/reports',$data);
		}
		else if($role == "BFP")
		{
			$query['YEAR(createdAt)'] = date('Y');
			
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
			$this->load->view('dashboard/bfp/reports',$data);
		}
		else if($role == "Zoning")
		{
			$query['YEAR(createdAt)'] = date('Y');
			
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

			$organization_types = $this->Issued_Application_m->get_issued_organization_type($role);
			$data['single'] = 0;
			$data['partnership'] = 0;
			$data['corporation'] = 0;
			$data['cooperative'] = 0;
			foreach ($organization_types as $key => $org) {
				switch($org->organizationType)
				{
					case 'Single':
					$data['single']++;
					break;

					case 'Partnership':
					$data['partnership']++;
					break;

					case 'Corporation':
					$data['corporation']++;
					break;

					case 'Cooperative':
					$data['cooperative']++;
					break;
				}

			}
			// echo "<pre>";
			// print_r($organization_types);
			// echo "</pre>";
			// exit();

			$this->load->view('dashboard/zoning/reports',$data);
		}
		else if($role == "CHO")
		{
			$query['YEAR(createdAt)'] = date('Y');
			
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
			unset($query);
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$applications = $this->Issued_Application_m->get_all($query);

			foreach ($applications as $key => $a) {
				$application[] = new Sanitary_Application($a->referenceNum);
			}

			$data['no'] = 0;
			$data['yes'] = 0;
			$data['employees'] = 0;
			foreach ($application as $key => $app) {
				$data['employees'] += $app->get_maleEmployees() + $app->get_femaleEmployees();
				switch ($app->get_annualEmployeePhysicalExam()) {
					case 1:
					$data['yes']++;
					break;
					
					case 0:
					$data['no']++;
					break;
				}
			}

			$this->load->view('dashboard/cho/reports',$data);
		}
		else if($role == "Engineering")
		{
			$query['YEAR(createdAt)'] = date('Y');
			
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
			$this->load->view('dashboard/engineering/reports', $data);
		}
		else if($role == "CENRO")
		{
			$query['YEAR(createdAt)'] = date('Y');
			
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
			unset($query);
			$query['YEAR(createdAt)'] = date('Y');
			$query['dept'] = $role;
			$applications = $this->Issued_Application_m->get_all($query);

			foreach ($applications as $key => $a) {
				$application[] = new CENRO_Application($a->referenceNum);
			}

			// 1with CNC
			// 1with LLDA
			// 1with Discharge Permit
			// 1with Permit to Operate
			// 1with Pending Case with LLDA
			$data['cnc'] = 0;
			$data['llda'] = 0;
			$data['discharge'] = 0;
			$data['apsci'] = 0;
			$data['pending'] = 0;
			$data['sanitary_landfill'] = 0;
			$data['controlled_dumpsite'] = 0;
			$data['recycling'] = 0;
			$data['reduction'] = 0;
			$data['reuse'] = 0;
			$data['drainage'] = 0;
			$data['sewerage'] = 0;
			$data['deep_well'] = 0;
			$data['water_utility'] = 0;
			$data['surface_water'] = 0;
			foreach ($application as $key => $app) {
				if($app->get_cnc() != "NA")
					$data['cnc']++;
				if($app->get_LLDAClearance() != "NA")
					$data['llda']++;
				if($app->get_dischargePermit() != "NA")
					$data['discharge']++;
				if($app->get_apsci() != "NA")
					$data['apsci']++;
				if($app->get_pendingCaseWithLLDA() != "NA")
					$data['pending']++;

				//garbage disposal method
				if($app->get_garbageDisposalMethod() == "Sanitary Landfill")
					$data['sanitary_landfill']++;
				else if($app->get_garbageDisposalMethod() == "Controlled Dumpsite")
					$data['controlled_dumpsite']++;

				//waste minimization
				if(in_array('Recycling', $app->get_wasteMinimizationMethod()))
					$data['recycling']++;
				else if(in_array('Reduction', $app->get_wasteMinimizationMethod()))
					$data['reduction']++;
				else if (in_array('Reuse', $app->get_wasteMinimizationMethod()))
					$data['reuse']++;

				//drainage/sewerage system
				if($app->get_drainageSystem() == 1)
					$data['drainage']++;
				if($app->get_sewerageSystem() == 1)
					$data['sewerage']++;

				switch($app->get_waterSupply()){
					case "Deep Well":
					$data['deep_well']++;
					break;
					case "Water Utility":
					$data['water_utility']++;
					break;
					case "Surface Water":
					$data['surface_water']++;
					break;
				}

			}
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// exit();

			$this->load->view('dashboard/cenro/reports', $data);
		}



		
	}

	public function general_reports()
	{
		$navdata['title'] = 'General Reports';
		$navdata['active'] = 'Reports';
		$navdata['notifications'] = User::get_notifications();
		$navdata['completed'] = User::get_complete_notifications();
		$this->_init_matrix($navdata);
		$this->isLogin();

		//BY YEAR
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

		//PEITY CHARTS / SUMMARY
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

		$data['issued'] = $new + $renew;

		unset($query);
		$query['status'] = 'Expired';
		$data['expired'] = count($this->Application_m->get_all_bplo_applications($query));
		//total number of businesses (active + expired)
		$data['businesses'] = (int)$data['businesses'] + (int)$data['expired'];

		$query['status'] = 'Cancelled';
		$data['cancelled'] = count($this->Application_m->get_all_bplo_applications($query));

		$query['status'] = 'Closed';
		$data['closed'] = count($this->Application_m->get_all_bplo_applications($query));


		//BY GENDER
		unset($query);
		$data['male'] = $this->Owner_m->count_male_owners();
		$data['female'] = $this->Owner_m->count_female_owners();
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();


		//BY BARANGAY
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

		//RANGE
		for ($i=2012; $i <= date('Y') ; $i++) {

			$data['new'][$i] = new stdClass();
			$data['new'][$i]->year = $i;

			$data['renew'][$i] = new stdClass();
			$data['renew'][$i]->year = $i;

			$data['expected'][$i] = new stdClass();
			$data['expected'][$i]->year = $i;

			$query['dept'] = "BPLO";
			$query['type'] = "New";

			$query['YEAR(createdAt)'] = $i;
			$data['new'][$i]->count = count($this->Issued_Application_m->get_all($query));

			$query['type'] = "Renew";
			$data['renew'][$i]->count = count($this->Issued_Application_m->get_all($query));

			$query['YEAR(createdAt)'] = $i-1;
			$query['type'] = "New";
			$data['expected'][$i]->count = count($this->Issued_Application_m->get_all($query));
			$query['type'] = "Renew";
			$data['expected'][$i]->count = $data['expected'][$i]->count + count($this->Issued_Application_m->get_all($query));
		}



		$this->load->view('dashboard/bplo/reports',$data);
	}


	public function demographic_reports()
	{
		$navdata['title'] = 'Demographic Reports';
		$navdata['active'] = 'Reports';
		$navdata['notifications'] = User::get_notifications();
		$navdata['completed'] = User::get_complete_notifications();
		$this->_init_matrix($navdata);
		$this->isLogin();

		//PEITY CHARTS / SUMMARY
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

		$data['issued'] = $new + $renew;

		unset($query);
		$query['status'] = 'Expired';
		$data['expired'] = count($this->Application_m->get_all_bplo_applications($query));
		//total number of businesses (active + expired)
		$data['businesses'] = (int)$data['businesses'] + (int)$data['expired'];

		$query['status'] = 'Cancelled';
		$data['cancelled'] = count($this->Application_m->get_all_bplo_applications($query));

		$query['status'] = 'Closed';
		$data['closed'] = count($this->Application_m->get_all_bplo_applications($query));


		//BY GENDER
		unset($query);
		$data['male'] = $this->Owner_m->count_male_owners();
		$data['female'] = $this->Owner_m->count_female_owners();
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();


		//BY BARANGAY
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

		//RANGE
		for ($i=2012; $i <= date('Y') ; $i++) {

			$data['new'][$i] = new stdClass();
			$data['new'][$i]->year = $i;

			$data['renew'][$i] = new stdClass();
			$data['renew'][$i]->year = $i;

			$data['expected'][$i] = new stdClass();
			$data['expected'][$i]->year = $i;

			$query['dept'] = "BPLO";
			$query['type'] = "New";

			$query['YEAR(createdAt)'] = $i;
			$data['new'][$i]->count = count($this->Issued_Application_m->get_all($query));

			$query['type'] = "Renew";
			$data['renew'][$i]->count = count($this->Issued_Application_m->get_all($query));

			$query['YEAR(createdAt)'] = $i-1;
			$query['type'] = "New";
			$data['expected'][$i]->count = count($this->Issued_Application_m->get_all($query));
			$query['type'] = "Renew";
			$data['expected'][$i]->count = $data['expected'][$i]->count + count($this->Issued_Application_m->get_all($query));
		}

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();


		$this->load->view('dashboard/bplo/demographics',$data);
	}



	public function masterlist()
	{
		$navdata['title'] = 'Master List';
		$navdata['active'] = 'Reports';
		$navdata['notifications'] = User::get_notifications();
		$navdata['completed'] = User::get_complete_notifications();
		$this->_init_matrix($navdata);
		$this->isLogin();

		$this->load->view('dashboard/bplo/masterlist');
	}

	public function report_year()
	{
		$this->isLogin();
		$year = $this->input->post('year');
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);

		$query['YEAR(createdAt)'] = $year;
		$query['dept'] = $role;
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
		$data['year'] = $year;
		switch ($role) {
			case 'BPLO':
			$data['title'] = "Issued Business Permits Year ";
			break;
			
			case 'BFP':
			$data['title'] = "Issued Fire Safety Inspection Certificate Year ";
			break;

			case 'Zoning':
			$data['title'] = "Issued Zoning Clearance Year";
			break;

			case 'CHO':
			$data['title'] = "Issued Sanitary Permit Year";
			break;

			case 'Engineering':
			$data['title'] = "Issued Engineering Clearance Year";
			break;

			case 'CENRO':
			$data['title'] = "Issued Environmental Clearance Year";
			break;

		}
		
		$this->load->view('dashboard/bplo/ajax-report',$data);
		echo script_tag('assets/js/jquery.min.js');
		echo script_tag('assets/js/jquery.canvasjs.min.js');
	}
}//END OF CLASS
