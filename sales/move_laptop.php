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

   <title> MOVE LAPTOP - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";
$tdate = date('mYd');
$batch_id = "OYE-$user_id-$tdate";


if( isset($_GET['stock_id'])){
	$stock_id = addslashes(htmlentities($_GET['stock_id']));
	
	$check_lap_serail  =new run_query("select * from movements where stockId='$stock_id' and  batch_id='$batch_id' and status_move='NOT_SET' ");
						if( $check_lap_serail->num_rows >= 1){
							echo "<script>
							alert(\"LAPTOP Already in the Cart! \");
							window.location.replace(\"move_laptop.php\");
					</script>"; 
					
						}else{
			$add_item  =new run_query("insert into movements set stockId='$stock_id', batch_id='$batch_id', status_move='NOT_SET',sender='$user_id'  ");
			$check_lap_serail  =new run_query("update stock set status='4'   where id='$stock_id' ");
	
				echo "<script>
							window.location.replace(\"move_laptop.php\");
					</script>"; 						
						}
}




if( isset($_GET['del_cart'])){
	$del_cart = addslashes(htmlentities($_GET['del_cart']));
	$stock_id = addslashes(htmlentities($_GET['stock_id1']));
	
	$check_lap_serail  =new run_query("delete from movements where move_id='$del_cart' ");
	$check_lap  =new run_query("update stock set status='3'   where id='$stock_id' ");
	
							echo "<script>
							window.location.replace(\"move_laptop.php\");
					</script>"; 
					
}


if( isset($_POST['move_laptop'])){
	$move_comment = addslashes(htmlentities($_POST['move_comment']));
	$receiver_id = addslashes(htmlentities($_POST['receiver_id']));
	
	
	$destinationId = new run_query("select  user_location   as destination_Id from users  where user_id='$receiver_id'  ");
	$destinationId_data =	$destinationId->result();
										
											extract($destinationId_data );
	
	$check_lap_serail  =new run_query("update movements  set  m_comments='$move_comment' ,
																								receiver='$receiver_id', 
																								sender='$user_id',
																								status_move='PENDING',
																								sourceId='$user_location', 
																								moveDate='$reg_Date', 
																								destinationId='$destination_Id' where batch_id='$batch_id'  and status_move='NOT_SET' and sender='$user_id'  ");
	
					if( $check_lap_serail->num_rows >= 1){		
						echo "<script>
							alert('Movement Was Successfull ');
							window.location.replace(\"move_laptop.php\");
					</script>"; 
					
					}else{
					
					echo "<script>
							alert('Nothing In the Cart! ');
							window.location.replace(\"move_laptop.php\");
					</script>"; 
					
					}
					
}




?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>   MOVE LAPTOP </h1>
<br/>
<form method='post'>
  

  
      <div class="row">
	
	
		<div class="col m12 l12 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e8eaf6;'>
            <div class="card-content">
			
			
			  
			  
			<div class='row'> 
			  
			  <form method='post'>
						<div class="input-field col m4 l4 s12">
							  <select required name='stock_location'>
							
							  <?php 
										
										 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where  location_id  ='$user_location'  ";
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
						  
						  <div class="input-field col m5 l5 s12">
						<input id="email" type="text" required name='search'>  
							  <label for="email"> <i class='fa fa-search'></i> From Stock  </label>
							 
							</div>
						  
						  <div class="input-field col m3 l3 s12">
							<a  class=' pulse  modal-trigger' href='#info'  style='padding:5px; background-color:blue; color:white; border-radius:20px;'>   <i class='fa fa-info'></i></a>
								<button type='submit' class='btn deep-orange pulse' name='view_stock'>   <i class='fa fa-search'></i></button>
					
						  </div>
						</form>
						
						
						
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
						
				</div>
			
			<div class='row'>
			
						
		
		
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
								 $get_stocks = new run_query("select * from stock where  status='2' OR status='3' $search_query ");
								
								 }else{
								  $get_stocks = new run_query("select * from stock  where currentLocation='$stock_location' and ( status='2' OR status='3' ) $search_query ");
								
								 }
										if( $get_stocks->num_rows >= 1){	
								$no =1;								
													while(	$get_stocks_data =	$get_stocks->result() ){
										
																									extract($get_stocks_data ); $price = number_format("$price",2,".",","); 
																									
																								$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$currentLocation' ";
																										$get_locations = $connect ->query($sql_location);	
																										$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
																										extract($get_locations_data );
																									
																								$sell_btn =" <a  href='move_laptop.php?stock_id=$id' class='btn green pulse '>  <i class='fa fa-plus'></i>  </a>";
											
																										
																									
																										
																													
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
																				//seraching from model table
																				$get_models = new run_query("select * from laptop_model where model_name like '%$search%'   ");
																						if( $get_models->num_rows >= 1){	
																										
																							while(	$get_model_datas =	$get_models->result() ){
																									extract($get_model_datas );
																									
																									if( $stock_location ==='all'){
																			 $get_stocks = new run_query("select * from stock where status >=2 and model='$model_id' ");
																									
																			 }else{
																				$get_stocks = new run_query("select * from stock where currentLocation='$stock_location' and status >=2 and model='$model_id' ");
																									
																			 }
																											if( $get_stocks->num_rows >= 1){	
																													$no =1;								
																																	while(	$get_stocks_data =	$get_stocks->result() ){
																					
																																				extract($get_stocks_data ); $price = number_format("$price",2,".",","); 
																																				
																																			$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$currentLocation' ";
																																					$get_locations = $connect ->query($sql_location);	
																																					$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
																																					extract($get_locations_data );
																																				
																																				if( $location_id == $user_location and $status=='3'){
																																				$sell_btn =" <a  href='move_laptop.php?stock_id=$id' class='btn green pulse '>  <i class='fa fa-plus'></i>  </a>";
																						
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
		
		

			  </div>
	
			</div>
			</div>
		
		</div>
		
		

	</div>

	
	 <div class="row">
	
	
		<div class="col m6 l6 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#f0f4c3;'>
            <div class="card-content">
			
			<table class='bordered striped '>
			
			<tr>
			<th> S/N </th>
			<th> STOCK ID</th>
			<th>MODEL</th>
		<th>ACTION</th>
			</tr>
			
			<?php 
					 $get_cart = new run_query("select * from movements  where batch_id='$batch_id' and status_move='NOT_SET' and sender='$user_id' ");
								
								if( $get_cart->num_rows >= 1){	
								$no =1;								
									while(	$get_cart_data =	$get_cart->result() ){
										
											extract($get_cart_data );
											
											$get_stock = new run_query("select * from stock where id= '$stockId' ");
											$get_stock_data =	$get_stock->result();
											extract($get_stock_data );
											
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
											echo "
											
											<tr>
												<td> $no </td>
												<td> $stockId </td>
												<td> $model_name </td>
												<td>
																	
													<a  class='red-text modal-trigger' href='#modal$id' >   <i class='fa fa-trash'></i></a>
																
															  <div id='modal$id' class='modal'>
																<div class='modal-content'>
																  <h4 align='center'>Are you Sure You Want To Delete?</h4>
																  <p align='center' > $model_name  STOCK ID ($stockId)</p>
																	<a href='#!' class='modal-action modal-close  green-text'>  <i class='fa fa-close'></i></a>
																
																<a href='move_laptop.php?del_cart=$move_id&stock_id1=$stockId' class=' red-text right'>  <i class='fa fa-trash'></i></a>
																
																</div>
																
															  </div>
													</td>
												</tr>
											
											
											";
											$no++;
									}
									
								}
			
			
			?>
			</table>
				
			 
			
			<div class='row'>
			
				
			  </div>
	
			</div>
			</div>
		
		</div>
		
		
		<div class="col m6 l6 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e3f2fd;'>
            <div class="card-content">
			
			
			
			  
			  <form method='post'>
			  <div class="input-field col m12 l12 s12">
				<select required name='receiver_id' >
				    
				  <?php 
							$get_locations1 = new run_query("select * from users  where user_id !='$user_id' and user_permission='3' and  user_status='1' and user_location !='$user_location' ");
								
							while(	$get_locations_data1 =	$get_locations1->result() ){
							
								extract($get_locations_data1 );
								
								
							 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where  location_id='$user_location'  ";
								$get_locations = $connect ->query($sql_location);	
								$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
								extract($get_locations_data );
								
								echo "<option value='$user_id'> $user_username  ( $location_name ) </option>";
									}	
						?>
				</select>
				<label> <b> RECIEVER</b> </label>
			</div>
				
			  <div class="input-field col m6 l6 s12">
				   <textarea id="textarea1" class="materialize-textarea" name='move_comment' ></textarea>
				  <label for="textarea1">Comments</label>
			   </div>
				
				  <div class="input-field col m6 l6 s12">
				  <br/><br/>
				<button type='submit' name='move_laptop' class='btn green'> SEND</button>
				</div>
			</form>
			<div class='row'>
			
				
			  </div>
	
			</div>
			</div>
		
		</div>
		

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
















