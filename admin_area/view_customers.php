<table width="100%" align="center">
    <tr align="center">
        <td colspan="5"><h2 >View All Customers here</h2></td>
    </tr>
    <tr align="center">
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        
        <th>Delete</th>
    </tr>
    
    <?php 
    include("includes/db.php");
    $get_customer="select * from user_info";
    $run_customer=mysqli_query($con,$get_customer);
    
    
    $i=0;
    while($row_customer=mysqli_fetch_array($run_customer)){
        
        $customer_id=$row_customer['user_id'];
        $customer_fname=$row_customer['first_name'];
        $customer_lname=$row_customer['last_name'];
        $customer_email=$row_customer['email'];
        $customer_image=$row_customer['customer_image'];
        
        $i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $customer_fname." ".$customer_lname; ?></td>
		<td><?php echo $customer_email; ?></td>
        <td><img src="customer_images/<?php echo $customer_image; ?>" width="55" height="55"/></td>
        

        <td><a href="delete_customers.php?delete_customers=<?php echo $customer_id; ?>">Delete</a></td>
    </tr>
    
    <?php } ?>
    
    
</table>