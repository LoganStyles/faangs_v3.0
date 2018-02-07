<?php
ob_start();
$page="index";
require_once("incl/cons.php");
require_once("incl/function.php");
require_once("incl/mail2.php");
require_once 'incl/header.php';
?>

    <section class="header3 cid-qHw45zV91Y mbr-fullscreen mbr-parallax-background" id="header3-7">
        <div class="container">
            <div class="media-container-row">
                <div class="mbr-figure" style="width: 140%;">                        
                    <section class="carousel slide cid-qHwbCIWtAA" data-interval="false" id="slider2-s">
                        <div class="container content-slider">
                            <div class="content-slider-wrap">
                                <div>
                                    <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="4000">

                                        <div class="carousel-inner" role="listbox">
                                            <?php
                                            $slides=$slide_active="";
                                            $slide_count=0;
                                                $query4 = "select * from vip  order by rand()";
                                                $res_slides = mysql_query($query4);
                                                if (mysql_num_rows($res_slides) > 0) {
                                                    while ($res41 = mysql_fetch_array($res_slides)) {
                                                        if($slide_count==1){$slide_active="active";}

                                                        $slide_image="vip/".$res41['image'];

                                                        $slides.="<div class=\"carousel-item slider-fullscreen-image $slide_active\" data-bg-video-slide=\"false\" style=\"background-image: url($slide_image);\">";
                                                        $slides.="<a href=\"chat2.php?user={$res41['username']}\">";
                                                        $slides.="<div class=\"container container-slide\">";
                                                        $slides.="<div class=\"image_wrapper\">";
                                                        $slides.="<img src=\"$slide_image\">";
                                                        $slides.="<div class=\"carousel-caption justify-content-center\">";
                                                        
                                                        $slides.="<div class=\"col-12 align-center\">";
                                                        $slides.="<p class=\"lead mbr-text mbr-fonts-style display-7\"></p>";
                                                        $slides.="</div></div></div><a class=\"btn btn-md btn-primary\" style=\"font-weight:600;color:#000;\" href=\"modelg.php\">BOOK MODELS</a></div>";
                                                        $slides.="</a></div>";

                                                        $slide_count++;$slide_active="";
                                                    }
                                                    echo $slides;
                                                }
                                            ?>

                                        </div>
                                        <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider2-s">
                                            <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider2-s">
                                            <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </section>
                </div>

                <div class="media-content" style="padding-top:10% ">
                    <h3 style="font-weight: 600;font-size: 3rem" class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">Share Your Photos Online&nbsp;</h3>
                    <h3 style="font-weight: 600;font-size: 2rem" class="mbr-section-subtitle align-left mbr-white mbr-light pb-3 mbr-fonts-style display-2">&amp; Become<br> The Face of Angels</h3>
                    <div class="mbr-section-text mbr-white pb-3 ">
                        <p class="mbr-text mbr-fonts-style display-5">Become a<strong>
                                 CONTESTANT </strong>now and win<br> <strong>$5000 </strong>CASH PRIZE&nbsp;for the highest vote.</p>
                    </div>
                    <div class="mbr-section-btn"><a class="btn btn-md btn-primary display-4" href="login.php">Join Now</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php
        $query1="select * from contest where status='active'limit 1";
        $result1=mysql_query($query1);
        if(mysql_num_rows($result1)>0){
                $rec=mysql_fetch_array($result1);
                $state=$rec['state'];
                $contestname=$rec['contestname'];
                $startdate=$rec['startdate'];
                $enddate=date('Y/m/d',strtotime($rec['enddate']));
        }
     ?>

<section class="countdown1 cid-qHzLbPqjig" id="countdown1-1c">
    <div class="container ">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
            Contest Countdown
        </h2>

    </div>
    <div class="container countdown-cont align-center">
        <div class="daysCountdown" title="Days"></div>
        <div class="hoursCountdown" title="Hours"></div> 
        <div class="minutesCountdown" title="Minutes"></div> 
        <div class="secondsCountdown" title="Seconds"></div>
        <div class="countdown pt-5 mt-2" data-due-date="<?php echo $enddate; ?>"> 
        </div>
    </div>
</section>
       
        
<?php
include_once 'incl/footer.php';
ob_end_flush();
?>