<h1><?php echo $title ?></h1>
<form action="<?php echo site_url().'/admin/sliders/create' ?>" method="post" enctype="multipart/form-data">
<p>
	<label>Name</label><br>
	<?php $data = array('name'=>"slider[name]", 'size'=>13); 
	echo form_input($data) ?>
</p>
<p>
	<label>Upload Image</label><br>
	<input name="slider_image" class="input-block-level" type="file">
</p>

<?php echo form_submit('submit', 'create slider') ?>

</form>