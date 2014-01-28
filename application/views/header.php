<div class="row">
	<div class="span4">
		<img style="position:relative; top:7px;" src="<?php echo base_url().'/assets/img/logo_v2.png' ?>" alt="enak unik logo">
	</div>
	<div class="span4 offset2 headinfo">
		<p>
			<?php 
				$today = date("j F Y");
				echo $today;
			?>
		</p>
	
			<form action="<?php echo site_url().'/home/search' ?>" method="post">
			<input name="term" class="search" type="text">
			<input class="search-submit" type="submit" value="search">
		</form>
	
	</div>
	<div class="span2">
		<div class="cartnav"><a href="<?php echo site_url().'/home/cart/0' ?>">Cart(<?php echo $_SESSION['cartct']?>)</a></div>	
	</div>
</div>