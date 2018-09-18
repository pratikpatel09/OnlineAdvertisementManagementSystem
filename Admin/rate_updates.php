<!DOCTYPE html>
<?php session_start();
 include_once 'conn.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="AdWale">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>Rate Updates | AdWale</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
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
    if ($_SESSION['ses_alogid'] == null) {
        header('location: admin_login.php');
    }
    ?>
    
    <body class="fixed-left">


        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'admin_header.php'; ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="text-muted menu-title">Hello, <?php echo $_SESSION['ses_alogid']; ?></li>

                            <li>
                                <a href="admin_index.php" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ion-settings"></i> <span> Manage Users </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="advertiser_manage.php">Advertiser</a></li>
                                    <li><a href="publisher_manage.php">Publisher</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="a_feedback.php" class="waves-effect"><i class="md-chat"></i> <span> View Feedback </span> </a>
                            </li>
                            <li>
                                <a href="rate_updates.php" class="waves-effect active"><i class="fa fa-inr"></i> <span> Update rates </span> </a>
                            </li>
                            <li>
                                <a href="offers.php" class="waves-effect"><i class="md-local-offer"></i> <span> Offers </span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-description"></i> <span> Reports </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="report_advertisement.php">Advertisements</a></li>
                                    <li><a href="report_websites.php">Websites</a></li>
                                    <li><a href="report_offers.php">Offers</a></li>
                                </ul>
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
                                <h4 class="page-title">Rate Update</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li>Rate Updates</li>
                                </ol>
                            </div>
                        </div>
                        
                        <?php
                            $flag=true;
                            $cr_err1="";
                            $cr_err2="";
                            $cr_err3="";
                            $cr_err4="";

                            if(isset($_POST['btnupdate']))
                            {
                                if($_POST['txt_per_imp_cost']=="")
                                {
                                    $cr_err1="Please enter impression cost!";
                                    $flag=false;
                                }
                                if($_POST['txt_per_imp_rate']=="")
                                {
                                    $cr_err2="Please enter impression rate!";
                                    $flag=false;
                                }
                                if($_POST['txt_per_click_cost']=="")
                                {
                                    $cr_err3="Please enter click cost!";
                                    $flag=false;
                                }
                                if($_POST['txt_per_click_rate']=="")
                                {
                                    $cr_err4="Please enter click rate!";
                                    $flag=false;
                                }
                                if(ctype_alpha($_POST['txt_per_imp_cost']) || ctype_alpha($_POST['txt_per_imp_rate']) || ctype_alpha($_POST['txt_per_click_cost']) || ctype_alpha($_POST['txt_per_click_rate']))
                                {
                                    echo "<div class='alert alert-danger alert-dismissable fade in'>
                                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Warning:<br/>
                                            Not allow Alphabet values!</strong>                            
                                    </div>";
                                }

                                if($flag==true)
                                {
                                    $query_update=$mysqli->query("UPDATE rate_updates SET rate_status='deactive' WHERE rate_status='active'");
                                    $query=$mysqli->query("insert into rate_updates (per_click_cost,per_impression_cost,per_click_rate,per_impression_rate,rate_status) values('".$_POST['txt_per_click_cost']."','".$_POST['txt_per_imp_cost']."','".$_POST['txt_per_click_rate']."','".$_POST['txt_per_imp_rate']."','active')");
                                    if($query==true)
                                    {
                                        echo "<div class='alert alert-success alert-dismissable fade in'>
                                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Success:<br/>
                                            Rates and Costs successfully changed...</strong>                            
                                    </div>";
                                    }
                                }
                                
                            }
                        ?>
                        
                        <?php
                            $per_imp_cost=0;
                            $per_imp_rate=0;
                            $per_click_cost=0;
                            $per_click_rate=0;
                            $result=$mysqli->query("SELECT * FROM rate_updates WHERE rate_status='active'");
                            while($row=$result->fetch_assoc())
                            {
                                $per_imp_cost=$row['per_impression_cost'];
                                $per_imp_rate=$row['per_impression_rate'];
                                $per_click_cost=$row['per_click_cost'];
                                $per_click_rate=$row['per_click_rate'];
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box" style="border-top:3px solid #5fbeaa;">
                                    <h4 class="m-t-0 m-b-30 header-title"><b>Current Advertisement Costs & Rates</b></h4>
                                    <hr/>
                                    <div class="row text-center">
                                        <div class="col-sm-3">
                                            <h3><i class="text-custom fa fa-inr" style="font-size:21px;"></i> <b><?php echo $per_imp_cost; ?></b></h3>
                                            <strong>Per Impression Cost</strong>
                                        </div>
                                        <div class="col-sm-3">
                                            <h3><i class="text-custom fa fa-inr" style="font-size:21px;"></i> <b><?php echo $per_imp_rate; ?></b></h3>
                                            <strong>Per Impression Rate</strong>
                                        </div>
                                        <div class="col-sm-3">
                                            <h3><i class="text-custom fa fa-inr" style="font-size:21px;"></i> <b><?php echo $per_click_cost; ?></b></h3>
                                            <strong>Per Click Cost</strong>
                                        </div>
                                        <div class="col-sm-3">
                                            <h3><i class="text-custom fa fa-inr" style="font-size:21px;"></i> <b><?php echo $per_click_rate; ?></b></h3>
                                            <strong>Per Click Rate</strong>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <hr/>
                                    <div class="row text-center">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <h4 class="m-t-0 m-b-30 header-title"><b>Update Advertisement Costs & Rates</b></h4>
                                    
                                    <form method="post">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <strong class="m-l-5">Per Impression Cost:</strong><br/>
                                            <div class="form-group">
                                                <input type="input" name="txt_per_imp_cost" style="width:150px;" class="form-control" placeholder="0.00" value="<?php echo @$_POST['txt_per_imp_cost']; ?>" tabindex="1"/>
                                                <span class="text-danger"><?php echo $cr_err1; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <strong class="m-l-5">Per Impression Rate:</strong><br/>
                                            <div class="form-group">
                                                <input type="input" name="txt_per_imp_rate" style="width:150px;" class="form-control" placeholder="0.00" value="<?php echo @$_POST['txt_per_imp_rate']; ?>" tabindex="2"/>
                                                <span class="text-danger"><?php echo $cr_err2; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <strong class="m-l-5">Per Click Cost:</strong><br/>
                                            <div class="form-group">
                                                <input type="input" name="txt_per_click_cost" style="width:150px;" class="form-control" placeholder="0.00" value="<?php echo @$_POST['txt_per_click_cost']; ?>" tabindex="3"/>
                                                <span class="text-danger"><?php echo $cr_err3; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <strong class="m-l-5">Per Click Rate:</strong><br/>
                                            <div class="form-group">
                                                <input type="input" name="txt_per_click_rate" style="width:150px;" class="form-control" placeholder="0.00" value="<?php echo @$_POST['txt_per_click_rate']; ?>" tabindex="4"/>
                                                <span class="text-danger"><?php echo $cr_err4; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                                <button type="submit" name="btnupdate" class="btn btn-success waves-effect waves-light" tabindex="5">
                                                       <span class="btn-label"><i class="fa fa-check"></i>
                                                       </span>Update</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- end row -->

                    

                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                2018 © AdWale.
            </footer>

        </div>

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

    <script src="../assets/plugins/peity/jquery.peity.min.js"></script>

    <!-- jQuery  -->
    <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>



    <script src="../assets/plugins/morris/morris.min.js"></script>
    <script src="../assets/plugins/raphael/raphael-min.js"></script>

    <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>

    <script src="../assets/pages/jquery.dashboard.js"></script>

    <script src="../assets/js/jquery.core.js"></script>
    <script src="../assets/js/jquery.app.js"></script>




</body>
</html>