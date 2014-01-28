<h1><?php echo $title ?></h1>
<form class="no-margin" action="<?php echo site_url().'/admin/blogs/edit/'.$blog->id ?>" method="post" enctype="multipart/form-data">
	<p><label>Title</label></p>
	<p><input value="<?php echo $blog->title ?>" type="text" name="blog[title]"></p><br>
	<p><img src=" <?php echo $blog->image_url() ?>" alt=""></p>
	<p><label>Upload Image</label></p>
	<p><input name="blog_image" class="input-block-level" type="file"></p><br>
	<p><label>Paragraph</label></p>
	<p><textarea name="blog[paragraph]" cols="30" rows="10"><?php echo $blog->paragraph ?>	</textarea></p><br>
	<p>
		<label>Category</label><br>
		<select name="blog[blogcat_id]">
			<option disabled value="null">Select Category</option>
			<?php foreach ($blogcategories as $blogcategory): ?>
				<?php if ($blog->blogcat_id == $blogcategory->id): ?>
					<option selected value="<?php echo $blogcategory->id ?>"><?php echo $blogcategory->name ?></option>
				<?php else: ?>
					<option  value="<?php echo $blogcategory->id ?>"><?php echo $blogcategory->name ?></option>
				<?php endif ?>
				
			<?php endforeach ?>
		</select>
	</p><br>
	<label>Popular?</label><br>
		 <select name="blog[popular]" >
		 	<?php if ($blog->popular == 'true'): ?>
		 		<option selected value="true">true</option>
		 		<option value="false">false</option>
		 	<?php else: ?>
		 		<option value="true">true</option>
		 		<option selected value="false">false</option>
		 	<?php endif ?>
		 	
		 </select>
	</p><br>
	<p><input type="submit"></p>
</form>