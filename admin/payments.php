<?php     
require "../script/php/connect.php";


					

					if(isset($_GET['invoice_id']))  {
								 $invoice_id = addslashes(htmlentities($_GET['invoice_id'])) ;
								$get_payments = new run_query("select * from payments where totalAmountPaid >=1 and  invoiceNumber='$invoice_id' ");
													
								}else{
						
						 echo "<script>
										window.location.replace(\"index.php\");
																					
								</script>"; 
						
						}
														
							


?>

<!doctype html>

<html>
	<head>

<?php     


$active= "payment";

require "../script/mlc/script_head.php";
?>


<!-------
	<meta name="viewport" content="width=1024">
   

   <meta name="viewport" content="width=device-width, initial-scale=1">
	
	--->
	
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <meta name="description" content=" FAST AND AMAZING ">
    <meta name="keywords" content=" OYEMART COMPUTERS  ">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    
  <meta http-equiv="pragma" content="no-cache" />

   <title> SEARCH PAYMENTS - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'>  PAYMENTS FOR INVOICE <?php echo $invoice_id; ?></h1>

	
   
      
     <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
				<form method='post'>
				<?php
							
								if( $get_payments->num_rows >= 1){	
								$no =1;								
											while(	$get_payments_data =	$get_payments->result() ){
										
											extract($get_payments_data );
											
											 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where  location_id= '$locationId' ";
												$get_locations = $connect ->query($sql_location);	
												$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
												
											extract($get_locations_data );
											
											$get_user = new run_query("select * from users where user_id= '$recordedBy' ");
											$get_user_data =	$get_user->result();
											extract($get_user_data );
											
											$get_stock = new run_query("select * from stock where id= '$stockId' ");
											$get_stock_data =	$get_stock->result();
											extract($get_stock_data );
											
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											 if( $acc_details_id !='0'){
											$get_bank = new run_query("select * from bank_details where bank_id= '$acc_details_id' ");
											$get_bank_data =	$get_bank->result();
											extract($get_bank_data );
											}else{
											$bank_name  ="";
											$bank_acc_no  ="";
											}
												
													$price = number_format("$price",2,".",",");  $balance = number_format("$balance",2,".",","); 
												$referrer_amt = number_format("$referrer_amt",2,".",","); 
											$bankAmount = number_format("$bankAmount",2,".",","); 
											$posAmount = number_format("$posAmount",2,".",","); 
											$cashAmount = number_format("$cashAmount",2,".",","); 
											$totalAmountPaid = number_format("$totalAmountPaid",2,".",","); 
													echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																<li>
																  <div class='collapsible-header deep-orange white-text'> $model_name ($RAM  RAM) (N$totalAmountPaid) $paymentDate </div>
																  <div class='collapsible-body blue lighten-5'>
																  <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>STOCK ID: </b></td> <td>    $stockId </td>  </tr>
																 <tr> <td> <b>STOCK MODEL: </b></td> <td>    $model_name </td>  </tr>
																 <tr> <td> <b>STOCK SERIAL/IMEI: </b></td> <td>    $serial </td>  </tr>
																
																<tr> <td> <b>INVOICE NUMBER: </b></td> <td>   $invoiceNumber </td>  </tr>
																	 <tr> <td> <b> PHYSICAL INVOICE NUMBER: </b></td> <td>   $physical_invoice </td>  </tr>
																  </table>
																
																  
																   <br/><br/>
																   <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>SALE LOCATION: </b></td> <td>    $location_name </td>  </tr>
																	<tr> <td> <b> PAYMENT DATE: </b></td> <td>   $dateSold </td>  </tr>
																	 <tr> <td> <b> PRICE SOLD: </b></td> <td>   $price </td>  </tr>
																	 <tr> <td> <b>SOLD BY: </b></td> <td>   $user_username </td>  </tr>
																
																
																  </table>
																  
																  
																   <br/><br/>
																   <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>CASH: </b></td> <td>    $cashAmount </td>  </tr>
																	<tr> <td> <b> POS: </b></td> <td>    $posAmount </td>  </tr>
																	 <tr> <td> <b> POS STAN:  </b></td> <td>   $posStan </td>  </tr>
																	   <tr> <td> <b> POS DIGIT: </b></td> <td>   $posDigit</td>  </tr>
																	   
																	<tr> <td> <b>BANK TRANSFER: </b></td> <td>     $bankAmount  </td>  </tr>
																	<tr> <td> <b>BANK DETAILS: </b></td> <td>     $bank_name ( $bank_acc_no )  </td>  </tr>
																	  <tr> <td> <b>TOTAL AMT PAID:</b></td> <td>    <b>  $totalAmountPaid </b></td>  </tr>
																 	   <tr> <td> <b>BALANCE:</b></td> <td style='color:red;'>    <b>  $balance </b></td>  </tr>
																 	<tr> <td> <b>REFERRER AMT:</b></td> <td>    <b>  $referrer_amt </b></td>  </tr>
																 
																 <tr> <td> <b>PAYMENT DATE: </b></td> <td>   $paymentDate </td>  </tr>
																   
																
																  </table>
																 
															
																  <br/><br/><br/> <b>COMMENTS</b><hr/>
																  $pay_comments
																	<br/> <br/><br/> 
																	
																		
																  </div>
																</li>			
																		 </ul>
		
													
													
													";
													
													
													$no++;	
												}
								 
								}else{
									echo "<h6 align='center'class='red-text'>
											<br/><br/><br/>
											NO PAYMENT(S) FOUND...
									</h6>"; 
									
								}
							
							
					?>
					
						</form>
														
			</div>
		
		<div class="col m1 l1 s0"></div>

	</div>


   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>


</body>

</html>
















