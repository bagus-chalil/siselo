<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nisn', 'NISN', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'Email has already use !'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]',[
			'min_length' => 'Password min 8 Character !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password]',[
			'matches' => 'Password dont match !',
			'min_length' => 'Password min 8 Character !'
		]);

		if ($this->form_validation->run() == FALSE){

		$data['title'] ="Register Member";
		$this->load->view('templatef/header',$data);
		$this->load->view('register',$data);
		$this->load->view('templatef/footer');
		}else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'nisn' => htmlspecialchars($this->input->post('nisn', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user',$data);

			$this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">
			Your Account has been Created. Please log in !
			</div>');
			redirect('Login');
	} 
	}
}