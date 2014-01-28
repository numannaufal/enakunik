<?php 
/*
	Controller blogcategories : create/edit/view
*/
class Blogcategories extends CI_Controller {
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
		$this->data['blogcategories'] = Blogcategory::getAllBlogCategories();
		$this->__load('Manage blogcategories', 'admin_blogcat_home');
	}

	# post->create->add->index , else form 
	public function create() {
		if($this->input->post('blogcategory')){
			Blogcategory::addblogcategory($this->input->post('blogcategory'));
			$this->session->set_flashdata('message', 'blogcategory created');
			redirect(site_url()."/admin/blogcategories/index", 'refresh');
		} else {
			$this->data['blogcategories'] = Blogcategory::getAllBlogcategories();
			$this->__load('Create blogcategory', 'admin_blogcat_create');
		}
	}

	public function delete($id) {
		Blogcategory::deleteblogcategory($id);
		$this->session->set_flashdata('message', 'blogcategory deleted');
		redirect(site_url()."/admin/blogcategories/index");
	}
}

 ?>