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

   <title> ADD STOCK - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_stock.php";


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
			if( is_numeric($price) ){
					$add_stock = "Insert into stock set  
					dateRecorded='$reg_Date',  
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
					issues='$issues',
					comments='$comments', 
					touchscreen='$touchscreen',
					backlight='$backlight',
					generation='$generation' ";
					
								$check_lap_serail  =new run_query("select * from stock where serial='$serial' ");
						if( $check_lap_serail->num_rows >= 1){
						
							
									echo "<div align='center' style='position:fixed; top:100px; left:35%; z-index:9; width:400px !important; padding:20px;' class='orange white-text'  id='pm'>
									<b>  Laptop Serial Number/IMEI Already Exists!  Do You Still Want To Register?  </b><hr/>
									<h1 align='center'>
									<form method='post'><button type='submit' name='no' class='btn red' >NO</button> &nbsp;&nbsp;&nbsp;<button type='submit' name='yes' class='btn green' >YES</button></form>
									</h1></div>
									
									<div style='position:absolute; top:0px; left:0px; z-index:8;  width:100%;height:200%; background-color:black;' id='bg'></div>"; 
									
								
						}else{
								$reg_stk  =new run_query($add_stock);
														echo "<script>
															alert('Laptop Registered Successfully');
																window.location.replace(\"add_stock.php\");
														
														</script>"; 
						
						}
						
						}else{
								
														echo "<script>
															alert('Invalid Price Entered Please Use Numbers Only eg 10000 ');
																window.location.replace(\"add_stock.php\");
														
														</script>"; 
						
						}
					
				}

				
								if( isset($_POST['yes']) ){
	
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
					
						if( is_numeric($price) ){
								$add_stock = "Insert into stock set  
										dateRecorded='$reg_Date',  
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
										issues='$issues',
										comments='$comments', 
										touchscreen='$touchscreen',
										backlight='$backlight',
										generation='$generation' ";
								
								$reg_stk  =new run_query($add_stock);
														echo "<script>
															alert('Laptop Registered Successfully');
																window.location.replace(\"add_stock.php\");
														
														</script>"; 
									
									
									}else{
								
														echo "<script>
															alert('Invalid Price Entered Please Use Numbers Only eg 10000 ');
																window.location.replace(\"add_stock.php\");
														
														</script>"; 
						
											}
									}
									
									
									if( isset($_POST['no']) ){
	
								
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
					
								
									
									}


?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'> ADD A LAPTOP TO STOCK</h1>
<br/>
<form method='post'>
     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		<div class="col m5 l5 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
			<div class="input-field col s12">
				<select required name='model'>
				  <option value="" disabled selected>Choose Model *</option>
				  	<?php 
								$get_laptop_model = new run_query("select * from laptop_model ");
								
							while(	$get_laptop_model_data =	$get_laptop_model->result() ){
							
								extract($get_laptop_model_data );
								echo "<option value='$model_id'> $model_name </option>";
									}	
						?>
				  
				</select>
				<label> <b> Set Model / Serial </b> </label>
			  </div>
			  
			  <div class="input-field col s12">
				<select name='screenSize' required >
				  <option value="" disabled selected>Select Screen Size * </option>
						<?php 
								$get_laptop_screen = new run_query("select * from laptop_screen ");
								
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
				  <input name="status" type="radio" id="yes" required value='3'  onclick="$('#price123').val(''); $('#price').show();" />
				  <label for="yes">Yes</label>
				  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <input name="status" type="radio" id="no"   required value='2' onclick=" $('#price123').val('0');  $('#price').hide();" />
				  <label for="no">No</label>
				</p>
	  
	  <div class="row" style='display:none;' id='price'>
				<div class="input-field col s12">
				  <input id="price123" type="text"  name="price" required >
				  <label for="email"><b>SET PRICE: </b></label>
				</div>
			  </div>
			  
			  
			  
	  <div class="row" >
	  <br/><br/><br/><hr/>
				<div class=" col s6">
				 <input type="checkbox" id="test5" name='backlight' />
					<label for="test5">backLight</label>
				</div>

				<div class=" col s6">
				 <input type="checkbox" id="test6" name='touchscreen'  />
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
				  <option value="" disabled selected>Choose Location *</option>
				  	<?php 
							 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where deleted='0' ";
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
				  <select  name='processorType' required >
				  <option value="" disabled selected>Processor Type * </option>
						<?php 
								$get_laptop_screen = new run_query("select * from laptop_processor_type ");
								
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
				  <option value="" disabled selected>Select Processor Speed * </option>
						<?php 
								$get_processorSpeed = new run_query("select * from processor_speed ");
								
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
				  <option value="" disabled selected>Select Processor Generation * </option>
						<?php 
								$get_processor_generation = new run_query("select * from processor_generation ");
								
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
				  <select  name="extraHDD" >
				 
				    <option value="" disabled selected> EXTRA HDD SIZE: </option>
				 <option value="No Drive">No drive</option>
				  <option value="16GB">16GB</option>
				  <option value="32GB">32GB</option>
				    <option value="40GB">40GB</option>
				    <option value="60GB">60GB</option>
				  <option value="64GB">64GB</option>
				    <option value="80GB">80GB</option>
				  <option value="120GB">120GB</option>
				  <option value="128GB">128GB</option>
				   <option value="160GB">160GB</option>
				  <option value="250GB">250GB</option>
				    <option value="256GB">256GB</option>
	  		     <option value="320GB">320GB</option>
	  		      <option value="500GB">500GB</option>
			      <option value="1TB">1TB</option>
	     		  <option value="2TB">2TB</option>
				   <option value="4TB">4TB</option>
				    <option value="6TB">6TB</option>
				 <option value="8TB">8TB</option>
				 <option value="12TB">12TB</option>
				   	</select>
				   	</select>
					
				</div>
				
				<div class="input-field col m6 s12">
				  <select name='extraHDDtype'>
				  <option value="" disabled selected>Extra HDD Type</option>
				  <option value="NONE">NONE</option>
				  <option value="SSD">SSD</option>
				  <option value="HDD">HDD</option>
				  <option value="FLASH">FLASH</option>
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
				  <option value="" disabled selected>Select Ram Size *</option>
				  <option value="NO RAM">NO RAM</option>
				  <option value="512MB">512MB</option>
				  <option value="1GB">1GB</option>
				  <option value="2GB">2GB </option>
	  		      <option value="3GB">3GB </option>
			      <option value="4GB">4GB </option>
		   		 <option value="5GB">5GB </option>
	     		  <option value="6GB">6GB</option>
				   <option value="8GB">8GB </option>
				    <option value="12GB">12GB</option>
				 <option value="16GB">16GB </option>
				 <option value="32GB">32GB </option>
				</select>
				<label> <b> Set Ram </b></label>
			  </div>
			  
			  <div class="input-field col s12">
				<select name='VRAM'>
				  <option value="" disabled selected>Dedicated Video Ram </option>
				   <option value="No Idea">No Idea</option>
				  <option value="16MB">16MB</option>
				  <option value="32MB">32MB</option>
				  <option value="64MB">64MB</option>
				  <option value="128MB">128MB</option>
				  <option value="256MB">256MB</option>
				  <option value="512MB">512MB</option>
				  <option value="1GB">1GB</option>
				  <option value="2GB">2GB </option>
			      <option value="4GB">4GB </option>
	     		  <option value="6GB">6GB</option>
				   <option value="8GB">8GB </option>
				   	</select>
				<label> </label>
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
				  <option value="" disabled selected>Select Hard Drive Type</option>
				  <option value="NONE">NONE</option>
				  <option value="SSD">SSD</option>
				  <option value="HDD">HDD</option>
				  <option value="FLASH">FLASH</option>
				</select>
				<label> <b>Set Hard Drive </b> </label>
			  </div>
			
			<div class="row">
				<div class="input-field col s12">
			 <select required  name='HDD'>
				  <option value="" disabled selected> Select Hard Disk Size* </option>
				  <option value="No Drive">No drive</option>
				  <option value="16GB">16GB</option>
				  <option value="32GB">32GB</option>
				    <option value="40GB">40GB</option>
				    <option value="60GB">60GB</option>
				  <option value="64GB">64GB</option>
				    <option value="80GB">80GB</option>
				  <option value="120GB">120GB</option>
				  <option value="128GB">128GB</option>
				   <option value="160GB">160GB</option>
				  <option value="250GB">250GB</option>
				    <option value="256GB">256GB</option>
	  		     <option value="320GB">320GB</option>
	  		      <option value="500GB">500GB</option>
			      <option value="1TB">1TB</option>
	     		  <option value="2TB">2TB</option>
				   <option value="4TB">4TB</option>
				    <option value="6TB">6TB</option>
				 <option value="8TB">8TB</option>
				 <option value="12TB">12TB</option>
				   	</select>
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
   <button type='submit' class='btn deep-orange pulse' name='save_stock'>  ADD <i class='fa fa-plus'></i></button>
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
















