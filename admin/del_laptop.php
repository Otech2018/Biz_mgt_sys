					<?php     
								require "../script/php/connect.php";			
								require "../script/php/header_admin.php";
								

								if(isset($_GET['stock_id']))  {
								
								 $stock_id = addslashes(htmlentities($_GET['stock_id'])) ;
																						
														$query_run  =new run_query("Update stock set status='0' where id='$stock_id' ");
														$spy  =new run_query("Insert Into spy set spy_date='$reg_Date',  spy_user_id='$user_id',  spy_user_location='$user_location',  spy_comments=' Laptop  With ID $stock_id Was deleted' ");
																									 
																									  echo "<script>
																													alert('Laptop Deleted Successfully');
																													window.location.replace(\"add_stock.php\");
																													
																											</script>"; 
														
														}else{
														
														 echo "<script>
																		window.location.replace(\"index.php\");
																													
																</script>"; 
														
														}
														
										?>