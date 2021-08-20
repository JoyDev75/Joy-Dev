<?php
include "../class/users.php";
$login=new users;
extract($_POST);
if(isset($submit))
{
	//$query="select * from quiz_login where"
	if($login->admin_login($em,$pass))
	{
		$_SESSION['admin']=$em;
		$login->url("index.php");
	}
	else
	{
		$error="Wrong email or password";
	}
}
/* if(!$login->admin_session())
{
	$login->url("login.php");
}  
 */

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		  <br>
		  <br>
		      <div class="panel panel-danger">
				  <div class="panel-heading">Admin Login</div><br>
					  <center><strong><?php echo @$error;?></strong></center>
				  
				  <div class="panel-body">		  
					  <form role="form" method="post">
						<div class="form-group">
						  <label for="email">Email:</label>
						  <input type="email" class="form-control" id="email" placeholder="Enter email" name="em">
						</div>
						<div class="form-group">
						  <label for="pwd">Password:</label>
						  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
						</div>
						<button type="submit" class="btn btn-default" name="submit">Submit</button>
					  </form>
				  </div>
			  </div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body> 
</html>