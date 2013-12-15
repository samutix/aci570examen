<h1>Add notification</h1>
<br><br>
<?php

echo $this->Form->create('Notification');
echo $this->Form->input('message_id');
echo $this->Form->input('user_id');
?>
<div style="display: inline-block"><?=$this->Form->input('viewed');?></div>
<?php
echo $this->Form->end('Save notification');

?>