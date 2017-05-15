<?php
include("includes/db.php");
$get_brand_id=$_GET['edit_res_cat'];
$sql="select * from restaurant_category where restaurant_cat_id='$get_brand_id'";
$run_sql=mysqli_query($con,$sql);
$row_sql=mysqli_fetch_array($run_sql);
$brand_id=$row_sql['restaurant_cat_id'];
$brand_title=$row_sql['restaurant_cat_title'];

?>



<div>
	<form action="" method="post">
		<b>Edit Brand</b>
		<input type="text" name="edit_restaurant_cat" value="<?php echo $brand_title; ?>"/>
		<input type="submit" name="update_restaurant_cat" value="Send" style="margin-top:5px;"/>
	</form>
</div>


<?php 

	if(isset($_POST['update_restaurant_cat'])){
		$update_id=$get_brand_id;
		$brand_title=$_POST['edit_restaurant_cat'];
		$sql="update restaurant_category set restaurant_cat_title='$brand_title' where restaurant_cat_id='$update_id'";
		$run_sql=mysqli_query($con,$sql);
		if($run_sql){
			echo "<script>alert('brand is Updated)</script>";
			echo "<script>window.open('admin.php?restaurant_category_view','_self')</script>";
		}
	}
?>