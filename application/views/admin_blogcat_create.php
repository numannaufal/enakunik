<h1><?php echo $title ?></h1>

<?php echo form_open(site_url()."/admin/blogcategories/create") ?>

<p>
	<label for="catname">Name</label><br>
	<?php $data = array("name"=>"blogcategory[name]", 'id'=>'catname', 'size'=>25);
	echo form_input($data) ?>
</p>

<?php echo form_submit('submit', 'create blogcategory') ?>
<?php echo form_close() ?>