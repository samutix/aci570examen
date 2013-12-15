<h1>Profile : <?php echo h($usuario['User']['first_name']), " ", h($usuario['User']['last_name']) ?></h1>
<br><br>
<p>Email : <?php echo h($usuario['User']['email']) ?></p>
<p>First name : <?php echo h($usuario['User']['first_name']) ?></p>
<p>Last name : <?php echo h($usuario['User']['last_name']) ?></p>
<br />
<h1>User Projects</h1>
<br />
<table class="table">
	<tr>
		<th>Category</th>
		<th>Name</th>
		<th>Short description</th>
		<th>Description</th>
		<th>Start date</th>
		<th>End date</th>
		<th>Goal</th>
		<?php 
		echo ($loggedIn) ? "<th>Accion</th><th>Message</th>" : '';
		?>
	</tr>
	<?php foreach($projects as $project): ?>
	<tr>
		<td><?php echo h($project['Category']['name']); ?></td>
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
		<td><?php echo (isset($user) && $user['id'] === $project['User']['id'] || $user['is_admin']) ? $this->Html->link("Edit", array('controller' => 'projects', 'action' => 'edit', $project['Project']['id'])) : ''; ?></td>
		<td><?php echo (isset($user) && $user['id'] === $project['User']['id'] || $user['is_admin']) ? $this->Html->link("Set message", array('controller' => 'messages', 'action' => 'add', $project['Project']['id'])) : ''; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
