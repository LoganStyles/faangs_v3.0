<?php
require_once("incl/cons.php");
require_once("incl/ses.php");
require_once("incl/function.php");
require_once ("incl/forumheader.php");
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

<div class="container-fluid " style="margin-top:10%;margin-bottom:10%;">
    <div class="row">
        <div class=" col-md-12" style="background:#fec303;">
        <?php
            $output="";
            $contestant = $_SESSION['username'];
            
            if (isset($_SESSION['username']) && ($_SESSION['status'] == 2)) {
                $query = "SELECT * from total where username='$contestant' limit 1";
                
                $result1 = mysql_query($query);
                    $rec = mysql_fetch_array($result1);
                    $query2 = "SELECT * from fund where username='$contestant' limit 1";
                    
                    $result2 = mysql_query($query2);
                    $rec2 = mysql_fetch_array($result2);
                    
                    $output.= "<div class=\"men1\">";
                    $output.="<ul>";
                    $output.= "<li>Total like:";
                    if ($rec['tos'] == null) {
                        $output.="0";
                    } else {
                        $output.= "{$rec['tos']}";
                    }
                    $output.="</li>";
                    $output.= "	<li id=\"fund\">Fund Balance:";
                    if ($rec2['balance'] == null || $rec2['balance'] <0) {
                        $output.= "0";
                    } else {
                        $output.= $rec2['balance'];
                    }
                    $output.= "<img src=\"images/money2.png\" class=\"img-rounded\" /></li>";
                    $output.="</ul>";
                    $output.= "</div>";
            }
            echo $output;
            $query21 = "SELECT * from picture where username='$contestant' and profile='YES' limit 1";
            $result21 = mysql_query($query21);
        ?>
            </div>
    </div>
    <div class="row " style="margin:0;">
        <div class="col-12 col-lg-4 col-md-4" style="background:#fff;margin-top:30px;">
          <div class="  d-md-flex bg-faded pt-2 " id="sidebar">
              <?php 
              $content="";
              if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) { 
                   $content.="<ul class=\"nav flex-column\">";
                   $content.="<li><img src=\"img/{$pic}\" class=\"img-rounded\" width=\"250px\" height=\"200px\"/></li>";
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"participate.php\">Profile</a></li>";
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"social.php\">Complete Profile Registration</a></li>";
                   $content.=" </ul>";
                   $content.="";
                  
                  
              }
              
              else if (isset($_SESSION['username']) && ($_SESSION['status'] == 2)) {
                  $gen = $_SESSION['sex'];
                  $content.="<ul class=\"nav flex-column\">";
                  $content.="<li><img src=\"{$pic}\" class=\"img-rounded\" width=\"250px\" height=\"200px\"/></li>";
                  $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"chat2.php?user=$contestant\">PROFILE</a></li>";
                  $query1113 = "select * from registration where username='$contestant'";
                   
                  $result131 = mysql_query($query1113);
                    $rec131 = mysql_fetch_array($result131);
                    $nu = $rec131['phs'];
                    
                 $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"uploadimage.php\">UPLOAD IMAGE</a></li>";
                 $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"chat.php\">FORUM</a></li>";
                 $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"buycredit.php\">BUY CREDIT</a></li>";
                 $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"request.php\">REQUEST PAYMENT</a></li>";
                 $vip = "select * from vip where username='$contestant'";
                $vip1 = mysql_query($vip);
                if (mysql_num_rows($vip1) > 0) {
                    $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"vipupload.php\">VIP PHOTO</a></li>";
                }else{
                    $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"vipcredit.php\">VIP PHOTO</a></li>";
                }
                $content.="<li class=\"nav-item\" onmouseover=\"myFunction21()\"><a class=\"nav-link\" href=\"del.php\">PICTURE MANAGEMENT</a></li>";
                $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"edit.php\">EDIT PROFILE</a></li>";
                $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"changepass.php\">CHANGE PASSWORD</a></li>";
                 $content.=" </ul>";
                 
              }
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
    