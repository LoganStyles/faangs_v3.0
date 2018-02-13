<?php
require_once 'incl/cons.php';
require_once("incl/ses.php");
require_once ("incl/forumheader.php");
require_once("incl/function.php");
//print_r($_SESSION);exit;

$admin='admin';
$adminpic="";
$administrator = ($_SESSION['admin'])?($_SESSION['admin']):('');
$table=($_SESSION['admin']=="admin")?("admin"):("subadmin");

if (!empty($administrator)) {
    
    $query1 = "select avatar from $table where username='$administrator'";
    $result1 = mysql_query($query1);
    $rec = mysql_fetch_array($result1);

    if (mysql_num_rows($result1) > 0) {
        if(!empty($rec['avatar'])){
          $adminpic = "avatars/" . $rec['avatar'];  
        }else{
            if ($gen == 'FEMALE') {
            $adminpic = "images/female.jpg";
        } else {
            $adminpic = "images/male.png";
        }
        }
        
    } else {
        if ($gen == 'FEMALE') {
            $adminpic = "images/female.jpg";
        } else {
            $adminpic = "images/male.png";
        }
    }
}
?>

<!DOCTYPE html>
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
      
          <?php
                /*top navigation*/
                $links="";
                if(isset($_SESSION['admin']) && $_SESSION['admin']==$admin){
                    /*fetch message count*/
                    $query21="select * from msg where rec='admin' and state=0 ";
                    $result21=mysql_query($query21);

                    $a=mysql_num_rows($result21);

                    $query212="select * from bookmodel where sta=0 ";
                    $result212=mysql_query($query212);

                    $b=mysql_num_rows($result212);
                
                $links="<ul class=\"nav navbar-nav navbar-right\">";
                $links.="<li><a href=\"vipnoti.php\">Vip-order ({$b})</a></li>";
                        $links.="<li class=\"dropdown\">";
                        $links.="<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">Messages <span class=\"caret\"></span></a>";
                        $links.="<ul class=\"dropdown-menu\" role=\"menu\">";
                        if(isset($_SESSION['messagepart']) and ($_SESSION['messagepart']==1) or $_SESSION['admin']==$admin){ 
                        $links.="<li><a href=\"admmsg.php\">Send</a></li>";
                        }
                        if(isset($_SESSION['messagenoti']) and ($_SESSION['messagenoti']==1) or $_SESSION['admin']==$admin){ 
                        $links.="<li><a href=\"admnoti.php\">Inbox</a></li>";
                        }
                        $links.="</ul></li>";
                
                        $links.="<li class=\"divider\"></li>";
                        $links.="<li><a href=\"incl/outs_admin.php\">Log-out</a></li>";
                        $links.="</ul>";
                        echo $links;
                }else{
                    
                    $links="<ul class=\"nav navbar-nav navbar-right\">";
                        $links.="<li class=\"divider\"></li>";
                        $links.="<li><a href=\"incl/outs_admin.php\">Log-out</a></li>";
                        $links.="</ul>";
                        echo $links;
                    
                }
                
                 /*side navigation*/
                if(isset($_SESSION['admin'])){
                   $links="";
                   $links.="<ul class=\"nav navbar-nav sider-navbar\">";
                        $links.="<li id=\"profile\">";
                        $links.="<figure class=\"profile-userpic\" style=\"width: 35%;margin: 0 auto;\">";
                        $links.="<img src=\"$adminpic\" class=\"img-rounded\" width=\"80px\" height=\"80px\" /></figure>";
                        $links.="<div class=\"profile-usertitle\">";
                        $links.="<div class=\"profile-usertitle-name\">".$_SESSION['admin']."</div>";
                        $links.="<div class=\"profile-usertitle-title\">Administrator</div>";
                        $links.="</div></li>";
                        
                        $links.="<li class=\"\"><a href=\"upload_avatar.php\"><span class=\"fa fa-upload\"></span> Upload Avatar</a></li>";
                   
                        $links.="<li class=\"sider-menu\"><ul>";
                        if(isset($_SESSION['createcontest']) && ($_SESSION['createcontest']==1) || $_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"adminpage2.php\"><span class=\"fa fa-plus\"></span> Create Contest</a></li>";
                        }
                        
                        if(isset($_SESSION['paymentrequest']) && ($_SESSION['paymentrequest']==1) || $_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"approve.php\"><span class=\"fa fa-ticket\"></span> Payment request</a></li>";
                        }
                        
                        if(isset($_SESSION['vcontestant']) && ($_SESSION['vcontestant']==1) || $_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"stats.php\"><span class=\"fa fa-search\"></span> View Contestant</a></li>";
                        }
                        
                        if(isset($_SESSION['uploadb']) && ($_SESSION['uploadb']==1) || $_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"banner.php\"><span class=\"fa fa-upload\"></span> Upload Banner</a></li>";
                        }
                        
                        if(isset($_SESSION['deleteb']) && ($_SESSION['deleteb']==1) || $_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"del2.php\"><span class=\"fa fa-trash\"></span> Delete Banner</a></li>";
                        }
                        
                        if(isset($_SESSION['xchange']) && ($_SESSION['xchange']==1) || $_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"rate.php\"><span class=\"fa fa-money\"></span> Set Exchange Rate</a></li>";
                        }
                        
                         if($_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"chang.php\"><span class=\"fa fa-user\"></span> Change password</a></li>";
                        }
                        
                        if($_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"mana2.php?id=timer&&act=51\"><span class=\"fa fa-clock-o\"></span> Change Timer state</a></li>";
                        }
                        
                         if( $_SESSION['admin']==$admin){ 
                        $links.="<li class=\"active\"><a href=\"adminchangeuser.php\"><span class=\"fa fa-user-plus\"></span> Another username</a></li>";
                        }
                        
                        if($_SESSION['admin']==$admin){ 
                        /*first <li> with dropdown*/
                        $links.="<li><a href=\"#\" data-toggle=\"collapse\" data-target=\"#submenu-1\"><span class=\"fa fa-users\"></span> Manage Admin <span class=\"fa fa-fw fa-caret-down\"></span></a>";
                        $links.="<ul id=\"submenu-1\" class=\"collapse\">";
                        $links.="<li><a href=\"manageadmin.php\">Create Admin</a></li>";
                        $links.="<li><a href=\"viewadmin.php\">View Admin</a></li>";
                        $links.="</ul></li>";
                        echo $links;
                        }
                        
                        /*secnd <li> with dropdown*/
                        if($_SESSION['admin']==$admin){ 
                            $links="";
                        $links.="<li>";
                        $links.="<a href=\"#\" data-toggle=\"collapse\" data-target=\"#submenu-2\"><i class=\"fa fa-users\"></i> Manage VIP <span class=\"fa fa-fw fa-caret-down\"></span></a>";
                        $links.="<ul id=\"submenu-2\" class=\"collapse\">";
                        if(isset($_SESSION['viewvip']) and ($_SESSION['viewvip']==1) or $_SESSION['admin']==$admin){
                        $links.="<li><a href=\"viewvip.php\"><i class=\"fa fa-users\"></i> View VIP</a></li>";
                        }
                        if(isset($_SESSION['addvip']) and ($_SESSION['addvip']==1) or $_SESSION['admin']==$admin){
                        $links.=" <li><a href=\"addvip.php\"><i class=\"fa fa-users\"></i> Add VIP</a></li>";
                        }
                        if($_SESSION['admin']==$admin){
                            $links.=" <li><a href=\"vipupload2.php\"><i class=\"fa fa-upload\"></i> Upload Vip Photo</a></li>";
                        }
                        $links.="</ul></li> ";
                        }
                   
                   $links.="</ul></li>";
                   $links.="</ul>";
                   echo $links;
                   }
                   
                ?>
          
    </div>
  </div>
</nav>