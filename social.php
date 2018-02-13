<script type="text/javascript" src="js/cou.js"></script>
<script type ="text/javascript" src="css/form2.js"></script>

<?php
ob_start();
require_once("incl/participant_social.php");
require_once("incl/function.php");

$provider = $_SESSION['provider'];
$ids = $_SESSION['ids'];
?>

<?php
if (isset($_POST['social'])) {
    $model = test_input($_POST['model']);
    $_SESSION['model'] = strtouPPER($model);
    // ECHO  $_SESSION['model'];
    if ($model == "NO") {
        $_POST['height'] = "not a model";
        $_POST['waist'] = "not a model";
        $_POST['shoe'] = "not a model";
        //$age="not a model";
        $_POST['hip'] = "not a model";
        $_POST['chest'] = "not a model";
        $_POST['shoulder'] = "not a model";
    }
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
    //echo $_SESSION['gender'];
    $missing = array();
    $username = test_input($_POST['username']);
    $phonenumber = test_input($_POST['phonenumber']);
    $query1 = "select * from registration where username='$username'";
    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {
        array_push($missing, $username);
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
    $state = test_input($_POST['state']);
    if ($state == 'SELECT YOUR STATE') {
        array_push($missing, $state);
    }
    /////////////
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
        //header('Refresh:3; url=participate.php');
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
        $password = test_input($_POST['password']);
        $password = md5($password);
        //$confirmpassword=test_input($_POST['confirmpassword']);
        $phonenumber = test_input($_POST['phonenumber']);
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
        $email = test_input($_POST['email']);
        $email = strtoupper($email);
        //index();
        $query1 = "update registration set fullname='$fullname',password='$password',phonenumber='$phonenumber',
                country='$country',state='$state',age='$age',bio='$bio',height='$height',waist='$waist',shoe='$shoe',
                hip='$hip',chest='$chest',shoulder='$shoulder',username='$username',gender='$gender',
                bankname='$bank',accountname='$accname',accountnumber='$accnumber',model='$model',email='$email'
                where oauth_provider='$provider' and oauth_uid='$ids'";
        $result = mysql_query($query1);

        if (mysql_affected_rows() >= 1) {
            $nam = "your personal data have been successfully updated</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            $query11 = "update registration set status='2'where oauth_provider='$provider' and oauth_uid=$ids";
            $result2 = mysql_query($query11);
            if (mysql_affected_rows() > 0) {
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
                $query111 = "select * from registration where oauth_provider='$provider' and oauth_uid=$ids";
                $result111 = mysql_query($query111);
                if (mysql_num_rows($result111) > 0) {
                    $rec111 = mysql_fetch_array($result111);
                    $_SESSION['username'] = $rec111['username'];
                    $username = $rec111['username'];
                    $_SESSION['status'] = $rec111['status'];
                    $_SESSION['sex'] = $rec111['gender'];
                    $_SESSION['email'] = $rec111['email'];
                    //echo $_SESSION['username'];
                    echo "<br>";
                    //echo $_SESSION['status'];
                    //die();
                    $prevQuery2 = "select * from fund where username ='$username'";
                    $prevResult2 = mysql_query($prevQuery2);
                    if (mysql_num_rows($prevResult2) > 0) {
                        
                    } else {
                        $query2 = " INSERT into fund(username,balance)values
																						('$username','100')";
                        $k = mysql_query($query2);
                    }
                    header('location:chat.php');
                }
            }
        } else {
            $nam = "try again<br>";
            echo "<div class=\"alert alert-danger\">";
            echo "<strong>";
            echo "{$nam}";
            echo "</strong>";
            echo "</div>";
            //header('Refresh:3; url=participate.php');
        }
    }
}
?>

<div class="col-md-12 t" style="padding-top:100px;">

    <!----------------------------------------------------div body---------------------------------------------------->	
    <img id="output_image"/>
    <H3  style="text-align:center;padding-bottom:20px;">UPLOAD YOUR PHOTO FROM HERE(Max Size=1mb)</h3>
    <?php
$coun = 0;
if (isset($_SESSION["username"])) {
    $user = $_SESSION["username"];
} else {
    $user = "";
}
$query = "select * from registration where oauth_provider='$provider' and oauth_uid=$ids or username='$user'";
$res = mysql_query($query);
$rec = mysql_fetch_array($res);
if ($rec["email"] == "") {
    $coun = $coun + 1;
}
if ($rec["fullname"] == "") {
    $coun = $coun + 1;
}
if ($rec["username"] == "") {
    $coun = $coun + 1;
}
if ($rec["phonenumber"] == "") {
    $coun = $coun + 1;
}
if ($rec["age"] == "") {
    $coun = $coun + 1;
}
if ($rec["gender"] == "") {
    $coun = $coun + 1;
}
if ($rec["bio"] == "") {
    $coun = $coun + 1;
}
if ($rec["model"] == "") {
    $coun = $coun + 1;
}
if ($rec["country"] == "") {
    $coun = $coun + 1;
}
if ($rec["state"] == "") {
    $coun = $coun + 1;
}
if ($rec["bankname"] == "") {
    $coun = $coun + 1;
}
if ($rec["accountname"] == "") {
    $coun = $coun + 1;
}
if ($rec["accountnumber"] == "") {
    $coun = $coun + 1;
}
if ($rec["height"] == "") {
    $coun = $coun + 1;
}
if ($rec["waist"] == "") {
    $coun = $coun + 1;
}
if ($rec["shoe"] == "") {
    $coun = $coun + 1;
}
if ($rec["hip"] == "") {
    $coun = $coun + 1;
}
if ($rec["shoulder"] == "") {
    $coun = $coun + 1;
}
if ($rec["chest"] == "") {
    $coun = $coun + 1;
}
//echo $coun;
if ($coun > 0) {
    echo "<div class=\"col-md-7 col-md-offset-4 \">";
    echo "<h5 style=\"font-weight:bold;font-size:1em;MARGIN-TOP:3EM;\">UPDATE YOUR PROFILE INFORMATION</h5>";
    echo "<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"\" id=\"form1\">";
    echo "		  <div class=\"form-group\">";
    echo "			 <div class=\"col-md-5 input-group\">";
    echo "			 <span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-user\"></span>";
    echo "				</span>";
    if (isset($_SESSION["fullname"])) {
        $nam = $_SESSION["fullname"];
    } else {
        $nam = $rec['fullname'];
    }
    echo"	<input type=\"text\" placeholder=\"enter your fullname\" class=\"form-control\" name=\"fullname\" value=\"$nam\" required/>";
    echo "			</div>";
    echo "		</div>";
    echo "		<div class=\"form-group\">";
    echo "			 <div class=\"col-md-5 input-group\">";
    echo "			 <span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-user\"></span>";
    echo "				</span>";
    if (isset($_SESSION["usname"])) {
        $usnam = $_SESSION["usname"];
    } else {
        $usnam = $rec['username'];
        ;
    }
    echo"	<input type=\"text\" placeholder=\"enter your username\" class=\"form-control\" name=\"username\" value=\"$usnam\" required/>";
    echo "			</div>";
    echo "		</div>";
    ?>
        <div class="form-group">
            <div class="col-md-5 input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input type="text" class="form-control" id="pwd" name="password" placeholder="Enter password" required/>
                <span id="palert"></span>
            </div>
        </div>
        <?php
        echo "		  <div class=\"form-group\">";
        echo "			<div class=\"col-md-5 input-group\">";
        echo "				<span class=\"input-group-addon\">";
        echo "							<span class=\"glyphicon glyphicon-phone\"></span>";
        echo "				</span>";
        if (isset($_SESSION["phonenumber"])) {
            $phoneno = $_SESSION["phonenumber"];
        } else {
            $phoneno = $rec['phonenumber'];
            ;
        }
        echo" <input type=\"text\" class=\"form-control text_field\" id=\"pno\" name=\"phonenumber\" placeholder=\"Enter phone number\" value=\"$phoneno\" required/>";
        echo "			</div>";
        echo "		  </div>";
        ?>
        <div class="form-group">
            <div class="col-md-5 input-group">
                <select class="form-control text_field" id="country" name="country" onchange="pop(this.value)">
                    <OPTION>SELECT YOUR COUNTRY</OPTION>
        <?php
        $country = "select * from countries";
        $rcount = mysql_query($country);
        while ($r = mysql_fetch_array($rcount)) {
            echo "<option value=\"{$r['name']}\">{$r['name']}</option>";
        }
        ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5 input-group">
                <select class="form-control text_field" id="state" name="state">
                    <option>select your state</option>
                </select>
            </div>
        </div>
                    <?php
                    echo "		   <div class=\"form-group\">";
                    echo "				<div class=\"col-md-5 input-group\">";
                    echo "				<span class=\"input-group-addon\">";
                    echo "							<span class=\"glyphicon glyphicon-time\"></span>";
                    echo "				</span>";
                    if (isset($_SESSION["age"])) {
                        $age = $_SESSION["age"];
                    } else {
                        $age = $rec['age'];
                    }
                    echo"  <input type=\"text\" class=\"form-control\" id=\"age\" name=\"age\" placeholder=\"Enter your age\" value=\"$age\" required/>";
                    echo "				</div>";
                    echo "			</div>";
                    ?>
        <div class="form-group">
            <div class="col-md-5 input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope"></span>
                </span>
        <?php
        if (isset($_SESSION["email"])) {
            $email = $_SESSION["email"];
        } else {
            $email = $rec['email'];
        }echo"<input type=\"email\" placeholder=\"Enter email address\" class=\"form-control\" name=\"email\"  value=\"$email\" required/>";
        ?>
            </div>
        </div>
        <div class="form-group">
    <?php
    if (isset($_SESSION["gender"]) and $_SESSION["gender"] == 'Male') {
        echo "<label class=\"radio-inline\">";
        echo " <input type=\"radio\" name=\"gender\" id=\"gender1\" value=\"Male\" checked>Male</label>";
        echo "<label class=\"radio-inline\">";
        echo "<input type=\"radio\" name=\"gender\" id=\"gender12\" value=\"Female\">Female</label>";
    } ELSE {
        echo "<label class=\"radio-inline\">";
        echo " <input type=\"radio\" name=\"gender\" id=\"gender1\" value=\"Male\">Male</label>";
        echo "<label class=\"radio-inline\">";
        echo "<input type=\"radio\" name=\"gender\" id=\"gender12\" value=\"Female\" checked>Female</label>";
    }
    ?>
        </div>
        <div class="form-group">
            <div class="col-md-5 input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-pencil"></span>
                </span>
            <?php
            if (isset($_SESSION["bio"])) {
                $bio = $_SESSION["bio"];
                echo "				<textarea name=\"bio\">$bio</textarea>";
            } else if ($rec['bio'] != null) {
                $bio = $rec['bio'];
                echo "				<textarea name=\"bio\">$bio</textarea>";
            } else {
                $bio = "";
                echo"	<textarea placeholder=\"Enter brief description about yourself\" class=\"form-control\" name=\"bio\" value=\"\" required ></textarea>";
            }
            ?>
            </div>
        </div>
                <?php
                /** if($rec['gender']==""){
                  echo "<div class=\"form-group\">
                  `
                  <label class=\"radio-inline\">";
                  echo" <input type=\"radio\" name=\"gender\" id=\"gender\" value=\"Male\">Male</label>
                  <label class=\"radio-inline\">
                  <input type=\"radio\" name=\"gender\" id=\"gender2\" value=\"Female\" checked>Female</label>
                  </div>";
                  echo "<input type=\"hidden\" name=\"se\" value=\"1\"/>";
                  }
                  else{
                  $n=$rec['gender'];
                  echo "<input type=\"hidden\" name=\"se\" value=\"$n\"/>";
                  } */
                ?>
    </fieldset>	
    <fieldset>
        <legend>model info</legend>
        <div class="form-group">
            `	
            <label class="radio-inline">


                <input type="radio" name="model" id="model1" value="YES" onClick="chk2()">Model</label>
            <label class="radio-inline">
                <input type="radio" name="model" id="model12" value="NO" onClick="chk2()" checked>Not Model</label>	


        </div>
        <div id="tes2">
            <div class="form-group">
                <div class="col-md-5">
    <?php
    if (isset($_SESSION["height"])) {
        $height = $_SESSION["height"];
    } else {
        $height = $rec['height'];
    }echo"  <input type=\"number\" class=\"form-control\" id=\"height\" name=\"height\" placeholder=\"Enter your height\" value=\"$height\">";
    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
    <?php
    if (isset($_SESSION["waist"])) {
        $waist = $_SESSION["waist"];
    } else {
        $waist = $rec['waist'];
    } echo"  <input type=\"number\" class=\"form-control\" id=\"waist\" name=\"waist\" placeholder=\"Enter your waist size\" value=\"$waist\">";
    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
    <?php
    if (isset($_SESSION["shoe"])) {
        $shoe = $_SESSION["shoe"];
    } else {
        $shoe = $rec['shoe'];
    } echo"  <input type=\"number\" class=\"form-control\" id=\"shoe\" name=\"shoe\" placeholder=\"Enter your shoe size\" value=\"$shoe\">";
    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <?php
                    if (isset($_SESSION["hip"])) {
                        $hip = $_SESSION["hip"];
                    } else {
                        $hip = $rec['hip'];
                    }echo"  <input type=\"number\" class=\"form-control\" id=\"hip\" name=\"hip\" placeholder=\"Enter your hip size\" value=\"$hip\">";
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <?php
                    if (isset($_SESSION["chest"])) {
                        $chest = $_SESSION["chest"];
                    } else {
                        $chest = $rec['chest'];
                    }echo"<input type=\"number\" class=\"form-control\" id=\"chest\" name=\"chest\" placeholder=\"Enter your  chest\" value=\"$chest\">";
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <?php
                    if (isset($_SESSION["shoulder"])) {
                        $shoulder = $_SESSION["shoulder"];
                    } else {
                        $shoulder = $rec['shoulder'];
                    }echo" <input type=\"number\" class=\"form-control\" id=\"shoulder\" name=\"shoulder\" placeholder=\"Enter your shoulder size\"value=\"$shoulder\" >";
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
        </div>
    </fieldset>	
    <fieldset id="third">
        <legend>Account information</legend>
        <div class="form-group">
            <div class="col-md-5 input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
    <?php
    if (isset($_SESSION["bank"])) {
        $bank = $_SESSION["bank"];
    } else {
        $bank = $rec['bankname'];
    }echo" <input type=\"text\" class=\"form-control\" id=\"bank\" name=\"bank\" placeholder=\"Enter your Bank name\" value=\"$bank\" required/>";
    ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5 input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-inbox"></span>
                </span>
    <?php
    if (isset($_SESSION["accname"])) {
        $accname = $_SESSION["accname"];
    } else {
        $accname = $rec['accountname'];
    }echo" <input type=\"text\" class=\"form-control\" id=\"accname\" name=\"accname\" placeholder=\"Enter your account name\"  value=\"$accname\" required/>";
    ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5 input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-usd"></span>
                </span>
    <?php
    if (isset($_SESSION["accnumber"])) {
        $accnumber = $_SESSION["accnumber"];
    } else {
        $accnumber = $rec['accountnumber'];
    }echo" <input type=\"text\" class=\"form-control\" id=\"accno\" name=\"accnumber\" placeholder=\"Enter your account number\"  value=\"$accnumber\" required/>";
    ?>
            </div>
        </div>
        <div class="form-group">
            <legend id="msg"></legend>
                <?php echo"<input type=\"submit\" name=\"social\" class=\" btn btn-default col-md-offset-3\"  value=\"Submit\" onClick=\"return valid();\"/>"; ?>
        </div>
    </fieldset>	
    </form>
            <?php
            echo "		  </div>";
        } else {
            //$email2=$_SESSION['email'];
            $query111 = "select * from registration where oauth_provider='$provider' and oauth_uid=$ids";
            $result111 = mysql_query($query111);
            if (mysql_num_rows($result111) > 0) {
                $rec111 = mysql_fetch_array($result111);
                $_SESSION['username'] = $rec111['username'];
                $username = $rec111['username'];
                $_SESSION['status'] = $rec111['status'];
                $_SESSION['sex'] = $rec111['gender'];
                $_SESSION['email'] = $rec111['email'];
                //echo $_SESSION['username'];
                echo "<br>";
                //echo $_SESSION['status'];
                //die();
            }
            header('location:chat.php');
        }
        ?>
        <!---------------------------------------------------------------body ends here!---------------------------------------->
    </div>
</div>
</div>

</div>
</div>
<!--FOOTER-->
<footer>
<?php
include("incl/footer.php");
?>
</footer>
</div>
</body>
</html>