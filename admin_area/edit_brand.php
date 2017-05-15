<?php
include("includes/db.php");
$get_brand_id=$_GET['edit_brand'];
$sql="select * from brands where brand_id='$get_brand_id'";
$run_sql=mysqli_query($con,$sql);
$row_sql=mysqli_fetch_array($run_sql);
$brand_id=$row_sql['brand_id'];
$brand_title=$row_sql['brand_title'];

?>



<div>
	<form action="" method="post">
		<b>Edit Brand</b>
		<input type="text" name="edit_brand" value="<?php echo $brand_title; ?>"/>
		<input type="submit" name="update_brand" value="Send" style="margin-top:5px;"/>
	</form>
</div>


<?php 

	if(isset($_POST['update_brand'])){
		$update_id=$get_brand_id;
		$brand_title=$_POST['edit_brand'];
		$sql="update brands set brand_title='$brand_title' where brand_id='$update_id'";
		$run_sql=mysqli_query($con,$sql);
		if($run_sql){
			echo "<script>alert('brand is Updated)</script>";
			echo "<script>window.open('admin.php?view_food_brands','_self')</script>";
		}
	}
?>