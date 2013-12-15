<h1>Rewards</h1>
<table class="table">
	<tr>
		<th>Id</th>
		<th>Proyec</th>
		<th>Description</th>
		<th>Max allowed</th>
		<th>Amount</th>
		<th>Order</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Action</th>
		<th>Action</th>
	</tr>
	<?php foreach($rewards as $reward): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['id']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Project']['name']),
			array(
				'controller' => 'projects', 'action' => 'view',
				$reward['Project']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['description']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['max_allowed']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['amount']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['order']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $reward['Reward']['created']; ?></td>
		<td><?php echo $reward['Reward']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Edit',
			array(
				'controller' => 'rewards', 'action' => 'edit',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $reward['Reward']['id']),
			array('confirm' => 'Delete reward for project '.$reward['Project']['name'].'?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($project); ?>
</table>

<p><?php echo $this->Html->link('Add reward', array('admin' => true, 'action' => 'add')); ?></p>
