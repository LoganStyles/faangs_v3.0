<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_POST['submit'])) {
    $username = $_GET['user'];
    $email = test_input($_POST['email']);
    $email = strtolower($email);
    $query3 = "select * from registration where email='$email'";
    $result1 = mysql_query($query3);
    $rec = mysql_fetch_array($result1);
    $email2 = $rec['email'];
    if ((mysql_num_rows($result1) >= 0) and ( $email2 != $email)) {
        $nam = "<H4> {$email} email already exit</H4>";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=stats.php');
    } else {
        $fullname = test_input($_POST['fullname']);
        $fullname = strtoupper($fullname);
        $phonenumber = test_input($_POST['phonenumber']);
        $country = test_input($_POST['country']);
        $country = strtoupper($country);
        $state = test_input($_POST['state']);
        $state = strtoupper($state);
        $age = test_input($_POST['age']);
        $bio = test_input($_POST['bio']);
        $query1 = "update registration set fullname='$fullname',email='$email',phonenumber='$phonenumber',"
                . "country='$country',state='$state',age='$age',bio='$bio' "
                . "where username='$username'";

        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>{$username} personal data have been successfully updated</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        }
    }
}

if (isset($_POST['submit2'])) {
    $username = $_GET['user'];
    $bank = test_input($_POST['bank']);
    $bank = strtoupper($bank);
    $accname = test_input($_POST['accname']);
    $accname = strtoupper($accname);
    $accnumber = test_input($_POST['accnumber']);
    $query1 = "update registration set bankname='$bank',accountname='$accname',accountnumber='$accnumber' "
            . "where username='$username'";
    
    $result = mysql_query($query1);
    if (mysql_affected_rows() >= 1) {
        $nam = "<H4>{$username} bank detail have been successfully updated</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=stats.php');
    }
}

if (isset($_POST['submit3'])) {
    $username = $_GET['user'];
    $height = test_input($_POST['height']);
    $waist = test_input($_POST['waist']);
    $shoe = test_input($_POST['shoe']);
    $hip = test_input($_POST['hip']);
    $chest = test_input($_POST['chest']);
    $shoulder = test_input($_POST['shoulder']);
    $query1 = "update registration set height='$height',waist='$waist',shoe='$shoe', hip='$hip',chest='$chest',shoulder='$shoulder' "
            . "where username='$username'";
    
    $result = mysql_query($query1);
    if (mysql_affected_rows() >= 1) {
        $nam = "<H4>{$username} model detail have been successfully updated</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=stats.php');
    }
}

if (isset($_POST['submit32'])) {
    $username = $_GET['user'];

    $like = test_input($_POST['like']);

    $sta = test_input($_POST['sta']);

    if ($sta == 1) {
        $query1 = "update total set tos='$like'where username='$username'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>{$username} likes  has been successfully updated</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        } else {
            $nam = "<H4>you have error in your query/H4>";
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        }
    } else {
        $query21 = "insert into total(username,tos)values('$username','$like')";
        $res = mysql_query($query21);
        if ($res) {
            $nam = "<H4>{$username} likes  has been successfully updated</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        } else {
            $nam = "<H4>you have error in your query/H4>";
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        }
    }
}

if (isset($_POST['submit4'])) {
    $username = $_GET['user'];
    $balance = test_input($_POST['balance']);
    $query1 = "update fund set balance='$balance' where username='$username'";
    $result = mysql_query($query1);
    if (mysql_affected_rows() >= 1) {
        $nam = "<H4>{$username} fund detail have been successfully updated</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=stats.php');
    } else {
        $query4 = "insert into fund(username,balance)values('$username','$balance')";
        if (mysql_query($query4)) {
            $nam = "<H4>{$username} fund detail have been successfully updated</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        }
    }
}

if (isset($_POST['submit5'])) {
    $username = $_GET['user'];
    $status = test_input($_POST['status']);
    if ($status == 'active') {
        $query1 = "update registration set status='10'where username='$username'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>{$username} account have been suspended</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        }
    } else {
        $query1 = "update registration set status='2'where username='$username'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>{$username} account have been un-suspended</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        }
    }
}

if (isset($_POST['submit51'])) {

    $status = test_input($_POST['status']);
    if ($status == 'timer is on') {
        $query1 = "update contest set state='off'where status='active'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>Contest timer has been off</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=adminpage.php');
        }
    } else {
        $query1 = "update contest set state='on'where status='active'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>Contest timer has been turned on</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=adminpage.php');
        }
    }
}

if (isset($_POST['submit6'])) {
    $username = $_GET['user'];
    //echo "$username";
    $missing = array();
    $table = array("picture", "registration", "fund", "liketracker", "total", "msg");
    foreach ($table as $ta) {
        $query1 = "delete  from $ta where username='$username'";
        $result = mysql_query($query1);
        array_push($missing, 1);
    }
    if (count($missing) > 0) {
        $nam = "<H4>{$username} personal data have been successfully deleted</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=stats.php');
    }
}

if (isset($_POST['submit7'])) {
    $username = $_GET['user'];
    //echo "$username";
    $p1 = test_input($_POST['p1']);
    $p2 = test_input($_POST['p2']);
    if ($p1 == $p2) {
        $p1 = md5($p1);
        $query1 = "update registration set password='$p1'where username='$username'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>{$username} password has been changed successfully</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        }
    } else {
        $nam = "<H4>update fail</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=stats.php');
    }
}

if (isset($_GET['id'])) {
    $username = test_input($_GET['id']);
}
?>
<section id="page-keeper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4><?php echo $msg;?></h4>
      </div>
<div class="col-md-10 t main_body">

    <h3 style="margin-top:10px;TEXT-ALIGN:CENTER;">
<?php
    if (isset($_GET['id'])) {
            echo "Manage " . $username . " Details";
        }
        ?>
    </h3>
    
    <?php
    $content= "";
    if (isset($_GET['act'])) {
    $action = $_GET['act'];
    if ($action == 1) {
        
        if (isset($_GET['id'])) {
            $content.= "<div class=\"col-md-7 col-md-offset-4 \">";
            $query = "SELECT * from registration where username='$username'";
            $result1 = mysql_query($query);
            $rec = mysql_fetch_array($result1);
            
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"fullname\">Name</label>";
            $content.="<input type=\"text\" value=\"{$rec['fullname']}\" class=\"form-control\" name=\"fullname\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"phonenumber\">Phonenumber</label>";
            $content.="<input type=\"text\" value=\"{$rec['phonenumber']}\" class=\"form-control\" name=\"phonenumber\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"country\">Country</label>";
            $content.="<input type=\"text\" value=\"{$rec['country']}\" class=\"form-control\" name=\"country\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"state\">State</label>";
            $content.="<input type=\"text\" value=\"{$rec['state']}\" class=\"form-control\" name=\"state\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"age\">Age</label>";
            $content.="<input type=\"text\" value=\"{$rec['age']}\" class=\"form-control\" name=\"age\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"email\">Email</label>";
            $content.="<input type=\"email\" value=\"{$rec['email']}\" class=\"form-control\" name=\"email\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"bio\">Bio</label>";
            $content.="<textarea name=\"bio\"> {$rec["bio"]}</textarea>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit\" class=\"btn btn-primary col-12 col-md-6 col-lg-4\">Update</button>";
            
            $content.="</form></div>";
        }
        
        echo $content;
    }
    
    if ($action == 2) {
        $content= "";
        $content= "<div class=\"col-md-7 col-md-offset-4 \">";
            $query = "SELECT * from registration where username='$username'";
            $result1 = mysql_query($query);
            $rec = mysql_fetch_array($result1);
            
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"bankname\">Bank</label>";
            $content.="<input type=\"text\" value=\"{$rec['bankname']}\" class=\"form-control\" name=\"bank\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"accname\">Account Name</label>";
            $content.="<input type=\"text\" value=\"{$rec['accountname']}\" id=\"pno\" class=\"form-control\" name=\"accname\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"accnumber\">Account Number</label>";
            $content.="<input type=\"text\" value=\"{$rec['accountnumber']}\" class=\"form-control\" name=\"accnumber\" required>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit2\" class=\"btn btn-primary col-12 col-md-6 col-lg-4\">Update</button>";
            
            $content.="</form></div>";
            echo $content;
    }
    
    if ($action == 3) {
        $content= "";
        $content.= "<div class=\"col-md-7 col-md-offset-4 \">";
            $query = "SELECT * from registration where username='$username'";
            $result1 = mysql_query($query);
            $rec = mysql_fetch_array($result1);
            
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"model\">Model Status</label>";
            $content.="<input type=\"text\" value=\"{$rec['model']}\" class=\"form-control\" name=\"model\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"height\">Height</label>";
            $content.="<input type=\"text\" value=\"{$rec['height']}\" id=\"pno\" class=\"form-control\" name=\"height\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"waist\">Waist</label>";
            $content.="<input type=\"text\" value=\"{$rec['waist']}\" class=\"form-control\" name=\"waist\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"shoe\">Shoe</label>";
            $content.="<input type=\"text\" value=\"{$rec['shoe']}\" class=\"form-control\" name=\"shoe\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"hip\">Hip</label>";
            $content.="<input type=\"text\" value=\"{$rec['hip']}\" class=\"form-control\" name=\"hip\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"chest\">Chest</label>";
            $content.="<input type=\"text\" value=\"{$rec['chest']}\" class=\"form-control\" name=\"chest\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"shoulder\">Shoulder</label>";
            $content.="<input type=\"text\" value=\"{$rec['shoulder']}\" class=\"form-control\" name=\"shoulder\" required>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit3\" class=\"btn btn-primary col-12 col-md-6 col-lg-4\">Update</button>";
            
            $content.="</form></div>";
            
            echo $content;
    }
    
    if ($action == 32) {
        $content= "";
        $content.= "<div class=\"col-md-7 col-md-offset-4 \">";
            $query = "SELECT * from total where username='$username'";
            $result1 = mysql_query($query);
            $rec = mysql_fetch_array($result1);
            
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            $li = $rec['tos'];
        if ($li == null or $li <= 0) {
            $rec['tos'] = 0;
            $a = 0;
        } else {
            $rec['tos'] = $rec['tos'];
            $a = 1;
        }
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"like\">LIke</label>";
            $content.="<input type=\"text\" value=\"{$rec['tos']}\" class=\"form-control\" name=\"like\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"height\">Height</label>";
            $content.="<input type=\"text\" value=\"$a\" id=\"pno\" class=\"form-control\" name=\"sta\" required>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit32\" class=\"btn btn-primary col-12 col-md-6 col-lg-4\">Update</button>";
            
            $content.="</form></div>";
            
            echo $content;
    }
    
    if ($action == 4) {
        $content= "";
        $content.= "<div class=\"col-md-7 col-md-offset-4 \">";
            $query = "SELECT * from total where username='$username'";
            $result1 = mysql_query($query);
            $rec = mysql_fetch_array($result1);
            
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"like\">LIke</label>";
            $content.="<input type=\"text\" value=\"{$rec['balance']}\" class=\"form-control\" name=\"balance\" required>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit4\" class=\"btn btn-primary col-12 col-md-6 col-lg-4\">Update</button>";
            
            $content.="</form></div>";
            
            echo $content;
    }
    
    if ($action == 5) {
        $query = "SELECT * from registration where username='$username'";
        $result1 = mysql_query($query);
        $rec = mysql_fetch_array($result1);
        $pe3 = $rec['status'];
        if ($pe3 == 10) {
            $pe = "suspended";
        }
        if ($pe3 == 2) {
            $pe = "active";
        }
        
        $content.= "<div class=\"col-md-7 col-md-offset-4 \">";
            $content= "";           
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"status\">status</label>";
            $content.="<input type=\"text\" value=\"{$pe}\" class=\"form-control\" name=\"status\" required>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit5\" class=\"btn btn-primary col-12 col-md-6 col-lg-6\">Change State</button>";
            
            $content.="</form></div>";
            echo $content;
    }
    
    if ($action == 51) {
        $query = "SELECT * from contest";
        $result1 = mysql_query($query);
        $rec = mysql_fetch_array($result1);
        $pe3 = $rec['state'];
        if ($pe3 == "off") {
            $pe = "timer is off";
        }
        if ($pe3 == "on") {
            $pe = "timer is on";
        }
        
        $content.= "<div class=\"col-md-7 col-md-offset-4 \">";
                       
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"status\">status</label>";
            $content.="<input type=\"text\" value=\"{$pe}\" class=\"form-control\" name=\"status\" required>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit51\" class=\"btn btn-primary col-12 col-md-6 col-lg-6\">Change State</button>";
            
            $content.="</form></div>";
            echo $content;
    }
    
    if ($action == 6) {
        $query = "SELECT * from contest";
        $result1 = mysql_query($query);
        $rec = mysql_fetch_array($result1);
        $pe3 = $rec['state'];
        if ($pe3 == "off") {
            $pe = "timer is off";
        }
        if ($pe3 == "on") {
            $pe = "timer is on";
        }
        
        $content.= "<div class=\"col-md-7 col-md-offset-4 \">";
                       
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"status\">status</label>";
            $content.="<input type=\"text\" value=\"{$rec['username']}\" class=\"form-control\" name=\"username\" required>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit6\" class=\"btn btn-primary col-12 col-md-6 col-lg-4\">Delete this user</button>";
            
            $content.="</form></div>";
            echo $content;
    }
    
    if ($action == 7) {
        $query = "SELECT * from registration where username='$username'";
        $result1 = mysql_query($query);
        $rec = mysql_fetch_array($result1);
        
        $content.= "<div class=\"col-md-7 col-md-offset-4 \">";
                       
            $content.="<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"mana2.php?user={$username}\" id=\"form1\">";
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"status\">password</label>";
            $content.="<input type=\"password\" class=\"form-control\"  name=\"Enter password\" required>";
            $content.="</div></div>";
            
            $content.="<div class=\"form-row\"><div class=\"form-group col-md-12\">";
            $content.="<label for=\"status\">confirm password</label>";
            $content.="<input type=\"password\" class=\"form-control\" id=\"pno\" name=\"p2\" name=\"confirm password\" required>";
            $content.="</div></div>";
            
            $content.="<button type=\"submit\" name=\"submit7\" class=\"btn btn-primary col-12 col-md-6 col-lg-4\">Submit</button>";
            
            $content.="</form></div>";
            echo $content;
    }
    
    
    }
    ?>
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();
?>