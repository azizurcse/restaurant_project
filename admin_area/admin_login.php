<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Restaurant Information System</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<form method="post" action="">
	<center><h2><?php echo @$_GET['not_admin']; ?></h2></center>
	<center><h2><?php echo @$_GET['logged_out']; ?></h2></center>
  <header>Admin Login</header>
  <label>Email <span>*</span></label>
  <input type="text" name="email" required="required"/>
  
  <label>Password <span>*</span></label>
  <input type="password" name="password" required="required"/>
  
  <button type="submit" name="login">Login</button>
</form>
  
  
</body>
</html>

<?php
session_start();
include("includes/db.php");
if(isset($_POST['login'])){
	
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$pass=mysqli_real_escape_string($con,$_POST['password']);
	
	$sel_user="select * from admin where admin_email='$email' AND admin_password='$pass'";
	$run_qry=mysqli_query($con,$sel_user);
	$check_user=mysqli_num_rows($run_qry);
	if($check_user==1){
		
		$_SESSION['admin_email']=$email;
		echo "<script>window.open('admin.php?logged_in=welcome to admin panel','_self')</script>";
		
	}else{
		
		echo "<script>alert('Password or email is incorrect,try again')</script>";
	}
}


?>
