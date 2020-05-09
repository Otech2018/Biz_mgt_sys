<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "laptop_mgt";

require "../script/mlc/script_head.php";

							if( isset($_GET['stock_id']) ){
								 $stock_id = addslashes(htmlentities($_GET['stock_id'])) ;

								$_SESSION['sell_stock_id'] = $stock_id;
								 echo "<script>
								window.location.replace(\"set_customer.php\");
																											
							</script>"; 
								 
					}
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

   <title> SET CUSTOMER - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>    SET CUSTOMER </h1>
<br/>

     <div class="row">
	
	
		<div class="col m12 l12 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
			<div class='row'>
			
			 <p>
				  <input name="sale" type="radio" id="yes" required  onclick="$('#old_cus').show(); $('#new_cus').hide();" />
				  <label for="yes">REGISTERED CUSTOMER</label>
				  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <input name="sale" type="radio" id="no"  required  onclick="$('#old_cus').hide(); $('#new_cus').show();"  />
				  <label for="no">WALK-IN CUSTOMER</label>
				</p>
				
				
			</div>
			
			  	<div class='row'  id='new_cus'  style='display:none;'>
			  <form method='GET' action='invoice.php'>
			   <div class="input-field col m6 l6 s12">
				  <input id="email" type="text" required   name='customer_name'>
				  <label for="email">Customer Name </label>
				</div>
			
			  
			  
			  <div class="input-field col m6 l6 s12">
				  <input id="email" type="text" required   name='customer_phone'>
				  <label for="email"> Customer Phone </label>
				</div>
				
			 <div class="input-field col m10 l10 s12">
				  <input id="email" type="text" required  name='customer_address'>
				  <label for="email"> Customer Address </label>
				</div>
				
				<div class="input-field col m2 l2 s12">
				<center>
				   <button  type='submit' class='btn green pulse'>  NEXT </button>
				</center>
				</div>
			
				</form>		
			
				
			  </div>
			  
			  
			  
				<div class='row'  id='old_cus'  style='display:none;'>
			   
						 <div class="row">
	
								<form method='post'>
									<div class="col m12 l12 s12">
										
										  
										  
										  
										   <div class="input-field col m10 l10 s12">
											  <input id="email" type="text" required name='search_customer'>
											  <label for="email"><i class='fa fa-search'></i>  From Customer</label>
											</div>
											
										  <div class="input-field col m2 l2 s12">
											<button type='submit' class='btn deep-orange pulse' name='view_customer'>  <i class='fa fa-search'></i> </button>
									
										  </div>
										
										
									
									</div>
									
									</form>

								</div>

				</div>
				
									
							   
								  <div class="row " >
								
								
									<div class="col m1 l1 s0"></div>
									
									
									
										<div class="col m10 l10 s12">
													<form method='post'>
											<?php
														if( isset($_POST['view_customer']) ){
															$search_customer = addslashes(htmlentities($_POST['search_customer']));
															 $get_customer = new run_query("  SELECT * FROM `customers` WHERE (customer_id like '%$search_customer%' OR customer_permission like '%$search_customer%' OR customer_Reg_date like '%$search_customer%'  OR customer_name like '%$search_customer%'  OR customer_address like '%$search_customer%'  OR customer_phone like '%$search_customer%'  OR customer_email like '%$search_customer%' )  and  customer_permission !='0'   ");
															
															
								if( $get_customer->num_rows >= 1){	
			$no = 1;								
										while(	$get_customer_data =	$get_customer->result() ){
										
											extract($get_customer_data );
											
											
											 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$user_location' ";
												$get_locations = $connect ->query($sql_location);	
												$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
					
											extract($get_locations_data );
											
											if( $customer_permission == "1"){
											$customer_permission = "CREDIT WORTHY";
											
											}else{
											$customer_permission = "NO CREDIT";
											}
											
											echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																			<li>
																			  <div class='collapsible-header deep-orange white-text'> $no | $customer_name  ($customer_phone ) </div>
																			  <div class='collapsible-body'>
																			
																		
																		
																		<table class='bordered striped z-depth-3 ' >
																			  <tr><td> FULL NAME: </td><td> $customer_name :</td></tr>
																			    <tr><td> PHONE : </td><td> $customer_phone </td></tr>
																			    <tr><td> EMAIL : </td><td> $customer_email </td></tr>
																			    <tr><td>ADDRESS :  </td><td> $customer_address </td></tr>
																			   <tr><td>PERMISSION:  </td><td> $customer_permission </td></tr>
																			    <tr><td>DATE ADDED: </td><td> $customer_Reg_date </td></tr>
																		 </table>
																				<br/> <br/><br/> 
																				
																					<a  href='invoice.php?customer_id=$customer_id' class='btn blue pulse '>  SELECT</a>
																									 
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



	
	
			</div>
			</div>
		
		</div>
		
		

	</div>

	
  



   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>


</body>

</html>
















