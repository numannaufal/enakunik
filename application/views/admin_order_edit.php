<h1><?php echo $title ?></h1>

<style type='text/css'>
	h5 { margin:0; }
	p { margin: 5px 0; }
</style>

<form action="<?php echo site_url()."/admin/orders/edit/".$order->id ?>" method="post">
	<h5>Nama pelanggan</h5>
	<p><?php echo $order->name ?></p>
	<h5>Email</h5>
	<p><?php echo $order->email ?></p>
	<h5>Phone</h5>
	<p><?php echo $order->phone?></p>
	<h5>Address</h5>
	<p><?php echo $order->address?></p>
	<h5>Order</h5>
	<table border="1" cellspacing="0" cellpadding='3' width='400'>
		<thead>
			<tr>
				<th>Produk</th>
				<th>Qty</th>
				<th>Harga</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($items as $item): ?>
				<tr>
					<td><?php echo $item->name ?></td>
					<td><?php echo $item->qty?></td>
					<td>Rp <?php echo number_format($item->price,0,'.','.') ?></td>
					<td>Rp <?php echo number_format($item->total,0,'.','.') ?></td>
				</tr>
			<?php endforeach ?>	
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2"></th>
				<th>Shipping</th>
				<th align="left">Rp <?php echo number_format($order->shipping,0,'.','.') ?></th>
			</tr>
			<tr>
				<th colspan="2"></th>
				<th>Total</th>
				<th align="left">Rp <?php echo number_format($order->total,0,'.','.') ?></th>
			</tr>
		</tfoot>
	</table>
	<br>
	<select name="status">
		<option value="notyet">Belum diproses</option>
		<option value="process">Sedang diproses/dikirim</option>
		<option value="finished">Sudah diterima</option>
	</select>
	<br><br>
	<input type="submit" value="edit">
</form>
