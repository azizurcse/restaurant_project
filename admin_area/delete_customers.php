<?php
include("includes/db.php");
if(isset($_GET['delete_customers'])){
    $delete_id=$_GET['delete_customers'];
    $sql="delete from user_info where user_id='$delete_id'";
    $run_delete=mysqli_query($con,$sql);
    if($run_delete){
        echo "<script>alert('customer has been Deleted')</script>";
            echo "<script>window.open('admin.php?view_customers','_self')</script>";
    }
}
?>
