<?php 
	class Message extends ActiveRecord\Model {

		public function getMessage($id) {
			return Message::find($id);
		}

		public function getAllMessages() {
			$query = array(
				'order' => 'created_at desc'
			);
			return Message::find('all', $query);
		}


		public function addMessage($data) {
			$message = new Message($data);
			$message->viewed = 'false';
			$message->save();
			$this->session->set_flashdata('message', "Your message is succesfully sent");
		}

		public function deletemessage($id) {
			$message = Message::getMessage($id);
			$message->delete();
		}

		public function editViewed($id) {
			$message = Message::getMessage($id);
			$message->viewed = 'true';
			$message->save();
		}
	}

 ?>