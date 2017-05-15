<?php
include("includes/db.php");
if(isset($_GET['delete_restaurant'])){
    $delete_id=$_GET['delete_restaurant'];
    $qry="delete from restaurant_table where restaurant_id='$delete_id'";
    $run_delete=mysqli_query($con,$qry);
    if($run_delete){
        echo "<script>alert('Restaurant has been Deleted')</script>";
            echo "<script>window.open('admin.php?view_restaurant','_self')</script>";
    }
}
?>