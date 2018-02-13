<style>

.menu2 li {
    display:block;
	width:430px;
    color: green;
    padding: 8px 0 8px 16px;
    text-decoration: none;
	text-transform: capitalize;
	height:90px;
	background:#fec303;
	font-weight:bold;
	font-size:1.5em;
	
	border-bottom: 1px solid #fff;
	
}
.menu2 li a{
	color:#000000;

}
.menu21 li {
    display:block;
    padding: 8px 0 8px 16px;
    text-decoration: none;
	text-transform: capitalize;
	height:70px;
	background:#000000;
	font-weight:bold;
	font-size:1.5em;
	margin-left:0;
	
	border-bottom: 1px solid #fff;
	
}
.menu21 li a{
	color:#fec303;

}

.menu21 li:hover {
    display:block;
    padding: 8px 0 8px 16px;
    text-decoration: none;
	text-transform: capitalize;
	height:70px;
	background:#50394c;
	font-weight:bold;
	font-size:1.5em;
	margin-left:0;

	border-bottom: 1px solid #fff;
	
}
.menu2 li:hover {
    display:block;
    padding: 8px 0 8px 16px;
    text-decoration: none;
	text-transform: capitalize;
	height:70px;
	background:#50394c;
	font-weight:bold;
	font-size:1.5em;
	margin-left:0;

	border-bottom: 1px solid #fff;
	
}

</style>

<?php
ob_start();
require_once("incl/nav_admin.php");

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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">
        <?php
        if (isset($_GET['id'])) {
            echo "Manage " . $username . " Details";
        }
        ?>
    </h3>
    
    <div class="row" style="margin-top:10px;">
                <div class="col-md-6" style="margin-top:2px;">
                    <ul class="menu2">

<?php
if (isset($_GET['id'])) {
    if (isset($_SESSION['updateuser']) and ( $_SESSION['updateuser'] == 1) or $_SESSION['admin'] == "$admin") {
        echo "<li><a href=\"mana2.php?id=$username&&act=1\"><span class=\"glyphicon glyphicon-user\"></span>update personal data</a></li>";
    }
    if (isset($_SESSION['bankdetail']) and ( $_SESSION['bankdetail'] == 1) or $_SESSION['admin'] == "$admin") {
        echo "<li><a href=\"mana2.php?id=$username&&act=2\"><span class=\"glyphicon glyphicon-bitcoin\"></span>update bank detail</a></li>";
    }
    if (isset($_SESSION['modelinfo']) and ( $_SESSION['modelinfo'] == 1) or $_SESSION['admin'] == "$admin") {

        echo "<li><a href=\"mana2.php?id=$username&&act=3\"><span class=\"glyphicon glyphicon-sunglasses\"></span>update model information</a></li>";
    }
    if (isset($_SESSION['updatelike']) and ( $_SESSION['updatelike'] == 1) or $_SESSION['admin'] == "$admin") {
        echo "<li><a href=\"mana2.php?id=$username&&act=32\"><span class=\"glyphicon glyphicon-sunglasses\"></span>Update like</a></li>";
    }
}
?>	
                    </ul>
                </div>
                <div class="col-md-6"  style="margin-top:2px;">
                    <ul class="menu21">
                        <?php
                        if (isset($_GET['id'])) {
                            if (isset($_SESSION['updateufund']) and ( $_SESSION['updateufund'] == 1) or $_SESSION['admin'] == "$admin") {
                                echo"	<li><a href=\"mana2.php?id=$username&&act=4\"><span class=\"glyphicon glyphicon-usd\"></span>update user fund</a></li>";
                            }
                            if (isset($_SESSION['suspend']) and ( $_SESSION['suspend'] == 1) or $_SESSION['admin'] == "$admin") {

                                echo"	<li><a href=\"mana2.php?id=$username&&act=5\"><span class=\"glyphicon glyphicon-minus-sign\"></span>suspend user</a></li>";
                            }
                            if (isset($_SESSION['deleteu']) and ( $_SESSION['deleteu'] == 1) or $_SESSION['admin'] == "$admin") {
                                echo"	<li><a href=\"mana2.php?id=$username&&act=6\"><span class=\"glyphicon glyphicon-trash\"></span>delete user</a></li>";
                            }
                            if (isset($_SESSION['changeupass']) and ( $_SESSION['changeupass'] == 1) or $_SESSION['admin'] == "$admin") {
                                echo"	<li><a href=\"mana2.php?id=$username&&act=7\"><span class=\"glyphicon glyphicon-lock\"></span>change password</a></li>";
                            }
                            if (isset($_SESSION['admin'])and $_SESSION['admin'] == "$admin") {
                                echo"	<li><a href=\"usercprofile.php?id=$username\"><span class=\"glyphicon glyphicon-user\"></span>View Complete Profile</a></li>";
                            }
                        }
                        ?>	
                    </ul>
                </div>
            </div>

    
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();
?>