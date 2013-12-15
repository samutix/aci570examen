<h1>Reward for project : <?php echo h($reward['Project']['name']) ?></h1>
<br><br>
<p>Id : <?php echo h($reward['Reward']['id']) ?></p>
<p>Description : <?php echo h($reward['Reward']['description']) ?></p>
<p>Max allowed : <?php echo $reward['Reward']['max_allowed'] ?></p>
<p>Amount : <?php echo $reward['Reward']['amount'] ?></p>
<p>Order : <?php echo $reward['Reward']['order'] ?></p>
<p><small>Created : <?php echo $reward['Reward']['created'] ?></small></p>
<p><small>Modified : <?php echo $reward['Reward']['modified'] ?></small></p>