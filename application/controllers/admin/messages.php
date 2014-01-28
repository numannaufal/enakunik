<?php 

class Messages extends CI_Controller {
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

	# view
	public function index() {
		$this->data['messages'] = Message::getAllmessages();
		$this->__load('Manage messages', 'admin_message_home');
	}

	# delete -> index
	public function delete($id) {
		message::deletemessage($id);
		$this->session->set_flashdata('message', 'message deleted');
		redirect(site_url()."/admin/messages/index");
	}

	public function view($id) {
		Message::editViewed($id);
		$this->data['message'] = Message::getMessage($id);
		$this->__load('View message', 'admin_message_view');
		
	}
}

 ?>