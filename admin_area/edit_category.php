<?php
include("includes/db.php");
$get_cat_id=$_GET['edit_category'];
$sql="select * from categories where cat_id='$get_cat_id'";
$run_sql=mysqli_query($con,$sql);
$row_sql=mysqli_fetch_array($run_sql);
$cat_id=$row_sql['cat_id'];
$cat_title=$row_sql['cat_title'];

?>


<div>
	<form action="" method="post">
		<b>Edit Category</b>
		<input type="text" name="edit_category" value="<?php echo $cat_title;?>"/>
		<input type="submit" name="update_category" value="Update" style="margin-top:5px;"/>
	</form>
</div>

<?php 
include("includes/db.php");
	if(isset($_POST['update_category'])){
		$update_id=$cat_id;
		$cat_title=$_POST['edit_category'];
		$sql="update categories set cat_title='$cat_title' where cat_id='$update_id'";
		$run_sql=mysqli_query($con,$sql);
		if($run_sql){
			echo "<script>alert('Category is Updated)</script>";
			echo "<script>window.open('admin.php?view_food_category','_self')</script>";
		}
	}
?>