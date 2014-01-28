<?php 

class login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		session_start();

	}

	public function index() {
		if($this->input->post('username')) {
			$u = $this->input->post('username');
			$pw = $this->input->post('password');
			Admin::verifyUser($u, $pw);
			if(isset($_SESSION['userid']))
				redirect('admin/dashboard', 'refresh');
			else
				redirect('admin/login', 'refresh');
		}
		$this->load->view('admin_login');
	}

}


 ?>