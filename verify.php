<?php
require_once("incl/cons.php");
//require_once("incl/ses.php");
require_once("incl/function.php");
require_once ("incl/forumheader.php");
?>

	
<div class="row t1" style="margin-top: 100px;">
    <!-- left advert-->

    <div class="col-md-5" style="height:500px;text-align:center;"></div>
    


<?php
if (isset($_GET['user'])) {
    $k = test_input($_GET['user']);
    //echo $k;
    $query1 = "select * from registration where username='{$k}' and status=0 limit 1";

    $result1 = mysql_query($query1);
    if (mysql_num_rows($result1) > 0) {

        $rec = mysql_fetch_array($result1);
        if ($rec['username']) {

            $query2 = "update registration set status=2 where username='{$k}'";
            $result = mysql_query($query2);
            if (mysql_affected_rows() > 0) {

                $query = " INSERT into  fund(username,balance)values
																			('$k','100')";
                $k3 = mysql_query($query);

                if ($k3) {
                    $nam = "your account is verified login to continue";

                    echo "<div class=\"alert alert-success\">";
                    echo "	<strong>";

                    echo "{$nam}";
                    echo "	</strong>";
                    echo "</div>";
                    header('Refresh:3; url=login.php');
                }
            }
        } else {

            $nam = "try again";



            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";

            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:3; url=registration.php');
        }
    } else {
        $nam = "Your account has been activated already";



        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";

        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:3; url=login.php');
    }
}
//die();
?>
    </div>
<footer>
<?php
ob_end_flush();
include("incl/footer.php");
?>
</footer>
</body>
</html>