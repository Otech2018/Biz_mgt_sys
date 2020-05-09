<?php     
require "../script/php/connect.php";
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

   <title> ALL RESTORED LAPTOPS - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'>  ALL RESTORED LAPTOPS </h1>
<br/>
<form method='post'>
     
     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			<form method='post'>
			<div class="input-field col m3 l3 s12">
				<select required name='invoice_location'>
				     <option value="all"   selected >All Location </option>
				
				  <?php 
								
							 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where deleted='0' ";
								$get_locations = $connect ->query($sql_location);	
								while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){
					
							
								extract($get_locations_data );
								echo "<option value='$location_id'> $location_name </option>";
									}	
						?>
				</select>
				<label> <b> Select Location </b> </label>
			  </div>
			  
					 <div class="input-field col m3 l3 s12">
			  FROM (DATE)
				<input type="date" required name='start_date'>
			 </div>
			  
			  
			   <div class="input-field col m3 l3 s12">
			  TO (DATE)
				<input type="date" required name='end_date'>
			 </div>
			 
			 
			  
			  <div class="input-field col m3 l3 s12">
				<button type='submit' class='btn deep-orange pulse' name='view_invoice'>  VIEW <i class='fa fa-eye'></i></button>
		
			  </div>
			</form>
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		
		
		<div class="col m1 l1 s0"></div>

	</div>

	
   
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
				<form method='post'>
				<?php
							if( isset($_POST['view_invoice']) ){
								$invoice_location = addslashes(htmlentities($_POST['invoice_location']));
								 $start_date = addslashes(htmlentities($_POST['start_date']));
								$end_date = addslashes(htmlentities($_POST['end_date']));
								if( $invoice_location ==='all'){
								 $get_invoice = new run_query("select * from returns where refund_Date between '$start_date' and  '$end_date'  order by refund_id desc");
								
								 }else{
								  $get_invoice = new run_query("select * from returns  where refund_locationId='$invoice_location' and refund_Date between '$start_date' and  '$end_date'  order by refund_id desc ");
								
								 }
								if( $get_invoice->num_rows >= 1){	
								$no =1;								
										while(	$get_invoice_data =	$get_invoice->result() ){
										
											extract($get_invoice_data );
											
											 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$refund_locationId'  ";
												$get_locations = $connect ->query($sql_location);	
												$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
					
											extract($get_locations_data );
											
											$get_user = new run_query("select * from users where user_id= '$refund_userId' ");
											$get_user_data =	$get_user->result();
											extract($get_user_data );
											
											$get_stock = new run_query("select * from stock where id= '$refund_stockId' ");
											$get_stock_data =	$get_stock->result();
											extract($get_stock_data ); extract($get_invoice_data );
											
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
												$get_invoice1 = new run_query("select * from sales where invoiceNumber= '$refund_invoiceNumber' ");
											$get_invoice_data1 =	$get_invoice1->result();
											extract($get_invoice_data1 );
											
											
													$amount = number_format("$amount",2,".",","); 
												$amt_paid = number_format("$amt_paid",2,".",","); 
												$balance_amt = number_format("$balance_amt",2,".",","); 
												$refund_Amount = number_format("$refund_Amount",2,".",","); 
													echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																<li>
																  <div class='collapsible-header deep-orange white-text'> $model_name ($RAM  RAM) REFUND(N$refund_Amount)  $refund_Date  </div>
																  <div class='collapsible-body blue lighten-5'>
																  <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>STOCK ID: </b></td> <td>    $stock_id </td>  </tr>
																 <tr> <td> <b>STOCK MODEL: </b></td> <td>    $model_name </td>  </tr>
																 <tr> <td> <b>STOCK SERIAL/IMEI: </b></td> <td>    $serial </td>  </tr>
																
																<tr> <td> <b>INVOICE NUMBER: </b></td> <td>   $invoiceNumber </td>  </tr>
																	 <tr> <td> <b> PHYSICAL INVOICE NUMBER: </b></td> <td>   $physicalInvoiceNumber </td>  </tr><tr> <td> <b> STATUS: </b></td> <td>   $status </td>  </tr>
																  </table>
																
																   <br/><br/>
																    <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>CUSTOMER NAME: </b></td> <td>    $buyerName</td>  </tr>
																 <tr> <td> <b>CUSTOMER ADDRESS: </b></td> <td>    $buyerAddress</td>  </tr>
																 <tr> <td> <b>CUSTOMER PHONE </b></td> <td>    $buyerPhone </td>  </tr>
																 	<tr> <td> <b> CUSTOMER ACC NAME: </b></td> <td>   $refundName </td>  </tr>
																	<tr> <td> <b> CUSTOMER ACC NUMBER: </b></td> <td>   $refund_AccountNumber </td>  </tr>
																	<tr> <td> <b> CUSTOMER BANK NAME: </b></td> <td>   $refund_Bank_Name </td>  </tr>
																	
																
																 </table>
																   <br/><br/>
																   <table class='bordered striped z-depth-3 ' >
																<tr> <td> <b> REFUND TYPE: </b></td> <td>   $refund_Type </td>  </tr>
																<tr> <td> <b> REFUND AMOUNT: </b></td> <td style='color:red;'>   $refund_Amount </td>  </tr>
																	
																<tr> <td> <b> LOCATION: </b></td> <td>   $location_name </td>  </tr>
																<tr> <td> <b> REFUND POLICY: </b></td> <td style='color:red;'>   $refund_Policy </td>  </tr>
																
																	<tr> <td> <b>REFUNDED BY: </b></td> <td>   $user_username </td>  </tr>
																<tr> <td> <b>DATE: </b></td> <td>   $refund_Date </td>  </tr>
																
																
																
																  </table>
																  
																    <br/><br/><br/> <b>REASON</b><hr/>
																  $refund_Reason
																	<br/> <br/><br/> 
																  
															
																  <br/><br/><br/> <b>CONDITIONS</b><hr/>
																  $refund_Condition
																	<br/> <br/><br/> 
																	
																  </div>
																</li>			
																		 </ul>
		
													
													
													";
													
													
													$no++;	
												}
								 
								}else{
										echo "<script>
											alert('No Result Found!');
											
									</script>"; 
								}
							}
							
					?>
					
						</form>
														
			</div>
		
		<div class="col m1 l1 s0"></div>

	</div>

	
</form>

   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>


</body>

</html>
















