<!doctype html>
<html lang="en">
<head>
	<!-- 
		prototype.js berperan dalam membantu fungi update/delete cart menggunakan ajax
		$tittle membutuhkan passing dari controller
	-->
	<meta charset="UTF-8" />
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url() . '/assets/css/admin.css'; ?>">
	<script type="text/javascript" src="<?php echo base_url().'/assets/js/prototype.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'/assets/js/scriptaculous.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'/assets/js/customtools.js' ?>"></script>
</head>
<body>
	<!--
		View utama dari Claudia's Kidstore
		1. Header
		2. Nav
		4. Main
		4. Footer
		
		$this->load->view('parameter') berfungsi untuk menampilkan code yang berada di paremeter tersebut.
		c/o $this->load->view('header') menampilkan code header.php dalam folder view
		terdapat variabel yang dilempar dari controller, yaitu $main : $main bisa berubah-ubah,
		tergantung pada controller: bisa home, cart, produk, cat, dll

	-->
	<div id="wrapper">
		<div id="header">
			<?php $this->load->view('admin_header'); ?>
		</div>
		
		<div id="main">
			<?php $this->load->view($main); ?>
		</div>

		<div id="footer">
			<?php $this->load->view('admin_footer'); ?>
		</div>
	</div>
</body>
</html>
