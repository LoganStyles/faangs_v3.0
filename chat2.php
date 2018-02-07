<?php
ob_start();
$page="chat2";

require_once("incl/cons.php");
require_once("incl/function.php");
require_once("incl/ses.php");
require_once("incl/forumheader.php");

if(isset($_GET['user'])){
    $user=test_input($_GET['user']);
    $search_result=$user;
}
 $gen=$_SESSION['sex'];
?>

<section class="post_section" style="margin-top: 3%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    
                    <?php
                    $description="";
                        $query1 = "select * from registration where username='$search_result'";
                        $result1 = mysql_query($query1);
                        $content="";
                        if ($rec = mysql_fetch_array($result1)) {
                            $nu = $rec['phs'];
                            $description=$rec['bio'];
                            
                            $content.="<div class=\"testimonials-item contest\" style=\"width: 100%\"><div class=\"user row\"><div class=\"col-lg-4 col-md-5\">"
                                    . "<div class=\"user_image\">";
                            $content.="<img src=\"$pic\"></div></div>";
                            $content.="<div class=\"testimonials-caption col-lg-8 col-md-7\"> ";
                            $content.="<div class=\"user_name mbr-bold mbr-fonts-style align-left pt-3 display-7\">";
                            $content.="<h5 class=\"card-title\" style=\"text-transform: uppercase\">Basic information</h5>";
                            $content.="</div>";
//                            
                            $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">FULL NAME:</span><strong><span style=\"padding: 0 1% 1% 3%; width: 70%;\">{$rec['fullname']}</span></strong></p>";
                            $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">EMAIL :</span><strong><span style=\"padding: 0 1%; width: 70%;\">{$rec['email']}</span></strong></p>";
                            if (empty($nu)) {
                                $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">PHONE NUMBER:</span><strong><span style=\"padding: 0 1%; width: 70%;\">{$rec['phonenumber']}</span></strong></p>";
                            }
                            
                            $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">COUNTRY:</span><strong><span style=\"padding: 0 1%; width: 70%;\">{$rec['country']}</span></strong></p>";
                            $content.="<p style=\"padding: 0 1%;\"><span style=\"width: 30%;\">STATE:</span><strong><span style=\"padding: 0 1%; width: 70%;\">{$rec['state']}</span></strong></p>";
                            if ($sessionvariable == $rec['username']) {
                                $content.="<p style=\"padding: 0 1%;\"><a href=\"edit.php\"><strong><span style=\"padding: 0 1%; width: 70%;\">Edit Profile</span></strong></a></p>";
                            }
                            $content.= "</div></div></div>";
                            
                            echo $content;
                        }
                    ?>
                    
                </div>
                
                <div class="row">
                    
                    <div class="card p-3 col-12 col-md-6 col-lg-3" style="background-color: #fff;">
                        <div class="card-wrapper">
                           
                            <div class="card-box">
                                <h4 class="card-title mbr-fonts-style display-7">
                                    Description
                                </h4>
                                <div><?php echo $description;?></div>

                            </div>
                            
                        </div>
                    </div>
                    
                    
                </div>
                
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

   
<?php
include_once 'incl/footer.php';
ob_end_flush();
?>