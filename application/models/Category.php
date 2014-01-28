<?php 
	class Category extends ActiveRecord\Model {

		# mendapatkan satu kategori
		public function getCategory($id) {
			return Category::find($id);
		}

		# mendapatkan semua kategori
		public function getAllCategories() {
			return Category::find('all');
		}

		# mendapatkan kategori yang akan ditampilkan di navigasi
		public function getParentCategories() {
			$query = array(
				'conditions' => "parent_id = 0",
				);
			return Category::find('all', $query);
			
		}

		# subkategori dari kategori yang dipilih
		public function getSubCategories($id) {
			$query = array(
				'conditions' => "parent_id = $id",
				'order' => 'name asc'
				);
			return Category::find('all', $query);
			
		}

		public function getParentCategoriesWhereThereIsProduct() {
			return Category::find_by_sql("
				select *
				from categories
				where id in 
				(select parent_id
				from categories
				where id in
				(select category_id
				from products
				where status = 'available'))
				");
		}

		public function getSubCategoriesWhereThereIsProduct() {
			return Category::find_by_sql("
				select *
				from categories
				where id in
				(select category_id
				from products
				where status = 'available')
				");
		}

		# kategori paling bawah
		public function getChildCategories() {
			$query = array(
				'conditions' => "parent_id != 0",
				'order' => 'name asc'
				);
			return Category::find('all', $query);
		}

		# add
		public function addCategory($data) {
			$category = new Category($data);
			$category->save();
		}

		# update
		public function updateCategory($id) {
			$category = Category::getCategory($id);
			$category->update_attributes($this->input->post('category'));
			$category->save();
		} 

		#delete
		public function deleteCategory($id) {
			$category = Category::getCategory($id);
			$category->delete();
		}
	}

 ?>