<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{
    public function Mdelete_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
    }
    public function ubah_profil($data)
    {
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('user',$data);
    }
}
