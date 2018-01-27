<?php
ob_start();
$page="about";
require_once 'incl/header.php';
?>

<section class="features16 cid-qHwvdsVcMP" id="features16-15">
    
    <div class="container align-center">
        <h2 class="pb-3 mbr-fonts-style mbr-section-title display-2">THE FACE OF ANGELS #FAANGS</h2>
        <h3 class="pb-5 mbr-section-subtitle mbr-fonts-style mbr-light display-7">Face of Angels is an empowerment scheme,a platform designed to empower all upcoming/aspiring models with uniqueness.&nbsp;
<div>Face of Angels is one of its kind with emphases on promoting photography, beauty, and fitness through the means of&nbsp;
<span style="font-size: 1.5rem;">cash prize reward for the best voted model..</span></div></h3>
        <div class="row media-row">
            
        <div class="team-item col-lg-3 col-md-6">
                <div class="item-image">
                    <img src="assets/images/3-640x426.jpg" alt="" title="">
                </div>
                <div class="item-caption py-3">
                    <div class="item-name px-2">
                        <p class="mbr-fonts-style display-7"><strong>
                           BUSINESS PHOTO CONTEST
                        </strong></p>
                    </div>
                    <div class="item-role px-2">
                        <p>Join the Face of Angels Business Photo Contest and get the chance to win <strong>$5000</strong> Cash Prize</p>
                    </div>
                    <div class="item-social pt-2">
                        <?php
                            if (!isset($_SESSION['username'])) { ?>
                            <a class="btn btn-warning" href="registration.php" role="button">JOIN CONTEST</a>    
                           <?php }?>
                    </div>
                </div>
            </div>
            <div class="team-item col-lg-3 col-md-6">
                <div class="item-image">
                    <img src="assets/images/4-640x426.jpg" alt="" title="">
                </div>
                <div class="item-caption py-3">
                    <div class="item-name px-2">
                        <p class="mbr-fonts-style display-7"><strong>
                           DATING PHOTO CONTEST
                        </strong></p>
                    </div>
                    <div class="item-role px-2">
                        <p>Join the Face of Angels Dating Photo Contest and get the chance to win <strong>$5000</strong> Cash Prize.</p>
                    </div>
                    <div class="item-social pt-2">
                        <?php
                            if (!isset($_SESSION['username'])) { ?>
                            <a class="btn btn-warning" href="registration.php" role="button">JOIN CONTEST</a>    
                           <?php }?>
                    </div>
                </div>
            </div><div class="team-item col-lg-3 col-md-6">
                <div class="item-image">
                    <img src="assets/images/5-640x426.jpg" alt="" title="">
                </div>
                <div class="item-caption py-3">
                    <div class="item-name px-2">
                        <p class="mbr-fonts-style display-7"><strong>
                           SOCIAL PHOTO CONTEST
                        </strong></p>
                    </div>
                    <div class="item-role px-2">
                        <p>Join the Face of Angels Social Photo Contest and get the chance to win <strong>$5000</strong> Cash Prize</p>
                    </div>
                    <div class="item-social pt-2">
                        <?php
                            if (!isset($_SESSION['username'])) { ?>
                            <a class="btn btn-warning" href="registration.php" role="button">JOIN CONTEST</a>    
                           <?php }?>
                    </div>
                </div>
            </div><div class="team-item col-lg-3 col-md-6">
                <div class="item-image">
                    <img src="assets/images/6-640x426.jpg" alt="" title="">
                </div>
                <div class="item-caption py-3">
                    <div class="item-name px-2">
                        <p class="mbr-fonts-style display-7"><strong>
                           RELIGIOUS PHOTO CONTEST
                        </strong></p>
                    </div>
                    <div class="item-role px-2">
                        <p>Join the Face of Angels Religious Photo Contest and get the chance to win <strong>$5000</strong> Cash Prize</p>
                    </div>
                    <div class="item-social pt-2">
                        <?php
                            if (!isset($_SESSION['username'])) { ?>
                            <a class="btn btn-warning" href="registration.php" role="button">JOIN CONTEST</a>    
                           <?php }?>
                    </div>
                </div>
            </div></div>    
    </div>
</section>

<section class="mbr-section content4 cid-qHwANPWiaO" id="content4-16">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">
                    Our Vision</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">To be the source of motivation to all who aspire high in the world of Fashion,
 Beauty, and Photography.By placing all in the hall of fame</h3>
                
            </div>
        </div>
    </div>
</section>


<?php
include_once 'incl/footer.php';
ob_end_flush();
?>