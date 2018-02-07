<?php
ob_start();
require_once("incl/nav_admin.php");


if (isset($_POST['submit'])) {
    $name = test_input($_POST['name']);

    $start = test_input($_POST['start']);
    $end = test_input($_POST['end']);
    $query1 = "select * from contest where status='active'";
    $k1 = mysql_query($query1);
    if (mysql_num_rows($k1) > 0) {
        $nam = "<H4>you can only have one active contest</H4>";

        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";

        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
    } else {
        $query2 = " INSERT into contest(contestname,startdate,enddate,status)values('$name','$start','$end','active')";

        $k = mysql_query($query2);

        if ($k) {
            
        }
    }
}
?>
<?php
if (isset($_POST['submit2'])) {
    $name = test_input($_POST['name']);

    $start = test_input($_POST['start']);
    $end = test_input($_POST['end']);
    $query1 = "update contest set contestname='$name',startdate='$start',enddate='$end' where status='active'";



    $result = mysql_query($query1);
    if (mysql_affected_rows() >= 1) {
        $nam = "<H4>the existing contest has been successfully updated</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=index.php');
    } else {

        $nam = "<H4>update fail</H4>";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=index.php');
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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">ADMIN AREA</h3>

    
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();
?>