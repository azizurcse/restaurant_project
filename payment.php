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
							<h1>Thank you</h1>
							<hr/>
							<p>Hello <?php echo $_SESSION["name"];?>,your order is completed wait half an hour and it reach your destination.<br/></p>
							<a href="food_page.php" class="btn btn-success btn-lg">Continue ordering</a>
						</div>
						<div class="panel-footer"></div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>