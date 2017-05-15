<?php

$user_id=$_SESSION["uid"];
include "database_connection.php";


$user_id=$_SESSION["uid"];
$get_img="select * from user_info where user_id='$user_id'";
 $run_img=mysqli_query($con,$get_img);
 $row_img=mysqli_fetch_array($run_img);
 $customer_id=$row_img["user_id"];
$customer_image=$row_img["customer_image"];
$customer_fname=$row_img["first_name"];
$customer_lname=$row_img["last_name"];
 $customer_email=$row_img["email"];
 $customer_mobile=$row_img["mobile"];
$customer_address1=$row_img["address1"];
$customer_address2=$row_img["address2"];
?>

<div>
	<form action="" method="post">
		<span>First Name:</span><input type="text" name="fname" value="<?php echo $customer_fname;?>"/><br/><br/>
		<span>Last Name:</span><input type="text" name="lname" value="<?php echo $customer_lname;?>"/><br/><br/>
		<span>Email No&nbsp;&nbsp;:</span><input type="email" name="email" value="<?php echo $customer_email;?>"/><br/><br/>
		<span>Mobile No:</span><input type="text" name="mobile" value="<?php echo $customer_mobile;?>"/><br/><br/>
		<span>Address1 :</span><input type="text" name="address1" value="<?php echo $customer_address1;?>"/><br/><br/>
		<span>Address2 :</span><input type="text" name="address2" value="<?php echo $customer_address2;?>"/><br/>
		<input type="submit" name="submit" value="Update"/>
	</form>
</div>

<?php
if(isset($_POST["submit"])){
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$address1=$_POST["address1"];
	$address2=$_POST["address2"];
	$sql="UPDATE `user_info` SET `first_name` = '$fname', `last_name` = '$lname', 
	`email` = '$email', `mobile` ='$mobile', `address1` = '$address1', `address2` = '$address2'
	WHERE `user_info`.`user_id` = '$customer_id'";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		echo"
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Account successfully Updated</b>
		</div>
		
		";
		echo "<script>window.open('dashboard.php','_self'</script>";
	}
	
}

?>