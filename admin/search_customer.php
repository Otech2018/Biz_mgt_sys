<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "customer";

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

   <title> SEARCH CUSTOMER - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>		
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>   CUSTOMER </h1>
<br/>

     <div class="row">
	
	<form method='post'>
		<div class="col m12 l12 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
			  
			  
			  
			   <div class="input-field col m10 l10 s12">
				  <input id="email" type="text" required name='search_customer'>
				  <label for="email"><i class='fa fa-search'></i>  From Customer</label>
				</div>
				
			  <div class="input-field col m2 l2 s12">
				<button type='submit' class='btn deep-orange pulse' name='view_customer'>  <i class='fa fa-search'></i> </button>
		
			  </div>
			
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		</form>

	</div>

	
   
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
						<form method='post'>
				<?php
							if( isset($_POST['view_customer']) ){
								$search_customer = addslashes(htmlentities($_POST['search_customer']));
								 $get_customer = new run_query("  SELECT * FROM `customers` WHERE customer_id like '%$search_customer%' OR customer_permission like '%$search_customer%' OR customer_Reg_date like '%$search_customer%'  OR customer_name like '%$search_customer%'  OR customer_address like '%$search_customer%'  OR customer_phone like '%$search_customer%'  OR customer_email like '%$search_customer%'  and customer_permission !='0'   ");
								
								if( $get_customer->num_rows >= 1){	
			$no = 1;								
												while(	$get_custormers_data =	$get_customer->result() ){
										
											extract($get_custormers_data );	
											
											if( $customer_permission == "1"){
											$customer_permission = "CREDIT WORTHY";
											
											}else{
											$customer_permission = "NO CREDIT";
											}
											$get_user_invoice = new run_query("select sum(balance_amt) as total_amt_owing from sales where customerId='$customer_id' ");
					
											if( $get_user_invoice->num_rows >= 1){	
											$get_user_invoice_data =	$get_user_invoice->result();
											extract($get_user_invoice_data ); 
												$pending_btn ="<a  href='cus_invoice.php?customer_id=$customer_id&type=pending' class='btn pink right'> PENDING INVOICE(S)</a>";
													$color="red";		
													if( $total_amt_owing <=0 ){
														$pending_btn ="";
														$total_amt_owing ="NOT OWING";	
														$color="green";
													}
											}else{
											$pending_btn ="";
											$total_amt_owing ="NOT OWING";	
											$color="green";
											}
											
												echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																			<li>
																			  <div class='collapsible-header $color white-text '>$no |  $customer_name  ($customer_phone ) </div>
																			  <div class='collapsible-body'>
																			
																		
																		
																		<table class='bordered striped z-depth-3 ' >
																			  <tr><td> FULL NAME: </td><td> $customer_name </td></tr>
																			    <tr><td> PHONE : </td><td> $customer_phone </td></tr>
																			    <tr><td> EMAIL : </td><td> $customer_email </td></tr>
																			    <tr><td>ADDRESS :  </td><td> $customer_address </td></tr>
																			   <tr><td>PERMISSION:  </td><td> $customer_permission </td></tr>
																			    <tr><td>DATE ADDED: </td><td> $customer_Reg_date </td></tr>
																		 		<tr><td>TOTAL AMT OWING: </td><td> $total_amt_owing </td></tr>
																			</table>
																				<br/> <br/><br/> 
																				
																				<a  class='btn red pulse modal-trigger' href='#del$customer_id' >  Delete <i class='fa fa-trash'></i></a>
	
														
													  <div id='del$customer_id' class='modal'>
														<div class='modal-content'>
													
														  <h4>Are you Sure You Want To Delete  $customer_name?</h4>
															<a href='#!' class='modal-action modal-close btn green'>No  <i class='fa fa-close'></i></a>
															<a  href='del_customer.php?customer_id=$customer_id' class='btn red right'>  Yes <i class='fa fa-trash'></i></a>
																<br/>		 
														</div>
														
													  </div>
																			<a  href='edit_customer.php?customer_id=$customer_id' class='btn blue pulse right'>  EDIT <i class='fa fa-edit'></i></a>
															<hr/>
															<a  href='cus_invoice.php?customer_id=$customer_id&type=complete' class='btn green'>  COMPLETED INVOICE(S)</a>
																		 
																$pending_btn																		
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


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>


</body>

</html>
















