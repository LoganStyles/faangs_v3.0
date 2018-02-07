<?php
ob_start();
require_once("incl/nav_admin.php");
$msg="";

if (isset($_POST['submit'])) {
    $post = test_input($_POST['post']);
    $query1 = "select * from registration where username='$post'";
    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {
        $rec = mysql_fetch_array($result1);
        $user = $rec['username'];
        header("location:mana.php?id=$user");
    } else {
        $nam = "user not found";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:2; url=adminpage.php');
    }
}
?>

<section id="page-keeper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><?php echo $msg; ?></h4>
            </div>
            <div class="col-md-10 t main_body">

                <h3 style="margin-top:5%;TEXT-ALIGN:CENTER;">ACTIVE CONTESTANT</h3>
                
                <div class="row" style="margin-top:10%;">

        <div class="col-md-12">
            <form class="navbar-form" role="search" method="post" action="">
                <div class="input-group col-md-12 col-xs-12">
                    <input type="text" class="form-control" placeholder="enter username" name="post">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="submit"><i class="fa fa-search">Search</i></button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-md-12" style="overflow-y:scroll">
    
    <?php
    $query1="SELECT  total.tos,fund.balance,registration.fullname,registration.model,registration.username "
            . "FROM registration left JOIN fund ON fund.username=registration.username "
            . "left join total on fund.username=total.username order by total.tos";
    
    $result1 = mysql_query($query1);
    $content="";
            if (mysql_num_rows($result1) > 0) {
                $content.="<table class=\"table\">";
        $content.="<thead><tr><th>Full Name</th>";
        $content.="<th>User Name</th><th>Available fund</th><th>Total like</th>";
        $content.="</thead><tbody>";
        while($rec=mysql_fetch_array($result1)){
            $rec_bal=$rec["balance"];
            $curr_bal=(($rec_bal) <=0?(0):(($rec_bal)));
            $content.="<tr>";
            $content.="<td>{$rec["fullname"]}</td>";
            $content.="<td>{$rec["username"]}</td>";
            $content.="<td>{$curr_bal}</td>";
            $content.="<td>{$rec["tos"]}</td>";
            $p=$rec["model"];
            $content.="<td><a href=\"mana.php?id={$rec["username"]}&&id2=$p\">MANAGE</a></td>";
            $content.="</tr>";
        }
        $content.="</tbody></table>";
            }
            echo $content;
            ?>
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
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
