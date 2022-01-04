<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mapel extends CI_Model
{
    public function Mdelete_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
    }
    
	public function get_mapel_id(){
		$data=$this->session->userdata('nisn');
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
					WHERE `guru`.`nip`=".$data
        ;
        return $this->db->query($query)->row_array();
	}
	public function get_mapel_kode(){
		$data=$this->session->userdata('nisn');
		$query = "SELECT `matpel`.`kode_matpel` 
					FROM `user` 
					LEFT JOIN `user_role` 
					on `user`.`role_id`=`user_role`.`id` 
					LEFT JOIN `kelas` 
					on `kelas`.`id_kelas`=`user`.`kelas_id` 
					LEFT JOIN `guru`
					on `guru`.`nip`=`user`.`nisn`
					LEFT JOIN `matpel`
					on `matpel`.`id_matpel`=`guru`.`matpel_id`
					WHERE `guru`.`nip`=".$data
        ;
        return $this->db->query($query)->row();
	}
	public function getLastMapel($bulan,$tahun,$code)
    {
            $this->db->select('m_mapel.id_m_mapel');
            $this->db->from('m_mapel');
            $this->db->join('matpel','m_mapel.mapel_id = matpel.id_matpel','left');
            $this->db->order_by('m_mapel.id_m_mapel','DESC');
            $this->db->where('matpel.kode_matpel=',$code);
            $this->db->where('MONTH(tgl_mapel)',$bulan);
            $this->db->where('YEAR(tgl_mapel)',$tahun);
            $this->db->limit(1);
        return $this->db->get();
    }
	public function get_kelas_mapel($id){
        $data= $this->session->userdata('nisn');
		
		$query = "SELECT `m_mapel`.*,`matpel`.*,`kelas`.* 
					FROM `m_mapel`
					LEFT JOIN `kelas` on `kelas`.`id_kelas`=`m_mapel`.`kelas_id`
					LEFT JOIN `matpel` on `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
					WHERE `m_mapel`.`author`=$data
					AND `m_mapel`.`id`= $id
				";
        return $this->db->query($query)->row_array();
	}
	public function get_hapus_id($id){
		$row = $this->db->where('id',$id)->get('m_mapel')->row();
		unlink(FCPATH. './assets/Dokumen/' . $row->dokumen);
        $this->db->where('id', $id);
        $this->db->delete('m_mapel');
        return true; 
	}
	public function Mdelete_matpel($id)
    {
        $this->db->where('id_matpel', $id);
        return $this->db->delete('matpel');
    }
	public function ubah_mapel($data)
    {
        $this->db->where('id_matpel',$this->input->post('id'));
        return $this->db->update('matpel',$data);
    }
    
}