

<!DOCTYPE html>
<html lang="en">

    <head>
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
        <title>Restaurant Information System</title>
    </head>
    
    <body>
     
        
        <section class="section-form">
            <div class="row">
                <h2>We're happy to hear from you</h2>
            </div>
            <div class="row">
                <div class="row">
			
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Customer SignUp Form</div>
						<div class="panel-body">
						
						<form method="post" action="register_process.php" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<label for="f_name">First Name</label>
									<input type="text" id="f_name" name="f_name" class="form-control"/>
								</div>
								<div class="col-md-6">
									<label for="f_name">Last Name</label>
									<input type="text" id="l_name" name="l_name" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="email" id="email" name="email" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="password">Password</label>
									<input type="password" id="password" name="password" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="repassword">Re-enter Password</label>
									<input type="password" id="repassword" name="repassword" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label >Image</label>
									<input type="file" name="image" id="image" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="mobile">Mobile No</label>
									<input type="text" id="mobile" name="mobile" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="address1">Present Address</label>
									<input type="text" id="address1" name="address1" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="address2">permanent Address</label>
									<input type="text" id="address2" name="address2" class="form-control"/>
								</div>
							</div>
							<p><br /></p>
							<div class="row">
								<div class="col-md-12">
									
									<input style="float:right;" value="SignUp" type="submit"  name="registration" class="btn btn-success btn-lg"/>
								</div>
							</div>
							
						</div>
						</form>
						<div class="panel-footer"></div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
        </section>
        
        
        <!--************
            **********footer area********
       ***************** -->
        
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
