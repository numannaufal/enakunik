<?php 
	class Order extends ActiveRecord\Model {

		public function getOrder($id) {
			return Order::find($id);
		}

		public function getAllOrders() {
			$query = array(
				'order' => 'created_at desc'
				);
			return Order::find('all', $query);
		}

		public function editOrder($id) {
			$order = Order::getOrder($id);
			$order->status = $_POST['status'];
			$order->save();
		}

		public function editViewed($id) {
			$order = Order::getOrder($id);
			$order->viewed = 'true';
			$order->save();
		}
		/*
			Menambah produk ke dalam cart
			super global array $_SESSION['cat']

			jika barang sudah ada :
			$_SESSION['cart']['pid']['name'] sama seperti sebelumnya
			$_SESSION['cart']['pid']['price'] sama seperti sebelumnya
			$_SESSION['cart']['pid']['count'] bertambah 1

			jika barang belum ada :
			inisialisasi baru

			looping untuk menghitung totalprice
			passing flash data
		*/
		public function updateCart($productid, $fullproduct) {
			$cart = $_SESSION['cart'];
			$totalprice = 0;
			if(count($fullproduct)) {
				if(isset($cart[$productid])) {
					$prevct = $cart[$productid]['count'];
					$prevname = $cart[$productid]['name'];
					$prevprice = $cart[$productid]['price'];
					$prevvariant = $cart[$productid]['variant'];

					$cart[$productid] = array(
						'name' => $prevname,
						'price' => $prevprice,
						'count' => $prevct +1,
						'variant' => $prevvariant
						);
				} else {
					$cart[$productid] = array(
						'name' => $fullproduct->name,
						'price' => $fullproduct->price,
						'variant' => $fullproduct->variant,
						'count' => 1
						);
				}

				$totalprice = 0;
				foreach($cart as $id => $product)
					$totalprice += $product['price'] * $product['count'];
				$_SESSION['totalprice'] = $totalprice;
				$_SESSION['cart'] = $cart;
				$this->session->set_flashdata('conf_msg', "We've added this product to your cart.");
			}
		}

		/*
			UpdateCart
			menerima passing parameter : $idlist => ids=id:angka, id2:angka2,
		*/
		public function updateCartAjax($idlist) {
			$cart = $_SESSION['cart'];
			$records = explode(',', $idlist);
			$updated = 0;
			$totalprice = $_SESSION['totalprice'];
			if(count($records)) {
				foreach($records as $record) {
					if(strlen($record)) {
						$fields = explode(":", $record);
						$id = $fields[0];
						$ct = $fields[1];
						if($ct > 0 && $ct != $cart[$id]['count']) {
							$cart[$id]['count'] = $ct;
							$updated++;
						} elseif ($ct == 0) {
							unset($cart[$id]);
							$updated++;
						}
					}
				}
				if($updated) {
					$totalprice=0;
					$_SESSION['cartct'] = 0;
					foreach($cart as $id => $product) {
						$totalprice += $product['price']*$product['count'];
						$_SESSION['cartct'] += $product['count'];
						$_SESSION['totalprice'] = $totalprice;
						$_SESSION['cart'] = $cart;
					}
				} 
			} 
		}

		# menghapus produk dari cart
		public function removeLineItem($id) {
			$totalprice = 0;
			$cart = $_SESSION['cart'];
			$_SESSION['cartct'] = 0;
			if(isset($cart[$id])) {
				unset($cart[$id]);
				foreach($cart as $id => $product) {
					$totalprice += $product['price'] * $product['count'];
					$_SESSION['cartct'] += $product['count'];
				}
				$_SESSION['totalprice'] = $totalprice;
				$_SESSION['cart'] = $cart;
			} 
			if($_SESSION['cartct'] == 0) {
				session_destroy();
			}
		}

		public function addOrder($order) {
			$_SESSION['order']['name'] = $_POST['name'];
			$_SESSION['order']['email'] = $_POST['email'] ;
			$_SESSION['order']['phone'] = $_POST['phone'];
			$_SESSION['order']['address'] = $_POST['address'];
			$_SESSION['order']['shipping'] = 0;
			
			switch($_POST['shipping']) {
				case 'COD':
				$_SESSION['order']['shipping'] = 0;
				break;

				case 'Jabodetabek':
				$_SESSION['order']['shipping'] = 7000;
				break;

				case 'Pulau Jawa' :
				$_SESSION['order']['shipping'] = 9000;
				break;

				case 'Luar Jawa' :
				$_SESSION['order']['shipping'] = 1500;
				break;
			}			

			$_SESSION['totalprice'] += $_SESSION['order']['shipping'];
			$order = new Order();
			$order->name = $_POST['name'];
			$order->address = $_POST['address'];
			$order->phone = $_POST['phone'];
			$order->email = $_POST['email']; 
			$order->shipping = $_SESSION['order']['shipping'];
			$order->total = $_SESSION['totalprice'];
			$order->status = 'notyet';
			$order->viewed = 'false';
			$order->save();
			Cartitem::addItem($order->id);
		}	


		public function deleteOrder($id) {
			$order = Order::getOrder($id);
			$order->delete();
		}
	}
 ?>