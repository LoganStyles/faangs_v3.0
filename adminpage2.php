<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_POST['submit'])) {
    $name = test_input($_POST['name']);

    $start = test_input($_POST['start']);
    $end = test_input($_POST['end']);
    $query1 = "select * from contest where status='active'";
    $k1 = mysql_query($query1);
    if (mysql_num_rows($k1) > 0) {
        $nam = "<h4>you can only have one active contest</h4>";
        $msg.= "<div class=\"alert alert-danger\"><strong>{$nam}</strong></div>";
    } else {
        $query2 = " INSERT into contest(contestname,startdate,enddate,status)values('$name','$start','$end','active')";

        $k = mysql_query($query2);
        if ($k) {
            
        }
    }
}

if (isset($_POST['submit2'])) {
    $name = test_input($_POST['name']);

    $start = test_input($_POST['start']);
    $end = test_input($_POST['end']);
    $query1 = "update contest set contestname='$name',startdate='$start',enddate='$end' where status='active'";

    $result = mysql_query($query1);
    if (mysql_affected_rows() >= 1) {
        $nam = "<h4>the existing contest has been successfully updated</h4>";        
        $msg.= "<div class=\"alert alert-success\"><strong>{$nam}</strong></div>";
        //header('Refresh:1; url=index.php');
    } else {
        $nam = "<H4>update fail</H4>";
        $msg.= "<div class=\"alert alert-danger\"><strong>{$nam}</strong></div>";
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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">CREATE CONTEST</h3>

    <form method ="POST" action="" class="form-horizontal">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter contest name">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="start">Start</label>
                <input type="text" class="form-control" name="start" placeholder="Enter start date (y/m/d)">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <label for="end">End</label>
                <input type="text" class="form-control" name="end" placeholder="Enter end date (y/m/d)">
            </div>
        </div>
        <input type="submit" name="submit" value="Create" class="btn btn-warning col-12 col-md-6 col-lg-4" style="font-size: 1em !important" />
        <button type="submit" name="submit2" class="btn btn-warning col-12 col-md-6 col-lg-4" style="font-size: 1em !important">Update Contest</button>
    </form>
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();
?>