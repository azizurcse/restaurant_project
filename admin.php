

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Restaurant page</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		
		<script src="js/jquery.js"></script>
		<script src="main.js"></script>
		<script src="js/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"/>
        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/style.css"/>
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
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				
			
			></div>
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
                               
                                
                                <?php
                                if(isset($_GET['insert_food'])){
                                    
                                    include("admin_area/food_insert.php");
                                }
                                
                                if(isset($_GET['view_food'])){
                                    
                                    include("view_food.php");
                                }
                                
                                  if(isset($_GET['edit_food'])){
                                    
                                    include("admin_area/edit_food.php");
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
				
					 
					
					<div class="nav nav-pills nav-stacked">
						<div class="pro_area">
						
						</div>
						<li class="active"><a href="">Customer Profile</a></li>
						<li><a href="admin.php?insert_food">Insert Fodd</a></li>
						<li><a href="admin.php?view_food">View foods</a></li>
						<li><a href="admin.php?insert_food_category">Insert Food Categorys</a></li>
                        <li><a href="admin.php?view_food_category">View all categories</a></li>
                        <li><a href="admin.php?insert_food_brands">Insert Food Brands</a></li>
                        <li><a href="admin.php?view_food_brands">View all Brands</a></li>
                        <li><a href="admin.php?view_customers">View customers</a></li>
                        <li><a href="admin.php?view_orders">View Orders</a></li>
                        <li><a href="admin.php?view_payments">View Payments</a></li>
						<li><a href="">Logout</a></li>
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