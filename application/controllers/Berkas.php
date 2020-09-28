<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('managementmodel');
    }

    public function index()
    {
        redirect('manage/berkas');
    }

    public function addData()
    {
        $filename = time() . '-' . $_FILES['lampiran']['name'];
        $file = preg_replace('/\W(?![^.]*$)/', '_', $filename);
        $config['file_name'] = $file;
        $config['upload_path'] = './uploads/berkas/';
        $config['allowed_types'] = 'pdf|docx|doc';
        $config['max_size'] = 20000;

        $this->load->library('upload', $config);
        $organisasi = $this->session->userdata('organisasi');
        $deskripsi =  $this->input->post('deskripsi');
        $jenis =  $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal');

        if (!$this->upload->do_upload('lampiran')) {
            $this->session->set_flashdata('error', 'Cek kembali berkas anda!');
            redirect('manage/berkas', 'refresh');
        } else {
            $newData = array(
                'id_organisasi' => $organisasi,
                'id_jenis' => $jenis,
                'nama_berkas' => $deskripsi,
                'tgl_dibuat' => $tanggal,
                'file' => $file
            );
            $this->managementmodel->addData($newData);
            redirect('manage/berkas');
        }
    }

    public function editData()
    {
        $filename = time() . '-' . $_FILES['lampiran']['name'];
        $file = preg_replace('/\W(?![^.]*$)/', '_', $filename);
        $config['file_name'] = $file;
        $config['upload_path'] = './uploads/berkas/';
        $config['allowed_types'] = 'pdf|docx|doc';
        $config['max_size'] = 20000;

        $this->load->library('upload', $config);
        $id = $this->input->post('id');
        $organisasi = $this->session->userdata('organisasi');
        $deskripsi =  $this->input->post('deskripsi');
        $jenis =  $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal');

        if (!$this->upload->do_upload('lampiran')) {
            if (empty($_FILES['lampiran']['name'])) {
                $newData = array(
                    'id_organisasi' => $organisasi,
                    'id_jenis' => $jenis,
                    'nama_berkas' => $deskripsi,
                    'tgl_dibuat' => $tanggal,
                );
                $this->managementmodel->editData($newData, $id, $organisasi);
                redirect('manage/berkas');
            } else {
                $this->session->set_flashdata('error', 'Berkas baru gagal di update');
                redirect('manage/berkas', 'refresh');
            }
        } else {
            $newData = array(
                'id_organisasi' => $organisasi,
                'id_jenis' => $jenis,
                'nama_berkas' => $deskripsi,
                'tgl_dibuat' => $tanggal,
                'file' => $file
            );
            $this->managementmodel->editData($newData, $id, $organisasi);
            redirect('manage/berkas');
        }
    }

    public function deleteData()
    {
        $id = $this->input->post('id');
        $this->managementmodel->deleteData($id);
        redirect('manage/berkas');
    }
}

/* End of file Berkas.php */
