<?php
include ("include/util.php");
foreach ($_POST as $key=>$value) {   #$key------$_POST["firstname"]; $key+>value key="firstname" value =$_POST["firstname"]
$judge=trim($value);
if (empty($judge)){   #can't use return value;
header("Location: error.php?type=$key");	
die();
}
}
$login = $_POST["login"];
mkdir("2doDB/".$login);
mkdir("2doDB/".$login."/notes");
$data = $_POST["password"]."\n".$_POST["firstname"]."\n".$_POST["lastname"]."\n";
file_put_contents(dbpath($login)."/info.txt",$data,FILE_APPEND);
header("Location: sign_in_form.php");
?>