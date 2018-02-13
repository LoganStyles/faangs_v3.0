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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">UPLOAD AVATAR</h3>

    <form class="form-horizontal" role="form" method="post" action="avatarprocess.php" enctype="multipart/form-data">
        <div class="form-group">

            <div class="col-md-5 col-md">
                <input type="file" class="btn-file" id="file"  name="file">
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
