<h1><?php echo $title ?></h1>
<p><?php echo anchor(site_url()."/admin/faqs/create", "Create new faq") ?></p>

<?php if($this->session->flashdata('message')) : ?>
	<div class="message"><?php echo $this->session->flashdata('message') ?></div>
<?php endif ?>

<?php if(count($faqs)) : ?>
	<table border="1" cellspacing="0" cellpadding='3' width='400'>
		<tr valign='top'>
			<th>no</th>
			<th>Question</th>
			<th>Actions</th>
		</tr>
		<?php $counter = 1 ?>
		<?php foreach ($faqs as $key => $list): ?>
			<tr valign='top'>
				<td align='center'><?php echo $counter ?></td>
				<td><?php echo $list->question ?></td>
				<td align='center'><?php echo anchor(site_url()."/admin/faqs/edit/".$list->id, "edit")." | ". 
				anchor(site_url()."/admin/faqs/delete/".$list->id, "delete")?></td>	
			</tr>
			<?php $counter++ ?>
		<?php endforeach ?>
	</table> 
<?php endif ?>