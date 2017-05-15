<table width="100%" align="center">
    <tr align="center">
        <td colspan="5"><h2 >View All foods here</h2></td>
    </tr>
    <tr align="center">
        <th>S.N</th>
        <th>Name</th>
        <th>Image</th>
        
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    <?php 
    include("includes/db.php");
    $get_restaurant="select * from restaurant_table";
    $run_restaurant=mysqli_query($con,$get_restaurant);
    
    
    $i=0;
    while($row_restaurant=mysqli_fetch_array($run_restaurant)){
        
        $restaurant_id=$row_restaurant['restaurant_id'];
        $restaurant_name=$row_restaurant['restaurant_name'];
        $restaurant_image=$row_restaurant['restaurant_image'];
        
        $i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $restaurant_name; ?></td>
        <td><img src="restaurant_images/<?php echo $restaurant_image; ?>" width="55" height="55"/></td>
      
        <td><a href="admin.php?edit_restaurant=<?php echo $restaurant_id; ?>">Edit</a></td>
        <td><a href="delete_restaurant.php?delete_restaurant=<?php echo $restaurant_id; ?>">Delete</a></td>
    </tr>
    
    <?php } ?>
    
    
</table>