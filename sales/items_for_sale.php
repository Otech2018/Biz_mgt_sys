<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "stock";

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

   <title> ALL STOCK FOR SALE- OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";
?>	
   <div class="container">
   <h1 style='font-family:arial' align='center' class=' tada blue-text'> ALL STOCK FOR SALE</h1>
<br/>

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
				    <option value="all"   selected >All Location </option>
				
				  
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

	
   
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
				<form method='post'>
				<?php
							if( isset($_POST['view_stock']) ){
								$stock_location = addslashes(htmlentities($_POST['stock_location']));
								 if( $stock_location ==='all'){
								 $get_stocks = new run_query("select * from stock where status='3' ");
								
								 }else{
								  $get_stocks = new run_query("select * from stock  where currentLocation='$stock_location' and status='3' ");
								
								 }
								if( $get_stocks->num_rows >= 1){	
								$no =1;								
									while(	$get_stocks_data =	$get_stocks->result() ){
										
											extract($get_stocks_data ); $price = number_format("$price",2,".",","); 
											
											$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where  location_id= '$currentLocation' ";
											$get_locations = $connect ->query($sql_location);	
											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
											extract($get_locations_data );
											
											if( $location_id == $user_location and $status=='3'){
											$sell_btn =" <a  href='set_customer.php?stock_id=$id' class='btn green pulse '>  SELL </a>";
											
												}else{
												$sell_btn ="";
												}
											
											
												
															
											$get_user = new run_query("select user_username as user_username1 from users where user_id= '$recordedBy' ");
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
												
											if ( $status == 2 ){
												$status = "Not For Sale";
											}else if ( $status == 3 ){
												$status = " For Sale";
											}else  if ( $status == 4 ){
													$status = "<div style='color:red; font-weight:bold'>On Transit</div>";
											}
											
											
										
											
											
											
													echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																			<li>
																			  <div class='collapsible-header deep-orange white-text'>$no |  $model_name  ($RAM  RAM ) ($HDD  HDD)   </div>
																			  <div class='collapsible-body'>
																			 
																			 
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
																				   <tr><td>PRICE:  </td><td> $price  </td></tr>
																				      <tr><td>RECORDED BY:  </td><td> $user_username  </td></tr>
																				  <tr><td>DATE ADDED:   </td><td> $dateRecorded </td></tr>
																				   <tr><td>LAST UPDATE:   </td><td> $lastUpdate </td></tr>
																				  </table>
																				  
																				  <br/><br/><br/> <b>COMMENTS</b><hr/>
																				  $comments
																					<br/> <br/><br/> <b>ISSUES</b> <br/>
																					$issues 
																					<hr/>
																		$sell_btn
																			
																			  </div>
																			</li>
																			
																		 </ul>
		
													
													
													";
													
													
													$no ++;	
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
















