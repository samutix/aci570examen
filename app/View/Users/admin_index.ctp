<h1>Users</h1>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Email</th>
		<th>Name</th>
		<th>Last name</th>
		<th>Active</th>
		<th>Admin</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Action</th>
		<th>Action</th>
	</tr>
	<?php foreach($users as $user): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($user['User']['id']),
			array(
				'controller' => 'users', 'action' => 'view',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($user['User']['email']),
			array(
				'controller' => 'users', 'action' => 'view',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($user['User']['first_name']),
			array(
				'controller' => 'users', 'action' => 'view',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($user['User']['last_name']),
			array(
				'controller' => 'users', 'action' => 'view',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo ($user['User']['is_active']) ? 'Yes' : 'No'; ?></td>
		<td><?php echo ($user['User']['is_admin']) ? 'Yes' : 'No'; ?></td>
		<td><?php echo $user['User']['created']; ?></td>
		<td><?php echo $user['User']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Edit',
			array(
				'controller' => 'users', 'action' => 'edit',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $user['User']['id']),
			array('confirm' => 'Delete user '.$user['User']['first_name'].' '.$user['User']['last_name'].'?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($user); ?>
</table>

<p><?php echo $this->Html->link('Add user', array('admin' => true, 'controller' => 'users', 'action' => 'add')); ?></p>




