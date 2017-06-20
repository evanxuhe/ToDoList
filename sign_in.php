<?php
session_destroy();
session_regenerate_id(TRUE);
session_start();
include ("include/util.php");


$login=$_POST["login"];
$login_info = readinfo($login);
if ($_POST["password"] === trim($login_info[0])) {
    $_SESSION["login"] = $login;
    header("Location: notes.php");}
else {
    header("Location: sign_in_form.php ");
}

?>