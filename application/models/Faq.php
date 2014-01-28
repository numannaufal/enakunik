<?php 

class Faq extends ActiveRecord\Model {

	public function getAllFaq() {
		return Faq::find('all');
	}

	public function getFaq($id) {
		return Faq::find($id);
	}

	public function addFaq($data) {
		$faq = new Faq($data);
		$faq->save();
	}

	public function deleteFaq($id) {
		$faq = Faq::getFaq($id);
		$faq->delete();
	}

	public function updateFaq($id) {
		$faq = Faq::getFaq($id);
		$faq->update_attributes($this->input->post('faq'));
		$faq->save();
	}

}

 ?>