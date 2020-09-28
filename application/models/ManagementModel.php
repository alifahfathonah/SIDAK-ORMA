<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ManagementModel extends CI_Model
{
    public function loadOrganizationName($organisasi)
    {
        $query = $this->db->get_where('info_organisasi', array('id' => $organisasi));
        return $query->result_array();
    }

    public function loadFinanceDashboard($organisasi)
    {
        $query = $this->db->get_where('keuangan', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function loadIncome($organisasi)
    {
        $query = $this->db->get_where('keuangan_masuk', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function loadIncomeDashboard($organisasi)
    {
        $this->db->select_sum('jml_masuk');
        $query = $this->db->get_where('keuangan_masuk', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function loadSearchIncome($organisasi, $keywords)
    {
        $this->db->like('deskripsi', $keywords);
        $query = $this->db->get_where('keuangan_masuk', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function loadSearchIncomeId($organisasi, $id)
    {
        $this->db->like('id_transaksi', $id);
        $query = $this->db->get_where('keuangan_masuk', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function addIncome($data)
    {
        $this->db->insert('keuangan_masuk', $data);
    }

    public function editIncome($data, $id, $organisasi)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->where('id_organisasi', $organisasi);
        $this->db->update('keuangan_masuk', $data);
    }

    public function deleteIncome($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('keuangan_masuk');
    }

    public function loadOutcome($organisasi)
    {
        $query = $this->db->get_where('keuangan_keluar', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function loadOutcomeDashbaord($organisasi)
    {
        $this->db->select_sum('jml_keluar');
        $query = $this->db->get_where('keuangan_keluar', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function loadSearchOutcome($organisasi, $keywords)
    {
        $this->db->like('deskripsi', $keywords);
        $query = $this->db->get_where('keuangan_keluar', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function loadSearchOutcomeId($organisasi, $id)
    {
        $this->db->like('id_transaksi', $id);
        $query = $this->db->get_where('keuangan_keluar', array('id_organisasi' => $organisasi));
        return $query->result_array();
    }

    public function addOutcome($data)
    {
        $this->db->insert('keuangan_keluar', $data);
    }

    public function editOutcome($data, $id, $organisasi)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->where('id_organisasi', $organisasi);
        $this->db->update('keuangan_keluar', $data);
    }

    public function deleteOutcome($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('keuangan_keluar');
    }

    public function loadLogIncome($organisasi)
    {
        $query = $this->db->query("SELECT DISTINCT kl.id_transaksi, kl.keterangan, km.tgl_masuk, km.jml_masuk 
        FROM keuangan_masuk_log AS kl
        LEFT JOIN keuangan_masuk AS km ON kl.id_pemasukan = km.id_transaksi 
        WHERE km.id_organisasi=$organisasi
        ORDER BY kl.id_transaksi DESC LIMIT 4");
        return $query->result_array();
    }

    public function loadLogOutcome($organisasi)
    {
        $query = $this->db->query("SELECT DISTINCT kk.id_transaksi, kl.keterangan, kk.tgl_keluar, kk.jml_keluar
        FROM keuangan_keluar_log AS kl
        LEFT JOIN keuangan_keluar AS kk
        ON kl.id_transaksi = kk.id_transaksi
        WHERE kk.id_organisasi=$organisasi ORDER BY kl.id_transaksi DESC LIMIT 4");
        return $query->result_array();
    }

    public function loadDataCategory()
    {
        $query = $this->db->get('jenis_berkas');
        return $query->result_array();
    }

    public function loadData($organisasi)
    {
        $query = $this->db->query("SELECT b.id, b.nama_berkas, b.id_jenis, jb.jenis, b.tgl_dibuat, b.file FROM berkas AS b
        INNER JOIN jenis_berkas AS jb
        ON b.id_jenis = jb.id 
        WHERE id_organisasi = $organisasi 
        ORDER BY b.tgl_dibuat DESC");
        return $query->result_array();
    }

    public function loadSearchData($organisasi, $keywords)
    {
        $query = $this->db->query("SELECT b.id, b.nama_berkas, b.id_jenis, jb.jenis, b.tgl_dibuat, b.file FROM berkas AS b
        INNER JOIN jenis_berkas AS jb
        ON b.id_jenis = jb.id 
        WHERE id_organisasi = $organisasi AND nama_berkas LIKE '%$keywords%'
        ORDER BY b.tgl_dibuat DESC");
        return $query->result_array();
    }

    public function addData($data)
    {
        $this->db->insert('berkas', $data);
    }

    public function editData($data, $id, $organisasi)
    {
        $this->db->where('id', $id);
        $this->db->where('id_organisasi', $organisasi);
        $this->db->update('berkas', $data);
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('berkas');
    }

    public function listSchedule()
    {
        $query = $this->db->query("SELECT jo.id, jo.id_org, io.nama_organisasi, jo.kegiatan, jo.date, jo.tempat FROM `jadwal_organisasi` AS jo
        INNER JOIN info_organisasi AS io 
        ON io.id = jo.id_org ORDER BY jo.date ASC");
        return $query->result_array();
    }

    public function addSchedule($data)
    {
        $this->db->insert('jadwal_organisasi', $data);
    }

    public function editSchedule($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('jadwal_organisasi', $data);
    }

    public function deleteSchedule($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwal_organisasi');
    }

    public function searchNamaSchedule($nama)
    {
        $query = $this->db->query("SELECT jo.id, jo.id_org, io.nama_organisasi, jo.kegiatan, jo.date, jo.tempat FROM `jadwal_organisasi` AS jo
        INNER JOIN info_organisasi AS io 
        ON io.id = jo.id_org WHERE kegiatan LIKE '%$nama%'
        ORDER BY jo.date ASC");
        return $query->result_array();
    }
    public function searchDateSchedule($tanggal)
    {
        $query = $this->db->query("SELECT jo.id, jo.id_org, io.nama_organisasi, jo.kegiatan, jo.date, jo.tempat FROM `jadwal_organisasi` AS jo
        INNER JOIN info_organisasi AS io 
        ON io.id = jo.id_org WHERE date = '$tanggal'
        ORDER BY jo.date ASC");
        return $query->result_array();
    }
    public function searchSchedule($nama, $tanggal)
    {
        $query = $this->db->query("sSELECT jo.id, jo.id_org, io.nama_organisasi, jo.kegiatan, jo.date, jo.tempat FROM `jadwal_organisasi` AS jo
        INNER JOIN info_organisasi AS io 
        ON io.id = jo.id_org WHERE kegiatan LIKE '%$nama%' AND date = '$tanggal'
        ORDER BY jo.date ASC
        ");
        return $query->result_array();
    }
}

/* End of file ManagementModel.php */
