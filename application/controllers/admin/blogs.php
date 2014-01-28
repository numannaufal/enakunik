<?php 

class Blogs extends CI_Controller {

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
		$this->data['blogs'] = Blog::getAllBlog();
		$this->__load('Manage blogs', 'admin_blog_home');
	}

	public function create() {
		if($this->input->post('blog')){
			Blog::addBlog($this->input->post('blog'));
			$this->session->set_flashdata('message', 'news created');
			redirect(site_url()."/admin/blogs/index", 'refresh');
		} else {
			$this->data['blogcategories'] = Blogcategory::getAllBlogCategories();
			$this->__load('Create news', 'admin_blog_create');
		}
	}

	public function delete($id) {
		Blog::deleteBlog($id);
		$this->session->set_flashdata('message', 'news deleted');
		redirect(site_url()."/admin/blogs/index");
	}

	public function edit($id) {
		if($this->input->post('blog')) {
			Blog::updateBlog($id);
			$this->session->set_flashdata('message', 'news updated');
			redirect(site_url()."/admin/blogs/index", 'refresh');
		} else {
			$this->data['blogcategories'] = Blogcategory::getAllBlogCategories();
			$this->data['blog'] = Blog::getBlog($id);
			$this->__load('Edit Blog', 'admin_blog_edit');
		}
	}
}
 ?>