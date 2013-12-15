<h1>Messages</h1>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Project</th>
		<th>Subject</th>
		<th>Message</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Action</th>
		<th>Action</th>
	</tr>
	<?php foreach($messages as $message): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($message['Message']['id']),
			array(
				'controller' => 'messages', 'action' => 'view',
				$message['Message']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($message['Project']['name']),
			array(
				'controller' => 'projects', 'action' => 'view',
				$message['Project']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($message['Message']['subject']),
			array(
				'controller' => 'messages', 'action' => 'view',
				$message['Message']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($this->Text->truncate(
			$message['Message']['message'],
			60, 
			array('ellipsis' => '...', 'exact' => true)
			)),
			array(
				'controller' => 'messages', 'action' => 'view',
				$message['Message']['id']
			)
		);?></td>
		<td><?php echo $message['Message']['created']; ?></td>
		<td><?php echo $message['Message']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Edit',
			array(
				'controller' => 'messages', 'action' => 'edit',
				$message['Message']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $message['Message']['id']),
			array('confirm' => 'Delete message "'.$message['Message']['subject'].'"?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($message); ?>
</table>

<p><?php echo $this->Html->link('Add message', array('admin' => true, 'action' => 'add')); ?></p>