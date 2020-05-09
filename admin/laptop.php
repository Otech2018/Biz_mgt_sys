<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "admin_home";

require "../script/mlc/script_head.php";

			if( isset($_POST['add_model']) ){
				 $name_model = addslashes(htmlentities($_POST['name_model']));
						
						$query_check  =new run_query("select * from laptop_model where model_name='$name_model' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Model Already Exist..Try Using A Different Name');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						}else{
						
						$query_run  =new run_query("insert into laptop_model set model_name='$name_model' ");
							 
							  echo "<script>
											alert('Model Added Successfully');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						
						}

				}


			if( isset($_POST['add_scr']) ){
				 $name_scr = addslashes(htmlentities($_POST['name_scr']));
						
						$query_check  =new run_query("select * from laptop_screen where screen_size='$name_scr' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Screen Size Already Exist..Try  A Different Size');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						}else{
						
						$query_run  =new run_query("insert into laptop_screen set screen_size='$name_scr' ");
							 
							  echo "<script>
											alert('Screen Size Added Successfully');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						
						}

				}

				
					if( isset($_POST['add_laptop_processor_type']) ){
				 $laptop_processor_type = addslashes(htmlentities($_POST['laptop_processor_type']));
						
						$query_check  =new run_query("select * from laptop_processor_type where processor_type='$laptop_processor_type' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Processor Type Already Exist..Try   Different Details');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						}else{
						
						$query_run  =new run_query("insert into laptop_processor_type set  processor_type='$laptop_processor_type' ");
							 
							  echo "<script>
											alert('Processor Type Added Successfully');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						
						}

				}



				
					if( isset($_POST['add_processor_speed']) ){
				 $pro_speed_name = addslashes(htmlentities($_POST['name_processor_speed']));
						
						$query_check  =new run_query("select * from processor_speed where pro_speed_name='$pro_speed_name' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Processor Speed Already Exist..Try   Different Details');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						}else{
						
						$query_run  =new run_query("insert into processor_speed set  pro_speed_name='$pro_speed_name' ");
							 
							  echo "<script>
											alert('Processor Speed Added Successfully');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						
						}

				}



									if( isset($_POST['add_processor_gen']) ){
				 $pro_gen_name = addslashes(htmlentities($_POST['name_processor_gen']));
						
						$query_check  =new run_query("select * from processor_generation where pro_gen_name='$pro_gen_name' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Processor Generation Already Exist..Try   Different Details');
											window.location.replace(\"laptop.php\");
											
									</script>"; 
						}else{
						
						$query_run  =new run_query("insert into processor_generation set  pro_gen_name='$pro_gen_name' ");
							 
							  echo "<script>
											alert('Processor Generation Added Successfully');
											window.location.replace(\"laptop.php\");
											
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

   <title> SET LAPTOP DETAILS - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>	
		

				   <div class="container">
				   <h1 align='center' class=' tada blue-text'>SET LAPTOP DETAILS</h1>
				<br/>


				  
					<div class="row">
					
						
						
						<div class="col m4 l4 s12">
							<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
							<div class="card-content">
								<h3 align='center'> SET MODEL</h3>
							
							<form method='POST'>	 
							  
							  <div class="input-field col m12 l12 s12">
								  <input id="email" type="text" required  name='name_model'>
								  <label for="email"><i class='fa fa-laptop'></i>  Enter Laptop Model</label>
								</div>
								
							  <div class="input-field col m12 l12 s12">
							  <center>
								<button type='submit' class='btn blue ' name='add_model'>  <i class='fa fa-plus'></i> </button>
						</center><br/><br/>
							  </div>
						</form>
													<div class="row " >
					
					
														
														
														<form method='POST'>
															<div class="col m12 l12 s12">
																
																	 <table class="table bordered striped z-depth-3 "  id='model'  width='100%'>
																		  <thead>
																		 <tr>
																				<th>ID</th>
																				<th>MODEL</th>
																				<th>EDIT</th>
																		 </tr>
																		</thead>
																		<tbody>
																		
																			<?php 
																				$get_laptop_model = new run_query("select * from laptop_model ");
																				
																			while(	$get_laptop_model_data =	$get_laptop_model->result() ){
																			
																				extract($get_laptop_model_data );
																				echo "
																					<tr>
																						<td> $model_id </td>
																						<td> $model_name </td>
																						
																						<td>
																							 <a  class='modal-trigger'  href='#$model_id'>
																									<i class='fa fa-edit'></i>
																							</a>
																							
																										  <div id='$model_id' class='modal'>
																												<div class='modal-content'>
																												  <h1 align='center'><i class='fa fa-edit'></i> MODEL </h1>
																												  
																														<div class='row'>
																															<div class='input-field col m8 l8 s8'>
																															  <input id='email' type='text'  value='$model_name' name='model_update$model_id'>
																															  <label for='email'><b>Model:</b></label>
																															</div>
																														 
																															<div class='input-field col m4 l4 s8'>
																																<center>
																														   <button type='submit' class='btn deep-orange pulse' name='model_edit$model_id'>   <i class='fa fa-edit'></i></button>
																															</center>
																														 
																															</div>
																														 
																														
																														  
																														  
																												</div>
																												<div class='modal-footer'>
																												  <a href='#!' class='modal-action modal-close  btn-flat'><i class='fa fa-close'></i></a>
																												</div>
																											  </div>
																						</td>
																					</tr>
																				
																				";
																				
																				
																							if(isset($_POST['model_edit'.$model_id]))  {
																						 $name_model = addslashes(htmlentities($_POST['model_update'.$model_id]));
																								
																								$query_check  =new run_query("select * from laptop_model where model_name='$name_model' ");
																								if( $query_check->num_rows >= 1){
																										  echo "<script>
																													alert('Laptop Model Already Exist..Try Using A Different Name');
																													window.location.replace(\"laptop.php\");
																													
																											</script>"; 
																								}else{
																								
																								$query_run  =new run_query("update laptop_model set model_name='$name_model' where model_id='$model_id' ");
																									 
																									  echo "<script>
																													alert('Model Edited Successfully');
																													window.location.replace(\"laptop.php\");
																													
																											</script>"; 
																								
																								}

																						}
																				}
																				?>
																		
																		</tbody>
																	 </table>
																	
															</div>
														
														
													</div>
												</form>
													
										 
					
							</div>
							</div>
						
						</div>
						
						
						
						
					
						<div class="col m4 l4 s12">
							<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
							<div class="card-content">
								<h3 align='center'> SET SCREEN</h3>
							
							<form method='POST'>	 
							  
							  <div class="input-field col m12 l12 s12">
								  <input id="email" type="text" required  name='name_scr'>
								  <label for="email"><i class='fa fa-laptop'></i>  Enter Screen Size</label>
								</div>
								
							  <div class="input-field col m12 l12 s12">
							  <center>
								<button type='submit' class='btn deep-orange ' name='add_scr'>  <i class='fa fa-plus'></i> </button>
						</center><br/><br/>
							  </div>
						</form>
													<div class="row " >
					
					
														
														
														<form method='POST'>
															<div class="col m12 l12 s12">
																
																	 <table class="table bordered striped z-depth-3 "  id='screen'  width='100%'>
																		  <thead>
																		 <tr>
																				<th>ID</th>
																				<th>SCREEN SIZE</th>
																				<th>EDIT</th>
																		 </tr>
																		</thead>
																		<tbody>
																		
																			<?php 
																				$get_laptop_screen= new run_query("select * from laptop_screen ");
																				
																			while(	$get_laptop_screen_data =	$get_laptop_screen->result() ){
																			
																				extract($get_laptop_screen_data );
																				echo "
																					<tr>
																						<td> $screen_id </td>
																						<td> $screen_size </td>
																						
																						<td>
																							 <a  class='modal-trigger'  href='#scr$screen_id'>
																									<i class='fa fa-edit'></i>
																							</a>
																							
																										  <div id='scr$screen_id' class='modal'>
																												<div class='modal-content'>
																												  <h1 align='center'><i class='fa fa-edit'></i> SCREEN SIZE </h1>
																												  
																														<div class='row'>
																															<div class='input-field col m8 l8 s8'>
																															  <input id='email' type='text'  value='$screen_size' name='scr_update$screen_id'>
																															  <label for='email'><b>Screen Size:</b></label>
																															</div>
																														 
																															<div class='input-field col m4 l4 s8'>
																																<center>
																														   <button type='submit' class='btn deep-orange pulse' name='scr_edit$screen_id'>   <i class='fa fa-edit'></i></button>
																															</center>
																														 
																															</div>
																														 
																														
																														  
																														  
																												</div>
																												<div class='modal-footer'>
																												  <a href='#!' class='modal-action modal-close  btn-flat'><i class='fa fa-close'></i></a>
																												</div>
																											  </div>
																						</td>
																					</tr>
																				
																				";
																				
																				
																							if(isset($_POST['scr_edit'.$screen_id]))  {
																						 $screen_size = addslashes(htmlentities($_POST['scr_update'.$screen_id]));
																								
																								$query_check  =new run_query("select * from laptop_screen where screen_size='$screen_size' ");
																								if( $query_check->num_rows >= 1){
																										  echo "<script>
																													alert('Screen Size Already Exist..Try  A Different Size');
																													window.location.replace(\"laptop.php\");
											
																													
																											</script>"; 
																								}else{
																								
																								$query_run  =new run_query("update laptop_screen set screen_size='$screen_size' where screen_id='$screen_id' ");
																									 
																									  echo "<script>
																													alert('Screen Size Edited Successfully');
																													window.location.replace(\"laptop.php\");
																													
																											</script>"; 
																								
																								}

																						}
																				}
																				?>
																		
																		</tbody>
																	 </table>
																	
															</div>
														
														
													</div>
												</form>
													
										 
					
							</div>
							</div>
						
						</div>
						
						
						
						
						
						
						
						
						<div class="col m4 l4 s12">
							<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
							<div class="card-content">
								<h3 align='center'> SET PROCESSOR TYPE</h3>
							
							<form method='POST'>	 
							  
							  <div class="input-field col m12 l12 s12">
								  <input id="email" type="text" required  name='laptop_processor_type'>
								  <label for="email"><i class='fa fa-cog'></i>  Enter Processor Type</label>
								</div>
								
							  <div class="input-field col m12 l12 s12">
							  <center>
								<button type='submit' class='btn green ' name='add_laptop_processor_type'>  <i class='fa fa-plus'></i> </button>
						</center><br/><br/>
							  </div>
						</form>
													<div class="row " >
					
					
														
														
														<form method='POST'>
															<div class="col m12 l12 s12">
																
																	 <table class="table bordered striped z-depth-3 " id='processor'  width='100%'>
																		  <thead>
																		 <tr>
																				<th>ID</th>
																				<th>PROCESSOR TYPE</th>
																				<th>EDIT</th>
																		 </tr>
																		</thead>
																		<tbody>
																		
																			<?php 
																				$get_laptop_processor_type = new run_query("select * from laptop_processor_type ");
																				
																			while(	$get_laptop_processor_type_data =	$get_laptop_processor_type->result() ){
																			
																				extract($get_laptop_processor_type_data );
																				echo "
																					<tr>
																						<td> $processor_id </td>
																						<td> $processor_type </td>
																						
																						<td>
																							 <a  class='modal-trigger'  href='#pt$processor_id'>
																									<i class='fa fa-edit'></i>
																							</a>
																							
																										  <div id='pt$processor_id' class='modal'>
																												<div class='modal-content'>
																												  <h1 align='center'><i class='fa fa-edit'></i> PROCESSOR TYPE </h1>
																												  
																														<div class='row'>
																															<div class='input-field col m8 l8 s8'>
																															  <input id='email' type='text'  value='$processor_type' name='pt_update$processor_id'>
																															  <label for='email'><b>Processor Type:</b></label>
																															</div>
																														 
																															<div class='input-field col m4 l4 s8'>
																																<center>
																														   <button type='submit' class='btn green pulse' name='pt_edit$processor_id'>   <i class='fa fa-edit'></i></button>
																															</center>
																														 
																															</div>
																														 
																														
																														  
																														  
																												</div>
																												<div class='modal-footer'>
																												  <a href='#!' class='modal-action modal-close  btn-flat'><i class='fa fa-close'></i></a>
																												</div>
																											  </div>
																						</td>
																					</tr>
																				
																				";
																				
																				
																							if(isset($_POST['pt_edit'.$processor_id]))  {
																						 $processor_type = addslashes(htmlentities($_POST['pt_update'.$processor_id]));
																								
																									$query_check  =new run_query("select * from laptop_processor_type where processor_type='$processor_type' ");
																										if( $query_check->num_rows >= 1){
																												  echo "<script>
																															alert('Processor Type Already Exist..Try   Different Details');
																															window.location.replace(\"laptop.php\");
																															
																													</script>"; 
																										}else{
																										
																										$query_run  =new run_query("update laptop_processor_type set  processor_type='$processor_type' where  processor_id='$processor_id' ");
																											 
																											  echo "<script>
																															alert('Processor Type Edited Successfully');
																															window.location.replace(\"laptop.php\");
																															
																													</script>"; 
																								
																								}

																						}
																				}
																				?>
																		
																		</tbody>
																	 </table>
																	
															</div>
														
														
													</div>
												</form>
													
										 
					
							</div>
							</div>
						
						</div>
						
						
					
					
					
					
						<div class="col m4 l4 s12">
							<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
							<div class="card-content">
								<h3 align='center'> SET PROCESSOR SPEED</h3>
							
							<form method='POST'>	 
							  
							  <div class="input-field col m12 l12 s12">
								  <input id="email" type="text" required  name='name_processor_speed'>
								  <label for="email"><i class='fa fa-laptop'></i><i class='fa fa-cog'></i>  Enter Processor Speed</label>
								</div>
								
							  <div class="input-field col m12 l12 s12">
							  <center>
								<button type='submit' class='btn blue ' name='add_processor_speed'>  <i class='fa fa-plus'></i> </button>
						</center><br/><br/>
							  </div>
						</form>
													<div class="row " >
					
					
														
														
														<form method='POST'>
															<div class="col m12 l12 s12">
																
																	 <table class="table bordered striped z-depth-3 "  id='processor_speed'  width='100%'>
																		  <thead>
																		 <tr>
																				<th>ID</th>
																				<th>PROCESSOR SPEED</th>
																				<th>EDIT</th>
																		 </tr>
																		</thead>
																		<tbody>
																		
																			<?php 
																				$processor_speed = new run_query("select * from processor_speed ");
																				
																			while(	$processor_speed_data =	$processor_speed->result() ){
																			
																				extract($processor_speed_data );
																				echo "
																					<tr>
																						<td> $pro_speed_id </td>
																						<td> $pro_speed_name </td>
																						
																						<td>
																							 <a  class='modal-trigger'  href='#pro_speed$pro_speed_id'>
																									<i class='fa fa-edit'></i>
																							</a>
																							
																										  <div id='pro_speed$pro_speed_id' class='modal'>
																												<div class='modal-content'>
																												  <h1 align='center'><i class='fa fa-edit'></i> PROCESSOR SPEED </h1>
																												  
																														<div class='row'>
																															<div class='input-field col m8 l8 s8'>
																															  <input id='email' type='text'  value='$pro_speed_name' name='pro_speed_update$pro_speed_id'>
																															  <label for='email'><b>PROCESSOR SPEED:</b></label>
																															</div>
																														 
																															<div class='input-field col m4 l4 s8'>
																																<center>
																														   <button type='submit' class='btn deep-orange pulse' name='pro_speed$pro_speed_id'>   <i class='fa fa-edit'></i></button>
																															</center>
																														 
																															</div>
																														 
																														
																														  
																														  
																												</div>
																												<div class='modal-footer'>
																												  <a href='#!' class='modal-action modal-close  btn-flat'><i class='fa fa-close'></i></a>
																												</div>
																											  </div>
																						</td>
																					</tr>
																				
																				";
																				
																				
																							if(isset($_POST['pro_speed'.$pro_speed_id]))  {
																						 $pro_speed_name1 = addslashes(htmlentities($_POST['pro_speed_update'.$pro_speed_id]));
																								
																								$query_check  =new run_query("select * from processor_speed where pro_speed_name='$pro_speed_name1' ");
																								if( $query_check->num_rows >= 1){
																										  echo "<script>
																													alert('Laptop Processor Speed Already Exist..Try Using A Different Name');
																													window.location.replace(\"laptop.php\");
																													
																											</script>"; 
																								}else{
																								
																								$query_run  =new run_query("update processor_speed set pro_speed_name='$pro_speed_name1' where pro_speed_id='$pro_speed_id' ");
																									 
																								$query_ru1n  =new run_query("update stock set processorSpeed='$pro_speed_name1' where processorSpeed='$pro_speed_name' ");
																									  echo "<script>
																													alert('Processor Speed Edited Successfully');
																													window.location.replace(\"laptop.php\");
																													
																											</script>"; 
																								
																								}

																						}
																				}
																				?>
																		
																		</tbody>
																	 </table>
																	
															</div>
														
														
													</div>
												</form>
													
										 
					
							</div>
							</div>
						
						</div>
						
						
						
					
					
						<div class="col m4 l4 s12">
							<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
							<div class="card-content">
								<h3 align='center'> SET PROCESSOR GENERATION</h3>
							
							<form method='POST'>	 
							  
							  <div class="input-field col m12 l12 s12">
								  <input id="email" type="text" required  name='name_processor_gen'>
								  <label for="email"><i class='fa fa-laptop'></i><i class='fa fa-cogs'></i>  Enter Processor Generation</label>
								</div>
								
							  <div class="input-field col m12 l12 s12">
							  <center>
								<button type='submit' class='btn red ' name='add_processor_gen'>  <i class='fa fa-plus'></i> </button>
						</center><br/><br/>
							  </div>
						</form>
													<div class="row " >
					
					
														
														
														<form method='POST'>
															<div class="col m12 l12 s12">
																
																	 <table class="table bordered striped z-depth-3 "  id='processor_gen'  width='100%'>
																		  <thead>
																		 <tr>
																				<th>ID</th>
																				<th> <i class='fa fa-cogs'></i> GENERATION</th>
																				<th>EDIT</th>
																		 </tr>
																		</thead>
																		<tbody>
																		
																			<?php 
																				$processor_generation = new run_query("select * from processor_generation ");
																				
																			while(	$processor_generation_data =	$processor_generation->result() ){
																			
																				extract($processor_generation_data );
																				echo "
																					<tr>
																						<td> $pro_gen_id </td>
																						<td> $pro_gen_name </td>
																						
																						<td>
																							 <a  class='modal-trigger'  href='#pro_gen$pro_gen_id'>
																									<i class='fa fa-edit'></i>
																							</a>
																							
																										  <div id='pro_gen$pro_gen_id' class='modal'>
																												<div class='modal-content'>
																												  <h1 align='center'><i class='fa fa-edit'></i> PROCESSOR GENERATION </h1>
																												  
																														<div class='row'>
																															<div class='input-field col m8 l8 s8'>
																															  <input id='email' type='text'  value='$pro_gen_name' name='pro_gen_update$pro_gen_id'>
																															  <label for='email'><b>PROCESSOR SPEED:</b></label>
																															</div>
																														 
																															<div class='input-field col m4 l4 s8'>
																																<center>
																														   <button type='submit' class='btn deep-orange pulse' name='pro_gen$pro_gen_id'>   <i class='fa fa-edit'></i></button>
																															</center>
																														 
																															</div>
																														 
																														
																														  
																														  
																												</div>
																												<div class='modal-footer'>
																												  <a href='#!' class='modal-action modal-close  btn-flat'><i class='fa fa-close'></i></a>
																												</div>
																											  </div>
																						</td>
																					</tr>
																				
																				";
																				
																				
																							if(isset($_POST['pro_gen'.$pro_gen_id]))  {
																						 $pro_gen_name1 = addslashes(htmlentities($_POST['pro_gen_update'.$pro_gen_id]));
																								
																								$query_check  =new run_query("select * from processor_generation where pro_gen_name='$pro_gen_name1' ");
																								if( $query_check->num_rows >= 1){
																										  echo "<script>
																													alert(' Processor Generation Already Exist..Try Using A Different Name');
																													window.location.replace(\"laptop.php\");
																													
																											</script>"; 
																								}else{
																								
																								$query_run  =new run_query("update processor_generation set pro_gen_name='$pro_gen_name1' where pro_gen_id='$pro_gen_id' ");
																									 
																								$query_ru1n  =new run_query("update stock set generation='$pro_gen_name1' where generation='$pro_gen_name' ");
																									  echo "<script>
																													alert('Processor Generation Edited Successfully');
																													window.location.replace(\"laptop.php\");
																													
																											</script>"; 
																								
																								}

																						}
																				}
																				?>
																		
																		</tbody>
																	 </table>
																	
															</div>
														
														
													</div>
												</form>
													
										 
					
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




<script>
    $(document).ready(function() {
    var table = $('#model').DataTable( {
        responsive: false,
         "pageLength": 10,
      
      
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );



    $(document).ready(function() {
    var table = $('#screen').DataTable( {
        responsive: false,
         "pageLength": 10,
         
    
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );


   $(document).ready(function() {
    var table = $('#processor').DataTable( {
        responsive: false,
         "pageLength": 10,
         
    
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );

 $(document).ready(function() {
    var table = $('#processor_speed').DataTable( {
        responsive: false,
         "pageLength": 10,
         
    
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );


 $(document).ready(function() {
    var table = $('#processor_gen').DataTable( {
        responsive: false,
         "pageLength": 10,
         
    
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );



</script>

</body>

</html>
















