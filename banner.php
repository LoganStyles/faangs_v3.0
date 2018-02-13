<?php
ob_start();
require_once("incl/nav_admin.php");
session_start();
$_SESSION['msg']="";

?>

<section id="page-keeper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4><?php echo $_SESSION['msg'];?></h4>
      </div>
<div class="col-md-10 t main_body">

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">UPLOAD BANNER</h3>

    <form class="form-horizontal" role="form" method="post" action="bannerprocess.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="bname">Name</label>
                <input type="text" class="form-control" id="title" name="bname" placeholder="Enter name of banner" required>
            </div>
        </div>

        <div class="form-group">

            <div class="col-md-5 col-md">
                <input type="file" class="btn-file" id="file"  name="file" onchange="">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="sdat">Start</label>
                <input type="text" class="form-control" name="sdat" placeholder="start date y/m/d" required>
            </div>
            <div class="form-group col-md-6">
                <label for="edat">End</label>
                <input type="text" class="form-control" id="edat" placeholder="end date (y/m/d)" required>
            </div>
        </div>

        <div class="form-group">
            <div class="checkbox col-md-5 col-md-offset-2">
                <label><input type="checkbox" value="TOP" name="top">TOP</label>
            </div>
            <div class="checkbox col-md-5 col-md-offset-2">
                <label><input type="checkbox" value="RIGHT" name="right">RIGHT</label>
            </div>
            <div class="checkbox col-md-5 col-md-offset-2">
                <label><input type="checkbox" value="LEFT" name="left">LEFT</label>
            </div>
            <div class="checkbox col-md-5 col-md-offset-2">
                <label><input type="checkbox" value="BOTTOM" name="bottom">BOTTOM</label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default col-md-5 col-md-offset-2" name="submit">UPLOAD</button>
        </div>
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
