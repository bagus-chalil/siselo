<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
	parent::__construct();
	$this->load->model('M_Login','login');
	$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')){
			redirect('profil');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if ($this->form_validation->run() == FALSE){
			$data['title']="Login- LMS SISELO";
			$this->load->view('templatef/header',$data);
			$this->load->view('login',$data);
			$this->load->view('templatef/header');
		}else{
			$this->_login();
		}
	}
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email' => $email])->row_array();
		
		if($user){
			if($user['is_active'] == 1){
				//cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'nisn' => $user['nisn'],
						'name' => $user['name']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] ==1){
						redirect('Admin');
					}else if($user['role_id'] ==2){
						redirect('Website');
					}else{
						redirect('Kelas');
					}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
				Your Password is Incorrect !
				</div>');	
				redirect('Login');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
				Your Email dont Activated !
				</div>');	
				redirect('Login');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
			Your Account dont register !
			</div>');
			redirect('Login');
		}
	}
	public function awal(){
		$this->load->view('landing_page');
	} 
	public function pengumuman(){
		$data['pengumuman'] = $this->login->get_pengumuman();
		$this->load->view('pengumuman',$data);
	} 
	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','<div class="alert alert-primary text-center" role="alert">
		   Thank you, You Have been Logout !
		   </div>');
		   redirect('Login');
	} 

}