<h1><?php echo $title ?></h1>
<p><?php echo anchor(site_url()."/admin/admins/create", "Create new User") ?></p>

<?php if($this->session->flashdata('message')) : ?>
	<div class="message"><?php echo $this->session->flashdata('message') ?></div>
<?php endif ?>

<?php if(count($admins)) : ?>
	<table border="1" cellspacing="0" cellpadding='3' width='400'>
		<tr valign='top'>
			<th>Id</th>
			<th>Name</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
		<?php if ($admin->status == 'super admin'): ?>
			<?php foreach ($admins as $key => $list): ?>
				<tr valign='top'>
					<td><?php echo $list->id ?></td>
					<td><?php echo $list->username ?></td>
					<td align='center'><?php echo $list->status ?></td>
						<td align='center'><?php echo anchor(site_url()."/admin/admins/edit/".$list->id, "edit")." | ". 
						anchor(site_url()."/admin/admins/delete/".$list->id, "delete")?></td>
				</tr>
			<?php endforeach ?>
		<?php else: ?>
			<?php foreach ($admins as $key => $list): ?>
				<tr valign='top'>
					<td><?php echo $list->id ?></td>
					<td><?php echo $list->username ?></td>
					<td align='center'><?php echo $list->status ?></td>
					<?php if ($list->id == $admin->id): ?>
						<td align='center'><?php echo anchor(site_url()."/admin/admins/edit/".$list->id, "edit")." | ". 
						anchor(site_url()."/admin/admins/delete/".$list->id, "delete")?></td>
					<?php else: ?>
						<td align='center'>can't be changed</td>
					<?php endif ?>
				</tr>
			<?php endforeach ?>
		<?php endif ?>
		
	</table> 
<?php endif ?>