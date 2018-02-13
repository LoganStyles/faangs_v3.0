<?php
require_once("incl/cons.php");
session_start();
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
            $provider = $_SESSION['provider'];
            $ids = $_SESSION['ids'];
        ?>
            </div>
    </div>
    
    <div class="row " style="margin:0;">
        <div class="col-12 col-lg-4 col-md-4" style="background:#fff;margin-top:30px;">
          <div class="  d-md-flex bg-faded pt-2 " id="sidebar">
              <?php 
              $content="";
              //if (isset($_SESSION['status']) && ($_SESSION['status'] == 1)) { 
                   $content.="<ul class=\"nav flex-column\">";
                   $content.="<li><img src=\"images/female.jpg\" class=\"img-rounded\" width=\"250px\" height=\"200px\"/></li>";
                   $content.="<li class=\"nav-item\"><a class=\"nav-link\" href=\"social.php\">Complete Profile Registration</a></li>";
                   $content.=" </ul>";
                   $content.="";
             // }
              echo $content;
            ?>
        </div>
      </div>
        <div class="col-md-8" style="background:#F5F5F5;">
                <div class="row" style="">

