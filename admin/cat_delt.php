<?php
include "../class/users.php";
$cat_delt=new users;
extract($_GET);
if($cat_delt->delete_category($id))
{
	$cat_delt->url("index.php?delt=delete_cat");
}

?>