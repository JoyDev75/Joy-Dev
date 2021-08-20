 <?php
include "class/users.php";
$register=new users;
if($register->session()!="")
{
	$register->url("home.php");
}

?>
 
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Quiz</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
	   <div class="row">
	   <br>   
		    <div class="panel panel-danger">
			  <div class="panel-heading">Welcome to our quiz system!</div>
			  <div class="panel-body">Give quizzes and be wise😎</div>
			</div>
		<div class="col-sm-5">
				<br>   
				<br>   
				<br>   
				<br>   
			<div class="panel panel-info">
				  <div class="panel-heading">login</div>
				  <div class="panel-body">
				      <div class="panel panel-danger">
					 
				  	<?php
						if(isset($_GET['lo']) && $_GET['lo']=="fal")
						{
							echo "<div class='panel-heading'>Email or Password not matched</div>";
						}
						elseif(isset($_GET['run']) && $_GET['run']=="expire")
						{
							echo "<div class='panel-heading'>Your Session has been expire login again</div>";
						}
					?>
					 </div>
					  <form role="form" method="post" action="login.php">
						  <div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control" name="em" id="email">
						  </div>
						  <div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" name="pa" id="pwd">
						  </div>
						  <div class="checkbox">
							<label><input type="checkbox"> Remember me</label>
						  </div>
						  <button type="submit" class="btn btn-default" name="login">Submit</button>
					 </form>
				 </div> 
			</div>
		</div>
		<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<br>
			
				
				<div class="panel panel-info">
					<div class="panel-heading">Signup</div>
						  <div class="panel-body">
						  <div class="panel panel-danger">
						  <?php
								if(isset($_GET['succ']) && $_GET['succ']=="true")
								{
									echo "<div class='panel-heading'>Your Registrataion succesfull</div>";
								}
								elseif(isset($_GET['succ']) && $_GET['succ']=="already_regis")
								{
									echo "<mark>Your have already registered this email id</mark>";
								}
							?>
							</div>
							  <form role="form" method="post" action="register.php">
								  <div class="form-group">
									<label for="firstname">First Name</label>
									<input type="text" class="form-control" name="f" id="firstname">
								  </div>
								  <div class="form-group">
									<label for="lastname">Last Name</label>
									<input type="text" class="form-control" name="l" id="lastname">
								  </div>
								  <div class="form-group">
									<label for="lastname">Nick Name</label>
									<input type="text" class="form-control" name="n" id="nickName">
								  </div>
								  <div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="e" id="email">
								  </div>
								  <div class="form-group">
									<label for="pwd">Password:</label>
									<input type="password" class="form-control" name="p" id="pwd">
								  </div>
								  <div class="checkbox">
									<label><input type="checkbox"> Remember me</label>
								  </div>
								  <button type="submit" class="btn btn-default" name="signup">Submit</button>
							 </form>
						 </div> 
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-footer">&copy; copyright<p style="float:right">Developed by Joy Dev</p></div>
			</div>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="js/bootstrap.min.js"></script>
  </body>
</html>
 