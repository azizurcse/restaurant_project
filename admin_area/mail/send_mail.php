<?php
include("db.php");
	
	if(isset($_GET['order_mail'])){
	$delivery=80;
    $user_id=$_GET['order_mail'];
    $get_order="SELECT user_email,user_id FROM `order_table` where user_id='$user_id' group by user_email,user_id";
    $run_order=mysqli_query($con,$get_order);
	while($row_order=mysqli_fetch_array($run_order)){
        
		
        $customer_id=$row_order['user_id'];
        $customer_email=$row_order['user_email'];
        
	}
	
	$sql="select * from delivery_service";
	$r_sql=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($r_sql)){
		$email=$row['delivery_email'];
	}
	
	$content_sql="select * from user_info where user_id='$user_id'";
	$content_run=mysqli_query($con,$content_sql);
	
	
	while($row_content=mysqli_fetch_array($content_run)){
        
        $customer_id=$row_content['user_id'];
        $customer_name=$row_content['first_name'];
        $customer_phone=$row_content['mobile'];
	}
	$total_amtl=0;
	$delivery_charge=80;
	$content_sql_c="select * from order_table where user_id='$user_id'";
	$content_run_c=mysqli_query($con,$content_sql_c);
	
	
	while($row_content_c=mysqli_fetch_array($content_run_c)){
        
        $order_price_c=$row_content_c['total_amount'];
        $total_price_c=array($order_price_c);
		$net_price=array_sum($total_price_c);
		$total_amtl=$total_amtl+$net_price;
		$total_amt_with_delivery=$delivery_charge+$total_amtl;
	}
	
	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Send Mail to Customers for Delivery Information</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body bgcolor="#6ba2f9">
<div class="container">
	<div class="row">
		<h3>Send Mail to Customers for Delivery Information</h3>
		<div class="col-md-6">
		<form action="mail/new_index.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label">Enter Email Address: </label>
					<input type="text" name="email" class="form-control" value="<?php echo $customer_email;?>">
				</div>
				
				
				<div class="form-group">
					<textarea name="comment" rows="4" cols="50" class="form-control">
						<?php echo $customer_name;?> order is on the way.Total price is:<?php echo $total_amt_with_delivery;?>taka.Please check your mail for details.Thank You.<?php echo $customer_phone;?>
					</textarea>
				</div>
				
				<!--  here is option-->
				
				
				 <select name="delivery_man">
                            <option></option>
                              
                              /*
                                    -------------
                                    ------FROM DATABASE GETTING FOOD CATEGORIES QUERY-------
                                    -------------
                                    */

                              
                              <?php
							
                                 $restaurant_cat="select * from delivery_service";
    
                                 $run_restaurant_query=mysqli_query($con,$restaurant_cat);
    
                                while($row_restaurant=mysqli_fetch_assoc($run_restaurant_query))
                                {
                                  $res_cat_id=$row_restaurant['delivery_man_id'];
                                  $res_cat_title=$row_restaurant['delivery_email'];
        
                                  echo "<option>$res_cat_title</option>";
                                }
                              
                              ?>
                              
                              
                          </select>
				
				
				
				
				
				
				
				
				
				
				
			<!--	<div class="form-group">
					<label class="control-label">Enter Email Address: </label>
					<input type="text" name="delivery_man" class="form-control">
				</div>-->
				
				<div class="form-group">
					<label class="control-label">Enter Order Details </label>
					<input type="file" name="order_image" class="form-control">
				</div>
				
				<div class="form-group">
					<label class="control-label">Enter Attachment Title </label>
					<input type="text" name="attach_title" class="form-control">
				</div>
				
				<div class="form-group">
					<input type="submit" name="submit" value="Send Message" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>