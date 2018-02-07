<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_POST['submit'])) {

    $p1 = test_input($_POST['exc']);
    $p2 = test_input($_POST['exc1']);
    $p1 = strtolower($p1);
    $p2 = strtolower($p2);

    if ($p1 == $p2) {
        $p1 = md5($p1);
        $query1 = "update admin set password='$p1' where id=1";

        $result = mysql_query($query1);
        if (mysql_affected_rows() >= 1) {
            $nam = "<H4>admin password has been successfully changed</H4>";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:1; url=adminpage.php');
        }
    } else {
        $nam = "<H4>update fail</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=adminpage.php');
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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">CHANGE ADMIN PASSWORD</h3>

    <form>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Password</label>
                <input type="password" class="form-control" name="exc" placeholder="Enter new password">
            </div>

        </div>
        
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Confirm password</label>
                <input type="password" class="form-control" name="exc1" placeholder="confirm password">
            </div>

        </div>
        <button type="submit" name="submit" class="btn btn-primary col-md-6">Submit</button>
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