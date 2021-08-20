<?php
include "../class/users.php";
$overview=new users;
$question=$overview->show_user_quiz_result($_GET['user_id']);

?>
<div class="row">
	
		<div class="col-sm-12">
				<br>
			  <div class="panel panel-default">
				<div class="panel-heading"><center><h2>Your Score</h2></center></div>
				<div class="panel-heading"><center><h3>Total Number of Questions <br><br><b><?php echo $question[2];?></b></h3></center></div>
				<div class="panel-heading"><center><h3>You have attempt <br><br><b>
				<?php echo $question[3];?></b></h3></center></div>
				<div class="panel-heading"><center><h3>&emsp; Right answer&emsp; ----&emsp;<?php echo $question[4];?> </h3> </center></div>
				<div class="panel-heading"><center><h3>&emsp; Wrong answer&nbsp; ----&nbsp;&nbsp;&nbsp<?php echo $question[5];?> </h3></center> </div>
				<div class="panel-heading"><center><h3>&emsp; No answer&emsp; ----&emsp;<?php echo $question[6];?> </h3> </center></div>
				<div class="panel-heading"><center><h3> &emsp;Your answer Percentage <br><br>
				&emsp;<?php echo $question[7];?> </h3> </div>
				
			  </div>
		</div>
		

	</div>