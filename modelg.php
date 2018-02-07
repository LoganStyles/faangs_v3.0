<?php
ob_start();
require_once("incl/cons.php");
require_once("incl/function.php");
$page = "models";
require_once 'incl/header.php';
session_start();
?>

<div class="row">
    <div class="col-md-9">
        <section class="features16 cid-qHwvdsVcMP" id="features16-15">

            <div class="container align-center">
                <h2 class="pb-3 mbr-fonts-style mbr-section-title display-2">SELECT YOUR CHOICE MODEL</h2>
                <div class="row media-row">
                    <?php
                    if (isset($_GET['user']) and $_GET['sta']) {
                        if ($_GET['sta'] == 1) {
                            $nam = test_input($_GET['user']);
                            $nam = strtolower($nam);
                            
                            if (!in_array($nam, $_SESSION['model'])) {
                                $_SESSION['model'][] = $nam;
                            }
                        } else if ($_GET['sta'] == 2) {
                            $nam = test_input($_GET['user']);
                            $nam = strtolower($nam);
                            foreach ($_SESSION['model'] as $k => $v) {

                                if ($v == $nam) {
                                    unset($_SESSION['model'][$k]);
                                }
                            }
                        } else {
                            header('location:index.php');
                        }
                    }
//                    print_r($_SESSION['model']);
                    $query = "select * from vip";
                    $result = mysql_query($query);
                    $content = "";

                    while ($row = mysql_fetch_array($result)) {
                        $content.="<div class=\"team-item col-lg-3 col-md-6\">";
                        $content.="<div class=\"item-image\">";
                        $content.="<img src=\"vip/{$row['image']}\" alt=\"\" title=\"\">";
                        $content.="</div><div class=\"item-caption py-3\">";
                        $content.="<div class=\"item-social pt-2\">";
                        if (isset($_GET['sta']) and $_GET['sta'] == 1 or $_GET['sta'] == 2) {
                            $nam = test_input($_GET['user']);
                            $nam = strtolower($nam);
                            $user = $row['username'];
                            $user = strtolower($user);
                            if (in_array($user, $_SESSION['model'])) {
                                $content.="<a class=\"btn btn-warning add\" href=\"modelg.php?user={$row['username']}&&sta=2\" role=\"button\">REMOVE MODEL</a>";
                            } else {
                                $content.="<a class=\"btn btn-warning add\" href=\"modelg.php?user={$row['username']}&&sta=1\" role=\"button\">ADD MODEL</a>";
                            }
                        } else {
                            $content.="<a class=\"btn btn-warning add\" href=\"modelg.php?user={$row['username']}&&sta=1\" role=\"button\">ADD MODEL</a>";
                        }

                        $content.="</div></div></div>";
                    }
                    echo $content;
                    ?>


                </div>    
            </div>
        </section>

        <section class="mbr-section content4 cid-qHwANPWiaO" id="content4-16">
            <div class="container">
                <div class="media-container-row">
                    <div class="title col-12 col-md-8">
                        <h2 class="align-center pb-3 mbr-fonts-style display-2">
                            <a class="btn btn-primary" href="<?php echo "bookmodel.php?user2=user2"; ?>">Submit Your Request</a></h2>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="col-md-3" style="margin-top: 5%;">
        
        <section class="features16 cid-qHwvdsVcMP" id="features16-15">

            <div class="container align-center">
                <div>
                    <span style="font-size: 1rem;font-weight: 600;">SELECTED MODELS (<?php echo count($_SESSION['model']);?>)</span></div>
                <div class="row media-row">
                    <?php
                    $selected_models = implode("','", $_SESSION['model']);
                    
                    $query = "select * from vip where username in ('".$selected_models."')";
                    $cart_content="";
                    $result = mysql_query($query);
                    while ($selected_row = mysql_fetch_array($result)) {
                        $cart_content.="<div class=\"team-item col-12\">";
                        $cart_content.="<div class=\"item-image\">";
                        $cart_content.="<img src=\"vip/{$selected_row['image']}\" alt=\"\" title=\"\">";
                        $cart_content.="</div></div>";
                    }
                    echo $cart_content;
                    
                    ?>
                                            
                </div>    
            </div>
        </section>
    </div>
</div>



<?php
include_once 'incl/footer.php';
ob_end_flush();
?>