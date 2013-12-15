<h1>Notifications</h1>

<table class="table">
	<tr>
		<th>Message subject</th>
		<th>Action</th>
	</tr>
	<?php foreach($notifications as $notification): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($notification['Message']['subject']),
			array(
				'controller' => 'messages', 'action' => 'view',
				$notification['Message']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			'View',
			array(
				'controller' => 'projects', 'action' => 'view',
				$notification['Message']['project_id']
			)
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($notification); ?>
</table>




