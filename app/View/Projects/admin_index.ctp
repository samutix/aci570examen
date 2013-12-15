<h1>Projects</h1>
<table class="table">
	<tr>
		<th>Id</th>
		<th>Category</th>
		<th>User</th>
		<th>Name</th>
		<th>Short description</th>
		<th>Description</th>
		<th>Start date</th>
		<th>End date</th>
		<th>Goal</th>
		<th>Active</th>
		<th>Created</th>
		<th>Modifiedo</th>
		<th>Action</th>
		<th>Action</th>
	</tr>
	<?php foreach($projects as $project): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($project['Project']['id']),
			array(
				'controller' => 'projects', 'action' => 'view',
				$project['Project']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($project['Category']['name']),
			array(
				'controller' => 'categories', 'action' => 'view',
				$project['Category']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($project['User']['first_name'].' '.$project['User']['last_name']),
			array(
				'controller' => 'users', 'action' => 'view',
				$project['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($project['Project']['name']),
			array(
				'controller' => 'projects', 'action' => 'view',
				$project['Project']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($project['Project']['short_description']),
			array(
				'controller' => 'projects', 'action' => 'view',
				$project['Project']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($this->Text->truncate(
			$project['Project']['long_description'],
			60, 
			array('ellipsis' => '...', 'exact' => true)
			)),
			array(
				'controller' => 'projects', 'action' => 'view',
				$project['Project']['id']
			)
		);?></td>
		<td><?php echo $project['Project']['start_date']; ?></td>
		<td><?php echo $project['Project']['end_date']; ?></td>
		<td><?php echo $project['Project']['goal']; ?></td>
		<td><?php echo ($project['Project']['is_active']) ? 'Yes' : 'No'; ?></td>
		<td><?php echo $project['Project']['created']; ?></td>
		<td><?php echo $project['Project']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Edit',
			array(
				'controller' => 'projects', 'action' => 'edit',
				$project['Project']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $project['Project']['id']),
			array('confirm' => 'Delete proyect '.$project['Project']['name'].'?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($project); ?>
</table>

<p><?php echo $this->Html->link('Add proyect', array('admin' => true, 'action' => 'add')); ?></p>
