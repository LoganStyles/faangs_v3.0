<?php  ob_start(); 
require_once("incl/participant.php");
$pe = $_SESSION['username'];


if (isset($_POST['edit'])) {
    
    $username = $_GET['user'];
    $status = test_input($_POST['status']);

    if ($status == 'off') {
        $query1 = "update registration set phs='0' where username='$username'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>your phone will now be visible on your gallery page</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header("Refresh:1; url=contest2.php?id={$username}");
        }
    } else {
        $query1 = "update registration set phs='2'where username='$username'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>your phone number can no longer be visible on the gallery page</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header("Refresh:1; url=contest2.php?id={$username}");
        }
    }
}
?>

<?php
if (isset($_POST['submit'])) {

    $email = test_input($_POST['email']);
    $email = strtolower($email);
    $email2 = $_SESSION['existingemail'];
    $email2 = strtolower($email2);
    $stat = 0;
    $query3 = "select * from registration where email!='$email2'";

    $result1 = mysql_query($query3);
    while ($rec = mysql_fetch_array($result1)) {
        $peopleemail = $rec['email'];

        $pemail = strtolower($peopleemail);
        if ($pemail == $email) {
            $stat = $stat + 1;
        }
    }

    if ($stat > 0) {

        $nam = "<H4> {$email} email already exit</H4>";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        //header('Refresh:1; url=participate.php');
    } else {

        $fullname = test_input($_POST['fullname']);
        $fullname = strtoupper($fullname);
        //$username=test_input($_POST['username']);
        //$username=strtolower($username);


        $status = test_input($_POST['status']);
        if ($status != 1) {
            $_POST['height'] = "not a model";
            $_POST['waist'] = "not a model";
            $_POST['shoe'] = "not a model";
            //$age="not a model";
            $_POST['hip'] = "not a model";
            $_POST['chest'] = "not a model";
            $_POST['shoulder'] = "not a model";
        }

        $phonenumber = test_input($_POST['phonenumber']);
        $country = test_input($_POST['country']);
        $country = strtoupper($country);
        $state = test_input($_POST['state']);
        $state = strtoupper($state);
        $age = test_input($_POST['age']);
        //$gender=test_input($_POST['gender']);
        //	$gender=strtoupper($gender);
        $bio = test_input($_POST['bio']);
        $height = test_input($_POST['height']);
        $waist = test_input($_POST['waist']);
        $shoe = test_input($_POST['shoe']);
        $hip = test_input($_POST['hip']);
        $chest = test_input($_POST['chest']);
        $shoulder = test_input($_POST['shoulder']);
        $query1 = "update registration set fullname='$fullname',email='$email',phonenumber='$phonenumber',
		country='$country',state='$state',age='$age',bio='$bio',height='$height',waist='$waist',shoe='$shoe', hip='$hip',chest='$chest',shoulder='$shoulder' where username='$pe'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "your personal data have been successfully updated</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=chat.php');
        }
    }
}
?>
<div class="col-md-12 t">

    <!-----------------------------------------------------------------form body------------------------------------>
    <div class="row">
        <div class="col-md-12">
<?php
$query = "SELECT * from registration where username='$pe' limit 1";

$result1 = mysql_query($query);
$rec = mysql_fetch_array($result1);

echo "<div class=\"col-md-7 col-md-offset-4 \">";
echo "<h5 style=\"font-weight:bold;font-size:1em;\">Edit your profile below</h5>";
echo "<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"\" id=\"form1\">";
echo "		  <div class=\"form-group\">";
echo "			 <div class=\"input-group\">";
echo "			 <span class=\"input-group-addon\">Fullname";
echo "				</span>";
echo "				<input type=\"text\" value=\"{$rec['fullname']}\" class=\"form-control\" name=\"fullname\" required/>";
echo "			</div>";
echo "		</div>";

echo "		  <div class=\"form-group\">";
echo "			<div class=\" input-group\">";
echo "				<span class=\"input-group-addon\">Phone";
echo "				</span>";
echo "			  <input type=\"text\" class=\"form-control text_field\" id=\"pno\" name=\"phonenumber\" value=\"{$rec['phonenumber']}\" required/>";
echo "			</div>";
echo "		  </div>";
echo "		  <div class=\"form-group\">";
echo "			<div class=\" input-group\">";
echo "			<span class=\"input-group-addon\">Country";
echo "				</span>";
echo "			  <input type=\"text\" class=\"form-control text_field\" id=\"country\" name=\"country\" value=\"{$rec['country']}\" required/>";
echo "			</div>";
echo "		  </div>";
echo "		  <div class=\"form-group\">";
echo "			<div class=\"col-md-5 input-group\">";
echo "			<span class=\"input-group-addon\">State";
echo "				</span>";
echo "			  <input type=\"text\" class=\"form-control text_field\" id=\"state\" name=\"state\" value=\"{$rec['state']}\" required/>";
echo "			</div>";
echo "		  </div>";
echo "		   <div class=\"form-group\">";
echo "				<div class=\" input-group\">";
echo "				<span class=\"input-group-addon\">Age";
echo "				</span>";
echo "				  <input type=\"text\" class=\"form-control\" id=\"age\" name=\"age\" value=\"{$rec['age']}\" required/>";
echo "				</div>";
echo "			</div>";
echo "		<div class=\"form-group\">";
echo "			 <div class=\" input-group\">";
echo "			 <span class=\"input-group-addon\">Email";
echo "				</span>";
$_SESSION['existingemail'] = $rec['email'];

echo "			<input type=\"email\" value=\"{$rec['email']}\" class=\"form-control\" name=\"email\" required/>";
echo "			</div>";
echo "		</div>";

echo "		<div class=\"form-group\">";
echo "			 <div class=\" input-group\">";
echo "				<span class=\"input-group-addon\">Bio";
echo "							<span class=\"glyphicon glyphicon-pencil\"></span>";
echo "				</span>";
echo "				<textarea name=\"bio\"> {$rec["bio"]}</textarea>";
echo "			</div>";
echo "		</div>";

//////////////////////////////////////
if ($rec['model'] == 'YES') {
    echo "		  <div class=\"form-group\">";
    echo "			 <div class=\" input-group\">";
    echo "			 <span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-user\">model status</span>";
    echo "				</span>";
    echo "				<input type=\"text\" value=\"{$rec['model']}\" class=\"form-control\" name=\"model\" readonly/>";
    echo "			</div>";
    echo "		</div>";
    echo "		  <div class=\"form-group\">";
    echo "			 <div class=\" input-group\">";
    echo "			 <span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-user\">height</span>";
    echo "				</span>";
    echo "				<input type=\"text\" value=\"{$rec['height']}\" class=\"form-control\" name=\"height\" required/>";
    echo "			</div>";
    echo "		</div>";

    echo "		  <div class=\"form-group\">";
    echo "			<div class=\" input-group\">";
    echo "				<span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-phone\">waist</span>";
    echo "				</span>";
    echo "			  <input type=\"text\" class=\"form-control text_field\" id=\"pno\" name=\"waist\" value=\"{$rec['waist']}\" required/>";
    echo "			</div>";
    echo "		  </div>";
    echo "		  <div class=\"form-group\">";
    echo "			<div class=\" input-group\">";
    echo "			<span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-home\">shoe</span>";
    echo "				</span>";
    echo "			  <input type=\"text\" class=\"form-control text_field\" id=\"country\" name=\"shoe\" value=\"{$rec['shoe']}\" required/>";
    echo "			</div>";
    echo "		  </div>";
    echo "<div class=\"form-group\">";
    echo "			 <div class=\" input-group\">";
    echo "			 <span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-user\">hip</span>";
    echo "				</span>";
    echo "				<input type=\"text\" value=\"{$rec['hip']}\" class=\"form-control\" name=\"hip\" required/>";
    echo "			</div>";
    echo "		</div>";

    echo "		  <div class=\"form-group\">";
    echo "			<div class=\" input-group\">";
    echo "				<span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-phone\">chest</span>";
    echo "				</span>";
    echo "			  <input type=\"text\" class=\"form-control text_field\" id=\"pno\" name=\"chest\" value=\"{$rec['chest']}\" required/>";
    echo "			</div>";
    echo "		  </div>";
    echo "		  <div class=\"form-group\">";
    echo "			<div class=\" input-group\">";
    echo "			<span class=\"input-group-addon\">";
    echo "							<span class=\"glyphicon glyphicon-home\">shoulder</span>";
    echo "				</span>";
    echo "			  <input type=\"text\" class=\"form-control text_field\" id=\"country\" name=\"shoulder\" value=\"{$rec['shoulder']}\" required/>";
    echo "			</div>";
    echo "		  </div>";
    echo"			<input type=\"hidden\" name=\"status\" value=\"1\"/>";
} else {
    echo"			<input type=\"hidden\" name=\"status\" value=\"2\"/>";
}
echo "		 <div class=\"form-group\">";
echo "				<input type=\"submit\" name=\"submit\" class=\" btn btn-primary col-md-offset-3\"  value=\"Update\"/>";
echo "		  </div>";
echo "</form>";
echo "		  </div>";
?>
        </div>
        <div class="col-md-12">
            <?php
            $pe3 = $rec['phs'];

            if ($pe3 == 0) {
                $pe = "on";
            }
            if ($pe3 == 2) {
                $pe = "off";
            }
            
            echo "		  </div>";
            ?>

        </div>
        <!---------------------------------------------------------------body ends here!---------------------------------------->


    </div>
</div>
</div>
</div>
</div>
</div>
<!--FOOTER-->
<footer>
    <?php
    ob_end_flush();
    ?>
</footer>
</div>
</body>

</html>