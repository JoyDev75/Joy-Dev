<?php
include "../class/users.php";
$overview=new users;
$question=$overview->question_shows();

?>
<div class="container">
  <h2>Data in Table</h2>
  <div class="row">          
  <table style="width:70%" class="table table-bordered">
    <thead>
      <tr class="success">
        <th>Sr</th>
        <th>Question</th>
        <th>Delete</th>
      </tr>
    </thead>
	<?php
    //$overview->delete_question();
	$r=1;
	foreach($question as $result)
	{
		$_SESSION['user_id']=$result['id'];
	 echo "<tbody>
			  <tr class='info'>
				<td>".$r++."</td>
				<td>'".$result['question']."'</td>
				<td><a href='delete.php?id=".$result['id']."'>Delete</a></td>
			  </tr>
		   </tbody>";
	}

	?>
  </table>
  </div>
</div>
