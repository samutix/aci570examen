<h1>Register user</h1>
<br><br>
<?php

echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('confirm_password', array('type' => 'password'));
echo $this->Form->input('is_active', array('type' => 'hidden', 'value' => true));
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->end('Register me!');

?>