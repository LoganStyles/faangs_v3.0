<?php ob_start();
require_once("incl/nav_admin.php");
$msg=""; ?>



<section id="page-keeper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4><?php echo $msg;?></h4>
      </div>
<div class="col-md-10 t main_body">

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">LIST OF VIP(s)</h3>
    
    <div class="col-md-12">
            <?php
            $query1 = "select * from vip";

            $result1 = mysql_query($query1);
            if (mysql_num_rows($result1) > 0) {
                echo "<table class=\"table\">";
                echo "<thead>";


                echo "		<th >Image</th>";
                echo "		<th >Username</th>";
                echo "		<th >DELETE</th>";

                echo " </thead>";
                while ($rec = mysql_fetch_array($result1)) {
                    echo " <tr>";
                    if ($rec['image'] != null) {
                        echo "		<td><img src=\"vip/{$rec['image']}\" width=\"150\" height=\"150\"/> </td>";
                    } else {
                        echo "		<td><img src=\"vip/female.jpg\" width=\"150\" height=\"150\"/> </td>";
                    }
                    echo "		<td>{$rec["username"]}</td>";

                    echo "		<td><a href=\"delsubadmin.php?id24={$rec["username"]}&&id3=3\">Delete</td>";





                    echo " </tr>";
                }

                echo " </table>";
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