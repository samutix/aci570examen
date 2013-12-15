<h1>Contributor : <?php echo h($Contribution['User']['first_name'].' '.$Contribution['User']['last_name']) ?></h1>
<br><br>
<p>Id : <?php echo h($Contribution['Contribution']['id']) ?></p>
<p>User : <?php echo $this->Html->link(
	h($Contribution['User']['first_name'].' '.$Contribution['User']['last_name']),
	array(
		'controller' => 'users', 'action' => 'view',
		$Contribution['User']['id']
	)
); ?></p>
<p>Reward : <?php echo $this->Html->link(
	h($Contribution['Reward']['description']),
	array(
		'controller' => 'rewards', 'action' => 'view',
		$Contribution['Reward']['id']
	)
); ?></p>
<p>Amount : <?php echo ($Contribution['Contribution']['amount']); ?></p>
<p><small>Created : <?php echo h($Contribution['Contribution']['created']) ?></small></p>
<p><small>Modified : <?php echo h($Contribution['Contribution']['modified']) ?></small></p>