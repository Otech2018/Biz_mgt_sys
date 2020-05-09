<?php     
require "../script/php/connect.php";
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

   <title> ALL USERS - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>	
   <div class="container">
   <h1 style='font-family:arial' align='center' class=' tada blue-text'> ALL USERS </h1>
<br/>

     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			<div class="col m2 l2 s0"></div>
			<form method='post'>
			<div class="input-field col m6 l6 s12">
				<select required name='user_location'>
				  <option value=""   >Choose Location *</option>
				    <option value="all"   selected >All Location </option>
				
				  <?php 
							
							 	$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where deleted='0' ";
								$get_locations = $connect ->query($sql_location);	
								while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){
					
								extract($get_locations_data );
								echo "<option value='$location_id'> $location_name </option>";
									}	
						?>
				</select>
				<label> <b> Select Location </b> </label>
			  </div>
			  
			  <div class="input-field col m4 l4 s12">
				<button type='submit' class='btn deep-orange pulse' name='view_user'>  VIEW <i class='fa fa-eye'></i></button>
		
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
							if( isset($_POST['view_user']) ){
								$user_location = addslashes(htmlentities($_POST['user_location']));
								 if( $user_location ==='all'){
								 $get_users = new run_query("select * from users ");
								
								 }else{
								  $get_users = new run_query("select * from users  where user_location='$user_location' and user_status='1'  ");
								
								 }
								if( $get_users->num_rows >= 1){		
								
								$no= 1;
										while(	$get_users_data =	$get_users->result() ){
										
											extract($get_users_data );
											
											$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$user_location'  ";
											$get_locations = $connect ->query($sql_location);	
											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
					
											extract($get_locations_data );
												
											if ( $user_status == 1 ){
												$user_status = "Active";
											}else{
											$user_status = "Not Active";
											}
											
											if ( $user_gender == 1 ){
												$user_gender = "MALE";
											}else{
											$user_gender = "FEMALE";
											}
											
												if ( $user_permission == 1 ){
												$user_permission = "ADMIN";
											}else 	if ( $user_permission == 2 ){
												$user_permission = "STORE KEEPER";
											}else{
											$user_permission = "SALES PERSON";
											
											}
													echo "			
													
															<ul class='collapsible popout ' data-collapsible='accordion'>
																			<li>
																			  <div class='collapsible-header deep-orange white-text'>$no |  $user_username  ($user_phone ) ($location_name) | ($user_permission)</div>
																			  <div class='collapsible-body'>
																			  
																	
																		<table class='bordered striped z-depth-3 ' >
																 	  
																			 <tr><td> USERNAME  :</td><td>  $user_username </td></tr>
																			<tr><td> FULL NAME:</td><td>  $user_fullname :</td></tr>
																			 <tr><td> PHONE :</td><td>  $user_phone </td></tr>
																			 <tr><td> GENDER :</td><td>  $user_gender </td></tr>
																			 <tr><td> PERMISSION :</td><td>  $user_permission </td></tr>
																			 <tr><td> EMAIL :</td><td>  $user_email </td></tr>
																			 <tr><td>ADDRESS : </td><td>  $user_address </td></tr>
																			<tr><td>CURRENT LOCATION: </td><td>  $location_name</td></tr>
																			 <tr><td>STATUS: </td><td>  $user_status </td></tr>
																			 <tr><td>DATE ADDED:</td><td>  $date </td></tr>
																		</table>
																			  
																			  <br/><br/><br/> <b>COMMENTS</b><hr/>
																			 $user_comment
																				<br/> <br/><br/> 
																				
																				<a  class='btn red pulse modal-trigger' href='#del$user_id' >  Delete <i class='fa fa-trash'></i></a>
	
														
													  <div id='del$user_id' class='modal'>
														<div class='modal-content'>
													
														  <h4>Are you Sure You Want To Delete  $user_username?</h4>
															<a href='#!' class='modal-action modal-close btn green'>No  <i class='fa fa-close'></i></a>
															<a  href='del_user.php?user_id=$user_id' class='btn red right'>  Yes <i class='fa fa-trash'></i></a>
																<br/>		 
														</div>
														
													  </div>
																			<a  href='edit_user.php?user_id=$user_id' class='btn blue pulse right'>  EDIT <i class='fa fa-edit'></i></a>
																		 
																			  </div>
																			</li>
																			
																		 </ul>
		
													
													
													";
													
													$no++;
														
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
















