<table width="100%" align="center">
    <tr align="center">
        <td colspan="5"><h2 >View All foods here</h2></td>
    </tr>
    <tr align="center">
        <th>Category Id</th>
        <th>Category Title</th>
        
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    <?php 
        include("admin_area/includes/db.php");
    $get_category="select * from categories";
    $run_sql=mysqli_query($con,$get_category);
    
    
    $i=0;
    while($row_sql=mysqli_fetch_array($run_sql)){
        
        $cat_id=$row_sql['cat_id'];
        $cat_title=$row_sql['cat_title'];
       
        $i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cat_title; ?></td>
        
        <td><a href="admin.php?edit_category=<?php echo $cat_id; ?>">Edit</a></td>
        <td><a href="delete_category.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
    </tr>
    
    <?php } ?>
    
    
</table>