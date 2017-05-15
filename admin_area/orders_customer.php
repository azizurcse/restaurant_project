<table width="100%" align="center" border="1">
    
        <center><h2>View All Customers Orders</h2></center>
    
    <tr align="center">
        <th>S.N</th>
        <th>Customer Email</th>
        
        <th>Action</th>
    </tr>
    
    <?php 
    include("includes/db.php");
    $get_order="SELECT user_email,user_id FROM `order_table` group by user_email,user_id";
    $run_order=mysqli_query($con,$get_order);
    
    
    $i=0;
    while($row_order=mysqli_fetch_array($run_order)){
        
        $customer_id=$row_order['user_id'];
        $customer_email=$row_order['user_email'];
        //$food_id=$row_order['f_id'];
        //$user_id=$row_order['user_id'];
        //$food_title=$row_order['food_title'];
        //$food_image=$row_order['food_image'];
        //$quantity=$row_order['quantity'];
        
       
        //$food_price=$row_order['price'];
        //$food_tl_price=$row_order['total_amount'];
        
		//$get_customer="select * from user_info where user_id='$user_id'";
		//$run_customer=mysqli_query($con,$get_customer);
		//$row_customer=mysqli_fetch_array($run_customer);
		//$customer_email=$row_customer['email'];
		$i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $customer_email; ?></td>
        
        
        <td>
		<a href="admin.php?order_details=<?php echo $customer_id; ?>">Order Details</a>|
		<a href="delete_c_order.php?order_delete=<?php echo $customer_id; ?>">Delete Customer Orders</a>
		</td>
    </tr>
    
    <?php } ?>
    
    
</table>