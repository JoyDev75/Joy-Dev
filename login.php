<?php
include "class/users.php";
$log=new users;
extract($_POST);
if(isset($login))
{
	$log->login($em,$pa);
	if($log->login($em,$pa))
	{
		$log->url("home.php?run=tr");
	}
	else
	{
		$log->url("index.php?lo=fal");
	}
}
	
?>