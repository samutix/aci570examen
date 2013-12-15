<h1>Category : <?php echo h($categories['Category']['name']) ?></h1>
<br><br>
<p>Id : <?php echo h($categories['Category']['id']) ?></p>
<p>Name : <?php echo h($categories['Category']['name']) ?></p>
<p>Active : <?php echo ($categories['Category']['is_active']) ? 'yes' : 'no'; ?></p>
<p><small>Created : <?php echo h($categories['Category']['created']) ?></small></p>
<p><small>Modified : <?php echo h($categories['Category']['modified']) ?></small></p>