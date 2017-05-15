<?php

include ('db.php');
$id=$_GET['c_id'];

if(isset($_POST['submit'])){
	$studentName=$_POST['studentName'];
	
	$address=$_POST['address'];
	$email=$_POST['email'];
	$image=$_FILES['image']['name'];
	$tmp_image=$_FILES['image']['tmp_name'];
	$mobileNo=$_POST['mobileNo'];
	move_uploaded_file($tmp_image,"customers/customer_images/$image");
	
	
	$query="update customer_table SET customer_name='$studentName',	customer_address='$address',customer_email='$email',customer_image='$image' where customer_id='$id'";
	
	

	
	$query_check=mysqli_query($link,$query);
	
	if($query_check){
   echo "<script>alert('your account updated')</script>";
    echo "<script>window.open('customer_profile.php','_self')</script>";
	}
}
