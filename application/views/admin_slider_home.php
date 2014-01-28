
<h1><?php echo $title ?></h1>
<p><?php echo anchor(site_url()."/admin/sliders/create", "Create new slider") ?></p>

<?php if($this->session->flashdata('message')) : ?>
	<div class="message"><?php echo $this->session->flashdata('message') ?></div>
<?php endif ?>

<?php if(count($sliders)) : ?>
	<table border="1" cellspacing="0" cellpadding='3' width='400'>
		<tr valign='top'>
			<th>No</th>
			<th>Name</th>
			<th>Image</th>
			<th>Actions</th>
		</tr>
		
		<?php $counter = 1 ?>
		<?php foreach ($sliders as $key => $list): ?>
			<tr valign='top'>
				<td align='center'><?php echo $counter ?></td>
				<td><?php echo $list->name ?></td>
				<td><img class="admin-slider" src="<?php echo $list->image_url() ?>"></td>
				<td align='center'><?php echo anchor(site_url()."/admin/sliders/delete/".$list->id, "delete")?></td>
			</tr>
			<?php $counter++ ?>
		<?php endforeach ?>
	</table> 
<?php endif ?>
