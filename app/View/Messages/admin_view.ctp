<h1>Message : <?php echo h($message['Message']['subject']) ?></h1>
<br><br>
<p>Id : <?php echo h($message['Message']['id']) ?></p>
<p>Project : <?php echo $this->Html->link(
			h($message['Project']['name']),
			array(
				'controller' => 'projects', 'action' => 'view',
				$message['Project']['id']
			)
		); ?></p>
<p>Subject : <?php echo h($message['Message']['subject']) ?></p>
<p>Message : </p><p><?php echo h($message['Message']['message']) ?></p>

<p><small>Created : <?php echo h($message['Message']['created']) ?></small></p>
<p><small>Modified : <?php echo h($message['Message']['modified']) ?></small></p>