<section class="content faq">
	<div class="row">
		<div class="span12">
			<h2>Frequently Ask Question</h2>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<?php foreach ($faqs as $faq): ?>
				<h4><?php echo $faq->question ?></h4>
				<p><?php echo $faq->answer ?></p><br>
			<?php endforeach ?>
		</div>
	</div>
</section>