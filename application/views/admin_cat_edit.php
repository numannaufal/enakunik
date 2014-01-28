<h1><?php echo $title ?></h1>

<?php echo form_open(site_url()."/admin/categories/edit/".$category->id) ?>

<p>
	<label for="catname">Name</label><br>
	<?php $data = array("name"=>"category[name]", 'id'=>'catname', 'size'=>25, 'value'=>$category->name);
	echo form_input($data) ?>
</p>

<p>
	<label for="parent">Category Parent</label><br>
	<select name="category[parent_id]" id="">
		<option value="null">parent</option>
		<?php foreach ($categories as $pcategory ): ?>
			<?php if($pcategory->id == $category->parent_id) : ?>
				<option selected value=" <?php echo $pcategory->id ?> "><?php echo $pcategory->name ?></option>
			<?php else : ?>
				<option value=" <?php echo $pcategory->id ?> "><?php echo $pcategory->name ?></option>
			<?php endif ?>
		<?php endforeach ?>
	</select>
</p>

<?php echo form_hidden('id', $category->id) ?>
<?php echo form_submit('submit', 'update category') ?>
<?php echo form_close() ?>