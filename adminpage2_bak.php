<?php
ob_start();
require_once("incl/participant2.php");
?>
<?php
if (isset($_POST['submit'])) {
    $name = test_input($_POST['name']);

    $start = test_input($_POST['start']);
    $end = test_input($_POST['end']);
    $query1 = "select * from contest where status='active'";
    $k1 = mysql_query($query1);
    if (mysql_num_rows($k1) > 0) {
        $nam = "<H4>you can only have one active contest</H4>";

        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";

        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
    } else {
        $query2 = " INSERT into contest(contestname,startdate,enddate,status)values('$name','$start','$end','active')";

        $k = mysql_query($query2);

        if ($k) {
            
        }
    }
}
?>
<?php
if (isset($_POST['submit2'])) {
    $name = test_input($_POST['name']);

    $start = test_input($_POST['start']);
    $end = test_input($_POST['end']);
    $query1 = "update contest set contestname='$name',startdate='$start',enddate='$end' where status='active'";



    $result = mysql_query($query1);
    if (mysql_affected_rows() >= 1) {
        $nam = "<H4>the existing contest has been successfully updated</H4>";
        echo "<div class=\"alert alert-success\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=index.php');
    } else {

        $nam = "<H4>update fail</H4>";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        header('Refresh:1; url=index.php');
    }
}
?>

<div class="col-md-12 t">
    <form class="mbr-form" action="" method="post" data-form-title="Login Form">
        <div data-for="username">
            <div class="form-group">
                <input type="text" class="form-control px-3" name="username" data-form-field="Username" placeholder="Username" required="" id="name-header15-1j">
            </div>
        </div>
        <div data-for="password">
            <div class="form-group">
                <input type="password" class="form-control px-3" name="password" data-form-field="Password" placeholder="Password" required="" id="email-header15-1j">
            </div>
        </div>

        <span class="input-group-btn">
            <button href="" name="submit" type="submit" class="btn btn-secondary btn-form display-4">SUBMIT</button>                                
            <button href="" name="submit" type="submit" class="btn btn-secondary btn-form display-4">SUBMIT</button>                                
        </span>
    </form>
    
    <h3 style="margin-top:100px;TEXT-ALIGN:CENTER;">CREATE CONTEST</h3>
    <!----------------------------------------------------div body---------------------------------------------------->				
    <div class="row" style="margin-top:50px;">
        <div class="col-md-5 col-md-offset-4">
            <form method ="post" action=" " class="form-horizontal" role="form">
                <fieldset>
                    <div class="form-group">
                        <div class="col-md-7 input-group al">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" class="form-control" name="name" placeholder="Enter contest name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-7 input-group al">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-dashboard"></span>
                            </span>
                            <input type="text" class="form-control "  name="start" placeholder="Enter start date (y/m/d)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-7 input-group al">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-dashboard"></span>
                            </span>
                            <input type="text" class="form-control "  name="end" placeholder="Enter end date (y/m/d)">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default col-md-2 al" name="submit">Create</button>
                        <button type="submit" class="btn btn-default col-md-4 al" name="submit2">Update Contest</button>

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