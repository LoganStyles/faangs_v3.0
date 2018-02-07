<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_GET['id']) && isset($_GET['id2'])) {
    $stast = test_input($_GET['id']);
    $nam = test_input($_GET['id2']);
    $transid = test_input($_GET['id3']);
    if ($stast == 1) {
        $query2 = "update request set status='confirm' where username='$nam' and id='$transid'";
        $result = mysql_query($query2);
        if (mysql_affected_rows() > 0) {
            $nam = " This account has been successfully confirmed";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:2; url=adminpage.php');
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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">WITHDRAWAL REQUEST</h3>

    <?php
    $query1 = "SELECT  registration.fullname,registration.phonenumber,registration.bankname,registration.accountname,
        registration.accountnumber,request.amount,request.username,request.id 
        FROM request left JOIN registration ON request.username=registration.username 
        where request.status='pending' order by request.date";
    
    $result1 = mysql_query($query1);
    $content="";
    if (mysql_num_rows($result1) > 0) {
        $content.="<table class=\"table\">";
        $content.="<thead><tr><th>#</th><th>Full Name</th>";
        $content.="<th>Phone Number</th><th>Amount</th><th>Bank Name</th><th>Account Name</th><th>Account Number</th><th>Full Name</th><th>Status</th>";
        $content.="</thead><tbody>";
        while($rec=mysql_fetch_array($result1)){
            $content.="<tr>";
            $content.="<td>{$rec["fullname"]}</td>";
            $content.="<td>{$rec["phonenumber"]}</td>";
            $content.="<td>{$rec["amount"]}</td>";
            $content.="<td>{$rec["bankname"]}</td>";
            $content.="<td>{$rec["accountname"]}</td>";
            $content.="<td>{$rec["accountnumber"]}</td>";
            $content.="<td><a href=\"approve.php?id=1&&id2={$rec["username"]}&&id3={$rec["id"]}\" class=\"btn btn-default\">Approve</a></td>";
            $content.="</tr>";
        }
        $content.="</tbody></table>";
        
    }else{
        $nam="no  pending request";
        $content.= "<div class=\"alert alert-danger\">";
        $content.= "<strong>";
        $content.= "{$nam}";
        $content.= "</strong>";
        $content.= "</div>";
    }
    echo $content;
    ?>
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
        
    </div>
  </div>
</section>

<?php
include_once 'incl/footer_admin.php';
ob_end_flush();
?>
