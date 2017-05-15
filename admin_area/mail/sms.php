<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" action="" method="post">
<input type="text" name="text1"><br>
<input type="text" name="text2"><br>
<input type="submit" name="submit1" value="send sms">

</form>

<?php
if(isset($_POST["submit1"]))
{
$_objSmsProtocolGsm = new Com("ActiveXperts.SmsProtocolGsm");
	
	
	
	

		//create the nessecairy com objects
		$objMessage   = new Com ("ActiveXperts.SmsMessage");
		$objConstants = new Com ("ActiveXperts.SmsConstants");
		
		//get the submitted information
		$device       = "HUAWEI Mobile Connect - 3G Modem #2";
		$speed = "Default";       
		$pincode      ="";
		
		
		$recipient    = "+91" . $_POST["text1"];
		$message      = $_POST["text2"];
		
		
		$unicode      = "";
		
$_objSmsProtocolGsm->Logfile = "C:\SMSMMSToolLog.txt";
		
		//Clear the messageobject first
		$objMessage->Clear();
		
		$objMessage->Clear();
		
			if( $recipient == "" ) die("No recipient address filled in."); 
		$objMessage->Recipient = $recipient;
		
		
		if( $unicode != "" ) $objMessage->Format = $objConstants->asMESSAGEFORMAT_UNICODE;
		
			$objMessage->Data = $message;
			$_objSmsProtocolGsm->Clear();
			
			
			
			
			
			
			
			$_objSmsProtocolGsm->Device = $device;
		
		//fill in the devicespeed
		if( $speed == "Default" ) $_objSmsProtocolGsm->DeviceSpeed = 0;
		if( $speed != "Default" ) $_objSmsProtocolGsm->DeviceSpeed = $speed;
		
			if( $pincode != "" ) $_objSmsProtocolGsm->EnterPin( $pincode );
			
				if( $_objSmsProtocolGsm->LastError == 0 ){
        	$_objSmsProtocolGsm->Send( $objMessage );
			}
			
			$LastError        = $_objSmsProtocolGsm->LastError;
		$ErrorDescription = $_objSmsProtocolGsm->GetErrorDescription( $LastError );
		
		
		
}


?>

</body>
</html>
