<?php
ob_start();
require_once("incl/cons.php");
require_once("incl/function.php");
$page = "bookmodel";
require_once 'incl/header.php';
session_start();
?>

<section class="features16 cid-qHwvdsVcMP" id="features16-15">

    <div class="container align-center">
        <h4 class="pb-3 mbr-fonts-style mbr-section-title display-2">BOOK MODELS</h4>

        <div class="row media-row">
            <div class="col-md-7 col-md-offset-4">
                <?php
                //defaults
                $errors=array();
                $fullname=$email=$company_name=$website=$country=$state=$phonenumber=$budget=$purpose=$duration="";
                $gender="FEMALE";
                //check for empty values
                function checkValidity($fieldval,$err_msg){
                    if(empty($fieldval)){
                      global  $errors;
                      $errors[]=$err_msg;
                    }
                }
                    if (isset($_POST['submit'])) {
                        $errors=array();

                        $username = implode(',', $_SESSION['model']);
                        $username = strtolower($username);
                        
                        $fullname = strtoupper(test_input($_POST['fullname']));
                        checkValidity($fullname,"Invalid Full name");
                        
                        $email = test_input($_POST['email']);
                        checkValidity($fullname,"Invalid Email value");
                        
                        $phonenumber = test_input($_POST['phonenumber']);
                        checkValidity($phonenumber,"Invalid Phone number");
                        $dat = date("y-m-d");
                        
                        $company_name = test_input($_POST['company_name']);
                        checkValidity($company_name,"Invalid Company name");
                        
                        $budget = test_input($_POST['budget']);
                        checkValidity($budget,"Invalid Budget value");                        
                        
                        $website = test_input($_POST['website']);
                        checkValidity($website,"Invalid Website value"); 
                        
                        $purpose = test_input($_POST['purpose']);
                        if($purpose==""){
                            $errors[]="Invalid Purpose value";
                        }
                        
                        $duration = test_input($_POST['duration']);
                        if($duration==""){
                            $errors[]="Invalid Duration value";
                        }
                        
                        $country = test_input($_POST['country']);
                        if($country==""){
                            $errors[]="Invalid Country value";
                        }
                        
                        $state = test_input($_POST['state']);
                        if($state==""){
                            $errors[]="Invalid State value";
                        }

                        $gender = test_input($_POST['gender']);
                        $gender = strtoupper($gender);
                        
                        if (count($errors) == 0) {
                        $query = "INSERT into  bookmodel(fullname,username,email,phonenumber,country,state,sex,sta,date,
                            company_name,budget,website,purpose,duration)
					VALUES('$fullname','$username','$email','$phonenumber','$country','$state',"
                                . "'$gender',0,'$dat','$company_name','$budget','$website','$purpose','$duration')";
                        $k = mysql_query($query);

                        if ($k) {
                            $nam = "<h4>Thanks $fullname Your Request Has Been Received </h4>";
                            echo "<div class=\"alert alert-success\">";
                            echo "	<strong>";
                            echo "{$nam}";
                            echo "	</strong>";
                            echo "</div>";
                            unset($_SESSION['model']);
                            unset($errors);
                            $fullname=$email=$company_name=$website=$country=$state=$phonenumber=$budget=$purpose=$duration="";
                            $gender="FEMALE";
                        } else {
                            $nam = "<p>Your Form submission was not successful.Try again</p>";
                            echo "<div class=\"alert alert-danger\">";
                            echo "	<strong>";
                            echo "{$nam}";
                            echo "	</strong>";
                            echo "</div>";
                            //echo mysql_error();
                        }
                    } else {
                        $nam = "<h4>Invalid Inputs Exist...</h4>";
                        echo "<div class=\"alert alert-danger\">";
                        //echo "	<strong>";
                        echo $nam;
                        foreach ($errors as $item) {
                            echo "<p style=\"color:#f00;\">**{$item}</p>";
                        }
                        //echo "	</strong>";
                        echo "</div>";
                    }
                }
                        ?>
                
                <form class="form-horizontal" role="form" method="post" action="" id="form1">
                        <fieldset>
                            <legend style="text-transform: capitalize;">Please enter your contact information</legend>
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <!--<label for="fullname"><span style="color: #f00;">*</span>Full name</label>-->
                                    <input type="text" value="<?php echo $fullname;?>" class="form-control" name="fullname" placeholder="Fullname" required>
                                </div>
                               
                                <div class="form-group col-md-6">
                                    <!--<label for="company_name"><span style="color: #f00;">*</span>Company name</label>-->
                                    <input type="text" value="<?php echo $company_name;?>" class="form-control" id="" name="company_name" placeholder="Company name" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <!--<label for="email"><span style="color: #f00;">*</span>Email</label>-->
                                    <input type="email" value="<?php echo $email;?>" class="form-control" name="email" placeholder="Email address" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <!--<label for="website"><span style="color: #f00;">*</span>Website</label>-->
                                    <input type="text" value="<?php echo $website;?>" class="form-control" name="website" placeholder="Website address" >
                                </div>
                                
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <select class="form-control" id="country" name="country" onchange="pop(this.value)">
                                        <option selected value="">SELECT YOUR COUNTRY</option>
                                        <?php
                                        $rcount = mysql_query("select * from countries");
                                        
                                        while ($r = mysql_fetch_array($rcount)) {
                                            if($r['name']==$country){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            echo "<option value=\"{$r['name']}\" $selected>{$r['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <select class="form-control" id="state" name="state" >
                                        <option value="" selected>SELECT YOUR STATE</option>                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <input type="text" value="<?php echo $phonenumber;?>" class="form-control" id="" name="phonenumber" placeholder="Phone number" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <input type="number" value="<?php echo $budget;?>" class="form-control" name="budget" placeholder="Your budget" required>
                                </div>
                                
                            </div>
                            
                            <div class="form-row">
                                <div class="">
                                    <label for="gender">YOUR GENDER</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <?php
                                        if($gender=="MALE"){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                        ?>
                                        <input type="radio" id="gender" name="gender" <?php echo $selected;?> >
                                        <label class="custom-control-label" for="gender">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <?php
                                        if($gender=="FEMALE"){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                        ?>
                                        <input type="radio" id="gender2" name="gender" <?php echo $selected;?>>
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>

                                </div>
                            </div>
                                     
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="purpose" name="purpose" >
                                        <option selected value="">SELECT PURPOSE</option>
                                        <option value="advertisement" <?php if ($purpose == "advertisement") echo 'selected'; ?>>advertisement</option>
                                        <option value="ushering" <?php if ($purpose == "ushering") echo 'selected'; ?>>ushering</option>
                                        <option value="runway" <?php if ($purpose == "runway") echo 'selected'; ?>>runway</option>
                                        <option value="contest" <?php if ($purpose == "contest") echo 'selected'; ?>>contest</option>
                                        <option value="events" <?php if ($purpose == "events") echo 'selected'; ?>>events</option>
                                        <option value="others" <?php if ($purpose == "others") echo 'selected'; ?>>others</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <select class="form-control" id="duration" name="duration" >
                                        <option selected value="">SELECT DURATION</option>
                                        <option value="below_1_month" <?php if ($duration == "below_1_month") echo 'selected'; ?>>Below 1 Month</option>
                                        <option value="above_1_month" <?php if ($duration == "above_1_month") echo 'selected'; ?>>Above 1 Month</option>
                                        <option value="below_3_months" <?php if ($duration == "below_3_months") echo 'selected'; ?>>Below 3 Months</option>
                                        <option value="above_3_months" <?php if ($duration == "above_3_months") echo 'selected'; ?>>Above 3 Months</option>
                                        <option value="below_6_months" <?php if ($duration == "below_6_months") echo 'selected'; ?>>Below 6 Months</option>
                                        <option value="above_6_months" <?php if ($duration == "above_6_months") echo 'selected'; ?>>Above 6 Months</option>
                                        <option value="above_1_year" <?php if ($duration == "above_1_year") echo 'selected'; ?>>Above 1 Year</option>
                                    </select>
                                </div>
                            </div>

                            
                            <p id="msg"></p>
                        </fieldset>
                    
                    <fieldset id="third">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary " />
                    </fieldset>
                    </form>
            </div>

        </div>

    </div>

</section>




<script type="text/javascript" src="js/cou_model.js"></script>

<?php
include_once 'incl/footer.php';
ob_end_flush();
?>