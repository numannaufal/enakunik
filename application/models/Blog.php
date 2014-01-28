<?php 

class Blog extends ActiveRecord\Model {

	public function getAllBlog() {
		return Blog::find('all');
	}

	public function getBlog($id) {
		return Blog::find($id);
	}

	public function getBlogByCat($cid) {
		$query = array(
			'conditions' => "blogcat_id = $cid",
			'order' => 'created_at desc'
		);
		return Blog::find('all', $query);
	}

	public function getPopularBlog() {
		$query = array(
			'conditions' => "popular = 'true'",
			'order' => 'created_at desc'
		);
		return Blog::find('all', $query);
	}

	public function getRecentBlog() {
		$query = array(
			'order' => 'created_at desc',
			);
		return Blog::find('all', $query);
	}

	public function addBlog($data) {
		$blog = new Blog($data);
		if ($blog->save()) {
			if($blog->upload_image('create')) {
				$blog->save();
			}
		}
	}

	public function deleteBlog($id) {
		$blog = Blog::getBlog($id);
		$blog->delete_uploaded_folder();
		$blog->delete();
	}

	public function updateBlog($id) {
		$blog = Blog::getBlog($id);
		$blog->update_attributes($this->input->post('blog'));
		if ($blog->save()) {
			if($blog->upload_image('edit')) {
				$blog->save();
			}
		}
	}

	public function getNews() {
		$query = array('order' => 'created_at desc');
		return Blog::find('first', $query);
	}

	public function image_url() {
		if($this->image)
			return base_url('uploads/blog/'.$this->id. '/' . $this->image);
		else
			return FALSE;
	}

	public function upload_image($status) {
		$CI =& get_instance();
		$CI->load->library('upload');
		if(isset($_FILES['blog_image']['size']) && $_FILES['blog_image']['size'] > 0) {
			$target_dir = getcwd().'/uploads/blog/'.$this->id;
			if(!file_exists($target_dir)) 
				mkdir($target_dir);
			$config['upload_path'] = './uploads/blog/'.$this->id.'/';
			$config['allowed_types'] = 'gif|png|jpg|bmp';
			$config['max_size'] = '1000000';
			$config['max_width'] = '20480';
			$config['max_size'] = '15360';
			$CI->upload->initialize($config);

			if($status != 'create')  {
				$this->delete_uploaded_image();
			}
			
			if($CI->upload->do_upload('blog_image')) {
				$upload_data = $CI->upload->data();
				$this->image = $upload_data['file_name'];
				return true;
		
			} else {
				echo $this->upload->display_errors();
				return false;
			}
		} 
	}

	public function delete_uploaded_image() {
		$full_path = getcwd().'/uploads/blog/'.$this->id.'/'.$this->image;
		if(isset($this->image) && file_exists($full_path))
			unlink($full_path);
	}

	public function delete_uploaded_folder() {
		$folder_path = getcwd().'/uploads/blog/'.$this->id;
		$full_path = getcwd().'/uploads/blog/'.$this->id.'/'.$this->image;
		if(isset($this->image) && file_exists($full_path)) {
			unlink($full_path);
			rmdir($folder_path);
		}
	}
}

 ?>