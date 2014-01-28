<?php 
	class Home extends CI_Controller {
		public function __construct() {
			parent::__construct();
			session_start();
			if(!isset($_SESSION['cartct'])) 
				$_SESSION['cartct'] = 0;

			if(!isset($_SESSION['cart']))
				$_SESSION['cart'] = null;
		}

		private function __load($title, $main) {
			$this->data['title'] = $title;
			$this->data['main'] = $main;
			$this->load->vars($this->data);
			$this->load->view('layout');
		}

		public function index() {
			$this->data['sliders'] = Slider::getAllSliders();
			$this->data['fproducts'] = Product::getMainFeature();
			$this->data['nproducts'] = Product::getNewest();
			$this->data['rproducts'] = Product::getRecommended();
			$this->data['news'] = Blog::getNews();
			$this->__load('EnakUnik | Home', 'home');
		}

		public function about() {
			$this->__load('EnakUnik | About', 'about');
		}

		public function contact() {
			$this->__load('EnakUnik | Contact', 'contact');
		}

		public function message() {
			$message = $this->input->post('message');
			Message::addMessage($message);
			redirect(site_url()."/home/contact", 'refresh');
		}

		public function term() {
			$this->__load('EnakUnik | term', 'term');
		}

		public function blog() {
			$this->data['blogs'] = Blog::getRecentBlog();
			$this->data['blogcategories'] = Blogcategory::getAllBlogCategories();
			$this->__load('EnakUnik | blog', 'blog');
		}

		public function blogcat($cid) {
			$this->data['blogs'] = Blog::getBlogByCat($cid);
			$this->data['blogcategories'] = Blogcategory::getAllBlogCategories();
			$this->__load('EnakUnik | blog', 'blog');
		}

		public function popularblog() {
			$this->data['blogs'] = Blog::getPopularBlog();
			$this->data['blogcategories'] = Blogcategory::getAllBlogCategories();
			$this->__load('EnakUnik | blog', 'blog');
		}

		public function faq() {
			$this->data['faqs'] = Faq::getAllFaq();
			$this->__load('EnakUnik | faq', 'faq');
		}

		public function menus($cid) {
			$this->data['pcategories'] = Category::getParentCategoriesWhereThereIsProduct();
			$this->data['scategories'] = Category::getSubCategoriesWhereThereIsProduct();
			if($cid == 0) {
				$this->data['state'] = 'main menu';
				$this->data['fproducts'] = Product::getMainFeature();
				$this->data['nproducts'] = Product::getNewest();
				$this->data['rproducts'] = Product::getRecommended();
			}
			else {	
				$this->data['state'] = 'category';
				$category = Category::getCategory($cid);
				$this->data['tcat'] = $category->name;
				$this->data['products'] = Product::getProductsByCategory($cid);
			}
			
			$this->__load("EnakUnik | menus", 'menus');
		}

		public function search() {
			$term = $this->input->post('term');
			$this->data['category'] = "$term";
			$this->data['products'] = Product::search($term);
			$this->__load("Fanasa | Search results", 'search');
		}

		public function product($id) {
			$this->data['pcategories'] = Category::getParentCategoriesWhereThereIsProduct();
			$this->data['scategories'] = Category::getSubCategoriesWhereThereIsProduct();
			$product = Product:: getProduct($id);
			$this->data['product'] = $product;
			$this->__load("EnakUnik | ".$product->name, 'product');
		}

		public function cart($productid) {
			if($productid > 0) {
				$fullproduct = Product::getProduct($productid);
				Order::updateCart($productid, $fullproduct);
				$_SESSION['cartct']++;
				redirect(site_url()."/home/product/".$productid, 'refresh');
			} else {
				$this->__load("EnakUnik | Shopping Cart", 'cart');
			}
		}

		public function ajax_cart() {
			return Order::updateCartAjax($this->input->post('ids'));
		}

		public function ajax_cart_remove() {
			return Order::removeLineItem($this->input->post('id'));
		}

		public function cart_destroy() {
			session_destroy();
			redirect(site_url()."/home");
		}

		public function form() {
			$this->__load("EnakUnik | Checkout", 'form');
		}

		public function payment() {
			if($_SESSION['cartct'] == 0) {
				redirect(site_url(), 'refresh');
			}
			Order::addOrder($this->input->post('order'));
			$message = $this->load->view('invoice', '', true);
			$this->__send_email($_POST['email'], $message);
			session_destroy();
			$_SESSION['cartct'] = 0;
			$this->__load("EnakUnik | Payment", 'payment');
		}

		public function __send_email($email, $message) {
			$this->email->set_newline("\r\n");
			$this->email->from('numan.naufal@numannaufal.com', 'Numan');
			$this->email->to($email); 
			$this->email->subject('EnakUnik - Invoice');
			$this->email->message($message);
			$this->email->send();
			if($this->email->send()) {
				//echo "email sent to $email";
			} else {
				show_error($this->email->print_debugger());
			}
		}
	}
 ?>