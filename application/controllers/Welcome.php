<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user')) {
			redirect('manage', 'refresh');
		}
	}

	public function index()
	{
		$this->load->view('template_landing/header');
		$this->load->view('home/index');
		$this->load->view('template_landing/footer');
	}

	public function aboutus()
	{
		$this->load->view('template_landing/header');
		$this->load->view('home/aboutus');
		$this->load->view('template_landing/footer');
	}
}
