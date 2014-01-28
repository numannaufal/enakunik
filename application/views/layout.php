<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href=" <?php echo base_url().'/assets/css/normalize.min.css' ?> ">
	<link rel="stylesheet" href=" <?php echo base_url().'/assets/css/bootstrap.css' ?> ">
	<link rel="stylesheet" href=" <?php echo base_url().'/assets/css/enakunik.css' ?> ">
	<link rel="icon" href=" <?php echo base_url().'/assets/img/fav.png' ?> " type="image/png">

</head>

<body>
	<header>
		<div class="header">
			<?php $this->load->view('header') ?>
		</div>
	</header>
	<div class="container">
		<nav>
			<?php $this->load->view('nav') ?>
		</nav>

			<?php $this->load->view($main) ?>
		
		<footer>
			<?php $this->load->view('footer') ?>
		</footer>
	</div>


	<!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script-->
	<?php if ($main == 'cart'): ?>
		<script type="text/javascript" src="<?php echo base_url().'/assets/js/prototype.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'/assets/js/scriptaculous.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'/assets/js/customtools.js' ?>"></script>
	<?php else: ?>
		<script>window.jQuery || document.write('<script src="http://localhost/project/fanasa/assets/js/jquery-1.10.1.min.js" ><\/script>')</script>
	<?php endif ?>
	<script src=" <?php echo base_url().'/assets/js/bootstrap.min.js' ?> "></script>
	<script src=" <?php echo base_url().'/assets/js/jquery.elevateZoom-2.5.5.min.js' ?> "> </script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src=" <?php echo base_url().'/assets/js/gmaps.js' ?> "> </script>
	<script src=" <?php echo base_url().'/assets/js/main.js' ?> "></script>
	
</body>
</html>