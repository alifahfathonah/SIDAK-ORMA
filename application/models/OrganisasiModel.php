<?php


defined('BASEPATH') or exit('No direct script access allowed');

class OrganisasiModel extends CI_Model
{
    public function loadData()
    {
        $query = $this->db->get('info_organisasi');
        return $query->result_array();
    }

    public function loadDataId($id)
    {
        $query = $this->db->get_where('info_organisasi', ["id" => $id]);
        return $query->result_array();
    }
}

/* End of file Organisasi.php */
