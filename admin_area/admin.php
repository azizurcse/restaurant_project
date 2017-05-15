<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('admin_login.php?not_admin=you are not an admin','_self')</script>";
}else{
	


?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Restaurant page</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		
		<script src="../js/jquery.js"></script>
		<script src="../main.js"></script>
		<script src="../js/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="../vendors/css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="../vendors/css/ionicons.min.css"/>
        <link rel="stylesheet" type="text/css" href="../vendors/css/grid.css"/>
        <link rel="stylesheet" type="text/css" href="../resources/css/style.css"/>
    <!--   <link rel="stylesheet" type="text/css" href="resources/css/new_style.css"/> -->
       
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        
		<link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<style>
		
		.customer_image{
			width: 120px;
			height: 120px;
			border-radius: 50%;
			
			margin-top: 5px;
		   
			border: 2px solid orange;
		}
		.pro_area{
			padding:5px;
			margin-bottom:10px;
		}
		.pro_details{
			margin-left:200px;
			margin-right:200px;
		}
		
		
		
		.foot_colo p{
		color: #888;
		text-align: center;
		
		margin-top: 15px;
			}
		.foot_colo{
			
			background-color: #333;
			
			height:194px;
			font-size: 17px;;
			margin-top: 20px;
		}
		footer{
		background-color: #333;
		padding: 50px;
		font-size: 80%;
		margin-top: 20px;
    
		}

		.footer-nav{
			margin-top:18px;
			margin-left:17px;
			list-style: none;
			float:left;
		}

		.social-links{
			margin-top:17px;
			list-style: none;
			float: right;
			
			
		}

		.footer-nav li,
		.social-links li{
			display: inline-block;
			margin-right: 20px;
			
			
			
		}

		.footer-nav li:last-child,
		.social-links li:last-child{
			margin-right: 0;
		}

		.footer-nav li a:link,
		.footer-nav li a:visited,
		.social-links li a:link,
		.social-links li a:visited{
			text-decoration: none;
			border: 0;
			color: #888;
			transition: color 0.2s;
		}

		.footer-nav li a:hover,
		.footer-nav li a:active{
			color: #ddd;
		}

		.social-links li a:link,
		.social-links li a:visited{
			font-size: 160%;
		}

		.ion-social-facebook,
		.ion-social-twitter,
		.ion-social-googleplus,
		.ion-social-instagram{
			transition: color 0.2;
		}

		.ion-social-facebook:hover{
			color: #3b5998;
		}

		.ion-social-twitter:hover{
			color: #00aced;
		}

		.ion-social-googleplus:hover{
			color: #dd4b39;
		}

		.ion-social-instagram:hover{
			color: #517fa4;
		}

		
		
		</style>
		
	</head>
	
	<body>
	<div class="navbar navbar-default">
		
		
		<!--  start responsive nav-->
		<div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  
			</div>
				<!--<div class="navbar navbar-header">
				
					<!--<a href="#" class="navbar-brand">Food Collection</a> 
				</div>-->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Food Panel</a>
						<ul class="dropdown-menu">
							<li><a href="admin.php?insert_food" style="text-decoration:none;color:blue;">Insert Foods</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?view_food" style="text-decoration:none;color:blue;">View foods</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?insert_food_category" style="text-decoration:none;color:blue;">Insert Food Categorys</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?view_food_category" style="text-decoration:none;color:blue;">View all categories</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?insert_food_brands" style="text-decoration:none;color:blue;">Insert Food Brands</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?view_food_brands" style="text-decoration:none;color:blue;">View all Brands</a></li>
						</ul>
					</li>

					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Restaurant Panel</a>
						<ul class="dropdown-menu">
							<li><a href="admin.php?insert_restaurant" style="text-decoration:none;color:blue;">Insert Restaurant</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?view_restaurant" style="text-decoration:none;color:blue;">View Restaurant</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?insert_restaurant_area" style="text-decoration:none;color:blue;">Insert Restaurant Area</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?restaurant_area_view" style="text-decoration:none;color:blue;">View Restaurant Area</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?insert_restaurant_category" style="text-decoration:none;color:blue;">Insert Restaurant Category</a></li>
							<li class="divider"></li>
							<li><a href="admin.php?restaurant_category_view" style="text-decoration:none;color:blue;">View Restaurant Category</a></li>
							
                        
						</ul>
						<li><a href="admin.php?view_customers">View customers</a></li>
						<li><a href="admin.php?view_orders">View Orders</a></li>
                      
						<li><a href="admin_logout.php">Logout</a></li>
					</li>	
							<!--
						<li class="active"><a href="">Customer Profile</a></li>
						
                     
                        <li><a href="admin.php?view_customers">View customers</a></li>
                        <li><a href="admin.php?view_orders">View Orders</a></li>
                        <li><a href="admin.php?view_payments">View Payments</a></li>
						<li><a href="admin_logout.php">Logout</a></li>
						-->
						
					
					

				 </ul>
				
				
				<!--<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
					<li><a href="food_page.php">Food</a></li>
					<li><a href="restaurant_page.php">Restaurant</a></li>
					<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" value="<?php echo isset($_GET['item'])?$_GET['item']:"" ?>"/></li>
					<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
				</ul>-->
				
			
			</div>
		
		</div><!-- stop nav-->
	</div>
		<p><br /></p>
		<p><br /></p>
		<p><br /></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-8">
					
					<div class="panel panel-info">
					
						<div class="panel-heading">
							<center><h3>Admin Dashboard</h3></center>
						</div>
						<div class="panel-body">
						
						
							<div class="col-md-12">
							<br>
							
                               <h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
                                
                                <?php
								if(isset($_GET['view_orders'])){
                                    
                                    include("orders_customer.php");
                                }
								
								
                                if(isset($_GET['insert_food'])){
                                    
                                    include("food_insert.php");
                                }
                                
                                if(isset($_GET['view_food'])){
                                    
                                    include("view_food.php");
                                }
                                
                                  if(isset($_GET['edit_food'])){
                                    
                                    include("edit_food.php");
                                }
                                
                                if(isset($_GET['insert_food_category'])){
                                    
                                    include("add_category.php");
                                }
								
								if(isset($_GET['view_food_category'])){
                                    
                                    include("view_category.php");
                                }
								
								
								if(isset($_GET['edit_category'])){
                                    
                                    include("edit_category.php");
                                }
								
								if(isset($_GET['insert_food_brands'])){
                                    
                                    include("add_brand.php");
                                }
								
								
								if(isset($_GET['view_food_brands'])){
                                    
                                    include("view_brand.php");
                                }
								
								if(isset($_GET['edit_brand'])){
                                    
                                    include("edit_brand.php");
                                }
								
								
								if(isset($_GET['view_customers'])){
                                    
                                    include("view_customers.php");
                                }
                                
								if(isset($_GET['insert_restaurant'])){
                                    
                                    include("restaurant_insert.php");
                                }
								
								
								if(isset($_GET['view_restaurant'])){
                                    
                                    include("view_restaurant.php");
                                }
								
								
								if(isset($_GET['edit_restaurant'])){
                                    
                                    include("edit_restaurant.php");
                                }
								
								
								if(isset($_GET['insert_restaurant_area'])){
                                    
                                    include("add_area.php");
                                }
								
								
								
								if(isset($_GET['restaurant_area_view'])){
                                    
                                    include("view_area.php");
                                }
								
								if(isset($_GET['edit_area'])){
                                    
                                    include("edit_area.php");
                                }
								
								
								if(isset($_GET['insert_restaurant_category'])){
                                    
                                    include("add_restaurant_category.php");
                                }
								
								
								if(isset($_GET['restaurant_category_view'])){
                                    
                                    include("view_restaurant_category.php");
                                }
								
								
								if(isset($_GET['edit_res_cat'])){
                                    
                                    include("edit_restaurant_category.php");
                                }
								
								if(isset($_GET['order_details'])){
                                    
                                    include("view_order.php");
                                }
								
								if(isset($_GET['order_mail'])){
                                    
                                    include("mail/send_mail.php");
                                }
								
								if(isset($_GET['sms_text'])){
                                    
                                    include("sms_text.php");
                                }
								
                                ?>
								<!--<div class="panel panel-info">
									<div class="panel-heading">Star Kabab</div>
									<div class="panel-body">
										<div class="col-md-12">
										
										</div>
									</div>
									<div class="panel-heading">
									</div>
								</div>-->
                                
							</div>
							
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
				<div class="col-md-2">
						<a href="http://www.afreesms.com/intl/bangladesh" target="_blank"><p>Send Message Via Api</p></a>
					<div class="nav nav-pills nav-stacked">
						<div class="pro_area">
						
						</div>
					<!--	<li class="active"><a href="">Customer Profile</a></li>
						<li><a href="admin.php?insert_food">Insert Fodd</a></li>
						<li><a href="admin.php?view_food">View foods</a></li>
						<li><a href="admin.php?insert_food_category">Insert Food Categorys</a></li>
                        <li><a href="admin.php?view_food_category">View all categories</a></li>
                        <li><a href="admin.php?insert_food_brands">Insert Food Brands</a></li>
                        <li><a href="admin.php?view_food_brands">View all Brands</a></li>
                        <li><a href="admin.php?insert_restaurant">Insert Restaurant</a></li>
                        <li><a href="admin.php?view_restaurant">View Restaurant</a></li>
                        <li><a href="admin.php?insert_restaurant_area">Insert Restaurant Area</a></li>
                        <li><a href="admin.php?restaurant_area_view">View Restaurant Area</a></li>
                        <li><a href="admin.php?insert_restaurant_category">Insert Restaurant Category</a></li>
                        <li><a href="admin.php?restaurant_category_view">View Restaurant Category</a></li>
                        <li><a href="admin.php?view_customers">View customers</a></li>
                        <li><a href="admin.php?view_orders">View Orders</a></li>
                        <li><a href="admin.php?view_payments">View Payments</a></li>
						<li><a href="admin_logout.php">Logout</a></li>-->
					</div>
					
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<footer class="foot_colo">
		
			<div class="row">
				
				<div class="col-md-5">
					<ul class="footer-nav">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Android</a></li>
                        <li><a href="#">contact us</a></li>
                    </ul>
				</div>
				<div class="col-md-6">
					<ul class="navbar-right social-links">
                      <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                      <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                      <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                      <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                     </ul>
				</div>
				
				
			</div>
			<div class="row">
					<div class="col-md-12">
						<p class="footer" style="color:#888;">
						Copyright &copy; 2016 by RIS.All right reserved.
						</p>
					</div>
			</div>
		</footer>
	</body>

</html>


<?php } ?>