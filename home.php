<?php
include "class/users.php";
$profile=new users;
$profile->category($_SESSION['id']);
$email=$_SESSION['email'];
$profile->profile($email);
if($profile->session()=="")
{
	$profile->url("index.php?run=expire");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Quiz for You</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>

<div class="container">
  <h2>Home</h2>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Profile</a></li>
    <li><a data-toggle="tab" href="#menu2">Your Quiz</a></li>
    <li style="float:right"><a  href="logout.php?run=log">Logout</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Quiz Site</h3>
	 <center>
		
	 <button type="button" class="btn btn-primary btn-lg" name="start_quiz" data-toggle="collapse" data-target="#demo">Start Quiz </button>&emsp;

	 </center>
	 <br>
	 <br>
		  <div id="demo" class="collapse">
		   <div class="container">
			   <div class="row">
					<div class="col-sm-4"></div>			     
						   <div class="col-sm-4">
						   <form role="form" method="post" action="category.php">
								<div class="form-group">
								  <label for="sel1">Choose your category:</label>
							
								  <select class="form-control" id="sel1" name="cat">
									<?php
									foreach($profile->data as $cat)
									{
									?>
										<option value="<?php echo $cat[0];?>"><?php echo $cat[1];?></option>
									<?php
									}
									?>
								  </select>
								</div>
								<button type="submit" class="btn btn-default" name="submit">Submit</button>
							</form>
							</div>
							
					   <div class="col-sm-4"></div>  
			  </div>
		  </div>
	  </div>
    </div>
	
	
    <div id="menu1" class="tab-pane fade">
      <h3>Profile</h3>
	 <div class="table-responsive">          
		  <table class="table">
			<thead>
			  <tr>
				<th>Id</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
			  </tr>
			</thead>
		  
		
		  <?php 
			foreach($profile->pro as $data)
				{					
					echo "<tbody>
						  <tr>
							<td>".$data->id."</td>
							<td>".$data->fname."</td>
							<td>".$data->lname."</td>
							<td>".$data->email."</td>
						  </tr>
				      </tbody>";
				}
		?>
		</table>
		</div>
	</div>
    <div id="menu2" class="tab-pane fade">
      <h3>Your Quiz</h3>
      <p>jjjjj.......</p>
    </div>
	<br>


	</div>

		<div class="panel panel-default" style="margin-top:200px">
			<div class="panel-footer">&copy; copyright<p style="float:right">Developed by Joy</p></div>
		</div>
	
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
<?php

 

?>