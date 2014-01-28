<link rel="stylesheet" href="<?php echo base_url().'/assets/css/flexslider.css' ?>" type="text/css" media="screen" />
<script src="<?php echo base_url().'/assets/js/modernizr.js' ?>"></script>


<section class="menu-detail">
	<?php $counter = 0 ?>
	<?php foreach ($pcategories as $pcategory): ?>
		<?php if ($counter % 3 == 0): ?>
			<div class="row">
		<?php endif ?>	
		<div class="span4">
			<ul>
				<a href="<?php echo site_url().'/home/menus/'.$pcategory->id ?>"><h3><?php echo $pcategory->name ?></h3></a>
				<?php foreach ($scategories as $scategory): ?>
					<?php if ($scategory->parent_id == $pcategory->id): ?>
						<li><a href="<?php echo site_url().'/home/menus/'.$scategory->id ?>"><?php echo $scategory->name ?></a></li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</div>
		<?php $counter++ ?>
		<?php if ($counter % 3 == 0): ?>
		</div>
		<?php endif ?>
	<?php endforeach ?>
</section>

<section class="content">
	<div class="row">
		<div class="span12">
			<h2><?php echo $product->name ?></h2>
			<hr>
		</div>
	</div>
	<?php if($this->session->flashdata('conf_msg')) : ?>
		<div class="row">
			<div class="span12">
				<p class='alert alert-success'><?php echo $this->session->flashdata('conf_msg')?></p>
			</div>
		</div>
 	<?php endif ?>
	
	<div class="row">
		<div class="span6">
			<div class="product-detail">
				<h2><?php echo $product->name ?></h2>
				<h3>Rp <?php echo number_format($product->price, 0, '.', '.') ?></h3>
				<h4><?php echo $product->variant ?></h4>
				<?php if ($product->description != null): ?>
					<h5>Deskripsi</h5>
					<p><?php echo $product->description ?></p>
				<?php endif ?>
				<?php if ($product->shipping != null): ?>
					<h5>Hari pengiriman</h5>
					<p><?php echo $product->shipping ?></p>
				<?php endif ?>
				<?php if ($product->jangkauan!= null): ?>
					<h5>Jangkauan pesanan</h5>
					<p><?php echo $product->jangkauan ?></p>
				<?php endif ?>
				<?php if ($product->minorder != null): ?>
					<h5>Minimum order</h5>
					<p><?php echo $product->minorder ?></p>
				<?php endif ?>
				<?php if ($product->kadaluarsa != null): ?>
					<h5>Kadaluarsa</h5>
					<p><?php echo $product->kadaluarsa ?></p>
				<?php endif ?>
				<?php if ($product->beratvolume != null): ?>
					<h5>Berat & Volume</h5>
					<p><?php echo $product->beratvolume ?></p>
				<?php endif ?>
				<?php if ($product->ingredients != null): ?>
					<h5>Ingredients</h5>
					<p><?php echo $product->ingredients ?></p>
				<?php endif ?>		
			</div>
		</div>
		<div class="span6">
			<div class="flexslider" style="width:400px;">
			  <ul class="slides">
			  	<?php if ($product->image != null): ?>
			  		<li data-thumb="<?php echo $product->image_url() ?>">
				      <img  src="<?php echo $product->image_url() ?>" />
				    </li>
			  	<?php endif ?>
			  	<?php if ($product->image2 != null): ?>
			  		<li data-thumb="<?php echo $product->image_url2() ?>">
				      <img src="<?php echo $product->image_url2() ?>" />
				    </li>
			  	<?php endif ?>
			  	<?php if ($product->image3 != null): ?>
			  		<li data-thumb="<?php echo $product->image_url3() ?>">
				      <img src="<?php echo $product->image_url3() ?>" />
				    </li>
			  	<?php endif ?>
			  	<?php if ($product->image4 != null): ?>
			  		<li data-thumb="<?php echo $product->image_url4() ?>">
				      <img src="<?php echo $product->image_url4() ?>" />
				    </li>
			  	<?php endif ?>
			  </ul>
			</div>
			<a  href="<?php echo site_url().'/home/cart/'.$product->id ?>" class='chart-button'>add to chart</a>
		</div>
	</div>

	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

	  <!-- FlexSlider -->
	  <script defer src="<?php echo base_url().'/assets/js/jquery.flexslider.js' ?>"></script>
	  <script type="text/javascript">
	    $(function(){
	      SyntaxHighlighter.all();
	    });
	    $(window).load(function(){
	      $('.flexslider').flexslider({
	        animation: "slide",
	        controlNav: "thumbnails",
	        start: function(slider){
	          $('body').removeClass('loading');
	        }
	      });
	    });
	  </script>
</section>