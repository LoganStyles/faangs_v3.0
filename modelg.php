<?php
ob_start();
$page="modelg";
require_once("/incl/cons.php");
require_once("incl/function.php");
require_once("incl/mail2.php");
require_once 'incl/header.php';
?>

<section class="features3 cid-qHFSUWt3JP" id="features3-1i">
    <div class="container">
        <div class="media-container-row">
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="assets/images/01.jpg" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            No Coding
                        </h4>
                        
                    </div>
                    <div class="mbr-section-btn text-center">
                        <a href="https://mobirise.com" class="btn btn-primary display-4">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once 'incl/footer.php';
ob_end_flush();
?>