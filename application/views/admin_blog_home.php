<h1><?php echo $title ?></h1>
<p><?php echo anchor(site_url()."/admin/blogs/create", "Create new blog") ?></p>

<?php if($this->session->flashdata('message')) : ?>
	<div class="message"><?php echo $this->session->flashdata('message') ?></div>
<?php endif ?>

<?php if(count($blogs)) : ?>
	<table border="1" cellspacing="0" cellpadding='3' width='400'>
		<tr valign='top'>
			<th>no</th>
			<th>News</th>
			<th>Actions</th>
		</tr>
		<?php $counter = 1 ?>
		<?php foreach ($blogs as $key => $list): ?>
			<tr valign='top'>
				<td align='center'><?php echo $counter ?></td>
				<td><?php echo $list->title?></td>
				<td align='center'><?php echo anchor(site_url()."/admin/blogs/edit/".$list->id, "edit")." | ". 
				anchor(site_url()."/admin/blogs/delete/".$list->id, "delete")?></td>	
			</tr>
			<?php $counter++ ?>
		<?php endforeach ?>
	</table> 
<?php endif ?>