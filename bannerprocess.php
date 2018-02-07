<?php
ob_start();
require_once("incl/nav_admin.php");
session_start();

if (isset($_POST['submit'])) {

    $bname = test_input($_POST['bname']);
    $start = test_input($_POST['sdat']);
    $end = test_input($_POST['edat']);

    if (isset($_POST['top'])) {
        $top = test_input($_POST['top']);
        $top = 1;
    } else {

        $top = 0;
    }
    if (isset($_POST['left'])) {
        $left = test_input($_POST['left']);
        $left = 1;
    } else {
        $left = 0;
    }
    if (isset($_POST['right'])) {
        $right = test_input($_POST['right']);
        $right = 1;
    } else {
        $right = 0;
    }
    if (isset($_POST['bottom'])) {
        $bottom = test_input($_POST['bottom']);
        $bottom = 1;
    } else {
        $bottom = 0;
    }

    ///////////////////////////////////////////////////////////////////////////////////////file validation
    $target_dir = "banner/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
       
    } else {
//        echo "<div class=\"alert alert-danger\">";
//        echo "	<strong>";
//
//        echo "File is not an image";
//        echo "	</strong>";
        $_SESSION['msg']= "<div class=\"alert alert-danger\"><strong>File is not an image</strong></div>";
        $uploadOk = 0;
        header('Refresh:3; url=banner.php');
    }

    // Check if file already exists
    if (file_exists($target_file)) {
//        echo "<div class=\"alert alert-danger\">";
//        echo "	<strong>";
//
//        echo "File already exist or rename your file";
//        echo "	</strong>";
        $_SESSION['msg']= "<div class=\"alert alert-danger\"><strong>File already exist or rename your file</strong></div>";
        $uploadOk = 0;
        header('Refresh:3; url=banner.php');
    }
    // Check file size
    if ($_FILES["file"]["size"] > 3500000) {
//        echo "<div class=\"alert alert-danger\">";
//        echo "	<strong>";
//
//        echo "File is too large";
//        echo "	</strong>";
        $_SESSION['msg']= "<div class=\"alert alert-danger\"><strong>File is too large</strong></div>";
        $uploadOk = 0;
        header('Refresh:3; url=banner.php');
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" &&
            $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" &&
            $imageFileType != "JPEG" && $imageFileType != "GIF") {
//        echo "<div class=\"alert alert-danger\">";
//        echo "	<strong>";
//
//        echo "only gif,jpg,jpeg,png file are supported";
//        echo "	</strong>";
        $_SESSION['msg']= "<div class=\"alert alert-danger\"><strong>only gif,jpg,jpeg,png file are supported</strong></div>";
        $uploadOk = 0;
        header('Refresh:3; url=banner.php');
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {

        header('Refresh:3; url=banner.php');
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $fname = $_FILES["file"]["name"];
            //$d=mysql_insert_id;
            //$d=$d+1;
            //$dat= date("Y/m/d");

            $query = " INSERT into  advert(bannername,imgname,tops,lefts,rights,bottoms,sdate,edate)values('$bname','$fname','$top','$left','$right','$bottom','$start','$end')";

            $k = mysql_query($query);

            if ($k) {
                $nam = "<H4>image uploaded succesfully</H4>";
//                echo "<div class=\"alert alert-success\">";
//                echo "	<strong>";
//                echo "{$nam}";
//                echo "	</strong>";
//                echo "</div>";
                $_SESSION['msg']= "<div class=\"alert alert-success\"><strong>$nam</strong></div>";
                header('Refresh:2; url=banner.php');
            } else {
//                $nam = "review your information";
//                echo "<div class=\"alert alert-danger\">";
//                echo "	<strong>";
//
//                echo "{$nam}";
//                echo "	</strong>";
//                echo "</div>";
                $_SESSION['msg']= "<div class=\"alert alert-danger\"><strong>$nam</strong></div>";
                header('Refresh:3; url=banner.php');
            }
        } else {
//            echo "<div class=\"alert alert-danger\">";
//            echo "	<strong>";
//
//            echo "File upload fail";
//            echo "	</strong>";
            $_SESSION['msg']= "<div class=\"alert alert-danger\"><strong>File upload fail</strong></div>";
            header('Refresh:3; url=banner.php');
        }
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////										////////////////////////submission query
}
ob_end_flush();
?>	