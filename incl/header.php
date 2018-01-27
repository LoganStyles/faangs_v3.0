<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v4.6.2, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/logo-206x72.png" type="image/x-icon">
        <meta name="description" content="faangs,models,contestants,photography">
        <title>FAANGS - Face of Angels- Photo Contest | Home</title>
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
                        <li class="nav-item">
                            <a class="nav-link link text-primary display-4 <?php if($page=="index"){echo 'active';}?>" href="index.php">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link link text-primary display-4 <?php if($page=="about"){echo 'active';}?>" href="about.php">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link link text-primary display-4" href="contest.php?category=general">
                                Contestants</a>
                        </li>
                        <li class="nav-item"><a class="nav-link link text-primary display-4 <?php if($page=="contact"){echo 'active';}?>" href="contact.php">
                                Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link text-primary display-4 <?php if($page=="part"){echo 'active';}?>" href="part.php">How It Works</a>
                        </li>
                    </ul>
                    <div class="navbar-buttons mbr-section-btn">
                        <?php
                        $links="";
                            if (isset($_SESSION['username']) && ($_SESSION['status'] == 2)) {
                               $links.="<a class=\"btn btn-sm btn-primary display-4\" href=\"chat2.php?user={$_SESSION['username']}\">
                                        <span class=\"mbrib-user mbr-iconfont mbr-iconfont-btn\"></span>Profile</a>";
                               
                               $links.="<a class=\"btn btn-sm btn-primary display-4\" href=\"incl/outs.php\">
                                        <span class=\"mbrib-logout mbr-iconfont mbr-iconfont-btn\"></span>Sign Out!</a>";
                               
                            }elseif (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
                               $links.="<a class=\"btn btn-sm btn-primary display-4\" href=\"participate.php?user={$_SESSION['username']}\">
                                        <span class=\"mbrib-user mbr-iconfont mbr-iconfont-btn\"></span>Profile</a>";
                               
                               $links.="<a class=\"btn btn-sm btn-primary display-4\" href=\"incl/outs.php\">
                                        <span class=\"mbrib-logout mbr-iconfont mbr-iconfont-btn\"></span>Sign Out!</a>";
                               
                            }elseif (isset($_SESSION['admin'])) {
                               $links.="<a class=\"btn btn-sm btn-primary display-4\" href=\"adminpage.php\">
                                        <span class=\"mbrib-login mbr-iconfont mbr-iconfont-btn\"></span>Dashboard</a>";
                               
                               $links.="<a class=\"btn btn-sm btn-primary display-4\" href=\"incl/outs.php\">
                                        <span class=\"mbrib-logout mbr-iconfont mbr-iconfont-btn\"></span>Sign Out!</a>";
                               
                            }elseif (!isset($_SESSION['username'])) {
                               $links.="<a class=\"btn btn-sm btn-primary display-4\" href=\"login.php\">
                                        <span class=\"mbrib-login mbr-iconfont mbr-iconfont-btn\"></span>Login</a>";
                               
                               $links.="<a class=\"btn btn-sm btn-primary display-4\" href=\"registration.php\">
                                        <span class=\"mbrib-user mbr-iconfont mbr-iconfont-btn\"></span>Sign Up!</a>";
                            }
                        echo $links;
                        ?>
                    </div>
                </div>
            </nav>
        </section>
