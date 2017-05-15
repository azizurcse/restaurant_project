<div>
	<form action="" method="post">
		<b>Insert New Area</b>
		<input type="text" name="add_area"/>
		<input type="submit" name="area" value="Send" style="margin-top:5px;"/>
	</form>
</div>

<?php 
include("includes/db.php");
	if(isset($_POST['area'])){
		
		$area_name=$_POST['add_area'];
		$sql="insert into area_category (area_title) values ('$area_name')";
		$run_sql=mysqli_query($con,$sql);
		if($run_sql){
			echo "<script>alert('New Area is Added)</script>";
			echo "<script>window.open('admin.php?restaurant_area_view','_self')</script>";
		}
	}
?>