<?php
session_start();
$user_id=$_SESSION["uid"];
include "database_connection.php";
if(isset($_POST["logs"])){
	$image=$_FILES['image']['name'];
	$image_tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($image_tmp,"admin_area/customer_images/$image");
	$qry="update user_info set customer_image='$image' where user_id='$user_id'";
	$run_query=mysqli_query($con,$qry);
	if($run_query){
		
		echo"
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Image is Updated</b>
		</div>
		
		";
		header("location:dashboard.php");
	
	}
	
}
?>