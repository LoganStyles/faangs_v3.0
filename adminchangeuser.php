<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_POST['submit4'])) {

    $balance = test_input($_POST['balance']);
    $query3 = "select * from registration where username='$balance'";
    $result1 = mysql_query($query3);

    if (mysql_num_rows($result1) >= 1) {
        $nam = "<H4> {$balance}  already exit</H4>";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=stats.php');
    } else {
        $query1 = "update registration set username='$balance'where status2=5";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>{$balance} is now your new username</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=stats.php');
        }
    }
}
?>

<section id="page-keeper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4><?php echo $msg;?></h4>
      </div>
<div class="col-md-10 t main_body">

    <h3 style="margin-top:10px;TEXT-ALIGN:CENTER;"></h3>
<?php
$content="";
$query="SELECT username from registration where status2=5";
$result1 = mysql_query ($query);
$rec=mysql_fetch_array($result1);
$content.= "<div class=\"col-md-7 col-md-offset-4 \">";
$content.= "<p><b> Current username is {$rec['username']}</b></p>";

$content.="<form method=\"post\" action=\"\" id=\"form1\>";
$content.="<div class=\"form-row\">";
$content.="<div class=\"form-group col-md-12\">";
$content.="<label for=\"name\">username</label>";
$content.="<input type=\"text\" class=\"form-control\" name=\"balance\" placeholder=\"enter new username\">";
$content.="</div></div>";
$content.="<button type=\"submit\" name=\"submit\" class=\"btn btn-primary col-md-6\">Update</button>";
$content.="</form></div>";

?>
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();
?>        