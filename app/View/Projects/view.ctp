<h1>Project : <?php echo h($project['Project']['name']) ?></h1>
<br><br>
<p>Name : <?php echo h($project['Project']['name']) ?></p>
<p>User : <?php echo h($project['User']['first_name'].' '.$project['User']['last_name']) ?></p>
<p>Category : <?php echo h($project['Category']['name']) ?></p>
<p>Start date : <?php echo h($project['Project']['start_date']) ?></p>
<p>End date : <?php echo h($project['Project']['end_date']) ?></p>
<p>Short description : <?php echo h($project['Project']['short_description']) ?></p>
<p>Long destription :</p><p><?php echo h($project['Project']['long_description']) ?></p>
<br />
<h1>Rewards</h1>
<br />
<div id="rewards-box">
	<div class="reward">
		<hr />
		<?php foreach($rewards as $reward): ?>
			<p class="rewar-description">Description: <?php echo $reward['Reward']['description']; ?></p>
			<p>Max allowed: <?php echo $reward['Reward']['max_allowed']; ?></p>
			<p>Amount: <?php echo $reward['Reward']['amount']; ?></p>
			<p>Order: <?php echo $reward['Reward']['order']; ?></p>
			<hr />
		<?php endforeach; ?>
	</div>
</div>
<br />
<h1>Messages</h1>
<br />

<div id="messages-box">
	<div class="message"><hr />
		<?php foreach($messages as $message): ?>
			<p class="message-subject">Subject: <?php echo $message['Message']['subject']; ?></p>
			<div>Message: <p class="message-body"><?php echo $message['Message']['message']; ?></p></div>
			<hr />
		<?php endforeach; ?>		
	</div>
</div>