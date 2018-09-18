<!DOCTYPE html>
<?php
session_start();
include_once 'conn.php';
?>

<?php
    if ($_SESSION['ses_logid'] == null) {
        header('location: ../Login.php');
    }
    else if($_SESSION['ses_utype'] != "advertiser")
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

        <title>Ad Money on Wallet | AdWale</title>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/adv_core.css" rel="stylesheet" type="text/css" />
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

    </head>
    
    <?php
        $mymoney=0;
        $result = $mysqli->query("SELECT * FROM adv_wallet WHERE u_email='".$_SESSION['ses_logid']."'");
        if($result->num_rows==1)
        {
            $row=$result->fetch_assoc();
            $mymoney=$row['money'];
        }
    ?>
    
    <?php
        $flag=true;
        $errrs="";
        $bankname="";
        $accountno="";
        $holdername="";
        $ifsccode="";
        $result = $mysqli->query("SELECT bank_name,account_no,ac_holdername,ifsc_code FROM user_master WHERE u_email='".$_SESSION['ses_logid']."'");
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $bankname=$row['bank_name'];
            $accountno=$row['account_no'];
            $holdername=$row['ac_holdername'];
            $ifsccode=$row['ifsc_code'];
        }
                            
        if(isset($_POST['btnpaynow']))
        {
        }
        if(isset($_POST['btncontinue']))
        {
            if($_POST['txtrupees'] == "")
            {
                $errrs="<span class='text-danger'>Please enter Rupees</span>";
                $flag=false;
            }
            else
            {
                if(ctype_digit($_POST['txtrupees']))
                {
                    if($_POST['txtrupees'] >= 1000)
                    {
                        //$errrs="<span class='text-success'>Money Added in you Wallet</span>";
                                            
                        $query=$mysqli->query("INSERT INTO adv_wallet values('".$_SESSION['ses_logid']."','".$_POST['txtrupees']."','".date("Y-m-d")."')");
                        if($query==true)
                        {
                            echo "<script>alert('Money added in Wallet');</script>";
                            header("location: adv_wallet.php");
                        }
                        else
                        {
                            //Get old money
                                                
                            //Add old money + new money
                            $summoney=$mymoney+$_POST['txtrupees'];
                            $query=$mysqli->query("UPDATE adv_wallet SET money='".$summoney."' WHERE u_email='".$_SESSION['ses_logid']."'");
                            if($query==true)
                            {
                                echo "<script>alert('Money added in Wallet');</script>";
                                header("location: adv_wallet.php");
                            }
                            else
                            {
                                echo "<script>alert('Money not add in Wallet');</script>";
                            }
                        }
                        $query1=$mysqli->query("INSERT INTO advertiser_transaction (u_email,paid_amount,payment_date) VALUES('".$_SESSION['ses_logid']."','".$_POST['txtrupees']."','".date("Y-m-d")."')");
                        if($query1==true)
                        {
                        }
                        else
                        {
                        }
                    }
                    else
                    {
                        $errrs="<span class='text-danger'>Please enter minimum 1000 Rupees</span>";
                    }
                }
                else
                {
                    $errrs="<span class='text-danger'>Please enter only numbers.</span>";
                }
            }
        }
    ?>
    

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'adv_header.php'; ?>
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
                                    <li><a href="adv_profile.php"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="adv_logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            <p class="text-muted m-0"><?php echo ucfirst($_SESSION['ses_utype']); ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="adv_index.php" class="waves-effect active"><i class="ti-home"></i> <span> Dashboard </span> </a>
                            </li>
                            <li>
                                <a href="created_ads.php" class="waves-effect"><i class="md-add-box"></i> <span> Create Ads </span> </a>
                            </li>
                            <li>
                                <a href="adv_feedback.php" class="waves-effect"><i class="md-announcement"></i> <span> Feedback </span> </a>
                            </li>
                            <li>
                                <a href="adv_offer.php" class="waves-effect"><i class="md-local-offer"></i> <span> Offers </span> </a>
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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Wallet</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li class="active">Wallet</li>
                                    <li class="active">Add Money</li>
                                </ol>
                            </div>
                        </div>

                        <form method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box" style="border-top:3px solid #4c5667;">
                                    <h4 class="m-t-0 header-title"><b>Add Money in Your Wallet</b></h4>
                                    <div class="text-right">
                                        <span><b>Your Current Balance: <?php echo $mymoney; ?> Rs.</b></span>
                                    </div>
                                    <div class="text-right m-b-30">
                                        <span><b>Date: <?php echo date("Y-m-d"); ?></b></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span>Add minimum 1000 rupees in your wallet</span>
                                            <div class="form-group">

                                                <div class="input-group m-t-10">
                                                    <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
                                                    <input type="text" id="txtrupees" name="txtrupees" class="form-control" placeholder="..">
                                                </div>
                                                <?php echo $errrs; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="panel panel-color panel-custom" style="border-bottom:2px solid #4c5667;">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Bank Detail</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <span><b><?php echo $bankname; ?></b></span>
                                                    <p><b>AC Holder Name:</b><?php echo $holdername; ?></p>
                                                    <p><b>Account No.:</b><?php echo $accountno; ?></p>
                                                    <p><b>IFSC Code:</b><?php echo $ifsccode; ?></p>
                                                </div>
                                                <div class="panel-footer">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <input type="submit" name="btnpaynow" value="Pay Now" class="btn btn-info">
                                            <input type="submit" name="btncontinue" value="Continue" class="btn btn-primary">
                                        </div>                
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <div style="min-height: 100px;"></div>
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


    </body>
</html>
