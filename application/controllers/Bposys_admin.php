<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bposys_admin extends CI_Controller {

	public function __construct()
	{
		//object classes are autoloaded from config/autoload.php
		parent::__construct();

		$this->load->model('User_m');
		$this->load->library('form_validation');
	}

	public function _init($data = null)
	{
		$this->load->view('templates/matrix/matrix_includes');
		$this->load->view('templates/matrix/matrix_navbar');
	}

	public function _init_matrix($data = null)
	{
		// var_dump($this->encryption->decrypt($this->session->userdata['userdata']['role']));
		// $role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$this->load->view('templates/matrix/matrix_includes');
		$this->load->view('templates/matrix/matrix_navbar', $data);
	}

	public function index()
	{
		// $user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		// $role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		// $this->_init_matrix();

		if(!isset($this->session->userdata['userdata']))
		{
			// $this->session->set_flashdata('failed', 'You are not logged in!');
			$this->load->view('admin/login');
		}
		else {
			$this->dashboard();
		}
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
			if($this->encryption->decrypt($this->session->userdata['userdata']['role']) != "Master Admin")
			{
				redirect('error/error403');
			}
		}
	}

	public function dashboard()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$data['title'] = "Admin Dashboard";
		$data['active'] = "Dashboard";
		$this->_init_matrix($data);
		$this->load->view('admin/index');
	}

	public function applications()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$nav_data['title'] = "Applications";
		$nav_data['active'] = "Applications";
		$this->_init_matrix($nav_data);

		$applications = $this->Application_m->get_all_bplo_applications();

		foreach ($applications as $key => $app) {
			$data['applications'][$key] = new BPLO_Application($app->referenceNum);
			$data['applications'][$key]->set_user(new User($this->encryption->decrypt($data['applications'][$key]->get_userId())));
		}
		// echo "<pre>";
		// print_r($data['applications'][0]->get_User()->get_firstName());
		// echo "</pre>";
		// exit();


		$this->load->view('admin/applications',$data);
	}

	public function Users()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$nav_data['title'] = "Users";
		$nav_data['active'] = "Users";
		$this->_init_matrix($nav_data);

		$users = $this->User_m->get_all_users();

		foreach ($users as $key => $user) {
			$data['users'][] = new User($user->userId);
		}
		// echo "<pre>";
		// print_r($data['users']);
		// echo "</pre>";
		// exit();


		$this->load->view('admin/users', $data);
	}

	public function add_user()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$data['title'] = "Users";
		$data['active'] = "Users";
		$this->_init_matrix($data);
		$this->load->view('admin/add_user');
		// echo script_tag('assets/js/jquery.min.js');
		// echo script_tag('assets/matrix/js/bootstrap-datepicker.js');
	}

	public function save_user()
	{
		$this->form_validation->set_rules('firstName','First Name','required');
		$this->form_validation->set_rules('lastName','Last Name','required');
		$this->form_validation->set_rules('hidden-gender','Gender','required');
		$this->form_validation->set_rules('contactNumber','Contact Number','required');
		$this->form_validation->set_rules('emailAddress','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('role','Staff Details','required');
		$this->form_validation->set_rules('birthdate','Birth Date','required');
		$this->form_validation->set_rules('civilStatus','Civil Status','required');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error',validation_errors());
			redirect('bposys_admin/add_user');
		}
		else
		{
			$options = [
			'cost' => 11,
			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];

			$user_field = array(
				'role' => $this->input->post('role'), 	
				'firstName' => $this->input->post('firstName'), 	
				'lastName' => $this->input->post('lastName'), 	
				'middleName' => $this->input->post('middleName'), 	
				'suffix' => $this->input->post('suffix'), 	
				'gender' => $this->input->post('hidden-gender'), 	
				'email' => $this->input->post('emailAddress'), 	
				'contactNum' => $this->input->post('contactNumber'), 	
				'civilStatus' => $this->input->post('civilStatus'), 	
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options),
				'birthdate' => $this->input->post('birthdate'),
				);
			$user_id = $this->User_m->register_user($user_field);

			$employee_field = array(
				'userId' => $user_id,
				'permissionLevel' => $this->input->post('permissionLevel'),
				);
			$this->User_m->add_employee($employee_field);

			$this->session->set_flashdata('message','User successfully added!');
			redirect('bposys_admin/add_user');
		}
	}

	public function edit_user()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$data['title'] = "Users";
		$data['active'] = "Users";
		$this->_init_matrix($data);
		$this->load->view('admin/edit_user');
	}

	public function delete_user()
	{

	}

	public function view_user()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$data['title'] = "User";
		$data['active'] = "User";
		$this->_init_matrix($data);
		$this->load->view('admin/view_user');
	}

	public function logs()
	{
		$this->isLogin();
		$user_id = $this->encryption->decrypt($this->session->userdata['userdata']['userId']);
		$role = $this->encryption->decrypt($this->session->userdata['userdata']['role']);
		$data['title'] = "Logs";
		$data['active'] = "Logs";
		$this->_init_matrix($data);
		$this->load->view('admin/logs');
	}


}//END OF CLASS,
