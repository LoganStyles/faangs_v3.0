<?php
$sessionvariable = $_SESSION['username'];
$gen = $_SESSION['sex'];

$query1 = "select * from picture where username='$sessionvariable' and profile='YES' limit 1";
$result1 = mysql_query($query1);
$rec = mysql_fetch_array($result1);
$pic="";

if (mysql_num_rows($result1) > 0) {
    if (!empty($rec['img'])) {
        $pic = "img/" . $rec['img'];
    } else {
        if ($gen == 'FEMALE') {
            $pic = "images/female.jpg";
        } else {
            $pic = "images/male.png";
        }
    }
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
    
    $friend_req="";
    $friend_req.="<li class=\"dropdown\">";
    $friend_req.="<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">Friend Request <span class=\"caret\"></span></a>";
    $friend_req.="<ul class=\"dropdown-menu\" role=\"menu\">";
    $friend_req.="<li><a href=\"#\">Action</a></li>";
    $friend_req.="<li><a href=\"#\">Another action</a></li>";
    $friend_req.="<li><a href=\"#\">Something else here</a></li>";
    $friend_req.="<li class=\"divider\"></li>";
    $friend_req.="<li><a href=\"#\">Separated link</a></li>";
    $friend_req.="<li class=\"divider\"></li>";
    $friend_req.="<li><a href=\"#\">One more separated link</a></li>";
    $friend_req.="</ul>";
    $friend_req.="</li>";
    
}
