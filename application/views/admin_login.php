<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<title>EnakUnik| Admin Login</title>
	<link rel="stylesheet" href=" <?php echo base_url().'/assets/css/normalize.min.css' ?>">
	<link rel="stylesheet" href=" <?php echo base_url().'/assets/css/bootstrap.css' ?>">
	<link rel="stylesheet" href=" <?php echo base_url().'/assets/css/enakunik.css' ?>">
	<style type="text/css">
		.modal-login {
			width: 320px;
			margin-left: -160px;
		 }
		 .modal-login .modal-header {
		 	background-position: 0% 0%;
		 	background-size: 30%;
		 }
	</style>
	</head>
	<body>
		<div id="myModal" class="modal modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
	  			<div class="modal-header">
	   		   		 <h3 id="myModalLabel">Admin Login</h3>
				</div>
				<div class="modal-body">
				<form method='post' action=" <?php echo site_url().'/admin/login' ?>">
					<label for="">Username</label>
					<input class="input-block-level" type="text" name="username" id="">
					<label for="">Password</label>
					<input class="input-block-level" type="password" name="password" id="">
					<?php if($this->session->flashdata('message')) : ?>
						<div class="alert alert-error">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Warning!</strong> <?php echo $this->session->flashdata('message') ?>
						</div>
				    </div>
					<?php endif ?>
			     	<div class="modal-footer text-left">
			     		<a href="#" class="pull-left">Forgot Password</a>
				    	<input type="submit" class="btn btn-primary" value="Log in">
		  			</div>
	  			</form>
	  	</div>
	</body>
</html>