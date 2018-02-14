<?php
ob_start();
require_once("incl/cons.php");
require_once("incl/function.php");
require_once 'incl/forumheader.php';
?>

<!doctype html>
<html lang="en">
<script src="assets/jquery/jquery.min.js"></script>
        <!--------------------------------------------end of head---------------->
        <?php
        if (isset($_POST["submit1"])) {
            $contestant = test_input($_POST["fullname"]);

            $query4 = "select * from picture where username='$contestant'";
            $result4 = mysql_query($query4);
            if (mysql_num_rows($result4) > 0) {
//                header("location:contest2.php?id=$contestant");
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

        <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: 7%;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contest.php?category=general"><i class="fa fa-bars" >&nbsp;&nbsp;General</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contest.php?category=business"><i class="fa fa-briefcase" >&nbsp;&nbsp;Business</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contest.php?category=dating"><i class="fa fa-heart-o" >&nbsp;&nbsp;Dating</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contest.php?category=social"><i class="fa fa-camera" >&nbsp;&nbsp;Social</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contest.php?category=religious"><i class="fa fa-building" >&nbsp;&nbsp;Religious</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contest.php?category=model"><i class="fa fa-diamond" >&nbsp;&nbsp;Model</i></a>
                        </li>
                        
                    </ul>
                </div>
                <div style="font-weight:bold;font-size:1.2em;width: 40%;" class="pull-right" id="display_timer"></div>
            </nav>

            <div class="row">
                <!--COL 1::CHANGING ADVERTS-->
                <div class="col-md-2">
                    
                     <!------------------------------------------------------h------------------>
            <?php require_once("incl/left.php"); ?>

                </div>
                <div class="col-md-2"><!--COL 2::CATEGORIES-->
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                          CATEGORY LISTING
                        </a>
                        <a href="contest.php?category=general" class="list-group-item list-group-item-action"><i class="fa fa-bars" >&nbsp;&nbsp;General</i></a>
                        <a href="contest.php?category=business" class="list-group-item list-group-item-action"><i class="fa fa-briefcase" >&nbsp;&nbsp;Business</i></a>
                        <a href="contest.php?category=dating" class="list-group-item list-group-item-action"><i class="fa fa-heart-o" >&nbsp;&nbsp;Dating</i></a>
                        <a href="contest.php?category=social" class="list-group-item list-group-item-action"><i class="fa fa-camera" >&nbsp;&nbsp;Social</i></a>
                        <a href="contest.php?category=religious" class="list-group-item list-group-item-action"><i class="fa fa-building" >&nbsp;&nbsp;Religious</i></a>
                        <a href="contest.php?category=model" class="list-group-item list-group-item-action"><i class="fa fa-diamond" >&nbsp;&nbsp;Model</i></a>
                    </div>
                    
                    <div class="card border-secondary mb-3" style="margin-top: 1%;">
                         <form method="post" action="filter.php">
                            <div class="form-row">
                              <div class="form-group col-md-5">
                                <label for="agemin">Age</label>
                                <input type="number" class="form-control" id="agemin" name="agemin" placeholder="min">
                              </div>
                              <div class="form-group col-md-5">
                                <label for="agemax"></label>
                                <input type="text" class="form-control" id="agemax" name="agemax" placeholder="max">
                              </div>
                            </div>
                             <div class="form-row">
                                 <div class="form-group col-md-5">
                                  <label for="likemin">Number of likes</label>
                                  <input type="text" class="form-control" id="likemin" name="likemin" placeholder="min">
                                </div>
                                <div class="form-group col-md-5">                              
                                  <input type="text" class="form-control" id="likemax" name="likemax" placeholder="max">
                                </div>
                             </div>
                                
                            <div class="form-row">
                              <p>gender</p>
                                <div class="form-group" style="margin-left:3px;">
                                    <div class="radio-inline"><input type="radio" class="" name="gender" value="male"/>Male</div>
                                    <div class="radio-inline"><input type="radio" class="" name="gender" value="female" checked/>Female</div>
                                </div>
                            </div>
                            
                            <input type="submit" name="submit"  class=" btn btn-default col-md-offset-3"  value="Submit"/>
                          </form>
                    </div>
                    
                       
                </div>
                <div class="col-md-6"><!--COL 3::PROFILE INFO-->
                                        <!--main body-->
                   
                    <?php
//                    echo 'in here';exit;
/////////////////////////////////////pagination begin/////////////////////////////////////////////////////////////
                    if (isset($_GET["category"])) {

                        $cat = $_GET["category"];
                        $rowsperpage = 5;
                        if ($cat == "general") {
                            $query = "select * from picture where profile='YES'";
                            $result = mysql_query($query);
                            $total_records = mysql_num_rows($result);
                        } else {
                            $query = "select * from picture where profile='YES' and category='$cat'";
                            $result = mysql_query($query);
                            if (mysql_num_rows($result) > 0) {
                                $total_records = mysql_num_rows($result);
                            } else {
                                $total_records = 0;
                                $nam = "no record found under this category.see others below";
                                echo "<div class=\"alert alert-danger\">";
                                echo "	<strong>";
                                echo "{$nam}";
                                echo "	</strong>";
                                echo "</div>";
                                header('Refresh:3; url=contest.php?category=general');
                            }
                        }
                        $totalpages = ceil($total_records / $rowsperpage);
                        if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
                            $currentpage = (int) $_GET['currentpage'];
                        } else {
                            $currentpage = 1;
                        }
                        if ($currentpage > $totalpages) {
                            $currentpage = $totalpages;
                        }
                        if ($currentpage < 1) {
                            $currentpage = 1;
                        }
                        $offset = ($currentpage - 1) * $rowsperpage;

                        ////////////////////////////////////////pagination variable ends

                        $query = "SELECT  total.tos,picture.title,picture.img,picture.category,picture.username, registration.age,registration.country,
                                registration.state,registration.fullname,registration.bio FROM picture left JOIN registration ON picture.username=registration.username 
                                left join total on picture.username=total.username
                                where picture.profile='YES'&& picture.category='$cat' order by picture.date asc LIMIT $offset, $rowsperpage ";
                        $result1 = mysql_query($query);
                        if (mysql_num_rows($result1) <= 0) {

                            $query = "SELECT  total.tos,picture.title,picture.img,picture.category,picture.username, registration.age,registration.country,
                                    registration.state,registration.fullname,registration.bio FROM picture left JOIN registration ON picture.username=registration.username 
                                    left join total on picture.username=total.username
                                    where picture.profile='YES' order by picture.date asc LIMIT $offset, $rowsperpage ";
                            $result1 = mysql_query($query);
                        }

                        //Selecting the data from table but with limit
                        //$result1=shuffle($result1);
                        $content="";                        
                        
                        while ($rec = mysql_fetch_array($result1)) {
                            $k = ($rec['username']);
                            if (($rec['tos'] == null)or $rec['tos'] <= 0) {
                                $po = 0;
                            } else {
                                $po = $rec['tos'];
                            }

                            $content.="<div class=\"testimonials-item contest\"><div class=\"user row\"><div class=\"col-lg-4 col-md-5\">"
                                    . "<div class=\"user_image\">";
                            $content.="<a href=\"javascript:;\"><img src=\"img/{$rec['img']}\"></a></div></div>";
//                            $content.="<a href=\"contest2.php?id=$k\"><img src=\"img/{$rec['img']}\"></a></div></div>";
                            $content.="<div class=\"testimonials-caption col-lg-8 col-md-7\"> ";
                            $content.="<div class=\"user_name mbr-bold mbr-fonts-style align-left pt-3 display-7\">";
                            $content.="<a href=\"javascript:;\"><h5 class=\"card-title\" style=\"text-transform: uppercase\">{$rec['fullname']}</h5></a>";
//                            $content.="<a href=\"contest2.php?id=$k\"><h5 class=\"card-title\" style=\"text-transform: uppercase\">{$rec['fullname']}</h5></a>";
                            $content.="</div>";
                            $content.=" <div class=\"user_desk mbr-light mbr-fonts-style align-left pt-2 display-7\" style=\"margin-bottom:1%;\">";
                            $content.="{$rec['bio']}";
                            $content.="</div>";
                            $content.="<p style=\"padding: 0 1%;\"><span>COUNTRY:</span><strong><span style=\"padding: 0 1%;\">{$rec['country']}</span></strong></p>";
                            $content.="<p style=\"padding: 0 1%;\"><span>STATE:</span><strong><span style=\"padding: 0 1%;\">{$rec['state']}</span></strong></p>";
                            $content.="<p style=\"padding: 0 1%;\"><span>AGE:</span><strong><span style=\"padding: 0 1%;\">{$rec['age']}</span></strong></p>";
                            $content.="<p style=\"padding: 0 1%;\"><span>CATEGORY:</span><strong><span style=\"padding: 0 1%;\">{$rec['category']}</span></strong></p>";
                            $content.= "<p style=\"padding: 0 1%;\"><a href=\"\"><span>LIKES:</span><strong><span style=\"padding: 0 1%;\">{$po}</span></strong></p>";
//                            $content.= "<p style=\"padding: 0 1%;\"><a href=\"contest2.php?id=$k\"><span>LIKES:</span><strong><span style=\"padding: 0 1%;\">{$po}</span></strong></p>";
                            $content.= "</div></div></div>";
                            
                        }
                        echo $content;                  
                    
                    ?>
                                        
                     <?php
                        echo "<ul class=\"pagination\">";
                        $range = 2;
                        if ($currentpage > 1) {
                            // $prevpage = $currentpage/$range;
                            echo " <li><a href=\"contest.php?currentpage=1&&category=$cat\"><<</a></li> "; //last page

                            $prevpage = $currentpage - 1;
                            echo "<li> <a href=\"contest.php?currentpage=$prevpage&&category=$cat\"> < </a></li> "; //one step back
                        }
                        for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
                            if (($x > 0) && ($x <= $totalpages)) {
                                if ($x == $currentpage) {
                                    echo "<li > <a href=\"#\" style=\"background:#fec303;\">[<b>$x</b>]</a></li>";
                                } else {
                                    echo "<li> <a href=\"contest.php?currentpage=$x&&category=$cat\">$x</a></li> ";
                                }
                            }
                        }
                        if ($currentpage != $totalpages) {
                            $nextpage = $currentpage + 1;
                            echo " <li><a href=\"contest.php?currentpage=$nextpage&&category=$cat\">></a></li> "; //one step front
                            //$nextpage = $currentpage * 2;
                            //$t=$nextpage

                            echo " <li><a href=\"contest.php?currentpage=$totalpages&&category=$cat\">>></a></li> "; //final step
                        }

                        echo "</ul>";
                    }
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////form filter
                    /////////////////////////////////////////////////////
                    else {

                        echo "<script>";
                        echo " window.location.href=\"index.php\"";
                        echo "</script>";
                    }
                    ?>

                </div>
                <div class="col-md-2"><!--COL 4::CHANGING ADVERTS-->
                    <?php require_once("incl/right.php"); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12"><!--COL 4::CHANGING ADVERTS-->
                    <?php require_once("incl/bottom.php"); ?>
                </div>
            </div>


        </div> <!-- /container -->
        
        
        <?php
        
        $query1 = "select * from contest where status='active'limit 1";
        $result1 = mysql_query($query1);
        if (mysql_num_rows($result1) > 0) {
            $rec = mysql_fetch_array($result1);
            $state = $rec['state'];
            $contestname = $rec['contestname'];
            $startdate = $rec['startdate'];
            $enddate = $rec['enddate'];
            if ($state == 'on') {
                $state = 1;
            } else {
                $state = 2;
            }
        }

            
            ?>

<section once="" class="cid-qHwsxLqRwY" id="footer7-10">
            <div class="container">
                <div class="media-container-row align-center mbr-white">
                    <div class="row row-links">
                        <ul class="foot-menu">
                            <li class="foot-menu-item mbr-fonts-style display-7">
                                <a class="text-white mbr-bold" href="about.php" target="_blank">About us</a>
                            </li><li class="foot-menu-item mbr-fonts-style display-7">
                                <a class="text-white mbr-bold" href="#" target="_blank">C</a>ontestants
                            </li><li class="foot-menu-item mbr-fonts-style display-7">
                                <a class="text-white mbr-bold" href="contact.php" target="_blank">C</a>ontact Us
                            </li><li class="foot-menu-item mbr-fonts-style display-7">
                                <a class="text-white mbr-bold" href="part.php" target="_blank">H</a>ow It Works
                            </li><li class="foot-menu-item mbr-fonts-style display-7"></li></ul>
                    </div>
                    <div class="row social-row">
                        <div class="social-list align-right pb-2">
                            <div class="soc-item">
                                <a href="https://twitter.com/faangs" target="_blank">
                                    <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div><div class="soc-item">
                                <a href="https://www.facebook.com/faangslike" target="_blank">
                                    <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
<!--                            <div class="soc-item">
                                <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                    <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>-->
                        </div>
                    </div>
                    <div class="row row-copirayt">
                        <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                            © Copyright &nbsp;<?php echo date('Y');?>&nbsp; Faangs - All Rights Reserved
                        </p>
                        <p>
                            <a href="https://seal.beyondsecurity.com/vulnerability-scanner-verification/faangs.com">
                                <img src="https://seal.beyondsecurity.com/verification-images/faangs.com/vulnerability-scanner-2.gif" alt="Website Security Test" border="0" />
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>


        
        <script src="assets/tether/tether.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/dropdown/js/script.min.js"></script>
        <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
        <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
        <script src="assets/parallax/jarallax.min.js"></script>
        <script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
        <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
        <script src="assets/smoothscroll/smooth-scroll.js"></script>
        <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
        <script src="assets/countdown/jquery.countdown.min.js"></script>
        <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>
        <script src="assets/sociallikes/social-likes.js"></script>
        <script src="assets/theme/js/script.js"></script>
        <script src="assets/formoid/formoid.min.js"></script>
        <script src="assets/slidervideo/script.js"></script>

        <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
        <input name="animation" type="hidden">

        <!-- Bootstrap core JavaScript
        ================================================== -->
        
        <script type="text/javascript" src="js/countDown.js"></script>
        
        <script>
        var a = "<?php echo $enddate ?>";
        var b = "<?php echo $state ?>";
        var countDownDate = new Date(a).getTime();
        console.log('countdown '+countDownDate)
        var x = setInterval(function () {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if (b == 1) {
                document.getElementById("display_timer").innerHTML = " " + days + " Days : " + hours + " : Hrs "
                        + minutes + " : Mins " + seconds + " : Secs ";
            }
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("display_timer").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
    </body>
</html>
