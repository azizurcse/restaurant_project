<?php
$user_id=$_SESSION["uid"];


?>
<div>
	<form action="" method="post">
		<span>Current Password:</span><input type="password" name="c_password"/><br/><br/>
		<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Password:</span><input type="text" name="n_password"/><br/><br/>
		<span>Confirm Password:</span><input type="text" name="cn_password"/><br/>
		
		<input type="submit" name="c_p_update" value="Update"/>
	</form>
</div>


<?php

include "database_connection.php";

if(isset($_POST["c_p_update"])){
	$current_pass=md5($_POST["c_password"]);
	$new_pass=md5($_POST["n_password"]);
	$new_pass_con=md5($_POST["cn_password"]);
	$sql="select * from user_info where password='$current_pass' AND user_id='$user_id'";
	$run_query=mysqli_query($con,$sql);
	$check_pass=mysqli_num_rows($run_query);
	if($check_pass == 0){
		echo"
		<div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Current Password is not match</b>
		</div>
		
		";
		exit();
	}
	if($new_pass !=$new_pass_con){
		echo"
		<div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>New Password is not match</b>
		</div>
		
		";
		exit();
	}else{
		$up_sql="update user_info set password='$new_pass' where user_id='$user_id'";
		$run_u_query=mysqli_query($con,$up_sql);
		echo"
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Password is Updated</b>
		</div>
		
		";
		echo "<script>window.open('dashboard.php','_self'</script>";
		
	}
	
}

?>