<?php 

class Faqs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		session_start();
		if(!isset($_SESSION['userid'])) 
			redirect(site_url()."/admin/login", 'refresh');
	}

	private function __load($title, $main) {
		$this->data['title'] = $title;
		$this->data['main'] = $main;
		$this->load->vars($this->data);
		$this->load->view('dashboard');
	}

	public function index() {
		$this->data['faqs'] = Faq::getAllFaq();
		$this->__load('Manage FAQS', 'admin_faq_home');
	}

	public function create() {
		if($this->input->post('faq')){
			Faq::addFaq($this->input->post('faq'));
			$this->session->set_flashdata('message', 'q&a created');
			redirect(site_url()."/admin/faqs/index", 'refresh');
		} else {
			$this->__load('Create Faq', 'admin_faq_create');
		}
	}

	public function delete($id) {
		Faq::deleteFaq($id);
		$this->session->set_flashdata('message', 'Faq deleted');
		redirect(site_url()."/admin/faqs/index");
	}

	public function edit($id) {
		if($this->input->post('faq')) {
			Faq::updateFaq($id);
			$this->session->set_flashdata('message', 'Faq updated');
			redirect(site_url()."/admin/faqs/index", 'refresh');
		} else {
			$this->data['faq'] = Faq::getFaq($id);
			$this->__load('Edit Faq', 'admin_faq_edit');
		}
	}
}
 ?>