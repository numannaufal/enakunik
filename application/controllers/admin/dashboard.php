<?php 
/*
	controller halaman utama dashboard
*/
class Dashboard extends CI_Controller {

	# memastikan user login
	public function __construct() {
		parent::__construct();
		session_start();
		if(!isset($_SESSION['userid'])) 
			redirect(site_url()."/admin/login", 'refresh');
	}

	# hal utama
	public function index() {
		$this->data['title'] = "Dashboard Home";
		$this->data['main'] = 'admin_home';
		$this->load->vars($this->data);
		$this->load->view('dashboard');
	}

	# logout->home
	public function logout() {
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
		$this->session->set_flashdata('error', "You've been logged out!");
		redirect(site_url()."/admin/login", 'refresh');
	}
}

 ?>