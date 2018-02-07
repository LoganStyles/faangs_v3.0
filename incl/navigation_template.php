<?php
require_once("incl/cons.php");
//require_once("incl/ses2.php");
require_once("incl/function.php");
$admin='admin';

?>

<html>

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
        <!--<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">-->
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/nav_styles.css">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #000;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand">
            <span class="navbar-logo">
                <a href="index.php">
                    <img src="assets/images/logo-206x72.png" alt="Faangs" title="" style="height: 3.8rem;">
                </a>
            </span>

        </div>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Option 1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Option 2</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Option 1</a></li>
        <li><a href="#">Option 2</a></li>
      </ul>      
      <ul class="nav navbar-nav sider-navbar">
          
          
          
          
          
        <li id="profile">
            <figure class="profile-userpic" style="width: 35%;margin: 0 auto;">
              <?php
              $content="<img src=\"images/female.jpg\" class=\"img-rounded\" width=\"80px\" height=\"80px\" />";
              echo $content;
              ?>
            <!--<img src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" class="img-responsive" alt="Profile Picture">-->
          </figure>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">Username</div>
            <div class="profile-usertitle-title">Administrator</div>
          </div>
        </li>
        <li class="sider-menu">
          <ul>
            <li class="active"><a href="#"><span class="fa fa-fw fa-dashboard"></span> Dashboard</a></li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#submenu-1"><span class="fa fa-database"></span> Database <span class="fa fa-fw fa-caret-down"></span></a>
              <ul id="submenu-1" class="collapse">
                <li><a href="#">MySQL</a></li>
                <li><a href="#">PostgreSQL</a></li>
                <li><a href="#">Oracle</a></li>
              </ul>
            </li> 
            <li><a href="#"><span class="fa fa-folder"></span> Files</a></li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-cog"></i> System <span class="fa fa-fw fa-caret-down"></span></a>
              <ul id="submenu-2" class="collapse">
                <li><a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Statistics</a></li>
                <li><a href="#"><i class="fa fa-code"></i> API</a></li>
                <li><a href="#"><span class="fa fa-exclamation-circle"></span> Error Log</a></li>
              </ul>
            </li>  
          </ul>
       </li>
      </ul>
    </div>
  </div>
</nav>


<section id="page-keeper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Content Section</h1>
      </div>
      <div class="col-md-3">
        <h3>Left Header</h3>
        <p>
          Admin SiderBar was inspired by may different admin menu style found on the W3 and combined for my own admin template. Feel free to use it. I hope it helps. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        </p>
      </div>
      <div class="col-md-9">
        <h3>Right Header</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>

