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

        <title>Publisher Dashboard | AdWale</title>

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

    </head>


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
                            <li class="has_sub">
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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to AdWale !</p>
                            </div>
                        </div>
                        
                        <?php
                            $click_today=0;
                            $click_yesterday=0;
                            $click_week=0;
                            $click_month=0;
                            $click_total=0;
                            
                            $imp_today=0;
                            $imp_yesterday=0;
                            $imp_week=0;
                            $imp_month=0;
                            $imp_total=0;
                            
                            $i_earning_today=0;
                            $i_earning_yesterday=0;
                            $i_earning_week=0;
                            $i_earning_month=0;
                            $i_earning_total=0;
                            
                            $c_earning_today=0;
                            $c_earning_yesterday=0;
                            $c_earning_week=0;
                            $c_earning_month=0;
                            $c_earning_total=0;
                            
                            $c_i_earning_today=0;
                            $c_i_earning_yesterday=0;
                            $c_i_earning_week=0;
                            $c_i_earning_month=0;
                            $c_i_earning_total=0;
                            //Start Click counter=====
                            $result=$mysqli->query("SELECT count(*) FROM publisher_click_count where u_email='".$_SESSION['ses_logid']."' and click_date='".date('Y-m-d')."'");
                            while($row=$result->fetch_assoc())
                            {
                                $click_today=$row['count(*)'];
                            }
                            
                            $result=$mysqli->query("SELECT count(*) FROM publisher_click_count where u_email='".$_SESSION['ses_logid']."' and click_date='".date('Y-m-d',strtotime("-1 days"))."'");
                            while($row=$result->fetch_assoc())
                            {
                                $click_yesterday=$row['count(*)'];
                            }
                            
                            $week = date("Y-m-d",mktime(0, 0, 0, date("m"), date("d")-7,date("Y")));
                            $result=$mysqli->query("SELECT count(*) FROM publisher_click_count where u_email='".$_SESSION['ses_logid']."' and click_date BETWEEN '".$week."' AND '".date('Y-m-d')."'");
                            while($row=$result->fetch_assoc())
                            {
                                $click_week=$row['count(*)'];
                            }
                            
                            $result=$mysqli->query("SELECT count(*) FROM publisher_click_count where u_email='".$_SESSION['ses_logid']."' and MONTH(click_date)=MONTH(CURRENT_DATE())");
                            while($row=$result->fetch_assoc())
                            {
                                $click_month=$row['count(*)'];
                            }
                            
                            $result=$mysqli->query("SELECT count(*) FROM publisher_click_count where u_email='".$_SESSION['ses_logid']."'");
                            while($row=$result->fetch_assoc())
                            {
                                $click_total=$row['count(*)'];
                            }
                            //End Click counter=====
                            //Start Imapression counter=====
                            $result=$mysqli->query("SELECT count(*) FROM publisher_ad_impression where u_email='".$_SESSION['ses_logid']."' and impression_date='".date('Y-m-d')."'");
                            while($row=$result->fetch_assoc())
                            {
                                $imp_today=$row['count(*)'];
                            }
                            
                            $result=$mysqli->query("SELECT count(*) FROM publisher_ad_impression where u_email='".$_SESSION['ses_logid']."' and impression_date='".date('Y-m-d',strtotime("-1 days"))."'");
                            while($row=$result->fetch_assoc())
                            {
                                $imp_yesterday=$row['count(*)'];
                            }
                            
                            $week = date("Y-m-d",mktime(0, 0, 0, date("m"), date("d")-7,date("Y")));
                            $result=$mysqli->query("SELECT count(*) FROM publisher_ad_impression where u_email='".$_SESSION['ses_logid']."' and impression_date BETWEEN '".$week."' AND '".date('Y-m-d')."'");
                            while($row=$result->fetch_assoc())
                            {
                                $imp_week=$row['count(*)'];
                            }
                            
                            $result=$mysqli->query("SELECT count(*) FROM publisher_ad_impression where u_email='".$_SESSION['ses_logid']."' and MONTH(impression_date)=MONTH(CURRENT_DATE())");
                            while($row=$result->fetch_assoc())
                            {
                                $imp_month=$row['count(*)'];
                            }
                            
                            $result=$mysqli->query("SELECT count(*) FROM publisher_ad_impression where u_email='".$_SESSION['ses_logid']."'");
                            while($row=$result->fetch_assoc())
                            {
                                $imp_total=$row['count(*)'];
                            }
                            //End Imapression counter=====
                            //Start Imapression Earning counter=====
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(impression_earning),0),2) FROM publisher_ad_impression WHERE u_email='".$_SESSION['ses_logid']."' and impression_date='".date('Y-m-d')."'");
                            while($row=$result->fetch_assoc())
                            {
                                $i_earning_today=$row['ROUND(COALESCE(SUM(impression_earning),0),2)'];
                            }
                            
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(impression_earning),0),2) FROM publisher_ad_impression WHERE u_email='".$_SESSION['ses_logid']."' and impression_date='".date('Y-m-d',strtotime("-1 days"))."'");
                            while($row=$result->fetch_assoc())
                            {
                                $i_earning_yesterday=$row['ROUND(COALESCE(SUM(impression_earning),0),2)'];
                            }
                            
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(impression_earning),0),2) FROM publisher_ad_impression WHERE u_email='".$_SESSION['ses_logid']."' and impression_date BETWEEN '".$week."' AND '".date('Y-m-d')."'");
                            while($row=$result->fetch_assoc())
                            {
                                $i_earning_week=$row['ROUND(COALESCE(SUM(impression_earning),0),2)'];
                            }
                            
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(impression_earning),0),2) FROM publisher_ad_impression WHERE u_email='".$_SESSION['ses_logid']."' and MONTH(impression_date)=MONTH(CURRENT_DATE())");
                            while($row=$result->fetch_assoc())
                            {
                                $i_earning_month=$row['ROUND(COALESCE(SUM(impression_earning),0),2)'];
                            }
                            
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(impression_earning),0),2) FROM publisher_ad_impression WHERE u_email='".$_SESSION['ses_logid']."'");
                            while($row=$result->fetch_assoc())
                            {
                                $i_earning_total=$row['ROUND(COALESCE(SUM(impression_earning),0),2)'];
                            }
                            //End Impression Earning counter=====
                            //Start Clicks Earning counter=====
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(click_earning),0),2) FROM publisher_click_count WHERE u_email='".$_SESSION['ses_logid']."' and click_date='".date('Y-m-d')."'");
                            while($row=$result->fetch_assoc())
                            {
                                $c_earning_today=$row['ROUND(COALESCE(SUM(click_earning),0),2)'];
                            }
                            
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(click_earning),0),2) FROM publisher_click_count WHERE u_email='".$_SESSION['ses_logid']."' and click_date='".date('Y-m-d',strtotime("-1 days"))."'");
                            while($row=$result->fetch_assoc())
                            {
                                $c_earning_yesterday=$row['ROUND(COALESCE(SUM(click_earning),0),2)'];
                            }
                            
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(click_earning),0),2) FROM publisher_click_count WHERE u_email='".$_SESSION['ses_logid']."' and click_date BETWEEN '".$week."' AND '".date('Y-m-d')."'");
                            while($row=$result->fetch_assoc())
                            {
                                $c_earning_week=$row['ROUND(COALESCE(SUM(click_earning),0),2)'];
                            }
                            
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(click_earning),0),2) FROM publisher_click_count WHERE u_email='".$_SESSION['ses_logid']."' and MONTH(click_date)=MONTH(CURRENT_DATE())");
                            while($row=$result->fetch_assoc())
                            {
                                $c_earning_month=$row['ROUND(COALESCE(SUM(click_earning),0),2)'];
                            }
                            
                            $result=$mysqli->query("SELECT ROUND(COALESCE(SUM(click_earning),0),2) FROM publisher_click_count WHERE u_email='".$_SESSION['ses_logid']."'");
                            while($row=$result->fetch_assoc())
                            {
                                $c_earning_total=$row['ROUND(COALESCE(SUM(click_earning),0),2)'];
                            }
                            //End Clicks Earning counter=====
                            //Start Clicks/Impression Earning counter=====
                            $c_i_earning_today=$c_earning_today+$i_earning_today;
                            $c_i_earning_yesterday=$c_earning_yesterday+$i_earning_yesterday;
                            $c_i_earning_week=$c_earning_week+$i_earning_week;
                            $c_i_earning_month=$c_earning_month+$i_earning_month;
                            $c_i_earning_total=$c_earning_total+$i_earning_total;
                            //End Clicks/Impression Earning counter=====
                        ?>
                        
                        
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="card-box widget-inline">
                                    <span class="m-l-15 text-info">Impressions</span> <i class="md md-info-outline" style="font-size:20px;"></i>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><b><?php echo $imp_today; ?></b></h3>
                                                <h4 class="text-dark">Today Impressions</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><b><?php echo $imp_yesterday; ?></b></h3>
                                                <h4 class="text-dark">Yesterday Impressions</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><b><?php echo $imp_week; ?></b></h3>
                                                <h4 class="text-dark">Last 7 days Impressions</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center b-0">
                                                <h3><b><?php echo $imp_month; ?></b></h3>
                                                <h4 class="text-dark">This month Impressions</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card-box widget-inline">
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="widget-inline-box text-center">
                                                <h3><b><?php echo $imp_total; ?></b></h3>
                                                <h4 class="text-dark">Total Impressions</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="card-box widget-inline">
                                    <span class="m-l-15 text-info">Clicks</span> <i class="md md-info-outline" style="font-size:20px;"></i>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><b><?php echo $click_today; ?></b></h3>
                                                <h4 class="text-dark">Today Clicks</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><b><?php echo $click_yesterday; ?></b></h3>
                                                <h4 class="text-dark">Yesterday Clicks</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><b><?php echo $click_week; ?></b></h3>
                                                <h4 class="text-dark">Last 7 days Clicks</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center b-0">
                                                <h3><b><?php echo $click_month; ?></b></h3>
                                                <h4 class="text-dark">This month Clicks</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card-box widget-inline">
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="widget-inline-box text-center">
                                                <h3><b><?php echo $click_total; ?></b></h3>
                                                <h4 class="text-dark">Total Clicks</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="card-box widget-inline">
                                    <span class="m-l-15 text-info">Impressions Earnings</span> <i class="md md-info-outline" style="font-size:20px;"></i>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $i_earning_today; ?></b></h3>
                                                <h4 class="text-dark">Today<br/>Impressions Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $i_earning_yesterday; ?></b></h3>
                                                <h4 class="text-dark">Yesterday<br/>Impressions Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $i_earning_week; ?></b></h3>
                                                <h4 class="text-dark">Last 7 days<br/>Impressions Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center b-0">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $i_earning_month; ?></b></h3>
                                                <h4 class="text-dark">This Month<br/>Impressions Earnings</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card-box widget-inline">
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $i_earning_total; ?></b></h3>
                                                <h4 class="text-dark">Total<br/>Impressions Earnings</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="card-box widget-inline">
                                    <span class="m-l-15 text-info">Clicks Earnings</span> <i class="md md-info-outline" style="font-size:20px;"></i>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_earning_today; ?></b></h3>
                                                <h4 class="text-dark">Today<br/>Clicks Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_earning_yesterday; ?></b></h3>
                                                <h4 class="text-dark">Yesterday<br/>Clicks Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_earning_week; ?></b></h3>
                                                <h4 class="text-dark">Last 7 days<br/>Clicks Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center b-0">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_earning_month; ?></b></h3>
                                                <h4 class="text-dark">This Month<br/>Clicks Earnings</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card-box widget-inline">
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_earning_total; ?></b></h3>
                                                <h4 class="text-dark">Total<br/>Clicks Earnings</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-9">
                                <div class="card-box widget-inline">
                                        <span class="m-l-15 text-info">Total Earnings</span> <i class="md md-info-outline" style="font-size:20px;"></i>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_i_earning_today; ?></b></h3>
                                                <h4 class="text-dark">Today<br/>Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_i_earning_yesterday; ?></b></h3>
                                                <h4 class="text-dark">Yesterday<br/>Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_i_earning_week; ?></b></h3>
                                                <h4 class="text-dark">Last 7 days<br/>Earnings</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center b-0">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_i_earning_month; ?></b></h3>
                                                <h4 class="text-dark">This Month<br/>Earnings</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card-box widget-inline">
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="widget-inline-box text-center">
                                                <h3><i class="text-primary fa fa-inr" style="font-size:21px;"></i> <b><?php echo $c_i_earning_total; ?></b></h3>
                                                <h4 class="text-dark">Total<br/>Earnings</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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