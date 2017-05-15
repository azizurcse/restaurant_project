<?php
include("includes/db.php");
if(isset($_GET['delete_res_cat'])){
    $delete_id=$_GET['delete_res_cat'];
    $sql="delete from restaurant_category where restaurant_cat_id='$delete_id'";
    $run_delete=mysqli_query($con,$sql);
    if($run_delete){
        echo "<script>alert('Restaurant Category has been Deleted')</script>";
            echo "<script>window.open('admin.php?restaurant_category_view','_self')</script>";
    }
}
?>
