<?php
include("includes/db.php");
if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];
    $sql="delete from brands where brand_id='$delete_id'";
    $run_delete=mysqli_query($con,$sql);
    if($run_delete){
        echo "<script>alert('brands has been Deleted')</script>";
            echo "<script>window.open('admin.php?view_food_brands','_self')</script>";
    }
}
?>
