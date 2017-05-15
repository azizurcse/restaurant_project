<table width="100%" align="center">
    <tr align="center">
        <td colspan="5"><h2 >View All foods here</h2></td>
    </tr>
    <tr align="center">
        <th>Area Id</th>
        <th>Area Title</th>
        
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    <?php 
   include("includes/db.php");
    $get_category="select * from area_category";
    $run_sql=mysqli_query($con,$get_category);
    
    
    $i=0;
    while($row_sql=mysqli_fetch_array($run_sql)){
        
        $area_id=$row_sql['area_id'];
        $area_title=$row_sql['area_title'];
       
        $i++;
    
    
    ?>
    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $area_title; ?></td>
        
        <td><a href="admin.php?edit_area=<?php echo $area_id; ?>">Edit</a></td>
        <td><a href="delete_area.php?delete_area=<?php echo $area_id; ?>">Delete</a></td>
    </tr>
    
    <?php } ?>
    
    
</table>