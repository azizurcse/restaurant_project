<?php
include "database_connection.php";
session_start();
// it is the login function and how it works php process
if(isset($_POST["userLogin"])){
	$email=mysqli_real_escape_string($con,$_POST["userEmail"]);
	$password=md5($_POST["userPassword"]);
	$sql="SELECT * FROM user_info where email='$email' AND password='$password'";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if($count == 1){
		$row=mysqli_fetch_array($run_query);
			$_SESSION["uid"]=$row["user_id"];
			$_SESSION["name"]=$row["first_name"];
			echo "Trueddddd";
		
	}
	
}
// end it is the login function and how it works php process
?>