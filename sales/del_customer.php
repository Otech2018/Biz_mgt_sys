					<?php     
								require "../script/php/connect.php";			
							require "../script/php/header_sales.php";


								if(isset($_GET['customer_id']))  {
								
								 $customer_id = addslashes(htmlentities($_GET['customer_id'])) ;
																						
														$query_run  =new run_query("Update customers  set customer_permission='0'  where customer_id='$customer_id' ");
																									 
														$spy  =new run_query("Insert Into spy set spy_date='$reg_Date',  spy_user_id='$user_id',  spy_user_location='$user_location',  spy_comments=' Customer   With ID $customer_id Was deleted' ");
											  echo "<script>
																													alert('Customer Deleted Successfully');
																													window.location.replace(\"all_customer.php\");
																													
																											</script>"; 
														
														}else{
														
														 echo "<script>
																		window.location.replace(\"index.php\");
																													
																</script>"; 
														
														}
														
										?>