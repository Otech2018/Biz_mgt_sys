<?php     
require "../script/php/connect.php";



if( isset($_GET['del_cart'])){
	$del_cart = addslashes(htmlentities($_GET['del_cart']));
	$stock_id = addslashes(htmlentities($_GET['stock_id1']));
	
	$check_lap_serail  =new run_query("delete from movements where move_id='$del_cart' ");
	$check_lap  =new run_query("update stock set status='3'   where id='$stock_id' ");
	
							echo "<script>
							window.location.replace(\"pending_laptop.php\");
					</script>"; 
					
}




if( isset($_GET['cart_id'])){
	$cart_id = addslashes(htmlentities($_GET['cart_id']));
	$user_location = addslashes(htmlentities($_GET['user_location']));
	$stock_id = addslashes(htmlentities($_GET['stock_id']));
	
	$check_lap_serail  =new run_query("update movements set  status_move='COMPLETED'  where move_id='$cart_id' ");
	$check_lap  =new run_query("update stock set status='3', currentLocation='$user_location'   where id='$stock_id' ");
	
							echo "<script>
							alert('Success!');
							window.location.replace(\"pending_laptop.php\");
					</script>"; 
					
}



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

   <title> PENDING LAPTOP - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
<?php     
require "../script/php/header_sales.php";
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'> PENDING MOVEMENTS </h1>
<br/>
<form method='post'>
 
   
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
			
			
			
			
			
			
			
			
			
			
			
			
			
			
						<ul class="collapsible popout " data-collapsible="accordion">
						<li>
						  <div class="collapsible-header deep-orange white-text"> <h1 align='center'>OUTBOX <i class='fa fa-rocket'></i> </h1></div>
						  <div class="collapsible-body">
						
						  <table class='bordered striped '>
			
			<tr>
			<th> S/N </th>
			<th> STOCK ID</th>
			<th>MODEL</th>
			<th>RECEIVER</th>
		<th>ACTION</th>
			</tr>
			
				<?php 
					 $get_cart = new run_query("select * from movements  where  status_move='PENDING' and sender='$user_id' ");
								
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
											
											$get_user = new run_query("select user_username as receiver_un, user_location as reciver_location_id  from users where user_id= '$receiver' ");
											$get_user_data =	$get_user->result();
											extract($get_user_data );
											
												
											$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$reciver_location_id' ";
											$get_locations = $connect ->query($sql_location);	
											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
											extract($get_locations_data );
											
											echo "
											
											<tr>
												<td> $no </td>
												<td> $stockId </td>
												<td> $model_name </td>
												<td> $receiver_un ( $location_name) </td>
												<td>
													
													<a  class='red-text modal-trigger' href='#stock$id' >   <i class='fa fa-info'></i></a>
																&nbsp;&nbsp; | &nbsp;&nbsp;							
													<a  class='red-text modal-trigger' href='#modal$id' >   <i class='fa fa-trash'></i></a>
																
															  <div id='modal$id' class='modal'>
																<div class='modal-content'>
																  <h4 align='center'>Are you Sure You Want To Delete?</h4>
																  <p align='center' > $model_name  STOCK ID ($stockId)</p>
																	<a href='#!' class='modal-action modal-close  green-text'>  <i class='fa fa-close'></i></a>
																
																<a href='pending_laptop.php?del_cart=$move_id&stock_id1=$stockId' class=' red-text right'>  <i class='fa fa-trash'></i></a>
																
																</div>
																
															  </div>
															  
															  
															   <div id='stock$id' class='modal'>
																	<div class='modal-content'>
																		<a href='#!' class='modal-action modal-close  red-text right'>  <i class='fa fa-close'></i></a>
																				  <br/> <b>STOCK ID:  $id </b>
																				 <br/> <b>MODEL:  $model_name  </b>
																				  <br/> <b>SERIAL/IMEI:   $serial  </b>
																				  <br/> <b>BATERY SERIAL:    $battSerial  </b>
																				  <br/> <b>HARD DRIVE SIZE:    $HDD  </b>
																				  <br/> <b>HARD DRIVE TYPE:    $HDDtype </b>
																				  <br/> <b>RAM SIZE:   $RAM   </b>
																				  <br/> <b>RAM TYPE:   $RAMtype </b>
																				  
																				  
																				  <br/><br/><br/> <b>COMMENTS</b><hr/>
																				  $m_comments
																				  
																				
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
				
			
			
			
						   
						  </div>
						</li>
						
					 </ul>
		
							<ul class="collapsible popout " data-collapsible="accordion">
						<li>
						  <div class="collapsible-header deep-orange white-text">  <h1 align='center'>INBOX <i class='fa fa-download'></i> </h1>  </div>
						  <div class="collapsible-body">
						 
						  <table class='bordered striped '>
			
			<tr>
			<th> S/N </th>
			<th> STOCK ID</th>
			<th>MODEL</th>
			<th>SENDER</th>
		<th>ACTION</th>
			</tr>
			
					<?php 
					 $get_cart1 = new run_query("select * from movements  where  status_move='PENDING' and receiver='$user_id' ");
								
								if( $get_cart1->num_rows >= 1){	
								$no =1;								
									while(	$get_cart_data1 =	$get_cart1->result() ){
										
											extract($get_cart_data1 );
											
											$get_stock = new run_query("select * from stock where id= '$stockId' ");
											$get_stock_data =	$get_stock->result();
											extract($get_stock_data );
											
												$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
											$get_user = new run_query("select user_username as sender_un, user_location as sender_location_id  from users where user_id= '$sender' ");
											$get_user_data =	$get_user->result();
											extract($get_user_data );
											
											$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$sender_location_id' ";
											$get_locations = $connect ->query($sql_location);	
											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
											
											extract($get_locations_data );
											
											echo "
											
											<tr>
												<td> $no </td>
												<td> $stockId </td>
												<td> $model_name </td>
												<td> $sender_un ( $location_name) </td>
												<td>
													
													<a  class='red-text modal-trigger' href='#stock$id' >   <i class='fa fa-info'></i></a>
																&nbsp;&nbsp; | &nbsp;&nbsp;							
													<a  class='red-text modal-trigger' href='#modal$id' >    ACCEPT</a>
																
															  <div id='modal$id' class='modal'>
																<div class='modal-content'>
																  <h4 align='center'>Are you Sure You Want To  receive this item?</h4>
																  <p align='center' > $model_name  STOCK ID ($stockId)</p>
																	<a href='#!' class='modal-action modal-close  green-text'>  <i class='fa fa-close'></i></a>
																
																<a href='pending_laptop.php?cart_id=$move_id&stock_id=$stockId&user_location=$user_location' class=' red-text right'>  YES </a>
																
																</div>
																
															  </div>
															  
															  
															   <div id='stock$id' class='modal'>
																	<div class='modal-content'>
																		<a href='#!' class='modal-action modal-close  red-text right'>  <i class='fa fa-close'></i></a>
																				  <br/> <b>STOCK ID:  $id </b>
																				 <br/> <b>MODEL:  $model_name  </b>
																				  <br/> <b>SERIAL/IMEI:   $serial  </b>
																				  <br/> <b>BATERY SERIAL:    $battSerial  </b>
																				  <br/> <b>HARD DRIVE SIZE:    $HDD </b>
																				  <br/> <b>HARD DRIVE TYPE:    $HDDtype </b>
																				  <br/> <b>RAM SIZE:   $RAM </b>
																				  <br/> <b>RAM TYPE:   $RAMtype </b>
																				 
																				  
																				  <br/><br/><br/> <b>COMMENTS</b><hr/>
																				  $m_comments
																				  
																				
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
			
				
			   
						  </div>
						</li>
						
					 </ul>
		
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
















