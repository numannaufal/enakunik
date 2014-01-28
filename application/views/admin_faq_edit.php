<h1><?php echo $title ?></h1>
<form class="no-margin" action="<?php echo site_url().'/admin/faqs/edit/'.$faq->id ?>" method="post">
	<p><label>Question</label></p>
	<p><input value="<?php echo $faq->question ?>" type="text" name="faq[question]"></p><br>
	<p><label>Answer</label></p>
	<p>
		<textarea name="faq[answer]" cols="30" rows="10"><?php echo $faq->answer ?>	</textarea>
	</p>
	<p><input type="submit"></p>
</form>