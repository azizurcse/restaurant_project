<?php
include("admin_area/includes/db.php");
if(isset($_GET['delete_food'])){
    $delete_id=$_GET['delete_food'];
    $qry="delete from food_table where food_id='$delete_id'";
    $run_delete=mysqli_query($con,$qry);
    if($run_delete){
        echo "<script>alert('Food has been Deleted')</script>";
            echo "<script>window.open('admin.php?view_food','_self')</script>";
    }
}
?>