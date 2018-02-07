<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

?>
<?php
if (isset($_POST['submit'])) {
    $exc = test_input($_POST['exc']);

    $chk = "select * from  vip where username='$exc'";

    $result1 = mysql_query($chk);
    if (mysql_nUM_ROWS($result1) > 0) {
        $nam = "<H4>$exc already exist</H4>";
        echo "<div class=\"alert danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:2; url=manageadmin.php');
        die();
    }

    $query2 = " INSERT into vip(username)values('$exc')";

    $k = mysql_query($query2);

    if ($k) {
        $nam = "$exc has been successfully added to the vip list";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:3; url=adminpage.php');
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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">Enter Vip Username</h3>
    
    <form method ="post" action=" " class="form-horizontal" role="form">
        <fieldset>
            <div class="form-group">
                <div class="col-md-7 input-group al">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                    </span>
                    <input type="text" class="form-control" name="exc" placeholder="Enter username of vip">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default col-md-2 al" name="submit">Submit</button>

            </div>

        </fieldset>
    </form>

    
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();