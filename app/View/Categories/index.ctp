<h1 class="text-center">Categories</h1>

<table class="table">
	<tr>
		<th>Name</th>
	</tr>
	<?php foreach($categories as $category): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($category['Category']['name']),
			array(
				'controller' => 'categories', 'action' => 'view',
				$category['Category']['id']
			)
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($category); ?>
</table>
