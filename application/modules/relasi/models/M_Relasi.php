<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Relasi extends CI_Model
{
    public function Mdelete_menu($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_menu');
    }
    public function Medit_menu($data)
    {
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('user_menu',$data);
    }
    public function getSubMenu(){
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
        
    }
    
}