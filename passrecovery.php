<!DOCTYPE html>
<?php
include_once 'conn.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Pratik">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>User password recover | AdWale</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />


        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <body>
        <?php
        $errtxtmail = "";
        $display_block = "<div class='alert alert-info alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                            Enter your <b>Email</b> and instructions will be sent to you!
                        </div>";

        $flag = true;
        if (isset($_POST['btnsendmail'])) {
            if ($_POST['txtemail'] == "") {
                $errtxtmail = "Please enter your email id!";
                $flag = false;
            }
            if ($flag == true) {
                $useremail = $_POST['txtemail'];
                $query = "select u_email,u_password from user_master where u_email='" . $useremail . "'";
                $result = $mysqli->query($query);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $to = $useremail;
                    $subject = "Recover password : AdWale";
                    $txt = "<h3>Hello $useremail (user), <br/><br/><br/> Your <font color='#5190F7'>A</font>d<font color='#5190F7'>W</font>ale account password is : <font color='#3c763d'>". $row['u_password']."</font></h3>";
                    $txt .= "<br/><br/><h3>Thank You!</h3>";

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: adwale.supprt18@gmail.com";

                    if (mail($to, $subject, $txt, $headers)) {
                        $display_block = "<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                            Please check your Email. mail <b>successfully sent</b>.! &#x2714;
                        </div>";
                    } else {
                        $display_block = "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                            &#x2716; Message unsuccessfull!!
                        </div>";
                    }
                } else {
                    $display_block = "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                            Your Email is <b>not registered</b>, Please enter registered Email.!
                        </div>";
                }
            }
        }
        ?>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class=" card-box">
                <div class="panel-heading">
                    <h3 class="text-center"> Recover Password </h3>
                </div>

                <div class="panel-body">
                    <form method="post" action="#" role="form" class="text-center">
<?php
echo $display_block;
?>
                        <div class="form-group m-b-0">
                            <div class="input-group">
                                <input type="email" name="txtemail" class="form-control" placeholder="Enter Email">
                        <?php echo "<font color=red>$errtxtmail</font>"; ?>
                                <span class="input-group-btn">
                                    <button type="submit" name="btnsendmail" class="btn btn-adwaleblue w-sm waves-effect waves-light">
                                        Recover
                                    </button> 
                                </span>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>