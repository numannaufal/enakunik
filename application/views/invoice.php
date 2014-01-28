
<h2>Payment</h2>
<p>Silahkan melakukan pembayaran dalam tempo 1x24 jam.</p>
<table >
	<thead>
		<tr>
			<th>Produk</th>
			<th>Varian</th>
			<th>Jml</th>
			<th>Harga</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($_SESSION['cart'] as $PID => $row): ?>
			<tr>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['variant'] ?></td>
				<td><?php echo $row['count'] ?></td>
				<td><?php echo "Rp ".number_format($row['price'],0,'.','.') ?></td>
				<td><?php echo "Rp ".number_format($row['price']*$row['count'],0,'.','.') ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	<tfoot>
		<tr>
			<th colspan="3"></th>
			<th>shipping</th>
			<th><?php echo "Rp ".number_format($_SESSION['order']['shipping'],0,'.','.') ?></th>
		</tr>
		<tr>
			<th colspan="3"></th>
			<th>total</th>
			<th><?php echo "Rp ".number_format($_SESSION['totalprice'],0,'.','.') ?></th>
		</tr>
	</tfoot>
</table>
<div class="payment-conclusion">
	<p>total belanja:<?php echo "Rp ".number_format($_SESSION['totalprice'],0,'.','.') ?></p>
	<p>ke <?php echo $_SESSION['order']['address'] ?> atas nama <?php echo $_SESSION['order']['name'] ?></p>
</div>
<p>Transer tagihan Anda ke 152001051554 (Bank Mandiri) a.n Andi Tenri Pada</p>
<p>lakukan konfirmasi ke <b>021 9123 0476</b></p>
<p>terimakasih sudah berbelanja di enakunik.com</p>