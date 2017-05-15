<?php
include("includes/db.php");
$get_cat_id=$_GET['edit_area'];
$sql="select * from area_category where area_id='$get_cat_id'";
$run_sql=mysqli_query($con,$sql);
$row_sql=mysqli_fetch_array($run_sql);
$cat_id=$row_sql['area_id'];
$cat_title=$row_sql['area_title'];

?>


<div>
	<form action="" method="post">
		<b>Edit Category</b>
		<input type="text" name="edit_area" value="<?php echo $cat_title;?>"/>
		<input type="submit" name="update_area" value="Update" style="margin-top:5px;"/>
	</form>
</div>

<?php 
include("includes/db.php");
	if(isset($_POST['update_area'])){
		$update_id=$cat_id;
		$cat_title=$_POST['edit_area'];
		$sql="update area_category set area_title='$cat_title' where area_id='$update_id'";
		$run_sql=mysqli_query($con,$sql);
		if($run_sql){
			echo "<script>alert('A is Updated)</script>";
			echo "<script>window.open('admin.php?restaurant_area_view','_self')</script>";
		}
	}
?>