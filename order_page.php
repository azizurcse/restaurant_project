<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:food_page.php");
}
?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<title>Food Collection</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
			<link rel="stylesheet" href="css/restaurant_book.css"/>
		<link rel="stylesheet" href="css/order_icon.css"/>
		<script src="js/jquery.js"></script>
		<script src="main.js"></script>
		<script src="js/bootstrap.min.js"></script>
	
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

		<div class="container-fluid">
		
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="order_msg">
					<!-- ordering message-->
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Order Checkout</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-2"><b>Action</b></div>
								<div class="col-md-2"><b>Food Image</b></div>
								<div class="col-md-2"><b>Food Name</b></div>
								<div class="col-md-2"><b>Quantity</b></div>
								<div class="col-md-2"><b>Food Price</b></div>
								<div class="col-md-2"><b>Price in Tk</b></div>
							</div>
							<div id="order_checkout"></div>
						<!--	<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<div class="col-md-2"><img src='admin_area/food_images/images.jpg'/></div>
								<div class="col-md-2">food Name</div>
								<div class="col-md-2"><input type='text' class='form-control' value='1'></div>
								<div class="col-md-2"><input type='text' class='form-control' value='343' disabled></div>
								<div class="col-md-2"><input type='text' class='form-control' value='343' disabled></div>
							</div>
							<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-4">
									<b>Total Tk 343</b>
								</div>
							</div>-->
						</div>
						<div class="panel-footer"></div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>