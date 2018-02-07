<?php

ob_start();
require_once("incl/mail2.php");
require_once("incl/cons.php");
cont();
require_once("incl/function.php");
session_start();
//require_once("incl/mail2.php");
$sessionvariable = $_SESSION['username'];
if (isset($_POST['chat'])) {
    date_default_timezone_set("Africa/Lagos");
    $post = test_input($_POST['post']);
    $post = strtoupper($post);
    $category = test_input($_GET['category']);
    $category = strtoupper($category);
    $dat = date("y-m-d");
    $tim = date("Y-m-d  H:i:s");
    echo $dat;
    echo $post . "</br>";
    echo $category . "</br>";
    echo $sessionvariable;
    ///////////////////////////////////////////////////////////////////////////////////////file validation
    $fil = $_FILES["file"]["name"];
    if ($fil != "") {
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $a . sha1(uniqid(mt_rand(), true)) . '.' . end($temp);
        $target_dir = "forumimage/";
        $target_file = $target_dir . basename($newfilename);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "File is not an image";
            echo "	</strong>";
            $uploadOk = 0;
            header("location:chat.php?category=$category");
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "File already exist or rename your file";
            echo "	</strong>";
            $uploadOk = 0;
            header("location:chat.php?category=$category");
        }
        // Check file size
        if ($_FILES["file"]["size"] > 1500000) {
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "File is too large";
            echo "	</strong>";
            $uploadOk = 0;
            header("location:chat.php?category=$category");
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" &&
                $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" &&
                $imageFileType != "JPEG" && $imageFileType != "GIF") {
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "only gif,jpg,jpeg,png file are supported";
            echo "	</strong>";
            $uploadOk = 0;
            header("location:chat.php?category=$category");
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header("location:chat.php?category=$category");
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $fname = $newfilename;
                $query = " INSERT into  home(username,post_content,image,date,time,category,sta)VALUES('$sessionvariable','$post','$fname','$dat','$tim','fashion',1)";
                $k = mysql_query($query);
                if ($k) {
                    $nam = " has been succesfully added to the social media content</H4>";
                    echo "<div class=\"alert alert-success\">";
                    echo "	<strong>";
                    echo "{$nam}";
                    echo "	</strong>";
                    echo "</div>";
                    header("location:chat.php?category=$category");
                } else {
                    $nam = "review your information";
                    echo "<div class=\"alert alert-danger\">";
                    echo "	<strong>";
                    echo "{$nam}";
                    echo "	</strong>";
                    echo "</div>";
                    header("location:chat.php?category=$category");
                }
            }
            /////////////////////
        }
    } else {
        $query = " INSERT into  home(username,post_content,image,date,time,category,sta)VALUES('$sessionvariable','$post','','$dat','$tim','fashion',0)";
        $k = mysql_query($query);
        if ($k) {
            $nam = " has been succesfully added to the social media content</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header("location:chat.php?category=$category");
        } else {
            $nam = "review your information";
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header("location:chat.php?category=$category");
        }
    }
}
/////////////////////////////1	
if (isset($_GET['id']) && isset($_GET['username']) && isset($_GET['liker'])) {
    $c = test_input($_GET['id']);
    $username = test_input($_GET['username']);
    $liker = test_input($_GET['liker']);
    $messid = test_input($_GET['messid']);
    $cat = test_input($_GET['cat']);
    if ($username != $liker) {
        echo $c, $username, $liker;
        $query2 = "insert into forum_like(message_id,username,likes,comment,category,type)values('$messid','$username','$liker','','$cat','$c')";
        $k = mysql_query($query2);
        if ($k) {
            header("location:chat.php?category={$cat}");
        } else {
            echo mysql_error();
        }
    } else {
        header("location:chat.php?category={$cat}");
    }
}
if (isset($_GET['myusername']) && isset($_GET['friendusername'])) {
    $myusername = test_input($_GET['myusername']);
    $friendusername = test_input($_GET['friendusername']);
    //echo $friendusername;
    //////////////sta 1 means rejected or unfriend,sta 2 mean accepted no sta means not added
    $cat = test_input($_GET['cat']);
    $query2 = "insert into friendlist(myusername,friendusername)values('$myusername','$friendusername')";
    $k = mysql_query($query2);
    if ($k) {
        header("location:chat.php?category={$cat}");
    } else {
        header("location:chat.php?category={$cat}");
    }
}
///////////////////////////////////2
if (isset($_GET['id']) && isset($_GET['username']) && isset($_GET['liker'])) {
    $c = test_input($_GET['id']);
    $username = test_input($_GET['username']);
    $liker = test_input($_GET['liker']);
    $messid = test_input($_GET['messid']);
    $cat = test_input($_GET['cat']);
    if ($username != $liker) {
        echo $c, $username, $liker;
        $query2 = "insert into forum_like(message_id,username,likes,comment,category,type)values('$messid','$username','$liker','','$cat','$c')";
        $k = mysql_query($query2);
        if ($k) {
            header("location:chat.php?category={$cat}");
        } else {
            echo mysql_error();
        }
    } else {
        header("location:chat.php?category={$cat}");
    }
}
if (isset($_GET['myusername2']) && isset($_GET['friendusername2']) && isset($_GET['sta'])) {
    $myusername2 = test_input($_GET['myusername2']);
    $friendusername2 = test_input($_GET['friendusername2']);
    //echo $friendusername;
    //////////////sta 1 means rejected or unfriend,sta 2 mean accepted no sta means not added
    //$cat=test_input($_GET['cat']);
    $sta = test_input($_GET['sta']);
    if ($sta == 1) {
        $query3 = "update friendlist set status=2 where friendusername='$myusername2' and myusername='$friendusername2'";
    } else {
        $query3 = "update friendlist set status=1 where friendusername='$myusername2' and myusername='$friendusername2' or friendusername='$friendusername2' and myusername='$myusername2' ";
    }
    $k = mysql_query($query3);
    if ($k) {
        header("location:chat.php?category={$cat}");
    } else {
        header("location:chat.php?category={$cat}");
    }
}
if (isset($_GET['rec']) && isset($_GET['send'])) {
    $rec = test_input($_GET['rec']);
    $send = test_input($_GET['send']);
    $cat = test_input($_GET['cat']);
    $mes = test_input($_POST['a']);
    $query2 = "insert into chat(send,rec,mes)values('$send','$rec','$mes')";
    $k = mysql_query($query2);
    if ($k) {
        //	header("location:chat.php?category={$cat}");
    } else {
        //header("location:chat.php?category={$cat}");
    }
}
//////////////////////////////////3	
if (isset($_GET['id2']) && isset($_GET['poster'])) {
    $postid = test_input($_GET['id2']);
    $poster = test_input($_GET['poster']);
    $liker = test_input($_GET['user']);
    $query2 = "insert into liketracker(username,imagename,member,stast)values('$poster','$postid','$liker',1)";
    $k = mysql_query($query2);
    if ($k) {

        $emailss = "select * from registration where username='$poster'";
        $emai = mysql_query($emailss);
        $remail = mysql_fetch_array($emai);
        echo $remail['email'];
        $email2 = $remail['email'];
        //echo $liker;
        //echo $email2;
        $subject = 'Faangs Notification';
        $message = "<p>{$liker} Liked your post </p>
												";
        $mail->sendmail("$email2", "$message", "$subject");
        ///////////FUND UPDATE



        $query2 = "update fund set balance=balance-2 where username='$poster'";
        $result = mysql_query($query2);
        //////////COUNT LIKES
        /*         * $query3="select Sum(stast) from liketracker where username='$poster'";
          $result3=mysql_query($query3);
          $rec3=mysql_fetch_array($result3); */
        //echo "number of count is".$rec3[0];
        /////////////////TOTAL LIKES
        $query4 = "select * from total where username='$poster'";
        $result4 = mysql_query($query4);
        if (mysql_num_rows($result4) > 0) {
            $result200 = mysql_fetch_array($result4);
            echo "initial " . $result200['tos'];
            $t = $result200['tos'] + 1;
            //echo "finaal".$t;
            $query2 = "update total set tos='$t' where username='$poster'";
            $result = mysql_query($query2);
        } else {
            $query5 = "INSERT into total (username,tos)values('$poster','1')";
            $result5 = mysql_query($query5);
        }
        header("location:chat.php");
    } else {
        header("location:chat.php");
    }
}
/////////////////////////////////4
if (isset($_GET['id22']) && isset($_GET['poster2'])) {
    $postid = test_input($_GET['id22']);
    $poster2 = test_input($_GET['poster2']);
    $liker = test_input($_GET['user']);
    $query2 = "insert into liketracker(username,imagename,member,stast)values('$poster2','$postid','$liker',1)";
    $k = mysql_query($query2);
    if ($k) {


        $emailss = "select * from registration where username='$poster2'";
        $emai = mysql_query($emailss);
        $remail = mysql_fetch_array($emai);
        echo $remail['email'];
        $email2 = $remail['email'];
        echo $liker;
        echo $email2;
        $subject = 'Faangs Notification';
        $message = "<p>{$liker} Liked your Post</p>";
        $mail->sendmail("$email2", "$message", "$subject");
        ///////////FUND UPDATE
        $query2 = "update fund set balance=balance-2 where username='$poster2'";
        $result = mysql_query($query2);
        //////////COUNT LIKES
        /*         * $query3="select Sum(stast) from liketracker where username='$poster'";
          $result3=mysql_query($query3);
          $rec3=mysql_fetch_array($result3); */
        //echo "number of count is".$rec3[0];
        /////////////////TOTAL LIKES
        $query4 = "select * from total where username='$poster2'";
        $result4 = mysql_query($query4);
        if (mysql_num_rows($result4) > 0) {
            $result200 = mysql_fetch_array($result4);
            echo "initial " . $result200['tos'];
            $t = $result200['tos'] + 1;
            //echo "finaal".$t;
            $query2 = "update total set tos='$t' where username='$poster2'";
            $result = mysql_query($query2);
        } else {
            $query5 = "INSERT into total (username,tos)values('$poster2','1')";
            $result5 = mysql_query($query5);
        }
        header("location:chat2.php?user=$poster2");
    } else {
        header("location:chat.php");
    }
}
////////////////////////////////5
if (isset($_POST['comment'])) {
    $level = test_input($_POST['level']);
    $comment = test_input($_POST['comm']);
    //echo $a;
    $user = test_input($_POST['user']);
    $postid = test_input($_POST['com_id']);
    date_default_timezone_set("Africa/Lagos");
    $dat = date("y-m-d");
    $tim = date("Y-m-d  H:i:s");
    $query2 = "insert into forum_comment(username,level,comment,date,time,parent_id)values('$user','$level','$comment','$dat','$tim','$postid')";
    $k = mysql_query($query2);
    if ($k) {
        header("location:chat.php?category={$cat}");
    }
}
////////////////////////////////6
if (isset($_POST['comment2'])) {
    $level = test_input($_POST['level']);
    $comment = test_input($_POST['comm']);
    //echo $a;
    $user = test_input($_POST['user']);
    $postid = test_input($_POST['com_id']);
    date_default_timezone_set("Africa/Lagos");
    $dat = date("y-m-d");
    $tim = date("Y-m-d  H:i:s");
    $query2 = "insert into forum_comment(username,level,comment,date,time,parent_id)values('$user','$level','$comment','$dat','$tim','$postid')";
    $k = mysql_query($query2);
    if ($k) {
        header("location:chat2.php?user=$user");
    }
}
?>