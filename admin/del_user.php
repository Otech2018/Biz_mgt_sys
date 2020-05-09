					<?php     
								require "../script/php/connect.php";			
								require "../script/php/header_admin.php";
								

								if(isset($_GET['user_id']))  {
								
								 $user_id = addslashes(htmlentities($_GET['user_id'])) ;
																						
														$query_run  =new run_query("Update users set user_status='2' where user_id='$user_id' ");
														$spy  =new run_query("Insert Into spy set spy_date='$reg_Date',  spy_user_id='$user_id',  spy_user_location='$user_location',  spy_comments=' User  With ID $user_id Was deleted' ");
											 
																									  echo "<script>
																													alert('User Deleted Successfully');
																													window.location.replace(\"all_user.php\");
																													
																											</script>"; 
														
														}else{
														
														 echo "<script>
																		window.location.replace(\"index.php\");
																													
																</script>"; 
														
														}
														
										?>