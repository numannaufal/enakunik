<?php 

class Orders extends CI_Controller {
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
		$this->data['orders'] = Order::getAllOrders();
		$this->__load('Manage Orders', 'admin_order_home');
	}

	# delete -> index
	public function delete($id) {
		Order::deleteOrder($id);
		$this->session->set_flashdata('message', 'Order deleted');
		redirect(site_url()."/admin/orders/index");
	}

	public function edit($id) {
		Order::editViewed($id);
		if($this->input->post('status')) {
			Order::editOrder($id);
			$this->session->set_flashdata('message', 'Order updated');
			redirect(site_url()."/admin/orders/index", 'refresh');
		} else {
			$this->data['order'] = Order::getOrder($id);
			$this->data['items'] = Cartitem::getAllItemWithDetails($id);
			$this->__load('Edit Order', 'admin_order_edit');
		}
	}
}

 ?>