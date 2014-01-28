<h1><?php echo $title ?></h1>
<p><?php echo anchor(site_url()."/admin/categories/create", "Create new category") ?></p>

<?php if($this->session->flashdata('message')) : ?>
	<div class="message"><?php echo $this->session->flashdata('message') ?></div>
<?php endif ?>

<?php if(count($categories)) : ?>
	<table border="1" cellspacing="0" cellpadding='3' width='400'>
		<tr valign='top'>
			<th>no</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		<?php $counter = 1 ?>
		<?php foreach ($categories as $key => $list): ?>
			<tr valign='top'>
				<td align='center'><?php echo $counter ?></td>
				<td><?php echo $list->name ?></td>
				<td align='center'><?php echo anchor(site_url()."/admin/categories/edit/".$list->id, "edit")." | ". 
				anchor(site_url()."/admin/categories/delete/".$list->id, "delete")?></td>	
			</tr>
			<?php $counter++ ?>
		<?php endforeach ?>
	</table> 
<?php endif ?>