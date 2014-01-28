<section class="cart">
	<div class="row">
		<div class="span4">
			<a href=""><img src="<?php echo base_url().'/assets/img/cart_white.png' ?>" alt="cart-icon"></a>
		</div>
		<div class="span4">
			<a href=""><img src="<?php echo base_url().'/assets/img/form_green.png' ?>" alt="form-icon"></a>
		</div>
		<div class="span4">
			<a href=""><img src="<?php echo base_url().'/assets/img/rp_green.png' ?>" alt="rp-icon"></a>
		</div>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="span12">
			<h2>Cart</h2>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="span12 cart-content">
			<table class="invoice">
				<?php if(isset($_SESSION['cart'])): ?>
					<thead>
						<tr>
							<th>Produk</th>
							<th>Varian</th>
							<th>Jml</th>
							<th>Harga</th>
							<th>Subtotal</th>
							<th>Hapus</th>
						</tr>
					</thead>
					<tbody>
					<?php $TOTALPRICE = $_SESSION['totalprice']; ?>
					<?php foreach($_SESSION['cart'] as $PID => $row): ?>
						<?php $data = array('name' => "li_id[$PID]",'value' => $row['count'],'id' => "li_id_$PID",'size' => 3,'class' => 'process'); ?>
						<tr>
							<td id='<?php echo "li_name_".$PID ?>'><?php echo $row['name'] ?></td>
							<td id='<?php echo "li_variant_".$PID ?>'><?php echo $row['variant'] ?></td>
							<td><?php echo form_input($data) ?></td>
							<td id='<?php echo "li_price_".$PID ?>'><?php echo "Rp ".number_format($row['price'],0,'.','.') ?></td>
							<td id='<?php echo "li_total_".$PID ?>'><?php echo "Rp ".number_format($row['price']*$row['count'],0,'.','.') ?></td>
							<td><a href="#" onclick='<?php echo "javascript:jsRemoveProduct($PID)"?>'>x</a></td>
						</tr>
					<?php endforeach ?>
					</tbody>
					<tfoot>
						<?php $total_data = array('name' => 'total', 'id' => 'total', 'value' => $TOTALPRICE);?>
						<tr>
							<th colspan="2"></th>
							<td ><input class='update-button' type='button' name='update' value='update' onClick='javascript:jsUpdateCart()'></td>
							<th>total</th>
							<td><?php echo "Rp ".number_format($TOTALPRICE,0,'.','.').form_hidden($total_data) ?></td>
							<td><a href='<?php echo site_url()."/home/cart_destroy" ?>'>x</a></td>
						</tr>
					</tfoot>

				<?php else: ?>
					<tr>
						<td>Nothing to do here</td>
					</tr>
				<?php endif ?>
			</table>

			<?php if(isset($_SESSION['cart'])): ?>
				<div class="row">
					<div class="span12 space-to-cart">
						<a class="checkout-button" href='<?php echo site_url()."/home/form" ?>'>Checkout</a>
					</div>
				</div>
			<?php endif ?>
			
 <div id='ajax_msg'></div>
		</div>
	</div>
</section>