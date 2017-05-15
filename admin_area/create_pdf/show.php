<?php

$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["create_pdf"]))  
 {  

	 
	
	if(isset($_GET['order_details'])){
    $user_id=$_GET['order_details'];
    $get_order="SELECT * FROM order_table where user_id='$user_id'";
    $run_order=mysqli_query($con,$get_order);
    
    
    $i=0;
    while($row_order=mysqli_fetch_array($run_order)){
        
        $order_id=$row_order['id'];
        
        $food_id=$row_order['f_id'];
        $user_id=$row_order['user_id'];
        $food_title=$row_order['food_title'];
        $food_image=$row_order['food_image'];
        $quantity=$row_order['quantity'];
        
       
        $food_price=$row_order['price'];
        $food_tl_price=$row_order['total_amount'];
      
		$i++;
		require_once("tcpdf/tcpdf.php");  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();

	?>
      <?php  
      $content = '';  
        $content='<table>';
      $content .= '<tr>  
                <th width="5%">ID</th>  
                <th width="30%">Name</th>  
                <th width="10%">email</th>  
                <th width="45%">mobile</th>  
                <th width="10%">address</th>  
           </tr>';  
      $content .= '</table>'; 
	}	  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 } 
 } 
 ?>  