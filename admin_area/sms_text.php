<?php
include("includes/db.php");
if(isset($_GET['sms_text'])){
    $user_id=$_GET['sms_text'];
    $get_order="SELECT * FROM user_info where user_id='$user_id'";
    $run_order=mysqli_query($con,$get_order);
	while($row=mysqli_fetch_array($run_order)){
		$fname=$row['first_name'];
		$lname=$row['last_name'];
		
	}
	
	$get_order="SELECT * FROM order_table where user_id='$user_id'";
    $run_order=mysqli_query($con,$get_order);
    
    $delivery_charge=80;
    
    while($row_order=mysqli_fetch_array($run_order)){
        
        $food_tl_price=$row_order['total_amount'];
        $delivery_tl_price=$delivery_charge+$food_tl_price;
}
}
?>

<p>Restaurant information system</p>
<p><?php echo $fname." ".$lname;?> order is on the way.Total price is:<?php echo $delivery_tl_price;?>.Please check your mail.<span>Thank You.</span></p>
<a href="admin.php?view_orders">Back</a>