<h1>Login</h1>

<?php

echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->end('Sign in');

?>