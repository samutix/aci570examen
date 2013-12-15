<h1>Edit notification</h1>
<br><br>
<?php

echo $this -> Form -> create('Notification');
echo $this -> form -> input('id', array('type' => 'hidden'));
echo $this -> Form -> input('message_id');
echo $this -> Form -> input('user_id');
echo $this -> Form -> input('viewed');
echo $this -> Form -> end('Save notification');
?>