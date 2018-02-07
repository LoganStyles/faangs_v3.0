<?php
require_once("incl/cons.php");
require_once("incl/function.php");
//require_once("incl/ses.php");
session_start();
cont();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    require_once("incl/title.php");
    ?>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/contest.css">
    <body>
        <!--header line-->
        <!--header line-->
        <?php
        include("incl/header2.php");
        ?>
        <!--------header2-->
        <div class="row ">
            <div class="col-md-12">
                <form method="post" action=""/>
                <div class="col-md-8 input-group" style="float:left;">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user">
                        </span>
                    </span>
                    <input type="text" placeholder="enter username of contestant" class="form-control" name="fullname"/>
                </div>	
                <div class="col-md-2" style="float:left;">
                    <input type="submit" class="form-control" name="submit1" value="search"/>
                </div>	
                </form>
            </div>	
        </div>		
        <div class="clearfix"> </div>
    </div>
    <?php
    if (isset($_POST["submit1"])) {
        $contestant = test_input($_POST["fullname"]);
        $query4 = "select * from picture where username='$contestant'";
        $result4 = mysql_query($query4);
        if (mysql_num_rows($result4) > 0) {
            header("location:contest2.php?id=$contestant");
        } {
            $nam = "no record found";
            echo "<div class=\"alert alert-danger\">";
            echo "	<strong>";
            echo "{$nam}";
            echo "	</strong>";
            echo "</div>";
            header('Refresh:2; url=contest.php?category=general');
        }
    }
    ?>
    <!--end of header line-->
    <div class="container-fluild">
        <div class="row ">
            <div class="col-md-8">
                <ul class="menu1">
                    <li><span class="glyphicon glyphicon-th-list"></span><a href="contest.php?category=general">General</a></li>
                    <li><span class="glyphicon glyphicon-shopping-cart"></span><a href="contest.php?category=business">Business</a></li>
                    <li><span class="glyphicon glyphicon-heart-empty"></span><a href="contest.php?category=dating">Dating</a></li>
                    <li><span class="glyphicon glyphicon-tree-deciduous"></span><a href="contest.php?category=social">Social</a></li>
                    <li><span class="glyphicon glyphicon-home"></span><a href="contest.php?category=religious">Religious</a></li>
                    <li><span class="glyphicon glyphicon-sunglasses"></span><a href="contest.php?category=model">Model</a></li>
                </ul>
            </div>	
            <div style="float:right;margin-right:7em;font-weight:bold;font-size:1.2em;">
                <?php
                include("incl/timer.php");
                ?>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-8 col-md-offset-3 tops" style="margin-bottom:10px;">
                <?php require_once("incl/top.php"); ?>
            </div>						
        </div>
        <div class="row" style="">
            <div class="col-md-2" style="">
                <?php require_once("incl/left.php"); ?>
            </div>
            <div class="col-md-2" style="">
                <div class="row left">
                    <div class="col-md-12" style="">
                        <h4 style="font-weight:bold;font-size:1.2em;">CATEGORY LISTING</H4>
                        <ul id="menu2">
                            <li><span class="glyphicon glyphicon-th-list"></span><a href="contest.php?category=general">General</a></li>
                            <li><span class="glyphicon glyphicon-shopping-cart"></span><a href="contest.php?category=business">Business</a></li>
                            <li><span class="glyphicon glyphicon-heart-empty"></span><a href="contest.php?category=dating">Dating</a></li>
                            <li><span class="glyphicon glyphicon-tree-deciduous"></span><a href="contest.php?category=social">Social</a></li>
                            <li><span class="glyphicon glyphicon-home"></span><a href="contest.php?category=religious">Religious</a></li>
                            <li><span class="glyphicon glyphicon-sunglasses"></span><a href="contest.php?category=model">Model</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row left" style="margin-top:3px;">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" method="post" action="filter.php"/>
                        <h5>age</h5>
                        <div class="form-group">
                            <div class="cl col-md-3"style="" ><input type="text" class="form-control"  name="agemin" placeholder="min"/></div>
                            <div class="das" style="">--</div>
                            <div class="cl col-md-3" style=""><input type="text" class="form-control" name="agemax"  placeholder="max"/></div>
                        </div>
                        <h5>Number of like</h5>
                        <div class="form-group">
                            <div class="cl col-md-3"style="" ><input type="text" class="form-control" name="likemin" placeholder="min"/></div>
                            <div class="das" style="">--</div>
                            <div class="cl col-md-3" style=""><input type="text" class="form-control" name="likemax" placeholder="max"/></div>
                        </div>
                        <h5>gender</h5>
                        <div class="form-group" style="margin-left:3px;">
                            <div class="radio-inline"><input type="radio" class="" name="gender" value="male"/>Male</div>
                            <div class="radio-inline"><input type="radio" class="" name="gender" value="female" checked/>Female</div>
                        </div>
                        <h5>location</h5>
                        <div class="form-group">
                            <div class="col-md-8"style="" ><input type="text" class="form-control" name="location" placeholder="search location"/></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class=" btn btn-default col-md-offset-3"  value="Submit"/>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <!--main body-->
                <?php
                /////////////////////////////////////pagination begin/////////////////////////////////////////////////////////////
                if (isset($_POST["submit"])) {
                    $agemin = test_input($_POST["agemin"]);
                    $agemax = test_input($_POST["agemax"]);
                    $likemin = test_input($_POST["likemin"]);
                    $likemax = test_input($_POST["likemax"]);
                    $location = test_input($_POST["location"]);
                    $gender = test_input($_POST["gender"]);
                    $min1 = strlen($agemin);
                    $max1 = strlen($agemax);
                    $likemin1 = strlen($likemin);
                    $likemax1 = strlen($likemax);
                    $gender1 = strlen($gender);
                    $location1 = strlen($location);

                    /**
                      echo "<p>{$agemin}</p>";
                      echo "<p>{$agemax}</p>";
                      echo "<p>{$likemin}</p>";
                      echo "<p>{$likemax}</p>";
                      echo "<p>{$gender}</p>";
                      echo "<p>{$location}</p>";
                     */
                    //echo "$likemin1";
                    //////////////////////////////////////////////////////select age
                    if (($gender1 > 1) && ($min1 < 1) && ($max1 < 1) && ($likemin1 < 1) && ($likemax1 < 1) && ($location1 < 1)) {
                        //echo $gender;
                        $query = "SELECT  total.tos,picture.title,picture.img,picture.category,picture.username, registration.age,registration.country,
                                registration.state,registration.fullname,registration.bio FROM picture left JOIN registration ON picture.username=registration.username 
                                left join total on picture.username=total.username
                                where picture.profile='YES'&& registration.gender='$gender' order by picture.date asc";
                        $result1 = mysql_query($query);
                    } else {
                        ////////////////////////////////////////////////////////////////////////////////////////
                        if (($min1 >= 1) && ($max1 >= 1)) {
                            $query = "SELECT  total.tos,picture.title,picture.img,picture.category,picture.username, registration.age,registration.country,
                                    registration.state,registration.fullname,registration.bio FROM picture left JOIN registration ON picture.username=registration.username 
                                    left join total on picture.username=total.username
                                    where picture.profile='YES'&& registration.age between '$agemin' and '$agemax' order by picture.date asc";
                            $result1 = mysql_query($query);
                            $result1 = mysql_query($query);
                            //if(mysql_num_rows($result1)>0){
                            //echo "yes record found";
                            //echo"<br>min age:$agemin</br>max:$agemax</br>loc:$location1";
                            //	}
                            //else{echo "no record";
                            //echo"<br>$agemin</br>$agemax</br>";
                            //}
                        }
                        /////////////////////////////////////////////////////select like
                        if (($likemin1 >= 1) && ($likemax1 >= 1)) {
                            $query = "SELECT  total.tos,picture.title,picture.img,picture.category,picture.username, registration.age,registration.country,
                                        registration.state,registration.fullname,registration.bio FROM picture left JOIN registration ON picture.username=registration.username 
                                        left join total on picture.username=total.username
                                        where picture.profile='YES'&& total.tos between '$likemin' and '$likemax' order by picture.date asc";
                            $result1 = mysql_query($query);
                        }
                        //////////////////////////////////////////////////////select gender
                        ////////////////////////////////////////////////////////select locatin
                        if ($location1 > 1) {
                            $query = "SELECT  total.tos,picture.title,picture.img,picture.category,picture.username, registration.age,registration.country,
                                    registration.state,registration.fullname,registration.bio FROM picture left JOIN registration ON picture.username=registration.username 
                                    left join total on picture.username=total.username
                                    where picture.profile='YES'&& registration.state='$location' order by picture.date asc";
                            $result1 = mysql_query($query);
                        }
                    }
                    if (mysql_num_rows($result1) > 0) {
                        while ($rec = mysql_fetch_array($result1)) {
                            echo "<div class=\"col-md-12 abouts\">";
                            echo "<div class=\"col-md-3\" id=\"pix\">";
                            $k = ($rec['username']);
                            echo "<a href=\"contest2.php?id=$k\"><img src=\"img/{$rec['img']}\"></a>";
                            echo "</div>";
                            echo "<div class=\"col-md-6\" id=\"\">";
                            echo "<div id=\"about-infos\">";
                            echo "<a href=\"contest2.php?id=$k\">	<h4>{$rec['fullname']}</h4></a>";
                            echo "<p>{$rec['bio']}</p>";
                            echo "</div>";
                            echo "<div id=\"about-list\">";
                            echo "<ul class=\"menu1\">
																						<li>Country:{$rec['country']}</li>
																						<li>State:{$rec['state']}</li>
																						<li>Age:{$rec['age']}</li>
																						<li>Category:{$rec['category']}</li>
																						</ul>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"col-md-3\">";
                            echo "<div id=\"about-infos\">";
                            echo "<a href=\"contest2.php?id=$k\">	<h4>Total Likes</h4></a>";
                            echo "<p style=\"font-size:5em;\">{$rec['tos']}</p>";
                            echo "</div>";
                            echo "<div id=\"\">";
                            echo "	";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"clearfix\"> </div>";
                            echo "</div>";
                        }
                    } else {

                        $nam = "no record found";
                        echo "<div class=\"alert alert-danger\">";
                        echo "	<strong>";
                        echo "{$nam}";
                        echo "	</strong>";
                        echo "</div>";
                        //header('Refresh:2; url=contest.php?category=general');
                    }
                }
                ?>

                <!---	
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////form filter
        /////////////////////////////////////////////////////
                                        //else{
                                                echo "<script>";
                                                //echo " window.location.href=\"index.php\"";
                                                echo "</script>";
                                        //}
                                        ?>-->
            </div>
        </div>
    </div>
    <!---FOOTER ADVERT-->
    <div class="row ">
        <div class="col-md-8 col-md-offset-3 tops" style="margin-bottom:10px;margin-top:20px;">
<?php require_once("incl/bottom.php"); ?>
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
<script type="text/javascript">
    function chk() {
        if (document.getElementById('model').checked)
        {
            document.getElementById('tes').style.display = 'block';
        } else
        {
            document.getElementById('tes').style.display = 'none';
        }
    }
    function chk2() {
        if (document.getElementById('model2').checked)
        {
            document.getElementById('tes2').style.display = 'block';
        } else
        {
            document.getElementById('tes2').style.display = 'none';
        }
    }
    function chk3() {
        if (document.getElementById('model3').checked)
        {
            document.getElementById('tes3').style.display = 'block';
        } else
        {
            document.getElementById('tes3').style.display = 'none';
        }
    }
    function chk4() {
        if (document.getElementById('model4').checked)
        {
            document.getElementById('tes4').style.display = 'block';
        } else
        {
            document.getElementById('tes4').style.display = 'none';
        }
    }
</script> 
</html>