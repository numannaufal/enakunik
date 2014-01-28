<section class="content">
	<div class="row">
		<div class="span12">
			<h2>Contact</h2>
			<hr>
		</div>
	</div>
	<?php if($this->session->flashdata('message')) : ?>
		<div class="row">
			<div class="span12">
				<p class='alert alert-success'><?php echo $this->session->flashdata('message')?></p>
			</div>
		</div>
 	<?php endif ?>
	<div class="row contact">
		<div class="span8">
			<div id="map" style="width:80%; height:300px;"></div>
		</div>
		<div class="span4">
			<h2>Enak Unik</h2><br>
			<p>Jalan Siaga 1 No. 17 E</p>
			<p>Pejaten Barat</p>
			<p>Pasar Minggu</p> 
			<p>Jakarta Selatan</p>
			<p>12510</p>
			<p>021 – 9123 0476</p>
			<p>info.enakunik@gmail.com</p>
			<p><a target="_blank" href="https://www.facebook.com/EnakUnik">facebook</a></p>
			<p><a target="_blank" href="https://twitter.com/EnakUnik">twitter</a></p>
		</div>
	</div>
	<div class="row">
		<div class="span12" style="text-align:center;">
			<h4>Silakan mengisi form di bawah ini untuk menghubungi admin EnakUnik.Com</h4><br>
			<form method="post" action="<?php echo site_url().'/home/message' ?>">
				<h5>Nama</h5>
				<p><input name="message[name]" type="text" required></p>
				<h5>Email</h5>
				<p><input name="message[email]" type="text" required></p>
				<h5>Nomor telepon</h5>
				<p><input name="message[phone]" type="text" required></p>
				<h5>Alamat</h5>
				<p><textarea required name="message[address]" cols="30" rows="2"></textarea></p>
				<h5>Pesan</h5>
				<p><textarea required name="message[mail]" cols="30" rows="5"></textarea></p>
				<br>
				<input class="payment-button" type="submit" value="Kirim">
			</form>
		</div>
	</div>
</section>