<?php
include "../class/users.php";
$overview=new users;
$question=$overview->result_shows();
$msg ='';
if(isset($_GET['status']) && $_GET['status'] == 1){
	$msg = $overview->delete_user($_GET['user_id']);
}

?>
<div class="container">
  <h2>All User Quiz Result</h2>
	
  <div class="row">   
  	<?php if(isset($_GET['status']) && $_GET['status'] == 1){ ?>
    <div class="alert alert-danger" style="width:70%">
     <?php echo $msg; ?>
</div>   
<?php } ?>    
  <table style="width:70%" class="table table-bordered">
    <thead>
      <tr class="success">
        <th>Sr</th>
        <th>User Name</th>
        <th>Nick Name</th>
        <th>Result </th>
        <th>Action </th>
        <th>View Quiz </th>
      </tr>
    </thead>
	<?php

	$r=1;
	if(count($question)){
	foreach($question as $result)
	{
		$_SESSION['user_id']=$result['id'];
	 echo "<tbody>
			  <tr class='info'>
				<td>".$r++."</td>
				<td>".ucfirst($result['fname']).' '.$result['lname']."</td>
				<td>".ucfirst($result['nick_name'])."</td>
				<td>".$result['total_percentage']."%</td>
				<td><a href='index.php?option=delete_quiz&status=1&user_id=".$result['user_id']."'>Delete</a></td>
				<td><a href='index.php?option=show_quiz&user_id=".$result['user_id']."'>View Quiz Result</a></td>
			  </tr>
		   </tbody>";
	}
}else{
	echo "<tr><td colspan='6' ><center>No record found</center></td></tr>" ;
}
	?>
  </table>
  </div>
</div>