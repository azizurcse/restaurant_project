<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:restaurant_page.php");
}







$user_id=$_SESSION["uid"];
include "database_connection.php";


$user_id=$_SESSION["uid"];
$get_img="select * from user_info where user_id='$user_id'";
 $run_img=mysqli_query($con,$get_img);
 $row_img=mysqli_fetch_array($run_img);
$customer_image=$row_img["customer_image"];
$customer_fname=$row_img["first_name"];
$customer_lname=$row_img["last_name"];
 $customer_email=$row_img["email"];
 $customer_mobile=$row_img["mobile"];
$customer_address1=$row_img["address1"];
$customer_address2=$row_img["address2"];
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Restaurant page</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/restaurant_book.css"/>
		<link rel="stylesheet" href="css/order_icon.css"/>
		
		<script src="js/jquery.js"></script>
		<script src="main.js"></script>
		<script src="js/bootstrap.min.js"></script>
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
			  <a class="navbar-brand" href="#">Food Collection</a>
			</div>
				<!--<div class="navbar navbar-header">
				
					<!--<a href="#" class="navbar-brand">Food Collection</a> 
				</div>-->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.html">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="food_page.php">Food</a></li>
					<li><a href="restaurant_page.php">Restaurant</a></li>
					<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" value="<?php echo isset($_GET['item'])?$_GET['item']:"" ?>"/></li>
					<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
				 </ul>
				
				
				<!--<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
					<li><a href="food_page.php">Food</a></li>
					<li><a href="restaurant_page.php">Restaurant</a></li>
					<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" value="<?php echo isset($_GET['item'])?$_GET['item']:"" ?>"/></li>
					<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
				</ul>-->
				
				<ul class="nav navbar-nav navbar-right">
				
				<li><a href="" id="book_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Bookmark<span class="books books-success"></span></a>
						<div class="dropdown-menu" style="width:200px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-6">Sl.No</div>
										<div class="col-md-6">Food Image</div>
										
									</div>
								</div>
								<div class="panel-body">
									<div id="book_res">
									<!--
										<div class="row">
											<div class="col-md-6">Sl.No</div>
											<div class="col-md-6">Food Image</div>
											
										</div>
										-->
									</div>
								</div>
								<div class="panel-footer"></div>
							</div>
						</div>
					
					</li>
				
				
				
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Order<span class="orders_i orders_i-success">0</span></a>
						<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-3">Sl.no</div>
										<div class="col-md-3">Food Image</div>
										<div class="col-md-3">Food name</div>
										<div class="col-md-3">Price in TK</div>
										
									</div>
								</div>
								<div class="panel-body">
									<div id="order_food">
								<!--		<div class="row">
											<div class="col-md-3">Sl.no</div>
											<div class="col-md-3">Food Image</div>
											<div class="col-md-3">Food name</div>
											<div class="col-md-3">Price in TK</div>
											
										</div>-->
									</div>
								</div>
								<div class="panel-footer"></div>
							</div>
						</div>
					</li>
				<!--	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Sign In</a>
						<ul class="dropdown-menu">
							<div style="width:300px;">
								<div class="panel panel-primary">
									<div class="panel-heading">Login</div>
									<div class="panel-heading">
										<label for="email">Email</label>
										<input type="type" class="form-control" id="email" required/>
										<label for="email">Password</label>
										<input type="password" class="form-control" id="password" required/>
										<p><br /></p>
										<a href="#" style="color:white;list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login"/>
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
							</div>
						</ul>
					
					</li>-->
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"];?></a>
						<ul class="dropdown-menu">
							<li><a href="order_page.php" style="text-decoration:none;color:blue;"><span class="glyphicon glyphicon-shopping-cart">Order</span></a></li>
							<li class="divider"></li>
							<li><a href="" style="text-decoration:none;color:blue;">Change Password</a></li>
							<li class="divider"></li>
							<li><a href="dashboard.php" style="text-decoration:none;color:blue;">Dashboard</a></li>
							<li class="divider"></li>
							<li><a href="logout.php" style="text-decoration:none;color:blue;">Logout</a></li>
						</ul>
					
					</li>
					
				</ul>
			</div>
		
		</div><!-- stop nav-->
	</div>
		<p><br /></p>
		
		
		
		<!--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"];?></a>
						<ul class="dropdown-menu">
							<li><a href="order_page.php" style="text-decoration:none;color:blue;"><span class="glyphicon glyphicon-shopping-cart">Order</span></a></li>
							<li class="divider"></li>
							<li><a href="" style="text-decoration:none;color:blue;">Change Password</a></li>
							<li class="divider"></li>
							<li><a href="dashboard.php" style="text-decoration:none;color:blue;">Dashboard</a></li>
							<li class="divider"></li>
							<li><a href="logout.php" style="text-decoration:none;color:blue;">Logout</a></li>
						</ul>
					
					</li>-->
					
					
					
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading">
							<center><h3>Customer Dashboard</h3></center>
						</div>
						<div class="panel-body">
						
						
							<div class="col-md-12">
								<div class="panel panel-info">
									<div class="panel-heading"></div>
									<div class="panel-body">
										<div class="col-md-12">
											<div class="col-md-12">
										<?php
										 
										if(!isset($_GET['edit_pro'])){
										 if(!isset($_GET['change_pass'])){
										 if(!isset($_GET['bookmark_res'])){
						 
										?>
												<p>Full Name:<?php echo $customer_fname." ".$customer_lname;?></p>
												<p>Email No&nbsp;&nbsp;:<?php echo $customer_email;?></p>
												<p>Mobile No:<?php echo $customer_mobile;?></p>
												<p>Address1 :<?php echo $customer_address1;?></p>
												<p>Address2 :<?php echo $customer_address2;?></p>
											
										<?php
										  }
									   }
										}
										
									   ?>
										<?php
										if(isset($_GET["edit_pro"])){
											include("edit_pro.php");
										}
										
										if(isset($_GET["change_pass"])){
											include("change_pass.php");
										}
										
										
										if(isset($_GET["bookmark_res"])){
											include("bookmark_res.php");
										}
										
										
										?>
																
											</div>
										</div>
									</div>
									<div class="panel-heading">
									
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
				<div class="col-md-2">
				
					 
					
					<div class="nav nav-pills nav-stacked">
						<div class="pro_area">
						
							<center><img src="admin_area/customer_images/<?php echo $customer_image;?>" class="customer_image"/></center>
							</div>
							
							<form method="post" action="add_cus_image.php" enctype="multipart/form-data">
								<input type="file" name="image"/>
								<input type="submit" name="logs"/>
							</form>
							<br>
							
						<li class="active">Add image</li>
						<li><a href="dashboard.php">Customer Profile</a></li>
						<li><a href="dashboard.php?edit_pro">Edit Profile</a></li>
						<li><a href="dashboard.php?change_pass">Change Password</a></li>
						<li><a href="dashboard.php?bookmark_res">Bookmark Restaurant</a></li>
						<li><a href="logout.php">Logout</a></li>
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