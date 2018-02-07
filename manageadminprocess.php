<?php

ob_start();
require_once("incl/nav_admin.php");
?>
<?php

if (isset($_POST['submit'])) {
    $username = test_input($_POST['username']);
    $username = strtolower($username);
    $password = test_input($_POST['pwd']);
    $password = md5($password);

    $chk = "select * from  subadmin where username='$username'";

    $result1 = mysql_query($chk);
    if (mysql_num_rows($result1) > 0) {
        $nam = "<H4>$username already exist</H4>";
        echo "<div class=\"alert danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:2; url=manageadmin.php');
        die();
    }
    if (isset($_POST['createcontest'])) {
        $ccontest = test_input($_POST['createcontest']);
    } else {
        $ccontest = 0;
    }
    if (isset($_POST['payment_request'])) {
        $payment_request = test_input($_POST['payment_request']);
    } else {
        $payment_request = 0;
    }
    if (isset($_POST['view_contestant'])) {
        $view_contestant = test_input($_POST['view_contestant']);
    } else {
        $view_contestant = 0;
    }
    if (isset($_POST['uuser'])) {
        $uuser = test_input($_POST['uuser']);
    } else {
        $uuser = 0;
    }
    if (isset($_POST['ubank'])) {
        $ubank = test_input($_POST['ubank']);
    } else {
        $ubank = 0;
    }
    if (isset($_POST['umodel'])) {
        $umodel = test_input($_POST['umodel']);
    } else {
        $umodel = 0;
    }

    if (isset($_POST['ulike'])) {
        $ulike = test_input($_POST['ulike']);
    } else {
        $ulike = 0;
    }
    if (isset($_POST['uuserfund'])) {
        $uuserfund = test_input($_POST['uuserfund']);
    } else {
        $uuserfund = 0;
    }
    if (isset($_POST['suspend'])) {
        $suspend = test_input($_POST['suspend']);
    } else {
        $suspend = 0;
    }
    if (isset($_POST['duser'])) {
        $duser = test_input($_POST['duser']);
    } else {
        $duser = 0;
    }
    if (isset($_POST['ubanner'])) {
        $ubanner = test_input($_POST['ubanner']);
    } else {
        $ubanner = 0;
    }
    if (isset($_POST['xchang'])) {
        $xchang = test_input($_POST['xchang']);
    } else {
        $xchang = 0;
    }
    if (isset($_POST['dbanner'])) {
        $dbanner = test_input($_POST['dbanner']);
    } else {
        $dbanner = 0;
    }
    if (isset($_POST['forum'])) {
        $forum = test_input($_POST['forum']);
    } else {
        $forum = 0;
    }
    if (isset($_POST['dforum'])) {
        $dforum = test_input($_POST['dforum']);
    } else {
        $dforum = 0;
    }
    if (isset($_POST['vip'])) {
        $vip = test_input($_POST['vip']);
    } else {
        $vip = 0;
    }
    if (isset($_POST['vvip'])) {
        $vvip = test_input($_POST['vvip']);
    } else {
        $vvip = 0;
    }
    if (isset($_POST['avip'])) {
        $avip = test_input($_POST['avip']);
    } else {
        $avip = 0;
    }
    if (isset($_POST['dvip'])) {
        $dvip = test_input($_POST['dvip']);
    } else {
        $dvip = 0;
    }
    if (isset($_POST['msg'])) {
        $msg = test_input($_POST['msg']);
    } else {
        $msg = 0;
    }
    if (isset($_POST['msgpart'])) {
        $msgpart = test_input($_POST['msgpart']);
    } else {
        $msgpart = 0;
    }
    if (isset($_POST['msgnoti'])) {
        $msgnoti = test_input($_POST['msgnoti']);
    } else {
        $msgnoti = 0;
    }
    if (isset($_POST['changeupassword'])) {
        $changeupassword = test_input($_POST['changeupassword']);
    } else {
        $changeupassword = 0;
    }

    $query = " INSERT into  subadmin(username,password,create_contest,payment_request,view_contestant,update_user_data,update_bank_detail,update_model_info,update_like,update_user_fund,suspend_user,delete_user,upload_banner,exchange_rate,
delete_banner,forum,delete_forum,vip,view_vip,add_vip,delete_vip,message,message_part,message_noti,changeupassword,status)
values('$username','$password','$ccontest','$payment_request','$view_contestant','$uuser','$ubank','$umodel','$ulike','$uuserfund','$suspend','$duser','$ubanner','$xchang','$dbanner','0',
'0','$vip','$vvip','$avip','$dvip','$msg','$msgpart','$msgnoti','$changeupassword',3)";
    $k = mysql_query($query);
    if ($k) {
        $nam = "<H4>$username account has been successfully created</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:2; url=manageadmin.php');
    } else {
        //echo mysql_error();
        $nam = "review your information";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:3; url=manageadmin.php');
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////										////////////////////////submission query
}
ob_end_flush();
?>	