<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{
    public function getProfile(){
        $nisn=$this->session->userdata('nisn');
        $query = "SELECT `user`.*, `guru`.*,`matpel`.*,`kelas`.*
                    FROM `user` 
                    LEFT JOIN `guru`
                    ON `user`.`nisn` = `guru`.`nip`
                    LEFT JOIN `matpel`
                    ON `guru`.`matpel_id` = `matpel`.`id_matpel`
                    LEFT JOIN `kelas`
                    ON `user`.`kelas_id` = `kelas`.`id_kelas`
                    WHERE `user`.`nisn`=$nisn
        ";
        return $this->db->query($query)->row_array();
    }
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
    public function ubah_guru($data1)
    {
        $this->db->where('id_guru',$this->input->post('id_guru'));
        return $this->db->update('guru',$data1);
    }
}
