<?php

$c_email=$_SESSION['customer_email'];
include("functions/functions.php");
$query="select * from customer_table where customer_email='$c_email'";
$run_query=mysqli_query($con,$query);
$rows=mysqli_fetch_array($run_query);
$customer_id=$rows['customer_id'];
$name=$rows['customer_name'];
$address=$rows['customer_address'];
$email=$rows['customer_email'];
$image=$rows['customer_image'];


?>

<form action="customer_update.php?c_id=<?php echo $customer_id;?>" method="post" enctype="multipart/form-data">
			<center><b><caption><h3>Customer Information</h3></caption></b></center>
           <center><table align="center" width="700" border="2" bgcolor="#D4D0C7">
                
                
            <tr>
                    <td align="right">Customer Name:</td>
                    <td><input type="text" name="studentName" value="<?php echo $name;?>"/></td>
            
            </tr>
            
            <tr>
                    <td align="right">Address:</td>
                    <td><input type="text" name="address" value="<?php echo $address;?>"/></td>
            
            </tr>
			
			<tr>
                    <td align="right">Email:</td>
                    <td><input type="text" name="email" value="<?php echo $email;?>"/></td>
            
            </tr>
            
               
            <tr>
                    <td align="right">Image:</td>
                    <td><input type="file" name="image"/><img src="customers/customer_images/<?php echo $image;?>" width="50" height="50"/></td>
            
            </tr>
            <tr>
                    <td align="right">Mobile No:</td>
                    <td><input type="text" name="mobileNo"/></td>
            
            </tr>
			
		
			
            <tr align="center">
                <td colspan="2"><input type="submit" name="submit" value="insert now"/></td>
                
            </tr>
                
            </table></center> 
            
        </form>

