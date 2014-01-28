<h1><?php echo $title ?></h1>
<form class="no-margin" action="<?php echo site_url().'/admin/faqs/create' ?>" method="post">
	<p><label>Question</label></p>
	<p><input type="text" name="faq[question]"></p><br>
	<p><label>Answer</label></p>
	<p><textarea name="faq[answer]" cols="30" rows="10"></textarea></p>
	<p><input type="submit"></p>
</form>