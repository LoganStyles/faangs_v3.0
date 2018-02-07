<?php
require_once("incl/cons.php");
//require_once("incl/ses2.php");
require_once ("incl/header_admin.php");
require_once("incl/function.php");
$admin='admin';

?>

<style>

#sidebar {
    min-width: 130px;
}
.nav-link[data-toggle].collapsed:after {
    content: "?";
}
.nav-link[data-toggle]:not(.collapsed):after {
    content: "?";
}

.main_body{
    background-color: #fff;
    padding: 1%;
    margin: 2% auto 2% auto;
    box-shadow: 0 10px 40px 0 rgba(0, 0, 0, 0.2);
}

/*othr sy*/
.men1 li {
    display: inline-block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
	font-size:2em;
	
}
 /* Dropdown Button */
.dropbtn {
   /* background-color: #4CAF50;*/
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: none;
}
#myDropdown{
	display:none;
}
/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}
</style>

<div class="container-fluid h-100" style="margin-top:10%;margin-bottom:10%;">
    <div class="row">
        <div class=" col-md-12" style="background:#fec303;">
        <?php
            
        ?>
        </div>
    </div>
    <div class="row " style="margin:0;">
        <div class="col-12 col-lg-3 col-md-3" style="background:#fff;margin-top:30px;">
          <div class="col-4  d-md-flex bg-faded pt-2 h-100" id="sidebar">
              <?php 
              $content.="<ul class=\"nav flex-column\">";
              $content.="<li><img src=\"images/female.jpg\" class=\"img-rounded\" width=\"250px\" height=\"200px\"/></li>";
              if(isset($_SESSION['createcontest']) && ($_SESSION['createcontest']==1) || $_SESSION['admin']=="$admin"){ 
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"adminpage2.php\">Create Contest</a></li>";
              }
              
              if(isset($_SESSION['paymentrequest']) and ($_SESSION['paymentrequest']==1) or $_SESSION['admin']=="$admin"){ 
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"approve.php\">Payment request</a></li>";
              }
              
              if(isset($_SESSION['vcontestant']) and ($_SESSION['vcontestant']==1) or $_SESSION['admin']=="$admin"){ 
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"stats.php\">View Contestant</a></li>";
              }
              
              if(isset($_SESSION['uploadb']) and ($_SESSION['uploadb']==1) or $_SESSION['admin']=="$admin"){ 
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"banner.php\">Upload Banner</a></li>";
              }
              
              if(isset($_SESSION['deleteb']) and ($_SESSION['deleteb']==1) or $_SESSION['admin']=="$admin"){ 
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"del2.php\">Delete Banner</a></li>";
              }
              
              if(isset($_SESSION['xchange']) and ($_SESSION['xchange']==1) or $_SESSION['admin']=="$admin"){ 
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"rate.php\">Set Exchange Rate</a></li>";
              }
              
              if($_SESSION['admin']=="$admin"){
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"chang.php\">Change password</a></li>";
              }
              if($_SESSION['admin']=="$admin"){
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"mana2.php?id=timer&&act=51\">Change Timer state</a></li>";
              }
              if($_SESSION['admin']=="$admin"){
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"adminchangeuser.php\">Another username</a></li>";
              }
              if($_SESSION['admin']=="$admin"){
                  $content.="<li class=\"nav-item\"><a class=\"nav-link collapsed\" href=\"#submenu1\" data-toggle=\"collapse\" data-target=\"#submenu1\">Manage Admin</a>";
                  $content.="<div class=\"collapse\" id=\"submenu1\" aria-expanded=\"false\">";
                  $content.="<ul class=\"flex-column pl-2 nav\">";
                  $content.="<li class=\"nav-item\"><a class=\"nav-link py-0\" href=\"manageadmin.php\">Create Admin</a></li>";
                  $content.="<li class=\"nav-item\"><a class=\"nav-link py-0\" href=\"viewadmin.php\">View Admin</a></li>";
                  $content.="</ul>";
                  $content.="</div></li>";
              }
              
              $content.="<li class=\"nav-item\"><a class=\"nav-link collapsed\" href=\"#submenu2\" data-toggle=\"collapse\" data-target=\"#submenu2\">Manage VIP</a>";
                  $content.="<div class=\"collapse\" id=\"submenu2\" aria-expanded=\"false\">";
                  $content.="<ul class=\"flex-column pl-2 nav\">";
                  if(isset($_SESSION['viewvip']) and ($_SESSION['viewvip']==1) or $_SESSION['admin']=="$admin"){
                  $content.="<li class=\"nav-item\"><a class=\"nav-link py-0\" href=\"viewvip.php\">View Vip</a></li>";
                  }
                  
                  if(isset($_SESSION['addvip']) and ($_SESSION['addvip']==1) or $_SESSION['admin']=="$admin"){
                  $content.="<li class=\"nav-item\"><a class=\"nav-link py-0\" href=\"addvip.php\">View Admin</a></li>";
                  }
                  $content.="</ul>";
                  $content.="</div></li>";
              
              
              
              if($_SESSION['admin']=="$admin"){
                  $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"vipupload2.php\">Upload Vip Photo</a></li>";
              }
              $content.=" </ul>";
              
              echo $content;
?>
              
              
              <script>
                    function myFunction() {
                        var t = document.getElementById("myDropdown");
                        t.style.display = "block";
                    }
                    function myFunction2() {
                        var t = document.getElementById("myDropdown");
                        t.style.display = "none";
                    }
                    function myFunction1() {
                        var t = document.getElementById("myDropdown1");
                        t.style.display = "block";
                    }
                    function myFunction21() {
                        var t = document.getElementById("myDropdown1");
                        t.style.display = "none";
                    }
// Close the dropdown menu if the user clicks outside of it
                </script>
             
          </div>
      </div>
        <div class="col-md-8" style="background:#F5F5F5;">
                <div class="row" style="">
    