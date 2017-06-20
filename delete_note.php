<?php

#include in the perform_action.php ,don't need add Session or include defination!
unlink(dbpath($login)."/notes/".$_POST["todo_id"]);
?>