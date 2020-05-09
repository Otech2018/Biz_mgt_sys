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

   <title> PAYMENT - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";



												
													
													if(isset($_GET['add_payment'])  )  {
														 $invoice_id = addslashes(htmlentities($_GET['add_payment'])) ;
												
														$get_invoice = new run_query("select * from sales where  invoice_id ='$invoice_id' ");
														if( $get_invoice->num_rows >= 1){	
														$get_invoice_data =	$get_invoice->result();
														extract($get_invoice_data );
														
											 $_SESSION['sell_stock_id'] =$stock_id ;
											$_SESSION['invoice']   =$invoiceNumber ;
											$_SESSION['sales_price'] =$amount ;
											$_SESSION['physical_invoice']  =$physicalInvoiceNumber ;
											$_SESSION['customer_id']  =$customerId ;
											$_SESSION['balance']  =$balance_amt ;
											$_SESSION['invoice_id']  =$invoice_id ;
											
														
														}else{
																
														  echo "<script>
														//	window.location.replace(\"index.php\");
														</script>";
															
														}
														
														
								
												}else{
													
														  echo "<script>
														//	window.location.replace(\"index.php\");
														</script>";
												}



											$invoice =$_SESSION['invoice'] ;
											$sales_price =$_SESSION['sales_price'];
											$physical_invoice =$_SESSION['physical_invoice'] ;
											$balance =$_SESSION['balance'] ;
											
												if(isset($_POST['payment'])  )  {
												
												 $amt_paid = addslashes(htmlentities($_POST['amt_paid'])) ;
												$balance = addslashes(htmlentities($_POST['balance'])) ;
												$cash = addslashes(htmlentities($_POST['cash'])) ;
												$pos = addslashes(htmlentities($_POST['pos'])) ;
												$pos_stan = addslashes(htmlentities($_POST['pos_stan'])) ;
												$pos_digit = addslashes(htmlentities($_POST['pos_digit'])) ;
												$bank_transfer = addslashes(htmlentities($_POST['bank_transfer'])) ;
												$comments = addslashes(htmlentities($_POST['comments'])) ;
												$acc_details = addslashes(htmlentities($_POST['acc_details'])) ;
												$physical_invoice = addslashes(htmlentities($_POST['physical_invoice'])) ;
										
										if(   is_numeric($amt_paid)  ){
											if(  $balance >= 0 ){
												
											$sell_stock_id =$_SESSION['sell_stock_id'] ;
											$invoice =$_SESSION['invoice'] ;
											$sales_price =$_SESSION['sales_price'];
											// $physical_invoice =$_SESSION['physical_invoice'] ;
											$customer_id =$_SESSION['customer_id'] ;
											$invoice_id =$_SESSION['invoice_id'] ;
											$physical_invoice = addslashes(htmlentities($_POST['physical_invoice'])) ;
										
											
											
											$query_payment    =new run_query("insert into payments set paymentDate='$reg_Date', 
																								  invoiceNumber='$invoice', 
																								  physical_invoice='$physical_invoice',
																								  invoiceAmount='$sales_price',
																								  stockId='$sell_stock_id',
																								  recordedBy='$user_id',
																								  customerId='$customer_id',
																								  pay_comments='$comments',
																								  referrer_amt='0',
																								  totalAmountPaid='$amt_paid',
																								  balance='$balance',
																								   locationId='$user_location',
																								    acc_details_id='$acc_details',
																								  
																								    bankAmount='$bank_transfer',
																								  cashAmount='$cash',
																								  posAmount='$pos',
																								  posStan='$pos_stan',
																								   posDigit='$pos_digit'
																								  ");
													$query_stock  =new run_query(" update sales set  physicalInvoiceNumber='$physical_invoice',  balance_amt='$balance', amt_paid=amt_paid+$amt_paid where invoice_id='$invoice_id' ");											  
																								  
																			
																		 $_SESSION['sell_stock_id'] ='' ;
																		$_SESSION['invoice']   ='' ;
																		$_SESSION['sales_price'] ='' ;
																		$_SESSION['physical_invoice']  ='' ;
																		$_SESSION['customer_id']  ='' ;
																									  
																															  echo "<script>
															alert('Payment  Saved Successfully');
															window.location.replace(\"all_invoice.php\");
														</script>";
														
														
														}else{
													
																						  echo "<script>
															alert('Invalid Amount Entered... Make Sure Total Amount Did not Exceed the Balance');
															window.location.replace(\"payment2.php\");
														</script>";
												}
												
												}else{
													
																						  echo "<script>
															alert('Invalid Amount Entered... Make Sure You Enter Only Number  As Amount eg Enter 10000 not 10,000.');
															window.location.replace(\"payment2.php\");
														</script>";
												}
					
											}
													

?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>  PAYMENT </h1>
<br/>



    <form method='POST' >

	 <div class="row">
	
									<div class="col m6 l6 s12">
										<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e3f2fd;'>
										<div class="card-content">
										
										
										  <h3 align='center'>BASIC INFO</h3>
										  
										   <div class="input-field col m12 l12 s12">
											  <input  type="text" readonly value='<?php echo $invoice;?>' >
											  <label><b>INVOICE </b></label>
											</div>
										
										  <div class="input-field col m12 l12 s12">
											  <input  type="text"  name='physical_invoice' id='physical_invoice' <?php if($physical_invoice !='' ){ echo "readonly";} ?>  value='<?php echo $physical_invoice;?>' >
											  <label> <b> PHYSICAL INVOICE </b> </label>
											</div>
										 
											
											 <div class="input-field col m12 l12 s12" >
											  <input  type="text"  readonly value='<?php echo $sales_price;?>' >
											  <label><b>SELLING PRICE </b> </label>
											</div>
											
											
											 <div class="input-field col m12 l12 s12" >
											  <input  type="text"  readonly value='' placeholder='0'  id='amt_paid' name='amt_paid'>
											   <input type="hidden"  readonly value='<?php echo $balance;?>'   id='total'>
											 
											  <label><b>AMT PAID </b> </label>
											</div>
											
											
											
											 <div class="input-field col m12 l12 s12" >
											  <input  type="text"  readonly name='balance' value='<?php echo $balance;?>'  id='balance'>
											  <label><b>BALANCE </b> </label>
											</div>
											
											
											
											<div class="row"></div>
										
										</div>
										</div>
										
										
									
									</div>
									
									
									
		

		
											
										<div class="col m4 l4 s12">
												<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e3f2fd;'>
												<div class="card-content">
												
												
												  
											 <div id='pay_c'>
											 
													<h3 align='center'>PAYMENT CHANNELS</h3>
												  <div  class='row z-depth-3 pink lighten-5'  ><br/><br/>
														
														  <div class="input-field col m12 l12 s12">
															  <input  type="text"  id='cash'   onkeyup='check_pay()'  value='' placeholder='0' name='cash' >
															  <label> CASH </label>
															</div>
													<br/><br/>
													</div>
													
													 <div  class='row z-depth-3  lime lighten-5 '  ><br/><br/>
													 
													  <div class="input-field col m12 l12 s12">
																  <input  type="text"  id='pos_stan' onkeyup='check_pay()'  value='' placeholder='0' name='pos_stan' >
																  <label> POS STAN </label>
																</div>
																
																
																 <div class="input-field col m12 l12 s12">
																  <input  type="text"  id='pos_digit' onkeyup='check_pay()'  value='' placeholder='0' name='pos_digit' >
																  <label> POS DIGIT </label>
																</div>
																
																
																 <div class="input-field col m12 l12 s12">
																  <input  type="text"  id='pos'  onkeyup='poser()'  value='' placeholder='0' name='pos' >
																  <label> POS AMT</label>
																</div>
																
																
																<br/><br/>
													</div>
													
													
													
											 <div class='row z-depth-3 green accent-1' ><br/><br/>
											 
											  <div class="input-field col s12">
												<select  name='acc_details'  id='bank'>
												   <option value='not' selected> Select Bank Details </option>
															<?php 
															$sql_bank = "select * from bank_details ";
															$sql_bank_run = new run_query($sql_bank);	
															while ($sql_bank_data = $sql_bank_run ->result()  ){
																extract($sql_bank_data );
																echo "<option value='$bank_id' > $bank_name <br/> ($bank_acc_no) </option>";
																	}	
														?>
												  
												</select>
												<label> <b> Choose Bank Account</b></label>
											  </div>
													 <div class="input-field col m12 l12 s12">
													  <input  type="text"  id='bank_transfer' onkeyup='bank_d()'  value='' placeholder='0' name='bank_transfer' >
													  <label > BANK TRANSFER </label>
													</div>
													<br/><br/>
												</div>
												
												 
													 <div class="input-field col m12 l12 s12">
												  <textarea class="materialize-textarea" name='comments' ></textarea>
												  <label >Comments</label>
												</div>
												
												 <div class="input-field col m12 l12 s12">
													<center>
														<a  class='btn green modal-trigger' href="#modalu"    id='pay11'>   SUBMIT </a>
														<a  class='btn green modal-trigger' href="#modalu"  style='display:none;' id='pay1'>  SUBMIT </a>
													<br/><br/>
														<a  class='btn red pulse modal-trigger' href="#modal1"  >  CANCEL </a>
													</center>
													  <!-- Modal Structure -->
													  <div id="modal1" class="modal">
														<div class="modal-content">
														  <h4>Are you Sure You Want To Cancel This Transaction?</h4>
															<a href="#!" class="modal-action modal-close btn green">No  <i class='fa fa-close'></i></a>
														
														<a class=" btn red right" href="invoice.php?clear_all=good" >Yes  <i class='fa fa-trash'></i></a>
							
														</div>
													  </div>
			
			
			
													  <div id="modalu" class="modal">
														<div class="modal-content">
														  <h4>Are you Sure You Want To Submit This Transaction?</h4>
															<a href="#!" class="modal-action modal-close btn red">No  <i class='fa fa-close'></i></a>
														
															<button submit class='btn green right' name='payment' > Yes</button>
													
														</div>
													  </div>
	
												</div>
												
													<div class='row' ></div>
												</div>
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




<script>

	function bank_d(){

				var bank_s = $("#bank option:selected").val();
					if( bank_s =='not'){
						alert("Please Select Bank Account Before Entering Bank Transfer Amount! ");
						$('#bank_transfer').val('');
					}else{
			check_pay();
		}

				
				}
				
				

function poser(){
var pos_digit  = $('#pos_digit').val();
var pos_stan  = $('#pos_stan').val();

if( pos_digit =='0' || pos_stan =='0'  || pos_digit =='' || pos_stan =='' ){
		$('#pos').val('');
			alert('Please Enter the POS STAN AND DIGIT FIRST');
		}else{
			check_pay();
		}

}

function check_pay(){
 var total  = $('#total').val();
var cash  = $('#cash').val();
var pos  = $('#pos').val();
var physical_invoice  = $('#physical_invoice').val();
var bank_transfer  = $('#bank_transfer').val();
  var total_payment  =  Number(cash) +  Number(pos) +Number(bank_transfer) ;

var balance = Number(total)  -  total_payment;

$('#amt_paid').val(total_payment) ;

$('#balance').val(balance);

 // alert( balance );
 
 if( total_payment >=1 &&  physical_invoice ==''  ){
		$('#bank_transfer').val('');
		$('#cash').val('');
		$('#pos').val('');
		$('#amt_paid').val('');
		$('#balance').val(total);
		alert('Please Enter The Physical Invoice First!');
 }else if( balance == 0  ){
$('#pay11').hide();
$('#pay1').show();
}else{
$('#pay1').hide();
$('#pay11').show();
}



}
			

</script>


</body>

</html>
















