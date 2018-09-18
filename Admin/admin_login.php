<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Pratik">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>Login for Admin | AdWale</title>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="../assets/js/modernizr.min.js"></script>
        <style>
            .errcolor{color:red;}
        </style>
    </head>
    <body>

        <?php
            include_once 'conn.php';
            $alogerr="";
            $alogerr1="";
            $invaliderr="";
            
             $logid="";
             $logpwd="";
            
            $flag=true;
            
            if(isset($_POST['logbtn']))
            {
                if($_POST['admin_username']=="")
                {
                    $alogerr= "Please enter username!";
                    $flag=false;
                }
                if($_POST['admin_password']=="")
                {
                    $alogerr1= "Please enter password!";
                    $flag=false;
                }
                if($flag == true)
                {
                    $alogid=$_POST['admin_username'];
                    $alogpwd=$_POST['admin_password'];
                   
                    $query = "select admin_email,admin_password from admin_master where admin_email='".$alogid."' and admin_password='".$alogpwd."'";
                    $result = $mysqli->query($query);
                    if($result->num_rows==1)
                    {
                        $row=$result->fetch_assoc();
                        
                        $_SESSION['ses_alogid']=$row['admin_email'];
                        $_SESSION['ses_alogpwd']=$row['admin_password'];
                        
                        header("location: admin_index.php");
                    }
                    else
                    {
                        $invaliderr= "Invalid Login id and Password";
                    }         
                }
            }
        ?>
        
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> Sign In to <strong><span style="font-size: 25px; color: #5190F7;">A</span>d<span style="font-size: 25px; color: #5190F7;">W</span>ale</span></strong> <span style="font-size: 15px;">for Admin</span></h3>
                <p class="errcolor text-center"><?php echo $invaliderr; ?></p>
            </div> 


            <div class="panel-body" method="post">
            <form class="form-horizontal m-t-20" method="post">
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" name="admin_username" placeholder="Username">
                        <span class="errcolor"><?php echo $alogerr; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="admin_password" placeholder="Password">
                        <span class="errcolor"><?php echo $alogerr1; ?></span>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <!--<div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>-->
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <input type="submit" class="btn btn-adwaleblue btn-block text-uppercase waves-effect waves-light" name="logbtn" value="Log In">
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="admin_recoverpw.php" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>
            </form> 
            
            </div>   
            </div>                              
        </div>
    </body>
</html>