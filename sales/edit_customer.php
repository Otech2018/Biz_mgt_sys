<?php     
require "../script/php/connect.php";

					if(isset($_GET['customer_id']))  {
								
								 $customer_id = addslashes(htmlentities($_GET['customer_id'])) ;
								$get_customer = new run_query("select * from customers  where customer_id='$customer_id' ");
															
														$get_customer_data =	$get_customer->result();
														
															extract($get_customer_data );
															
																}else{
														
														 echo "<script>
																		window.location.replace(\"index.php\");
																													
																</script>"; 
														
														}
														
														
														
														
						

?>

<!doctype html>

<html>
	<head>

<?php     


$active= "customer";

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

   <title> EDIT CUSTOMER - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_sales.php";



														
						

	if( isset($_POST['reg_cus']) ){
		
	
					$customer_name = addslashes(htmlentities($_POST['customer_name']));
					$customer_address = addslashes(htmlentities($_POST['customer_address']));
					$customer_phone = addslashes(htmlentities($_POST['customer_phone']));
					$customer_email = addslashes(htmlentities($_POST['customer_email']));
					$customer_permission = addslashes(htmlentities($_POST['customer_permission']));
					
						$_SESSION['customer_name'] = $customer_name;
						$_SESSION['customer_address'] = $customer_address;
						$_SESSION['customer_phone'] = $customer_phone;
						$_SESSION['customer_email'] = $customer_email;
						$_SESSION['customer_permission'] = $customer_permission;
						
					
						$reg_customer = "update customers set  customer_name='$customer_name',  customer_address='$customer_address',  customer_phone='$customer_phone',  customer_email='$customer_email',  customer_Reg_date='$reg_Date',  customer_permission='$customer_permission' where customer_id ='$customer_id' ";
										
										
								
					$query_name  =new run_query("select * from customers where customer_phone='$customer_phone'  and customer_id !='$customer_id' ");
						if( $query_name->num_rows >= 1){
						
							
									echo "<div align='center' style='position:fixed; top:100px; left:35%; z-index:9; width:400px !important; padding:20px;' class='orange white-text'  id='pm'>
									Customer  Phone Already Exists!  Do You Still Want To Update?  <hr/>
									<h1 align='center'>
									<form method='post'><button type='submit' name='no' class='btn red' >NO</button> &nbsp;&nbsp;&nbsp;<button type='submit' name='yes' class='btn green' >YES</button></form>
									</h1></div>
									
									<div style='position:absolute; top:0px; left:0px; z-index:8;  width:100%;height:200%; background-color:black;' id='bg'></div>"; 
									
								
						}else{
						
								$query_address  =new run_query("select * from customers where customer_email='$customer_email' and customer_id !='$customer_id' ");
								if( $query_address->num_rows >= 1){
									
										echo "<div align='center' style='position:fixed; top:100px; left:35%; z-index:9; width:400px !important; padding:20px;' class='orange white-text'  id='pm'>
									Customer  Email Already Exists!  Do You Still Want To Update?  <hr/>
									<h1 align='center'>
									<form method='post'><button type='submit' name='no' class='btn red' >NO</button> &nbsp;&nbsp;&nbsp;<button type='submit' name='yes' class='btn green' >YES</button></form>
									</h1></div>
									
									<div style='position:absolute; top:0px; left:0px; z-index:8;  width:100%;height:200%; background-color:black;' id='bg'></div>"; 
								
								}else{
									
										$query_email  =new run_query("select * from customers where customer_address='$customer_address'  and customer_id !='$customer_id'");
										if( $query_email->num_rows >= 1){
											
											echo "<div align='center' style='position:fixed; top:100px; left:35%; z-index:9; width:400px !important; padding:20px;' class='orange white-text'  id='pm'>
									Customer  Address Already Exists!  Do You Still Want To Update?  <hr/>
									<h1 align='center'>
									<form method='post'><button type='submit' name='no' class='btn red' >NO</button> &nbsp;&nbsp;&nbsp;<button type='submit' name='yes' class='btn green' >YES</button></form>
									</h1></div>
									
									<div style='position:absolute; top:0px; left:0px; z-index:8;  width:100%;height:200%; background-color:black;' id='bg'></div>"; 
										
										}else{
											$customer_phone  =new run_query("select * from customers where customer_name='$customer_name' and customer_id !='$customer_id' ");
												if( $customer_phone->num_rows >= 1){
													
													echo "<div align='center' style='position:fixed; top:100px; left:35%; z-index:9; width:400px !important; padding:20px;' class='orange white-text'  id='pm'>
									Customer  Name Already Exists!  Do You Still Want To Update?  <hr/>
									<h1 align='center'>
									<form method='post'><button type='submit' name='no' class='btn red' >NO</button> &nbsp;&nbsp;&nbsp;<button type='submit' name='yes' class='btn green' >YES</button></form>
									</h1></div>
									
									<div style='position:absolute; top:0px; left:0px; z-index:8;  width:100%;height:200%; background-color:black;' id='bg'></div>"; 
												
												}else{
													$reg_cus  =new run_query($reg_customer);
													$spy  =new run_query("Insert Into spy set spy_date='$reg_Date',  spy_user_id='$user_id',  spy_user_location='$user_location',  spy_comments=' Customer   With ID $customer_id Was Edited' ");

														echo "<script>
																	alert('Customer Details Updated Successfully');
																	window.location.replace(\"add_customer.php\");
														</script>"; 
												}
										}
								}
						
						}
			}
		

		
			if( isset($_POST['yes']) ){
	
								$customer_name = $_SESSION['customer_name'] ;
								$customer_address = $_SESSION['customer_address'] ;
								$customer_phone = $_SESSION['customer_phone'] ;
								$customer_email = $_SESSION['customer_email'] ;
								$customer_permission =$_SESSION['customer_permission'] ;
								
									$reg_customer = "Update customers set  customer_name='$customer_name',  customer_address='$customer_address',  customer_phone='$customer_phone',  customer_email='$customer_email',  customer_Reg_date='$reg_Date',  customer_permission='$customer_permission' where customer_id ='$customer_id' ";
										$reg_cus  =new run_query($reg_customer);
										$spy  =new run_query("Insert Into spy set spy_date='$reg_Date',  spy_user_id='$user_id',  spy_user_location='$user_location',  spy_comments=' Customer   With ID $customer_id Was Edited' ");
							
									echo "<script>
												alert('Customer Details Updated Successfully');
											window.location.replace(\"add_customer.php\");	
											
										</script>";
									
									}
									
									
									if( isset($_POST['no']) ){
	
								$customer_name = $_SESSION['customer_name'] ;
								$customer_address = $_SESSION['customer_address'] ;
								$customer_phone = $_SESSION['customer_phone'] ;
								$customer_email = $_SESSION['customer_email'] ;
								$customer_permission =$_SESSION['customer_permission'] ;
								
									
									}

	
?>	
   <div class="container">
   <h1 align='center' class=' tada blue-text'> EDIT CUSTOMER</h1>
<br/>
<form method='post'>
     <div class="row">
	
	
		<div class="col m1 l1 s0"></div>
		
		
										<div class="col m10 l10 s12">
									<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fff8e1;'>
									<div class="card-content">
									
									
									 
									
									<div class="row">
										<div class="input-field col s12">
										  <input id="email" type="text" required name='customer_name' value='<?php if(isset($customer_name)){ echo $customer_name;}?>'>
										  <label for="email"><b>Full Name:</b></label>
										</div>
									  </div>
									  
									  <div class="row">
										<div class="input-field col s12">
										  <input id="email" type="text" required name='customer_address' value='<?php if(isset($customer_address)){ echo $customer_address;}?>'>
										  <label for="email"><b>Address:</b></label>
										</div>
									  </div>
									  
									  <div class="row">
										<div class="input-field col s12">
										  <input id="email" type="email" name='customer_email' value='<?php if(isset($customer_email)){ echo $customer_email;}?>'>
										  <label for="email"><b> Email: </b></label>
										</div>
									  </div>
									  
									  
										<div class="row">
										<div class="input-field col s8 m8">
										  <input id="email" type="text" required name='customer_phone' value='<?php if(isset($customer_phone)){ echo $customer_phone;}?>'>
										  <label for="email"><b> Phone: </b></label>
										</div>
										
										<div class="input-field col s4 m4">
										  <select required name='customer_permission'>
										  <option value="" disabled selected>Choose Permission *</option>
										  <option value="1" <?php if( $customer_permission =='1' ){echo "selected"; }?> >CREDIT WORTHY</option>
										  <option value="2" <?php if( $customer_permission =='2' ){echo "selected"; }?> >NO CREDIT</option>
										</select>
										<label> <b> PERMISSION </b></label>
										</div>
									  </div>
									
									
										<center>
						   <button type='submit' class='btn deep-orange pulse' name='reg_cus'>  UPDATE  <i class='fa fa-edit'></i></button>
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
















