<h1><?php echo $title ?></h1>
<p><?php echo anchor(site_url()."/admin/products/create", "Create new product") ?></p>

<?php if($this->session->flashdata('message')) : ?>
	<div class="message"><?php echo $this->session->flashdata('message') ?></div>
<?php endif ?>

<?php if(count($products)) : ?>
	<table border="1" cellspacing="0" cellpadding='3' width='400'>
		<tr valign='top'>
			<th>No</th>
			<th>Name</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
		
		<?php $counter = 1 ?>
		<?php foreach ($products as $key => $list): ?>
			<tr valign='top'>
				<td align='center'><?php echo $counter ?></td>
				<td><?php echo $list->name ?></td>
				<td align='center'><?php echo $list->status ?></td>
				<td align='center'><?php echo anchor(site_url()."/admin/products/edit/".$list->id, "edit")." | ". 
				anchor(site_url()."/admin/products/delete/".$list->id, "delete")?></td>
			</tr>
			<?php $counter++ ?>
		<?php endforeach ?>
	</table> 
<?php endif ?>