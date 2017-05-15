<?php

if(empty($_POST)){
	header("location:index.php");
	
}
$name=$_POST['name'];
$roll=$_POST['roll'];
$email=$_POST['email'];
$phone=$_POST['phone'];

ob_start();

echo"<page backtop='7mm' backbottom='7mm' backleft='10mm' backright='10mm'>";
echo"<page_header>test</page_header>";
echo"bonjour ";
echo "your name is ".$name;
echo "your roll is ".$roll;
echo "your email is ".$email;
echo "your phone is ".$phone;
echo "</page>";

$content=ob_get_clean();
require_once("html2pdf/vendor/autoload.php");
try{
	$pdf=new HTML2PDF('P','A4','fr');
	$pdf->writeHTML($content);
	$pdf->output('test.pdf');
	exit;
	
}
catch(HTML2PDF_exception $e){
	echo "error ".$e;
	exit;
}

?>