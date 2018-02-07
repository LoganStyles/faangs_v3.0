<?php
ob_start();
$page = "admin";
require_once 'incl/cons.php';
require_once 'incl/function.php';
require_once 'incl/header_admin_old.php';

if (isset($_POST["submit"])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $password = strtolower($password);
    $password = md5($password);
    $query1 = "select * from admin where username='$username' and password='$password' limit 1";
    $result1 = mysql_query($query1);
    if ($rec = mysql_fetch_array($result1)) {

        session_start();

        $_SESSION['admin'] = $rec['username'];
        $_SESSION['status'] = $rec['status'];
        header('location:adminpage.php');
        die();
    } else {

        $query12 = "select * from subadmin where username='$username' and password='$password' limit 1";
        $result12 = mysql_query($query12);
        if ($rec2 = mysql_fetch_array($result12)) {
            session_start();

            $_SESSION['admin'] = $rec2['username'];
            $_SESSION['status'] = $rec2['status'];
            $_SESSION['createcontest'] = $rec2['create_contest'];
            $_SESSION['paymentrequest'] = $rec2['payment_request'];
            $_SESSION['vcontestant'] = $rec2['view_contestant'];
            $_SESSION['updateuser'] = $rec2['update_user_data'];
            $_SESSION['bankdetail'] = $rec2['update_bank_detail'];
            $_SESSION['modelinfo'] = $rec2['update_model_info'];
            $_SESSION['updatelike'] = $rec2['update_like'];
            $_SESSION['updateufund'] = $rec2['update_user_fund'];
            $_SESSION['suspend'] = $rec2['suspend_user'];
            $_SESSION['deleteu'] = $rec2['delete_user'];
            $_SESSION['uploadb'] = $rec2['upload_banner'];
            $_SESSION['deleteb'] = $rec2['delete_banner'];
            $_SESSION['xchange'] = $rec2['exchange_rate'];
            $_SESSION['forum'] = $rec2['forum'];
            $_SESSION['deletef'] = $rec2['delete_forum'];
            $_SESSION['vip'] = $rec2['vip'];
            $_SESSION['viewvip'] = $rec2['view_vip'];
            $_SESSION['addvip'] = $rec2['add_vip'];
            $_SESSION['deletevip'] = $rec2['delete_vip'];
            $_SESSION['message'] = $rec2['message'];
            $_SESSION['messagepart'] = $rec2['message_part'];
            $_SESSION['messagenoti'] = $rec2['message_noti'];
            $_SESSION['changeupass'] = $rec2['changeupassword'];

            header('location:adminpage.php');
            die();
        } else {
            $nam = "incorrect login detail";
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:3; url=admin.php');
        }
    }
}
?>

<section class="header3 cid-qHw45zV91Y cid-qHL05iRqw2 mbr-fullscreen mbr-parallax-background" id="header3-7">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(70, 80, 82);"></div>

    <div class="container align-right">
        <div class="row">
                <div class="col-md-5 col-md-offset-4" style="margin-top:5px">
            
                </div>
            </div>
        <div class="row">
            <div class="mbr-white col-lg-8 col-md-7 content-container">

            </div>
            <div class="col-lg-4 col-md-5">
                <div class="form-container">
                    <div class="media-container-column" data-form-type="">
                        <div data-form-alert="" hidden="" class="align-center">
                           
                        </div>
                        <div> </div>
                        
                        <form class="mbr-form" action="" method="post" data-form-title="Login Form">
                            <div data-for="username">
                                <div class="form-group">
                                    <input type="text" class="form-control px-3" name="username" data-form-field="Username" placeholder="Username" required="" id="name-header15-1j">
                                </div>
                            </div>
                            <div data-for="password">
                                <div class="form-group">
                                    <input type="password" class="form-control px-3" name="password" data-form-field="Password" placeholder="Password" required="" id="email-header15-1j">
                                </div>
                            </div>

                            <span class="input-group-btn">
                                <button href="" name="submit" type="submit" class="btn btn-secondary btn-form display-4">SUBMIT</button>                                
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
        
<?php
include_once 'incl/footer.php';
ob_end_flush();
?>