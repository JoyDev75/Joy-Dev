<?php
include "../class/users.php";
session_destroy();
$log=new users;
unset($_SESSION['admin']);
if(isset($_GET['log']) && $_GET['log']=="logout")
{
	$log->url("login.php");
}


?>