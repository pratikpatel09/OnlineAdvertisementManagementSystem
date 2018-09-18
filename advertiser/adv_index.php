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

        <title>Advertiser Dashboard | AdWale</title>

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
                        <?php
                            $resultm=$mysqli->query("select * from adv_wallet where u_email='".$_SESSION['ses_logid']."'");
                            if($resultm->num_rows==1)
                            {
                                $row=$resultm->fetch_assoc();
                                if($row['money']>15)
                                {}
                                else
                                {
                                    echo "<div class='alert alert-danger alert-dismissable fade in'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Note:</strong>
                                 You need to add money in your wallet.
                            </div>";
                                }
                                
                            }
                        ?>
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to AdWale !</p>
                            </div>
                        </div>
                        
                         <?php
                            $total_imp=0;
                            $total_click=0;
                            $total_imp_cost=0;
                            $total_click_cost=0;
                            $total_cost=0;
                            $result=$mysqli->query("SELECT * FROM advertisement admt,user_master um WHERE admt.u_email=um.u_email and um.u_email='".$_SESSION['ses_logid']."'");
                            while($row=$result->fetch_assoc())
                            {
                                $result_imp=$mysqli->query("SELECT count(*) FROM publisher_ad_impression WHERE advertisement_id='".$row['advertisement_id']."'");
                                while($row_imp=$result_imp->fetch_assoc())
                                {
                                    $total_imp=$row_imp['count(*)'];
                                }
                                $result_click=$mysqli->query("SELECT count(*) FROM advertiser_click_count WHERE advertisement_id='".$row['advertisement_id']."'");
                                while($row_click=$result_click->fetch_assoc())
                                {
                                    $total_click=$row_click['count(*)'];
                                }
                                $result_icost=$mysqli->query("SELECT ROUND(COALESCE(SUM(impression_cost),0),2) FROM publisher_ad_impression WHERE advertisement_id='".$row['advertisement_id']."'");
                                while($row_icost=$result_icost->fetch_assoc())
                                {
                                    $total_imp_cost=$row_icost['ROUND(COALESCE(SUM(impression_cost),0),2)'];
                                }
                                $result_ccost=$mysqli->query("SELECT ROUND(COALESCE(SUM(click_cost),0),2) FROM advertiser_click_count WHERE advertisement_id='".$row['advertisement_id']."'");
                                while($row_ccost=$result_ccost->fetch_assoc())
                                {
                                    $total_click_cost=$row_ccost['ROUND(COALESCE(SUM(click_cost),0),2)'];
                                }
                                $total_cost=$total_imp_cost+$total_click_cost;
                                echo '<div class="row">
                                        <div class="col-sm-9">
                                            <div class="card-box widget-inline" style="border-top:3px solid #4c5667;">
                                                <span style="font-size: 14px; margin-left: 25px;"><b>'.$row['ads_name'].'</b></span>
                                                <span style="font-size: 14px; margin-left: 25px;"><i class="fa fa-circle '.($row['status']=='started'?'text-success':'').''.($row['status']=='waiting'?'text-gray':'').''.($row['status']=='stopped'?'text-danger':'').'"></i> <b>'.($row['status']=='started'?'Started':'').''.($row['status']=='waiting'?'Waiting':'').''.($row['status']=='stopped'?'Stopped':'').'</b></span>
                                                <span style="font-size: 14px; margin-left: 30px;"><b> Banner Size:'.$row['ad_size'].'</b></span>
                                                <span style="font-size: 14px; margin-left: 25px;"><b> Type:'.$row['ad_type'].'</b></span>
                                                    <span style="font-size: 14px; margin-left: 25px;"><b>Category:'.$row['ad_category'].'</b></span>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="widget-inline-box text-center">
                                                            <h3><b>'.$total_imp.'</b></h3>
                                                            <h4 class="text-dark">Total Impressions</h4>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="widget-inline-box text-center">
                                                            <h3><b>'.$total_click.'</b></h3>
                                                            <h4 class="text-dark">Total Clicks</h4>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="widget-inline-box text-center">
                                                            <h3><i class="text-custom fa fa-inr" style="font-size:21px;"></i> <b>'.$total_imp_cost.'</b></h3>
                                                            <h4 class="text-dark">Total Impressions Cost</h4>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="widget-inline-box text-center b-0">
                                                            <h3><i class="text-custom fa fa-inr" style="font-size:21px;"></i> <b>'.$total_click_cost.'</b></h3>
                                                            <h4 class="text-dark">Total Clicks Cost</h4>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="card-box widget-inline" style="border-top:3px solid #4c5667;">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="widget-inline-box text-center">
                                                        <hr/>
                                                            <br/>
                                                            <h3><i class="text-custom fa fa-inr" style="font-size:21px;"></i> <b>'.$total_cost.'</b></h3>
                                                            <h4 class="text-dark">Total Costs</h4>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
            ?>

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