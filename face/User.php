<?php

//require_once("incl/cons.php");
//cont();

function checkUser($userData = array()) {
    if (!empty($userData)) {
        $provider = $userData['oauth_provider'];
        $ids = $userData['oauth_uid'];
        $firstname = $userData['first_name'];
        $lastname = $userData['last_name'];
        $fullname = $firstname . " " . $lastname;
        $gender = $userData['gender'];
        $gender = strtoupper($gender);
        //$username=$userData['email'];
        $email = $userData['email'];
        $prevQuery = "select * from registration where oauth_provider ='$provider' AND oauth_uid = '$ids'";
        $prevResult = mysql_query($prevQuery);

        if (mysql_num_rows($prevResult) > 0) {
            $query = "UPDATE registration SET email='$email' where oauth_provider ='$provider' and oauth_uid = '$ids'";
        } else {
            //$email=$userData['email'];
            $query = "INSERT INTO registration(oauth_provider,oauth_uid ,email,fullname,status)
				values('$provider','$ids','$email','$fullname',1)";
        }
        $query = mysql_query($query);
        $prevResult = mysql_query($prevQuery);
        $userData = mysql_fetch_array($prevResult);
    }
    return $userData;
}

?>