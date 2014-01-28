<h1><?php echo $title ?></h1>

<?php echo form_open(site_url()."/admin/categories/create") ?>

<p>
	<label for="catname">Name</label><br>
	<?php $data = array("name"=>"category[name]", 'id'=>'catname', 'size'=>25);
	echo form_input($data) ?>
</p>

<p>
	<label for="parent">Category Parent</label><br>
	<select name="category[parent_id]" id="">
		<option value="null">parent</option>
		<?php foreach ($categories as $category ): ?>
			<option value=" <?php echo $category->id ?> "><?php echo $category->name ?></option>
		<?php endforeach ?>
	</select>
</p>

<?php echo form_submit('submit', 'create category') ?>
<?php echo form_close() ?>