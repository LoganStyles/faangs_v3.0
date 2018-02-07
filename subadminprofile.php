<?php
ob_start();
require_once("incl/nav_admin.php");
?>
<?php
if (isset($_GET["id"])) {

    $username = test_input($_GET['id']);
    $query1 = "select * from  subadmin where username='$username'";

    $result1 = mysql_query($query1);
} else {
   // header("location:memberheader.php");
}
$res = mysql_fetch_array($result1);
?>


<section id="page-keeper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4><?php echo $msg;?></h4>
      </div>
<div class="col-md-10 t main_body">

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;"><?php echo "{$res['username']}'s privilages"; ?></h3>
    
    <div class="col-md-8">
            <?php
            echo "  <form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"\" enctype=\"multipart/form-data\"/>	
        <fieldset>
         <div class=\"form-group\">
            <div class=\"col-md-7\">
                <input type=\"text\" class=\"form-control\" id=\"title\"  name=\"username\" value=\"{$res['username']}\" readonly>
            </div>

        </div>
								
        <div class=\"form-group\">
            <div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk = $res['create_contest'];
            if ($chk == 1) {
                $d = "checked";
            } else {
                $d = "";
            }

            echo"<label><input type=\"checkbox\" value=\"\" name=\"createcontest\" $d>Create Contest</label>
        </div>
        <div class=\"checkbox col-md-5 col-md-offset-2\">";

            $chk2 = $res['payment_request'];
            if ($chk2 == 1) {
                $d1 = "checked";
            } else {
                $d1 = "";
            }

            echo "<label><input type=\"checkbox\" value=\"\" name=\"payment_request\" $d1>Payment Request</label>
        </div>
        <div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk3 = $res['view_contestant'];
            if ($chk3 == 1) {
                $d3 = "checked";
            } else {
                $d3 = "";
            }
            echo"<label><input type=\"checkbox\" value=\"\" name=\"view_contestant\" $d3>View Contestant</label></div>
                  <div class=\"checkbox col-md-5 col-md-offset-2\">";
            
            $chk4 = $res['update_user_data'];
            if ($chk4 == 1) {
                $d4 = "checked";
            } else {
                $d4 = "";
            }
            echo"<label><input type=\"checkbox\" value=\"\" name=\"uuser\" $d4>Update User date</label></div>
		<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk5 = $res['update_bank_detail'];
            if ($chk5 == 1) {
                $d5 = "checked";
            } else {
                $d5 = "";
            }
            echo"<label><input type=\"checkbox\" value=\"\" name=\"ubank\" $d5>Update bank detail</label>
		</div><div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk6 = $res['update_model_info'];
            if ($chk6 == 1) {
                $d6 = "checked";
            } else {
                $d6 = "";
            }

            echo"	  <label><input type=\"checkbox\" value=\"\" name=\"umodel\" $d6>Update model information</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk7 = $res['update_like'];
            if ($chk7 == 1) {
                $d7 = "checked";
            } else {
                $d7 = "";
            }
            echo"	  <label><input type=\"checkbox\" value=\"\" name=\"ulike\" $d7>Update like</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk8 = $res['update_user_fund'];
            if ($chk8 == 1) {
                $d8 = "checked";
            } else {
                $d8 = "";
            }
            echo"	  <label><input type=\"checkbox\" value=\"\" name=\"uuserfund\" $d8>Update user fund</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk9 = $res['suspend_user'];
            if ($chk9 == 1) {
                $d9 = "checked";
            } else {
                $d9 = "";
            }
            echo"	  <label><input type=\"checkbox\" value=\"\" name=\"suspend\" $d9>Suspend user</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk10 = $res['delete_user'];
            if ($chk10 == 1) {
                $d10 = "checked";
            } else {
                $d10 = "";
            }
            echo"	  <label><input type=\"checkbox\" value=\"\" name=\"duser\" $d10>Delete user</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk11 = $res['upload_banner'];
            if ($chk11 == 1) {
                $d11 = "checked";
            } else {
                $d11 = "";
            }
            echo" <label><input type=\"checkbox\" value=\"\" name=\"ubanner\" $d11>Upload banner</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk12 = $res['delete_banner'];
            if ($chk12 == 1) {
                $d12 = "checked";
            } else {
                $d12 = "";
            }
            echo" <label><input type=\"checkbox\" value=\"\" name=\"dbanner\" $d12>Delete banner</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk13 = $res['exchange_rate'];
            if ($chk13 == 1) {
                $d13 = "checked";
            } else {
                $d13 = "";
            }
            echo" <label><input type=\"checkbox\" value=\"\" name=\"xchang\" $d13>Exchange rate</label>
											</div>";
            /*             * <div class=\"checkbox col-md-5 col-md-offset-2\">";
              $chk14=$res['update_'];
              if($chk14==1){
              $d14="checked";
              }
              else{
              $d14="";
              }
              echo" <label><input type=\"checkbox\" value=\"\" name=\"forum\" $d14>Forum</label>
              </div>
              <div class=\"checkbox col-md-5 col-md-offset-2\">";
              $chk15=$res['update_user_fund'];
              if($chk15==1){
              $d15="checked";
              }
              else{
              $d15="";
              }
              echo"<label><input type=\"checkbox\" value=\"\" name=\"dforum\" $d15>Delete forum post</label>
              </div> */
            echo"<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk16 = $res['vip'];
            if ($chk16 == 1) {
                $d16 = "checked";
            } else {
                $d16 = "";
            }
            echo" <label><input type=\"checkbox\" value=\"\" name=\"vip\" $d16>Vip</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk17 = $res['view_vip'];
            if ($chk17 == 1) {
                $d17 = "checked";
            } else {
                $d17 = "";
            }
            echo"  <label><input type=\"checkbox\" value=\"\" name=\"vvip\" $d17>View Vip</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk18 = $res['add_vip'];
            if ($chk18 == 1) {
                $d18 = "checked";
            } else {
                $d18 = "";
            }
            echo"  <label><input type=\"checkbox\" value=\"\" name=\"avip\" $d18>Add Vip</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk19 = $res['delete_vip'];
            if ($chk19 == 1) {
                $d19 = "checked";
            } else {
                $d19 = "";
            }
            echo"  <label><input type=\"checkbox\" value=\"\" name=\"dvip\" $d19>Delete Vip</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk20 = $res['message'];
            if ($chk20 == 1) {
                $d20 = "checked";
            } else {
                $d20 = "";
            }
            echo"  <label><input type=\"checkbox\" value=\"\" name=\"msg\" $d20>Message</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk21 = $res['message_part'];
            if ($chk21 == 1) {
                $d21 = "checked";
            } else {
                $d21 = "";
            }
            echo" <label><input type=\"checkbox\" value=\"\" name=\"msgpart\" $d21>Message Participate</label>
											</div>
											<div class=\"checkbox col-md-5 col-md-offset-2\">";
            $chk22 = $res['message_noti'];
            if ($chk22 == 1) {
                $d22 = "checked";
            } else {
                $d22 = "";
            }
            echo" <label><input type=\"checkbox\" value=\"\" name=\"msgnoti\" $d22>Message Notification</label>
											</div>
											
									</div>
									 <div class=\"form-group\">";
//echo " <button type=\"submit\" class=\"btn btn-default col-md-5 col-md-offset-2\" name=\"submit\">Create</button>";

            echo"	</div>
								  
								</fieldset>
							</form>";
            ?>
        </div>	
        <div class="col-md-4">
            <?php
            $query_logs = "select * from admin_logs where username='$username' limit 10";


            $result_logs = mysql_query($query_logs);
            $content = "<h5><strong>Last 20 Login/Logout Activity</strong></h5><table class=\"table\">";
            $content.="<thead><tr><th>#</th><th>Action</th><th>Date</th></tr></thead><tbody>";
            while ($row = mysql_fetch_array($result_logs)) {
//                        print_r($rec2);exit;
                $count = 0;
//                        foreach ($rec2 as $row) {
                $action = $row['action'];
//                            echo '$action '.$action;exit;
                $date = date('d/m/Y H:i:s', strtotime($row['date_created']));
                $content.="<tr><td>" . ++$count . "</td><td>" . $action . "</td><td>" . $date . "</td></tr>";
//                        }
            }
            $content.="</tbody></table>";
            echo $content;
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