<h1>Notifications</h1>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Message subject</th>
		<th>User</th>
		<th>Viewed</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Action</th>
		<th>Action</th>
	</tr>
	<?php foreach($notifications as $notification): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($notification['Notification']['id']),
			array(
				'controller' => 'notifications', 'action' => 'view',
				$notification['Notification']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($notification['Message']['subject']),
			array(
				'controller' => 'messages', 'action' => 'view',
				$notification['Message']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($notification['User']['email']),
			array(
				'controller' => 'users', 'action' => 'view',
				$notification['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			($notification['Notification']['viewed']) ? 'Yes' : 'No',
			array(
				'controller' => 'notifications', 'action' => 'view',
				$notification['Notification']['id']
			)
		); ?></td>
		<td><?php echo $notification['Notification']['created']; ?></td>
		<td><?php echo $notification['Notification']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Edit',
			array(
				'controller' => 'notifications', 'action' => 'edit',
				$notification['Notification']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $notification['Notification']['id']),
			array('confirm' => 'Delete notificion with id '.$notification['Notification']['id'].' of user "'.$notification['User']['email'].'"?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($notification); ?>
</table>

<p><?php echo $this->Html->link('Add notificacion', array('admin' => true, 'action' => 'add')); ?></p>



