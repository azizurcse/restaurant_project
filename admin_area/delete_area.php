<?php
include("includes/db.php");
if(isset($_GET['delete_area'])){
    $delete_id=$_GET['delete_area'];
    $sql="delete from area_category where area_id='$delete_id'";
    $run_delete=mysqli_query($con,$sql);
    if($run_delete){
        echo "<script>alert('Categorie has been Deleted')</script>";
            echo "<script>window.open('admin.php?restaurant_area_view','_self')</script>";
    }
}
?>