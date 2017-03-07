<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('User_m');
    $this->load->model('Verification_m');

    //object
    $this->load->library('User');
  }

  public function _init($title = null, $selected = null)
  {
    $data['title'] = $title;
    $data['selected'] = $selected;
    $this->load->view('templates/sb_landing_page/sb-landing-page-includes');
    $this->load->view('templates/sb_landing_page/sb-landing-page-navbar', $data);
  }

  public function _initDashboard()
  {
    $this->load->view('templates/sb_admin2/sb_admin2_includes');
    $this->load->view('templates/sb_admin2/sb_admin2_navbar');
  }

  public function login()
  {
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() == FALSE)
    {
      $data['selected'] = "home";
      $data['title'] = "Home";
      $this->session->set_flashdata('failed', 'Invalid username or password');
      redirect('home');
    }
    else
    {
      $fields = array(
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password')
        );
      $check = $this->User_m->process_login($fields);

      // $fields['userId'] = $this->encryption->encrypt($check[0]->userId);
      $user_id = $check[0]->userId;

      if($check)
      {
        if($check[0]->role == 3)
        {
          $query = array(
            'userId' => $user_id,
            'status' => 1,
            );
          $check_verify = $this->Verification_m->check_verification($query);

          if($check_verify)
          {
            $query = array(
              'userId' => $user_id
              );
            $data['user'] = $this->User_m->get_all_users($query);

            $data['role'] = $this->User_m->check_user_role($data['user'][0]->role);

            $session_data = array(
              'userId' => $this->encryption->encrypt($data['user'][0]->userId),
              'firstName' => $data['user'][0]->firstName,
              'lastName' => $data['user'][0]->lastName,
              'middleName' => $data['user'][0]->middleName,
              'email' => $this->encryption->encrypt($data['user'][0]->email),
              'role' => $this->encryption->encrypt($data['role'][0]->name)
              );
          // Add user data in session
            $this->session->set_userdata('userdata', $session_data);

            redirect("dashboard");
          }
          else
          {
            $this->session->set_flashdata('failed','Please verify your account first.');
            redirect('home');
          }
        }
        else if($check[0]->role == 1)
        {
          $query = array(
            'userId' => $user_id
            );
          $data['user'] = $this->User_m->get_all_users($query);

          $data['role'] = $this->User_m->check_user_role($data['user'][0]->role);
          
          $session_data = array(
            'userId' => $this->encryption->encrypt($data['user'][0]->userId),
            'firstName' => $data['user'][0]->firstName,
            'lastName' => $data['user'][0]->lastName,
            'middleName' => $data['user'][0]->middleName,
            'email' => $this->encryption->encrypt($data['user'][0]->email),
            'role' => $this->encryption->encrypt($data['role'][0]->name),
            );
          // Add user data in session
          $this->session->set_userdata('userdata', $session_data);
          redirect("bposys_admin/dashboard");
        }
        else
        {
          $query = array(
            'userId' => $user_id
            );
          $data['user'] = $this->User_m->get_all_users($query);

          $data['role'] = $this->User_m->check_user_role($data['user'][0]->role);

          $permission_level = $this->User_m->check_permission_level($user_id);

          if(!$permission_level)
          {
            $this->session->set_flashdata('failed','Invalid username or password');
            redirect('home');
          }
          else
          {
           $session_data = array(
            'userId' => $this->encryption->encrypt($data['user'][0]->userId),
            'firstName' => $data['user'][0]->firstName,
            'lastName' => $data['user'][0]->lastName,
            'middleName' => $data['user'][0]->middleName,
            'email' => $this->encryption->encrypt($data['user'][0]->email),
            'role' => $this->encryption->encrypt($data['role'][0]->name),
            'permissionLevel' => $permission_level,
            );
          // Add user data in session
           $this->session->set_userdata('userdata', $session_data);
           // echo "<pre>";
           // print_r($this->session->userdata['userdata']);
           // echo "</pre>";
           // exit();
           redirect("dashboard");

          //  if($check[0]->role == 1)
          //  {
          //   redirect("bposys_admin/dashboard");
          // }
          // else {
          //   redirect("dashboard");
          // }
         }
       }
     }
     else
     {
      $this->session->set_flashdata('failed','Invalid username or password');
      redirect('home');
    }






  }

}

public function register()
{
  $this->_init("Register", "register");
  $data['selected'] = "register";
  $data['title'] = "Register";
    //$this->load->view('template/navbar', $data);

  $this->load->view('register/index');
  $this->load->view('templates/sb_landing_page/sb-landing-page-footer');
}

public function register_user()
{
  $this->form_validation->set_rules('fname', 'First Name', 'required');
  $this->form_validation->set_rules('lname', 'Last Name', 'required');
  $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required'); //'required|valid_email|is_unique[users.email]'
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('civil-status', 'Civil Status', 'required');
    $this->form_validation->set_rules('birth-date', 'Birth Date', 'required');
    $this->form_validation->set_rules('contact-number', 'Contact Number', 'required');
    $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[password]');

    if($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('error', validation_errors());
      redirect('register');
    }
    else
    {
      $raw_pw = $this->input->post('password');

      $options = [
      'cost' => 11,
      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
      ];

      $fields = array(
        'firstName' => $this->input->post('fname'),
        'lastName' => $this->input->post('lname'),
        'middleName' => ($this->input->post('mname')!=null ? $this->input->post('mname') : '.'),
        'suffix' => ($this->input->post('suffix')!=null ? $this->input->post('suffix') : ''),
        'gender' => $this->input->post('gender'),
        'email' => $this->input->post('email'),
        'civilStatus' => $this->input->post('civil-status'),
        'contactNum' => $this->input->post('contact-number'),
        'role' => '3',
        'password' => password_hash($raw_pw, PASSWORD_BCRYPT, $options),
        'birthDate' => $this->input->post('birth-date')
        );

      $user_id = $this->User_m->register_user($fields);
      if($user_id)
      {
        $code_param = array(
          'firstName' => $this->input->post('fname'),
          'lastName' => $this->input->post('lname'),
          'userId' => $user_id,
          );
        $code = $this->encryption->encrypt($this->Verification_m->generate_verification_code($code_param));
        $user = new User($user_id);

        $mail_param['subject'] = "Verify Email Address";
        $mail_param['body']= 'To finish setting up your account, we just need to make sure email address is yours. Please click the verification link below to proceed.<br><br>
        <a href="'.base_url('auth/verify?e='.$code).'">'.base_url('auth/verify?e='.$code).'</a><br><br>If you didn\'t make this account, <a href="#">click here</a> to cancel.<br><br>Thanks,<br>BPLO';
        $user->send_mail($mail_param);
        $this->session->set_flashdata('success','Registration Successful! We now need to verify your email address. We\'ve sent an email to '.$this->input->post('email').' to verify your address. Please click the confirmation link in the email to activate your account.');
        redirect('home');
      }
      else
      {
        $this->session->set_flashdata('error','Email is already used.');
        redirect('register');
      }
    }
  }

  public function logout()
  {
    $sess_array = array(
      'userId' => '',
      'firstName' => '',
      'lastName' => '',
      'middleName' => '',
      'email' => ''
      );

    $this->session->unset_userdata('userdata', $sess_array);
    //$data['message_display'] = 'Successfully Logout';
    redirect('home');
  }

  public function verify()
  {
    $code = $this->encryption->decrypt($this->input->get('e'));
    $query['code'] = $code;
    $verified = $this->Verification_m->verify($query);
    if($verified)
    {
      unset($query);
      $query = array(
        'userId' => $verified,
        );
      $data['user'] = $this->User_m->get_all_users($query);

      $data['role'] = $this->User_m->check_user_role($data['user'][0]->role);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
      $session_data = array(
        'userId' => $this->encryption->encrypt($data['user'][0]->userId),
        'firstName' => $data['user'][0]->firstName,
        'lastName' => $data['user'][0]->lastName,
        'middleName' => $data['user'][0]->middleName,
        'email' => $this->encryption->encrypt($data['user'][0]->email),
        'role' => $this->encryption->encrypt($data['role'][0]->name)
        );
          // Add user data in session
      $this->session->set_userdata('userdata', $session_data);

      redirect("dashboard");
    }
    else
    {
      $this->session->set_flashdata('message', 'Verification failed.');
      redirect('home');
    }
  }
}
