<?php
ob_start();
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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">TICK ADMIN PRIVILAGE</h3>
    
    <div class="col-md-8 col-md-offset-4">
            <?php
            echo "  <form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"manageadminprocess.php\" enctype=\"multipart/form-data\"/>	
                        <fieldset>
                         <div class=\"form-group\">
                                <div class=\"col-md-7\">
                                        <input type=\"text\" class=\"form-control\" id=\"title\"  name=\"username\" placeholder=\"Enter name of user\" required>
                                </div>

                        </div>
                        <div class=\"form-group\">
                                <div class=\"col-md-7\">
                                        <input type=\"text\" class=\"form-control\" id=\"title\"  name=\"pwd\" placeholder=\"enter password\" required>
                                </div>

                        </div>

                                <div class=\"form-group\">
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"createcontest\" >Create Contest</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"payment_request\">Payment Request</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"view_contestant\">View Contestant</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"uuser\">Update User date</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"ubank\">Update bank detail</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"umodel\">Update model information</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"ulike\">Update like</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"uuserfund\">Update user fund</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"suspend\">Suspend user</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"duser\">Delete user</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"ubanner\">Upload banner</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"dbanner\">Delete banner</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"xchang\">Exchange rate</label>
                                                </div>";
            /*             * <div class=\"checkbox col-md-5 col-md-offset-2\">
              <label><input type=\"checkbox\" value=\"1\" name=\"forum\">Forum</label>
              </div>
              <div class=\"checkbox col-md-5 col-md-offset-2\">
              <label><input type=\"checkbox\" value=\"1\" name=\"dforum\">Delete forum post</label>
              </div> */
            echo"	<div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"vip\">Manage Vip</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"vvip\">View Vip</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"avip\">Add Vip</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"dvip\">Delete Vip</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"msg\">Message</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"msgpart\">Message Participate</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"msgnoti\">Message Notification</label>
                                                </div>
                                                <div class=\"checkbox col-12\">
                                                  <label><input type=\"checkbox\" value=\"1\" name=\"changeupassword\">Change User password</label>
                                                </div>

                                </div>
                                 <div class=\"form-group\">
                                  <button style=\"font-size:1em !important;\" type=\"submit\" class=\"btn btn-default col-12\" name=\"submit\">Create</button>

                                </div>

                        </fieldset>
                </form>";
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