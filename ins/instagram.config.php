<?php
// Setup class
  $instagram = new Instagram(array(
    'apiKey'      => '4b8f0b0fd97b4c77b55b93ed03825c47',
    'apiSecret'   => ' 9692260373344c9a8a9f049c93cfb0ff',
'grant_type'  =>'authorization_code',
   'apiCallback' => 'https://www.faangs.com/ins/success.php/'// must point to success.php
	 
  ));

?>