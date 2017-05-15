<?php

if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('admin_area/admin_login.php?not_admin=you are not an admin','_self')</script>";
}else{
	


?>

<div>
	<form action="" method="post">
		<b>Insert New Brand</b>
		<input type="text" name="add_brand"/>
		<input type="submit" name="brand" value="Send" style="margin-top:5px;"/>
	</form>
</div>

<?php 
include("includes/db.php");
	if(isset($_POST['brand'])){
		
		$brand_name=$_POST['add_brand'];
		$sql="insert into brands (brand_title) values ('$brand_name')";
		$run_sql=mysqli_query($con,$sql);
		if($run_sql){
			echo "<script>alert('New brand is Added)</script>";
			echo "<script>window.open('admin.php?view_food_brands','_self')</script>";
		}
	}
?>


<?php } ?>