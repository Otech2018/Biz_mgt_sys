<?php     
require "../script/php/connect.php";



					if(isset($_GET['customer_id']))  {
								 $type = addslashes(htmlentities($_GET['type'])) ;
								 $customer_id = addslashes(htmlentities($_GET['customer_id'])) ;
								$get_customer = new run_query("select * from customers  where customer_id='$customer_id' ");
														if( $get_customer->num_rows >= 1){			
														$get_customer_data =	$get_customer->result();
														
															extract($get_customer_data );
																	}else{
														
														 echo "<script>
																		window.location.replace(\"index.php\");
																													
																</script>"; 
														
														}
														
										if( $type=='complete'){
											$title ="COMPLETED";
											$get_invoice = new run_query("select * from sales where customerId='$customer_id' and balance_amt <=0  order by invoice_id desc");
								
										}else if( $type=='pending' ){
											
											$title ="PENDING";
											$get_invoice = new run_query("select * from sales where customerId='$customer_id' and balance_amt >=1  order by invoice_id desc");
								
										}else{
											echo "<script>
																		window.location.replace(\"index.php\");
																													
																</script>"; 
											
										}
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

   <title> CUSTORMER INVOICE - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";
?>	
  
    <div class="row">
		<h1 align='center'> <?php echo $customer_name; ?> </h1>
	<h5 align='center'> <?php echo " $customer_email ($customer_phone) "; ?> </h5>
		<h6 align='center'> <?php echo $customer_address; ?> </h6> <hr/>

	</div>

	
   
      
      
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
					<h3 align='center'> <?php echo $title?> INVOICE(S) </h3>
				<form method='post'>
				<?php
							
								if( $get_invoice->num_rows >= 1){	
								$no =1;								
										while(	$get_invoice_data =	$get_invoice->result() ){
										
											extract($get_invoice_data );
											
											
											 $sql_location = "select * from oyemart_ospos10.ospos_stock_locations where  location_id= '$locationId'   ";
											$get_locations = $connect ->query($sql_location);	
											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
											extract($get_locations_data );
											
											$get_user = new run_query("select * from users where user_id= '$soldBy' ");
											$get_user_data =	$get_user->result();
											extract($get_user_data );
											
											$get_stock = new run_query("select * from stock where id= '$stock_id' ");
											$get_stock_data =	$get_stock->result();
											extract($get_stock_data ); extract($get_invoice_data );
											extract($get_invoice_data );
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
											$add_payment ="";
												if($balance_amt >=1){
													
													$add_payment ="<a class='btn green right' href='payment2.php?add_payment=$invoice_id' title='ADD PAYMENT'><i class='fa fa-money'></i> <i class='fa fa-plus'></i></a>";
												}
													$amount = number_format("$amount",2,".",","); 
												$amt_paid = number_format("$amt_paid",2,".",","); 
												$balance_amt = number_format("$balance_amt",2,".",","); 
													echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																<li>
																  <div class='collapsible-header deep-orange white-text'> $model_name ($RAM  RAM) (N$amount) $saleDate </div>
																  <div class='collapsible-body blue lighten-5'>
																  <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>STOCK ID: </b></td> <td>    $stock_id </td>  </tr>
																 <tr> <td> <b>STOCK MODEL: </b></td> <td>    $model_name </td>  </tr>
																 <tr> <td> <b>STOCK SERIAL/IMEI: </b></td> <td>    $serial </td>  </tr>
																
																<tr> <td> <b>INVOICE NUMBER: </b></td> <td>   $invoiceNumber </td>  </tr>
																	 <tr> <td> <b> PHYSICAL INVOICE NUMBER: </b></td> <td>   $physicalInvoiceNumber </td>  </tr>
																	 <tr> <td> <b> STATUS: </b></td> <td>   $status </td>  </tr>
																  </table>
																
																  
																   <br/><br/>
																   <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>SALE LOCATION: </b></td> <td>    $location_name </td>  </tr>
																	<tr> <td> <b> DATE SOLD: </b></td> <td>   $dateSold </td>  </tr>
																	 <tr> <td> <b> PRICE SOLD: </b></td> <td>  <b> $amount </b></td>  </tr>
																	<tr> <td> <b> AMOUNT PAID: </b></td> <td>   $amt_paid </td>  </tr>
																	 <tr> <td> <b> BALANCE : </b></td> <td style='color:red;'>   $balance_amt </td>  </tr>
																	

																	<tr> <td> <b>SOLD BY: </b></td> <td>   $user_username </td>  </tr>
																
																
																  </table>
																  
																  
																  
															
																  <br/><br/><br/> <b>COMMENTS</b><hr/>
																  $invoice_comments
																	<br/> <br/><br/> 
																	<a class='btn blue ' href='payments.php?invoice_id=$invoiceNumber' title='View PAYMENT'>VIEW PAYMENT(S)</a>
												
																	$add_payment	
																  </div>
																</li>			
																		 </ul>
		
													
													
													";
													
													
													$no++;	
												}
								 
								}else{
											echo "<h6 align='center'class='red-text'>
											<br/><br/><br/>
											NO INVOICE FOUND...
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
















