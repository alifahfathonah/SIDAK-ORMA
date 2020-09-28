<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('managementmodel');
    }

    public function index()
    {
        redirect('manage/jadwal');
    }

    public function addData()
    {
        $organisasi = $this->session->userdata('organisasi');
        $nama = $this->input->post('nama');
        $tanggal = $this->input->post('tanggal');
        $lokasi = $this->input->post('lokasi');

        $newJadwal = array(
            'id_org'  => $organisasi,
            'kegiatan' => $nama,
            'date' => $tanggal,
            'tempat' => $lokasi
        );

        $this->managementmodel->addSchedule($newJadwal);
        redirect('manage/jadwal');
    }

    public function editData()
    {
        $id = $this->input->post('id');
        $organisasi = $this->session->userdata('organisasi');
        $nama = $this->input->post('nama');
        $tanggal = $this->input->post('tanggal');
        $lokasi = $this->input->post('lokasi');

        $newJadwal = array(
            'id_org'  => $organisasi,
            'kegiatan' => $nama,
            'date' => $tanggal,
            'tempat' => $lokasi
        );

        $this->managementmodel->editSchedule($id, $newJadwal);
        redirect('manage/jadwal');
    }

    public function deleteData()
    {
        $id = $this->input->post('id');
        $this->managementmodel->deleteSchedule($id);
        redirect('manage/jadwal');
    }
}

/* End of file Jadwal.php */
