<table width="100%" align="center">
    <tr align="center">
        <td colspan="5"><h2 >View All brands here</h2></td>
    </tr>
    <tr align="center">
        <th>Category Id</th>
        <th>Category Title</th>
        
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    <?php 
include("includes/db.php");
    $get_brand="select * from restaurant_category";
    $run_sql=mysqli_query($con,$get_brand);
    
    
    $i=0;
    while($row_sql=mysqli_fetch_array($run_sql)){
        
        $res_cat_id=$row_sql['restaurant_cat_id'];
        $res_cat_title=$row_sql['restaurant_cat_title'];
       
        $i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $res_cat_title; ?></td>
        
        <td><a href="admin.php?edit_res_cat=<?php echo $res_cat_id; ?>">Edit</a></td>
        <td><a href="delete_restaurant_category.php?delete_res_cat=<?php echo $res_cat_id; ?>">Delete</a></td>
    </tr>
    
    <?php } ?>
    
    
</table>