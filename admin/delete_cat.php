<?php
include "../class/users.php";
$del_cat=new users;
$data=$del_cat->category();
//print_r($data);

?>


<table class="table table-bordered">
    <thead>
      <tr class="success">
        <th>Sr</th>
        <th>Category</th>
        <th>Delete</th>
      </tr>
    </thead>
	<?php $sr=1; ?>
	<?php foreach($data as $category=>$cat){?>
    <tbody>
      <tr class="danger">
        <td><?php echo $sr++ ;?></td>		
        <td><?php echo $cat[1];?></td>
		<td><a href="cat_delt.php?id=<?php echo $cat[0];?>">Delete</a></td>
      </tr>
    </tbody>
	<?php }?>
  </table>