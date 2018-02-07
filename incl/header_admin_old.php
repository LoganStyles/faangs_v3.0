<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="30000">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v4.6.2, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/logo-206x72.png" type="image/x-icon">
        <meta name="description" content="faangs,models,contestants,photography">
        <title>FAANGS - Face of Angels- Photo Contest | Admin</title>
        <link rel="stylesheet" href="assets/mobirise-icons/mobirise-icons.css">
        <link rel="stylesheet" href="assets/mobirise-icons-bold/mobirise-icons-bold.css">
        <link rel="stylesheet" href="assets/tether/tether.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="assets/dropdown/css/style.css">
        <link rel="stylesheet" href="assets/animatecss/animate.min.css">
        <link rel="stylesheet" href="assets/socicon/css/styles.css">
        <link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
        <link rel="stylesheet" href="assets/theme/css/style.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css">
        <link rel="stylesheet" href="css/post_styles.css">
        <link rel="stylesheet" href="css/social.css">
    </head>
    
    <body>
        <section class="menu cid-qHtzaLB6iN" once="menu" id="menu1-i">
            <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="menu-logo">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="index.php">
                                <img src="assets/images/logo-206x72.png" alt="Faangs" title="" style="height: 3.8rem;">
                            </a>
                        </span>

                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <?php
                    if(isset($_SESSION['admin'])){
                        $query21="select * from msg where rec='admin' and state=0 ";
                        $result21=mysql_query($query21);

                        $a=mysql_num_rows($result21);

                        $query212="select * from bookmodel where sta=0 ";
                        $result212=mysql_query($query212);

                        $b=mysql_num_rows($result212);
                                                                                        
                        $links="";
                        $links.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4\" href=\"vipnoti.php\">Vip-order ({$b})</a></li>";
                        
                        $links.="<li class=\"nav-item dropdown\"><a class=\"nav-link link text-primary dropdown-toggle display-4\" href=\"#\" data-toggle=\"dropdown-submenu\" aria-expanded=\"false\">Messages</a>";
                        
                        $links.="<div class=\"dropdown-menu\"><div class=\"dropdown\">";
                        if(isset($_SESSION['messagepart']) and ($_SESSION['messagepart']==1) or $_SESSION['admin']=="$admin"){ 
                            $links.="<a class=\"text-primary dropdown-item dropdown-toggle display-4\" href=\"admmsg.php\" data-toggle=\"dropdown-submenu\" aria-expanded=\"false\">Send</a>";
                        }
                        if(isset($_SESSION['messagenoti']) and ($_SESSION['messagenoti']==1) or $_SESSION['admin']=="$admin"){ 
                            $links.="<a class=\"text-primary dropdown-item dropdown-toggle display-4\" href=\"admnoti.php\" data-toggle=\"dropdown-submenu\" aria-expanded=\"false\">Inbox</a>";
                        }
                       $links.="</div></li>" ;
                       $links.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4\" href=\"incl/outs.php\">Log-out</a></li>";
                       echo $links;
                    }
                        
                        ?>
                    </ul>
                    
                </div>
                
            </nav>
        </section>
