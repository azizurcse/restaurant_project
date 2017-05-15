<?php

$con=mysqli_connect("localhost","root","","project");

/*
-------------
------ FROM DATABASE GETTING RESTAURANT CATEGORIES FUNCTIONS-------
-------------
*/

function RestaurantCategories()
{
    global $con;
    $restaurant_cat="select * from restaurant_categories";
    
    $run_restaurant_query=mysqli_query($con,$restaurant_cat);
    
    while($row_restaurant=mysqli_fetch_assoc($run_restaurant_query))
    {
        $cat_id=$row_restaurant['cat_id'];
        $cat_title=$row_restaurant['cat_title'];
        
        echo "<li><a href='#'>$cat_title</a><li>";
    }
}


/*
-------------
------FROM DATABASE GETTING FOOD CATEGORIES FUNCTIONS-------
-------------
*/

function FoodCategories()
{
    global $con;
    $food_cat="select * from food_categories";
    
    $run_food_query=mysqli_query($con,$food_cat);
    
    while($row_food=mysqli_fetch_assoc($run_food_query))
    {
        $brand_id=$row_food['brand_id'];
        $brand_title=$row_food['brand_title'];
        
        echo "<li><a href='food_cat_click.php?food_cat_id=$brand_id'>$brand_title</a><li>";
    }
}


/*
-------------
------SHOW FOOD INFORMATION FROM DATABASE-------
-------------
*/
?>


