<?php
			//require_once("incl/ses.php");
				require_once("incl/cons.php");
				require_once("incl/function.php");
				cont();
						?>
<!DOCTYPE html>
<html lang="en">
	<?php
		require_once("incl/title.php");
	?>
	<link rel="stylesheet" href="css/form.css">
<body>

	
	<div class="container-fluild">
		<!--header line-->
						<?php
						include("incl/header.php");
						?>
				
						
			
		</div>
		<!--end of header line-->
		<!---content of your code-->
				<!--FORM BODY-->
		
		
						
		<div class="row ">
		<!-- top advert-->
								
		</div>	
	   <div class="row t1">
	   <!-- left advert-->
				
				<div class="col-md-5" style="height:500px;text-align:center;">
							
							<?php
									if(isset($_GET['user']))
									{
										$k=test_input($_GET['user']);
										//echo $k;
									$query1="select * from registration where username='{$k}' and status=0 limit 1";

											$result1=mysql_query($query1);
											if(mysql_num_rows($result1)>0){
													
													$rec=mysql_fetch_array($result1);
													  if($rec['username'])
															{
																
																	$query2="update registration set status=2 where username='{$k}'";
																	$result=mysql_query($query2);
																	if(mysql_affected_rows()>0){
																		
																	$query=" INSERT into  fund(username,balance)values
																			('$k','50')";
																			$k3=mysql_query($query);
																											
																		
																	
																	
																					
																				if($k3){	
																					$_SESSION['username']=$rec111['username'];
																					$_SESSION['status']=$rec111['status'];
																					$_SESSION['sex']=$rec111['gender'];
																					$_SESSION['email']=$rec111['email'];
																					//echo $_SESSION['username'];
																					echo "<br>";
																					//echo $_SESSION['status'];
																					header('location:chat.php');
																				}
																	
													
													
													
																	
																		
																		
																		
																		
																		
																		
																		
																		
																		
																		
																		
																}
																	
															}
														


															else
																	{
																										
																		$nam="try again";
																										
																			
																					
																		echo "<div class=\"alert alert-danger\">";
																		echo "	<strong>";
																										
																		echo 	"{$nam}";
																		echo "	</strong>";
																		echo "</div>";
																		header('Refresh:3; url=registration.php');

																	}
																  

											}
										else{
											$nam="Your account has been activated already";
																										
																			
																					
																		echo "<div class=\"alert alert-danger\">";
																		echo "	<strong>";
																										
																		echo 	"{$nam}";
																		echo "	</strong>";
																		echo "</div>";
																		header('Refresh:3; url=login.php');
											
										}
									}
									//die();
									
									
									?>
				</div>					
				
			
		</div>
	
			<!--FOOTER-->
		<footer>
			<?php 
				include("incl/footer.php");
			?>
		</footer>

	</div>	
</body>
</html>