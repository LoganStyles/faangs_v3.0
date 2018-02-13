<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_POST['submit'])) {
    $username = $_GET['user'];
    $status = test_input($_POST['status']);

    if ($status == 'off') {
        $query1 = "update registration set phs='0'where username='$username'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>your phone will now be visible on your gallery page</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header("Refresh:1; url=contest2.php?id={$username}");
        }
    } else {
        $query1 = "update registration set phs='2'where username='$username'";
        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>your phone number can no longer be visible on the gallery page</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header("Refresh:1; url=contest2.php?id={$username}");
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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">NOTIFICATION</h3>

    <div class="col-md-12" style="padding-top:10px;background: #fefbd8;"><?PHP
$user = "admin";

$query1 = "select * from msg where rec='$user' limit 10 ";
$result1 = mysql_query($query1);

if (mysql_num_rows($result1) > 0) {
    while ($rec = mysql_fetch_array($result1)) {
        if ($rec["state"] == 1) {
            echo "<a href=\"admnoti2.php?id={$rec['id']}\"><div style=\"height:50px;margin-bottom:1px;background:#f4e1d2;line-height:3;\">";
        } else {
            echo "<a href=\"admnoti2.php?id={$rec['id']}\"><div style=\"height:50px;margin-bottom:1px;background:white;line-height:3;\">";
        }
        echo "<div class=\"col-md-3 \">";
        echo "{$rec['sender']}";
        echo "</div>";
        echo "<div class=\"col-md-7 \">";
        //echo "{$rec['message']}";
        $p = substr($rec['message'], 0, 60);
        echo $p;

        echo "</div>";
        echo "<div class=\"col-md-2 \">";
        echo "{$rec['date']}";

        echo "</div>";

        echo "</div></a>";
    }
}
?>
    </div>
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();
?>
