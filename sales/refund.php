<?php     
require "../script/php/connect.php";



	if(isset($_GET['stock_id']) && isset($_GET['invoice_id']))  {
								
								 $stock_id = addslashes(htmlentities($_GET['stock_id'])) ;
								 $invoice_id = addslashes(htmlentities($_GET['invoice_id'])) ;
								$update_stock = new run_query("update stock set status='3' where id='$stock_id'  and status='1' ");
								$update_invoice = new run_query("update sales  set status='CANCELLED', balance_amt='0' where invoice_id='$invoice_id'  and amt_paid='0.00' ");
								
														 echo "<script>
																	alert('Laptop Returned! ');
																		window.location.replace(\"return.php\");
																													
																</script>"; 
														
														}
														
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "search_stock";

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

   <title> RETURN & REFUND ITEM - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";


$user_location20 =$user_location;
?>	
   <div class="container">
   <h1 style='font-family:arial' align='center' class=' tada blue-text'> <i class='fa fa-search'></i> RETURN  & REFUND  AN ITEM </h1>
<br/>

     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			<div class="col m1 l1 s0"></div>
			<form method='post'>
			<div class="input-field col m4 l4 s12">
				  <select required name='stock_location'>
				  <option value="all"    >All Location </option>
				
				  <?php 
							
								$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where deleted='0' ";
					$get_locations = $connect ->query($sql_location);	
					while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){
								extract($get_locations_data );
								if( $location_id == $user_location ){
								  echo "<option value='$location_id' selected > $location_name </option>";
								
								}else{
								    echo "<option value='$location_id'> $location_name </option>";
									}	
								}
						?>
				</select>
				<label> <b> Select Location </b> </label>
			  </div>
			  
			  <div class="input-field col m4 l4 s12">
			<input id="email" type="text" required name='search'>  
				  <label for="email"> <i class='fa fa-search'></i> From Stock  </label>
				 
				</div>
			  
			  <div class="input-field col m2 l2 s12">
			 	<a  class=' pulse  modal-trigger' href='#info'  style='padding:5px; background-color:blue; color:white; border-radius:20px;'>   <i class='fa fa-info'></i></a>
					<button type='submit' class='btn deep-orange pulse' name='view_stock'>   <i class='fa fa-search'></i></button>
		
			  </div>
			</form>
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		
		
		<div class="col m1 l1 s0"></div>

	</div>

												<div id='info' class='modal'>
														<div class='modal-content'>
													  <a href='#!' class='modal-action modal-close right red-text'> <i class='fa fa-close'></i></a>
															
														  <h4>Here Are The List of What You Can Search For!</h4>
															<ol>
																		<li>Laptop Model</li>
																		<li>Laptop Serial / IMEI</li>
																		<li>battery Serial / IMEI</li>
																		<li>Hard Disk Size eg 500</li>
																		<li>Ram Size eg 2</li>
																		<li>Date Registered</li>
																		<li>Price eg 10000</li>
																		<li>Hard Disk Type  </li>
																		<li>RAM Type  </li>
																		<li>Processor Type  </li>
																</ol>																
														</div>
														
													  </div>
   
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
				<form method='post'>
				<?php
							if( isset($_POST['view_stock']) ){
								$stock_location = addslashes(htmlentities($_POST['stock_location']));
								$search = addslashes(htmlentities($_POST['search']));
								
								$search_query = " and (
															serial  like '%$search%' 
													OR	battSerial like '%$search%' 
													OR	HDD like '%$search%' 
													OR	HDDtype like '%$search%' 
													OR	extraHDD like '%$search%' 
													OR	extraHDDtype like '%$search%' 
													OR	RAM like '%$search%' 
													OR	RAMtype like '%$search%' 
													OR	processorType like '%$search%' 
													OR	processorSpeed like '%$search%' 
													OR	dateRecorded like '%$search%' 
													OR	price like '%$search%' 
														
														)";
								 if( $stock_location ==='all'){
								 $get_stocks = new run_query("select * from stock where  status =1 $search_query ");
								
								 }else{
								  $get_stocks = new run_query("select * from stock  where currentLocation='$stock_location' and status =1  $search_query ");
								
								 }
								if( $get_stocks->num_rows >= 1){	
								
									
								$no =1;								
															while(	$get_stocks_data =	$get_stocks->result() ){
											
											
										
											extract($get_stocks_data ); 
											
											
											
											$price = number_format("$price",2,".",","); 
											
											
											$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$currentLocation'  ";
											$get_locations = $connect ->query($sql_location);	
											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
					
											extract($get_locations_data );
											
											$get_user = new run_query("select * from users where user_id= '$recordedBy' ");
											$get_user_data =	$get_user->result();
											extract($get_user_data );
											
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
											
											$get_processor_type = new run_query("select * from laptop_processor_type where processor_id= '$processorType' ");
											$get_processor_type_data =	$get_processor_type->result();
											extract($get_processor_type_data );
											
												$get_scr = new run_query("select * from laptop_screen where screen_id= '$screenSize' ");
											$get_scr_data =	$get_scr->result();
											extract($get_scr_data );
												
												$status = "Sold";
											
											
											
											
											
													echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																			<li>
																			  <div class='collapsible-header deep-orange white-text'>$no |  $model_name  ($RAM  RAM ) ($HDD  HDD)</div>
																			  <div class='collapsible-body'>
																			  
																	<div class='green lighten-5' style='padding:20px;'>
																	<h1 align='center'>STOCK DETAILS</h1>
																  
																				 <table class='bordered striped z-depth-3 ' >
																 
																				<tr><td>STOCK ID:  </td><td> $id </td></tr>
																				 <tr><td>MODEL:  </td><td> $model_name  </td></tr>
																				  <tr><td>SERIAL/IMEI:   </td><td> $serial  </td></tr>
																				  <tr><td>BATERY SERIAL:    </td><td> $battSerial  </td></tr>
																				  <tr><td>HARD DRIVE SIZE:    </td><td> $HDD  </td></tr>
																				  <tr><td>HARD DRIVE TYPE:</td><td>$HDDtype</td></tr> <tr><td>EXTRA HARD DRIVE SIZE:    </td><td> $extraHDD </td></tr>  <tr><td>EXTRA HARD DRIVE TYPE:    </td><td> $extraHDDtype </td></tr>
																				  <tr><td>RAM SIZE:   </td><td> $RAM  </td></tr>
																				  <tr><td>RAM TYPE:   </td><td> $RAMtype </td></tr>
																				  <tr><td>DEDICATED VIDEO RAM:   </td><td> $VRAM </td></tr>
																				  <tr><td>PROCESSOR TYPE:   </td><td> $processor_type </td></tr>
																				  <tr><td>SCREEN SIZE:   </td><td> $screen_size </td></tr>
																				  <tr><td>CURRENT LOCATION:   </td><td> $location_name </td></tr>
																				  <tr><td>STATUS:   </td><td> $status </td></tr>
																				   <tr><td>PRICE SOLD:  </td><td> $price  </td></tr>
																				      <tr><td>RECORDED BY:  </td><td> $user_username  </td></tr>
																				  <tr><td>DATE ADDED:   </td><td> $dateRecorded </td></tr>
																				      <tr><td>CHARGER ID:   </td><td> $charger_id </td></tr>
																				 </table>
																				  
																				  <br/><br/><br/> <b>COMMENTS</b><hr/>
																				  $comments
																					<br/> <br/><br/> <b>ISSUES</b> <br/>
																					$issues 
																					<hr/>
																				</div> <br/><br/>
																			
													
													
													";
													
													$no++;
													
								$get_invoice = new run_query("select * from sales where stock_id ='$id' order by invoice_id desc");
													
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
											
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
											$add_payment ="";
												if($amt_paid  >=1 and $locationId ==$user_location20 ){
													
													$add_payment ="<a class='btn green ' href='refund_form.php?stock_id=$id&invoice_id=$invoice_id' title='RETURN ITEM'>RETURN & REFUND ITEM</a>";
												}
													$amount = number_format("$amount",2,".",","); 
												$amt_paid = number_format("$amt_paid",2,".",","); 
												$balance_amt = number_format("$balance_amt",2,".",","); 
													echo "			
													
															 <div class='blue lighten-5' style='padding:20px;'>
																	<h1 align='center'>CUSTORMER DETAILS</h1>
																  <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>CUSTOMER NAME: </b></td> <td>    $buyerName</td>  </tr>
																 <tr> <td> <b>CUSTOMER ADDRESS: </b></td> <td>    $buyerAddress</td>  </tr>
																 <tr> <td> <b>CUSTOMER PHONE </b></td> <td>    $buyerPhone </td>  </tr>
																
																 </table>
																
																	<h1 align='center'>INVOICE DETAILS</h1>
																  
																
																   <table class='bordered striped z-depth-3 ' >
																   <tr> <td> <b>INVOICE NUMBER: </b></td> <td>   $invoiceNumber </td>  </tr>
																	 <tr> <td> <b> PHYSICAL INVOICE NUMBER: </b></td> <td>   $physicalInvoiceNumber </td>  </tr><tr> <td> <b> STATUS: </b></td> <td>   $status </td>  </tr>
																 
																   
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
																	
																	$add_payment	
																  </div>   <br/><br/>   <br/><br/>
																
		
													
													
													";
													
													
													$no++;	
												}
								 
								}else{
											echo "<h6 align='center'class='red-text'>
											<br/><br/><br/>
											NO INVOICE FOUND...
									</h6>";
								}
							
										
															echo "   </div>
																			</li>
																			
																		 </ul>
																	";										
												}
												
												 
																			
								}else{
									//seraching from model table
									$get_models = new run_query("select * from laptop_model where model_name like '%$search%'   ");
											if( $get_models->num_rows >= 1){	
															
												while(	$get_model_datas =	$get_models->result() ){
														extract($get_model_datas );
														
														if( $stock_location ==='all'){
								 $get_stocks = new run_query("select * from stock where status =1 and model='$model_id' ");
														
								 }else{
								 	$get_stocks = new run_query("select * from stock where currentLocation='$stock_location' and status =1 and model='$model_id' ");
														
								 }
																if( $get_stocks->num_rows >= 1){	
																		$no =1;								
																			while(	$get_stocks_data =	$get_stocks->result() ){
											
											
										
											extract($get_stocks_data ); 
											
											
											
											$price = number_format("$price",2,".",","); 
											
											
											$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$currentLocation'  ";
											$get_locations = $connect ->query($sql_location);	
											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
					
											extract($get_locations_data );
											
											$get_user = new run_query("select * from users where user_id= '$recordedBy' ");
											$get_user_data =	$get_user->result();
											extract($get_user_data );
											
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
											
											$get_processor_type = new run_query("select * from laptop_processor_type where processor_id= '$processorType' ");
											$get_processor_type_data =	$get_processor_type->result();
											extract($get_processor_type_data );
											
												$get_scr = new run_query("select * from laptop_screen where screen_id= '$screenSize' ");
											$get_scr_data =	$get_scr->result();
											extract($get_scr_data );
												
												$status = "Sold";
											
											
											
											
											
													echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																			<li>
																			  <div class='collapsible-header deep-orange white-text'>$no |  $model_name  ($RAM  RAM ) ($HDD  HDD)</div>
																			  <div class='collapsible-body'>
																			  
																	<div class='green lighten-5' style='padding:20px;'>
																	<h1 align='center'>STOCK DETAILS</h1>
																  
																				 <table class='bordered striped z-depth-3 ' >
																 
																				<tr><td>STOCK ID:  </td><td> $id </td></tr>
																				 <tr><td>MODEL:  </td><td> $model_name  </td></tr>
																				  <tr><td>SERIAL/IMEI:   </td><td> $serial  </td></tr>
																				  <tr><td>BATERY SERIAL:    </td><td> $battSerial  </td></tr>
																				  <tr><td>HARD DRIVE SIZE:    </td><td> $HDD  </td></tr>
																				  <tr><td>HARD DRIVE TYPE:</td><td>$HDDtype</td></tr> <tr><td>EXTRA HARD DRIVE SIZE:    </td><td> $extraHDD </td></tr>  <tr><td>EXTRA HARD DRIVE TYPE:    </td><td> $extraHDDtype </td></tr>
																				  <tr><td>RAM SIZE:   </td><td> $RAM  </td></tr>
																				  <tr><td>RAM TYPE:   </td><td> $RAMtype </td></tr>
																				  <tr><td>DEDICATED VIDEO RAM:   </td><td> $VRAM </td></tr>
																				  <tr><td>PROCESSOR TYPE:   </td><td> $processor_type </td></tr>
																				  <tr><td>SCREEN SIZE:   </td><td> $screen_size </td></tr>
																				  <tr><td>CURRENT LOCATION:   </td><td> $location_name </td></tr>
																				  <tr><td>STATUS:   </td><td> $status </td></tr>
																				   <tr><td>PRICE SOLD:  </td><td> $price  </td></tr>
																				      <tr><td>RECORDED BY:  </td><td> $user_username  </td></tr>
																				  <tr><td>DATE ADDED:   </td><td> $dateRecorded </td></tr>
																				      <tr><td>CHARGER ID:   </td><td> $charger_id </td></tr>
																				 </table>
																				  
																				  <br/><br/><br/> <b>COMMENTS</b><hr/>
																				  $comments
																					<br/> <br/><br/> <b>ISSUES</b> <br/>
																					$issues 
																					<hr/>
																				</div> <br/><br/>
																			
													
													
													";
													
													$no++;
													
								$get_invoice = new run_query("select * from sales where stock_id ='$id' order by invoice_id desc");
													
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
											
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
											$add_payment ="";
												if($amt_paid  >=1 and $locationId ==$user_location20 ){
													
													$add_payment ="<a class='btn green ' href='refund_form.php?stock_id=$id&invoice_id=$invoice_id' title='RETURN ITEM'>RETURN & REFUND ITEM</a>";
												}
													$amount = number_format("$amount",2,".",","); 
												$amt_paid = number_format("$amt_paid",2,".",","); 
												$balance_amt = number_format("$balance_amt",2,".",","); 
													echo "			
													
															 <div class='blue lighten-5' style='padding:20px;'>
																	<h1 align='center'>CUSTORMER DETAILS</h1>
																  <table class='bordered striped z-depth-3 ' >
																  <tr> <td> <b>CUSTOMER NAME: </b></td> <td>    $buyerName</td>  </tr>
																 <tr> <td> <b>CUSTOMER ADDRESS: </b></td> <td>    $buyerAddress</td>  </tr>
																 <tr> <td> <b>CUSTOMER PHONE </b></td> <td>    $buyerPhone </td>  </tr>
																
																 </table>
															
															<h1 align='center'>INVOICE DETAILS</h1>
																  
																   <br/><br/>
																   <table class='bordered striped z-depth-3 ' >
																   <tr> <td> <b>INVOICE NUMBER: </b></td> <td>   $invoiceNumber </td>  </tr>
																	 <tr> <td> <b> PHYSICAL INVOICE NUMBER: </b></td> <td>   $physicalInvoiceNumber </td>  </tr><tr> <td> <b> STATUS: </b></td> <td>   $status </td>  </tr>
																 
																   
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
																	
																	$add_payment	
																  </div>  	<br/> <br/><br/> 
																
		
													
													
													";
													
													
													$no++;	
												}
								 
								}else{
											echo "<h6 align='center'class='red-text'>
											<br/><br/><br/>
											NO INVOICE FOUND...
									</h6>";
								}
							
										
															echo "   </div>
																			</li>
																			
																		 </ul>
																	";										
												}
												
												 
																		}
																	
												}
												}else{
													
													
														echo "<script>
															alert('No Result Found!');
															
													</script>"; 
												}
									
								
							} // if no result ends
						} //if isset ends
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
















