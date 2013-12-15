<h1>Notification to user : <?php echo h($notification['User']['email']) ?></h1>
<br><br>
<p>Id : <?php echo h($notification['Notification']['id']) ?></p>
<p>Message : <?php echo $this->Html->link(
	h($notification['Message']['subject']),
	array(
		'controller' => 'messages', 'action' => 'view',
		$notification['Message']['id']
	)
); ?></p>
<p>User : <?php echo $this->Html->link(
	h($notification['User']['email']),
	array(
		'controller' => 'users', 'action' => 'view',
		$notification['User']['id']
	)
); ?></p>
<p>Viewed : <?php echo ($notification['Notification']['viewed']) ? 'Si' : 'No' ?></p>

<p><small>Created : <?php echo h($notification['Notification']['created']) ?></small></p>
<p><small>Modified : <?php echo h($notification['Notification']['modified']) ?></small></p>