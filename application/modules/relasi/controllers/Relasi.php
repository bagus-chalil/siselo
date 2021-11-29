<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Relasi','relasi');
	}

	public function index()
	{
		$data['title'] = "Relasi";
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		
			$this->load->view('templatea/header' ,$data);
			$this->load->view('templatea/sidebar',$data);
			$this->load->view('v_relasi',$data);
			$this->load->view('templatea/footer');
	}

}