<!DOCTYPE html>
<?php
session_start();
include_once 'conn.php';
?>
<?php
    if ($_SESSION['ses_logid'] == null) {
        header('location: ../Login.php');
    }
    else if($_SESSION['ses_utype'] != "publisher")
    {
        header('location: ../Login.php');
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="AdWale">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>Publisher Profile | AdWale</title>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pub_core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../assets/js/modernizr.min.js"></script>
        
        <style>
            .errcolor{color:red;}
        </style>

    </head>

    <?php
                                $errj="";
                                $errj1="";
                                $errj2="";
                                $errj3="";
                                $errcontact="";
                                
                                $passresult="";
                                $contactresult="";
                                
                                $flag=true;
                                if(isset($_POST['c_contact']))
                                {
                                    if($_POST['new_phone']=="")
                                    {
                                        $errcontact = "Please enter new contact no.";
                                        $flag=false;
                                    }
                                    else if(strlen($_POST['new_phone'])!=10)
                                    {
                                        $errcontact="Must be 10 digits!";
                                        $flag=false;
                                    }
                                    else if(ctype_alpha($_POST['new_phone']))
                                    {
                                        $errcontact="Allows only digits!";
                                        $flag=false;
                                    }
                                    if($flag==true)
                                    {
                                        $query=$mysqli->query("update user_master set u_contact_no='".$_POST['new_phone']."' where u_email='".$_SESSION['ses_logid']."'");
                                        if($query==true)
                                        {
                                            $contactresult="<span class='text-success'>Contact no. successfully Updated...</span>";
                                        }
                                        else
                                        {
                                            $contactresult="<span class='text-danger'>Contact no. updation failed!</span>";
                                        }
                                    }
                                }
                                
                                $flag=true;
                                if(isset($_POST['c_pwd']))
                                {
                                    if($_POST['old_password']=="")
                                    {
                                        $errj1="Please enter old password!";
                                        $flag=false;
                                    }
                                    if($_POST['new_password']=="" || $_POST['c_new_password']=="")
                                    {
                                        if($_POST['c_new_password']=="")
                                        {
                                            $errj2="Please enter New Password!";
                                            $flag=false;
                                        }
                                        if($_POST['c_new_password']=="")
                                        {
                                            $errj3="Please enter Confirm Password!";
                                            $flag=false;
                                        }
                                    }
                                    else
                                    {
                                        if (strlen($_POST['new_password']) >= 8 && strlen($_POST['new_password']) <= 15) 
                                        {
                                            if ($_POST['new_password'] != $_POST['c_new_password']) 
                                            {
                                                $errj3 = "Password not match";
                                                $flag = false;
                                            }
                                        } 
                                        else 
                                        {
                                            $errj2 = "Password must be between 8 to 15";
                                            $flag = false;
                                        }
                                    }
                                    
                                    if($flag==true)
                                    {
                                        $result=$mysqli->query("SELECT * FROM user_master WHERE u_email='".$_SESSION['ses_logid']."' and u_type='publisher'");
                                        if($result->num_rows==1)
                                        {
                                            $row=$result->fetch_assoc();
                                            if($_POST['old_password']==base64_decode($row['u_password']))
                                            {
                                                $update_pass=$mysqli->query("update user_master set u_password='".base64_encode($_POST['new_password'])."' where u_email='".$_SESSION['ses_logid']."'");
                                                if($update_pass==true)
                                                {
                                                    $passresult="<span class='text-success'>Password successfully Updated...</span>";
                                                }
                                                else
                                                {
                                                    $passresult="<span class='text-danger'>Password Updation Failed!</span>";
                                                }
                                            }
                                            else
                                            {
                                                $passresult="<span class='text-danger'>Old password is wrong!</span>";
                                            }
                                        }
                                    }
                                }
                             
        ?>
    
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'pub_header.php'; ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="../assets/images/icon/profile_avatar.png" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['ses_ufnm'] . "\t\t\t\t\t"; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="pub_profile.php"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="pub_logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            <p class="text-muted m-0"><?php echo ucfirst($_SESSION['ses_utype']); ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="pub_index.php" class="waves-effect active"><i class="ti-home"></i> <span> Dashboard </span> </a>
                            </li>

                            <li>
                                <a href="website.php" class="waves-effect"><i class="md-web"></i> <span> Websites </span> </a>
                            </li>
                            <li>
                                <a href="pub_feedback.php" class="waves-effect"><i class="md-announcement"></i> <span> Feedback </span> </a>
                            </li>
                            <li>
                                <a href="pub_offer.php" class="waves-effect"><i class="md-local-offer"></i> <span> Offers </span> </a>
                            </li>
                            

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        
                        <?php
                        $fname="";
                        $lname="";
                        $email="";
                        $password="";
                        $contactno="";
                        
                    $query = "SELECT u_firstname,u_lastname,u_email,u_password,u_contact_no FROM user_master WHERE u_email='".$_SESSION['ses_logid']."' and u_type='publisher'";
                    $result = $mysqli->query($query);
                    if ($result == true) {
                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $fname=$row['u_firstname'];
                                $lname=$row['u_lastname'];
                                $email=$row['u_email'];
                                $contactno=$row['u_contact_no'];
                                
                            }
                        }
                    }
                    ?>
                        
                        <div class="wraper container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="bg-picture text-center">
                                    <div class="bg-picture-overlay"></div>
                                    <div class="profile-info-name">
                                        <img src="../assets/images/icon/profile_pic.png" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                        <h4 class="m-b-5"><b><?php echo $fname." ".$lname; ?></b></h4>
                                        <!--<p class="text-muted"><i class="fa fa-map-marker"></i> My company  is at my Home :)</p>-->
                                    </div>
                                </div>
                                <!--/ meta -->
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">

                                <div class="card-box m-t-20">
                                    <h4 class="m-t-0 header-title"><b>Info</b></h4>
                                    <div class="p-20">
                                        <div class="about-info-p">
                                            <strong>Email</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $email; ?></p>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Mobile</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $contactno; ?></p>
                                        </div>

                                    </div>
                                </div>


                            </div>


                            <div class="col-md-8">

                                <div class="card-box m-t-20">
                                    <h4 class="m-t-0 header-title"><b>Update info</b></h4>
                                    <div class="p-20">

                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="text-info"><strong><a class="text-info txtchngpass">Change Password</a></strong>&nbsp;&nbsp;<?php echo $passresult; ?></div>
                                                <div class="row divtxtchngpass">
                                                    <div class="col-sm-7 m-l-10">
                                                        <form method="post">
                                                        <div class="form-group m-t-15">
                                                            <input class="form-control old_password" type="password" name="old_password" placeholder="Old Password">
                                                            <span class="errcolor"><?php echo $errj1; ?></span>
                                                        </div>
                                                        <div class="form-group m-t-15">
                                                            <input class="form-control new_password" type="password" name="new_password" placeholder="New Password">
                                                            <span class="errcolor"><?php echo $errj2; ?></span>
                                                        </div>
                                                        <div class="form-group m-t-15">
                                                            <input class="form-control c_new_password" type="password" name="c_new_password" placeholder="Confirm Password">
                                                            <span class="errcolor"><?php echo $errj3; ?></span>
                                                        </div>
                                                        <div class="form-group m-t-15">
                                                            <span class="text-warning mainerr"><?php echo $errj; ?></span><br/>
                                                            <input type="submit" class="btn btn-info" name="c_pwd" value="Update">
                                                        </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-5">

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-info"><strong><a class="text-info txtconno">Change Contact no.</a></strong>&nbsp;&nbsp;<?php echo $contactresult; ?></div>
                                                    <div class="row divtxtconno">
                                                        <div class="col-sm-7 m-l-10">
                                                            <form method="post">
                                                            <div class="form-group m-t-15">
                                                                <input class="form-control new_phone" type="tel" name="new_phone" placeholder="New Contact Number" maxlength="10" pattern="\d{10}">
                                                                <span class="errcolor errj4"></span>
                                                            </div>

                                                            <div class="form-group m-t-15">
                                                                <span class="text-warning mainerr"><?php echo $errcontact; ?></span><br/>
                                                                <input type="submit" class="btn btn-info" name="c_contact" value="Update">
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm-5">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © AdWale.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

        <script src="../assets/js/jquery-3.2.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".divtxtchngpass").hide();
                $(".divtxtconno").hide();
                $(".txtchngpass").click(function () {
                    $(".divtxtconno").slideUp();
                    $(".divtxtchngpass").slideToggle();
                });
                $(".txtconno").click(function () {
                    $(".divtxtchngpass").slideUp();
                    $(".divtxtconno").slideToggle();
                });

            });
        </script>

    </body>
</html>