<h1><?php echo $title ?></h1>

<style type='text/css'>
	h5 { margin:0; }
	p { margin: 5px 0; }
</style>

<form action="<?php echo site_url()."/admin/messages/edit/".$message->id ?>" method="post">
	<h5>Nama</h5>
	<p><?php echo $message->name ?></p>
	<h5>Email</h5>
	<p><?php echo $message->email ?></p>
	<h5>Phone</h5>
	<p><?php echo $message->phone?></p>
	<h5>Address</h5>
	<p><?php echo $message->address ?></p>
	<h5>message</h5>
	<p><?php echo $message->mail ?></p>
	<br><br>
</form>
