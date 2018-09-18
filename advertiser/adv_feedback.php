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

        <title>Feedback | AdWale</title>

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
                                <a href="adv_index.php" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> </a>
                            </li>
                            <li>
                                <a href="created_ads.php" class="waves-effect"><i class="md-add-box"></i> <span> Create Ads </span> </a>
                            </li>
                            <li>
                                <a href="adv_feedback.php" class="waves-effect active"><i class="md-announcement"></i> <span> Feedback </span> </a>
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
                                <h4 class="page-title">Feedback</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li class="active">Feedbacks</li>
                                </ol>
                            </div>
                        </div>

                        <?php
                        $errfeed1 = "";
                        $errfeedcolor1 = "";
                        $cur_date = date("Y-m-d");
                        if (isset($_POST['btnfsub'])) {
                            $flag = true;

                            if ($_POST['txtfeedback'] == "") {
                                $errfeed1 = "Please enter any Message!";
                                $errfeedcolor1 = "text-danger";
                                $flag = false;
                            }
                            if ($flag == true) {
                                $query = $mysqli->query("INSERT INTO feedback (email,comment,date,status) values('" . $_SESSION['ses_logid'] . "','" . $_POST['txtfeedback'] . "','" . $cur_date . "','pending')");
                                if ($query == true) {
                                    $errfeed1 = "Feedback successfully submited...";
                                    $errfeedcolor1 = "text-success";
                                } else {
                                    echo "<script>alert('Feedback not submitted, Please try again!!!');</script>";
                                }
                            }
                        }
                        ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Feedback</b></h4>
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <form method="post">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label m-t-10">Email Id:</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control-static"><?php echo $_SESSION['ses_logid']; ?></p>
                                                    </div>
                                                </div>
                                                <br/><br/>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Message:</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="txtfeedback" rows="5" placeholder="Enter Message Here..."></textarea>
                                                        <span class="<?php if ($errfeedcolor1 == "text-danger") {
                            echo $errfeedcolor1;
                        } else if ($errfeedcolor1 == "text-success") {
                            echo $errfeedcolor1;
                        } ?>"><?php echo $errfeed1; ?></span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="col-sm-2"></div>
                                                    <div class="col-sm-10">
                                                        <br/>
                                                        <button type="submit" name="btnfsub" class="btn btn-primary"><span class="ion ion-paper-airplane"></span> Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-5">
                                            <p class="form-control-static text-right"><?php echo $cur_date; ?></p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box" style="border-top:3px solid #4c5667; background-color: #cccccc;">
                                    <h4 class="m-t-0 header-title"><b>Your Feedback List</b></h4>
                                    <div class="row">
                                        <?php
                                        $result = $mysqli->query("SELECT * FROM feedback WHERE email='" . $_SESSION['ses_logid'] . "' ORDER BY f_id DESC");
                                        if ($result == true) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<div class="row p-l-r-10">
                                    <div class="card-box m-b-10">
                                        <div class="table-box opport-box">
                                            <div class="col-sm-1">
                                                
                                            </div>
                                            <div class="col-sm-8">
                                                <div>
                                                    <div>
                                                        <div style="border:1px solid #F2F3F4; border-radius: 4%; padding:5px; background-color:#F8F9F9;">
                                                            <span>' . $row['comment'] . '</span>
                                                        </div>  
                                                    </div>
                                                    <div class="row m-t-10">
                                                        <div class="col-sm-6">
                                                            <div class="table-detail">
                                                                <p class="text-dark m-b-5"><b>Date: </b> <span class="text-muted">' . $row['date'] . '</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="table-detail">
                                                                <p class="text-dark m-b-0"><b>Status:</b> <span class="text-muted">' . $row['status'] . '</span></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="table-detail lable-detail" style="padding-top:34px;">
                                            <span class="label '. ($row['status']=='pending' ? 'label-info' : '').''.($row['status']=='accept' ? 'label-success' : '').''.($row['status']=='reject' ? 'label-danger' : '').'">' . $row['status'] . '</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                            }
                                        }
                                        ?>
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