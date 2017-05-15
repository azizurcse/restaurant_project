<?php
include "database_connection.php";
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$sql="select * from user_info where email='$email'";
		$email_check=mysqli_query($con,$sql);
		$count=mysqli_num_rows($email_check);
		
	
	
	if($count != 0){
		 $rand=rand(343434,434343);
		 $new_pass=md5($rand);
		 
		 $update_pass="update user_info set password='$new_pass' where email='$email'";
		 $run_qry=mysqli_query($con,$update_pass);
		 
		 /// mail area
		 


require 'admin_area/mail/PHPMailer-master/PHPMailerAutoload.php';
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
//$image_data="PHPMailer-master/files/$order_image";                            // Enable TLS encryption, `ssl` also accepted
                                    // TCP port to connect to

$mail->setFrom('restaurantinformationsystem@gmail.com');
$mail->addAddress($email);     // Add a recipient
//$mail->addAddress($demail);               // Name is optional
$mail->addReplyTo('restaurantinformationsystem@gmail.com');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment($image_data,$email_attach);         // Add attachments
//$mail->addAttachment('files/image.jpg', 'image.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$bodycontent="here is your new password: $rand";
$mail->Subject = 'Here is the subject';
$mail->Body    = $bodycontent;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
				    
				    echo "mail is not send";
				    
				} else {
				    
				   	echo "mail is send";
				    
					
				}
			}else{
		echo "email is not exits";
	}
			
	
}	

?>