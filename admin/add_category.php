<?php
include "../class/users.php";
$category=new users;
extract($_POST);
if(isset($submit))
{
	$category->add_category($cat);
	//echo "Successfully add categoery";
	$category->url("index.php?add=cat");exit;
}

?>
<form role="form" method="post" >
  <div class="form-group">
    <label for="pwd">Add Category</label>
    <input type="text" class="form-control" name="cat" id="pwd" required> 
  </div>
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>