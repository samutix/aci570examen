<h1>Add reward</h1>
<br><br>
<?php

echo $this->Form->create('Reward');
echo $this->Form->input('project_id');
echo $this->Form->input('description');
echo $this->Form->input('max_allowed');
echo $this->Form->input('amount');
echo $this->Form->input('order');
echo $this->Form->end('Save reward');

?>