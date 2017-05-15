<table width="100%" align="center">
    <tr align="center">
        <td colspan="5"><h2 >View All brands here</h2></td>
    </tr>
    <tr align="center">
        <th>Brand Id</th>
        <th>Brand Title</th>
        
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    <?php 
include("includes/db.php");
    $get_brand="select * from brands";
    $run_sql=mysqli_query($con,$get_brand);
    
    
    $i=0;
    while($row_sql=mysqli_fetch_array($run_sql)){
        
        $brand_id=$row_sql['brand_id'];
        $brand_title=$row_sql['brand_title'];
       
        $i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $brand_title; ?></td>
        
        <td><a href="admin.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
        <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
    </tr>
    
    <?php } ?>
    
    
</table>