<?php ob_start(); 
require_once("incl/nav_admin.php");
$msg="";

?>


<section id="page-keeper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4><?php echo $msg;?></h4>
      </div>
<div class="col-md-10 t main_body">

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">CREATE CONTEST</h3>

    <?php
if (isset($_GET['id'])) {

    $val = test_input($_GET['id']);
    if ($val == 1) {
        $val2 = test_input($_GET['id2']);
        $query1 = "delete  from advert where id='$val2'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() > 0) {
            $nam = "<H4> the banner have been successfully deleted</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=del2.php');
        }
    } else {

        $nam = "<H4>try again</H4>";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";

        header('Refresh:1; url=del2.php');
    }
}

$query4 = "select * from advert";
$result4 = mysql_query($query4);
if (mysql_num_rows($result4) > 0) {
    $content = "<section class=\"testimonials4 cid-qHL0OBy54p\" id=\"testimonials4-1o\">";
    $content.="<div class=\"container\">";
    $content.="<div class=\"col-md-10 testimonials-container\">";

    while ($rec = mysql_fetch_array($result4)) {
        $content.="<div class=\"testimonials-item\">";
        $content.="<div class=\"user row\">";
        $content.="<div class=\"col-lg-3 col-md-4\">";
        $content.="<div class=\"user_image\">";
        $content.="<img src=\"banner/{$rec['imgname']}\">";
        $content.="</div></div>";
        $content.="<div class=\"testimonials-caption col-lg-9 col-md-8\">";
        $content.="<div class=\"user_name mbr-bold mbr-fonts-style align-left pt-3 display-7\" style=\"font-size:1.5em\">";
        $content.="{$rec['bannername']}</div>";
        $content.="<div class=\"user_desk mbr-light mbr-fonts-style align-left pt-2 display-7\">";
        $content.="<a href=\"del2.php?id=1&&id2={$rec['id']}\"><span class=\"glyphicon glyphicon-trash\">Delete</span></a>";
        $content.="</div></div></div></div>";
    }
    $content.="</div></div></section>";
    echo $content;
} else {
    $nam = "no advert left";
    echo "<div class=\"alert alert-danger\">";
    echo "	<strong>";
    echo "{$nam}";
    echo "	</strong>";
    echo "</div>";
}
?>

    
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();
?>
