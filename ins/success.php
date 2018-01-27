<?php
//require 'db.php';
require 'instagram.class.php';
require 'instagram.config.php';

// Receive OAuth code parameter
$code = $_GET['code'];



// Check whether the user has granted access
if (true === isset($code)) {
//echo $code;
  // Receive OAuth token object
  $data = $instagram->getOAuthToken($code);
  // Take a look at the API response
   
if(empty($data->user->username))
{
header('Location:../registration.php');


}
else
{
	session_start();
	$_SESSION['userdetails']=$data;
	$user=$data->user->username;
	$fullname=$data->user->full_name;
	$bio=$data->user->bio;
	$website=$data->user->website;
	$id=$data->user->id;
	$token=$data->access_token;
/**
$id=mysql_query("select instagram_id from instagram_users where instagram_id='$id'");

if(mysql_num_rows($id) == 0)
{	
mysql_query("insert into instagram_users(username,Name,Bio,Website,instagram_id,instagram_access_token) values('$user','$fullname','$bio','$website','$id','$token')");
}
**/

$prevQuery="select * from registration where oauth_provider ='instagram' AND oauth_uid = '$id'";
			$prevResult = mysql_query($prevQuery);
			if(mysql_num_rows($prevResult)> 0){
				   
					$query = "UPDATE registration SET username = '$user'
						WHERE 
						oauth_provider ='instagram'
						AND oauth_uid = '$id'";
			}
			else
			{
				
				$query = "INSERT INTO registration(oauth_provider,oauth_uid ,username)
				values('instagram','$id','$user')";
			}
			$query = mysql_query($query);
			$prevResult = mysql_query($prevQuery);
			$userData=mysql_fetch_array($prevResult);
header('Location: home.php');
}
} 
else 
{
// Check whether an error occurred
if (true === isset($_GET['error'])) 
{
    echo 'An error occurred: '.$_GET['error_description'];
}

}

?>
