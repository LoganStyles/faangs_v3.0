<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_POST['submit'])) {
    $exc = test_input($_POST['exc']);

    $query1 = "select * from exchange limit 1";
    $k1 = mysql_query($query1);
    if (mysql_num_rows($k1) > 0) {


        $query2 = "update exchange set rate='$exc'";
        $result = mysql_query($query2);
        if (mysql_affected_rows() > 0) {
            $nam = "the current dollar rate has been  successfully updated";
            $msg.= "<div class=\"alert alert-success\">";
            $msg.= "	<strong>";
            $msg.= "{$nam}";
            $msg.= "	</strong>";
            $msg.= "</div>";
            header('Refresh:3; url=adminpage.php');
        }
    } else {
        $query2 = " INSERT into exchange(rate)values('$exc')";

        $k = mysql_query($query2);

        if ($k) {
            $nam = "Exchange rate have been successfully set";
            $msg.= "<div class=\"alert alert-success\">";
            $msg.= "	<strong>";
            $msg.= "{$nam}";
            $msg.= "	</strong>";
            $msg.= "</div>";
            header('Refresh:3; url=adminpage.php');
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
        $msg.= "<div class=\"alert alert-success\">";
        $msg.= "	<strong>";
        $msg.= "{$nam}";
        $msg.= "	</strong>";
        $msg.= "</div>";
        header('Refresh:1; url=index.php');
    } else {

        $nam = "<H4>update fail</H4>";
        $msg.= "<div class=\"alert alert-danger\">";
        $msg.= "	<strong>";
        $msg.= "{$nam}";
        $msg.= "	</strong>";
        $msg.= "</div>";
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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">ENTER EXCHANGE RATE</h3>
    
    <div class="col-md-12" style="text-align:center;margin-bottom:2em;font-weight:bold;">
            current dollar rate:<?php
            $query1 = "select * from exchange";
            $result1 = mysql_query($query1);
            if (mysql_num_rows($result1) > 0) {
                $rec = mysql_fetch_array($result1);
                echo $rec['rate'];
            } else {

                echo "0";
            }
            ?>
        </div>
    
    <div id="display_msg"><?php echo $disp_msg;?></div>

    <form method="POST" action="" >
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="exc" placeholder="Enter value of dollar">
            </div>
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-warning col-12 col-md-6 col-lg-4">Submit</button>
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
