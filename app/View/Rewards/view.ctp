<h1>Rewards</h1>
<table class="table">
	<tr>
		<th>Project name</th>
		<th>Description</th>
		<th>Max allowed</th>
		<th>Amount</th>
		<th>Order</th>
	</tr>
	<?php foreach($rewards as $reward): ?>
		<tr>
			<td><?php echo $reward['Project']['name'] ?></td>
			<td><?php echo $reward['Reward']['description'] ?></td>
			<td><?php echo $reward['Reward']['max_allowed'] ?></td>
			<td><?php echo $reward['Reward']['amount'] ?></td>
			<td><?php echo $reward['Reward']['order'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>