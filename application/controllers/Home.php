<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function _init($title = null, $selected = null)
	{
		$data['title'] = $title;
		$data['selected'] = $selected;
		$this->load->view('templates/sb_landing_page/sb-landing-page-includes');
		$this->load->view('templates/sb_landing_page/sb-landing-page-navbar', $data);
	}

	public function index()
	{
		$this->_init("Home", "home");
		$this->load->view('home/index');
		$this->load->view('templates/sb_landing_page/sb-landing-page-footer');
	}

	public function guide()
	{
		$this->_init("Home", "howto");
		$this->load->view('home/guide');
		$this->load->view('templates/sb_landing_page/sb-landing-page-footer');
	}

}
