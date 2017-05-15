<div>
	<form action="" method="post">
		<b>Insert New Restaurant Category</b>
		<input type="text" name="add_restaurant_category"/>
		<input type="submit" name="restaurant_category" value="Send" style="margin-top:5px;"/>
	</form>
</div>

<?php 
include("includes/db.php");
	if(isset($_POST['restaurant_category'])){
		
		$brand_name=$_POST['add_restaurant_category'];
		$sql="insert into restaurant_category (restaurant_cat_title) values ('$brand_name')";
		$run_sql=mysqli_query($con,$sql);
		if($run_sql){
			echo "<script>alert('New Restaurant Category is Added)</script>";
			echo "<script>window.open('admin.php?restaurant_category_view','_self')</script>";
		}
	}
?>