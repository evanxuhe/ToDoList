<?php
#add a new note
session_start();
$login = $_SESSION["login"];
include ("include/util.php");

$judge=trim($_POST["note_title"]);
if (empty($judge)){   #can't use return value;
header("Location: error.php?type=note");	
die();
}

$sum = count(glob(dbpath($login)."/notes/*"))+1;
$data = $_POST["note_title"]."\nCreated ".date("y-m-d h-ia")." \n";  #date used to show time;
file_put_contents(dbpath($login)."/notes/$sum",$data,FILE_APPEND);
header("Location: notes.php");
?>