<?php 
	class Cartitem extends ActiveRecord\Model {

		public function getAllItem() {
			return CartItem::find('all');
		}

		public function getAllItemWithDetails($id) {
			return CartItem::find_by_sql("
				select name, qty, price, sum(qty*price) as total
				from products, cartitems
				where name = product_name and
				order_id = $id
				group by name;
				");
		}

		public function addItem($id) {
			$cart = $_SESSION['cart'];
			foreach($cart as $ct => $product) {
				$item = new Cartitem();	
				$item->order_id = $id;
				$item->product_name = $product['name'];
				$item->qty = $product['count']; 
				$item->save();			
			}
		}

	}
 ?>