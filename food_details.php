<?php

include ("functions/functions.php");



?>




<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"/>
        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css"/>
        <link rel="stylesheet" type="text/css" href="re_style.css"/>
     
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <title>Restaurant Information System</title>
    </head>
    
    <body>
        <header class="head_area">
            <nav>
                <div class="row">
                    <img src="resources/img/logo_white.png" class="logo"/>
                    <ul class="main-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="restaurant.php">Restaurants</a></li>
                        <li><a href="food.php">Foods</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="registration.php">Sign up</a></li>
                    </ul>
                </div>
            </nav>
           
        </header>
        
         <section class="section-features">
            <div class="row">
                <h2>Your loving Food</h2>
               
            </div>
        
            
        </section>
        
        
         <div class="content_area">
            <div class="sidebar">
                <div id="cat_title">Categories</div>
              <ul class="sidebar-nav">
                <?php FoodCategories() ?>
                  
                </ul>
            </div>
             <div class="content clearfix">
             
             <?php
            if(isset($_GET['food_id'])){
                
           $food_id=$_GET['food_id'];
             
             $show_food="select * from food_table where food_id='$food_id'";
                            $run_food=mysqli_query($con,$show_food);
                            while($row_food=mysqli_fetch_assoc($run_food))
                            {
                                $food_id=$row_food['food_id'];
                                $food_name=$row_food['food_name'];
                                $food_title=$row_food['food_title'];
                                $food_category=$row_food['food_category'];
                                $food_price=$row_food['food_price'];
                                $food_restaurant=$row_food['food_restaurant'];
                                $food_image=$row_food['food_image'];
                                $food_details=$row_food['food_details'];
                                
                                
                                echo "
                                
                                 <div class='food_details'>
                                    <h3 style='margin-bottom:10px;'>Food Name: $food_name</h3>
                                    <p style='margin-bottom:10px;'>Food Price: $food_price</p>
                                    <p style='margin-bottom:10px;'>Restaurant Name: $food_restaurant</p>
                                    <address>
                                        restaurant address information
                                    </address>
                                    <li><a href='food.php'>Go back</a></li>
                                    <li><a href='#'>Order Now</a></li>
                                </div>



                                 <div class='content_image'>
                                    <img src='admin_area/food_images/$food_image'/>
                                </div>
                                        
                                        ";
                              
                            }
                
                 }
                           ?>
            </div>
        
        
        </div>
         <section class="section-features">
            <div class="row">
                <h2>Your food Order And Payment Method</h2>
               
            </div>
        
            
        </section>
        
        
        <footer>
             <div class="row">
                <div class="col span-1-of-2">
                    <ul class="footer-nav">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Android</a></li>
                        <li><a href="#">contact us</a></li>
                    </ul>
                 </div>
                 
                 <div class="col span-1-of-2">
                    <ul class="social-links">
                      <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                      <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                      <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                      <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                     </ul>
                 </div>
            </div>
            <div class="row">
                <p>
                    Copyright &copy; 2016 by RIS.All right reserved.
                </p>
            </div>
        </footer>

    </body>


    
    
    
</html>





