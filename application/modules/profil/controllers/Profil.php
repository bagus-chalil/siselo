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
	public function edit_profile()
    {
        $data = array (
            'id'=>$this->input->post('id'),
			'name'=>$this->input->post('name'),
			'nisn'=>$this->input->post('nisn'),
			'email'=>$this->input->post('email'),
			'alamat'=>$this->input->post('alamat'),
			'kelas'=>$this->input->post('kelas'),
			'wali_kelas'=>$this->input->post('wali_kelas'),
			'telephone'=>$this->input->post('telephone')

        );

        $this->profil->ubah_profil($data);
		
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">SubMenu Successful Edit !!!</div>');
        redirect(base_url('profil'));
    }

}