<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "user";

require "../script/mlc/script_head.php";


	if( isset($_POST['user_add_btn']) ){
					$user_username = addslashes(htmlentities($_POST['user_username']));
					$user_fullname = addslashes(htmlentities($_POST['user_fullname']));
					$user_gender = addslashes(htmlentities($_POST['user_gender']));
					$user_password = md5(addslashes(htmlentities($_POST['user_password'])));
					$user_location = addslashes(htmlentities($_POST['user_location']));
					$user_email = addslashes(htmlentities($_POST['user_email']));
					$user_address = addslashes(htmlentities($_POST['user_address']));
					$user_permission = addslashes(htmlentities($_POST['user_permission']));
					$user_phone = addslashes(htmlentities($_POST['user_phone']));
					$user_comment = addslashes(htmlentities($_POST['user_comment']));
					$user_status = addslashes(htmlentities($_POST['user_status']));		
						$query_check  =new run_query("select * from users where user_username='$user_username' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Username Already Exist..Try Using A Different Username');
											window.location.replace(\"add_user.php\");
											
									</script>"; 
						}else{
								
											$query_check_phone  =new run_query("select * from users where user_phone='$user_phone' ");
											if( $query_check_phone->num_rows >= 1){
													  echo "<script>
																alert('Phone Number Already Exist..Try Using A Different Phone Number');
																window.location.replace(\"add_user.php\");
																
														</script>"; 
											}else{
											
											$query_run  =new run_query("insert into users set date='$reg_Date' , user_status ='$user_status ', user_comment ='$user_comment ', user_username='$user_username',user_fullname='$user_fullname',user_gender='$user_gender',user_password='$user_password',user_location='$user_location',user_email='$user_email',user_address='$user_address',user_permission='$user_permission',user_phone='$user_phone' ");
												 
												  echo "<script>
																alert('User Added Successfully');
																window.location.replace(\"add_user.php\");
																
														</script>"; 
											
											}
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

   <title> REGISTER USER - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'> REGISTER USER</h1>
<br/>
<form method='post'>
     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		
			<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fff8e1;'>
            <div class="card-content">
			
			
			  <div class="input-field col m6 l6 s12">
				<select required name='user_location'>
				  <option value=""  selected >Choose Location *</option>
				  <?php 
								 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where deleted='0' ";
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
				  <input id="email" type="text" required  name='user_username'>
				  <label for="email"><b>Username *: </b></label>
				</div>
			
			<div class="row">
				<div class="input-field col s12">
				  <input id="email" type="text" required name='user_fullname'>
				  <label for="email"><b>Full Name *:</b></label>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="input-field col s12">
				  <input id="email" type="text" required name='user_address'>
				  <label for="email"><b>Address *:</b></label>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="input-field col s12">
				  <input id="email" type="email" name='user_email'>
				  <label for="email"><b> Email: </b></label>
				</div>
			  </div>
			  
			
			 <div class="input-field col m6 l6 s12">
				<select name='user_gender'>
				  <option value=""  selected required >Choose Gender *</option>
				  <option value="1">MALE</option>
				  <option value="2">FEMALE</option>
				</select>
				<label> <b> GENDER </b></label>
			  </div>
			
			
				<div class="input-field col m6 l6 s12">
				  <input id="email" type="text" required name='user_phone'>
				  <label for="email"><b>Phone *: </b></label>
				</div>
				
				
				 <div class="input-field col m6 l6 s12">
				<select required name='user_permission'>
				  <option value="" disabled selected>Choose Permission *</option>
				  <option value="1">ADMIN</option>
				  <option value="2">STORE KEEPER</option>
				  <option value="3">SALES PERSON</option>
				</select>
				<label> <b> PERMISSION </b></label>
			  </div>
			
			
				<div class="input-field col m6  s12">
				  <input id="email" type="password" required name='user_password'>
				  <label for="email"><b>PASSWORD *: </b></label>
				</div>
				
			
			
				<div class="input-field col m8  l8 s12">
				  <input id="email" type="text"  name='user_comment'>
				  <label for="email"><b>Comment:</b></label>
				</div>
				
				<div class="input-field col m4 l4 s12">
				  <select name='user_status'>
				  <option value=""  selected required >User Status *</option>
				  <option value="1">ACTIVE</option>
				  <option value="2">NOT ACTIVE</option>
				</select>
				
				</div>
							
				<center>
   <button type='submit' class='btn deep-orange pulse' name='user_add_btn'>  ADD <i class='fa fa-plus'></i></button>
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
















