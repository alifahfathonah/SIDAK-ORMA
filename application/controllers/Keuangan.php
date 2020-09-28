<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('managementmodel');
    }
    public function income()
    {
        $organisasi = $this->session->userdata('organisasi');
        $deskripsi =  $this->input->post('deskripsi');
        $tglMasuk =  $this->input->post('tanggalMasuk');
        $ttlMasuk = $this->input->post('totalMasuk');
        $keterangan = $this->input->post('keterangan');
        $income = array(
            'id_organisasi' => $organisasi,
            'deskripsi' => $deskripsi,
            'tgl_masuk' => $tglMasuk,
            'jml_masuk' => $ttlMasuk,
            'keterangan' => $keterangan
        );
        $this->managementmodel->addIncome($income);
        redirect('manage/keuangan/pemasukan');
    }
    public function incomeEdit()
    {
        $id = $this->input->post('id');
        $organisasi = $this->session->userdata('organisasi');
        $deskripsi =  $this->input->post('deskripsi');
        $tglMasuk =  $this->input->post('tanggalMasuk');
        $ttlMasuk = $this->input->post('totalMasuk');
        $keterangan = $this->input->post('keterangan');
        $income = array(
            'deskripsi' => $deskripsi,
            'tgl_masuk' => $tglMasuk,
            'jml_masuk' => $ttlMasuk,
            'keterangan' => $keterangan
        );
        $this->managementmodel->editIncome($income, $id, $organisasi);
        redirect('manage/keuangan/pemasukan');
    }

    public function incomeDelete()
    {
        $id = $this->input->post('id');
        $this->managementmodel->deleteIncome($id);
        redirect('manage/keuangan/pemasukan');
    }

    public function outcomeUpload()
    {
        $filename = time() . '-' . $_FILES['bukti']['name'];
        $file = preg_replace('/\W(?![^.]*$)/', '_', $filename);
        $config['file_name'] = $file;
        $config['upload_path'] = './uploads/keuangan/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
        $config['max_size'] = 20000;

        $organisasi = $this->session->userdata('organisasi');
        $deskripsi =  $this->input->post('deskripsi');
        $tglKeluar =  $this->input->post('tanggal');
        $ttlKeluar = $this->input->post('pengeluaran');
        $keterangan = $this->input->post('keterangan');

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti')) {
            if (empty($_FILES['bukti']['name'])) {
                $outcome = array(
                    'id_organisasi' => $organisasi,
                    'deskripsi' => $deskripsi,
                    'tgl_keluar' => $tglKeluar,
                    'jml_keluar' => $ttlKeluar,
                    'keterangan' => $keterangan
                );
                $this->managementmodel->addOutcome($outcome);
                redirect('manage/keuangan/pengeluaran');
            } else {
                $this->upload->display_errors();
                echo $file;
                $this->session->set_flashdata('error', 'Gambar terlalu besar untuk di upload');
                //redirect('manage/keuangan/pengeluaran');
            }
        } else {
            $bukti = $file;
            $outcome = array(
                'id_organisasi' => $organisasi,
                'deskripsi' => $deskripsi,
                'tgl_keluar' => $tglKeluar,
                'bukti_pengeluaran' => $bukti,
                'jml_keluar' => $ttlKeluar,
                'keterangan' => $keterangan
            );
            $this->managementmodel->addOutcome($outcome);
            redirect('manage/keuangan/pengeluaran');
        }
    }

    public function outcomeEdit()
    {
        $filename = time() . '-' . $_FILES['bukti']['name'];
        $file = preg_replace('/\W(?![^.]*$)/', '_', $filename);
        $config['file_name'] = $file;
        $config['upload_path'] = './uploads/keuangan/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg|xlsx|csv|xls';
        $config['max_size'] = 20000;

        $id = $this->input->post('id');
        $organisasi = $this->session->userdata('organisasi');
        $deskripsi =  $this->input->post('deskripsi');
        $tglKeluar =  $this->input->post('tanggal');
        $ttlKeluar = $this->input->post('pengeluaran');
        $keterangan = $this->input->post('keterangan');

        $this->load->library('upload', $config);
        if ($this->input->post('bukti') == null) {
            $outcome = array(
                'id_organisasi' => $organisasi,
                'deskripsi' => $deskripsi,
                'tgl_keluar' => $tglKeluar,
                'jml_keluar' => $ttlKeluar,
                'keterangan' => $keterangan
            );
            $this->managementmodel->editOutcome($outcome, $id, $organisasi);
            redirect('manage/keuangan/pengeluaran');
        } else if (!$this->upload->do_upload('bukti')) {
            echo $this->upload->display_errors();
            echo $file;
            $this->session->set_flashdata('error', 'Gambar terlalu besar untuk di upload');
            //redirect('manage/keuangan/pengeluaran');
        } else {
            $bukti = $file;
            $outcome = array(
                'id_organisasi' => $organisasi,
                'deskripsi' => $deskripsi,
                'tgl_keluar' => $tglKeluar,
                'bukti_pengeluaran' => $bukti,
                'jml_keluar' => $ttlKeluar,
                'keterangan' => $keterangan
            );
            $this->managementmodel->editOutcome($outcome, $id, $organisasi);
            redirect('manage/keuangan/pengeluaran');
        }
    }

    public function outcomeDelete()
    {
        $id = $this->input->post('id');
        $this->managementmodel->deleteOutcome($id);
        redirect('manage/keuangan/pengeluaran');
    }
}

/* End of file Keuangan.php */
