<?php 
/*
	Controller yang menangani user/admin
*/
class Admins extends CI_Controller {
	public function __construct() {
		parent::__construct();
		session_start();
		if(!isset($_SESSION['userid'])) 
			redirect(site_url()."/admin/login", 'refresh');
	}

	# mempersiapkan data
	private function __load($title, $main) {
		$this->data['title'] = $title;
		$this->data['main'] = $main;
		$this->load->vars($this->data);
		$this->load->view('dashboard');
	}

	# menampilkan seluruh user
	public function index() {
		$this->data['admins'] = Admin::getAllUsers();
		$this->data['admin'] = Admin::getUser($_SESSION['userid'] );
		$this->__load('Manage Users', 'admin_admins_home');
	}

	# bila ada data terpost->create->index, else menampilkan form
	public function create() {
		if($this->input->post('username')) {
			Admin::addUser($this->input->post('admin'));
			$this->session->set_flashdata('message', 'User created');
			redirect(site_url()."/admin/admins/index", "refresh");
		} else 
			$this->__load('Create User', 'admin_admins_create');
	}

	# bila ada date terpost->edit->index, else menampilkan form
	public function edit($id) {
		if($this->input->post('username')) {
			Admin::editUser($id);
			$this->session->set_flashdata('message', "User edited");
			redirect(site_url()."/admin/admins/index",'refresh');
		} else {
			$this->data['admin'] = Admin::getUser($id);
			$this->__load('Edit User', 'admin_admins_edit');
		}
	}

	# delete->kembali ke index
	public function delete($id) {
		Admin::deleteUser($id);
		$this->session->set_flashdata('message', 'User deleted');
		redirect(site_url()."/admin/admins/index",'refresh');
	}
}

 ?>