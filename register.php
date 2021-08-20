<?php
include "class/users.php";
$register=new users;
extract($_POST);
if(isset($signup))
{
	if($register->regsiter($f,$l,$e,$p,$n))
	{
		///echo $register->success;
		//echo "Your Registration successfull";
		$register->url("index.php?succ=true");
	}
	else
	{
		echo "Your Registration not successfull";	
	}

}

?>