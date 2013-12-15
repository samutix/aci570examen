<h1>Edit user</h1>
<br><br>
<?php

echo $this -> Form -> create('User');
echo $this -> form -> input('id', array('type' => 'hidden'));
echo $this -> Form -> input('email');
echo '<div class="input"><label for="UserPassEdit">Password</label>', $this -> Form -> password('passEdit'), '</div>';
echo $this -> Form -> input('first_name');
echo $this -> Form -> input('last_name');
?>
<div style="display: inline-block"><?=$this->Form->input('is_active');?></div>
<?php
?>
<br />
<div style="display: inline-block"><?=$this->Form->input('is_admin');?></div>
<?php
echo $this -> Form -> end('Save user');
?>
