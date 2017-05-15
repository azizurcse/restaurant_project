<div>
	<form action="" method="post">
		<b>Insert New Category Section</b>
		<input type="text" name="add_category"/>
		<input type="submit" name="category" value="Send" style="margin-top:5px;"/>
	</form>
</div>

<?php 
include "database_connection.php";
	if(isset($_POST['category'])){
		
		$cat_name=$_POST['add_category'];
		$sql="insert into categories (cat_title) values ('$cat_name')";
		$run_sql=mysqli_query($con,$sql);
		if($run_sql){
			echo "<script>alert('New Category is Added)</script>";
			echo "<script>window.open('admin.php?view_food_category','_self')</script>";
		}
	}
?>