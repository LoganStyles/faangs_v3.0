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

            <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">Propose Client</h3>

            <div class="col-md-12">
            <?php
           
            if (isset($_GET['id'])) {
                $ids = $_GET['id'];
                $query2 = "update bookmodel set sta=1 where id='$ids'";
                $result2 = mysql_query($query2);
            } else {
                header('location:index.php');
            }
            $query1 = "select * from bookmodel where id=$ids";
            $result1 = mysql_query($query1);
            if (mysql_num_rows($result1) > 0) {
                $rec = mysql_fetch_array($result1);
                echo "<table class=\"table\">";


                echo "<tr><td>Full name</td><td>{$rec["fullname"]}</td></tr>";
                echo "<tr><td>Smail</td><td>{$rec["email"]}</td></tr>";
                echo "<tr><td>Phone number</td><td>{$rec["phonenumber"]}</td></tr>";
                echo "<tr><td>Countr</td><td>{$rec["country"]}</td></tr>";
                echo "<tr><td>State</td><td>{$rec["state"]}</td></tr>";
                echo "<tr><td>Sex</td><td>{$rec["sex"]}</td></tr>";
                echo "<tr><td>Reason</td><td>{$rec["reason"]}</td></tr>";
                echo "<tr><td>Model Username</td><td>{$rec["username"]}</td></tr>";






                echo " </table>";
                echo "<a href=\"vipnoti.php\">Back</a>";
            } else {
                
            }
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
