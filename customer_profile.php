<?php
session_start();
 if(!isset($_SESSION['customer_email'])){
  header('location:customer_login.php');
   
 }

include ("db.php");
$id=$_SESSION['customer_id'];
$query="select * from customer_table where customer_id='$id'";
$run_query=mysqli_query($link,$query);
$rows=mysqli_fetch_array($run_query);



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
               <div class="customer_content">
                <h3>Wellcome to your home</h3>
                   
          
                   <div class="customer_info">
                       
                       <?php
                       if(!isset($_GET['my_orders'])){
                        if(!isset($_GET['edit_account'])){
                         if(!isset($_GET['change_password'])){
                         if(!isset($_GET['store_shop'])){
                       ?>
                       <h4>Profile Details</h4>
                        <p>Full Name:<?php echo $rows['customer_name'];?></p>
                        <p>Email:<?php echo $rows['customer_email'];?></p>
                        <p>Address:<?php echo $rows['customer_address'];?></p>
                        
                        <p>Mobile:<?php echo $rows['customer_name'];?></p>
                       
                       <?php
                      }
                   }
                    }
                    }
                   ?>
                      
                       
                   </div>
                   <div class="features_customer">
                    <p><a href="#">Restaurant</a><a href="#">Food</a><a href="#">Suggession</a></p>
                   </div>
                   
                    
                       <?php
                       if(isset($_GET['edit_account'])){
                           include("customer_edit.php");
                       }
                       
                       
                       ?>
              </div>
        
            
            <div class="customer_profile">
                <div id="customer_title"><?php echo $_SESSION['customer_name'];?>
                <?php
                 
                  $c_email=$_SESSION['customer_email'];
                  $query="select * from customer_table where customer_email='$c_email'";
                  $run_query=mysqli_query($link,$query);
                  $rows=mysqli_fetch_array($run_query);
                  $customer_image=$rows['customer_image'];
                  echo "<img class='customer_image' src='customers/customer_images/$customer_image'/>";
                  ?>
              </div>  
              <ul class="sidebar-nav">
                  
                  
               <li><a href="customer_profile.php">My Profile</a></li>
               <li><a href="customer_profile.php?my_orders">My Orders</a></li>
               <li><a href="customer_profile.php?edit_account">Edit Profile</a></li>
               <li><a href="customer_profile.php?change_password">Change Password</a></li>
               <li><a href="customer_profile.php?store_shop">Store Shop</a></li>
               <li><a href="customer_logout.php">Logout</a></li>
                  
                </ul>
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