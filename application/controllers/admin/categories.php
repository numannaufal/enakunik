<?php 
/*
	Controller categories : create/edit/view
*/
class Categories extends CI_Controller {
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
		$this->data['categories'] = Category::getAllCategories();
		$this->__load('Manage Categories', 'admin_cat_home');
	}

	# post->create->add->index , else form 
	public function create() {
		if($this->input->post('category')){
			Category::addCategory($this->input->post('category'));
			$this->session->set_flashdata('message', 'Category created');
			redirect(site_url()."/admin/categories/index", 'refresh');
		} else {
			$this->data['categories'] = Category::getParentCategories();
			$this->__load('Create Category', 'admin_cat_create');
		}
	}

	# post->edit->index, else form
	public function edit($id) {
		if($this->input->post('category')) {
			Category::updateCategory($id);
			$this->session->set_flashdata('message', 'Category updated');
			redirect(site_url()."/admin/categories/index", 'refresh');
		} else {
			$this->data['category'] = Category::getCategory($id);
			$this->data['categories'] = Category::getParentCategories();
			$this->__load('Edit Category', 'admin_cat_edit');
		}
	}

	# delete -> index
	public function delete($id) {
		Category::deleteCategory($id);
		$this->session->set_flashdata('message', 'Category deleted');
		redirect(site_url()."/admin/categories/index");
	}
}

 ?>