<h1>Add user</h1>
<br><br>
<?php

echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
?>
<div style="display: inline-block"><?=$this->Form->input('is_active');?></div>
<?php
?>
<br />
<div style="display: inline-block"><?=$this->Form->input('is_admin');?></div>
<?php
echo $this->Form->end('Save user');

?>