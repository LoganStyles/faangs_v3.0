<?php
ob_start();
$page="chat";

require_once("incl/cons.php");
require_once("incl/function.php");
require_once("incl/ses.php");
require_once("incl/forumheader.php");

function reply($messid) {
    
    $na11 = $_SESSION['username'];
    $forum23 = "select * from forum_comment where parent_id like '$messid.%' order by parent_id asc";
    $com231 = mysql_query($forum23);
    $comm_content="";
    
    while ($com23 = mysql_fetch_array($com231)) {
        //get commenter info
        $user23 = $com23['username'];
        $comment3 = $com23['comment'];
        $msg = $com23['parent_id'];
        $pid3 = $com23['id'];
        $level = $com23['level'];
        $level2 = $level + 1;
        $lev = $com23['level'];
        
        $pid3 = $msg . "/" . $pid3;
        //get profile pics of commenters
        $qu12 = "select * from picture where username='$user23' and profile='yes'";
        $comm_pic="";
        $result102 = mysql_query($qu12);
        $row301 = mysql_fetch_array($result102);
        if (mysql_num_rows($result102) > 0) {
            $comm_pic="img/".$row301['img'];
        }else{
            $query102 = "select * from registration where username='$user23'";
            $result1002 = mysql_query($query102);
            $row3001 = mysql_fetch_array($result1002);
            if ($row3001['gender'] == "MALE") {
                $comm_pic="images/male.png";
            }else{
                $comm_pic="images/female.jpg";
            }
        }
        //create content
        $comm_content.="<div><div class=\"col-3 col-lg-2 col-md-3 contitems\">";
        $comm_content.="<div class=\"msg_avatar\">";
        $comm_content.="<img src=\"$comm_pic\" /></div></div>";
        $comm_content.="<div class=\"col-9 col-lg-7 col-md-6 contitems\">";
        $comm_content.="<div class=\"u_name\">$user23</div>";
        $comm_content.="<div class=\"u_date\">$comment3</div>";
        $comm_content.="</div><div class=\"clearfix\"></div></div>";
        
    }
    return $comm_content;
}
?>


<section class="post_section" style="margin-top: 3%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                    <div class="card p-3 col-12 ">
                    <div class="card-wrapper">
                        <div class="card-img">
                            <?php echo "<a href=\"chat2.php?user=$sessionvariable\"><img src=\"$pic\"></a>";?>
                        </div>
                        <div class="card-box">
                            <div class="list-group">
                                <?php
                                $curr_url = "http://localhost/faangs2/chat_new.php";
                                $curr_title = "test title";
                                $content = "";
                                $content.="<a href=\"chat2.php?user=$sessionvariable\" class=\"list-group-item list-group-item-action\"><i class=\"fa fa-bars\" >&nbsp;&nbsp;Profile</i></a>";
                                $content.="<a href=\"uploadimage.php\" class=\"list-group-item list-group-item-action\"><i class=\"fa fa-briefcase\" >&nbsp;&nbsp;UPLOAD IMAGE</i></a>";
                                $vip1 = mysql_query($vip);
                                if (mysql_num_rows($vip1) > 0) {
                                    $content.="<a href=\"vipupload.php\" class=\"list-group-item list-group-item-action\"><i class=\"fa fa-briefcase\" >&nbsp;&nbsp;VIP PHOTO</i></a>";
                                } else {
                                    $content.="<a href=\"vipcredit.php\" class=\"list-group-item list-group-item-action\"><i class=\"fa fa-briefcase\" >&nbsp;&nbsp;VIP PHOTO</i></a>";
                                }
                                $content.="<a href=\"buycredit.php\" class=\"list-group-item list-group-item-action\"><i class=\"fa fa-briefcase\" >&nbsp;&nbsp;BUY CREDIT</i></a>";
                                $content.="<a href=\"request.php\" class=\"list-group-item list-group-item-action\"><i class=\"fa fa-briefcase\" >&nbsp;&nbsp;REQUEST PAYMENT</i></a>";
                                $content.="<a href=\"del.php\" class=\"list-group-item list-group-item-action\"><i class=\"fa fa-briefcase\" >&nbsp;&nbsp;PICTURE MANAGEMENT</i></a>";
                                $content.="<a href=\"edit.php\" class=\"list-group-item list-group-item-action\"><i class=\"fa fa-briefcase\" >&nbsp;&nbsp;EDIT PROFILE</i></a>";
                                echo $content;
                                $query1 = "select * from msg where rec='$sessionvariable' and state=0 ";
                                $result1 = mysql_query($query1);
                                $aaa = mysql_num_rows($result1);
                                ?>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary">Message <?php echo $aaa; ?></button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="msg.php">Support</a>
                                        <a class="dropdown-item" href="noti.php" onmouseout="myFunction21();">Inbox</a>
                                    </div>

                                </div>
                            </div>
                        
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php
                        $a = "fashion";
                        if (isset($_GET['category'])) {
                            $a = $_GET['category'];
                        }
                        ?>
                <!--form-->
                <div>
                       <form id="post_form" method="post" action="chatprocess.php?category=<?php echo "{$a}" ?>" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="post">Post Your Opinion</label>
                              <textarea class="form-control" id="post" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="test">Upload Photo</label>
                                <input type="file" class="form-control-file" id="test">
                             </div>
                            <button type="submit" class="btn btn-primary pull-right" form="post_form" name="chat">Post</button>
                            <div class="clearfix"></div>
                        </form> 
                </div>
                <!--posts-->
                <?php
                //fetch all posts
                $query1 = "select * from home order by id desc";
                $result1 = mysql_query($query1);
                $like="";
            //    echo 'username '.$_SESSION['username'];exit;

                /*display posts*/
                $content="";
                
                while ($row = mysql_fetch_array($result1)) {
                        $user = $row['username'];
                        $dateValue = $row['date'];
                        $time = strtotime($dateValue);
                         $cat = $row['category'];
                        $messid = $row['id'];

                //      $like = $_SESSION['username'];
                        $mes = $row['post_content'];
                        $mess = strtolower($mes);
                        $image=$row['image'];

                        $month = date("M-j", $time);
                        $s = $row['time'];
                        $times = strtotime($s);
                        $time_d= date('h:i A', $times);
                        $display_time=$month.' at '.$time_d;
                        
                        //get post owner's pic
                        $query_owner = "select img from picture WHERE username=''";
//                        $result_owner = mysql_query($query1);
                        
                        $query_owner = "select img from picture where username='$user' and profile='yes'";
                        $post_pic="";
                        $result102 = mysql_query($query_owner);
                        $row301 = mysql_fetch_array($result102);
                        if (mysql_num_rows($result102) > 0) {
                            $post_pic="img/".$row301['img'];
                        }else{
                            $query102 = "select * from registration where username='$user'";
                            $result1002 = mysql_query($query102);
                            $row3001 = mysql_fetch_array($result1002);
                            if ($row3001['gender'] == "MALE") {
                                $post_pic="images/male.png";
                            }else{
                                $post_pic="images/female.jpg";
                            }
                        }
                        
                        
                        $content.="<div class=\"post_box\"><div>";
                        $content.="<div class=\"col-3 col-lg-2 col-md-3 contitems\">";
                        $content.="<div class=\"user_avatar\">";
                        $content.="<img src=\"$post_pic\" /></div></div>";
                        $content.="<div class=\"col-9 col-lg-7 col-md-6 contitems\">";
                        $content.="<div class=\"u_name\">$user</div>";
                        $content.="<div class=\"u_date\">$display_time</div>";
                        $content.="</div><div class=\"clearfix\"></div></div>";
                        $content.="<div class=\"u_text\">$mess</div>";
                        $content.="<div class=\"user_pimg\">";
                        $content.="<img src=\"forumimage/$image\" /></div>";
                        $content.=reply($messid);
                        //get likes
                        $ruser = $_SESSION["username"];
                        $count=0;
                        $display_likes=$share="";
                        $que_count = "select * from liketracker where imagename='{$row['id']}'";
                        $resul = mysql_query($que);
                        if (mysql_num_rows($resul) > 0) {
                            $count=mysql_num_rows($resul);                        
                        }
                        
                        if (isset($_SESSION["username"])) {
                            $que = "select * from liketracker where imagename='{$row['id']}' and member='$ruser'";                            
                            $resul = mysql_query($que);
                                if (mysql_num_rows($resul) > 0) {//curr user has already liked
                                $display_likes=$count."<span   style=\"margin-right:10px;\">&nbsp;Liked</span>";
                                }else{//curr user has not liked
                                    $display_likes=$count."<span style=\"margin-right:10px;\">&nbsp;<a class=\"btn btn-secondary\" href=\"chatprocess.php?id2={$row['id']}&&poster=$user&&user=$na1\">Like(s)</a></span>";
                                }
                                $share="<span><a  href=\"https://www.facebook.com/sharer/sharer.php?id2={$row['id']}\" target=\"_blank\">  Share on Facebook</a></span>";
                        }
                        $content.="<div>$display_likes"." "."$share</div>";
                        $content.="</div>";
                        
                        //get comments
                        
                }
                echo $content;
                ?>
            </div>
            <div class="col-md-3"><!--3rd sect advert-->
                <div class="row">
                    <?php
                    $query5 = "SELECT  picture.img,picture.category,picture.username, registration.fullname,registration.model
				FROM picture left JOIN registration ON picture.username=registration.username 
				where picture.profile='yes' and picture.username<>'$sessionvariable'AND
				picture.username NOT IN( SELECT myusername from friendlist WHERE myusername='$sessionvariable' or friendusername='$sessionvariable')
				AND	picture.username NOT IN( SELECT friendusername from friendlist WHERE myusername='$sessionvariable' or friendusername='$sessionvariable') limit 2";
                    $result5 = mysql_query($query5);
                    if (mysql_num_rows($result5) > 0) {
                        $content="";
                        while ($row5 = mysql_fetch_array($result5)) {
                            $content.="<div class=\"card p-3 col-12 right_advert\"><div class=\"card-wrapper\">";
                            $content.="<div class=\"card-img user_image\">";
                            $content.="<img src=\"img/{$row5['img']}\" >";
                            $content.="</div><div class=\"card-box\"><h4 class=\"card-title mbr-fonts-style display-7\">";
                            $content.="{$row5['fullname']}</h4></div>";
                            $content.="<div class=\"mbr-section-btn text-center\">";
                            $content.="<a href=\"chatprocess.php?friendusername={$row5['username']}&&myusername=$sessionvariable&&cat=$cat\" style =\"padding:1em;\" class=\"btn btn-primary display-4\">";
                            $content.="Add Friend</a></div></div></div>";
                        }
                        echo $content;
                        
                    }
                    
                    ?>
                   <!--end-->
                    
                    
                </div>
                
                <div class="row">
                    
                    <?php require_once("incl/leftchat.php"); ?>
                    
                </div>
                
                <?php
                    $sender = $sessionvariable;
                    date_default_timezone_set("Africa/Lagos");
                    $tbl_name = "online";
                    $dat = date("y-m-d");
                    $time = time();
                    $time_check = $time - 3;
                    $sql = "SELECT * FROM $tbl_name WHERE username='$like'";
                    $result = mysql_query($sql);
                    $count = mysql_num_rows($result);
                    if ($count == "0") {
                        $sql1 = "INSERT INTO $tbl_name(username,date, time,state)VALUES('$like','$dat', '$time','online')";
                        $result1 = mysql_query($sql1);
                    } else {
                        $sql2 = "UPDATE $tbl_name SET time='$time', state='online' WHERE username = '$like'";
                        $result2 = mysql_query($sql2);
                    }
                                
                    ?>
            </div>
        
    </div>
</section> 
        
<?php
include_once 'incl/footer.php';
ob_end_flush();
?>