<?php
include 'db.php';
include("functions/functions.php");

if(isset($_GET['search'])){
    
    $search_query=$_GET['search_query'];
    $show_food="select * from food_table where food_keywords like '%$search_query%'";
    $info =mysqli_query($link,$show_food);
    if(mysqli_num_rows($info)>0){
        header("Location:food_page.php?item=".$search_query);
    }else{
       header('Location:restaurant_page.php'); 
    }
   
}
?>
