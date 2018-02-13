<?php
require_once("incl/cons.php");
//require_once("incl/ses.php");
session_start();
//cont();
?>
<!DOCTYPE html>
<style>
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
<html lang="en">
    <?php
    require_once("incl/title.php");
    ?>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/contest.css">
    <link rel="stylesheet" href="css/profile2.css">
    <body>
        <!--header line-->
        <!--header line-->
        <?php
        include("incl/header3.php");
        include("incl/function.php");
        ?>
        <div class="clearfix"> </div>
    </div>
    <!--------header2-->

    <div class="container-fluild">

        <div class="row" style="margin:0px;">
            <div class="col-md-12" style="background:#fec303;">
                <?php
                $provider = $_SESSION['provider'];
                $ids = $_SESSION['ids'];
                ?>
            </div>

        </div>

        <!---side nav-->
        <div class="row" style="margin:0;">
            <div class="col-md-3" style="background:#fec303;margin-top:30px;">
                <div class="sidebar-nav">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <?php
                            if (isset($_SESSION['status']) && ($_SESSION['status'] == 1)) {
                                echo" <ul class=\"nav navbar-nav\" id=\"pro\">";

                                echo"		<li><img src=\"images/female.jpg\" class=\"img-rounded\" width=\"250px\" height=\"200px\"/></li>";

                                //echo"		<li><a href=\"participate.php\"><span class=\"glyphicon glyphicon-user\"></span>PROFILE</a></li>";
                                echo"		<li><a href=\"social.php\"><span class=\"glyphicon glyphicon-user\"></span>Complete Profile Registration</a></li>";
                                // echo"		<li><a href=\"uploadimage.php\"><span class=\"glyphicon glyphicon-upload\"></span>UPLOAD IMAGE</a></li>";
                                // echo"		<li><a href=\"buycredit.php\"><span class=\"glyphicon glyphicon-usd\"></span>BUY CREDIT</a></li>";
                                // echo"		<li><a href=\"request.php\"><span class=\"glyphicon glyphicon-usd\"></span>REQUEST PAYMENT</a></li>";
                                //echo"		<li><a href=\"mypage.php\"><span class=\"glyphicon glyphicon-home\"></span>MY PAGE</a></li>";

                                echo" </ul>";
                            }
                            ?>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
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
            <div class="col-md-8" style="background:#F5F5F5;">

                <div class="row" style="">