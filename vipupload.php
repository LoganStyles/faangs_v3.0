<?php
require_once("incl/participant.php");

?>
						
						<div class="col-md-12 t" style="padding-top:100px;">

				<!----------------------------------------------------div body---------------------------------------------------->	
							<img id="output_image"/>
							<H3  style="text-align:center;padding-bottom:20px;">VIP PHOTO FROM HERE(Max Size=1mb)</h3>
					<form class="form-horizontal" role="form" method="post" action="vipprocess.php" enctype="multipart/form-data"/>				
						<div class="form-group">
							<!--<label class="control-label col-md-2" for="title">Title:</label>-->
							<div class="col-md-5 col-md-offset-2">
							  <input type="text" class="form-control" id="title"  name="title" placeholder="Enter title of photo" required>
							</div>
						  </div>
						 <!-- <div class="form-group">
							
							<div class="col-md-5 col-md-offset-2">
							  <textarea class="form-control" id="description" name="description" placeholder="photo description" required></textarea>
							</div>
						  </div>-->
						   <div class="form-group">
						   
						   <div class="col-md-5 col-md-offset-2">
							  
							  
							  <select class="form-control" id="category" name="category">
								<option>Vip photo</option>
								
							  </select>
							  	</div>
							</div>
						  
						  
						   <div class="form-group">
							<!--<label class="control-label col-md-2" for="file">File upload:</label>-->
							<div class="col-md-5 col-md-offset-2">
							  <input type="file" class="btn-file" id="file"  name="file" onchange="">
							</div>
						  </div>
						  <div>
						  <div class="form-group">
							<div class="col-md-offset-2 col-md-10">
							<?php 
							
														
							echo" <button type=\"submit\" class=\"btn btn-default\" name=\"submit\">Submit</button>";
												
							?>
							</div>
						  </div>
					</form>
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