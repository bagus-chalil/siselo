<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('M_profil','profil');

    }
	public function index()
	{
		$data['title'] = 'Profil';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['data_profile']=$this->profil->getProfile();
		$data['matpel']=$this->db->get('matpel')->result_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['users'] = $this->db->get('user')->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nisn', 'NISN', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('wali_kelas', 'Wali_kelas', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('profils',$data);
		$this->load->view('templatef/footer');
	} else {
		redirect('edit_profile');
	}
	}
	public function profil_siswa()
	{
		$data['title'] = 'Profil';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['data_profile']=$this->profil->getProfile();
		$data['guru']=$this->profil->getGuru();
		$data['matpel']=$this->db->get('matpel')->result_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['users'] = $this->db->get('user')->result_array();
		$data['gurus'] = $this->db->get('guru')->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nisn', 'NISN', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('wali_kelas', 'Wali_kelas', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templatef/kelas_online/header',$data);
			$this->load->view('templatef/kelas_online/topbar',$data);
			$this->load->view('profilsis',$data);
			$this->load->view('templatef/kelas_online/footer',$data);
	} else {
		redirect('edit_profile_siswa');
	}
	}
	public function edit_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$id = $this->input->post('id');
		$config['upload_path']   = FCPATH. './assets/images/faces/';
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size']      = 15090;
			$config['encrypt_name']  = False;
		//   	$config['max_width']     = '1024';
		//   	$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('image'));

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'nisn'=>$this->input->post('nisn'),
				'email'=>$this->input->post('email'),
				'alamat'=>$this->input->post('alamat'),
				'kelas_id'=>$this->input->post('kelas'),
				'wali_kelas'=>$this->input->post('wali_kelas'),
				'telephone'=>$this->input->post('telephone')
			);
			$data1 = array (
					'id_guru'=>$this->input->post('id_guru'),
					'nama_guru'=>$this->input->post('name'),
					'emails'=>$this->input->post('email'),
					'matpel_id'=>$this->input->post('matpel')
			);
				$this->profil->ubah_profil($data);
				$this->profil->ubah_guru($data1);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
			redirect('profil');
		} else {
			$old_document = $this->input->post('image1');
			if ($old_document != 'default.jpg') {
				unlink(FCPATH. './assets/images/faces/' . $old_document);
			}
			$image = $this->upload->data('file_name');
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'nisn'=>$this->input->post('nisn'),
				'email'=>$this->input->post('email'),
				'alamat'=>$this->input->post('alamat'),
				'kelas_id'=>$this->input->post('kelas'),
				'wali_kelas'=>$this->input->post('wali_kelas'),
				'telephone'=>$this->input->post('telephone'),
				'image'=>$image
			);
			$data1 = array (
					'id_guru'=>$this->input->post('id_guru'),
					'nama_guru'=>$this->input->post('name'),
					'emails'=>$this->input->post('email'),
					'matpel_id'=>$this->input->post('matpel')
			);
				$this->profil->ubah_profil($data);
				$this->profil->ubah_guru($data1);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
			redirect('profil');
		}
    }
	public function edit_profile_siswa()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$id = $this->input->post('id');
		$config['upload_path']   = FCPATH. './assets/images/faces/';
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size']      = 15090;
			$config['encrypt_name']  = False;
		//   	$config['max_width']     = '1024';
		//   	$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('image'));

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'nisn'=>$this->input->post('nisn'),
				'email'=>$this->input->post('email'),
				'alamat'=>$this->input->post('alamat'),
				'kelas_id'=>$this->input->post('kelas'),
				'wali_kelas'=>$this->input->post('wali_kelas'),
				'telephone'=>$this->input->post('telephone')
			);
			$data1 = array (
					'id_guru'=>$this->input->post('id_guru'),
					'nama_guru'=>$this->input->post('name'),
					'emails'=>$this->input->post('email'),
					'matpel_id'=>$this->input->post('matpel')
			);
				$this->profil->ubah_profil($data);
				$this->profil->ubah_guru($data1);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
			redirect('profil/profil_siswa');
		} else {
			$old_document = $this->input->post('image1');
			if ($old_document != 'default.jpg') {
				unlink(FCPATH. './assets/images/faces/' . $old_document);
			}
			$image = $this->upload->data('file_name');
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'nisn'=>$this->input->post('nisn'),
				'email'=>$this->input->post('email'),
				'alamat'=>$this->input->post('alamat'),
				'kelas_id'=>$this->input->post('kelas'),
				'wali_kelas'=>$this->input->post('wali_kelas'),
				'telephone'=>$this->input->post('telephone'),
				'image'=>$image
			);
			$data1 = array (
					'id_guru'=>$this->input->post('id_guru'),
					'nama_guru'=>$this->input->post('name'),
					'emails'=>$this->input->post('email'),
					'matpel_id'=>$this->input->post('matpel')
			);
				$this->profil->ubah_profil($data);
				$this->profil->ubah_guru($data1);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
			redirect('profil/profil_siswa');
		}
    }
	public function edit_foto()
    {
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$id = $this->input->post('id');
			$config['upload_path']   = FCPATH. './assets/images/faces/';
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size']      = 15090;
			$config['encrypt_name']  = False;
		//   	$config['max_width']     = '1024';
		//   	$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('image'));

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email')
			);
			$this->profil->ubah_profil($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
			redirect('profil');
		} else {
			$old_document = $this->input->post('image1');
			if ($old_document != 'default.jpg') {
				unlink(FCPATH. './assets/images/faces/' . $old_document);
			}
			$image = $this->upload->data('file_name');
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'image'=>$image
			);
			$this->profil->ubah_profil($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
			redirect('profil');
		}
	}
	public function edit_foto_siswa()
    {
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$id = $this->input->post('id');
			$config['upload_path']   = FCPATH. './assets/images/faces/';
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size']      = 15090;
			$config['encrypt_name']  = False;
		//   	$config['max_width']     = '1024';
		//   	$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('image'));

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email')
			);
			$this->profil->ubah_profil($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
			redirect('profil/profil_siswa');
		} else {
			$old_document = $this->input->post('image1');
			if ($old_document != 'default.jpg') {
				unlink(FCPATH. './assets/images/faces/' . $old_document);
			}
			$image = $this->upload->data('file_name');
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'image'=>$image
			);
			$this->profil->ubah_profil($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
			redirect('profil/profil_siswa');
		}
	}
}