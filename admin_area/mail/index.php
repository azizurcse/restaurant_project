<?php
$email=$_POST['email'];
require 'PHPMailer-master/PHPMailerAutoload.php';

$bodycontent="hello jibon";
//create a new phpmailer instance
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

// tell phpmailer to use smtp
$mail->isSMTP();
//set the hostname of the mail server                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'azizurrahmanjibon@gmail.com';                 // SMTP username
$mail->Password = 'rahman100141';                           // SMTP password
                            // Enable TLS encryption, `ssl` also accepted
                                    // TCP port to connect to

$mail->setFrom('azizurrahmanjibon@gmail.com');
$mail->addAddress($email);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('azizurrahmanjibon@gmail.com');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = $bodycontent;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>

<form method="post">
	<input type="text" name="email"/>
	<input type="submit" name="submit" value="send"/>

</form>