<!DOCTYPE html>
<html>
<head>
	<title>Send Mail to Customers for Delivery Information</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body bgcolor="#6ba2f9">
<div class="container">
	<div class="row">
		<h1>Send Mail to Customers for Delivery Information</h1>
		<div class="col-md-6">
			<?php
			if (isset($_POST['submit'])) {
				$email =$_POST['email'];
				$comment =$_POST['comment'];
				$demail =$_POST['delivery_man'];
				
				$order_image=$_FILES['order_image']['name'];
				$order_image_tmp=$_FILES['order_image']['tmp_name'];
				move_uploaded_file($order_image_tmp,"PHPMailer-master/files/$order_image");
				$email_attach =$_POST['attach_title'];
				$image_data="PHPMailer-master/files/$order_image";
				require 'PHPMailer-master/PHPMailerAutoload.php';
				$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

// tell phpmailer to use smtp
$mail->isSMTP();
//set the hostname of the mail server                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'restaurantinformationsystem@gmail.com';                 // SMTP username
$mail->Password = 'restaurant123';                           // SMTP password
$image_data="PHPMailer-master/files/$order_image";                            // Enable TLS encryption, `ssl` also accepted
                                    // TCP port to connect to

$mail->setFrom('restaurantinformationsystem@gmail.com');
$mail->addAddress($email);     // Add a recipient
$mail->addAddress($demail);               // Name is optional
$mail->addReplyTo('restaurantinformationsystem@gmail.com');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment($image_data,$email_attach);         // Add attachments
//$mail->addAttachment('files/image.jpg', 'image.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$bodycontent=$comment;
$mail->Subject = 'Here is the subject';
$mail->Body    = $bodycontent;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
				    ?>
				    <div class="alert alert-danger alert-dismissable fade in">
				   	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   		Message could not be sent.
				   	</div>
				    <?php
				} else {
				    ?>
				   	<div class="alert alert-success alert-dismissable fade in">
				   	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   		Message has been sent
				   	</div>
				    <?php
					
				}
			}
			?>
			<a href="../admin.php?view_orders"><button class="btn btn-primary">back</button></a>
			<!--<form action="" method="post">
				<div class="form-group">
					<label class="control-label">Enter Email Address: </label>
					<input type="text" name="email" class="form-control" placeholder="Enter Email" required>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" value="Send Message" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>-->