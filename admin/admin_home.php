<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "admin_home";

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

   <title> ADMIN HOME - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";


				if( isset($_POST['change_password']) ){
					 $old_password = md5(addslashes(htmlentities($_POST['old_password'])) );
					 	 $new_password1 = addslashes(htmlentities($_POST['new_password1'])) ;
						 	 $new_password2 = addslashes(htmlentities($_POST['new_password2'])) ;
							 
							 $new_password3 = md5(addslashes(htmlentities($_POST['new_password2']))) ;
							 
							 if( $new_password1 == $new_password2){
							 
									 if( $old_password == $user_password){
									 
										$update_password = new run_query(" update users set user_password='$new_password3' where user_id='$user_id' ");
													 echo "<script>
																		alert(' PASSWORD CHANGED SUCCESSFULLY!! ');
																													
																</script>"; 
									 
									 }else{
									 echo "<script>
																		alert(' INCORRECT OLD PASSWORD!! ');
																													
																</script>"; 
											}

							 
							 }else{
									 echo "<script>
																		alert(' TWO NEW PASSWORD NOT MATCH!! ');
																													
																</script>"; 
							 }

				}
				
				
				
				if( isset($_POST['view_stock']) ){
								$user_location = addslashes(htmlentities($_POST['stock_location']));
				}
				
				
		$sql_location2 = "select location_name as user_location2 from oyemart_ospos10.ospos_stock_locations where location_id='$user_location' ";
					$get_locations2 = $connect ->query($sql_location2);	
					$get_locations_data2 = $get_locations2 ->fetch(PDO::FETCH_BOTH);
					
								extract($get_locations_data2 );
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'> ADMIN DASHBOARD</h1>
<br/>


 <div class="fixed-action-btn">
    <a class="btn-floating btn-large red" title='Settings'>
      <i class="fa fa-cogs"></i>
    </a>
    <ul>
			<li>
				 <a class="btn-floating btn-large red modal-trigger" href="#modal1" title='Change Password'>
						<i class="fa fa-key"></i>
				</a>
			</li>
			
			<li>
				 <a class="btn-floating btn-large green" href="bank.php" title='set bank'>
						<i class="fa fa-bank"></i>
				</a>
			</li>
			
			
			<li>
				 <a class="btn-floating btn-large pink" href="auth.php" title='Set Cookie '>
						<i class="fa fa-gift"></i>
				</a>
			</li>
			
			<li>
				 <a class="btn-floating btn-large blue" href="laptop.php" title='Set laptop Details'>
						<i class="fa fa-laptop"></i>
				</a>
			</li>
			
			<li>
				 <a class="btn-floating btn-large gold" href="refunt_return.php" title='View Refund And Returned Laptop'>
						<i class="fa fa-shield"></i>
				</a>
			</li>
			
			<li>
				 <a class="btn-floating btn-large orange" href="spy.php" title='Spy Users'>
						<i class="fa fa-eye"></i>
				</a>
			</li>
			
	 </ul>
  </div>
  
  

  
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4 align='center'>CHANGE PASSWORD</h4>
			<form method='POST' >
							<div class="row">
								<div class="input-field col m4 s4 s12">
								  <input id="email" type="password"  name='old_password'>
								  <label for="email"><b>OLD PASSWORD:</b></label>
								</div>
							 
								<div class="input-field col m4 s4 s12">
								  <input id="email" type="password"  name='new_password1'>
								  <label for="email"><b>NEW PASSWORD:</b></label>
								</div>
							 
								<div class="input-field col m4 s4 s12">
								  <input id="email" type="password"  name='new_password2'>
								  <label for="email"><b> COMFIRM PASSWORD: </b></label>
								</div>
							  </div>
							  
							  <div class="row">
							  
							  <center>
							   <button type='submit' class='btn deep-orange pulse' name='change_password'> SEND <i class='fa fa-send'></i></button>
							</center>
							  
							  </div>
			  
			  </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close  btn-flat"><i class='fa fa-close'></i></a>
    </div>
  </div>
  
   <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			<div class="col m2 l2 s0"></div>
			<form method='post'>
			<div class="input-field col m6 l6 s12">
				<select required name='stock_location'>
				  <option value=""   >Choose Location *</option>
				 
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
			  
			  <div class="input-field col m4 l4 s12">
				<button type='submit' class='btn deep-orange pulse' name='view_stock'>  VIEW <i class='fa fa-eye'></i></button>
		
			  </div>
			</form>
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		
		
		<div class="col m1 l1 s0"></div>

	</div>

	
   
  
  
    <div class="row">
	
	
		<div class="col m6 l6 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
				<h3 align='center'> STOCK SUMMARY</h3>
			
					   <table class="bordered striped z-depth-3 " >
					
						  
						  
						  
						   <tr> <td> <b> &nbsp;&nbsp;&nbsp; LAPTOPS FOR SALE (<?php echo $user_location2; ?>): </b></td> <td> <h3 class='green-text'>
						  <?php
						  $get_total_laptops_for_sale = new run_query("select * from stock  where currentLocation='$user_location' and status =3  ");
													
								echo $get_total_laptops_for_sale->num_rows;
						  ?>
						</h3>  </td>  </tr>
						  
						  <tr> <td> <b> &nbsp;&nbsp;&nbsp; LAPTOPS NOT FOR SALE (<?php echo $user_location2; ?>): </b></td> <td> <h3 class='pink-text'>
						  <?php
						  $get_total_laptops_nor_sale = new run_query("select * from stock  where currentLocation='$user_location' and status =2  ");
													
								echo $get_total_laptops_nor_sale->num_rows;
						  ?>
						</h3>  </td>  </tr>
						
						
						
						<tr> <td> <b> &nbsp;&nbsp;&nbsp; LAPTOPS ON TRANSIT (<?php echo $user_location2; ?>): </b></td> <td> <h3 class='black-text'>
						  <?php
						  $get_total_laptops_on_transit = new run_query("select * from stock  where currentLocation='$user_location' and status =4  ");
													
								echo $get_total_laptops_on_transit->num_rows;
						  ?>
						</h3>  </td>  </tr>
						
						
							  <tr> <td> <b> &nbsp;&nbsp;&nbsp;TOTAL  (<?php echo $user_location2; ?>): </b></td> <td> <h1 class='red-text'>
						  <?php
						  $get_total_laptops = new run_query("select * from stock  where currentLocation='$user_location' and status >=2  ");
													
								echo $get_total_laptops->num_rows;
						  ?>
						</h1>  </td>  </tr>
						
						
						  </table>
						  
						 
	
			</div>
			</div>
		
		</div>
		
		
		
		<div class="col m6 l6 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
				<h3 align='center'> INVOICE SUMMARY</h3>
			
					   <table class="bordered striped z-depth-3 " >
						 
							  <tr> <td> <b> &nbsp;&nbsp;&nbsp;PENDING INVOICES  (<?php echo $user_location2; ?>): </b></td> <td> <h3 class='orange-text'>
						  <?php
						  $pending_invoice_number = new run_query("select * from sales  where locationId='$user_location' and balance_amt >=1  ");
													
								echo $pending_invoice_number->num_rows;
						  ?>
						</h3>  </td>  </tr>
						
						
						  <tr> <td> <b> &nbsp;&nbsp;&nbsp;AMT IN DEBT  (<?php echo $user_location2; ?>): </b></td> <td> <h3 class='red-text'>
						  N<?php
						  $pending_invoice_amt = new run_query("select sum(balance_amt)as invoice_amt from sales  where locationId='$user_location' and balance_amt >=1  ");
											$pending_invoice_amt_data =	$pending_invoice_amt->result();
										
											extract($pending_invoice_amt_data );
											$invoice_amt = $invoice_amt + 0;
											$invoice_amt = number_format("$invoice_amt",2,".",","); 											
								echo $invoice_amt;
						  ?>
						</h3>  </td>  </tr>
						
						
						
						  <tr> <td> <b> &nbsp;&nbsp;&nbsp;OWING CUSTOMERS  (<?php echo $user_location2; ?>): </b></td> <td> <h3 class='green-text'>
						  <?php
						  $pending_invoice_cus = new run_query("select * from sales  where locationId='$user_location' and balance_amt >=1  group by customerId ");
													
								echo $pending_invoice_cus->num_rows;
						  ?>
						</h3>  </td>  </tr>
						
						
						
						  </table>
						  
						 
	
			</div>
			</div>
		
		</div>
		
	
		
		
	</div>

	
	
	<br/><br/><br/><br/><br/>
	<hr/>
	<br/><br/><br/><br/><br/>
	
	 <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			<h1 align='center'>SEARCH PAYMENTS</h1>
			<form method='post'>
			<div class="input-field col m3 l3 s12">
				<select required name='invoice_location'>
				
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

	
	<div class='row'>
	
	<?php   
	
						if( isset($_POST['view_invoice']) ){
								$invoice_location = addslashes(htmlentities($_POST['invoice_location']));
								 $start_date = addslashes(htmlentities($_POST['start_date']));
								$end_date = addslashes(htmlentities($_POST['end_date']));
							
								  $get_payment = new run_query("select sum(totalAmountPaid) as payment_total from payments  where locationId='$invoice_location' and paymentDate between '$start_date' and  '$end_date'  ");
								
								
								
								$get_payment_data =	$get_payment->result();										
											extract($get_payment_data );
											
											$sql_location2 = "select location_name as user_location2 from oyemart_ospos10.ospos_stock_locations where location_id='$invoice_location' ";
					$get_locations2 = $connect ->query($sql_location2);	
					$get_locations_data2 = $get_locations2 ->fetch(PDO::FETCH_BOTH);
					
								extract($get_locations_data2 );
								
												$payment_total = $payment_total + 0;
												$payment_total = number_format("$payment_total",2,".",","); 											
											echo "
											<h3 align='center'>TOTAL PAYMENTS FROM <span style='color:red;'> $start_date </span> TO <span style='color:red;'>  $end_date  </span>  ( $user_location2 ) </h3>
											<hr/>
											<h1 align='center'>N$payment_total</h1>
											
											
											";
	
								}
	
	?>
	
	</div>

   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>


</body>

</html>
















