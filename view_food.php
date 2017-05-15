<table width="100%" align="center">
    <tr align="center">
        <td colspan="5"><h2 >View All foods here</h2></td>
    </tr>
    <tr align="center">
        <th>S.N</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    <?php 
        include("admin_area/includes/db.php");
    $get_food="select * from food_table";
    $run_food=mysqli_query($con,$get_food);
    
    
    $i=0;
    while($row_food=mysqli_fetch_array($run_food)){
        
        $food_id=$row_food['food_id'];
        $food_name=$row_food['food_name'];
        $food_image=$row_food['food_image'];
        $food_price=$row_food['food_price'];
        $i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $food_name; ?></td>
        <td><img src="admin_area/food_images/<?php echo $food_image; ?>" width="55" height="55"/></td>
        <td><?php echo $food_price; ?></td>
        <td><a href="admin.php?edit_food=<?php echo $food_id; ?>">Edit</a></td>
        <td><a href="delete_foods.php?delete_food=<?php echo $food_id; ?>">Delete</a></td>
    </tr>
    
    <?php } ?>
    
    
</table>