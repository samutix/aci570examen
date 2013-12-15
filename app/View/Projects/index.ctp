<h1>Projects</h1>
<table class="table">
	<tr>
		<th>Category</th>
		<th>User</th>
		<th>Name</th>
		<th>Shor description</th>
		<th>Description</th>
		<th>Start date</th>
		<th>End date</th>
		<th>Goal</th>
		<th>Active</th>
		<th>Created</th>
		<th>Modified</th>
	</tr>
	<?php foreach($projects as $project): ?>
	<tr>
		<td><?php echo h($project['Category']['name']); ?></td>
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
				'controller' => 'projects',
				'action' => 'view',
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
	</tr>
	<?php endforeach; ?>
	<?php unset($project); ?>
</table>