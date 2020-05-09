<?php     
require "../script/php/connect.php";
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
    <meta name="keywords" content=" MICRO LINK CODE  ">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    
  <meta http-equiv="pragma" content="no-cache" />

   <title> MLC -HOME </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_home.php";
?>	

 

<br/><br/><br/><br/>
<textarea  id="editor" >
tsting ogo
</textarea>


cool
<br/><br/>

<?php
// echo date('l, jS  F Y', strtotime('+5 days') );

class person{
	
	public function __construct ($name, $age ){
		
		 $this->myname = $name;
		 $this->myage = $age;
		
	}
	
	
}


$ogo = new person("ogonnaya",28);
//$ogo->setPerson("ogonnaya",28);

echo $ogo->myname;
?> 

<br/><br/>

    <div class="btn green" onClick="document.location.reload(true);">hmmm</div>	
	
	
	<br/><br/><br/>

<?php     
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>


</body>

</html>
















