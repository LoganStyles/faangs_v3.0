<?php
session_start(); //session start

require_once ('libraries/Google/autoload.php');
require_once ('cons.php');
cont();
//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '53207322298-7an6ljd28cblbjj48tvg66jjt2jjhcet.apps.googleusercontent.com'; 
$client_secret = 'KDC0bMj93t6aL0xdfmROADsB';
$redirect_uri = 'https://www.faangs.com/g/';

//database


//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.
echo '<div style="margin:20px">';
if (isset($authUrl)){ 
	//show login url
	echo '<div align="center">';
	echo '<h3>Login with Google -- Demo</h3>';
	echo '<div>Please click login button to connect to Google.</div>';
	echo '<a class="login" href="' . $authUrl . '"><img src="images/google-login-button.png" /></a>';
	echo '</div>';
	
} else {
	
	$user = $service->userinfo->get(); //get user info 
	
	//$sex="female";
	$email= $user['email'];
	
	$fullname= $user['name'];
	
	//$gender=$sex;
	
	$ids= $user['id'];
	
	$provider="google";
	//$username=$email;
	
	
	
	$prevQuery="select * from registration where oauth_provider ='$provider' AND oauth_uid = '$ids' or email='$email'";
			$prevResult = mysql_query($prevQuery);
			
			if(mysql_num_rows($prevResult)> 0){
				  
					$query = "UPDATE registration SET email='$email' where oauth_provider ='$provider' and oauth_uid = '$ids'";
						
			}
			else
			{
				
				$query = "INSERT INTO registration(oauth_provider,oauth_uid ,email,fullname,status)
				values('$provider','$ids','$email','$fullname',1)";
							
			}
			$query = mysql_query($query);
			$prevResult = mysql_query($prevQuery);
			$userData=mysql_fetch_array($prevResult);
	
				
				
				$_SESSION['status']=1;
				
				$_SESSION['provider']=$userData['oauth_provider'];
				$_SESSION['ids']=$userData['oauth_uid'];
	
	
				header('location:../social.php');
			
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
echo '</div>';


?>

