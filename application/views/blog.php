<section class="content blog container-fluid">
	<div class="row-fluid">
		<h2>Blog</h2>
		<hr><br>
		<div class="span8">
			<?php $counter=1 ?>
			<?php foreach ($blogs as $blog): ?>
				<h4 id="<?php echo 'post'.$counter++ ?>"><?php echo $blog->title ?></h4>
				<?php if ($blog->image != null): ?>
					<img src=" <?php echo $blog->image_url() ?>" alt=""><br><br>
				<?php endif ?>
				<p><?php echo $blog->paragraph ?></p><br>
			<?php endforeach ?>	
		</div>
		<div class="span3">
			<br><br>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like-box" data-href="https://www.facebook.com/EnakUnik?ref=br_tf" data-width="292" data-show-faces="false" data-header="true" data-stream="false" data-show-border="true"></div>
			<br>
			<div class="twitter-box">
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="https://twitter.com/EnakUnik" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow EnakUnik</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<br><br>
			<div class="blog-side">
				<ul>Recent Post
					<?php $counter = 1 ?>
					<?php foreach ($blogs as $blog): ?>
						<li><a href="<?php echo '#post'.$counter++ ?>"><?php echo $blog->title ?></a></li>
						<?php if ($counter == 4): ?>
							<?php break; ?>
						<?php endif ?>
					<?php endforeach ?>
				</ul>

				<ul>Categories
					<?php foreach ($blogcategories as $bcat): ?>
						<li><a href="<?php echo site_url().'/home/blogcat/'.$bcat->id ?>"><?php echo $bcat->name ?></a></li>
					<?php endforeach ?>
				</ul>

				<ul>
					<a style="color:black;" href="<?php echo site_url().'/home/popularblog' ?>">Popular post</a>
				</ul>
			</div>
			
			
		</div>
	</div>
</section>