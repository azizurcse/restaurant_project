<?php
include("includes/db.php");
if(isset($_GET['order_details'])){
    $user_id=$_GET['order_details'];
    $get_order="SELECT * FROM user_info where user_id='$user_id'";
    $run_order=mysqli_query($con,$get_order);
	while($row=mysqli_fetch_array($run_order)){
		$fname=$row['first_name'];
		$lname=$row['last_name'];
		$address=$row['address1'];
		$mobile=$row['mobile'];
	}
}
?>

<form method="post" action="make_pdf.php">
<table width="100%" align="center" border="1">
	<caption style="display:table-caption;text-align:center;">Customer Orders Details</caption></center>
    <tr>
        <td colspan="6">Customer Name: &nbsp; <?php echo $fname." ".$lname;?>,&nbsp;&nbsp;Address:&nbsp; <?php echo $address;?>,&nbsp;<span>CustomerNumber:<?php echo $mobile;?></span></td>
        
    </tr>
    <tr align="center">
        <th>S.N</th>
        <th>Food Title</th>
        <th>Image</th>
        <th>Price</th>
		<th>Quantity</th>
        <th>Total Price</th>
       
    </tr>
    
    <?php 
    include("includes/db.php");
	
	if(isset($_GET['order_details'])){
    $user_id=$_GET['order_details'];
    $get_order="SELECT * FROM order_table where user_id='$user_id'";
    $run_order=mysqli_query($con,$get_order);
    $total_amt=0;
    $delivery_charge=80;
    $i=0;
    while($row_order=mysqli_fetch_array($run_order)){
        
        $order_id=$row_order['id'];
        
        $food_id=$row_order['f_id'];
        $user_id=$row_order['user_id'];
        $food_title=$row_order['food_title'];
        $food_image=$row_order['food_image'];
        $quantity=$row_order['quantity'];
        
       
        $food_price=$row_order['price'];
        $food_tl_price=$row_order['total_amount'];
		
		$total_price=array($food_tl_price);
		$net_price=array_sum($total_price);
		$total_amt=$total_amt+$net_price;
		$total_amt_with_delivery=$delivery_charge+$total_amt;
		
        //$delivery_tl_price=$delivery_charge+$food_tl_price;
		$i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
		<td><?php echo $food_title; ?></td>
        <td><img src='food_images/<?php echo $food_image; ?>'" width="55" height="55"/></td>
        
        <td><?php echo $food_price; ?></td>
		<td><?php echo $quantity; ?></td>
        <td><?php echo $food_tl_price; ?></td>
        
        
        
        
    </tr>
    
    <?php } }?>
     <tr>
        
        <td colspan="6">Delivery charge: 80 tk, &nbsp;&nbsp;<span>Total(includes delivery):&nbsp;<?php echo $total_amt_with_delivery;?>taka</span></td>
        
    </tr>
    
</table>

<br>
<!--<input type="submit" name="submit" value="make pdf"/>-->
</form>


<center><a href="admin.php?order_mail=<?php echo $user_id; ?>"><button class="btn btn-primary">Send Mail</button></a>

<a href="admin.php?view_orders"><button class="btn btn-primary">Back</button></a></center>