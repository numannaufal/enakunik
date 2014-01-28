<?php 
	class Blogcategory extends ActiveRecord\Model {

		public function getBlogCategory($id) {
			return Blogcategory::find($id);
		}

		public function getAllBlogCategories() {
			return Blogcategory::find('all');
		}


		public function addBlogCategory($data) {
			$blogCategory = new Blogcategory($data);
			$blogCategory->save();
		}

		public function updateBlogCategory($id) {
			$blogCategory = Blogcategory::getBlogCategory($id);
			$blogCategory->update_attributes($this->input->post('blogCategory'));
			$blogCategory->save();
		} 

		public function deleteBlogCategory($id) {
			$blogCategory = Blogcategory::getBlogCategory($id);
			$blogCategory->delete();
		}
	}

 ?>