<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_POST['submit'])) {
$user = $_SESSION['admin'];

    $fil = $_FILES["file"]["name"];
    if ($fil == null) {
        echo "<div class=\"alert-danger\">";
        echo "	<strong>";
        echo "please fill the form properly";
        echo "	</strong>";
        header('Refresh:3; url=upload_avatar.php');
    } else {
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $a . sha1(uniqid(mt_rand(), true)) . '.' . end($temp);
        $target_dir = "avatars/";
        $target_file = $target_dir . basename($newfilename);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "File is not an image";
            echo "	</strong>";
            $uploadOk = 0;
            header('Refresh:3; url=upload_avatar.php');
        }

        // Check file size
        if ($_FILES["file"]["size"] > 1100000) {
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "File is too large";
            echo "	</strong>";
            $uploadOk = 0;
            header('Refresh:3; url=upload_avatar.php');
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
            header('Refresh:3; url=upload_avatar.php');
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header('Refresh:3; url=upload_avatar.php');
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $fname = $newfilename;
//                $query1 = "select * from vip where username='$user'";
//                $result1 = mysql_query($query1);
//                $result21 = mysql_fetch_array($result1);
//                $img = $result21['image'];



                $table=($user=="admin")?("admin"):("subadmin");
                $query="UPDATE $table set avatar='$fname' where username='$user'";
//                $query = " INSERT into  vip(username,image)values('$user','$fname')";
                $k = mysql_query($query);
                if ($k) {

                    $nam = "<H4>image uploaded succesfully</H4>";
                    echo "<div class=\"alert alert-success\">";
                    echo "	<strong>";
                    echo "{$nam}";
                    echo "	</strong>";
                    echo "</div>";
                    header('Refresh:2; url=upload_avatar.php');
                } else {
                    $nam = "upload failed";
                    echo "<div class=\"alert alert-danger\">";
                    echo "	<strong>";
                    echo "{$nam}";
                    echo "	</strong>";
                    echo "</div>";
                    header('Refresh:3; url=upload_avatar.php.php');
                }
            } else {
                echo "<div class=\"alert alert-danger\">";
                echo "	<strong>";
                echo "File upload fail";
                echo "	</strong>";
                header('Refresh:3; url=upload_avatar.php');
            }
        }
    }
}
?>

