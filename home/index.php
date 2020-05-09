<?php     
require "../script/php/connect.php";


		if( isset($_POST['btn_login']) ){
					$user_username = addslashes(htmlentities($_POST['user_username']));
					$user_password = md5(addslashes(htmlentities($_POST['user_password'])));

					$query = "SELECT * from users WHERE user_username ='$user_username' AND user_password ='$user_password' ";

					$query_run  =new run_query($query);
					if( $query_run->num_rows >= 1){ 
								$data =	$query_run->result() ;
									extract($data );
						
								if($user_status == 1 ){
								$_SESSION['user_id'] = $user_id;
								 
								 
								 if( $user_permission=='1' ){
									  echo "<script>
										window.location.replace(\"../admin/admin_home.php\");
																													
									</script>"; 
											
									 
								 }else  if( $user_permission=='2' ){
									  echo "<script>
										window.location.replace(\"../stock/stock_home.php\");
																													
									</script>"; 
											
									 
								 }else  if( $user_permission=='3' ){
									  echo "<script>
										window.location.replace(\"../sales/sales_home.php\");
																													
									</script>"; 
											
									 
								 }
								
							  
						 }else {
						 
						 echo "<script>
										alert(' Account Blocked Please Contact the Administrator ');
										window.location.replace(\"index.php\");
																													
									</script>"; 
						 
						 
						 }
								
							}else{
							
							echo "<script>
										alert(' Invalid Username Or Password ');
										window.location.replace(\"index.php\");
																													
									</script>"; 
							
							}
							
							
			}
?>

<!doctype html>

<html>
	<head>

<?php     
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

   <title>  LOGIN - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body >
	<?php     
require "../script/php/header_home.php";
?>	
   <div class="container">
<br/>
     <div class="row">
	
	
		<div class="col m2 l2 s0"></div>
		<div class="col m8 l8 s12" >
		<form method="POST" action="index.php">
		 <div class="card z-depth-4 blue-text ">
            <div class="card-content">
              <h2 align="center" style="color:#283593;">
			  <img src="../script/img/logo.png" alt=" icon" width="150px"  />
			  <br/><b>	 LOG IN </b></h2>
            <div class="row" style="margin:-5px;">
        <div class="input-field col s12">
          <input id="email" type="text"  required="required" name="user_username"  value="<?php if(isset($user_username)){echo $user_username;}?>" />
            <label > <i class="fa fa-user"></i>  Username</label>
        </div>
      </div>




			<div class="row" style="margin:-5px;">
        <div class="input-field col s12">
          <input id="email" type="password"  required="required" name="user_password"  />
            <label for="email" ><i class="fa fa-lock"></i> Password </label>
        </div>
      </div>
	  <center>
	 
	 <button type='submit' class="btn orange darken-4" name="btn_login">
	  <b>Sign In <i class="fa fa-sign-in"></i> </b></button>
	    </center>
	  </div>
            <div  >
            </div> <br/>
          </div>
		</form>
		</div>
		<div class="col m2 l2 s0"></div>


	   
			</div>


   


   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>


</body>

</html>
















