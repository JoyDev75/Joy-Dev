<?php
session_start();
 if($_SESSION['admin']=="")
{
	header("location:login.php");
} 
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/favicon.ico">
	 <link href="../css/bootstrap.min.css" rel="stylesheet">
	 <link href="../css/sidebar.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	
    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Welcome admin <?php //echo $_SESSION['admin'];?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		  <li><a href="index.php">Home</a></li>
            <li><a href="logout.php?log=logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="top:52px">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Dashboard
                    </a>
                </li>
				<li>
                    <a href="index.php?option=over">Overview</a>
                </li>
                <li>
                    <a href="index.php?option=cat">Add category</a>
                </li>
                <li>
                    <a href="index.php?option=quiz">Add New Quiz</a>
                </li>
				<li>
                    <a href="index.php?option=delete_cat">Delete Category</a>
                </li>
                <li>
                    <a href="index.php?option=user_result">All User Quiz Results</a>
                </li>


            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row"> 
				<div class="col-lg-2"></div>
                    <div class="col-lg-6">
					<?php if(isset($_GET['suc']) && $_GET['suc']=="true"){echo "<h2>Delete Succesfully</h2>";}?>
					<?php if(isset($_GET['delt']) && $_GET['delt']=="delete_cat"){echo "<h2>Delete Succesfully category</h2>";}?>
					<?php if(isset($_GET['add']) && $_GET['add']=="cat"){echo "<h2>Added Succesfully category</h2>";}?>
							<?php
							extract($_GET);
							switch(@$option)
							{
								case "cat":
								include "add_category.php";
								break;
								case "quiz":
							    include "add_quiz.php";
								break;
								case "over":
							    include "overview.php";
								break;
								case "delete_cat":
							    include "delete_cat.php";
								break;
                                case "user_result":
                                include "user_result.php";
                                break;
                                case "delete_quiz":
                                include "user_result.php";
                                break;
                                case "show_quiz":
                                include "showquiz.php";
                                break;
							}
							?>
							
                    </div>
				<div class="col-lg-4"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
				<div class="panel panel-default" style="margin-top:400px">
					<div class="panel-footer">&copy; copyright<p style="float:right">Developed by Joy Dev</p></div>
				</div>
		 
    </div>

 <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
