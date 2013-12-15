<h1>Add category</h1>
<br><br>
<?php

echo $this->Form->create('Category');
echo $this->Form->input('name');
?>
<div style="display: inline-block"><?=$this->Form->input('is_active');?></div>
<?php
echo $this->Form->end('Save category');
?>