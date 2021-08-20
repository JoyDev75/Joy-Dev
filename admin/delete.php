<?php
include "../class/users.php";
$delt=new users;
$id=$_GET['id'];
//$_SESSION['id']=$id;
$delt->delete_question($id);

?>