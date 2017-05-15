<?php
$headers="MIME-Version:1.0" . "\r\n";
$headers="Content-type:text/html;charset=UTF-8" . "\r\n";
$headers='From: <azizur.jibon@gmail.com>' . "\r\n";


$subject="Order Details";

$message="<html>
<p>Hello dear <b>jibon</b>you have ordered some foods from our web application.Your order will be processed shortly.Thank you</p>

<table width='600' align='center' bgcolor='#ffcc99' border='2'>

	<tr><td><h3>Your order Details from ris.com</h3></td></tr>
	
	<tr>
		<th><b>S.N</b></th>
		<th><b>Foods Name</b></th>
		<th><b>Quantity</b></th>
		<th><b>Total Price</b></th>
		<th><b>Invoice No</b></th>
	</tr>
	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	
	</tr>

</table>

<h4>Please complete your payments with our Delivery man</h4>

?>