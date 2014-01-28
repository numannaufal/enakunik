<?php 

/* Product: create/edit/delete/view */

class Products extends CI_Controller {
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
		$this->data['products'] = Product::getAllProducts();
		$this->__load('Manage Products', 'admin_product_home');
	}

	# create-> index, else form
	public function create() {
		if($this->input->post('product')) {
			Product::addProduct($this->input->post('product'));
			$this->session->set_flashdata('message', 'Product created');
			redirect(site_url()."/admin/products/index", 'refresh');
		} else {
			$this->data['pcategories'] = Category::getParentCategories();
			$this->data['scategories'] = Category::getChildCategories();
			$this->__load('Create Product', 'admin_product_create');
		}
	}

	# edit->index, else form
	public function edit($id) {
		if($this->input->post('product')) {
			Product::editProduct($id);
			$this->session->set_flashdata('message', 'Product updated');
			redirect(site_url()."/admin/products/index", 'refresh');
		} else {
			$this->data['product'] = Product::getProduct($id);
			$this->data['pcategories'] = Category::getParentCategories();
			$this->data['scategories'] = Category::getChildCategories();
			$this->__load('Edit Product', 'admin_product_edit');
		}
	}

	# delete -> index
	public function delete($id) {
		Product::deleteProduct($id);
		$this->session->set_flashdata('message', 'Product deleted');
		redirect(site_url()."/admin/products/index");
	}
}

 ?>