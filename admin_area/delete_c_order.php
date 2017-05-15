<?php
include("includes/db.php");
if(isset($_GET['order_delete'])){
    $delete_id=$_GET['order_delete'];
    $sql="delete from order_table where user_id='$delete_id'";
    $run_delete=mysqli_query($con,$sql);
    if($run_delete){
        echo "<script>alert('Order has been Deleted')</script>";
            echo "<script>window.open('admin.php?view_orders','_self')</script>";
    }
}
?>