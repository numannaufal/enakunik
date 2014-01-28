<div class="row">
	<div class="span12">
		<ul>
			<li <?php if ($main == 'home') echo 'style="background-color:#f99f1c;"'?>><a <?php if ($main == 'home') echo 'style="color:black; text-decoration:none;"'?> href="<?php echo site_url() ?>">HOME</a></li>			
			<li <?php if ($main == 'menus' || $main == 'product') echo 'style="background-color:#f99f1c;"'?>><a <?php if ($main == 'menus' || $main == 'product') echo 'style="color:black; text-decoration:none;"'?> href="<?php echo site_url().'/home/menus/0' ?>">MENUS</a></li>
			<li <?php if ($main == 'about') echo 'style="background-color:#f99f1c;"'?>><a <?php if ($main == 'about') echo 'style="color:black; text-decoration:none;"'?> href="<?php echo site_url().'/home/about' ?>">ABOUT US</a></li>
			<li <?php if ($main == 'contact') echo 'style="background-color:#f99f1c;"'?>><a <?php if ($main == 'contact') echo 'style="color:black; text-decoration:none;"'?> href="<?php echo site_url().'/home/contact' ?>">CONTACT</a></li>
			<li <?php if ($main == 'term') echo 'style="background-color:#f99f1c;"'?>><a <?php if ($main == 'term') echo 'style="color:black; text-decoration:none;"'?> href="<?php echo site_url().'/home/term' ?>">TERMS & CONDITIONS</a></li>
			<li <?php if ($main == 'blog') echo 'style="background-color:#f99f1c;"'?>><a <?php if ($main == 'term') echo 'style="color:black; text-decoration:none;"'?> href="<?php echo site_url().'/home/blog' ?>">BLOG</a></li>
			<li <?php if ($main == 'faq') echo 'style="background-color:#f99f1c;"'?>><a <?php if ($main == 'term') echo 'style="color:black; text-decoration:none;"'?> href="<?php echo site_url().'/home/faq' ?>">FAQ</a></li>

		</ul>
		<hr>
	</div>
</div>