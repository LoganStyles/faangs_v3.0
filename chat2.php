<?php
ob_start();
$page="chat2";

require_once("incl/cons.php");
require_once("incl/function.php");
require_once("incl/ses.php");
require_once("incl/forumheader.php");

if(isset($_GET['user'])){
    $user=test_input($_GET['user']);
    $search_result=$user;
}
 $gen=$_SESSION['sex'];
?>

<section class="post_section" style="margin-top: 3%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    
                    <?php
                    $description="";
                        $query1 = "select * from registration where username='$search_result'";
                        $result1 = mysql_query($query1);
                        $content="";
                        if ($rec = mysql_fetch_array($result1)) {
                            $nu = $rec['phs'];
                            $description=$rec['bio'];
                            
                            $content.="<div class=\"testimonials-item contest\" style=\"width: 100%\"><div class=\"user row\"><div class=\"col-lg-4 col-md-5\">"
                                    . "<div class=\"user_image\">";
                            $content.="<img src=\"$pic\"></div></div>";
                            $content.="<div class=\"testimonials-caption col-lg-8 col-md-7\"> ";
                            $content.="<div class=\"user_name mbr-bold mbr-fonts-style align-left pt-3 display-7\">";
                            $content.="<h5 class=\"card-title\" style=\"text-transform: uppercase\">Basic information</h5>";
                            $content.="</div>";
//                            
                            $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">FULL NAME:</span><strong><span style=\"padding: 0 1% 1% 3%; width: 70%;\">{$rec['fullname']}</span></strong></p>";
                            $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">EMAIL :</span><strong><span style=\"padding: 0 1%; width: 70%;\">{$rec['email']}</span></strong></p>";
                            if (empty($nu)) {
                                $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">PHONE NUMBER:</span><strong><span style=\"padding: 0 1%; width: 70%;\">{$rec['phonenumber']}</span></strong></p>";
                            }
                            
                            $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">COUNTRY:</span><strong><span style=\"padding: 0 1%; width: 70%;\">{$rec['country']}</span></strong></p>";
                            $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">STATE:</span><strong><span style=\"padding: 0 1%; width: 70%;\">{$rec['state']}</span></strong></p>";
                            if ($sessionvariable == $rec['username']) {
                                $content.="<p style=\"padding: 0 1%;\"><a href=\"edit.php\"><strong><span style=\"padding: 0 1%; width: 70%;\">Edit Profile</span></strong></a></p>";
                            }
                            $content.= "</div></div></div>";
                            
                            echo $content;
                        }
                    ?>
                    
                </div>
                
                <div class="row">
                    
                    <div class="card p-3 col-12 col-md-6 col-lg-3" style="background-color: #fff;">
                        <div class="card-wrapper">
                           
                            <div class="card-box">
                                <h4 class="card-title mbr-fonts-style display-7">
                                    Description
                                </h4>
                                <div><?php echo $description;?></div>
                                <div class="col-md-12 col-sm-12 col-xs-12" style="background:white">
                                <ul style="">
                                <?php
                if ($sessionvariable == $search_result) {
                    
                }else{
                    //get friends
                    $query51 = "SELECT *
                            from friendlist where myusername='{$search_result}'
                            and friendusername='$sessionvariable' and status=2  or
                            myusername='$sessionvariable' and friendusername='{$search_result}' and status=2 
                                  ";
                    //$arr21=array();
                    $result51 = mysql_query($query51);
                    if (mysql_num_rows($result51) > 0) {
                        //echo"<li style=\"display:inline-block;margin:5px;font-weight:bold;font-size:1.2em;\"><a href=\"#\">Message</a> </li>";
                        echo"<li style=\"display:inline-block;margin:5px;font-weight:bold;font-size:1.2em;\">
                            <a href=\"chatprocess.php?myusername2=$sessionvariable&&friendusername2=$search_result&&sta=2\">Unfriend</a></li>";
                } else {
                $query51 = "SELECT *
                            from friendlist where myusername='{$search_result}'
                            and friendusername='$sessionvariable' and status=1 or status=0 or
                            myusername='$sessionvariable' and friendusername='{$search_result}' and status=1 or status=0";
                        //$arr21=array();
                        $result51 = mysql_query($query51);
                        if (mysql_num_rows($result51) <= 0) {
                            //echo"<li style=\"display:inline-block;margin:5px;font-weight:bold;font-size:1.2em;\"><a href=\"#\">Message</a> </li>";
                            echo"<li style=\"display:inline-block;margin:5px;font-weight:bold;font-size:1.2em;\">
                                <a href=\"chatprocess.php?myusername=$sessionvariable&&friendusername=$search_result&&sta=0\">Add friend</a></li>";
                        }
                    }
                  }
                
                ?>
                                    </ul>
                                    </div>
                <!--photos-->
                
                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:0.4em;background:white">	
                    <p style="font-weight:bold;text-align:center;">Photos</p>
                    <div class="row">
                        <?php
                        $myphoto = "select * from home where username='$search_result' and sta=1";
                        $myphoto2 = mysql_query($myphoto);
                        if (mysql_num_rows($myphoto2) > 0) {
                            while ($rmyphoto = mysql_fetch_array($myphoto2)) {
                                echo "<div class=\"col-md-6 myphoto\" style=\"\">";
                                $pic2 = $rmyphoto['image'];
                                echo"	<img src=\"forumimage/{$pic2}\" class=\"img-responsive\"/>";
                                echo"</div>";
                            }
                        } else {
                            if ($gen == "MALE")
                                echo "{$search_result} is yet to upload his photo";
                            ELSE {
                                echo "{$search_result} is yet to upload her photo";
                            }
                        }
                        ?>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:0.4em;background:white">	
        <p style="font-weight:bold;text-align:center;">Friends Photos</p>
        <div class="row">
            <?php
            $friend = array();
            $myfriend = "SELECT friendlist.friendusername,friendlist.myusername"
                    . " from friendlist where friendusername='$search_result' and status=2 or myusername='$search_result' and status=2";
            $res3 = mysql_query($myfriend);
            IF (MYSQL_NUM_ROWS($res3) > 0) {
                while ($res4 = mysql_fetch_array($res3)) {
                    if ($res4['myusername'] != "$search_result") {
                        array_push($friend, $res4['myusername']);
                    }
                    if ($res4['friendusername'] != "$search_result") {
                        array_push($friend, $res4['friendusername']);
                    }
                }
            } ELSE {
                echo "no friend has been added";
            }
            //////////////////////////////////////////////////////////////////////
            $nos = count($friend);
            for ($i = 0; $i < $nos; $i++) {
                $friphoto = "select * from picture where username='{$friend[$i]}' and profile='YES'";
                $friphoto2 = mysql_query($friphoto);
                if (mysql_num_rows($friphoto2) > 0) {
                    $r2myphoto = mysql_fetch_array($friphoto2);
                    echo "<div class=\"col-md-6 myphoto\" style=\"\">";
                    $pic22 = $r2myphoto['img'];
                    echo"	<a href=\"chat2.php?user={$friend[$i]}\"><img src=\"img/{$pic22}\" class=\"img-responsive\"/></a>";
                    echo"</div>";
                }
            }
            ?>
        </div>
    </div>

                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <div class=" col-md-6" style="background-color: #fff;">
                        
                        <!--<div class="col-md-7  col-sm-12 col-xs-12" id="chat_post">-->


                <?php
                $query1 = "select * from home  where username='$search_result'order by id desc";
                //all posts by this user
                $result1 = mysql_query($query1);

                if (mysql_num_rows($result1) <= 0) {//if none select all posts
                    $query1 = "select * from home order by id desc";
                    $result1 = mysql_query($query1);
                }
                
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
                        //$content.=reply($messid);
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


//                while ($row = mysql_fetch_array($result1)) {
//                    echo"<div class=\" row postimg\"><div class=\"col-md-12\"> <div class=\"col-md-3 head\">";
//                    $user = $row['username'];
//                    //get profile pic
//                    $post_pic="";
//                    $query12 = "select * from picture where username='$user' and profile='yes'";
//                    $result12 = mysql_query($query12);
//                    $row31 = mysql_fetch_array($result12);
//
//                    if (mysql_num_rows($result12) > 0) {
//                        $post_pic="img/".$row31['img'];
//                        //echo "<a href=\"chat2.php?user=$user\"><img src=\"img/{$row31['img']}\" class=\"img-square img-responsive\"></a>";
//                    } else {
//                        $query12 = "select * from registration where username='$user'";
//                        $result12 = mysql_query($query12);
//                        $row31 = mysql_fetch_array($result12);
//
//                        if ($row31['gender'] == "MALE") {
//                            $post_pic="images/male.png";
//                            //echo "<a href=\"chat2.php?user=$user\"><img src=\"images/male.png\" class=\"img-circle img-responsive\"></a>";
//                        } else {
//                            $post_pic="images/female.jpg";
//                            //echo "<a href=\"chat2.php?user=$user\"><img src=\"images/female.jpg\" class=\"img-circle img-responsive\"></a>";
//                        }
//                    }
//                    
//                    $dateValue = $row['date'];
//                    $time = strtotime($dateValue);
//                    $month = date("M-j", $time);
//                    $s = $row['time'];
//                    $times = strtotime($s);
//                    $time_d= date('h:i A', $times);
//                    $display_time=$month.' at '.$time_d;
////                    echo"</div>";
////                    echo"<div class=\"col-md-7\" style=\"border-style:\">";
////                    echo"{$row['username']}";
////                    echo"</div>";
////                    echo"<div class=\"col-md-7\" style=\"font-size:12px;font-weight:bold;\">";
////                    echo $month = date("M-j", $time);
////                    echo "			at ";
////                    $s = $row['time'];
////                    $times = strtotime($s);
////                    echo date('h:i A', $times);
////                    echo"			</div>";
////                    echo"	</div>";
//
//                    //echo"end of head div";
//                    $cat = $row['category'];
//                    $messid = $row['id'];
//                    $like = $_SESSION['username'];
//                    $mes = $row['post_content'];
//                    $mess = strtolower($mes);
//                    if (isset($_SESSION["username"])) {
//                        $na1 = $_SESSION['username'];
//                        $na2 = $row['username'];
//                    }
//                    //echo message div
//                    echo"<div class=\"col-md-12\" style=\" word-wrap: break-word;\">{$mess}</div>";
//                    //echo //end message div
//                    if ($row['image'] != "") {
//                        //echo image  div
//                        echo "<div class=\"col-md-12 pix\"><img src=\"forumimage/{$row['image']}\"/></div>";
//                    } else {
//                        echo"";
//                    }
//                    //end image div
//                    echo"		<div class=\"col-md-12 com\" style=\"border-style:;background-color:#b2b2b2;box-shadow: 5px 5px;\">";
//
//                    reply($messid);
//                    echo"			
//                                                    </div>";
//                    //echo"comment div";
//                    echo"	<div class=\"col-md-12 com\">";
//                    $for2 = "select * from forum_comment where level=1 and parent_id like '$messid.%'";
//                    $co231 = mysql_query($for2);
//                    if (mysql_num_rows($co231) > 0) {
//                        while ($co23 = mysql_fetch_array($co231)) {
//                            $arr[] = $co23['parent_id'];
//                        }
//
//                        $las = end($arr);
//                        $messid = $las + 0.2;
//                    } {
//                        $messid = $messid . ".1";
//                    }
//
//
//                    echo"	<form class=\"navbar-form\" role=\"search\" method=\"post\" action=\"chatprocess.php\">
//                            <div class=\"input-group col-md-12\">
//                                    <input type=\"hidden\" name=\"user\" value=\"$na1\"/>
//                                    <input type=\"hidden\" name=\"com_id\" value=\"$messid\"/>
//                                    <input type=\"hidden\" name=\"level\" value=\"1 \"/>
//                                    <input type=\"text\"name=\"comm\" class=\"form-control\" placeholder=\"make your comment\">
//                                    <div class=\"input-group-btn\">
//                                            <button class=\"btn btn-default\" name=\"comment2\" type=\"submit\"><i class=\"glyphicon glyphicon-exclamation-sign\"></i></button>
//                                    </div>
//                            </div>
//                    </form>
//                                            </div>";
//                    //echo"end comment div";
//                    $query3 = "select count(type) from forum_like where message_id='$messid' and username='$user' and category='$cat'";
//                    $k3 = mysql_query($query3);
//                    if (!$k3) {
//                        echo mysql_error();
//                    } else {
//                        $k4 = mysql_fetch_array($k3);
//                        $lik = $k4[0];
//                    }
//                    //echo "like div";
//                    echo "	<div class=\"col-md-12 com\"><h3 style=\"float:left\">";
//
//
//
//
//                    if (isset($_SESSION["username"])) {
//                        $na1 = $_SESSION['username'];
//                        $na2 = $row['username'];
//                    }
//
//
//                    if (isset($_SESSION["username"]) && ($na1 == $na2)) {
//                        echo "<h3 style=\"float:left\">Like</h3>";
//                        //echo "<h3 style=\"float:right\"><a href=\"#\">share</a></h3><br>";
//                        echo "<h3 style=\"margin-left:0px;float:left;font-size:12px\">$like others and you Like</h3>";
//                    }
//                    if (isset($_SESSION["username"]) && ($na1 != $na2)) {
//                        $que = "select * from liketracker where imagename='{$row['id']}' and member='$na1'";
//                        $resul = mysql_query($que);
//                        if (mysql_num_rows($resul) > 0) {
//
//                            echo "<h3 style=\"float:left\">Liked</h3><h3 style=\"float:right\">";
//                            //echo"<a href=\"#\">share</a></h3><br>";
//                            //echo"	<h3 style=\"margin-left:0px;float:left;font-size:12px\">$like others and you Like</h3>";	
//                        } else {
//
//                            echo "<h3 style=\"float:left\"><a href=\"chatprocess.php?id22={$row['id']}&&poster2=$na2&&user=$na1\">like</a></h3>";
//                            //<h3 style=\"float:right\"><a href=\"#\">share</a></h3>
//                        }
//                    }
//
//
//
//                    echo"</div>";
//                    echo"		</div>";
//                    //echo			endlike div
//                }
                ?>





                        
                    </div>
                    
                    
                </div>
                
            </div>
            <div class="col-md-3">
                <!--add like minded peoploe-->
                
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

   
<?php
include_once 'incl/footer.php';
ob_end_flush();
?>