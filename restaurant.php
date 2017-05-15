<?php
include ("functions/functions.php");


?>


<!DOCTYPE html>
<html lang="en">

    <head>
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
                        <li><a href="#">Restaurants</a></li>
                        <li><a href="food.php">Foods</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="registration.php">Sign up</a></li>
                    </ul>
                </div>
            </nav>
           
        </header>
        
        <section class="section-features">
            <div class="row">
                <h2>Popular Restaurants in Dhaka city</h2>
               
            </div>
        
            
        </section>
        
        <div class="content_area">
            <div class="sidebar">
                <div id="cat_title">Categories</div>
              <ul class="sidebar-nav">
                
                  <?php  RestaurantCategories(); ?>
                </ul>
            </div>
            
            <div class="content">
            <?php
                
                 $page=@$_GET['page'];
                        if($page=="" || $page=="1")
                        {
                            $page1=0;
                        }
                        else{
                            
                            $page1=($page*3)-3;
                        }
                
            
                $show_restaurant="select * from restaurant_table limit $page1,3";
                 $run_restaurant=mysqli_query($con,$show_restaurant);
                            while($row_restaurant=mysqli_fetch_assoc($run_restaurant))
                            {
                                $restaurant_id=$row_restaurant['restaurant_id'];
                                $restaurant_name=$row_restaurant['restaurant_name'];
                                $restaurant_title=$row_restaurant['restaurant_title'];
                                $restaurant_category=$row_restaurant['restaurant_category'];
                               
                                $restaurant_image=$row_restaurant['restaurant_image'];
                                $restaurant_address=$row_restaurant['restaurant_address'];
            
            ?>
             
                  <?php echo " <img class='img_format' src='admin_area/restaurant_images/$restaurant_image'/>"?>
                   
         <?php
                            }
                ?>
                
                 <div class="pagination"> 
                        <?php

                        $check="select * from restaurant_table";
                        $check_query=mysqli_query($con,$check);
                        $cou=mysqli_num_rows($check_query);
                        $a=$cou/3;
                        $a=ceil($a);
                        echo "<br/>"; echo "<br/>";
                        for($b=1;$b<=$a;$b++)
                        {
                            ?><a href="restaurant.php?page=<?php echo $b; ?>" style="text-decoration:none;"><?php echo $b." "; ?></a><?php
                        }

                        ?>

                           <!-- ---------------
                    ----------   SHOW FOOD FROM DATABASE END PAGINATION OF ALL FOOD --------------
                    ------------------------
              -->

                        </div>
            
               
            </div>
        
        </div>
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


    
    
    