<?php 

/* slider: create/edit/delete/view */

class Sliders extends CI_Controller {
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
		$this->data['sliders'] = Slider::getAllSliders();
		$this->__load('Manage Sliders', 'admin_slider_home');
	}

	# create-> index, else form
	public function create() {
		if($this->input->post('slider')) {
			Slider::addslider($this->input->post('slider'));
			$this->session->set_flashdata('message', 'slider created');
			redirect(site_url()."/admin/sliders/index", 'refresh');
		} else {
			$this->__load('Create slider', 'admin_slider_create');
		}
	}

	# delete -> index
	public function delete($id) {
		Slider::deleteSlider($id);
		$this->session->set_flashdata('message', 'slider deleted');
		redirect(site_url()."/admin/sliders/index");
	}
}

 ?>