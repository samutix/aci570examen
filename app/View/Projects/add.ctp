<h1>Add project</h1>
<br><br>
<?php

echo $this->Form->create('Project');
echo $this->Form->input('category_id');
echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user['id']));
echo $this->Form->input('name');
echo $this->Form->input('short_description');
echo $this->Form->input('long_description');
echo $this->Form->input('start_date');
echo $this->Form->input('end_date');
?>
<div style="display: inline-block"><?=$this->Form->input('is_active', array('type' => 'hidden', 'value' => true));?></div>
<?php
echo $this->Form->end('Save Proyect');

?>