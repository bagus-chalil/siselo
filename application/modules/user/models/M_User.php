<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function Mdelete_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
    }
    
	public function get_user_level(){
		$query = "SELECT `user`.*,`user_role`.`id` as `id_level`,`user_role`.`role`,`kelas`.*,`guru`.*,`matpel`.* 
					FROM `user` 
					LEFT JOIN `user_role` 
					on `user`.`role_id`=`user_role`.`id` 
					LEFT JOIN `kelas` 
					on `kelas`.`id_kelas`=`user`.`kelas_id` 
					LEFT JOIN `guru`
					on `guru`.`id_guru`=`user`.`wali_kelas`
					LEFT JOIN `matpel`
					on `matpel`.`id_matpel`=`guru`.`matpel_id`
					ORDER BY `user_role`.`role` ASC 
        ";
        return $this->db->query($query)->result_array();
	}
	public function get_user_role(){
		$this->db->select('*');
		$this->db->from('user_role');
		$this->db->where('id !=',1);
		$query = $this->db->get();
		return $query;
	}
    public function get_user_levelId(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_role', 'user.role_id=user_role.id');
		$this->db->where('');
		$query = $this->db->get();
		return $query;
	}
	public function ubah_userLevel($data)
    {
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('user',$data);
    }
	public function ubah_userLevel1($data1)
    {
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('user',$data1);
    }
}