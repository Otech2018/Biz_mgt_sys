<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

	
<?php     


$active= "location";

require "../script/mlc/script_head.php";

				if( isset($_POST['add_cookie']) ){
				 $cookie_name = addslashes(htmlentities($_POST['cookie_name']));
				$cookie_time = addslashes(htmlentities($_POST['cookie_time']));
					
						$query_check  =new run_query("select * from authorize where cookie_name='$cookie_name' ");
						if( $query_check->num_rows >= 1){
								  echo "<script>
											alert('Cookie Name  Already Exist..Try Using A Different Name  ');
											window.location.replace(\"auth.php\");
											
									</script>"; 
						}else{
						
						$query_run  =new run_query("insert into authorize set cookie_name='$cookie_name', cookie_time='$cookie_time' ");
							 
							  echo "<script>
											alert('Cookie Add Successfully');
											window.location.replace(\"auth.php\");
											
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

   <title> COOKIE  - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>		
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-gift'></i>   COOKIE </h1>
<br/>

     <div class="row">
	
	
		<div class="col m12 l12 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
			  
			 <form method='post'>
			  
			
				
			  <div class="input-field col m12 l12 s12">
				  <input id="email" type="text" required  name='cookie_name'>
				  <label for="email">   Enter Cookie Name </label>
				</div>
			  
			    <div class="input-field col m12 l12 s12">
				  <input id="email" type="text" required  name='cookie_time'>
				  <label for="email">  Enter Cookie Time </label>
				</div>
				
			    <div class="input-field col m12 l12 s12">
				<center>
				<button type='submit' class='btn deep-orange pulse' name='add_cookie'>  <i class='fa fa-plus'></i> </button>
				</center>
			  </div>
			</form>
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		

	</div>

	
   
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
				 	 <table class="table bordered striped z-depth-3 " id='location'  width='100%' >
						  <thead>
						 <tr>
								<th>ID</th>
								<th>COOKIE NAME</th>
								<th>COOKIE TIME</th>
								
						 </tr>
						</thead>
						<tbody>
						
							<?php 
								$get_authorize = new run_query("select * from authorize ");
								
							while(	$get_authorize_data =	$get_authorize->result() ){
							
								extract($get_authorize_data );
								echo "
									<tr>
										<td> $cookie_id </td>
										<td> $cookie_name </td>
										<td> $cookie_time  </td>
									
									</tr>
								
								";
								
									
					}
								?>
						
						</tbody>
					 </table>
					
			</div>
		
		<div class="col m1 l1 s0"></div>

	</div>

	

   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>

<script>
    $(document).ready(function() {
    var table = $('#location').DataTable( {
        responsive: true,
         "pageLength": 10,
      
      
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );

</script>
</body>

</html>
















