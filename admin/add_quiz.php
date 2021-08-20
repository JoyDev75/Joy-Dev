<?php
include "../class/users.php";
$addquiz=new users;
extract($_POST);
if(isset($quiz))
{
 

 	$array=[$first,$second,$third,$fourth];
	$ans=array_search($answer, $array);
	$first=htmlentities($first);
	$second=htmlentities($second);
	$third=htmlentities($third);
	$fourth=htmlentities($fourth);
	$ans=htmlentities($ans);
  $images = [];
  if(isset($_FILES['img']) && count($_FILES['img'])){
    for ($i=0;$i< count($_FILES['img']['name']);$i++) {
      if(!empty($_FILES['img']['name'][$i])){
        $dest = "img/".$_FILES['img']['name'][$i];
        move_uploaded_file($_FILES['img']['tmp_name'][$i],$dest);
      }     
    }
    $images = $_FILES['img']['name'];
  }
	$qu="INSERT INTO questions (question,answer1,answer2,answer3,answer4,answer,cat_id,status,img1,img2,img3,img4,img5)
   VALUES('$question','$first','$second','$third','$fourth','$ans'
   ,'$cat','0','$images[0]','$images[1]','$images[2]','$images[3]','$images[4]')";
	if($addquiz->add_quiz_questions($qu))
	{
		echo "<div class='alert alert-success'>";
    echo "<strong>Success!</strong> Question has been successfully added";
    echo "</div>";
	}	 
} 
?>  
  <h2>Add Quiz Form </h2>
  <div class="alert alert-success">
  <strong>Note!</strong> Images is optional 
</div>
  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Questions</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="question" placeholder="" required>&nbsp;
        <input type="file" name="img[]"  id='img5' class="option">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Option1</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" name="first" placeholder="" required>&nbsp;
        <input type="file" name="img[]"  id='img1' class="option">
        
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Option2</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" name="second" placeholder="" required>&nbsp;
         <input type="file" name="img[]"  id='img2' class="option">
          
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Option3</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" name="third" placeholder="" required>&nbsp;
        <input type="file" name="img[]"  id='img3' class="option">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Option4</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" name="fourth" placeholder="" required>&nbsp;
        <input type="file" name="img[]"  id='img4' class="option">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Answer</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" name="answer" placeholder="" required>&nbsp;
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Category</label>
      <div class="col-sm-10">  
	   <select class="form-control" id="sel1" name="cat">
		<?php
		$data=$addquiz->categoryShow();

		foreach($data as $result)
		{
			echo "<option value='".$result['id']."' >".$result['category']."</option>";
		}
		
		?>
      </select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="quiz">Submit</button>
      </div>
    </div>
  </form>
