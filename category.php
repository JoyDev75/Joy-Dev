<?php 
include "class/users.php";
$category=new users;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript">
	function timeout()
	{
		
		var minute=Math.floor(timeLeft/60);
		var second=timeLeft%60;
		var mint=checktime(minute);
		var sec=checktime(second);
		if(timeLeft<=0)
		{
			clearTimeout(tm);
			document.getElementById("form1").submit();
		}
		else
		{

			document.getElementById("time").innerHTML=minute+":"+second;
		}
		timeLeft--;
		var tm= setTimeout(function(){timeout()},1000);
	}
	function checktime(msg)
	{
		if(msg<10)
		{
			msg="0"+msg;
		}
		return msg;
	}
	</script>
  
  <title>Quizzzzz
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body onload="timeout()" >

<div class="container">
  <h2>Quizzzzz
  <script type="text/javascript">
		  var timeLeft=4*60;
		  
		  </script>
		  
		  <div id="time"style="float:right">timeout</div></h2>

  <ul class="nav nav-tabs">
    <li><a  href="index.php">Home</a></li>
    <li style="float:right"><a  href="index.php">back</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
	 <center>
	<h1>Questions</h1>
	 </center>
<?php
extract($_POST);
if(isset($submit))
{
$_SESSION['cat']=$cat;
$category->questions_show($cat);
$sr=1;
//echo "<pre>";
$_SESSION['total_ques']=count($category->ques_show);

?>

<?php foreach($category->ques_show as $ques){ ?>
	
	<?php //echo $ques[2];?>
	 <center><table style='width:70%' class='table table-bordered'>
	<form  method='post' id="form1" action="answer.php" >
		<input type="hidden" name='cat_id' value="<?php echo $cat; ?>">
		<thead>
		  <tr class='success'>
			<th><?php echo $sr++." - ".$ques['question'];?>
				<?php if(isset($ques['img1']) && !empty($ques['img1'])){ ?>
				<img src="<?php echo "admin/img/".$ques['img1']; ?>" width="250px" height="250px">
			<?php  } ?>
			</th>
		  </tr>
		</thead>
		<tbody>
			<?php if(isset($ques['answer1']) ){ ?>
			<tr class='info'>
				<td>1 &nbsp; <input type="radio" value="0" name="<?php echo $ques['id'];?>" >&nbsp;<?php echo $ques['answer1'];?>
				<?php if(isset($ques['img2']) && !empty($ques['img2'])){ ?>
				<img src="<?php echo "admin/img/".$ques['img2']; ?>" width="250px" height="250px">
			<?php  } ?>
			</td>

			</tr>
			<?php }?>
			<?php if(isset($ques['answer2']) ){ ?>
			<tr class='info'>
				<td>2 &nbsp; <input type="radio" value="1" name="<?php echo $ques['id'];?>" >&nbsp;<?php echo $ques['answer2'];?>
				<?php if(isset($ques['img3']) && !empty($ques['img3'])){ ?>
				<img src="<?php echo "admin/img/".$ques['img3']; ?>" width="250px" height="250px">
			<?php  } ?>
				</td>
				
			</tr>
			<?php }?>
			<?php if(isset($ques['answer3']) ){ ?>
			<tr class='info'>
				<td>3 &nbsp; <input type="radio" value="2" name="<?php echo $ques['id'];?>" >&nbsp;<?php echo $ques['answer3'];?>
                 <?php if(isset($ques['img4']) && !empty($ques['img4'])){ ?>
				<img src="<?php echo "admin/img/".$ques['img4']; ?>" width="250px" height="250px">
			<?php  } ?>
				</td>
			</tr>
			<?php }?>
			<?php if(isset($ques['answer4']) ){ ?>
			<tr class='info'>
				<td>4 &nbsp; <input type="radio" value="3" name="<?php echo $ques['id'];?>" >&nbsp;<?php echo $ques['answer4'];?>
			<?php if(isset($ques['img5']) && !empty($ques['img5'])){ ?>
				<img src="<?php echo "admin/img/".$ques['img5']; ?>" width="250px" height="250px">
			<?php  } ?>
				</td>
			</tr>
			<?php }?>
			<tr class='info'>
				<td> &nbsp; <input type="radio" value="5" checked="checked" style="display:none" name="<?php echo $ques['id'];?>" ></td>
			</tr>
	</tbody>
	  </table></center>
		<?php }?>
	
			<center><button type='submit' class='btn btn-default'>Submit</button></center>
	</form>
<?php
}
?> 
    </div>
	</div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>










