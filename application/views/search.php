<section class="content product-list">
	<?php if (count($products)): ?>
		<div class="row">
			<div class="span12">
				<h2>Search results for <?php echo $category ?></h2>
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

	<?php else : ?>
		<div class="row">
			<div class="span12">
				<h2>No results for  <?php echo "'$category'" ?>.</h2>
			</div>
		</div>
	<?php endif ?>

</section>
