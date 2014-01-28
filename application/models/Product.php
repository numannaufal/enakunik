<?php 
	class Product extends ActiveRecord\Model {

		# menemukan produk berdasarkan id
		public function getProduct($id) {
			return Product::find($id);
		}

		# menemukan semua produk
		public function getAllProducts() {
			return Product::find('all');
		}

		# featured product
		public function getMainFeature() {
			$query = array(
				'conditions'=> "featured = 'true' and status = 'available'",
				'order' => 'rand()',
				'limit' => 3
				);
			return Product::find('all', $query);
		}

		public function getRecommended() {
			$query = array(
				'conditions'=> "recommended = 'true' and status = 'available'",
				'order' => 'rand()',
				'limit' => 3
				);
			return Product::find('all', $query);
		}

		# newest product
		public function getNewest() {
			$query = array(
				'conditions'=> "status = 'available'",
				'order' => 'created_at desc',
				'limit' => 3
				);
			return Product::find('all', $query);
		}

		# random produk
		public function getRandomProducts($limit, $skip) {
			$query = array(
				'conditions' => "id != $skip and status = 'available'",
				'order' => 'category_id asc',
				'limit' => $limit,
				'order' => 'rand()'
				);
			return Product::find('all', $query);
		}

		# return url image produk
		public function image_url() {
			if($this->image)
				return base_url('uploads/product/'.$this->id. '/' . $this->image);
			else
				return FALSE;
		}

		public function image_url2() {
			if($this->image)
				return base_url('uploads/product/'.$this->id. '/' . $this->image2);
			else
				return FALSE;
		}

		public function image_url3() {
			if($this->image)
				return base_url('uploads/product/'.$this->id. '/' . $this->image3);
			else
				return FALSE;
		}

		public function image_url4() {
			if($this->image)
				return base_url('uploads/product/'.$this->id. '/' . $this->image4);
			else
				return FALSE;
		}

		# mendapatkan produk dari id kategori
		public function getProductsByCategory($cid) {
			$cat = Category::getCategory($cid);
			if($cat->parent_id == 0) {
				return Product::find_by_sql("
				select *
				from products
				where status='available' and
					category_id in (
					select id
					from categories
					where parent_id = $cid)
				");
				return Product::find('all', $query);
			} else {
				$query = array(
				'conditions' => "category_id = $cid and status = 'available'",
				'order' => 'name asc'
				);
				return Product::find('all', $query);
			}
		}

		# produk yang bersesuaian
		public function getProductsByGroup($limit, $group, $skip) {
			$query = array(
				'conditions' => "grouping = '$group' and status ='available' and id != '$skip'",
				'order' => 'rand()',
				'limit' =>  $limit
				);
			return Product::find('all', $query);
		}

		# search produk
		public function search($term) {
			$query = array(
				"conditions" => "
					name like '%$term%' or
					description like'%$term%' and
					status = 'available'",
				"order" => 'name asc',
				"limit" => 50
				);
			return Product::find('all', $query);
		}


		public function getProductByParentMenus($id) {
			return Product::find_by_sql("
				select *
				from products
				where category_id in (
					select id
					from categories
					where parent_id = $id)
				");
		}

		# produk-produk dari parent
		public function getProductByParent($cid) {
			return Product::find_by_sql("
				select p.id, p.name, p.shortdesc, p.image, p.price
				from products as p, categories as c
				where category_id = c.id and
				parent_id = $cid;
				");
		}
# add
		public function addProduct($data) {
			$product = new Product($data);
			if ($product->save()) {
				if($product->upload_image('create') && $product->upload_image2('create') && $product->upload_image3('create') && $product->upload_image4('create')) {
					$product->save();
				}
			}
		}


		# edit
		public function editProduct($id) {
			$product = Product::getProduct($id);
			$product->update_attributes($this->input->post('product'));
			if ($product->save()) {
				if($product->upload_image('edit') && $product->upload_image2('edit') && $product->upload_image3('edit') && $product->upload_image4('edit')) {
					$product->save();
				} else {
					echo "gagal"; exit;
				}
			}
		}

		# upload, bila create->tidak menghapus file
		public function upload_image($status) {
			$CI =& get_instance();
			$CI->load->library('upload');		
			if(isset($_FILES['product_image']['size']) && $_FILES['product_image']['size'] > 0) {
				$target_dir = getcwd().'/uploads/product/'.$this->id;
				if(!file_exists($target_dir))
					mkdir($target_dir);

				
				$config['upload_path'] = './uploads/product/'.$this->id.'/';
				$config['allowed_types'] = 'gif|png|jpg|bmp';
				$config['max_size'] = '1000000';
				$config['max_width'] = '20480';
				$config['max_size'] = '15360';			
				$CI->upload->initialize($config);
				
				if($status != 'create')  {
					$this->delete_uploaded_image();
				}

				if($CI->upload->do_upload('product_image')) {
					$upload_data = $CI->upload->data();
					$this->image = $upload_data['file_name'];
					return true;
			
				} else {
					echo $this->upload->display_errors();
					echo "gagal1"; exit;
					return false;
				}
			} return true;
		}


		public function upload_image2($status) {
			$CI =& get_instance();
			$CI->load->library('upload');			
			if(isset($_FILES['product_image2']['size']) && $_FILES['product_image2']['size'] > 0) {
				$target_dir = getcwd().'/uploads/product/'.$this->id;
				if(!file_exists($target_dir))
					mkdir($target_dir);

				$config['upload_path'] = './uploads/product/'.$this->id.'/';
				$config['allowed_types'] = 'gif|png|jpg|bmp';
				$config['max_size'] = '1000000';
				$config['max_width'] = '20480';
				$config['max_size'] = '15360';
				$CI->upload->initialize($config);

				if($status != 'create')  {
					$this->delete_uploaded_image2();
				}

				if($CI->upload->do_upload('product_image2')) {
					$upload_data = $CI->upload->data();
					$this->image2 = $upload_data['file_name'];
					return true;
			
				} else {
					echo $this->upload->display_errors();
					echo "gagal2"; exit;
					return false;
				}
			}
			return true;
		}

		public function upload_image3($status) {
			$CI =& get_instance();
			$CI->load->library('upload');			
			if(isset($_FILES['product_image3']['size']) && $_FILES['product_image3']['size'] > 0) {
				$target_dir = getcwd().'/uploads/product/'.$this->id;
				if(!file_exists($target_dir))
					mkdir($target_dir);

				$config['upload_path'] = './uploads/product/'.$this->id.'/';
				$config['allowed_types'] = 'gif|png|jpg|bmp';
				$config['max_size'] = '1000000';
				$config['max_width'] = '20480';
				$config['max_size'] = '15360';
				$CI->upload->initialize($config);

				if($status != 'create')  {
					$this->delete_uploaded_image3();
				}

				if($CI->upload->do_upload('product_image3')) {
					$upload_data = $CI->upload->data();
					$this->image3 = $upload_data['file_name'];
					return true;
			
				} else {
					echo $this->upload->display_errors();
					echo "gagal3"; exit;
					return false;
				}
			}
			return true;
		}

		public function upload_image4($status) {
			$CI =& get_instance();
			$CI->load->library('upload');			
			if(isset($_FILES['product_image4']['size']) && $_FILES['product_image4']['size'] > 0) {
				$target_dir = getcwd().'/uploads/product/'.$this->id;
				if(!file_exists($target_dir))
					mkdir($target_dir);

				$config['upload_path'] = './uploads/product/'.$this->id.'/';
				$config['allowed_types'] = 'gif|png|jpg|bmp';
				$config['max_size'] = '1000000';
				$config['max_width'] = '20480';
				$config['max_size'] = '15360';
				$CI->upload->initialize($config);

				if($status != 'create')  {
					$this->delete_uploaded_image4();
				}

				if($CI->upload->do_upload('product_image4')) {
					$upload_data = $CI->upload->data();
					$this->image4 = $upload_data['file_name'];
					return true;
			
				} else {
					echo $this->upload->display_errors();
					echo "gagal4"; exit;
					return false;
				}
			}
			return true;
		}
		# hapus image ketika edit product
		public function delete_uploaded_image() {
			$full_path = getcwd().'/uploads/product/'.$this->id.'/'.$this->image;
			if(isset($this->image) && file_exists($full_path))
				unlink($full_path);
		}

		public function delete_uploaded_image2() {
			$full_path = getcwd().'/uploads/product/'.$this->id.'/'.$this->image2;
			if(isset($this->image) && file_exists($full_path))
				unlink($full_path);
		}

		public function delete_uploaded_image3() {
			$full_path = getcwd().'/uploads/product/'.$this->id.'/'.$this->image3;
			if(isset($this->image) && file_exists($full_path))
				unlink($full_path);
		}

		public function delete_uploaded_image4() {
			$full_path = getcwd().'/uploads/product/'.$this->id.'/'.$this->image4;
			if(isset($this->image) && file_exists($full_path))
				unlink($full_path);
		}


		# hapus image sekaligus folder ketika menghapus product
		public function delete_uploaded_folder() {
			$folder_path = getcwd().'/uploads/product/'.$this->id;
			$full_path = getcwd().'/uploads/product/'.$this->id.'/'.$this->image;
			$full_path2 = getcwd().'/uploads/product/'.$this->id.'/'.$this->image2;
			$full_path3 = getcwd().'/uploads/product/'.$this->id.'/'.$this->image3;
			$full_path4 = getcwd().'/uploads/product/'.$this->id.'/'.$this->image4;
			if(isset($this->image) && file_exists($full_path)) {
				unlink($full_path);
			}
			if(isset($this->image2) && file_exists($full_path2)) {
				unlink($full_path2);
			}
			if(isset($this->image3) && file_exists($full_path3)) {
				unlink($full_path3);
			}
			if(isset($this->image4) && file_exists($full_path4)) {
				unlink($full_path4);
			}
			rmdir($folder_path);
		}

		# delete product
		public function deleteProduct($id) {
			$product = Product::getProduct($id);
			$product->delete_uploaded_folder();
			$product->delete();
		}

	}

 ?>