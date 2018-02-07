<?php ob_start(); 
require_once("incl/participant.php");

$pe = $_SESSION['username'];
$existing_email = $_SESSION['existingemail'];
$existing_username=$_SESSION['username'];

//echo 'username '.$pe.' email: '.$email2;exit;
if (isset($_POST['submit'])) {
    $old_password = md5($_POST['old_password']);
    $new_password = test_input($_POST['new_password']);
    $confirm_password = test_input($_POST['confirm_password']);
    //  echo 'old password '.$old_password;exit;
    $query1 = "select * from registration where (username='$existing_username' || email='$existing_email')  and password='$old_password'";
    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {
        //old password confirmed, chk new passwords
        if ($new_password == $confirm_password) {
            //new password are the same,hash & update
            $hashed_password = md5($new_password);
            $query_update = "UPDATE registration set password='$hashed_password' "
                    . "WHERE username='$existing_username' || email='$existing_email'";
            
            $result = mysql_query($query_update);
            if (mysql_affected_rows() >= 1) {
                $nam = "<h4>Your password has been successfully updated</h4>";
                echo "<div class=\"alert alert-success\">";
                echo "	<strong>";
                echo "{$nam}";
                echo "	</strong>";
                echo "</div>";
                header('Refresh:1; url=changepass.php');
            }else{
                $nam = "<h4>The password change operation failed</h4>";
                echo "<div class=\"alert alert-danger\">";
                echo "	<strong>";
                echo "{$nam}";
                echo "	</strong>";
                echo "</div>";
                header('Refresh:1; url=changepass.php');
            }
        }else{
            $nam = "<h4>Your new password does not match</h4>";
                echo "<div class=\"alert alert-danger\">";
                echo "	<strong>";
                echo "{$nam}";
                echo "	</strong>";
                echo "</div>";
                header('Refresh:1; url=changepass.php');
        }
    } else {
        //old password wrong,issue error
        $nam = "<h4>Invalid password</h4>";
                echo "<div class=\"alert alert-danger\">";
                echo "	<strong>";
                echo "{$nam}";
                echo "	</strong>";
                echo "</div>";
                header('Refresh:1; url=changepass.php');
    }
}
?>

<div class="col-md-12 t">

    <!-----------------------------------------------------------------form body------------------------------------>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-7 col-md-offset-4">
                <h5 style="font-weight:bold;margin-bottom:2em;text-transform:uppercase;font-size:1em;">Change Password</h5>
                <form method ="post" action=" " class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-7 input-group al">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="password" class="form-control" name="old_password" placeholder="Enter old password">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-7 input-group al">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-7 input-group al">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </span>
                                        <input type="password" class="form-control "  name="confirm_password" placeholder="Confirm new password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default col-md-2 al" name="submit">Submit</button>

                                </div>

                            </fieldset>
                        </form>
            </div>
        </div>
    </div>
</div>