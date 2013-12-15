<h1>Edit project</h1>
<br><br>
<?php

echo $this->Form->create('Project');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('category_id');
echo $this->Form->input('user_id', array('type' => 'hidden'));
echo $this->Form->input('name');
echo $this->Form->input('short_description');
echo $this->Form->input('long_description');
echo $this->Form->input('start_date');
echo $this->Form->input('end_date');
echo $this->Form->end('Save Project');

?>
