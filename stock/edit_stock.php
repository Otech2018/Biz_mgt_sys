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

   <title> EDIT STOCK - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_stock.php";


	if( isset($_GET['stock_id']) ){
	 $stock_id = addslashes(htmlentities($_GET['stock_id'])) ;
	
	$get_lap_info  =new run_query("select * from stock where id='$stock_id' ");
						if( $get_lap_info->num_rows >= 1){
						$get_lap_info_data =	$get_lap_info->result();
							extract($get_lap_info_data );
							
								$_SESSION['model'] = $model;
						$_SESSION['serial'] = $serial;
						$_SESSION['battSerial'] = $battSerial;
						$_SESSION['HDD'] = $HDD;
						$_SESSION['HDDtype'] = $HDDtype;
						$_SESSION['extraHDD'] = $extraHDD;
						$_SESSION['extraHDDtype'] = $extraHDDtype;
						$_SESSION['RAM'] = $RAM;
						$_SESSION['VRAM'] = $VRAM;
						$_SESSION['processorType'] = $processorType;
						$_SESSION['processorSpeed'] = $processorSpeed;
						$_SESSION['screenSize'] = $screenSize;
						$_SESSION['currentLocation'] = $currentLocation;
						$_SESSION['price'] = $price;
						$_SESSION['status'] = $status;
						$_SESSION['issues'] = $issues;
						$_SESSION['comments'] = $comments;
						$_SESSION['generation'] = $generation;
						$_SESSION['backlight'] = $backlight;
						$_SESSION['touchscreen'] = $touchscreen;
					
						}else{
								 echo "<script>
												window.location.replace(\"index.php\");
																													
											</script>"; 
						}
			
								$get_model = new run_query("select * from laptop_model where model_id= '$model' ");
											$get_model_data =	$get_model->result();
											extract($get_model_data );
											
											
											$get_processor_type = new run_query("select * from laptop_processor_type where processor_id= '$processorType' ");
											$get_processor_type_data =	$get_processor_type->result();
											extract($get_processor_type_data );
											
												$get_scr = new run_query("select * from laptop_screen where screen_id= '$screenSize' ");
											$get_scr_data =	$get_scr->result();
											extract($get_scr_data );
											
											
											 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where  location_id= '$currentLocation' ";
												$get_locations = $connect ->query($sql_location);	
												$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
					
											extract($get_locations_data );
								
								 $model =      $_SESSION['model'] ;
								 $serial =  	$_SESSION['serial'] ;
								 $battSerial =  	$_SESSION['battSerial'] ;
								 $HDD =      $_SESSION['HDD'] ;
								 $HDDtype =  	$_SESSION['HDDtype'] ;
								$extraHDD =  		$_SESSION['extraHDD'] ;
								$extraHDDtype =  		$_SESSION['extraHDDtype'];
								$RAM =  		$_SESSION['RAM'] ;
								$VRAM =  		$_SESSION['VRAM'] ;
								$processorType =  		$_SESSION['processorType'] ;
								$processorSpeed =  		$_SESSION['processorSpeed'] ;
								$screenSize =  		$_SESSION['screenSize'] ;
								$currentLocation =  		$_SESSION['currentLocation'] ;
								$price =  		$_SESSION['price'];
								$status =  		$_SESSION['status'];
								$issues =  		$_SESSION['issues'] ;
								$comments =  		$_SESSION['comments'] ;
								$generation =  		$_SESSION['generation'] ;
									$backlight  = $_SESSION['backlight'];
								$touchscreen = $_SESSION['touchscreen'];
					
									
									}else{
								 echo "<script>
												window.location.replace(\"index.php\");
																													
											</script>"; 
						}

			if( isset($_POST['save_stock']) ){
		
	
					$model = addslashes(htmlentities($_POST['model']));
					$serial = addslashes(htmlentities($_POST['serial']));
					$battSerial = addslashes(htmlentities($_POST['battSerial']));
					$HDD = addslashes(htmlentities($_POST['HDD']));
					$HDDtype = addslashes(htmlentities($_POST['HDDtype']));
					$extraHDD = addslashes(htmlentities($_POST['extraHDD']));
					$extraHDDtype = addslashes(htmlentities($_POST['extraHDDtype']));
					$RAM = addslashes(htmlentities($_POST['RAM']));
				//	$RAMtype = addslashes(htmlentities($_POST['RAMtype']));
					$VRAM = addslashes(htmlentities($_POST['VRAM']));
					$processorType = addslashes(htmlentities($_POST['processorType']));
					$processorSpeed = addslashes(htmlentities($_POST['processorSpeed']));
					$screenSize = addslashes(htmlentities($_POST['screenSize']));
					$currentLocation = addslashes(htmlentities($_POST['currentLocation']));
					$price = addslashes(htmlentities($_POST['price']));
					$status = addslashes(htmlentities($_POST['status']));
					$issues = addslashes(htmlentities($_POST['issues']));
					$comments = addslashes(htmlentities($_POST['comments']));
					$generation = addslashes(htmlentities($_POST['generation']));
					$backlight = addslashes(htmlentities($_POST['backlight']));
					$touchscreen = addslashes(htmlentities($_POST['touchscreen']));
					
					if( is_numeric($price) ){
					
						$_SESSION['model'] = $model;
						$_SESSION['serial'] = $serial;
						$_SESSION['battSerial'] = $battSerial;
						$_SESSION['HDD'] = $HDD;
						$_SESSION['HDDtype'] = $HDDtype;
						$_SESSION['extraHDD'] = $extraHDD;
						$_SESSION['extraHDDtype'] = $extraHDDtype;
						$_SESSION['RAM'] = $RAM;
						$_SESSION['VRAM'] = $VRAM;
						$_SESSION['processorType'] = $processorType;
						$_SESSION['processorSpeed'] = $processorSpeed;
						$_SESSION['screenSize'] = $screenSize;
						$_SESSION['currentLocation'] = $currentLocation;
						$_SESSION['price'] = $price;
						$_SESSION['status'] = $status;
						$_SESSION['issues'] = $issues;
						$_SESSION['comments'] = $comments;
						$_SESSION['generation'] = $generation;
						$_SESSION['backlight'] = $backlight;
						$_SESSION['touchscreen'] = $touchscreen;
					
					$add_stock = "Update stock set  
					lastUpdate='$reg_Date',  
					recordedBy='$user_id',  
					model='$model', 
					serial='$serial', 
					battSerial='$battSerial',  
					HDD='$HDD',  
					HDDtype='$HDDtype', 
					extraHDD='$extraHDD', 
					extraHDDtype='$extraHDDtype',  
					RAM='$RAM',  
					VRAM='$VRAM', 
					processorType='$processorType', 
					processorSpeed='$processorSpeed',  
					screenSize='$screenSize',  
					currentLocation='$currentLocation', 
					price='$price', 
					status='$status', 
					touchscreen='$touchscreen',
					backlight='$backlight',
					issues='$issues',
					comments='$comments', 
					generation='$generation'  where id='$stock_id' ";
					
								$reg_stk  =new run_query($add_stock);
								$spy  =new run_query("Insert Into spy set spy_date='$reg_Date',  spy_user_id='$user_id',  spy_user_location='$user_location',  spy_comments=' Laptop  With ID $stock_id Was Edited' ");

														echo "<script>
															alert('Laptop Updated Successfully');
																window.location.replace(\"add_stock.php\");
														
														</script>"; 
						
					
						
						}else{
								
														echo "<script>
															alert('Invalid Price Entered Please Use Numbers Only eg 10000 ');
																window.location.replace(\"add_stock.php\");
														
														</script>"; 
						
											}
					
				}

				

?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'> EDIT LAPTOP IN STOCK</h1>
<br/>
<form method='post'>
     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		<div class="col m5 l5 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
			<div class="input-field col s12">
				<select required name='model'>
				  <option value='<?php echo $model_id; ?>' selected> <?php echo $model_name; ?> </option>
				  	<?php 
								$get_laptop_model = new run_query("select * from laptop_model  where model_id  !='$model_id' ");
								
							while(	$get_laptop_model_data =	$get_laptop_model->result() ){
							
								extract($get_laptop_model_data );
								echo "<option value='$model_id'> $model_name </option>";
									}	
						?>
				  
				</select>
				<label> <b> Set Model / Serial </b> </label>
			  </div>
			  
			  <div class="input-field col s12">
				<select name='screenSize' >
				   <option value='<?php echo $screen_id; ?>' selected> <?php echo $screen_size; ?> </option>
						<?php 
								$get_laptop_screen = new run_query("select * from laptop_screen where screen_id !='$screen_id'  ");
								
							while(	$get_laptop_screen_data =	$get_laptop_screen->result() ){
							
								extract($get_laptop_screen_data );
								echo "<option value='$screen_id'> $screen_size </option>";
									}	
						?>
						</select>
				
			  </div>
			
			<div class="row">
				<div class="input-field col s12">
				  <input id="email" type="text" required  name='serial' value='<?php if(isset($serial)){ echo $serial;}?>'>
				  <label for="email"><b>Serial/Imei No *: </b></label>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="input-field col s12">
				  <input id="email" type="text"   name='battSerial'  value='<?php if(isset($battSerial)){ echo $battSerial;}?>'>
				  <label for="email"><b>battery Serial : </b></label>
				</div>
			  </div>
			  
			  Is this Item For Sale? *
			   <p>
				  <input name="status" type="radio" id="yes" required value='3'  <?php if( $status=='3'){ echo "checked";}  ?> onclick="$('#price123').val(<?php echo $price; ?>); $('#price').show();" />
				  <label for="yes">Yes</label>
				  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <input name="status" type="radio" id="no"   required value='2'  <?php if( $status=='2'){ echo "checked";}  ?>  onclick="$('#price123').val(0); $('#price').hide();" />
				  <label for="no">No</label>
				</p>
	  
	  <div class="row" style='display:<?php if( $status=='2'){ echo "none";}  ?>;' id='price'>
				<div class="input-field col s12">
				  <input id="price123" type="text"  required name="price" value='<?php if(isset($price)){ echo $price;}?>'>
				  <label for="email"><b>SET PRICE: </b></label>
				</div>
			  </div>
			  
			  
			    
	  <div class="row" >
	  <br/><br/><br/><hr/>
				<div class=" col s6">
				 <input type="checkbox" id="test5" name='backlight' <?php if($backlight =='on'){ echo "checked";} ?> />
					<label for="test5">backLight</label>
				</div>

				<div class=" col s6">
				 <input type="checkbox" id="test6" name='touchscreen'  <?php if($touchscreen =='on'){ echo "checked";} ?> />
					<label for="test6"> Touch Screen</label>
				</div>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		
			<div class="col m5 l5 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fff8e1;'>
            <div class="card-content">
			
			 <div class="input-field col s12">
				<select required name='currentLocation'>
				   <option value='<?php echo $location_id; ?>' selected> <?php echo $location_name; ?> </option>
						<?php 
							
							 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where   location_id !='$location_id'  ";
								$get_locations = $connect ->query($sql_location);	
								while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){
					
							
								extract($get_locations_data );
								echo "<option value='$location_id'> $location_name </option>";
									}	
						?>
				  
				</select>
				<label> <b> Set Location / Processor </b></label>
			  </div>
			
			<div class="row">
				<div class="input-field col s12">
				  <select  name='processorType'>
				  <option value='<?php echo $processor_id; ?>' selected> <?php echo $processor_type; ?> </option>
					
						<?php 
								$get_laptop_screen = new run_query("select * from laptop_processor_type where processor_id !='$processor_id' ");
								
							while(	$get_laptop_screen_data =	$get_laptop_screen->result() ){
							
								extract($get_laptop_screen_data );
								echo "<option value='$processor_id'> $processor_type </option>";
									}	
						?>
						</select>
				</div>
			  </div>
			
			<div class="row">
				<div class="input-field col s12">
				   
				  <select  name='processorSpeed' required >
				   <option value='<?php echo $processorSpeed; ?>' selected> <?php echo $processorSpeed; ?> </option>
				
						<?php 
								$get_processorSpeed = new run_query("select * from processor_speed where pro_speed_name !='$processorSpeed' ");
								
							while(	$get_processorSpeed_data =	$get_processorSpeed->result() ){
							
								extract($get_processorSpeed_data );
								echo "<option value='$pro_speed_name'> $pro_speed_name </option>";
									}	
						?>
						</select>

				 <label for="email"><b>Processor Speed:</b></label>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="input-field col s12">
				  
				  <select  name='generation' required >
				  <option value='<?php echo $generation; ?>' selected> <?php echo $generation; ?> </option>
						<?php 
								$get_processor_generation = new run_query("select * from processor_generation  where pro_gen_name !='$generation' ");
								
							while(	$get_processor_generation_data =	$get_processor_generation->result() ){
							
								extract($get_processor_generation_data );
								echo "<option value='$pro_gen_name'> $pro_gen_name </option>";
									}	
						?>
						</select>
				  <label for="email"><b> Processor Generation: </b></label>
				</div>
			  </div>
			  
		   
			  
		    Does it Has Extra Hard Disk? 
			   <p>
			     &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a onclick=" $('#exthdd').show();" class='btn-flat green-text'> <i class='fa fa-thumbs-up'></i> Yes</a>
				  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a onclick=" $('#exthdd').hide();"  class='btn-flat red-text'> <i class='fa fa-thumbs-down'></i> No</a>
				
				</p>
			
	  <div class="row" style='display:none;' id='exthdd'>
				<div class="input-field col m6 s12">
				  <select   name="extraHDD">
				      <option value="" disabled <?php if( $extraHDD==''){ echo "selected";}  ?>  > EXTRA HDD SIZE: </option>
				
				    <option value="16GB " <?php if( $extraHDD=='16GB '){ echo "selected";}  ?>  >16GB</option>
				  <option value="32GB " <?php if( $extraHDD=='32GB '){ echo "selected";}  ?>  >32GB</option>
				    <option value="40GB " <?php if( $extraHDD=='40GB '){ echo "selected";}  ?>  >40GB</option>
	  		     <option value="60GB " <?php if( $extraHDD=='60GB '){ echo "selected";}  ?>  >60GB</option>
	  		      <option value="64GB " <?php if( $extraHDD=='64GB '){ echo "selected";}  ?>  >64GB</option>
	  		      <option value="80GB " <?php if( $extraHDD=='80GB '){ echo "selected";}  ?>  >80GB</option>
				  <option value="120GB " <?php if( $extraHDD=='120GB '){ echo "selected";}  ?>  >120GB</option>
				    <option value="128GB " <?php if( $extraHDD=='128GB '){ echo "selected";}  ?>  >128GB</option>
	  		     <option value="160GB " <?php if( $extraHDD=='160GB '){ echo "selected";}  ?>  >160GB</option>
	  		      <option value="180GB " <?php if( $extraHDD=='180GB '){ echo "selected";}  ?>  >180GB</option>
	  		      <option value="250GB " <?php if( $extraHDD=='250GB '){ echo "selected";}  ?>  >250GB</option>
				  <option value="256GB " <?php if( $extraHDD=='256GB '){ echo "selected";}  ?>  >256GB</option>
				    <option value="320GB " <?php if( $extraHDD=='320GB '){ echo "selected";}  ?>  >320GB</option>
	  		     <option value="500GB " <?php if( $extraHDD=='500GB '){ echo "selected";}  ?>  >500GB</option>
	  		     <option value="750GB " <?php if( $extraHDD=='750GB '){ echo "selected";}  ?>  >750GB</option>
			      <option value="1TB " <?php if( $extraHDD=='1TB '){ echo "selected";}  ?>  >1TB</option>
		   		 <option value="1.5TB " <?php if( $extraHDD=='1.5TB '){ echo "selected";}  ?>  >1.5TB</option>
	     		  <option value="2TB " <?php if( $extraHDD=='2TB '){ echo "selected";}  ?>  >2TB</option>
				   <option value="4TB " <?php if( $extraHDD=='4TB '){ echo "selected";}  ?>  >4TB</option>
				    <option value="6TB " <?php if( $extraHDD=='6TB '){ echo "selected";}  ?>  >6TB</option>
				 <option value="8TB " <?php if( $extraHDD=='8TB '){ echo "selected";}  ?>  >8TB</option>
				 <option value="12TB " <?php if( $extraHDD=='12TB '){ echo "selected";}  ?>  >12TB</option>
				 </select>
				  <label for="email"><b> EXTRA HDD SIZE: </b></label>
				</div>
				
				<div class="input-field col m6 s12">
				  <select name='extraHDDtype'>
				  
				  <option value="NONE"  <?php if( $extraHDDtype=='NONE'){ echo "selected";}  ?>  >SSD</option>
				 <option value="SSD"  <?php if( $extraHDDtype=='SSD'){ echo "selected";}  ?>  >SSD</option>
				  <option value="HDD"  <?php if( $extraHDDtype=='HDD'){ echo "selected";}  ?> >HDD</option>
				  <option value="FLASH"  <?php if( $extraHDDtype=='FLASH'){ echo "selected";}  ?>   >FLASH</option>
				    <option value=""  disabled <?php if( $extraHDDtype==''){ echo "  selected";}  ?>   >Extra HDD Type </option>
				
				</select>
				</div>
			  </div>
	  
			</div>
			</div>
		
		</div>
		
		<div class="col m1 l1 s0"></div>

	</div>

	
	     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
			<div class="col m5 l5 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#ffecb3;'>
            <div class="card-content">
			
			 <div class="input-field col s12">
				<select required  name='RAM'>
				 <option value="NO RAM" <?php if( $RAM=='NO RAM'){ echo "selected";}  ?>   >NO RAM</option>
				 <option value="512MB" <?php if( $RAM=='512MB'){ echo "selected";}  ?>   >512MB</option>
				  <option value="1GB" <?php if( $RAM=='1GB'){ echo "selected";}  ?>   >1GB</option>
				  <option value="2GB"   <?php if( $RAM=='2GB'){ echo "selected";}  ?>   >2GB </option>
	  		      <option value="3GB"   <?php if( $RAM=='3GB'){ echo "selected";}  ?>   >3GB </option>
			      <option value="4GB"   <?php if( $RAM=='4GB'){ echo "selected";}  ?>   >4GB </option>
		   		 <option value="5GB"    <?php if( $RAM=='5GB'){ echo "selected";}  ?>   >5GB </option>
	     		  <option value="6GB"    <?php if( $RAM=='6GB'){ echo "selected";}  ?>   >6GB </option>
				   <option value="8GB"    <?php if( $RAM=='8GB'){ echo "selected";}  ?>   >8GB </option>
				    <option value="12GB"   <?php if( $RAM=='12GB'){ echo "selected";}  ?>   >12GB </option>
				 <option value="16GB"   <?php if( $RAM=='16GB'){ echo "selected";}  ?>   >16GB </option>
				 <option value="32GB"    <?php if( $RAM=='32GB'){ echo "selected";}  ?>   >32GB </option>
				</select>
				<label> <b> Set Ram </b></label>
			  </div>
			  
			  <div class="input-field col s12">
				<select name='VRAM'>
				  <option value="No Idea" <?php if( $VRAM=='No Idea'){ echo "selected";}  ?>   >No Idea</option>
				  <option value="16MB" <?php if( $VRAM=='16MB'){ echo "selected";}  ?>   >16MB</option>
				  <option value="32MB" <?php if( $VRAM=='32MB'){ echo "selected";}  ?>   >32MB</option>
				  <option value="64MB"   <?php if( $VRAM=='64MB'){ echo "selected";}  ?>   >64MB </option>
	  		      <option value="128MB"   <?php if( $VRAM=='128MB'){ echo "selected";}  ?>   >128MB </option>
			      <option value="256MB"   <?php if( $VRAM=='256MB'){ echo "selected";}  ?>   >256MB </option>
				  <option value="512MB" <?php if( $VRAM=='512MB'){ echo "selected";}  ?>   >512MB</option>
				  <option value="1GB" <?php if( $VRAM=='1GB'){ echo "selected";}  ?>   >1GB</option>
				  <option value="2GB"   <?php if( $VRAM=='2GB'){ echo "selected";}  ?>   >2GB </option>
			      <option value="4GB"   <?php if( $VRAM=='4GB'){ echo "selected";}  ?>   >4GB </option>
	     		  <option value="6GB"    <?php if( $VRAM=='6GB'){ echo "selected";}  ?>   >6GB </option>
				  <option value="8GB"    <?php if( $VRAM=='8GB'){ echo "selected";}  ?>   >8GB </option>
				</select>
				<label> <b> Dedicated Video Ram </b></label>
			  </div>
			
			
		 	  <div class="row">
			
			  </div>
			  
			
	  
			</div>
			</div>
		
		</div>
		
			<div class="col m5 l5 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#b9f6ca;'>
            <div class="card-content">
			
			<div class="input-field col s12">
				<select name='HDDtype'>
				     <option value="NONE"  <?php if( $HDDtype=='NONE'){ echo "selected";}  ?> >NONE</option>
				 <option value="SSD"  <?php if( $HDDtype=='SSD'){ echo "selected";}  ?> >SSD</option>
				  <option value="HDD"  <?php if( $HDDtype=='HDD'){ echo "selected";}  ?> >HDD</option>
				  <option value="FLASH"    <?php if( $HDDtype=='FLASH'){ echo "selected";}  ?>>FLASH</option>
				</select>
				<label> <b>Set Hard Drive </b> </label>
			  </div>
			
			<div class="row">
				<div class="input-field col s12">
				  <select name='HDD'>
				      <option value="No Drive " <?php if( $HDD=='No Drive '){ echo "selected";}  ?>  >No Drive</option>
					 <option value="16GB " <?php if( $HDD=='16GB '){ echo "selected";}  ?>  >16GB</option>
				  <option value="32GB " <?php if( $HDD=='32GB '){ echo "selected";}  ?>  >32GB</option>
				    <option value="40GB " <?php if( $HDD=='40GB '){ echo "selected";}  ?>  >40GB</option>
	  		     <option value="60GB " <?php if( $HDD=='60GB '){ echo "selected";}  ?>  >60GB</option>
	  		      <option value="64GB " <?php if( $HDD=='64GB '){ echo "selected";}  ?>  >64GB</option>
	  		      <option value="80GB " <?php if( $HDD=='80GB '){ echo "selected";}  ?>  >80GB</option>
				  <option value="120GB " <?php if( $HDD=='120GB '){ echo "selected";}  ?>  >120GB</option>
				    <option value="128GB " <?php if( $HDD=='128GB '){ echo "selected";}  ?>  >128GB</option>
	  		     <option value="160GB " <?php if( $HDD=='160GB '){ echo "selected";}  ?>  >160GB</option>
	  		      <option value="180GB " <?php if( $HDD=='180GB '){ echo "selected";}  ?>  >180GB</option>
	  		      <option value="250GB " <?php if( $HDD=='250GB '){ echo "selected";}  ?>  >250GB</option>
				  <option value="256GB " <?php if( $HDD=='256GB '){ echo "selected";}  ?>  >256GB</option>
				    <option value="320GB " <?php if( $HDD=='320GB '){ echo "selected";}  ?>  >320GB</option>
	  		     <option value="500GB " <?php if( $HDD=='500GB '){ echo "selected";}  ?>  >500GB</option>
	  		     <option value="750GB " <?php if( $HDD=='750GB '){ echo "selected";}  ?>  >750GB</option>
			      <option value="1TB " <?php if( $HDD=='1TB '){ echo "selected";}  ?>  >1TB</option>
		   		 <option value="1.5TB " <?php if( $HDD=='1.5TB '){ echo "selected";}  ?>  >1.5TB</option>
	     		  <option value="2TB " <?php if( $HDD=='2TB '){ echo "selected";}  ?>  >2TB</option>
				   <option value="4TB " <?php if( $HDD=='4TB '){ echo "selected";}  ?>  >4TB</option>
				    <option value="6TB " <?php if( $HDD=='6TB '){ echo "selected";}  ?>  >6TB</option>
				 <option value="8TB " <?php if( $HDD=='8TB '){ echo "selected";}  ?>  >8TB</option>
				 <option value="12TB " <?php if( $HDD=='12TB '){ echo "selected";}  ?>  >12TB</option>
				 </select>
				  <label for="email"><b>Enter Hard Drive Size *: </b></label>
				</div>
			  </div>
			  
			
	  
	  <br/>
			</div>
			</div>
		
		</div>
		
		<div class="col m1 l1 s0"></div>

	</div>

	
	
	
	     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
			
			<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fffde7;'>
            <div class="card-content">
			<p><b>Issues/Comments</b></p>
		
	  
	  <div class="input-field col m5 l5 s12">
          <textarea id="textarea1" class="materialize-textarea" name='comments'  > <?php if(isset($comments)){ echo $comments;}?> </textarea>
          <label for="textarea1">Comments</label>
        </div>
		
			<div class="col m1 l1 s0"></div>
		<div class="input-field col m5 l5 s12">
          <textarea id="textarea1" class="materialize-textarea" name='issues' > <?php if(isset($issues)){ echo $issues;}?></textarea>
          <label for="textarea1">Issues</label>
        </div>
		
		<div class="row">
			
			  </div>
	  <br/>
			</div>
			</div>
		
		</div>
		
		<div class="col m1 l1 s0"></div>

	</div>
		<center>
   <button type='submit' class='btn deep-orange pulse' name='save_stock'>  UPDATE <i class='fa fa-edit'></i></button>
		</center>
</form>

   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>


</body>

</html>
















