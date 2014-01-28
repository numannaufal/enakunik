<?php 
	class Slider extends ActiveRecord\Model {

		public function getSlider($id) {
			return Slider::find($id);
		}

		public function getAllSliders() {
			return Slider::find('all');
		}
		# return url image slider
		public function image_url() {
			if($this->image)
				return base_url('uploads/slider/'.$this->id. '/' . $this->image);
			else
				return FALSE;
		}

		public function addSlider($data) {
			$slider = new Slider($data);
			if ($slider->save()) {
				if($slider->upload_image()) {
					$slider->save();
				}
			}
		}

		public function upload_image() {
			$CI =& get_instance();
			$CI->load->library('upload');
			if(isset($_FILES['slider_image']['size']) && $_FILES['slider_image']['size'] > 0) {
				$target_dir = getcwd().'/uploads/slider/'.$this->id;
				if(!file_exists($target_dir))
					mkdir($target_dir);

				$config['upload_path'] = './uploads/slider/'.$this->id.'/';
				$config['allowed_types'] = 'gif|png|jpg|bmp';
				$config['max_size'] = '1000000';
				$config['max_width'] = '20480';
				$config['max_size'] = '15360';
				$CI->upload->initialize($config);

				if($CI->upload->do_upload('slider_image')) {
					$upload_data = $CI->upload->data();
					$this->image = $upload_data['file_name'];
					return true;
			
				} else {
					echo $this->upload->display_errors();
					return false;
				}
			}
		}

		# hapus image sekaligus folder ketika menghapus slider
		public function delete_uploaded_folder() {
			$folder_path = getcwd().'/uploads/slider/'.$this->id;
			$full_path = getcwd().'/uploads/slider/'.$this->id.'/'.$this->image;
			if(isset($this->image) && file_exists($full_path)) {
				unlink($full_path);
				rmdir($folder_path);
			}
		}

		# delete slider
		public function deleteSlider($id) {
			$Slider = Slider::getSlider($id);
			$Slider->delete_uploaded_folder();
			$Slider->delete();
		}

	}

 ?>