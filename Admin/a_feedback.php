<!DOCTYPE html>
<?php
session_start();
include_once 'conn.php';

error_reporting(E_ALL & ~E_NOTICE);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="AdWale">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>View Feedback - AdWale</title>

        <link href="../assets/plugins/c3/c3.min.css" rel="stylesheet" type="text/css"  />

        <link href="../assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">

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
        <script src="../assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $(".feed_pending_close").click(function () {
                    var element = $(this);
                    var element_i = $(".btnstatus");
                    var feeddel_id = element.attr("id");
                    var feeddel_status = element_i.attr("id");
                    var info = 'feed_id' + feeddel_status;
                    var infostatus = 'feed_status=' + feeddel_status;
                    alert(info + " " + infostatus);
                    if (confirm("Are you sure want to delete?")) {
                        $.ajax({
                            url: 'AJAX_feedback_query.php',
                            type: 'post',
                            data: {infoid: feeddel_id, infost: feeddel_status},
                            success: function () {
                                var $count = $(".counter");
                                var b = $count.html();
                                b--;
                                $count.html(b);
                            }
                        });
                        $(this).parent().parent().parent().parent().parent().fadeOut(300, function () {
                            $(this).remove();
                        });
                    }
                    ;
                    return false;
                });
                $(".feed_close").click(function () {
                    var element = $(this);
                    var element_i = $(".btnstatus");
                    var feeddel_id = element.attr("id");
                    var feeddel_status = element_i.attr("id");
                    var info = 'feed_id=' + feeddel_id;
                    var infostatus = 'feed_status=' + feeddel_status;
                    alert(info + " " + infostatus);
                    if (confirm("Are you sure want to delete?")) {
                        $.ajax({
                            url: 'AJAX_feedback_query.php',
                            type: 'post',
                            data: {infoid: feeddel_id, infost: feeddel_status},
                            success: function () {
                                var $count = $(".counter");
                                var b = $count.html();
                                b--;
                                $count.html(b);
                            }
                        });
                        $(this).parent().parent().parent().parent().parent().fadeOut(300, function () {
                            $(this).remove();
                        });
                    }
                    ;
                    return false;
                });

                $(".ddlstatus").change(function () {
                    //var element = $(this);

                    var fb_id = $(this).attr("id");
                    var fb_status = "thistrue";
                    var fb_ddlstatusvalue = $("#"+fb_id).val();

                    var feeddel_id = "";
                    var feeddel_status = "";
                    alert(fb_id+"\n"+fb_ddlstatusvalue);
                        $.ajax({
                            url: 'AJAX_feedback_query.php',
                            type: 'post',
                            data: {ff_id: fb_id, ff_ddlstatusval: fb_ddlstatusvalue, ff_status: fb_status, infoid: feeddel_id, infost: feeddel_status},
                            success: function () {
                                var $count = $(".counter");
                                var b = $count.html();
                                b--;
                                $count.html(b);
                            }
                        });
                        $(this).parent().parent().parent().parent().parent().fadeOut(300, function () {
                            $(this).remove();
                        });
                    return false;
                });
            });
        </script>
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
                                <a href="a_feedback.php" class="waves-effect active"><i class="md-chat"></i> <span> View Feedback </span> </a>
                            </li>
                            <li>
                                <a href="rate_updates.php" class="waves-effect"><i class="fa fa-inr"></i> <span> Update rates </span> </a>
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
                                <h4 class="page-title">Feedback</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li>View Feedback</li>
                                </ol>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <form role="form">
                                    <div class="form-group contact-search m-b-30">
                                        <input type="text" id="search" class="form-control" disabled="yes">
                                        <!--<button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>-->
                                    </div> <!-- form-group -->
                                </form>
                            </div>
                            <div class="col-md-6">
                                <!--<a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right" data-animation="fadein" data-plugin="custommodal" 
                                   data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add New</a>-->
                                <div class="h5 m-0"> 
                                    <span class="vertical-middle">Sort By:</span> 
                                    <div class="btn-group vertical-middle">
                                        <label class="btn btn-white btn-md waves-effect <?php
                                        if ($_REQUEST['stype'] == "pending") {
                                            echo "active";
                                        } if ($_REQUEST['stype'] == null) {
                                            echo "active";
                                        }
                                        ?>">
                                            <a href="?stype=pending">Pending</a>
                                        </label>
                                        <label class="btn btn-white btn-md waves-effect <?php if ($_REQUEST['stype'] == "accepted") echo "active"; ?>">
                                            <a href="?stype=accepted">Accepted</a>
                                        </label>
                                        <label class="btn btn-white btn-md waves-effect <?php if ($_REQUEST['stype'] == "trash") echo "active"; ?>">
                                            <a href="?stype=trash">Trash</a>
                                        </label>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--Drop Down list codes START-->
                        <?php
                        /* if (isset($_POST['btntrashremove'])) {
                          $query = "delete from feedback where email='".$_POST['btntrashremove']."'";
                          $result = $mysqli->query($query);
                          if ($result == true) {
                          echo "Row deleted Successfully..!";
                          // header("Refresh: 1 ; url=$page");
                          } else
                          echo "Deletion fail...!";
                          } */
                        ?>
                        <!--Drop Down list codes END-->

                        <div class="row">
                            <div class="col-lg-8">

                                <?php
                                if ($_REQUEST['stype'] == "pending") {

                                    //Counter start
                                    $rowcount1 = "";
                                    $rowlabel = "Pending";
                                    $query2 = "SELECT status FROM feedback WHERE status='pending'";
                                    if ($counter_result = mysqli_query($mysqli, $query2)) {
                                        $rowcount1 = mysqli_num_rows($counter_result);
                                        mysqli_free_result($counter_result);
                                    }
                                    //Counter end

                                    $query = "select f_id,email,comment,date,status from feedback where status='pending'";
                                    $result = $mysqli->query($query);
                                    if ($result == true) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="row p-l-r-10">
                                    <div class="card-box m-b-10">
                                        <div class="table-box opport-box">
                                            <div class="col-sm-1">
                                                <div class="table-detail checkbx-detail">
                                                    <div class="checkbox checkbox-primary m-r-15" style="padding-top:34px;>
                                                        <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div>
                                                    <div>
                                                        <h4 class="m-t-0"><b>' . $row['email'] . '</b></h4>
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
                                                    <select class="btn btn-info btn-sm ddlstatus" name="ddlstatus" id="' . $row['f_id'] . '">
                                                        <option style="background-color:#FFF; color:#000;">pending</option>
                                                        <option value="accept" style="background-color:#FFF; color:#000;">accept</option>
                                                        <option value="reject" style="background-color:#FFF; color:#000;">reject</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="table-actions-bar">
                                                    <a href="" id=' . $row['f_id'] . ' class="table-action-btn feed_pending_close" style="right:10; margin-left: 14px;"><i id=' . $row['status'] . ' class="md md-close m-l-10 btnstatus"></i></a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>';
                                        }
                                        $mysqli->close();
                                    }
                                } else if ($_REQUEST['stype'] == "accepted") {

                                    //Counter start
                                    $rowcount1 = "";
                                    $rowlabel = "Accepted";
                                    $query2 = "SELECT status from feedback where status='accept'";
                                    if ($counter_result = mysqli_query($mysqli, $query2)) {
                                        $rowcount1 = mysqli_num_rows($counter_result);
                                        mysqli_free_result($counter_result);
                                    }
                                    //Counter end

                                    $query = "select f_id,email,comment,date,status from feedback where status='accept'";
                                    $result = $mysqli->query($query);
                                    if ($result == true) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="row p-l-r-10">
                                    <div class="card-box m-b-10">
                                        <div class="table-box opport-box">
                                            <div class="col-sm-1">
                                                <div class="table-detail checkbx-detail">
                                                    <div class="checkbox checkbox-primary m-r-15" style="padding-top:34px;>
                                                        <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div>
                                                    <div>
                                                        <h4 class="m-t-0"><b>' . $row['email'] . '</b></h4>
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
                                                    <span class="label label-success">' . $row['status'] . '</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="table-actions-bar">
                                                    <a href="" id=' . $row['f_id'] . ' class="table-action-btn feed_pending_close" style="right:10; margin-left: 14px;"><i id=' . $row['status'] . ' class="md md-close m-l-10 btnstatus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                        }
                                        $mysqli->close();
                                    }
                                } else if ($_REQUEST['stype'] == "trash") {

                                    //Counter start
                                    $rowcount1 = "";
                                    $rowlabel = "Rejected";
                                    $query2 = "SELECT status from feedback where status='reject'";
                                    if ($counter_result = mysqli_query($mysqli, $query2)) {
                                        $rowcount1 = mysqli_num_rows($counter_result);
                                        mysqli_free_result($counter_result);
                                    }
                                    //Counter end

                                    $query = "select f_id,email,comment,date,status from feedback where status='reject'";
                                    $result = $mysqli->query($query);
                                    if ($result == true) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="row p-l-r-10">
                                    <div class="card-box m-b-10">
                                        <div class="table-box opport-box">
                                            <div class="col-sm-1">
                                                <div class="table-detail checkbx-detail">
                                                    <div class="checkbox checkbox-primary m-r-15" style="padding-top:34px;>
                                                        <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div>
                                                    <div>
                                                        <h4 class="m-t-0"><b>' . $row['email'] . '</b></h4>
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
                                                    <span class="label label-danger">' . $row['status'] . '</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="table-actions-bar">
                                                    <a href="" id=' . $row['f_id'] . ' class="table-action-btn feed_close" style="right:10; margin-left: 14px;"><i id=' . $row['status'] . ' class="md md-close m-l-10 btnstatus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                        }
                                        $mysqli->close();
                                        //<form method="post"><button class="table-action-btn md md-close m-l-10" style="right:10; margin-left: 14px; background-color:transparent; border:none;" name="btntrashremove" value="'.$row['email'].'"></button></form>
                                    }
                                } else {

                                    //Counter start
                                    $rowcount1 = "";
                                    $rowlabel = "Pending";
                                    $query2 = "SELECT status from feedback where status='pending'";
                                    if ($counter_result = mysqli_query($mysqli, $query2)) {
                                        $rowcount1 = mysqli_num_rows($counter_result);
                                        mysqli_free_result($counter_result);
                                    }
                                    //Counter end

                                    $query = "select f_id,email,comment,date,status from feedback where status='pending'";
                                    $result = $mysqli->query($query);
                                    if ($result == true) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="row p-l-r-10">
                                    <div class="card-box m-b-10">
                                        <div class="table-box opport-box">
                                            <div class="col-sm-1">
                                                <div class="table-detail checkbx-detail">
                                                    <div class="checkbox checkbox-primary m-r-15" style="padding-top:34px;>
                                                        <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div>
                                                    <div>
                                                        <h4 class="m-t-0"><b>' . $row['email'] . '</b></h4>
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
                                                    <select class="btn btn-info btn-sm ddlstatus" name="ddlstatus" id="' . $row['f_id'] . '">
                                                        <option style="background-color:#FFF; color:#000;">pending</option>
                                                        <option value="accept" style="background-color:#FFF; color:#000;">accept</option>
                                                        <option value="reject" style="background-color:#FFF; color:#000;">reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="table-actions-bar">
                                                    <a href="" id=' . $row['f_id'] . ' class="table-action-btn feed_pending_close" style="right:10; margin-left: 14px;"><i id=' . $row['status'] . ' class="md md-close m-l-10 btnstatus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                        }
                                        $mysqli->close();
                                    }
                                }
                                ?>


                            </div> <!-- end col -->

                            <div class="col-lg-4">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <h4 class="font-bold m-t-0 m-b-20 text-dark">Feedback Counts</h4>
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-rate-review text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $rowcount1; ?></b></h3>
                                        <p class="text-muted"><?php echo "Total ".$rowlabel; ?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>





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


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

        <!-- Modal-Effect -->
        <script src="../assets/plugins/custombox/dist/custombox.min.js"></script>
        <script src="../assets/plugins/custombox/dist/legacy.min.js"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="../assets/plugins/d3/d3.min.js"></script>
        <script type="text/javascript" src="../assets/plugins/c3/c3.min.js"></script>

        <!-- jQuery  -->
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script type="text/javascript" src="../assets/pages/jquery.opportunities.init.js"></script>



        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>



    </body>
</html>