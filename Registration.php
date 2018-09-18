<!DOCTYPE html>
<?php
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewreport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <title>Registration | AdWale</title>
        <link rel="stylesheet" href="css/mystyle.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript"></script>
        <style>
            .container-fluid .mylogin{
                color: #FFF; font-weight: bold; float: right; margin-top: 15px; margin-right: 10px;
                background-color: transparent;
            }
            .container-fluid .mylogin:hover{text-decoration: none; color: #FFF;}
            .mylogin-div{background-color: #00c853; float: right; padding: 7px 20px 20px 25px; display: inline-block; width: auto;}
            .mylogin-div:hover{background-color: #00b34a;}
            .divshadow{box-shadow: 0 0 5px 0 rgba(0,0,0,.3);}
            .mytab1{padding: 10px; font-size: 17px; font-weight: bold; text-align: center; border-bottom: 3px solid #448AFF; box-shadow: 0 0 5px 0 rgba(0,0,0,.3);}
            .mytab2{padding: 10px; font-size: 17px; font-weight: bold; text-align: center;}
            .mytab3{padding: 10px; font-size: 17px; font-weight: bold; text-align: center;}
            .myhr{margin-top: 0px;}
            .spanerrcolor{color:#cc0000;}
        </style>
    </head>
    <body>

        <?php
        $fname = "";
        $lname = "";
        $user_email = "";
        $user_password = "";
        $confirm_user_password = "";
        $user_type = "";
        $contact_no = "";

        $_SESSION['ses_fname'] = "";
        $_SESSION['ses_lname'] = "";
        $_SESSION['ses_user_email'] = "";
        $_SESSION['ses_user_type'] = "";
        $_SESSION['ses_contact_no'] = "";
        $_SESSION['ses_otp'] = "";

        $regerr = "";
        $regerr1 = "";
        $regerr2 = "";
        $regerr3 = "";
        $regerr4 = "";
        $regerr5 = "";
        $regerr6 = "";

        $flag = true;

        if (isset($_POST['btnsave_next'])) {
            if ($_POST['first_name'] == "") {
                $regerr = "Please enter first name!";
                $flag = false;
            } else {
                if (ctype_alpha($_POST['first_name'])) {
                    $regerr = "";
                } else {
                    $regerr = "Please enter only alphabet values!";
                }
            }

            if ($_POST['last_name'] == "") {
                $regerr1 = "Please enter last name!";
                $flag = false;
            } else {
                if (ctype_alpha($_POST['last_name'])) {
                    $regerr1 = "";
                } else {
                    $regerr1 = "Please enter only alphabet values!";
                }
            }

            if ($_POST['user_email'] == "") {
                $regerr2 = "Please enter email id!";
                $flag = false;
            }

            if ($_POST['password'] == "" || $_POST['password_confirmation'] == "") {
                if ($_POST['password'] == "") {
                    $regerr3 = "Please enter password!";
                    $flag = false;
                }
                if ($_POST['password_confirmation'] == "") {
                    $regerr4 = "Please enter confirm Password!";
                    $flag = false;
                }
            } else {
                if (strlen($_POST['password']) > 8 && strlen($_POST['password']) < 15) {
                    if ($_POST['password'] != $_POST['password_confirmation']) {
                        $regerr4 = "Password not match";
                        $flag = false;
                    }
                } else {
                    $regerr3 = "Password must be between 8 to 15";
                    $flag = false;
                }
            }

            if ($_POST['contact_no'] == "") {
                $regerr5 = "Please enter contact number!";
                $flag = false;
            }
            

            if ($flag == true) {
                $fname = $_POST['first_name'];
                $lname = $_POST['last_name'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['password'];
                $confirm_user_password = $_POST['password_confirmation'];
                $user_type = $_REQUEST['usertype'];
                $contact_no = $_POST['contact_no'];

                $_SESSION['ses_fname'] = $fname;
                $_SESSION['ses_lname'] = $lname;
                $_SESSION['ses_user_email'] = $user_email;
                $_SESSION['ses_password'] = base64_encode($user_password);
                $_SESSION['ses_user_type'] = $user_type;
                $_SESSION['ses_contact_no'] = $contact_no;

                header("Location: OTPverify.php");
            } else {
                $fname = $_POST['first_name'];
                $lname = $_POST['last_name'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['password'];
                $contact_no = $_POST['contact_no'];

                $_SESSION['ses_fname'] = $fname;
                $_SESSION['ses_lname'] = $lname;
                $_SESSION['ses_user_email'] = $user_email;
                $_SESSION['ses_password'] = $user_password;
                $_SESSION['ses_contact_no'] = $contact_no;
            }
        }
        ?>

        <div class="container-fluid divshadow">
            <div class="row">
                <div class="col-sm-8">
                    <a href="index.php"><img src="logo/homelogoimage1.png" class="img-responsive mylogo" alt="home logo"></a>
                </div>
                <div class="col-sm-4 mylogin-div">
                    <a href="Login.php" class="mylogin">LOGIN</a>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> 
                    <form role="form" method="post">
                        <h2>Create your AdWale Account <small>for <?php echo $_REQUEST['usertype'] ?></small></h2>
                        <div class="row">
                            <div class="col-sm-4 col-xs-6 mytab1">Registration</div><div class="col-sm-4 col-xs-6 mytab2">Verify</div>
                            <div class="col-sm-4 col-xs-6 mytab3">Bank Details</div>
                        </div>
                        <hr class="myhr">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" value="<?php echo $_SESSION['ses_fname']; ?>" tabindex="1">
                                    <span class="spanerrcolor"><?php echo $regerr; ?></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" value="<?php echo $_SESSION['ses_lname']; ?>" tabindex="2">
                                    <span class="spanerrcolor"><?php echo $regerr1; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="user_email" id="user_email" class="form-control input-lg" placeholder="Email Address" value="<?php echo $_SESSION['ses_user_email']; ?>" tabindex="3">
                            <span class="spanerrcolor"><?php echo $regerr2; ?></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-lg" maxlength="15" placeholder="Password" tabindex="4">
                                    <span class="spanerrcolor"><?php echo $regerr3; ?></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" maxlength="15" placeholder="Confirm Password" tabindex="5">
                                    <span class="spanerrcolor"><?php echo $regerr4; ?></span>
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <select class="form-control input-lg" tabindex="6" required>
                                        <option value="">-User Type-</option>
                                        <option value="Publisher">Publisher</option>
                                    </select>
                            </div>-->
                        <div class="form-group">
                            <input type="tel" name="contact_no" id="contact_no" class="form-control input-lg" placeholder="Contact No" maxlength="10" pattern="\d{10}" value="<?php echo $_SESSION['ses_contact_no']; ?>" tabindex="7">
                            <span class="spanerrcolor"><?php echo $regerr5; ?></span>
                        </div>
                        

                        <hr>

                        <div class="text-center">
                            <div class="row"><input type="submit" class="btn btn-primary btn-lg mybtndis" style="width:200px;" value="Save & Next" name="btnsave_next" tabindex="8" ></div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
// put your code here
        ?>

    </body>
</html>
