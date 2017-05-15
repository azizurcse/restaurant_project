<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}
?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<title>Food Collection area</title>
		
	
		<link rel="stylesheet" href="footer_cs.css"/>
		<script src="js/jquery.js"></script>
		<script src="main.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		
		<link rel="stylesheet" href="css/restaurant_book.css"/>
		<link rel="stylesheet" href="css/order_icon.css"/>
       <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		
		<style>
		
		
		
		
		 .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
	  height:470px;
      width: 100%;
  }
  
  
  .sliders{
			margin-top:-25px;
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

		
		<!-- slider code-->

	
		
	</style>
	
	<script>
		$(function(){
			$('.carousel').carousel({
				interval:1000*3
			});
		})
		</script>
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
					<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" value=""/></li>
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
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Sign In</a>
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
										<a href="forgotpass.php" style="color:white;list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login"/>
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
							</div>
						</ul>
					
					</li>
					<li><a href="registration.php"><span class="glyphicon glyphicon-user"></span>Sign Out</a></li>
					
				</ul>
			</div>
		
		</div><!-- stop nav-->
	</div>
	<!--	slider area-->
	
	
	
	
	<div class="sliders">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="img_height" src="slider_image/food1.jpg" alt="Chania" width="460" height="145">
		<div class="carousel-caption">
        <h3>Lunch</h3>
        <p>Life tastes better with good lunch</p>
      </div>
	  
	  </div>

      <div class="item">
        <img class="img_height" src="slider_image/food2.jpeg" alt="Chania" width="460" height="145">
		<div class="carousel-caption">
        <h3>Grills</h3>
        <p>Take Your food with your own taste</p>
      </div>
	  
	  </div>
    
      <div class="item">
        <img class="img_height" src="slider_image/food3.jpeg" alt="Flower" width="460" height="145">
		<div class="carousel-caption">
        <h3>Dinner</h3>
        <p>Have a great dinner with family</p>
      </div>
	  
	  </div>

      <div class="item">
        <img class="img_height" src="slider_image/food4.jpg" alt="Flower" width="460" height="145">
		<div class="carousel-caption">
        <h3>Fastfood</h3>
        <p>yummy taste with your friends</p>
      </div>
	  
	  </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	
	
	
		<!-- end slider-->	
	
		<p><br /></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
				<div id="get_category">
				 <!--  here show the category from database by ajax method     -->
				</div>
				<!--<div class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><h4>Food Categories</h4></a></li>
						<li><a href="#">Food Categories</a></li>
						<li><a href="#">Food Categories</a></li>
						<li><a href="#">Food Categories</a></li>
						<li><a href="#">Food Categories</a></li>
					</div>-->
					
					<div id="get_brand">
					<!--  here show the brand from database by ajax method     -->
					</div>
				
					
					<!--
					<div class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><h4>Food Brand</h4></a></li>
						<li><a href="#">Food Categories</a></li>
						<li><a href="#">Food Categories</a></li>
						<li><a href="#">Food Categories</a></li>
						<li><a href="#">Food Categories</a></li>
					</div>-->
				</div>
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading"><h3>Favourite Foods,&nbsp;<span>For ordering complete </span><a href="customer_register.php" class="btn btn-success">signup</a></div>
						<div class="panel-body">
							<div id="get_food">
							<!--  here we show food from database by ajax -->
							</div>
						<!--<div class="col-md-4">
								<div class="panel panel-info">
									<div class="panel-heading">Burger
										<span style="float:right;"><a href="#">Details</a></span>
									</div>
									<div class="panel-body">
										<img src="admin_area/food_images/Hamburger.jpg" width="160px" height="150px"/>
									</div>
									<div class="panel-heading">TK.444.00
										<button style="float:right;" class="btn btn-danger btn-xs">Order Now</button>
										
									</div>
								</div>
							</div>-->
						</div>
						<div class="row">
				<div class="col-md-12">
					<center>
						<ul class="pagination" id="pageno">
							<li><a href="#">1</a></li>
						</ul>
					</center>
				</div>
			</div>
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
		<script>
		$(function(){
			$('.carousel').carousel({
				interval:1000*1
			});
		})
		</script>
	</body>
	
</html>