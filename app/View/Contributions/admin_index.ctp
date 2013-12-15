<h1>Contributors</h1>

<table class="table">
	<tr>
		<th>Id</th>
		<th>User</th>
		<th>Reward</th>
		<th>Amount</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Action</th>
		<th>Action</th>
	</tr>
	<?php foreach($Contributions as $Contribution): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($Contribution['Contribution']['id']),
			array(
				'controller' => 'Contributions', 'action' => 'view',
				$Contribution['Contribution']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($Contribution['User']['first_name'].' '.$Contribution['User']['last_name']),
			array(
				'controller' => 'users', 'action' => 'view',
				$Contribution['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($Contribution['Reward']['description']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$Contribution['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($Contribution['Contribution']['amount']),
			array(
				'controller' => 'Contributions', 'action' => 'view',
				$Contribution['Contribution']['id']
			)
		); ?></td>
		<td><?php echo $Contribution['Contribution']['created']; ?></td>
		<td><?php echo $Contribution['Contribution']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Edit',
			array(
				'controller' => 'Contributions', 'action' => 'edit',
				$Contribution['Contribution']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $Contribution['Contribution']['id']),
			array('confirm' => 'Dele contribution of user '.$Contribution['User']['email'].'?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($Contribution); ?>
</table>

<p><?php echo $this->Html->link('Add contribution', array('admin' => true, 'action' => 'add')); ?></p>