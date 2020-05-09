<?php     
require "../script/php/connect.php";
									
if( !isset( $_SESSION['check_cus'])  OR empty( $_SESSION['check_cus'])){
		 echo "<script>
		 alert('Please set Customer !');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}


if( !isset( $_SESSION['sales_price'])  OR empty( $_SESSION['sales_price'])){
		 echo "<script>
		 alert('Please set Sold Price');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}


if( !is_numeric( $_SESSION['sales_price']) ){
		 echo "<script>
		 alert('Invalid Price Entered Please Use NUmbers Only eg 10000');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}





if( !isset( $_SESSION['customer_id'])  OR empty( $_SESSION['customer_id'])){
		 echo "<script>
		 alert('Please set Customer !');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}



if( !isset( $_SESSION['customer_name'])  OR empty( $_SESSION['customer_name'])){
		 echo "<script>
		 alert('Please set Customer Name !');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}

											
if( !isset( $_SESSION['customer_address'])  OR empty( $_SESSION['customer_address'])){
		 echo "<script>
		 alert('Please set Customer Address !');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}


if( !isset( $_SESSION['customer_phone'])  OR empty( $_SESSION['customer_phone'])){
		 echo "<script>
		 alert('Please set Customer Phone !');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}


if( !isset( $_SESSION['sell_stock_id'])  OR empty( $_SESSION['sell_stock_id'])){
		 echo "<script>
		 alert('Please set Laptop !');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}


if( !isset( $_SESSION['charger'])  OR empty( $_SESSION['charger'])){
		 echo "<script>
		 alert('Please set Charger !');
					window.location.replace(\"invoice.php\");
																								
				</script>";								
}

		
											$charger = $_SESSION['charger'];
											$referrer_amt = $_SESSION['referrer_amt'];
											$referrer =$_SESSION['referrer'] ;
											$sales_comment = $_SESSION['sales_comment'] ;
											$sales_price =$_SESSION['sales_price'];
											@$physical_invoice =$_SESSION['physical_invoice'] ;
											$customer_id =$_SESSION['customer_id'] ;
											$customer_name =$_SESSION['customer_name'];
											$customer_address =$_SESSION['customer_address'];
											$customer_phone =$_SESSION['customer_phone'] ;
											$check_cus =$_SESSION['check_cus'] ;
											$sell_stock_id =$_SESSION['sell_stock_id'] ;
											$invoice =$_SESSION['invoice'] ;

																					
												
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
											if(  $sales_price >= $amt_paid ){
											
											$charger = $_SESSION['charger'];
											$referrer_amt = $_SESSION['referrer_amt'];
											$referrer =$_SESSION['referrer'] ;
											$sales_comment = $_SESSION['sales_comment'] ;
											$sales_price =$_SESSION['sales_price'];
											// $physical_invoice =$_SESSION['physical_invoice'] ;
											$customer_id =$_SESSION['customer_id'] ;
											$customer_name =$_SESSION['customer_name'];
											$customer_address =$_SESSION['customer_address'];
											$customer_phone =$_SESSION['customer_phone'] ;
											$check_cus =$_SESSION['check_cus'] ;
											$sell_stock_id =$_SESSION['sell_stock_id'] ;
											$invoice =$_SESSION['invoice'] ;
												$physical_invoice = addslashes(htmlentities($_POST['physical_invoice'])) ;
										
											$query_invoice  =new run_query("insert into sales set saleDate='$reg_Date', 
																								  invoiceNumber='$invoice', 
																								  physicalInvoiceNumber='$physical_invoice',
																								  amount='$sales_price',
																								  locationId='$user_location',
																								  soldBy='$user_id',
																								  customerId='$customer_id',
																								  invoice_comments='$sales_comment',
																								  buyerName='$customer_name',
																								  buyerAddress='$customer_address',
																								  buyerPhone='$customer_phone',
																								  referal='$referrer',
																								  referalAmount='$referrer_amt',
																								  status='Success',
																								  amt_paid='$amt_paid',
																								  balance_amt='$balance',
																								  stock_id='$sell_stock_id'
																								  ");
											$query_payment    =new run_query("insert into payments set paymentDate='$reg_Date', 
																								  invoiceNumber='$invoice', 
																								  physical_invoice='$physical_invoice',
																								  invoiceAmount='$sales_price',
																								  stockId='$sell_stock_id',
																								  recordedBy='$user_id',
																								  customerId='$customer_id',
																								  pay_comments='$comments',
																								  referrer_amt='$referrer_amt',
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
													$query_stock  =new run_query(" update stock set status='1', charger_id='$charger', price='$sales_price', dateSold='$reg_Date' where id='$sell_stock_id' ");	

								
							 $sql_check = "update oyemart_ospos10.ospos_item_quantities  set  quantity = quantity-1 where item_id='$charger'  and location_id='$user_location'  ";
								$sql_run_check = $connect ->query($sql_check);	
								 	if( $_SESSION['charger'] != 'NO_CHARGER' ){
											$sql_check = "insert into  oyemart_ospos10.ospos_sales  set employee_id='154', comment='LAPTOP STOCK' ";
								$sql_run_check = $connect ->query($sql_check);	
									}									  
																 $_SESSION['referrer_amt'] = 	'';
																$_SESSION['referrer'] = '';
																 $_SESSION['sales_comment'] = '';
																$_SESSION['sales_price'] = '';
																$_SESSION['physical_invoice'] = '';
																$_SESSION['customer_id'] = '';
																$_SESSION['customer_name'] = '';
																$_SESSION['customer_address'] = '';
																$_SESSION['customer_phone'] = '';
																$_SESSION['check_cus'] = '';
																$_SESSION['sell_stock_id'] = '';
																$_SESSION['charger'] = '';								  
																								  echo "<script>
															alert('Transaction Saved Successfully');
															window.location.replace(\"set_customer.php\");
														</script>";
												}else{
													
																						  echo "<script>
															alert('Invalid Amount Entered... Make Sure Total Amount Did not Exceed the Selling Price');
															window.location.replace(\"payment.php\");
														</script>";
												}
												
												}else{
													
																						  echo "<script>
															alert('Invalid Amount Entered... Make Sure You Enter Only Number  As Amount eg Enter 10000 not 10,000.');
															window.location.replace(\"payment.php\");
														</script>";
												}
											}
													

?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>  PAYMENT </h1>
<br/>



    <form method='POST' >

	 <div class="row">
	
								<div class="col m5 l5 s12">
										<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e3f2fd;'>
										<div class="card-content">
										
										
										  <h3 align='center'>BASIC INFO</h3>
										  
										   <div class="input-field col m12 l12 s12">
											  <input  type="text" readonly value='<?php echo $invoice;?>' >
											  <label><b>INVOICE </b></label>
											</div>
										
										  <div class="input-field col m12 l12 s12">
											  <input  type="text"  id='physical_invoice' name='physical_invoice' value='<?php echo $physical_invoice;?>' >
											  <label> <b> PHYSICAL INVOICE </b> </label>
											</div>
										 
											
											 <div class="input-field col m12 l12 s12" >
											  <input  type="text"  readonly value='<?php echo $sales_price;?>' name='selling_price' >
											  <label><b>SELLING PRICE </b> </label>
											</div>
											
											
											 <div class="input-field col m12 l12 s12" >
											  <input  type="text"  readonly value='0' placeholder='0'  id='amt_paid' name='amt_paid'>
											   <input type="hidden"  readonly value='<?php echo $sales_price;?>'   id='total'>
											 
											  <label><b>AMT PAID </b> </label>
											</div>
											
											
											
											 <div class="input-field col m12 l12 s12" >
											  <input  type="text"  readonly name='balance' value='<?php echo $sales_price;?>'  id='balance'>
											  <label><b>BALANCE </b> </label>
											</div>
											
											
											
											<div class="row"></div>
										
										</div>
										</div>
										
										
									
									</div>
									
									<?php
									
										  $vad = "disabled";
														  if( $check_cus == 1){
														  $vad = "";
														 
														 
														  }
														  ?>

		
										<div class="col m5 l5 s12">
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
														<a  class='btn green modal-trigger' href="#modalu"  <?php echo $vad; ?>   id='pay11'>   SUBMIT </a>
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
















