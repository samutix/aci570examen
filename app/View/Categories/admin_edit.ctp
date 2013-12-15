<h1>Edit category</h1>
<br><br>
<?php

echo $this -> Form -> create('Category');
echo $this -> form -> input('id', array('type' => 'hidden'));
echo $this -> Form -> input('name');
echo $this -> Form -> input('is_active');
echo $this -> Form -> end('Save category');
?>