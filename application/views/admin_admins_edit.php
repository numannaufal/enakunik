<h1><?php echo $title ?></h1>
<?php echo form_open(site_url()."/admin/admins/edit/".$admin->id) ?>

<p>
	<label for="uname">Username</label><br>
	<?php $data = array('name' => 'username', 'id'=>'uname', 'size'=>25, 'value'=>$admin->username);
	echo form_input($data) ?>
</p>

<p>
	<label for="email">Email</label><br>
	<?php $data = array('name' => 'email', 'id'=>'email', 'size'=>50, 'value'=>$admin->email);
	echo form_input($data) ?>
</p>

<p>
	<label for="pw">Password</label><br>
	<?php $data = array('name' => 'password', 'id'=>'pw', 'size'=>25, 'value'=>$admin->password);
	echo form_password($data) ?>
</p>

<p>
	<label for="staus">Status</label><br>
	<select name="status" id="">
		<option value="admin" selected>admin</option>
	</select>
</p>


<?php echo form_submit('submit', 'edit admin') ?>
<?php echo form_close() ?>



