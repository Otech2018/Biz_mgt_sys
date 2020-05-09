<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

	
<?php     


$active= "location";

require "../script/mlc/script_head.php";

				if( isset($_POST['add_bank']) ){
				 $bank_acc_name = addslashes(htmlentities($_POST['bank_acc_name']));
				$bank_acc_no = addslashes(htmlentities($_POST['bank_acc_no']));
				$bank_name = addslashes(htmlentities($_POST['bank_name']));
						
						$query_check  =new run_query("select * from bank_details where bank_acc_no='$bank_acc_no' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Account Number  Already Exist..Try Using A Different Account Number ');
											window.location.replace(\"bank.php\");
											
									</script>"; 
						}else{
						
						$query_run  =new run_query("insert into bank_details set bank_acc_name='$bank_acc_name', bank_acc_no='$bank_acc_no', bank_name='$bank_name' ");
							 
							  echo "<script>
											alert('Bank Details Add Successfully');
											window.location.replace(\"bank.php\");
											
									</script>"; 
						
						}

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

   <title> BANK - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>		
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-bank'></i>   BANK </h1>
<br/>

     <div class="row">
	
	
		<div class="col m12 l12 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
			  
			 <form method='post'>
			  
			   <div class="input-field col m6 l6 s12">
															 <select name="bank_name" required>
																	<option  value=''  disabled selected>Select Bank</option>     
     
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
				
			  <div class="input-field col m6 l6 s12">
				  <input id="email" type="text" required  name='bank_acc_no'>
				  <label for="email"><i class='fa fa-bank'></i>  Enter Account Number </label>
				</div>
			  
			  <div class="input-field col m10 l10 s12">
				  <input id="email" type="text" required  name='bank_acc_name'>
				  <label for="email"><i class='fa fa-money'></i>  Enter Bank Acc Name</label>
				</div>
				
			  <div class="input-field col m2 l2 s12">
				<button type='submit' class='btn deep-orange pulse' name='add_bank'>  <i class='fa fa-plus'></i> </button>
		
			  </div>
			</form>
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		

	</div>

	
   
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
				 	 <table class="table bordered striped z-depth-3 " id='location'  width='100%' >
						  <thead>
						 <tr>
								<th>ID</th>
								<th>BANK NAME</th>
								<th>BANK ACC NO</th>
								<th>BANK ACC NAME</th>
								<th>EDIT</th>
						 </tr>
						</thead>
						<tbody>
						
							<?php 
								$get_banks = new run_query("select * from bank_details ");
								
							while(	$get_banks_data =	$get_banks->result() ){
							
								extract($get_banks_data );
								echo "
									<tr>
										<td> $bank_id </td>
										<td> $bank_name </td>
										<td> $bank_acc_no  </td>
										<td> $bank_acc_name </td>
										<td>
										<form method='POST'>
											 <a  class='modal-trigger'  href='#$bank_id'>
													<i class='fa fa-edit'></i>
											</a>
											
														  <div id='$bank_id' class='modal'>
																<div class='modal-content'>
																  <h1 align='center'><i class='fa fa-edit'></i> <i class='fa fa-bank'></i>  </h1>
																  
																		<div class='row'>
																			
																					  <div class='input-field col m6 l6 s12'>
																														 <select name='bank_name' required>
																																<option  value='$bank_name'   selected> $bank_name</option>     
																 
																																   <option value='Citibank'>Citibank</option>
																																	<option value='Access (Or Diamond) Bank'>Access (Or Diamond) Bank</option>
																																	<option value='Dynamic Standard Bank'>Dynamic Standard Bank</option>
																																	<option value='Ecobank Nigeria'>Ecobank Nigeria</option>
																																	<option value='Fidelity Bank Nigeria'>Fidelity Bank Nigeria</option>
																																	<option value='First Bank of Nigeria'>First Bank of Nigeria</option>
																																	<option value='First City Monument Bank'>First City Monument Bank</option>
																																	<option value='Guaranty Trust Bank'>Guaranty Trust Bank</option>
																																	<option value='Heritage Bank Plc'>Heritage Bank Plc</option>
																																	<option value='Keystone Bank Limited'>Keystone Bank Limited</option>
																																	<option value='Providus Bank Plc'>Providus Bank Plc</option>
																																	<option value='Polaris Bank'>Polaris Bank</option>
																																	<option value='Stanbic IBTC Bank Nigeria Limited'>Stanbic IBTC Bank Nigeria Limited</option>
																																	<option value='Standard Chartered Bank'>Standard Chartered Bank</option>
																																	<option value='Sterling Bank'>Sterling Bank</option>
																																	<option value='Suntrust Bank Nigeria Limited'>Suntrust Bank Nigeria Limited</option>
																																	<option value='Union Bank of Nigeria'>Union Bank of Nigeria</option>
																																	<option value='United Bank for Africa'>United Bank for Africa</option>
																																	<option value='Unity Bank Plc.'>Unity Bank Plc</option>
																																	<option value='Wema Bank'>Wema Bank</option>
																																	<option value='Zenith Bank'>Zenith Bank</option>
																																</select>
																			  
																			  </div>
																			
																		  <div class='input-field col m6 l6 s12'>
																			  <input id='email' type='text' required  name='bank_acc_no' value='$bank_acc_no' >
																			  <label for='email'><i class='fa fa-bank'></i>  Enter Account Number </label>
																			</div>
																		  
																		  <div class='input-field col m10 l10 s12'>
																			  <input id='email' type='text' required  name='bank_acc_name' value='$bank_acc_name' >
																			  <label for='email'><i class='fa fa-money'></i>  Enter Bank Acc Name</label>
																			</div>
																			
																		  <div class='input-field col m2 l2 s12'>
																			<button type='submit' class='btn deep-orange pulse' name='edit$bank_id'>  <i class='fa fa-plus'></i> </button>
																	
																		  </div>
																			
																			</div>
																		 
																		
																		  
																		  
																</div>
																<div class='modal-footer'>
																  <a href='#!' class='modal-action modal-close  btn-flat'><i class='fa fa-close'></i></a>
																</div>
															  </div>
															  </form>
										</td>
									</tr>
								
								";
								
								
											if(isset($_POST['edit'.$bank_id]))  {
										  $bank_acc_name = addslashes(htmlentities($_POST['bank_acc_name']));
				$bank_acc_no = addslashes(htmlentities($_POST['bank_acc_no']));
				$bank_name = addslashes(htmlentities($_POST['bank_name']));
						
						$query_check  =new run_query("select * from bank_details where bank_acc_no='$bank_acc_no'  and bank_id !='$bank_id' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Account Number  Already Exist..Try Using A Different Account Number ');
											window.location.replace(\"bank.php\");
											
									</script>"; 
						}else{
						
						$query_run  =new run_query("update bank_details set bank_acc_name='$bank_acc_name', bank_acc_no='$bank_acc_no', bank_name='$bank_name'  where bank_id ='$bank_id' ");
							 
							  echo "<script>
											alert('Bank Details Updated Successfully');
											window.location.replace(\"bank.php\");
											
									</script>"; 
						
										}

								}
								
					}
								?>
						
						</tbody>
					 </table>
					
			</div>
		
		<div class="col m1 l1 s0"></div>

	</div>

	

   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>

<script>
    $(document).ready(function() {
    var table = $('#location').DataTable( {
        responsive: true,
         "pageLength": 10,
      
      
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );

</script>
</body>

</html>
















