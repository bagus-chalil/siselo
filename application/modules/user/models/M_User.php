<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function Mdelete_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
    }
}