<?php
ob_start();
$page="registration";
require_once 'incl/cons.php';
require_once 'incl/mail2.php';
require_once 'incl/function.php';
require_once 'face/fbConfig.php';
require_once 'face/User.php';
require_once 'incl/header.php';

require_once 'ins/instagram.class.php';
require_once'ins/instagram.config.php';

if (isset($_POST['submit'])) {
    $model = test_input($_POST['model']);
    $_SESSION['model'] = $model;
    if ($model == "NO") {//set default values
        $_POST['height'] = "not a model";
        $_POST['waist'] = "not a model";
        $_POST['shoe'] = "not a model";
        //$age="not a model";
        $_POST['hip'] = "not a model";
        $_POST['chest'] = "not a model";
        $_POST['shoulder'] = "not a model";
    }
    //store data temporily for processing
    $_SESSION['password'] = test_input($_POST['password']);
    $_SESSION['fullname'] = test_input($_POST['fullname']);
    $_SESSION['usname'] = test_input($_POST['username']);
    $_SESSION['email'] = test_input($_POST['email']);
    //$confirmpassword=test_input($_POST['confirmpassword']);
    $_SESSION['phonenumber'] = test_input($_POST['phonenumber']);
    $_SESSION['gender'] = test_input($_POST['gender']);
    $_SESSION['height'] = test_input($_POST['height']);
    $_SESSION['waist'] = test_input($_POST['waist']);
    $_SESSION['shoe'] = test_input($_POST['shoe']);
    $_SESSION['age'] = test_input($_POST['age']);
    $_SESSION['bio'] = test_input($_POST['bio']);
    $_SESSION['hip'] = test_input($_POST['hip']);
    $_SESSION['chest'] = test_input($_POST['chest']);
    $_SESSION['shoulder'] = test_input($_POST['shoulder']);
    $_SESSION['bank'] = test_input($_POST['bank']);
    $_SESSION['accname'] = test_input($_POST['accname']);
    $_SESSION['accnumber'] = test_input($_POST['accnumber']);

    $missing = array();
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $phonenumber = test_input($_POST['phonenumber']);
    $query1 = "select * from registration where username='$username'";
    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {//username already exising
        array_push($missing, $username);
    }
    $query1 = "select * from registration where email='$email'";
    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {
        array_push($missing, $email);
    }
    $query1 = "select * from registration where phonenumber='$phonenumber'";
    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {
        array_push($missing, $phonenumber);
    }
    $country = test_input($_POST['country']);
    if ($country == 'SELECT YOUR COUNTRY') {
        array_push($missing, $country);
    }
    //////////////////////////////////////////////////////////////////////////////////
    if (count($missing) > 0) {
        $nam = "the following detail already exist<br>";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        foreach ($missing as $k => $v) {
            echo $v . "</br>";
        }
        header('Refresh:3; url=registration.php');
    } else {
        $model = test_input($_POST['model']);
        if ($model == "NO") {
            $_POST['height'] = "not a model";
            $_POST['waist'] = "not a model";
            $_POST['shoe'] = "not a model";
            //$age="not a model";
            $_POST['hip'] = "not a model";
            $_POST['chest'] = "not a model";
            $_POST['shoulder'] = "not a model";
        }
        $fullname = test_input($_POST['fullname']);
        $fullname = strtoupper($fullname);
        $username = test_input($_POST['username']);
        $username = strtolower($username);
        $email = test_input($_POST['email']);
        $email = strtolower($email);
        $password = test_input($_POST['password']);
        $password = md5($password);
        //$confirmpassword=test_input($_POST['confirmpassword']);
        $phonenumber = test_input($_POST['phonenumber']);
        $referral = $_POST['referral'];
        $country = test_input($_POST['country']);
        $country = strtoupper($country);
        $state = test_input($_POST['state']);
        $state = strtoupper($state);
        $height = test_input($_POST['height']);
        $waist = test_input($_POST['waist']);
        $shoe = test_input($_POST['shoe']);
        $age = test_input($_POST['age']);
        $gender = test_input($_POST['gender']);
        $gender = strtoupper($gender);
        $bio = test_input($_POST['bio']);
        $hip = test_input($_POST['hip']);
        $chest = test_input($_POST['chest']);
        $shoulder = test_input($_POST['shoulder']);
        $bank = test_input($_POST['bank']);
        $bank = strtoupper($bank);
        $accname = test_input($_POST['accname']);
        $accname = strtoupper($accname);
        $accnumber = test_input($_POST['accnumber']);
        //index();
        $query = " INSERT into  registration(fullname,username,password,email,phonenumber,age,gender,bio,model,country,state,
                bankname,accountname,accountnumber,status,height,waist,shoe,hip,chest,shoulder,contestname,referral)
                VALUES('$fullname','$username','$password','$email','$phonenumber','$age','$gender','$bio','$model','$country','$state','$bank','$accname','$accnumber',
                'not confirm','$height','$waist','$shoe','$hip','$chest','$shoulder','no','$referral')";
        $k = mysql_query($query);
        if ($k) {
            //email activation
            $headers = "From:okomemmanuel1@gmail.com" . "\r\n";
            $subject = 'Signup | Verification';
            $message = "<p>Thanks for signing up!
                        Your account has been created, 
                        </p>
                        Please click this link to activate your account:http://faangs.com/verify.php?user=$username";

            $mail->sendmail("$email", "$message", "$subject");
            $nam = "<H4>AN ACTIVATION LINK HAS BEEN SENT TO YOUR EMAIL</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            unset($_SESSION['password']);
            unset($_SESSION['fullname']);
            unset($_SESSION['usname']);
            unset($_SESSION['email']);
            unset($_SESSION['phonenumber']);
            unset($_SESSION['gender']);
            unset($_SESSION['height']);
            unset($_SESSION['waist']);
            unset($_SESSION['shoe']);
            unset($_SESSION['age']);
            unset($_SESSION['bio']);
            unset($_SESSION['hip']);
            unset($_SESSION['chest']);
            unset($_SESSION['shoulder']);
            unset($_SESSION['bank']);
            unset($_SESSION['accname']);
            unset($_SESSION['accnumber']);

            header('Refresh:3; url=login.php');
        } else {
            $nam = "your form submission was not successful.Try again";
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:3; url=registration.php');
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
            <div class="mbr-white col-lg-6 col-md-7 content-container">

            </div>
            <div class="col-lg-6 col-md-5">
                <div class="form-container">
                    <div class="media-container-column" data-form-type="">
                        <div data-form-alert="" hidden="" class="align-center">
                            Thanks for filling out the form!
                        </div>
                        <div class="col-lg-6 col-md-5">
                        <?php
                        $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
                        // Render facebook login button
                        $output = '<a href="' . htmlspecialchars($loginURL) . '"><img class="img-responsive" src="face/images/face2.png"></a>';
                        echo $output;
                        
                        if (!empty($_SESSION['userdetails'])) {
                            header('Location: index.php');
//                            header('Location: home.php');
                        }
                        $loginUrl = $instagram->getLoginUrl();
                        //echo "<a class=\"button\" href=\"$loginUrl\">Sign in with Instagram</a>";
                        ?>
                        <img src="images/reg.png" class="img-responsive goo"/>
                        <?php
                        require_once("g/lo.php");
                        
                    
                    ?>	
                        </div>
                        
                        <form class="block mbr-form" action="" method="post" data-form-title="">
                            <?php
                                    if (isset($_SESSION["password"])) {
                                        $password = $_SESSION["password"];
                                    } else {
                                        $password = "";
                                    }
                                    
                                    if (isset($_SESSION["fullname"])) {
                                        $nam = $_SESSION["fullname"];
                                    } else {
                                        $nam = "";
                                    }
                                    
                                    if (isset($_SESSION["usname"])) {
                                        $usnam = $_SESSION["usname"];
                                    } else {
                                        $usnam = "";
                                    }
                                    
                                    if (isset($_SESSION["phonenumber"])) {
                                        $phoneno = $_SESSION["phonenumber"];
                                    } else {
                                        $phoneno = "";
                                    }
                                    
                                     if (isset($_SESSION["age"])) {
                                        $age = $_SESSION["age"];
                                    } else {
                                        $age = "";
                                    }
                                    
                                    if (isset($_SESSION["email"])) {
                                        $email = $_SESSION["email"];
                                    } else {
                                        $email = "";
                                    }
                                    
                                    if (isset($_SESSION["height"])) {
                                        $height = $_SESSION["height"];
                                    } else {
                                        $height = "";
                                    }
                                    
                                    if (isset($_SESSION["waist"])) {
                                        $waist = $_SESSION["waist"];
                                    } else {
                                        $waist = "";
                                    }
                                    
                                    
                            ?>
                            <fieldset>
                            <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="password">
                                    <div class="form-group">
                                        <input type="password" class="form-control px-3" name="password" value="<?php echo $password; ?>" data-form-field="Password" placeholder="Enter Password" required id="pwd">
                                    </div>
                                </div>
                                <div class="col-md-6 multi-horizontal" data-for="fullname">
                                    <div class="form-group">
                                        <input type="text" class="form-control px-3" name="fullname" value="<?php echo $nam; ?>" data-form-field="Fullname" placeholder="Enter your Fullname" required id="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="username">
                                    <div class="form-group">
                                        <input type="text" class="form-control px-3" name="username" value="<?php echo $usnam; ?>" data-form-field="Username" placeholder="Enter your username" required id="">
                                    </div>
                                </div>

                                <div class="col-md-6 multi-horizontal" data-for="phonenumber">
                                    <div class="form-group">
                                        <input type="text" class="form-control px-3" name="phonenumber" value="<?php echo $phoneno; ?>" data-form-field="Phonenumber" placeholder="Enter Phone Number" required id="pno">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="country" style="color: #fff;">
                                <label for="country" >SELECT YOUR COUNTRY</label>
                                    <select class="form-control text_field" id="country" name="country" onchange="pop(this.value)">
                                        <OPTION value="NONE">NONE</OPTION>
                                        <?php
                                        $country = "select * from countries";
                                        $rcount = mysql_query($country);
                                        while ($r = mysql_fetch_array($rcount)) {
                                            echo "<option value=\"{$r['name']}\">{$r['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 multi-horizontal" data-for="state">
                                    <label for="state" style="color: #fff;">STATE</label>
                                    <select class="form-control text_field" id="state" name="state">
                                        <option>select your state</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="age" style="margin-top: 5%;">
                                    <div class="form-group">
                                        <input type="text" class="form-control px-3" name="age" value="<?php echo $age;?>" data-form-field="Age" placeholder="Enter your age" required id="age">
                                    </div>
                                </div>

                                <div class="col-md-6 multi-horizontal" data-for="email" style="margin-top: 5%;">
                                    <div class="form-group">
                                        <input type="email" class="form-control px-3" name="email" value="<?php echo $email;?>" data-form-field="Email" placeholder="Enter your email" required id="">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="gender" style="margin-top: 5%;">
                                    <div class="form-group" style="color: #fff;">
                                        <label for="gender" >GENDER</label>
                                        <?php
                                        if (isset($_SESSION["gender"]) and $_SESSION["gender"] == 'Male') {
                                            echo "<label class=\"radio-inline\">";
                                            echo " <input type=\"radio\" name=\"gender\" id=\"gender\" value=\"Male\" checked>Male</label>";
                                            echo "<label class=\"radio-inline\">";
                                            echo "<input type=\"radio\" name=\"gender\" id=\"gender2\" value=\"Female\">Female</label>";
                                        } ELSE {
                                            echo "<label class=\"radio-inline\">";
                                            echo " <input type=\"radio\" name=\"gender\" id=\"gender\" value=\"Male\">Male</label>";
                                            echo "<label class=\"radio-inline\">";
                                            echo "<input type=\"radio\" name=\"gender\" id=\"gender2\" value=\"Female\" checked>Female</label>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6 multi-horizontal"  data-for="bio">
                                    <div class="form-group">
                                        <textarea class="form-control px-3" name="bio" data-form-field="Bio" placeholder="Enter brief description about yourself" required id=""></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 multi-horizontal" data-for="referral" style="margin-top: 5%;">
                                    <label for="referral" style="color: #fff;">SELECT REFERRAL CODE</label>
                                    <select class="form-control text_field" id="referral" name="referral">
                                        <OPTION value="NONE">NONE</OPTION>
                                        <?php
                                        $subadmin = "select * from subadmin";
                                        $rcount = mysql_query($subadmin);
                                        while ($r = mysql_fetch_array($rcount)) {
                                            echo "<option value=\"{$r['username']}\">{$r['username']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 multi-horizontal" data-for="referral" style="margin-top: 5%;">
                                    
                                </div>
                            </div>
                            </fieldset>
                            
                             <fieldset>
                                 <legend style="color: #fff;text-align: center;">Model Info</legend>
                             <div class="row">
                                 <div class="col-md-6 multi-horizontal" data-for="model" style="margin-top: 5%;color: #fff;">
                                     <?php
                                        if (isset($_SESSION["model"]) and $_SESSION["model"] == 'Male') {
                                            echo "<label class=\"radio-inline\">";
                                            echo " <input type=\"radio\" name=\"model\" id=\"model\" value=\"YES\" checked>Model</label>";
                                            echo "<label class=\"radio-inline\">";
                                            echo "<input type=\"radio\" name=\"model2\" id=\"model2\" value=\"NO\">Not Model</label>";
                                        } ELSE {
                                            echo "<label class=\"radio-inline\">";
                                            echo " <input type=\"radio\" name=\"model\" id=\"model\" value=\"YES\">Model</label>";
                                            echo "<label class=\"radio-inline\">";
                                            echo "<input type=\"radio\" name=\"model2\" id=\"model2\" value=\"NO\" checked>Not Model</label>";
                                        }
                                        ?>
                                 </div>
                             </div>
                                 <div id="tes">
                             <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="height">
                                    <div class="form-group">
                                        <input type="number" class="form-control px-3" name="height" value="<?php echo $height; ?>" data-form-field="Height" placeholder="Enter Your Height" required="" id="height">
                                    </div>
                                </div>
                                <div class="col-md-6 multi-horizontal" data-for="waist">
                                    <div class="form-group">
                                        <input type="number" class="form-control px-3" name="waist" value="<?php echo $waist; ?>" data-form-field="Waist" placeholder="Enter your waist size" required="" id="waist">
                                    </div>
                                </div>
                            </div>
                             
                             <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="shoe">
                                    <div class="form-group">
                                        <input type="number" class="form-control px-3" name="shoe" value="<?php echo $shoe; ?>" data-form-field="Shoe" placeholder="Enter Your Shoe size" required="" id="shoe-header15-1j">
                                    </div>
                                </div>
                                <div class="col-md-6 multi-horizontal" data-for="hip">
                                    <div class="form-group">
                                        <input type="number" class="form-control px-3" name="hip" value="<?php echo $hip; ?>" data-form-field="HIp" placeholder="Enter your hip size" required="" id="hip-header15-1j">
                                    </div>
                                </div>
                            </div>
                             
                             <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="chest">
                                    <div class="form-group">
                                        <input type="number" class="form-control px-3" name="chest" value="<?php echo $chest; ?>" data-form-field="Chest" placeholder="Enter Your Chest" required="" id="chest-header15-1j">
                                    </div>
                                </div>
                                <div class="col-md-6 multi-horizontal" data-for="shoulder">
                                    <div class="form-group">
                                        <input type="number" class="form-control px-3" name="shoulder" value="<?php echo $hip; ?>" data-form-field="Shoulder" placeholder="Enter your shoulder size" required="" id="shoulder-header15-1j">
                                    </div>
                                </div>
                            </div>
                                 </div>
                                 </fieldset>
                             
                             <fieldset id="third">
                                    <legend style="color: #fff;text-align: center;">Account information</legend>
                                    <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="bank">
                                    <div class="form-group">
                                        <input type="text" class="form-control px-3" name="bank" value="<?php echo $bank; ?>" data-form-field="Bank" placeholder="Enter Your Bank Name" required="" id="bank">
                                    </div>
                                </div>
                                <div class="col-md-6 multi-horizontal" data-for="accname">
                                    <div class="form-group">
                                        <input type="text" class="form-control px-3" name="accname" value="<?php echo $accname; ?>" data-form-field="Accname" placeholder="Enter your account name" required="" id="accname">
                                    </div>
                                </div>
                            </div>
                                    
                            <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="accnumber">
                                    <div class="form-group">
                                        <input type="text" class="form-control px-3" name="accno" value="<?php echo $accnumber; ?>" data-form-field="Accnumber" placeholder="Enter Your Account Number" required="" id="accno">
                                    </div>
                                </div>
                            </div>     
                                                                                      
                             </fieldset>
                            <legend id="msg" style="color: #fff;"></legend>                   
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

<script type ="text/javascript" src="css/form.js"></script>
<script type="text/javascript" src="js/cou.js"></script>
        
<?php
include_once 'incl/footer.php';
ob_end_flush();
?>