<?php
ob_start();
$page="login";
require_once 'incl/cons.php';
require_once 'incl/function.php';
require_once 'face/fbConfig.php';
require_once 'face/User.php';
require_once 'incl/header.php';

if (isset($_POST["submit"])) {
    $username = test_input($_POST['username']);
    $username = strtolower($username);
    $password = test_input($_POST['password']);
    $password = md5($password);

    //sta 2 fro complete,1 for social media, 10 for suspended,0 for unconfirm
    //$query1="select * from registration where username='james' and password='$password' and status=1 or status=2 limit 1";
    $query1 = "select * from registration where username='$username' and password='$password' and (status=1 or 2 or 0 or 10 or 5)";
    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {
        $rec = mysql_fetch_array($result1);

        if ($rec['status'] == 2 and ! isset($_SESSION['dir'])) {
            session_start();
            $_SESSION['username'] = $rec['username'];
            $_SESSION['status'] = $rec['status'];
            $_SESSION['sex'] = $rec['gender'];
            $_SESSION['email'] = $rec['email'];
            //echo $_SESSION['username'];
            echo "<br>";
            //echo $_SESSION['status'];
            header('location:chat.php');
        }
        if ($rec['status'] == 5 and ! isset($_SESSION['dir'])) {
            session_start();
            $_SESSION['username'] = $rec['username'];
            $_SESSION['status'] = $rec['status'];
            $_SESSION['sex'] = $rec['gender'];
            $_SESSION['email'] = $rec['email'];
            //echo $_SESSION['username'];
            echo "<br>";
            //echo $_SESSION['status'];
            header('location:chat.php');
        } else if ($rec['status'] == 2 and $_SESSION['dir'] == 2) {
            session_start();
            $_SESSION['username'] = $rec['username'];
            $_SESSION['status'] = $rec['status'];
            $_SESSION['sex'] = $rec['gender'];
            $_SESSION['email'] = $rec['email'];
            //echo $_SESSION['username'];
            echo "<br>";
            //echo $_SESSION['status'];
            header('location:vipcredit.php');
        } else if ($rec['status'] == 1 and ! isset($_SESSION['dir'])) {    //die();
            session_start();
            $_SESSION['username'] = $rec['username'];
            $_SESSION['status'] = $rec['status'];
            $_SESSION['sex'] = $rec['gender'];
            $_SESSION['email'] = $rec['email'];
            header('location:social.php');
        } else if ($rec['status'] == 1 and $_SESSION['dir'] == 2) {    //die();
            session_start();
            $_SESSION['username'] = $rec['username'];
            $_SESSION['status'] = $rec['status'];
            $_SESSION['sex'] = $rec['gender'];
            $_SESSION['email'] = $rec['email'];
            header('location:social.php');
        } else if ($rec['status'] == 10) {
            session_start();
            $_SESSION['username'] = $rec['username'];
            $_SESSION['email'] = $rec['email'];
            $_SESSION['status'] = 10;
            header('location:suspend.php');
        } else {
            $nam = "your account is not activated";
            echo "<div class=\"alert alert-danger\">";
            echo "<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
        }
    } else {
        $nam = "incorrect login detail";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:3; url=login.php');
    }
}
if (isset($_GET["id"])) {
    $nam = "you must login in to start liking";
    echo "<div class=\"alert alert-danger\" style=\"text-align:center\";>";
    echo "	<strong>";
    echo "{$nam}";
    echo "	</strong>";
    echo "</div>";
    header('Refresh:3; url=login.php');
}
if (isset($_GET["id2"])) {
    $_SESSION['dir'] = 2;
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
                        <div>
                            <?php
                                $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
                                // Render facebook login button
                                $output = '<a href="' . htmlspecialchars($loginURL) . '">'
                                        . '<button class="loginBtn loginBtn--facebook">Sign in with Facebook</button></a>';
                                echo $output;
                                ?>
                                        <div style="margin-bottom:5px">
                                <?php
                                require_once("g/lo.php");
                                ?>
                                        </div>
                        </div>
                        
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