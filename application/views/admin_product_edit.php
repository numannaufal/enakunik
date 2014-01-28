<h1><?php echo $title ?></h1>
<!--?php echo form_open_multipart(site_url()."/admin/products/create") ?-->
<form action="<?php echo site_url().'/admin/products/edit/'.$product->id ?>" method="post" enctype="multipart/form-data">
<p>
	<label>Category</label><br>
	<select name="product[category_id]">
		<option selected disabled value="null">Select Category</option>
		<?php foreach ($pcategories as $pcategory): ?>
			<option style="color:red;"value="" disabled><?php echo $pcategory->name ?></option>
			<?php foreach ($scategories as $scategory): ?>
				<?php if ($scategory->parent_id == $pcategory->id): ?>
					<option 
					<?php if ($product->category_id == $scategory->id): ?>
						<?php echo "selected" ?>
					<?php endif ?>
					value="<?php echo $scategory->id ?>" ><?php echo "&nbsp&nbsp&nbsp".$scategory->name ?></option>
				<?php endif ?>
			<?php endforeach ?>
		<?php endforeach ?>
	</select>
</p>

<p>
	<label>Name</label><br>
	<?php $data = array('name'=>"product[name]", 'size'=>13, 'value'=>$product->name); 
	echo form_input($data) ?>
</p>

<p>
	<label>Price</label><br>
	<?php $data = array('name'=>"product[price]", 'size'=>25, 'value'=>$product->price); 
	echo form_input($data) ?>
</p>

<p>
	<label>Description</label><br>
	<?php $data = array('name'=>"product[description]", 'rows'=>5, 'cols'=>40, 'value'=>$product->description); 
	echo form_textarea($data) ?>
</p>
 
<p>	
	<img src=" <?php echo $product->image_url() ?>" alt="product image" style="max-height:1000px; max-width:1000px"><br>
	<label>Upload Image</label><br>
	<input name="product_image" class="input-block-level" type="file">
</p>

<p>	
	<img src=" <?php echo $product->image_url2() ?>" alt="product image" style="max-height:1000px; max-width:1000px"><br>
	<label>Upload Image</label><br>
	<input name="product_image2" class="input-block-level" type="file">
</p>

<p>	
	<img src=" <?php echo $product->image_url3() ?>" alt="product image" style="max-height:1000px; max-width:1000px"><br>
	<label>Upload Image</label><br>
	<input name="product_image3" class="input-block-level" type="file">
</p>

<p>	
	<img src=" <?php echo $product->image_url4() ?>" alt="product image" style="max-height:1000px; max-width:1000px"><br>
	<label>Upload Image</label><br>
	<input name="product_image4" class="input-block-level" type="file">
</p>

<p>
	<label>Status</label><br>
	<select name="product[status]">
		<?php if ($product->status == "available"): ?>
			<option value="available" selected>Available</option>
			<option value="soldout">Sold Out</option>
		<?php else: ?>
			<option value="available">Available</option>
			<option value="soldout" selected>Sold Out</option>
		<?php endif ?>
		
	</select>
</p>

<p>
	<label>Featured?</label><br>
	 <select name="product[featured]" >
	 	<?php if ($product->featured == "true"): ?>
			<option value="true" selected>true</option>
	 		<option value="false">false</option>
		<?php else: ?>
			<option value="true">true</option>
	 		<option value="false" selected>false</option>
		<?php endif ?>
	 	
	 </select>
</p>

<p>
	<label>Recommended?</label><br>
	 <select name="product[recommended]" >
	 	<?php if ($product->recommended == "true"): ?>
			<option value="true" selected>true</option>
	 		<option value="false">false</option>
		<?php else: ?>
			<option value="true">true</option>
	 		<option value="false" selected>false</option>
		<?php endif ?>
	 	
	 </select>
</p>

<p>
	<label>variant</label><br>
	<?php $data = array('name'=>"product[variant]", 'size'=>25, 'value'=>$product->variant); 
	echo form_input($data) ?>
</p>

<p>
	<label>lama pengiriman</label><br>
	<?php $data = array('name'=>"product[shipping]", 'size'=>25, 'value'=>$product->shipping); 
	echo form_input($data) ?>
</p>

<p>
	<label>jangkauan pengiriman</label><br>
	<?php $data = array('name'=>"product[jangkauan]", 'size'=>25, 'value'=>$product->jangkauan); 
	echo form_input($data) ?>
</p>

<p>
	<label>minimum order</label><br>
	<?php $data = array('name'=>"product[minorder]", 'size'=>25, 'value'=>$product->minorder); 
	echo form_input($data) ?>
</p>

<p>
	<label>kadaluarsa</label><br>
	<?php $data = array('name'=>"product[kadaluarsa]", 'size'=>25, 'value'=>$product->kadaluarsa); 
	echo form_input($data) ?>
</p>

<p>
	<label>berat & volume</label><br>
	<?php $data = array('name'=>"product[beratvolume]", 'size'=>25, 'value'=>$product->beratvolume); 
	echo form_input($data) ?>
</p>

<p>
	<label for="long">Ingredients</label><br>
	<?php $data = array('name'=>"product[ingredients]", 'rows'=>5, 'cols'=>40, 'value'=>$product->ingredients); 
	echo form_textarea($data) ?>
</p>
<?php echo form_submit('submit', 'edit product') ?>

</form>