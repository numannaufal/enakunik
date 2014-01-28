<h1><?php echo $title ?></h1>
<!--?php echo form_open_multipart(site_url()."/admin/products/create") ?-->
<form action="<?php echo site_url().'/admin/products/create' ?>" method="post" enctype="multipart/form-data">
<p>
	<label>Category</label><br>
	<select name="product[category_id]">
		<option selected disabled value="null">Select Category</option>
		<?php foreach ($pcategories as $pcategory): ?>
			<option style="color:red;"value="" disabled><?php echo $pcategory->name ?></option>
			<?php foreach ($scategories as $scategory): ?>
				<?php if ($scategory->parent_id == $pcategory->id): ?>
					<option value="<?php echo $scategory->id ?>"><?php echo "&nbsp&nbsp&nbsp".$scategory->name ?></option>
				<?php endif ?>
			<?php endforeach ?>
		<?php endforeach ?>
	</select>
</p>

<p>
	<label>Name</label><br>
	<?php $data = array('name'=>"product[name]", 'size'=>13); 
	echo form_input($data) ?>
</p>

<p>
	<label>Price</label><br>
	<?php $data = array('name'=>"product[price]", 'size'=>25); 
	echo form_input($data) ?>
</p>

<p>
	<label>Description</label><br>
	<?php $data = array('name'=>"product[description]", 'rows'=>5, 'cols'=>40); 
	echo form_textarea($data) ?>
</p>
 
<p>
	<label>Upload Image</label><br>
	<input name="product_image" class="input-block-level" type="file">
</p>

<p>
	<label>Upload Image</label><br>
	<input name="product_image2" class="input-block-level" type="file">
</p>
<p>
	<label>Upload Image</label><br>
	<input name="product_image3" class="input-block-level" type="file">
</p>
<p>
	<label>Upload Image</label><br>
	<input name="product_image4" class="input-block-level" type="file">
</p>
<p>
	<label>Status</label><br>
	<select name="product[status]">
		<option value="available" select>Available</option>
		<option value="soldout">Sold Out</option>
	</select>
</p>

<p>
	<label>Favourited?</label><br>
	 <select name="product[featured]" >
	 	<option value="true">true</option>
	 	<option value="false">false</option>
	 </select>
</p>

<p>
	<label>Recommended?</label><br>
	 <select name="product[recommended]" >
	 	<option value="true">true</option>
	 	<option value="false">false</option>
	 </select>
</p>

<p>
	<label>variant</label><br>
	<?php $data = array('name'=>"product[variant]", 'size'=>25); 
	echo form_input($data) ?>
</p>

<p>
	<label>lama pengiriman</label><br>
	<?php $data = array('name'=>"product[shipping]", 'size'=>25); 
	echo form_input($data) ?>
</p>

<p>
	<label>jangkauan pengiriman</label><br>
	<?php $data = array('name'=>"product[jangkauan]", 'size'=>25); 
	echo form_input($data) ?>
</p>

<p>
	<label>minimum order</label><br>
	<?php $data = array('name'=>"product[minorder]", 'size'=>25); 
	echo form_input($data) ?>
</p>

<p>
	<label>kadaluarsa</label><br>
	<?php $data = array('name'=>"product[kadaluarsa]", 'size'=>25); 
	echo form_input($data) ?>
</p>

<p>
	<label>berat & volume</label><br>
	<?php $data = array('name'=>"product[beratvolume]", 'size'=>25); 
	echo form_input($data) ?>
</p>

<p>
	<label for="long">Ingredients</label><br>
	<?php $data = array('name'=>"product[ingredients]", 'rows'=>5, 'cols'=>40); 
	echo form_textarea($data) ?>
</p>
<?php echo form_submit('submit', 'create product') ?>

</form>