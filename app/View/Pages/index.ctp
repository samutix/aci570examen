<h1>Projects</h1>

<table class="table table-bordered">
	<tr>
		<th>Project</th>
		<th>User</th>
		<th>Category</th>
		<th>Short description</th>
		<th>Long description</th>
		<th>Start date</th>
		<th>End date</th>
		<th>Goal</th>
		<?php 
		echo ($loggedIn) ? "<th>Accion</th>" : '';
		?>
	</tr>
	<?php foreach($projects as $project): ?>
		<tr>
			<td><?php echo $this->Html->link(
				h($project['Project']['name']),
				array(
					'controller' => 'projects', 'action' => 'view',
					$project['Project']['id']
				)
			); ?></td>
			<td><?php echo $this->Html->link(
				h($project['User']['email']),
				array(
					'controller' => 'users', 'action' => 'view',
					$project['User']['id']
				)
			); ?></td>
			<td><?php echo $this->Html->link(
			h($project['Category']['name']),
			array(
				'controller' => 'Categories', 'action' => 'view',
				$project['Category']['id']
			)
		); ?></td>
			<td><?php echo $project['Project']['short_description']; ?></td>
			<td><?php echo $this->Text->truncate(
				$project['Project']['long_description'],
				60, 
				array('ellipsis' => '...', 'exact' => true)
			); ?></td>
			<td><?php echo $project['Project']['start_date']; ?></td>
			<td><?php echo $project['Project']['end_date']; ?></td>
			<td><?php echo $project['Project']['goal']; ?></td>
			<td><?php echo (isset($user['id']) && $user['id'] === $project['User']['id'] || isset($user['is_admin']) && $user['is_admin']) ? $this->Html->link("Edit", array('controller' => 'projects', 'action' => 'edit', $project['Project']['id'])) : ''; ?></td>
		</tr>
	<?php endforeach; ?>
</table>