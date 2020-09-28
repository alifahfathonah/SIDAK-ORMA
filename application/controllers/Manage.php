<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('managementmodel');

        if (!$this->session->userdata('user')) {
            redirect('welcome', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('template_login/header');
        $this->load->view('organisasi/dashboard');
        $this->load->view('template_login/footer');
    }

    public function keuangan($keywords = "dashboard")
    {
        $organisasi = $this->session->userdata('organisasi');
        $data['organisasi'] = $this->managementmodel->loadOrganizationName($organisasi);
        $data['keuangan'] = $this->managementmodel->loadFinanceDashboard($organisasi);
        $data['pemasukan'] = $this->managementmodel->loadIncomeDashboard($organisasi);
        $data['pengeluaran'] = $this->managementmodel->loadOutcomeDashbaord($organisasi);
        $data['allPemasukan'] = $this->managementmodel->loadIncome($organisasi);
        $data['allPengeluaran'] = $this->managementmodel->loadOutcome($organisasi);
        $data['logPemasukan'] = $this->managementmodel->loadLogIncome($organisasi);
        $data['logPengeluaran'] = $this->managementmodel->loadLogOutcome($organisasi);
        if ($keywords == "dashboard") {
            $this->load->view('template_login/header');
            $this->load->view('organisasi/finance', $data);
            $this->load->view('template_login/footer_blank');
        } else if ($keywords == "pemasukan") {
            if ($this->input->get('search')) {
                $search = $this->input->get('search');
                $data['allPemasukan'] = $this->managementmodel->loadSearchIncome($organisasi, $search);
                $this->session->set_flashdata('search', $search);
            }
            $this->load->view('template_login/header');
            $this->load->view('finance/finance_in', $data);
            $this->load->view('finance/form_in', $data);
            $this->load->view('template_login/footer_blank');
        } else if ($keywords == "pengeluaran") {
            if ($this->input->get('search')) {
                $search = $this->input->get('search');
                $data['allPengeluaran'] = $this->managementmodel->loadSearchOutcome($organisasi, $search);
                $this->session->set_flashdata('search', $search);
            }
            $this->load->view('template_login/header');
            $this->load->view('finance/finance_out', $data);
            $this->load->view('finance/form_out', $data);
            $this->load->view('template_login/footer_blank');
        } else {
            redirect('manage/keuangan');
        }
    }

    public function berkas()
    {
        $organisasi = $this->session->userdata('organisasi');
        $data['organisasi'] = $this->managementmodel->loadOrganizationName($organisasi);
        $data['jenis'] = $this->managementmodel->loadDataCategory();
        $data['allBerkas'] = $this->managementmodel->loadData($organisasi);

        if ($this->input->get('search')) {
            $search = $this->input->get('search');
            $data['allBerkas'] = $this->managementmodel->loadSearchData($organisasi, $search);
            $this->session->set_flashdata('search', $search);
        }
        $this->load->view('template_login/header');
        $this->load->view('berkas/berkas', $data);
        $this->load->view('berkas/berkas_in', $data);
        $this->load->view('template_login/footer_blank');
    }

    public function jadwal()
    {
        $organisasi = $this->session->userdata('organisasi');
        $data['organisasi'] = $this->managementmodel->loadOrganizationName($organisasi);
        $data['jadwal'] = $this->managementmodel->listSchedule();

        if ($this->input->get('nama')) {
            $search = $this->input->get('nama');
            $data['jadwal'] = $this->managementmodel->searchNamaSchedule($search);
            $this->session->set_flashdata('search', $search);
            $this->session->set_flashdata('nama', $search);
        }
        if ($this->input->get('tanggal')) {
            $search = $this->input->get('tanggal');
            $data['jadwal'] = $this->managementmodel->searchDateSchedule($search);
            $this->session->set_flashdata('tanggal', $search);
            $this->session->set_flashdata('search', $search);
        }

        if ($this->input->get('tanggal') && $this->input->get('nama')) {
            $tanggal = $this->input->get('tanggal');
            $nama = $this->input->get('nama');
            $data['jadwal'] = $this->managementmodel->searchSchedule($nama, $tanggal);
            $this->session->set_flashdata('tanggal', $tanggal);
            $this->session->set_flashdata('nama', $nama);
            $this->session->set_flashdata('search', $nama);
        }

        $this->load->view('template_login/header');
        $this->load->view('jadwal/jadwal', $data);
        $this->load->view('jadwal/jadwal_in');
        $this->load->view('template_login/footer_blank');
    }

    public function clear($keywords)
    {
        if ($keywords == "income") {
            redirect("manage/keuangan/pemasukan");
        } else if ($keywords == "outcome") {
            redirect("manage/keuangan/pengeluaran");
        } else if ($keywords == "berkas") {
            redirect("manage/berkas");
        } else if ($keywords == "jadwal") {
            redirect("manage/jadwal");
        } else {
            show_404();
        }
    }
}

/* End of file Manage.php */
