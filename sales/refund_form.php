<?php     
require "../script/php/connect.php";
		
									
																					
												
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "laptop_mgt";

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

   <title> REFUND PAYMENT - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";



													if(isset($_GET['stock_id']) && isset($_GET['invoice_id']))  {
								
								 $stock_id = addslashes(htmlentities($_GET['stock_id'])) ;
								 $invoice_id = addslashes(htmlentities($_GET['invoice_id'])) ;
								
														$get_invoice = new run_query("select * from sales where  invoice_id ='$invoice_id' ");
														if( $get_invoice->num_rows >= 1){	
														$get_invoice_data =	$get_invoice->result();
														extract($get_invoice_data );
														
											 $_SESSION['refund_stock_id'] =$stock_id ;
											$_SESSION['refund_invoiceNumber']   =$invoiceNumber ;
											$_SESSION['refund_amt_paid'] =$amt_paid ;
											$_SESSION['refund_physicalInvoiceNumber']  =$physicalInvoiceNumber ;
											$_SESSION['refund_invoice_id']  =$invoice_id ;
											
														
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


											$stock_id =$_SESSION['refund_stock_id'] ;
											$invoiceNumber =$_SESSION['refund_invoiceNumber'] ;
											$amt_paid =$_SESSION['refund_amt_paid'];
											$physicalInvoiceNumber =$_SESSION['refund_physicalInvoiceNumber'] ;
											$invoice_id =$_SESSION['refund_invoice_id'] ;
											
											
											if( isset($_POST['submit_refund'])){
												$refund_Condition = addslashes(htmlentities($_POST['refund_Condition'])) ;
												$refund_Bank_Name = addslashes(htmlentities($_POST['refund_Bank_Name'])) ;
												$refund_AccountNumber = addslashes(htmlentities($_POST['refund_AccountNumber'])) ;
												$refundName = addslashes(htmlentities($_POST['refundName'])) ;
												$refund_Amount = addslashes(htmlentities($_POST['refund_Amount'])) ;
												$refund_Type = addslashes(htmlentities($_POST['refund_Type'])) ;
												$refund_Policy = addslashes(htmlentities($_POST['refund_Policy'])) ;
												$refund_Reason = addslashes(htmlentities($_POST['refund_Reason'])) ;
												if(   is_numeric($refund_Amount)  ){
													if(  $refund_Amount <= $amt_paid ){
												$set_return = new run_query("insert into returns set 
															refund_Condition='$refund_Condition',
															refund_Bank_Name='$refund_Bank_Name',
															refund_AccountNumber='$refund_AccountNumber',
															refundName='$refundName',
															refund_Amount='$refund_Amount',
															refund_Type='$refund_Type',
															refund_Policy='$refund_Policy',
															refund_Reason='$refund_Reason',
															refund_invoiceNumber='$invoiceNumber',
															refund_locationId='$user_location',
															refund_userId='$user_id',
															refund_stockId='$stock_id',
															refund_phy_invoice='$physicalInvoiceNumber',
															refund_Date='$reg_Date'
														");
												$update_stock = new run_query("update stock set status='3' where id='$stock_id'  and status='1' ");
												$update_invoice = new run_query("update sales  set status='$refund_Type', balance_amt='0' where invoice_id='$invoice_id'  ");
								
								
											$_SESSION['refund_stock_id'] ='' ;
											$_SESSION['refund_invoiceNumber']   ='' ;
											$_SESSION['refund_amt_paid'] ='' ;
											$_SESSION['refund_physicalInvoiceNumber']  ='' ;
											$_SESSION['refund_invoice_id']  ='' ;
											
														 echo "<script>
																	alert('Restore Successful! ');
																		window.location.replace(\"refund.php\");
																													
																</script>"; 
													
												}else{
													
																						  echo "<script>
															alert('Invalid Amount Entered... Make Sure Refund Amount Did not Exceed the Amount Paid');
															window.location.replace(\"refund.php\");
														</script>";
												}
												
												}else{
													
																						  echo "<script>
															alert('Invalid Amount Entered... Make Sure You Enter Only Number  As Amount eg Enter 10000 not 10,000.');
															window.location.replace(\"refund.php\");
														</script>";
												}
												
												
											}
											
													

?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>  REFUND INFO </h1>
<br/>



    <form method='POST' >

	 <div class="row">
	
									<div class="col m12  l12 s12">
										<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e3f2fd;'>
										<div class="card-content">
										
										<h4 align='center'>REFUND FOR <?php echo $invoiceNumber; ?></h4>
										   <div class="input-field col m6  l6 s12">
											  <textarea  class="materialize-textarea"  name='refund_Reason' required></textarea>
											  <label><b> REASON FOR REFUND * </b></label>
											</div>
											
											 <div class="input-field col m6  l6 s12">
											  <textarea  class="materialize-textarea"  name='refund_Condition' required></textarea>
											  <label><b>LAPTOP CONDITION * </b></label>
											</div>
										
										  <div class="input-field col m6  l6 s12">
											  <input  type="text"  required name='refund_Policy' >
											  <label> <b> REFUND POLICY* </b> </label>
											</div>
										 
											
											 <div class="input-field col m6  l6 s12" >
											  
												<select  name='refund_Type' required >
												   <option value='' selected> Select Refund Type * </option>
												   <option value='REFUND' > REFUND </option>
												   <option value='BUY BACK' > BUY BACK </option>
												</select>
											  </div>
											
											
											 <div class="input-field col m6  l6 s12" >
											  <input  type="text"  required  name='refund_Amount'>
											  
											  <label><b>REFUND AMT *</b> </label>
											</div>
											
											
											<div class="input-field col m6  l6 s12" >
											  <input  type="text" required   name='refundName'>
											  
											  <label><b>CUSTOMER'S NAME *</b> </label>
											</div>
											
											<div class="input-field col m6  l6 s12" >
											  <input  type="text"  required  name='refund_AccountNumber'>
											  
											  <label><b>CUSTOMER'S ACCOUNT NUMBER *</b> </label>
											</div>
											
											
											 <div class="input-field col m6  l6 s12">
															 <select name="refund_Bank_Name" required>
																	<option  value=''  disabled selected>Select Customer's Bank *</option>     
     
                                                                       <option value="Citibank">Citibank</option>
                                                                        <option value="Access (Or Diamond) Bank">Access (Or Diamond) Bank</option>
                                                                        <option value="Dynamic Standard Bank">Dynamic Standard Bank</option>
                                                                        <option value="Ecobank Nigeria">Ecobank Nigeria</option>
                                                                        <option value="Fidelity Bank Nigeria">Fidelity Bank Nigeria</option>
                                                                        <option value="First Bank of Nigeria">First Bank of Nigeria</option>
                                                                        <option value="First City Monument Bank">First City Monument Bank</option>
                                                                        <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                                                        <option value="Heritage Bank Plc">Heritage Bank Plc</option>
                                                                        <option value="Keystone Bank Limited">Keystone Bank Limited</option>
                                                                        <option value="Providus Bank Plc">Providus Bank Plc</option>
                                                                        <option value="Polaris Bank">Polaris Bank</option>
                                                                        <option value="Stanbic IBTC Bank Nigeria Limited">Stanbic IBTC Bank Nigeria Limited</option>
                                                                        <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                                        <option value="Sterling Bank">Sterling Bank</option>
                                                                        <option value="Suntrust Bank Nigeria Limited">Suntrust Bank Nigeria Limited</option>
                                                                        <option value="Union Bank of Nigeria">Union Bank of Nigeria</option>
                                                                        <option value="United Bank for Africa">United Bank for Africa</option>
                                                                        <option value="Unity Bank Plc.">Unity Bank Plc</option>
                                                                        <option value="Wema Bank">Wema Bank</option>
                                                                        <option value="Zenith Bank">Zenith Bank</option>
                                                                    </select>
				  
											</div>
											
											
											<center>
														<button type='submit' name='submit_refund'  class='btn red'>   SUBMIT </button>
														
													</center>
											
											<div class="row"></div>
										
										</div>
										</div>
										
										
									
									</div>
									
									
									
		

	</form>
	
	
	
	
	
	 </div>


   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>



</body>

</html>
















