<html>
<head>
	<title>Login with Instagram 9lessons Demos</title>
	<style>
body
{
	font-family: "lucida grande",tahoma,verdana;
}
	span
	{
	color:#cc0000;
	}
	div
	{
		word-wrap: break-word;
	}
	</style>
	</head>
	<body>
<div>		
<h1>Login with Instagram - www.9lessons.info</h1><span style='float:right'><a href='?id=logout'>Logout</a></span>	
</div>		
<h2>User Details</h2>
<?php
session_start();
if($_GET['id']=='logout')
{
unset($_SESSION['userdetails']);
session_destroy();
}
require 'db.php';
require 'instagram.class.php';
require 'instagram.config.php';
if (!empty($_SESSION['userdetails'])) 
{
$data=$_SESSION['userdetails'];
echo "<div style='float:left;margin-right:10px'><img src=\"{$data->user->profile_picture}\" ></div><div style='float:left'>";  
echo '<b>Name:</b> '.$data->user->full_name.'</br>';
echo '<b>Username:</b> '.$data->user->username.'</br>';
echo '<b>User ID:</b> '.$data->user->id.'</br>';
echo '<b>Bio:</b> '.$data->user->bio.'</br>';
echo '<b>Website:</b> '.$data->user->website.'</br>';
echo '<b>Profile Pic:</b> '.$data->user->profile_picture.'</br>';
echo '<b>Access Token:</b> '.$data->access_token.'</br></div>';
// Store user access token
$instagram->setAccessToken($data);
}
else
{	
header('Location:../registration.php');
}
?>
<div style='clear:both'></div>
	


<h2>Your Photos</h2>
<div>
<?php
$popular = $instagram->getUserMedia($data->user->id);
// Display results
foreach ($popular->data as $data) {
  echo "<img src=\"{$data->images->thumbnail->url}\">";
}
?>
</div>
<h2>Instagram Data Array</h2>
<div>
	<?php 
	echo '<pre>';
	   print_r($data);
	   echo '<pre>';
	?>
	</div>
	
</body>
</html>