<?php
include "database_connection.php";
if(isset($_POST['registration']))
{
$f_name=$_POST["f_name"];
$l_name=$_POST["l_name"];
$email=$_POST["email"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$image=$_FILES['image']['name'];
$image_tmp=$_FILES['image']['tmp_name'];
$mobile=$_POST["mobile"];

$address1=$_POST["address1"];
$address2=$_POST["address2"];
move_uploaded_file($image_tmp,"admin_area/customer_images/$image");

$name="/^[A-Z][a-zA-Z ][_a-z0-9]+$/";
$emailValidation="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number="/^[0-9]+$/";

if(empty($f_name) || empty($l_name) || empty($email)
	|| empty($password) || empty($repassword) || empty($mobile) || empty($image)
|| empty($address1) || empty($address2)){
	echo "
		<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>please fill the all fields</b>
		</div>
	";
	exit();
	
}else{
	
	if(!preg_match($name,$f_name)){
	echo "
		<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This $f_name is not Valid</b>
		</div>
	";
		exit();
	}

	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This $l_name is not Valid</b>
		</div>
		";
		exit();
	}

	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This $email is not Valid</b>
		</div>
		";
		exit();
	}
	if(strlen($password) < 8 ){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>password is week</b>
		</div>
		";
		exit();
	}
	if(strlen($repassword) < 8 ){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>password is week</b>
		</div>
		";
		exit();
	}
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>not match the password</b>
		</div>
		";
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This $mobile is not Valid</b>
		</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 11)){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>mobile is not valid</b>
		</div>
		";
		exit();
	}
	//insert this data in database
	$sql="select user_id from user_info where email='$email' limit 1";
	$check_query=mysqli_query($con,$sql);
	$count_email=mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Try another email..</b>
		</div>
		.";
		exit();
	}else{
		
		$password=md5($password);
		$sql="INSERT INTO `user_info` (`first_name`, `last_name`, `email`, `password`,
		`mobile`,`customer_image`, `address1`, `address2`) VALUES ('$f_name', '$l_name', '$email',
		'$password', '$mobile', '$image','$address1', '$address2')";
		$run_query=mysqli_query($con,$sql);
		if($run_query){
			echo "
				<div class='alert alert-success'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>You are Registered successfully</b>
		</div>
		<script>window.open('food_page.php','_self')</script>
			";
		}
	}
}

}
?>