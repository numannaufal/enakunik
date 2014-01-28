	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src=" <?php echo base_url().'/assets/slider/jquery.bxslider.min.js' ?>"></script>
	<link href=" <?php echo base_url().'/assets/slider/jquery.bxslider.css' ?>" rel="stylesheet" />

	<script>
		$(document).ready(function(){
			 $('.bxslider').bxSlider({
			  auto: true,
			  mode: 'fade',
			  captions: true,
			  pause:4000
			});
		});
	</script>

<section class="home">
	<div class="row">
		<div class="span12">
			<ul class="bxslider">
			<?php foreach ($sliders as $slider): ?>
				<li><img  src="<?php echo $slider->image_url() ?>"/></li>
			<?php endforeach ?>	
			</ul>
		</div>
	</div>
</section>

<section class="content product-list">

		<div class="row">
			<div class="span12">
				<h2>Favourite Menus</h2>
				<hr>
			</div>
		</div>
		<?php $counter = 0 ?>
		<?php foreach ($fproducts as $fproduct): ?>
			<?php if ($counter % 3 == 0): ?>
				<div class="row">
			<?php endif ?>
			<div class="span4">
				<a href="<?php echo site_url().'/home/product/'.$fproduct->id ?>">
					<img width="200px" height="200px"src="<?php echo $fproduct->image_url() ?>" alt="product">
					<p><?php echo $fproduct->name ?></p>
					<p>Rp <?php echo number_format($fproduct->price, 0, '.', '.') ?></p>
				</a>	
			</div>
			<?php $counter++ ?>
			<?php if ($counter % 3 == 0): ?>
				</div>
			<?php endif ?>
		<?php endforeach ?>
		
		<div class="row">
			<div class="span12">
				<br>
				<h2>Recommended Menus</h2>
				<hr>
			</div>
		</div>
		<?php $counter = 0 ?>
		<?php foreach ($rproducts as $rproduct): ?>
			<?php if ($counter % 3 == 0): ?>
				<div class="row">
			<?php endif ?>
			<div class="span4">
				<a href="<?php echo site_url().'/home/product/'.$rproduct->id ?>">
					<img width="200px" height="200px"src="<?php echo $rproduct->image_url() ?>" alt="product">
					<p><?php echo $rproduct->name ?></p>
					<p>Rp <?php echo number_format($rproduct->price, 0, '.', '.') ?></p>
				</a>
			</div>
			<?php $counter++ ?>
			<?php if ($counter % 3 == 0): ?>
				</div>
			<?php endif ?>
		<?php endforeach ?>

		<div class="row">
			<div class="span12">
				<br>
				<h2>Newest Menus</h2>
				<hr>
			</div>
		</div>
		<?php $counter = 0 ?>
		<?php foreach ($nproducts as $nproduct): ?>
			<?php if ($counter % 3 == 0): ?>
				<div class="row">
			<?php endif ?>
			<div class="span4">
				<a href="<?php echo site_url().'/home/product/'.$nproduct->id ?>">
					<img width="200px" height="200px"src="<?php echo $nproduct->image_url() ?>" alt="product">
					<p><?php echo $nproduct->name ?></p>
					<p>Rp <?php echo number_format($nproduct->price, 0, '.', '.') ?></p>
				</a>
			</div>
			<?php $counter++ ?>
			<?php if ($counter % 3 == 0): ?>
				</div>
			<?php endif ?>
		<?php endforeach ?>
		
		<div class="row">
			<div class="span8 cupkabarunik">
				<br>
				<h2>Kabar Unik</h2>
				<hr>
				<p><?php echo $news->paragraph ?></p>
			</div>
			<div class="span4">
				<br><br>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like-box" data-href="https://www.facebook.com/EnakUnik?ref=br_tf" data-width="292" data-show-faces="false" data-header="true" data-stream="false" data-show-border="true"></div>
				<br>
				<div class="twitter-box">
					<a href="https://twitter.com/EnakUnik" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow EnakUnik</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
				
			</div>
		</div>
</section>