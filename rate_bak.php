<?php
ob_start();
require_once("incl/participant2.php");
?>
<?PHP
if (isset($_POST['submit'])) {
    $exc = test_input($_POST['exc']);


    $query1 = "select * from exchange limit 1";
    $k1 = mysql_query($query1);
    if (mysql_num_rows($k1) > 0) {


        $query2 = "update exchange set rate='$exc'";
        $result = mysql_query($query2);
        if (mysql_affected_rows() > 0) {
            $nam = "the current dollar rate has been  successfully updated";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:3; url=adminpage.php');
        }
    } else {
        $query2 = " INSERT into exchange(rate)values('$exc')";

        $k = mysql_query($query2);

        if ($k) {
            $nam = "Exchange rate have been successfully set";
            echo "<div class=\"alert alert-success\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:3; url=adminpage.php');
        }
    }
}
?>
<div class="col-md-12 t">
    <h3 style="margin-top:100px;TEXT-ALIGN:CENTER;">ENTER EXCHANGE RATE</h3>
    <!----------------------------------------------------div body---------------------------------------------------->				
    <div class="row" style="margin-top:50px;">

        <div class="col-md-12" style="text-align:center;margin-bottom:2em;font-weight:bold;">
            current dollar rate:<?php
$query1 = "select * from exchange";
$result1 = mysql_query($query1);
if (mysql_num_rows($result1) > 0) {
    $rec = mysql_fetch_array($result1);
    echo $rec['rate'];
} else {

    echo "0";
}
?>
        </div>
        <div class="col-md-5 col-md-offset-4">
            <form method ="post" action=" " class="form-horizontal" role="form">
                <fieldset>
                    <div class="form-group">
                        <div class="col-md-7 input-group al">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" class="form-control" name="exc" placeholder="Enter value of dollar">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default col-md-2 al" name="submit">Submit</button>

                    </div>

                </fieldset>
            </form>
        </div>					
    </div>
    <!---------------------------------------------------------------body ends here!---------------------------------------->
</div>
</div>
</div>

</div>
</div>
<!--FOOTER-->
<footer>
<?php
ob_end_flush();
include("incl/footer.php");
?>
</footer>
</div>
</body>
</html>