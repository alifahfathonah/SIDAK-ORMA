<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
    }

    public function index()
    {
        $this->load->view('login/index');
    }

    public function login()
    {
        $uname =  $this->input->post('username');
        $pass =  $this->input->post('pass');
        $cekLogin = $this->usermodel->login($uname, $pass);
        if ($cekLogin) {
            foreach ($cekLogin as $row);
            $sessionArr = array(
                'level' => $row["level"],
                'user' => $row["username"],
                'nama' => $row['nama_lengkap'],
                'organisasi' => $row['organisasi_terikat']
            );
            $this->session->set_userdata($sessionArr);
            redirect('manage', 'refresh');
        } else {
            $this->session->unset_userdata('user');
            $this->session->unset_userdata('level');
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('organisasi');
            $this->session->set_flashdata('login', 'failed');
            redirect('auth', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('organisasi');
        redirect('welcome');
    }
}

/* End of file Auth.php */
