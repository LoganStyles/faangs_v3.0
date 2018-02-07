<?php

ob_start();
require_once("incl/nav_admin.php");
$msg="";
?>
<?php

$user = $_SESSION['admin'];
$spl = (str_split($user));
$last = count($spl) - 1;
$first = $spl[0];
$last = $spl[$last];
$a = $first . $last;
if (isset($_POST['submit'])) {
    $title = test_input($_POST['title']);
    //$description=test_input($_POST['description']);
    $title1 = strlen($title);
    ///////////////////////////////////////////////////////////////////////////////////////file validation
    $fil = $_FILES["file"]["name"];
    if ($fil == null) {
        echo "<div class=\"alert-danger\">";
        echo "	<strong>";
        echo "please fill the form properly";
        echo "	</strong>";
        header('Refresh:3; url=vipupload2.php');
    } else {
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $a . sha1(uniqid(mt_rand(), true)) . '.' . end($temp);
        /*         * *
          move_uploaded_file($_FILES["myFile"]["tmp_name"], "uploads/" . $newfilename);
         * */
        $target_dir = "vip/";
        //$target_file = $target_dir . basename($_FILES["file"]["name"]);
        $target_file = $target_dir . basename($newfilename);
        //echo basename($_FILES["file"]["name"]);
        //echo $target_file;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
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
            header('Refresh:3; url=vipupload2.php');
        }
        /** Check if file already exists
          if (file_exists($target_file))
          {
          echo "<div class=\"alert alert-danger\">";
          echo "	<strong>";
          echo 	"File already exist or rename your file";
          echo "	</strong>";
          $uploadOk = 0;
          header('Refresh:3; url=vipupload2.php');
          } */
        // Check file size
        if ($_FILES["file"]["size"] > 1100000) {
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "File is too large";
            echo "	</strong>";
            $uploadOk = 0;
            header('Refresh:3; url=vipupload2.php');
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
            header('Refresh:3; url=vipupload2.php');
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header('Refresh:3; url=vipupload2.php');
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $fname = $newfilename;
                $query1 = "select * from vip where username='$user'";
                $result1 = mysql_query($query1);
                $result21 = mysql_fetch_array($result1);
                $img = $result21['image'];



                $query = " INSERT into  vip(username,image)values('$user','$fname')";
                $k = mysql_query($query);
                if ($k) {

                    $nam = "<H4>image uploaded succesfully</H4>";
                    echo "<div class=\"alert alert-success\">";
                    echo "	<strong>";
                    echo "{$nam}";
                    echo "	</strong>";
                    echo "</div>";
                    header('Refresh:2; url=vipupload2.php');
                } else {
                    $nam = "review your information";
                    echo "<div class=\"alert alert-danger\">";
                    echo "	<strong>";
                    echo "{$nam}";
                    echo "	</strong>";
                    echo "</div>";
                    header('Refresh:3; url=vipupload2.php.php');
                }
            } else {
                echo "<div class=\"alert alert-danger\">";
                echo "	<strong>";
                echo "File upload fail";
                echo "	</strong>";
                header('Refresh:3; url=vipupload2.php');
            }
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////										////////////////////////submission query
    }
}
ob_end_flush();
?>	