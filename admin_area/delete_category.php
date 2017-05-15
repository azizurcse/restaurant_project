<?php
include("includes/db.php");
if(isset($_GET['delete_cat'])){
    $delete_id=$_GET['delete_cat'];
    $sql="delete from categories where cat_id='$delete_id'";
    $run_delete=mysqli_query($con,$sql);
    if($run_delete){
        echo "<script>alert('Categorie has been Deleted')</script>";
            echo "<script>window.open('admin.php?view_food_category','_self')</script>";
    }
}
?>