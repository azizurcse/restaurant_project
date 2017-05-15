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
            
            <div class="content">
                <form action="food_search.php" post="get" enctype="multipart/form-data">
                    <input class="search inputdata" value="<?php echo isset($_GET['item'])?$_GET['item']:"" ?>" type="search" name="search_query" placeholder="Searching Your Favourite Restaurants"/>
                    <input  class="submitdata" type="submit" name="search" value="Searching"/>
                </form>
                <table class="food_table">
                    <tr>
                        <th>Food</th>
                        <th>Food Details</th>
                        <th>Cart</th>
                    </tr>
                    
                  <!-- ---------------
                    ----------   SHOW FOOD FROM DATABASE ALL --------------
                    ------------------------
              -->

                    
                    <?php
                        $page=@$_GET['page'];
                        if($page=="" || $page=="1")
                        {
                            $page1=0;
                        }
                        else{
                            
                            $page1=($page*3)-3;
                        }
                  
                  
                        if(!isset($_GET['food_cat_id'])){
                         $show_food="select * from food_table limit $page1,3";
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
                              
                               
                           ?>
                        
                 
                    <tr>
                        
                            <td align="center">
                                <img src='<?php echo "admin_area/food_images/$food_image"?>' width='100px' height='100px'/>
                                <p>Price:<?php echo $food_price.' taka' ; ?></p>
                        </td>
                         
                            <td valign="top" width="50%">
                                <h3 align="center"><?php echo $food_name; ?></h3>
                                <p align="center"><?php echo $food_title; ?></p>
                            </td>
                            <td valign="top" width="25%">
                                <p align="center"><a href="food_details.php?food_id=<?php echo $food_id;?>" style="text-decoration:none;">Details</a></p><br />
                                <p align="center"><a href="food_details.php?food_id=<?php echo $food_id;?>" style="text-decoration:none;">Order</a></p>
                        
                        </td>
                        
                        
                        
                     </tr>
                    
                      <!-- ---------------
                    ----------   SHOW FOOD FROM DATABASE  PAGINATION OF ALL FOOD --------------
                    ------------------------
              -->
                    
                    <?php		
                            }
                            
                         ?>   
                        <tr>
                    <td colspan="3">
                            <div class="pagination"> 
                        <?php

                        $check="select * from food_table";
                        $check_query=mysqli_query($con,$check);
                        $cou=mysqli_num_rows($check_query);
                        $a=$cou/3;
                        $a=ceil($a);
                        echo "<br/>"; echo "<br/>";
                        for($b=1;$b<=$a;$b++)
                        {
                            ?><a href="food.php?page=<?php echo $b; ?>" style="text-decoration:none;"><?php echo $b." "; ?></a><?php
                        }

                        ?>

                           <!-- ---------------
                    ----------   SHOW FOOD FROM DATABASE END PAGINATION OF ALL FOOD --------------
                    ------------------------
              -->

                        </div>
                    </td>
                    </tr>    
                    
                     <!-- ---------------
                    ----------   SHOW FOOD FROM DATABASE  ONLY CATEGORY SELECT --------------
                    ------------------------
              -->
                    
                    
                     <?php       
                            
                        }
                   ?>
                    
                </table>
                
                
                 <!-- ---------------
                    ----------   SHOW FOOD FROM DATABASE IS END  --------------
                    ------------------------
              -->
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