<h1><?php echo $title ?></h1>
<form name="blog" class="no-margin" action="<?php echo site_url().'/admin/blogs/create' ?>" method="post" enctype="multipart/form-data">
	<p><label>Title</label></p>
	<p><input type="text" name="blog[title]"></p><br>
	<p><label>Upload Image</label></p>
	<p><input name="blog_image" class="input-block-level" type="file"></p><br>
	<p><label>Paragraph</label></p>
	<p><textarea name="blog[paragraph]" cols="30" rows="10"></textarea></p><br>
	<p>
		<label>Category</label><br>
		<select name="blog[blogcat_id]">
			<option selected disabled value="null">Select Category</option>
			<?php foreach ($blogcategories as $blogcategory): ?>
				<option value="<?php echo $blogcategory->id ?>"><?php echo $blogcategory->name ?></option>
			<?php endforeach ?>
		</select>
	</p><br>
	<p>
	<label>Favourited?</label><br>
		 <select name="blog[popular]" >
		 	<option value="true">true</option>
		 	<option value="false">false</option>
		 </select>
	</p><br>
	<p><input type="submit"></p>
</form>