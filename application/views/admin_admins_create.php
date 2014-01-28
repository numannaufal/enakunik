<h1><?php echo $title ?></h1>

<form action=' <?php echo site_url()."/admin/admins/create" ?> ' method='post' name='admin'>

<p>
	<label for="uname">Username</label><br>
	<?php $data = array('name' => 'username', 'id'=>'uname', 'size'=>25);
	echo form_input($data) ?>
</p>

<p>
	<label for="email">Email</label><br>
	<?php $data = array('name' => 'email', 'id'=>'email', 'size'=>50);
	echo form_input($data) ?>
</p>

<p>
	<label for="pw">Password</label><br>
	<?php $data = array('name' => 'password', 'id'=>'pw', 'size'=>25);
	echo form_password($data) ?>
</p>

<p>
	<label for="staus">Status</label><br>
	<select name="status" id="">
		<option value="admin" selected>admin</option>
	</select>
</p>

<?php echo form_submit('submit', 'create admin') ?>

</form>


