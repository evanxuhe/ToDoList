<?php
$judge=trim($_POST["new_todo"]);
if (empty($judge)){   #can't use return value;
header("Location: error.php?type=todo");	
die();
}
file_put_contents(dbpath($login)."/notes/".$_POST["todo_id"],$_POST["new_todo"]."\n",FILE_APPEND);
header("Location: notes.php");

?>