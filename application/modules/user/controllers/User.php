<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('M_User','user');
	}

	public function index()
	{
		$data['title'] = "Role User";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('role',$data);
		$this->load->view('templatea/footer');
	}
	public function addrole()
	{

		$this->db->insert('user_role', ['role' => $this->input->post('role')]);
		$this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">New Role Added !!!</div>');
		redirect('User');
	}
	public function delete_role($id)
	{
		$delete = $this->user->Mdelete_role($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger"
		role="alert">Delete Role Success !!!</div>');
		redirect('User');
	}
	public function roleAccess($role_id)
	{
		$data['title'] = "Role User";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('user/role_access');
		$this->load->view('templatea/footer',$data);
	}
	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];
		$result = $this->db->get_where('user_access_menu', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Access Role Change !!!</div>');
	}

}