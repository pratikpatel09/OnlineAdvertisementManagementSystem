<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start(); 
    include_once 'conn.php';
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
            .mytab2{padding: 10px; font-size: 17px; font-weight: bold; text-align: center;}
            .mytab3{padding: 10px; font-size: 17px; font-weight: bold; text-align: center; border-bottom: 3px solid #448AFF; box-shadow: 0 0 5px 0 rgba(0,0,0,.3);}
            .myhr{margin-top: 0px;}
            .conspan{color:#cc0000;}
            
        </style>
    </head>
    
    <?php 
            $bname="";
            $bacholderno="";
            $ac_no="";
            $ifsccode="";
            
            $_SESSION['ses_bname']="";
            $_SESSION['ses_bacholdername']="";
            $_SESSION['ses_ac_no']="";
            $_SESSION['ses_ifsccode']="";
            
            $errmsg="";
            $errmsg1="";
            $errmsg2="";
            $errmsg3="";
            $errmsgdb="";
            $flag=true;
            
            //$bname=$_POST["bank_name"];
            //$bacholderno=$_POST['display_holder_name'];
            //$ac_no=$_POST['account_no'];
            //$ifsccode=$_POST['ifsc_code'];
            
            if(isset($_POST['btnregister']))
            {
                if($_POST["bank_name"] == NULL)
                {
                    $errmsg="Please select Bank Name!";   
                    $flag=false;
                }
                if($_POST["display_holder_name"] == NULL)
                {
                    $errmsg1="Please enter account holder name!";    
                    $flag=false;
                }
                /*else
                {
                    if(preg_match("/\bVi\b/i", $_POST["display_holder_name"]))
                    {
                        echo "matched Ok!!!";
                    }
                    else
                    {
                        echo "Not match!";
                    }
                }*/
                
                if($_POST["account_no"] == NULL)
                {
                    $errmsg2="Please enter account no.!";    
                    $flag=false;
                }
                else
                {
                    if(ctype_digit($_POST["account_no"]))
                    {
                        $errmsg2="";
                    } 
                    else 
                    {
                        $errmsg2="Please enter only digits";
                        $flag=false;
                    }
                }
                                
                if($_POST["ifsc_code"] == NULL)
                {
                    $errmsg3="Please enter ifsc_code!";    
                    $flag=false;
                }
                                
                if($flag==true)
                {
                    $_SESSION['ses_bname']=$_POST["bank_name"];
                    $_SESSION['ses_bacholdername']=$_POST["display_holder_name"];
                    $_SESSION['ses_ac_no']=$_POST["account_no"];
                    $_SESSION['ses_ifsccode']=$_POST["ifsc_code"];
                    
                    $sesfname=$_SESSION['ses_fname'];
                    $seslname=$_SESSION['ses_lname'];
                    $sesuser_email=$_SESSION['ses_user_email'];
                    $sesuser_password=$_SESSION['ses_password'];
                    $sesuser_type=$_SESSION['ses_user_type'];
                    $sescontact_no=$_SESSION['ses_contact_no'];
                    $sesbname=$_SESSION['ses_bname'];
                    $sesbacholdername=$_SESSION['ses_bacholdername'];
                    $sesb_ac_no=$_SESSION['ses_ac_no'];
                    $sesb_ifsc_code=$_SESSION['ses_ifsccode'];
                    
                    /* Check connection status
                    if($mysqli->connect_errno)
                    {
                        echo "Connection Status:".mysqli_connect_error();
                    }
                    else
                    {
                        echo "success";
                    }
                    $mysqli->close();*/
                    
                    $query = $mysqli->query("insert into user_master values('$sesfname','$seslname','$sesuser_email','$sesuser_password','$sesuser_type','$sescontact_no','$sesbname','$sesb_ac_no','$sesbacholdername','$sesb_ifsc_code')");
                    if($query==true)
                    {
                        echo "Record inserted Successfully...";
                        echo "<script>alert('Successfully Registered');</script>";
                        header("Location: Login.php");
                    }    
                    else 
                    {
                        $errmsgdb="<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Error!</strong> Registration Fail..!!!.
              </div>";
                    }
                    $mysqli->close();
                    
                }
                else
                {
                    $_SESSION['ses_bname']=$_POST["bank_name"];
                    $_SESSION['ses_bacholdername']=$_POST["display_holder_name"];
                    $_SESSION['ses_ac_no']=$_POST["account_no"];
                    $_SESSION['ses_ifsccode']=$_POST["ifsc_code"];
                    
                }
                
                    
            }
        ?>        
    
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
            <?php echo $errmsgdb; ?>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" method="post">
                        <h2>Create your AdWale Account <small>for <?php echo $_SESSION['ses_user_type']; ?></small></h2>
                        <div class="row">
                            <div class="col-sm-4 col-xs-6 mytab1">Registration</div><div class="col-sm-4 col-xs-6 mytab2">Verify</div>
                            <div class="col-sm-4 col-xs-6 mytab3">Bank Details</div>
                        </div>
                        <hr class="myhr">
                        <div class="form-group">
                            <b>Bank Name:</b>
                            <select class="form-control input-lg" name="bank_name" for="inputError" tabindex="1">
                                <option value="">-Select Bank-</option>
                                <option value="Axis Bank">Axis Bank</option>
                                <option value="Bank of Baroda">Bank of Baroda</option>
                                <option value="Bank of India">Bank of India</option>
                                <option value="Central Bank of India">Central Bank of India</option>
                                <option value="Dena Bank">Dena Bank</option>
                                <option value="IDBI Bank">IDBI Bank</option>
                                <option value="Punjab National Bank">Punjab National Bank</option>
                                <option value="State Bank of India">State Bank of India</option>
                                <option value="Union Bank of India">Union Bank of India</option>
                                    </select>
                                        <span class="conspan"><?php echo $errmsg; ?></span>
                            </div>
                            <div class="form-group">
                                <b>Account Holder Name:</b> 
                                <input type="text" name="display_holder_name" id="display_holder_name" class="form-control input-lg" for="inputError" placeholder="Card Holder's Name" pattern="^([\sA-Za-z]+)$" value="<?php echo $sesbacholdername=$_SESSION['ses_bacholdername']; ?>" tabindex="2">
                                <span class="conspan"><?php echo $errmsg1; ?></span>
                            </div>                        
                            <div class="form-group">
                                <b>Account No.:</b>
                                <input type="text" name="account_no" id="account_no" class="form-control input-lg" maxlength="16" placeholder="Account No." value="<?php echo $_SESSION['ses_ac_no']; ?>" tabindex="3">
                                <span class="conspan"><?php echo $errmsg2; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <b>IFSC code:</b>
                                    <input type="text" name="ifsc_code" id="ifsc_code" class="form-control input-lg" maxlength="11" placeholder="IFSC code" value="<?php echo $_SESSION['ses_ifsccode']; ?>" tabindex="4">
                                    <span class="conspan"><?php echo $errmsg3; ?></span>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <input type="submit" class="btn btn-primary btn-lg" style="width:200px;" value="Register" name="btnregister" tabindex="5">
                                    <span></span>
                                </div> 
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
