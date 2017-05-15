<html>
<head>
		<link rel="stylesheet" href="footer_cs.css"/>
		<script src="js/jquery.js"></script>
		<script src="main.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		
		<link rel="stylesheet" href="css/restaurant_book.css"/>
		<link rel="stylesheet" href="css/order_icon.css"/>
       <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"/>
  </head>
<body>  

<nav class="navbar navbar-default">
  <div class="container-fluid">
  <!-- responsive menu bar start-->
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Food Collection</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Restaurant</a></li>
        
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" id="search" value="<?php echo isset($_GET['item'])?$_GET['item']:"" ?>"/>
        </div>
        <button class="btn btn-primary" id="search_btn">Search</button>
      </form>
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
								<div class="panel-body"></div>
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
										<a href="#" style="color:white;list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login"/>
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
							</div>
						</ul>
					
					</li>
					<li><a href="registration.php"><span class="glyphicon glyphicon-user"></span>Sign Out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- responsive menu bar end-->
</body>
</html>