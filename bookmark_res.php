<?php

$user_id=$_SESSION["uid"];
include "database_connection.php";


$user_id=$_SESSION["uid"];
$get_restaurant="select * from bookmark where user_id='$user_id'";
 $run_restaurant=mysqli_query($con,$get_restaurant);
 $row_restaurant=mysqli_fetch_array($run_restaurant);
 $bookmark_id=$row_restaurant["bookmark_id"];
$restaurant_id=$row_restaurant["restaurant_id"];
$restaurant_name=$row_restaurant["restaurant_name"];
$restaurant_address=$row_restaurant["restaurant_address"];
$restaurant_image=$row_restaurant["restaurant_image"];

?>

<div>

<table border="1" width="100%">
		<tr>
			<th>Name</th>
			<th>address</th>
			<th>Image</th>
			<th>Action</th>
		
		</tr>
	<?php 
		
			$qry="select * from bookmark where user_id='$user_id'";
			$run_qry=mysqli_query($con,$qry);
			while($row_qry=mysqli_fetch_array($run_qry)){
			
				$restaurant_n=$row_qry["restaurant_name"];
				$restaurant_img=$row_qry["restaurant_image"];
				$restaurant_address=$row_qry["restaurant_address"];
				$bookmark_id=$row_qry["bookmark_id"];
				$r_link=$row_qry["links"];
				

				
		?>
	
	
		
		<tr>
			<td><?php echo $restaurant_n; ?></td>
			<td><?php echo $restaurant_address; ?></td>
			<td><?php
			echo "<a href='$r_link' target='_blank'><img src='admin_area/restaurant_images/$restaurant_img' width='55' height='55'/></a>"
			?>
			</td>
			
			<td><a href="delete_bookmark.php?id=<?php echo $bookmark_id; ?>">Delete</a></td>
		
		</tr>
	
	
	
	<?php
	
		}
		?>
	
	
	</table>
</div>

