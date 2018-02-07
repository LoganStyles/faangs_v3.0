 <?php ob_start();?>
<?php
require_once("incl/participant.php");
$email=$_SESSION['email'];
$pe= $_SESSION['username'];
?>
						
						<div class="col-md-12 t">
	
				<!-----------------------------------------------------------------form body------------------------------------>
				<div style="margin-top:50px;margin-bottom:30px;">
					<TABLE CLASS="table">
							<thead><th>The Credit Cost for VIP is just $15</th></thead>
							
							
						</TABLE>
					</div>
					<div>
					 <h5 style="font-weight:bold;font-size:1.2em;">Exchange rate:<?php
								
									$query1="select * from exchange";
									$result1=mysql_query($query1);	
									if(mysql_num_rows($result1)>0){
										$rec=mysql_fetch_array($result1);
										echo $rec['rate'];
										$conv=$rec['rate'];
									}
									else{
										
										echo "0";
									}
						
						?>
						</h5>
					</div>
					<div style="margin:0px auto;width:60%;">
					<form  class="form-horizontal" role="form">
								<fieldset>
									<legend>Buy Vip credit</legend>
								  <div class="form-group">
											
										
										<div class="" style="padding-left:50px;margin-bottom:10px;">
										<input type="radio" name="credit" id="32" value="15/5000" checked><span style="padding-left:10px;">$15</span>
										</div>
									</div>
								  <div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									   <script src="https://js.paystack.co/v1/inline.js"></script>
										<button type="button" onclick="payWithPaystack()"> Pay </button> 
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
			//////////////////////////////////////random string generator
			 $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
			 $string = '';
			$max = strlen($characters) - 1;
			for ($i = 0; $i < $max; $i++) {
			$string .= $characters[mt_rand(0, $max)];
			}
			$reference=$pe.$string;
			$_SESSION["reference"]= $reference;
			

				include("incl/footer.php");
				ob_end_flush();
				//live:
			?>
		</footer>
	</div>
</body>
<script>

  function payWithPaystack(){
	var amout=k(); 
	var vals=amout.split('/');
	var amouts=vals[0];
	var likes=vals[1];
	var conv="<?php echo $conv*100 ?>";
	var conv=conv*amouts;

	var email="<?php echo $email ?>"
	var reference="<?php echo $reference ?>";

    var handler = PaystackPop.setup({
      key: 'pk_live_fd6c8f3ea693737df70fde19261ede2bbef558bb',
      email: email,
      amount: conv,
      ref: reference,
      metadata: {
         custom_fields: [
            {
                display_name: "okom emmanuel",
                variable_name: "mobile_number",
                value: "0812334556"
            }
         ]
      },
      callback: function(response){
      var p;
      p=response.reference;
          //alert('success. transaction ref is ' + response.reference);
          window.location = "vipprocessor.php?reference="+p+"&&id2="+conv+"&&id3="+likes;



      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
	
	function k()
	{
		var rates = document.getElementsByName('credit');
		var rate_value;
		for(var i = 0; i < rates.length; i++)
		{
			if(rates[i].checked)
			{
				rate_value = rates[i].value;
				return rate_value;
			}			
		
		}
	
	
	}
	
	
	
  }
</script>
</html>