<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		$data['title'] = 'Halaman Belajar';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('kelas',$data);
		$this->load->view('templatef/footer');
	}

}