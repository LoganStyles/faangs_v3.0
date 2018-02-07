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

    <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">LIST OF SUB ADMINs</h3>
    
    <div class="col-12">
            <?PHP
            $query1 = "select * from subadmin";
            $content="";

            $result1 = mysql_query($query1);
            if (mysql_num_rows($result1) > 0) {
                $content.= "<table class=\"table\">";
                $content.= "<thead>";


                $content.= "<th >Username Name</th>";
                $content.= "<th >MORE</th>";
                $content.= "<th >DELETE</th>";

                $content.= " </thead>";
                while ($rec = mysql_fetch_array($result1)) {
                    $content.= " <tr>";

                    $content.= "<td>{$rec["username"]}</td>";
                    $content.= "<td><a href=\"subadminprofile.php?id={$rec["username"]}&&id2=\">More Info</td>";

                    $content.= "<td><a href=\"delsubadmin.php?id={$rec["username"]}&&id2=1\">Delete</td>";

                     $content.= " </tr>";
                }

                 $content.= " </table>";
            } else {
                
            }
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
