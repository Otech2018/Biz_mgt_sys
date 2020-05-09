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

   <title> SEARCH INVOICE - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>   INVOICE TO ADD PAYMENT</h1>
<br/>
<form method='post'>
     <div class="row">
	
	
		<div class="col m12 l12 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
		
			  
			  
			  
			  
			   <div class="input-field col m10 l10 s12">
				  <input id="email" type="text" required >
				  <label for="email"><i class='fa fa-search'></i> Search Invoice</label>
				</div>
				
			  <div class="input-field col m2 l2 s12">
				<button type='submit' class='btn deep-orange pulse'>  <i class='fa fa-search'></i> </button>
		
			  </div>
			
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		

	</div>

	
   
      
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
						<ul class="collapsible popout " data-collapsible="accordion">
						<li>
						  <div class="collapsible-header deep-orange white-text">HP FOLIO 520 (8 RAM) (N50,000)  2/2/2020 </div>
						  <div class="collapsible-body blue lighten-5">
						 <table class="bordered striped z-depth-3 " >
						  <tr> <td> <b>STOCK ID: </b></td> <td> fgg</td>  </tr>
						    <tr> <td> <b>INVOICE NUMBER: </b></td> <td></td>  </tr>
							 <tr> <td> <b> PHYSICAL INVOICE NUMBER: </b></td> <td></td>  </tr>
						  </table>
						
						  
						   <br/><br/>
						   <table class="bordered striped z-depth-3 " >
						  <tr> <td> <b>SOLD LOCATION: </b></td> <td> fgg</td>  </tr>
						    <tr> <td> <b> DATE SOLD: </b></td> <td></td>  </tr>
							 <tr> <td> <b> PRICE SOLD: </b></td> <td></td>  </tr>
							<tr> <td> <b> TOTAL AMT PAID: </b></td> <td></td>  </tr>
							 <tr> <td> <b> BALANCE: </b></td> <td></td>  </tr>
							
						
						  </table>
						  
						  
						 
						  <br/><br/><br/> <b>COMMENTS</b><hr/>
						  this is a comment v this is a comment this is a comment this is a comment this is a comment
						  
						    <br/> <br/><br/> 
							
							<center>
														<a class='btn green' href='payment.php'> ADD PAYMENT</a>
													</center>
							
						  </div>
						</li>
						
					 </ul>
		
		
		
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
















