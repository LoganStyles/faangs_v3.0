<?php
require_once("incl/participant.php");
?>

<div class="col-md-12 t" style="padding-top:100px;">

    <!----------------------------------------------------div body---------------------------------------------------->	
    <img id="output_image"/>
    <H3  style="text-align:center;padding-bottom:20px;">UPLOAD YOUR PHOTO FROM HERE(Max Size=1mb)</h3>
    <form class="form-horizontal" role="form" method="post" action="imageprocess.php" enctype="multipart/form-data"/>				
    <div class="form-group">
        <!--<label class="control-label col-md-2" for="title">Title:</label>-->
        <div class="col-md-5 col-md-offset-2">
            <input type="text" class="form-control" id="title"  name="title" placeholder="Enter title of photo" required>
        </div>
    </div>
   
    <div class="form-group">

        <div class="col-md-5 col-md-offset-2">


            <select class="form-control" id="category" name="category">
                <option>Select category</option>
                <option>Business</option>
                <option>Dating</option>
                <option>Social</option>
                <option>Religion</option>
                <option>Model</option>
            </select>
        </div>
    </div>


    <div class="form-group">
        <!--<label class="control-label col-md-2" for="file">File upload:</label>-->
        <div class="col-md-5 col-md-offset-2">
            <input type="file" class="btn-file" id="file"  name="file" onchange="">
        </div>
    </div>
    <div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <?php
                $username = $_SESSION['username'];
                $query1 = "select * from fund where username='$username' limit 1";
                $result1 = mysql_query($query1);
                $rec = mysql_fetch_array($result1);
                if ($rec['balance'] >= 2) {
                    echo" <button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Submit</button>";
                } else {
                    $nam = "You have insufficient credit";
                    echo "<div class=\"alert alert-danger\">";
                    echo "	<strong>";
                    echo "{$nam}";
                    echo "	</strong>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        </form>
        <!---------------------------------------------------------------body ends here!---------------------------------------->
    </div>
</div>
</div>

</div>
</div>
<!--FOOTER-->
<footer>
<?php
include("incl/footer.php");
?>
</footer>
</div>
</body>
</html>