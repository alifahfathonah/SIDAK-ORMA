<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('organisasimodel');
    }
    public function index()
    {
        $data['title'] = "Homepage";
        $data['organisasi'] = $this->organisasimodel->loadData();
        $this->load->view('template_landing/header');
        $this->load->view('home/organisasi', $data);
        $this->load->view('template_landing/footer');
    }
    public function key($id)
    {
        $data['organisasi'] = $this->organisasimodel->loadDataId($id);
        $this->load->view('template_landing/header');
        $this->load->view('organisasi/home', $data);
        $this->load->view('template_landing/footer');
    }
}

/* End of file Organisasi.php */
