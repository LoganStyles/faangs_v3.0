<?php ob_start(); ?>
<?php
require_once("incl/participant.php");
$email = $_SESSION['email'];
$pe = $_SESSION['username'];
?>
<?PHP
if (isset($_GET['id'])) {
    $val = test_input($_GET['id']);
    if ($val == 1) {
        $val2 = test_input($_GET['id2']);
        $query1 = "delete  from picture where username='$pe' && id='$val2'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() > 0) {
            $nam = "<H4> the picture have been successfully deleted</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=del.php');
        }
    } else {
        $quer = "select * from picture where profile='YES' and username='$pe'";
        $rec = mysql_query($quer);
        $res = mysql_fetch_array($rec);
        $upd = $res['img'];
        $val2 = test_input($_GET['id3']);
        //$query1="update picture set profile='NO' where username='$pe'";
        $query1 = "update picture set profile='YES' where username='$pe' && img='$val2'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>the picture has been set as your default picture</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            $query1 = "update picture set profile='NO' where username='$pe' && img='$upd'";
            $result = mysql_query($query1);
            header('Refresh:1; url=del.php');
        }
    }
}
?>
<div class="col-md-12 t" style="overflow:scroll;">
    <!-----------------------------------------------------------------form body------------------------------------>
<?php
$query4 = "select * from picture where username='$pe' and profile!='YES'";
$result4 = mysql_query($query4);
if (mysql_num_rows($result4) > 0) {
    while ($rec = mysql_fetch_array($result4)) {
        echo "<div class=\"col-md-12 abouts\">";
        echo "<div class=\"col-md-3\" id=\"pix\">";
        $k = ($rec['username']);
        echo "			<a href=\"contest2.php?id=$k\"><img src=\"img/{$rec['img']}\"></a>";
        echo "</div>";
        echo "<div class=\"col-md-3\" id=\"\">";
        echo "<div id=\"about-infos\">";
        //echo "			//<a href=\"contest2.php?id=$k\">	<h4>{$rec['fullname']}</h4></a>";
        //echo "				<p>{$rec['bio']}</p>";
        echo "</div>";
        echo "</div>";
        echo "<div class=\"col-md-5\">";
        echo "<div id=\"about-infos\">";
        //echo "			<a href=\"contest2.php?id=$k\">	<h4>Total Likes</h4></a>";
        echo "				<a href=\"del.php?id=1&&id2={$rec['id']}\"><p style=\"background:; color:#414143;font-size:1em;font-weight:bold;margin-top:2em;\"<span class=\"glyphicon glyphicon-trash\"
																	></SPAN>DELETE</p></a>";
        //id3={$rec['img']
        echo "				<a href=\"del.php?id=2&&id3={$rec['img']}\"><p style=\"background:; color:#414143;font-size:1em;font-weight:bold;margin-top:2em;\"<span class=\"glyphicon glyphicon-home\"
																	></SPAN>MAKE DEFAULT PICTURE</p></a>";
        echo "</div>";
        echo "<div id=\"\">";
        echo "	";
        echo "</div>";
        echo "</div>";
        echo "<div class=\"clearfix\"> </div>";
        echo "</div>";
    }
} else {
    $nam = "please upload your picture first";
    echo "<div class=\"alert alert-danger\">";
    echo "	<strong>";
    echo "{$nam}";
    echo "	</strong>";
    echo "</div>";
    header('Refresh:3; url=participate.php');
}
?>
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
</div>
</div>
</div>
</div>
<!--FOOTER-->
<footer>
<?php
//////////////////////////////////////random string generator
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
$string = '';
$max = strlen($characters) - 1;
for ($i = 0; $i < $max; $i++) {
    $string .= $characters[mt_rand(0, $max)];
}
$reference = $pe . $string;
$_SESSION["reference"] = $reference;
include("incl/footer.php");
ob_end_flush();
//live:
?>
</footer>
</div>
</body>

</html>