<h1><?php echo $title ?></h1>
<?php if($this->session->flashdata('message')) : ?>
	<div class="message"><?php echo $this->session->flashdata('message') ?></div>
<?php endif ?>

<?php if(count($orders)) : ?>
	<table border="1" cellspacing="0" cellpadding='3' width='600'>
		<tr valign='top'>
			<th>No</th>
			<th>Customer</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
		
		<?php $counter = 1 ?>
		<?php foreach ($orders as $key => $list): ?>
			<tr valign='top'>
				<td align='center'><?php echo $counter ?></td>
				<td>
					<?php echo $list->name ?>
					<?php if ($list->viewed == 'false'): ?>
						<span style="color:red;">*</span>
					<?php endif ?>
				</td>
				<td align='center'><?php echo $list->created_at ?></td>
				<td align='center'><?php echo anchor(site_url()."/admin/orders/edit/".$list->id, "view")." | ". 
				anchor(site_url()."/admin/orders/delete/".$list->id, "delete")?></td>
			</tr>
			<?php $counter++ ?>
		<?php endforeach ?>
	</table> 
<?php endif ?>