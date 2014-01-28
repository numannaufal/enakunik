<section class="menu container-fluid">
	<div class="row-fluid">
		<div class="span2 side">
			<?php foreach ($pcategories as $pcategory): ?>
				<ul>
					<a class="parent-cat" href="<?php echo site_url().'/home/menus/'.$pcategory->id ?>"><h4><?php echo $pcategory->name ?></h4></a>
					<?php foreach ($scategories as $scategory): ?>
						<?php if ($scategory->parent_id == $pcategory->id): ?>
							<li><a href="<?php echo site_url().'/home/menus/'.$scategory->id ?>"><?php echo $scategory->name ?></a></li>
						<?php endif ?>
					<?php endforeach ?>
				</ul>
			<?php endforeach ?>
		</div>
		<div class="span10 content product-list">
			<?php if ($state == 'main menu'): ?>
				<div class="row">
					<div class="span12">
						<h2>Favourited Menus</h2>
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
			<?php else: ?>
				<div class="row">
					<div class="span12">
						<h2><?php echo $tcat ?></h2>
						<hr>
					</div>
				</div>
				<?php $counter = 0 ?>
				<?php foreach ($products as $product): ?>
					<?php if ($counter % 3 == 0): ?>
						<div class="row">
					<?php endif ?>
					<div class="span4">
						<a href="<?php echo site_url().'/home/product/'.$product->id ?>">
							<img width="200px" height="200px"src="<?php echo $product->image_url() ?>" alt="product">
							<p><?php echo $product->name ?></p>
							<p>Rp <?php echo number_format($product->price, 0, '.', '.') ?></p>
						</a>	
					</div>
					<?php $counter++ ?>
					<?php if ($counter % 3 == 0): ?>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		</div>
		
	</div>
</section>
