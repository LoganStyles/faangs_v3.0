<html>
<head>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 1054px;
	height: 129px;
	z-index: 1;
	font-size:5em;
}
#apDiv2 {
	position: absolute;
	width: 1049px;
	height: 295px;
	z-index: 2;
	left: 13px;
	top: 152px;
}
</style>
</head>
<body>
<div id="apDiv1">send message</div>
<div id="apDiv2">
<?php
if(isset($_POST['submit'])){
	
										$headers = "From:okomemmanuel1@gmail.com" . "\r\n";
										$subject = 'Signup | Verification'; 
										$message = '
										 
										<p>Thanks for signing up!
										Your account has been created, 
										you can login with the following credentials</p>
										
										
										 
										Please click this link to activate your account:'
										//http://localhost/faangsite2/index2.php?user=$username;
										//localhost/faangsite2/verify.php?user=$username;*/
															 
									
											 
											mail("okomjoseph1@gmail.com", $subject, $message,$headers);
	
}



?>
<form method="post" action=""/>
<table>
<tr>
<td>name</td>
<td><input type="text" name="ab"/></td>
</tr>
<tr>
<td>email</td>
<td><input type="text" name="ab2"/></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="submit"/></td>
</tr>
</table>

</form>
</div>
</body>
</html>