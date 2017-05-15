<?php
include "database_connection.php";
if(isset($_GET["id"])){
	$id=$_GET["id"];
	$sql="DELETE FROM bookmark WHERE bookmark_id='$id'";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		
		echo"
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Restaurant deleted</b>
		</div>
		
		";
		header("location:dashboard.php?bookmark_res");
	}
	
}
?>