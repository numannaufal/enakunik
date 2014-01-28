<section class="cart">
	<div class="row">
		<div class="span4">
			<a href=""><img src="<?php echo base_url().'/assets/img/cart_green.png' ?>" alt="cart-icon"></a>
		</div>
		<div class="span4">
			<a href=""><img src="<?php echo base_url().'/assets/img/form_white.png' ?>" alt="form-icon"></a>
		</div>
		<div class="span4">
			<a href=""><img src="<?php echo base_url().'/assets/img/rp_green.png' ?>" alt="rp-icon"></a>
		</div>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="span12">
			<h2>Isi data diri Anda !</h2>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<form method="post" action="<?php echo site_url().'/home/payment' ?>">
				<h5>Nama</h5>
				<p><input name="name" type="text" required></p>
				<h5>Email</h5>
				<p><input name="email" type="text" required></p>
				<h5>Nomor telepon</h5>
				<p><input name="phone" type="text" required></p>
				<h5>Alamat</h5>
				<p><textarea required name="address" cols="30" rows="10"></textarea></p>
				<h5>Metode/wilayah pengiriman</h5>
				<p>
					<select name="shipping">
						<option value="COD">COD</option>
						<option value="Jabodetabek">Jabodetabek</option>
						<option value="Pulau Jawa">Pulau Jawa</option>
						<option value="Luar Jawa">Luar Jawa</option>
					</select>
				</p>
				<h5>Saya setuju dengan <a href="<?php echo site_url().'/home/term'?>" target="_blank">syarat & ketentuan</a> yang berlaku</h5>
				<br>
				<input class="payment-button" type="submit" value="pembayaran">
			</form>
		</div>
	</div>
</section>