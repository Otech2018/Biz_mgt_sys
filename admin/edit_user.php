<?php     
require "../script/php/connect.php";
					
	if( isset($_POST['user_add_btn']) ){
					$user_username = addslashes(htmlentities($_POST['user_username']));
					$user_fullname = addslashes(htmlentities($_POST['user_fullname']));
					$user_location = addslashes(htmlentities($_POST['user_location']));
					$user_email = addslashes(htmlentities($_POST['user_email']));
					$user_address = addslashes(htmlentities($_POST['user_address']));
					$user_permission = addslashes(htmlentities($_POST['user_permission']));
					$user_phone = addslashes(htmlentities($_POST['user_phone']));
					$user_comment = addslashes(htmlentities($_POST['user_comment']));
					$user_status = addslashes(htmlentities($_POST['user_status']));		
					$user_id = addslashes(htmlentities($_POST['user_id']));		
					
						$query_check  =new run_query("select * from users where user_username='$user_username' and user_id !='$user_id' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Username Already Exist..Try Using A Different Username');
											window.location.replace(\"edit_user.php\");
											
									</script>"; 
						}else{
								
											$query_check_phone  =new run_query("select * from users where user_phone='$user_phone'  and user_id !='$user_id' ");
											if( $query_check_phone->num_rows >= 1){
													  echo "<script>
																alert('Phone Number Already Exist..Try Using A Different Phone Number');
																window.location.replace(\"edit_user.php\");
																
														</script>"; 
											}else{
											
											$query_run  =new run_query("update users set  user_status ='$user_status ', user_comment ='$user_comment ', user_username='$user_username',user_fullname='$user_fullname',user_location='$user_location',user_email='$user_email',user_address='$user_address',user_permission='$user_permission',user_phone='$user_phone'  where user_id='$user_id' ");
										$spy  =new run_query("Insert Into spy set spy_date='$reg_Date',  spy_user_id='$user_id',  spy_user_location='$user_location',  spy_comments=' User  With ID $user_id Was Edited' ");
											  echo "<script>
																alert('User Updated Successfully');
																window.location.replace(\"edit_user.php\");
																
														</script>"; 
											
											}
								}

				}
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "user";

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

   <title> EDIT USER - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";

				

								if(isset($_GET['user_id']))  {
								
								 $user_id = addslashes(htmlentities($_GET['user_id'])) ;
								$get_user = new run_query("select * from users  where user_id='$user_id' ");
													if( $get_user->num_rows >= 1){		
														$get_user_data =	$get_user->result();
														
															extract($get_user_data );
															
															
															 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id='$user_location'  ";
																$get_locations = $connect ->query($sql_location);	
																$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
					
															extract($get_locations_data );	
													}else{
														
														 echo "<script>
																	window.location.replace(\"search_user.php\");
																													
																</script>"; 
														
														}

															}else{
														
														 echo "<script>
																	window.location.replace(\"search_user.php\");
																													
																</script>"; 
														
														}
								
			
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'> <i class='fa fa-edit'></i> USER</h1>
<br/>
<form method='post'>
     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		
			<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fff8e1;'>
            <div class="card-content">
			
			
			  <div class="input-field col m6 l6 s12">
				<select required name='user_location'>
				  <?php 
				  echo "<option value='$location_id' selected> $location_name </option>";
								
							 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where  location_id !='$user_location'  ";
								$get_locations = $connect ->query($sql_location);	
								while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){
					
							
								extract($get_locations_data );
								echo "<option value='$location_id'> $location_name </option>";
									}	
									
						?>
				</select>
				<label> <b> LOCATION </b></label>
			  </div>
			
			
				<div class="input-field col m6 l6 s12">
				  <input id="email" type="text" required readonly  name='user_username' value='<?php echo $user_username; ?>' >
				  <label for="email"><b>Username *: </b></label>
				</div>
			
			<div class="row">
				<div class="input-field col s12">
				  <input id="email" type="text" required name='user_fullname'   value='<?php echo $user_fullname; ?>'  >
				  <label for="email"><b>Full Name *:</b></label>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="input-field col s12">
				  <input id="email" type="text" required name='user_address'   value='<?php echo $user_address; ?>' >
				  <label for="email"><b>Address *:</b></label>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="input-field col s12">
				  <input id="email" type="email" name='user_email'   value='<?php echo $user_email; ?>' >
				  <label for="email"><b> Email: </b></label>
				</div>
			  </div>
			  
			
			
			
				<div class="input-field col m4 l4 s12">
				  <input id="email" type="text" required name='user_phone'   value='<?php echo $user_phone; ?>' >
				  <label for="email"><b>Phone *: </b></label>
				</div>
				
				
				 <div class="input-field col m4 l4 s12">
				<select required name='user_permission'>
				  <option value="1"   <?php if($user_permission == 1){ echo "selected"; } ?>>ADMIN</option>
				  <option value="2"   <?php if($user_permission == 2){ echo "selected"; } ?>>STORE KEEPER</option>
				  <option value="3"   <?php if($user_permission == 3){ echo "selected"; } ?>>SALES PERSON</option>
				</select>
				<label> <b> PERMISSION </b></label>
			  </div>
			
			<div class="input-field col m4 l4 s12">
				 <select name='user_status'>
				  <option value="1"  <?php if($user_status == 1){ echo "selected"; } ?> >ACTIVE</option>
				  <option value="2"   <?php if($user_status == 2){ echo "selected"; } ?> >NOT ACTIVE</option>
				</select>
				<label> <b> USER STATUS  </b></label>
			</div>
			
			
				<div class="input-field col m12  l12 s12">
				  <input id="email" type="text"  name='user_comment'    value='<?php echo $user_comment; ?>' >
				  
				    <input type="hidden"  name='user_id'    value='<?php echo $user_id; ?>' >
				
				  <label for="email"><b>Comment:</b></label>
				</div>
				
							
				<center>
   <button type='submit' class='btn deep-orange pulse' name='user_add_btn'>  UPDATE <i class='fa fa-edit'></i></button>
		</center>
		
		
				 <div class="row">
			  </div>
	  
			</div>
			</div>
		
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
















