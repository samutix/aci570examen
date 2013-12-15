<h1>Project : <?php echo h($project['Project']['name']) ?></h1>
<br><br>
<p>Id : <?php echo h($project['Project']['id']) ?></p>
<p>Name : <?php echo h($project['Project']['name']) ?></p>
<p>User : <?php echo h($project['User']['first_name'].' '.$project['User']['last_name']) ?></p>
<p>Category : <?php echo h($project['Category']['name']) ?></p>
<p>Start date : <?php echo h($project['Project']['start_date']) ?></p>
<p>End date : <?php echo h($project['Project']['end_date']) ?></p>
<p>Active : <?php echo ($project['Project']['is_active']) ? 'Si' : 'No'; ?></p>
<p>Short description : <?php echo h($project['Project']['short_description']) ?></p>
<p>Long destription :</p><p><?php echo h($project['Project']['long_description']) ?></p>
<p><small>Created : <?php echo h($project['Project']['created']) ?></small></p>
<p><small>Modified : <?php echo h($project['Project']['modified']) ?></small></p>