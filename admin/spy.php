<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

<?php     


$active= "admin_home";

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

   <title> SPY USERS - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>	
   <div class="container">
   <h1 style='font-family:arial' align='center' class=' tada blue-text'> <i class='fa fa-eye'></i>SPY USERS  </h1>
<br/>

     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		<div class="col m10 l10 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			<form method='post'>
			<div class="input-field col m3 l3 s12">
				<select required name='action_location'>
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
			  
					 <div class="input-field col m3 l3 s12">
			  FROM (DATE)
				<input type="date" required name='start_date'>
			 </div>
			  
			  
			   <div class="input-field col m3 l3 s12">
			  TO (DATE)
				<input type="date" required name='end_date'>
			 </div>
			 
			 
			  <div class="input-field col m3 l3 s12">
				<button type='submit' class='btn deep-orange pulse' name='view_spy'>  VIEW <i class='fa fa-eye'></i></button>
		
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
	
	
		
		
			<div class="col m12 l12 s12">
				<table class='bordered striped z-depth-3 orange'  id='spy'  >
					<thead>
						<tr>
							<th>S/N</th>
							<th>DATE</th>
							<th>USERNAME</th>
								<th>COMMENTS</th>
						<th>LOCATION</th>
						</tr>
					
					</thead>
					
					<tbody>
				
				<?php
							if( isset($_POST['view_spy']) ){
								$action_location = addslashes(htmlentities($_POST['action_location']));
								 $start_date = addslashes(htmlentities($_POST['start_date']));
								$end_date = addslashes(htmlentities($_POST['end_date']));
								if( $action_location ==='all'){
								 $get_spy = new run_query("select * from spy where spy_date between '$start_date' and  '$end_date'  order by spy_id desc");
								
								 }else{
								  $get_spy = new run_query("select * from stock  where spy_user_location='$action_location' and spy_date between '$start_date' and  '$end_date'   order by spy_id desc ");
								
								 }
								if( $get_spy->num_rows >= 1){	
								$no =1;								
										while(	$get_spy_data =	$get_spy->result() ){
										
											extract($get_spy_data );
											
											
											$sql_location = "select * from oyemart_ospos10.ospos_stock_locations where location_id= '$spy_user_location'  ";
											$get_locations = $connect ->query($sql_location);	
											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
					
											extract($get_locations_data );
											
											$get_user = new run_query("select * from users where user_id= '$spy_user_id' ");
											$get_user_data =	$get_user->result();
											extract($get_user_data );
											
												
											
											
											
											
													echo "			
																	<tr>
																		<td>$no</td>
																		<td>$spy_date</td>
																		<td>$user_username </td>
																			<td>$spy_comments</td>
																	
																		<td>$location_name </td>
																	</tr>
															
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
							</tbody>
						</table>
														
			</div>
		
		
	</div>

	
</form>

   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>



<script>
    $(document).ready(function() {
    var table = $('#spy').DataTable( {
        responsive: false,
         "pageLength": 10,
      
      
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );

</script>

</body>

</html>
















