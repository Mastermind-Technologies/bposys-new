<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{

	}

  public function error404()
  {
    $data['type'] = "404";
    $this->load->view('home/error', $data);
  }

  public function error403()
  {
    $data['type'] = "403";
    $this->load->view('home/error', $data);
  }

	public function error403b()
	{
		$data['type'] = "403b";
		$this->load->view('home/error', $data);
	}
}
