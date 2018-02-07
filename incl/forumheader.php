<?php
$sessionvariable = $_SESSION['username'];
$gen = $_SESSION['sex'];

$query1 = "select * from picture where username='$sessionvariable' and profile='YES' limit 1";
$result1 = mysql_query($query1);
$rec = mysql_fetch_array($result1);
$pic="";

if (mysql_num_rows($result1) > 0) {
    $pic = "img/".$rec['img'];
} else {
    if ($gen == 'FEMALE') {
        $pic = "images/female.jpg";
    } else {
        $pic = "images/male.png";
    }
}
$friend_req="";
$query51 = "SELECT friendlist.friendusername,friendlist.myusername,picture.img,picture.profile,registration.fullname,
            registration.username from friendlist
            left join picture on friendlist.myusername=picture.username 
            left join registration on friendlist.myusername=registration.username
            where friendlist.status=0 and friendlist.friendusername='$sessionvariable'
            and picture.profile='yes'";

$result51 = mysql_query($query51);
if (mysql_num_rows($result51) > 0) {
    $d = mysql_num_rows($result51);
    $cat = 'fashion';
    $friend_req="<li class=\"nav-item dropdown\"><a class=\"nav-link link text-primary dropdown-toggle display-4\" href=\"#\" data-toggle=\"dropdown-submenu\" aria-expanded=\"false\">Friend Request</a>";
    $friend_req.="<div class=\"dropdown-menu\"><div class=\"dropdown\">";
    
    $friend_req="<li class=\"nav-item dropdown\">";
    $friend_req.="<a class=\"nav-link link text-primary dropdown-toggle display-4\" href=\"#\" data-toggle=\"dropdown-submenu\" aria-expanded=\"false\">Friend Request</a>";
    $friend_req.="<div class=\"dropdown-menu\">";
    while ($row51 = mysql_fetch_array($result51)) {
        $friend_name=$row51['fullname'];
        $f_username=$row51['myusername'];
        
        $friend_req.="<div class=\"dropdown\">";
        $friend_req.="<a class=\"text-primary dropdown-item dropdown-toggle display-4\" href=\"#\" data-toggle=\"dropdown-submenu\" aria-expanded=\"false\">".$friend_name."</a>";
        $friend_req.="<div class=\"dropdown-menu dropdown-submenu\">";
        $friend_req.="<a class=\"text-primary dropdown-item display-4\" href=\"chatprocess.php?friendusername2=$f_username&&myusername2=$sessionvariable&&cat=$cat&&sta=1\">Accept</a>";
        $friend_req.="<a class=\"text-primary dropdown-item display-4\" href=\"chatprocess.php?friendusername2=$f_username&&myusername2=$sessionvariable&&cat=$cat&&sta=2\">Reject</a>";
        $friend_req.="</div></div>";                
    }
    $friend_req.="</div></li>";
}

if (isset($_POST['submit'])) {
    
    $post = test_input($_POST['post']);
    $query1 = "select * from registration where username='$post'";
    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {
        $rec = mysql_fetch_array($result1);
        $user = $rec['username'];
        header("location:chat2.php?user=$user");
    } else {
        $nam = "user not found";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:2; url=chat.php');
    }
}
?>

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
        <link rel="stylesheet" href="css/post_styles.css">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/contest.css">
<!--        <link rel="stylesheet" href="css/social.css">-->
        <script src="assets/jquery/jquery.min.js"></script>
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
                <div class="user_avatar">
                    <?php echo "<a href=\"chat2.php?user=$sessionvariable\"><img src=\"$pic\"></a>";?>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                        <?php
                        $navs=$active="";
                         if (isset($_SESSION['username']) && ($_SESSION['status'] == 2)) {
                             //if($page=="chat"){$active='active';}else{$active='';}
                         
                             $navs.="<li class=\"nav-item\">";
                             $navs.="<a class=\"nav-link link text-primary display-4 \" href=\"chat.php\">Forum</a></li>";
                             $navs.=$friend_req;
                             $navs.="<li class=\"nav-item\">";
                             //if($page=="contest"){$active='active';}else{$active='';}
                             $navs.="<a class=\"nav-link link text-primary display-4 \" href=\"contest.php?category=general\">Contestants</a></li>";
                             $navs.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4\" href=\"incl/outs.php\">Sign Out</a></li>";
                             
                         }else if(isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
                             //if($page=="participate"){$active='active';}else{$active='';}
                             $navs.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4 \" href=\"participate.php\">Profile</a></li>";
                             $navs.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4\" href=\"incl/outs.php\">Sign Out</a></li>";
                         } else if (isset($_SESSION['admin'])) {
                             //if($page=="adminpage"){$active='active';}else{$active='';}
                             $navs.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4 \" href=\"adminpage.php\">Dashboard</a></li>";
                             $navs.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4\" href=\"incl/outs.php\">Sign Out</a></li>";
                         }else if (!isset($_SESSION['username'])) {
                             $navs.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4\" href=\"login.php\">Sign-In</a></li>";
                             $navs.="<li class=\"nav-item\"><a class=\"nav-link link text-primary display-4\" href=\"registration.php\">Sign Up!</a></li>";
                         }
                         echo $navs;
                         
                        ?>
                        
                    </ul>
                    <div class="navbar-buttons mbr-section-btn">
                        <form class="form-inline" action="" method="post" data-form-title="Search Users Form">
                            <input type="hidden" value="nBTmj/h0WzdkbAcl8/maT1sYLnt7YcHZpTPUtr14XRPndZsQbaR75D1L/GJwOQjb0r9CEmL0YGzZvAQjXU7tocsutBwEcHEF2K4JdsfcgR1iLxMMtLovQUZOvrb9BcGY" class="animated fadeInUp">
                            <div class="form-group">
                                <input type="text" style="padding:0.5em;min-height: 0em;" class="form-control input-sm input-inverse my-2" name="post" required=""  placeholder="Search Users" id="">
                            </div>
                            <div class="input-group-btn m-2">
                                <button href="" class="btn btn-primary display-4" type="submit" role="button">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </section>
