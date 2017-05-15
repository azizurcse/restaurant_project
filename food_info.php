<?php
include "database_connection.php";
if(isset($_GET["fid"])){
	$id=$_GET["fid"];
	$sql="SELECT * FROM food_table WHERE food_id='$id'";
	$run_query=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
		$food_name=$row["food_name"];
		$food_price=$row["food_price"];
		$food_image=$row["food_image"];
		$food_restaurant=$row["food_restaurant"];
	}
}
?>


<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<title>Food Collection</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery.js"></script>
		<script src="main.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style>
			table tr td{
				padding:10px;
			}
		</style>
	</head>
	
	<body>
	<div id="box"></div>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar navbar-header">
					<a href="#" class="navbar-brand">Food Collection</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="#">Home</a></li>
					<li><a href="#">Food</a></li>
					<li><a href="#">Restaurant</a></li>
				</ul>
			</div>
		</div>
		<p><br /></p>
		<p><br /></p>
		<p><br /></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading"></div>
						<div class="panel-body">
							<h1>Food Details</h1>
							<div class="row">
								<div class="col-md-6">
									<img style="float:right;" src="admin_area/food_images/<?php echo $food_image;?>" class="img-thumbnail"/>
								</div>
								<div class="col-md-6">
									<table>
										
											<tr><td>Food Name</td><td><b><?php echo $food_name;?></b></td></tr>
											<tr><td>Food Price</td><td><b><?php echo $food_price;?> Tk</b></td></tr>
											<tr><td>Restaurant Name</td><td><b><?php echo $food_restaurant;?></b></td></tr>
											<tr><td>Payment</td><td><b>Home Delivery</b></td></tr>
											
											
										
									</table>
									<div class="btn btn-success"><a href="food_page.php" style="list-style:none;text-decoration:none;color:white;">Go back</a></div>
								</div>
							</div>
						</div>
						<div class="panel-footer"></div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>