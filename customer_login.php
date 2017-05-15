<?php
session_start();
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
              <form action="customer_login.php" method="post" class="contact-form" enctype="multipart/form-data">
                   <div class="row">
                        <div class="col span-1-of-3">
                            <label>Email</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="email" id="name" placeholdesr="put your name" onblur="validate('email',this.value)" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Password</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="password" name="password" id="password" placeholdesr="put your password" required/>
                        </div>
                    </div>
                
                  <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" name="login" value="send it!"/>
                        </div>
                    </div> 
                </form>
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

<?php
if(isset($_POST['login'])){
    
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select * from customer_table where customer_email='$email' AND customer_password='$password'";
    $run_query=mysqli_query($con,$query);
    if(mysqli_num_rows($run_query)>0){
        $rows = mysqli_fetch_assoc($run_query);
        
        $_SESSION['customer_email']=$email;
        
        $id = $rows['customer_id'];
        $customer_name = $rows['customer_name'];
        $_SESSION['customer_name']=$customer_name;
        $_SESSION['customer_id']=$id;
        echo "<script>window.open('customer_profile.php','_self')</script>";
        
    }
    else{
            echo "<script>alert('email or password in correct')</script>";
        }
}




?>