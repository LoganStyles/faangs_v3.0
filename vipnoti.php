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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">Booked Models</h3>

    <div class="col-md-12">
            <?php
            
            $query1 = "select * from bookmodel";
            $result1 = mysql_query($query1);
            if (mysql_num_rows($result1) > 0) {
                echo "<table class=\"table\">";
                echo "<thead>";

                echo "<th >Full Name</th>";
                echo "<th >Phone Number</th>";
                echo "<th >Email</th>";
                echo "<th >Date</th>";


                echo " </thead>";
                while ($rec = mysql_fetch_array($result1)) {
                    echo " <tr>";
                    echo "<td>{$rec["fullname"]}</td>";
                    echo "<td>{$rec["phonenumber"]}</td>";
                    echo "<td>{$rec["email"]}</td>";
                    echo "<td>{$rec["date"]}</td>";

                    $p = $rec["id"];
                    echo "<td><a href=\"vipnoti2.php?id=$p\">More</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
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
