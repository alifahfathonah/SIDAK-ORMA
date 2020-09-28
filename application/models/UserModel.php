<?php


defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    //jangan lupa nanti dibuat enkripsi
    public function login($username, $password)
    {
        $this->db->select('id, nama_lengkap, username, organisasi_terikat, email, level');
        $this->db->from('authentication');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function addNewMember($organisasi)
    {
        $data = array(
            "id" => null,
            "organisasi_terikat" => $organisasi,
            "nama_lengkap" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "username" => $this->input->post('username'),
            "password" => $this->input->post('pass'),
            "level" =>  $this->input->post('level')
        );
        $this->db->insert('authentication', $data);
    }

    public function loadAnggota($id_organisasi)
    {
        $this->db->select();
    }
}

/* End of file AuthModel.php */
