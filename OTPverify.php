<!DOCTYPE html>

<?php
session_start();
?>

<?php
    if (isset($_POST['btn_sn'])) {
        header("location: BankDetails.php");
    }
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
            .mytab1{padding: 10px; font-size: 17px; font-weight: bold; text-align: center;}
            .mytab2{padding: 10px; font-size: 17px; font-weight: bold; text-align: center; border-bottom: 3px solid #448AFF; box-shadow: 0 0 5px 0 rgba(0,0,0,.3);}
            .mytab3{padding: 10px; font-size: 17px; font-weight: bold; text-align: center;}
            .myhr{margin-top: 0px;}
            .spanerrcolor{color:#cc0000;}
        </style>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".row1").hide();
                $(".btn_sn").attr("disabled", true);
                $(".btnphone").click(function () {
                    $(".row1").slideDown();
                    $(".btnverify").attr("disabled", true);
                    //var txtotp=$("#txtotp").val();
                    var conditionval = "thisotp1";
                    $.ajax({
                        url: 'AJAX_OTP.php',
                        type: 'post',
                        data: {infocondition: conditionval},
                        success: function (data) {
                            $("#otpverify").html(data);
                        }
                    });
                    return false;
                });
                $(".btnemail").click(function () {
                    $(".row1").slideDown();
                    $(".btnverify").attr("disabled", true);
                    //var txtotp=$("#txtotp").val();
                    var conditionval = "thisotp2";
                    $.ajax({
                        url: 'AJAX_OTP.php',
                        type: 'post',
                        data: {infocondition: conditionval},
                        success: function (data) {
                            $("#otpverify").html(data);
                        }
                    });
                    return false;
                });

                $("#txtotp").focus(function () {
                    $(".btnverify").attr("disabled", false);
                });

                $(".btnverify").click(function () {
                    var myotp = $("#txtotp").val();
                    var conditionval = "thisotp3";
                    $.ajax({
                        url: 'AJAX_OTP.php',
                        type: 'post',
                        data: {infocondition: conditionval, infootp: myotp},
                        success: function (data) {
                            $("#otpverify").html(data);
                            var myb = $.trim(data);
                            //alert(myb);
                            if (myb == "<span id='mymsgspan' style='color:green;'>Verification is success.</span>")
                            {
                                $(".btn_sn").removeAttr("disabled");
                            }
                        }
                    });
                    return false;
                });

            });
        </script>
    </head>

    

    <body>

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
                        <h2>Create your AdWale Account <small>for  <?php echo $_SESSION['ses_user_type']; ?></small></h2>
                        <div class="row">
                            <div class="col-sm-4 col-xs-6 mytab1">Registration</div><div class="col-sm-4 col-xs-6 mytab2">Verify</div>
                            <div class="col-sm-4 col-xs-6 mytab3">Bank Details</div>
                        </div>
                        <hr class="myhr">
                        <div class="row text-center">
                            <span class="text-dark text-info" style="font-weight: 400px; font-size: 25px;">Verify with</span><br/><br/>
                            <div class="row">

                                <div class="col-sm-6 text-right">
                                    <a href="#" class="btn btn-success btn-lg btnphone"><span class="glyphicon glyphicon-phone" ></span> Using Contact no.</a>
                                </div>
                                <div class="col-sm-6 text-left">
                                    <a href="#" class="btn btn-danger btn-lg btnemail"><span class="glyphicon glyphicon-envelope" ></span> Using Email</a>
                                </div>
                            </div><br/><br/>
                            <div class="row row1">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <span id="otpverify"></span>
                                    <div class="form-group">
                                        <input type="text" name="txtotp" id="txtotp" class="form-control input-lg text-center" placeholder="Enter OTP" maxlength="4" value="<?php echo $_SESSION['ses_otp']; ?>" tabindex="7">
                                        <span class="spanerrcolor" id="otpverify1"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                </div>
                            </div>
                            <div class="row row1">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group" style="padding-top: 5px;">
                                        <a href="" name="btnverify" class="btn btn-info btnverify">Verify OTP</a>
                                    </div>  
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <button href="#" class="btn btn-primary btn-lg btn_sn" name="btn_sn">Save & Next</button>
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
