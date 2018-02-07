<?php
ob_start();
require_once("incl/participant.php");

?>
			<?php
			
										if(isset($_POST["submit"]))
										{
											
											$username= $_SESSION['username'];
											//echo $username;
											$query1="select * from total where username='$username' limit 1";
											$result1=mysql_query($query1);
												if(mysql_num_rows($result1)>0)
													{
														if($rec=mysql_fetch_array($result1));
															if(($rec['tos']==5000) or ($rec['tos']>5000))
																{
																	
																	$amount=200;
																	$dat= date("Y/m/d");
																	$query=" INSERT into request(username,amount,date,status)values('$username','$amount','$dat','pending')";
				
																	$k=mysql_query($query);
																			
																	if ($k)
																	{
																		$amount=$rec['tos']-5000;
																		$query2="update total set tos='$amount' where username='$username'";
																		$result=mysql_query($query2);
																		$nam="<H4>your payment request was succesfully</H4>";
																										
																			
																					
																		echo "<div class=\"alert alert-success\">";
																		echo "	<strong>";
																										
																		echo 	"{$nam}";
																		echo "	</strong>";
																		echo "</div>";
																		header('Refresh:2; url=participate.php');
																				
																	}
														
																}
																
																
															if(($rec['tos']==1000) or( ($rec['tos']>1000) &&($rec['tos']<5000)))
																{
																	$amount=32;
																	//echo $amount;
																	
																	$query=" INSERT into request(username,amount,status)values('$username','$amount','pending')";
				
																	$k=mysql_query($query);
																			
																	if ($k)
																	{
																		$amount=$rec['tos']-1000;
																		$query2="update total set tos='$amount' where username='$username'";
																		$result=mysql_query($query2);
																		$nam="<H4>your payment request was succesfully</H4>";
																										
																			
																					
																		echo "<div class=\"alert alert-success\">";
																		echo "	<strong>";
																										
																		echo 	"{$nam}";
																		echo "	</strong>";
																		echo "</div>";
																		
																		header('Refresh:2; url=participate.php');
																				
																	}
																	
																}
																if($rec['tos']==500)
																{
																	$amount=13;
																	//echo $amount;
																	
																	$query=" INSERT into request(username,amount,status)values('$username','$amount','pending')";
				
																	$k=mysql_query($query);
																			
																	if ($k)
																	{
																		$amount=$rec['tos']-500;
																		$query2="update total set tos='$amount' where username='$username'";
																		$result=mysql_query($query2);
																		$nam="<H4>your payment request was succesfully</H4>";
																										
																			
																					
																		echo "<div class=\"alert alert-success\">";
																		echo "	<strong>";
																										
																		echo 	"{$nam}";
																		echo "	</strong>";
																		echo "</div>";
																		
																		header('Refresh:2; url=participate.php');
																				
																	}
																	
																}
																
															if(($rec['tos']<500))
																{
																	$nam="You need more like to complete this transaction";
																	echo "<div class=\"alert alert-danger\">";
																	echo "	<strong>";
																	echo 	"{$nam}";
																	echo "	</strong>";
																	echo "</div>";
																	header('Refresh:3; url=buycredit.php');
																}
													}
													else{
														$nam="You need likes to complete this transaction";
																	echo "<div class=\"alert alert-danger\">";
																	echo "	<strong>";
																	echo 	"{$nam}";
																	echo "	</strong>";
																	echo "</div>";
																	header('Refresh:3; url=participate.php');
														
														
													}
												ob_end_flush();	
										}
						
							?>			
						<div class="col-md-12 t">
	
				<!---------------------------------------------------------body begins here--------------------------------------->
				<div style="margin-top:50px;margin-bottom:30px;">
					<TABLE CLASS="table">
							<thead><th>CONVERTING YOUR LIKES BACK TO CASH </th></thead>
							<Tr style="background:#fec303;color:white">
								<td>500 likes =$13</td>
							</Tr>
							<Tr style="background:#ffef96;color:red">
								<td>1000 likes= $32</td>
							</Tr>
							<Tr style="background:#fec303;color:white">
								<td>5000 likes =$200</td>
							</Tr>
							
						</TABLE>
					</div>
					<div style="margin:0px auto;width:60%;">
					<form method ="post" action="" class="form-horizontal" role="form">
								<fieldset>
									<legend>Convert now</legend>
								  
								  <div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-default" name="submit">Request payment</button>
									</div>
								  </div>
								</fieldset>
							</form>
					</div>
			<!---------------------------------------------------------------body ends here!---------------------------------------->
							</div>
						</div>
					</div>
				
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