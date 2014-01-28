<?php 

class Admin extends ActiveRecord\Model {

	# verifikasi
	public function verifyUser($u, $pw) {
		$pw = md5($pw);
		$query = array(
			'conditions' => "username = '$u' and password = '$pw'",
			'limit' => 1  
			);
		$admin = Admin::find('first', $query);
		if(isset($admin)) {
			$_SESSION['userid'] = $admin->id;
			$_SESSION['username'] = $admin->username;
		} else 
			$this->session->set_flashdata('message', 'Sorry, your username or password is incorrect!');
	}

	# semua user
	public function getAllUsers() {
		return Admin::find('all');
	}

	# user berdasarkan id
	public function getUser($id) {
		return Admin::find($id);
	}

	# menambah user
	public function addUser($data) {
		$user = new Admin();
		$user->username = $_POST['username'];
		$user->email = $_POST['email'];
		$user->status = $_POST['status'];
		$user->password = md5($_POST['password']);
		$user->save();
	}

	# edit
	public function editUser($id) {
		$user = Admin::getUser($id);
		$user->username = $_POST['username'];
		$user->email = $_POST['email'];
		$user->status = $_POST['status'];
		$user->password = md5($_POST['password']);
		$user->save();
	}

	#delete
	public function deleteUser($id) {
		$user = Admin::getUser($id);
		$user_id = $user->id;
		$user->delete();
		if($user_id == $_SESSION['userid']) {
			redirect('admin/login', 'refresh');
			exit;
		}
	}
	
}

 ?>