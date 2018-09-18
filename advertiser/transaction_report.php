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

        <title>Transactions | AdWale</title>

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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Transactions</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li class="active">Transactions</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4 class="m-t-0 header-title"><b>Your Transactions</b></h4>
                                            <p class="text-muted font-13">
                                            </p>
                                            <div class="p-20">
                                                <table class="table table table-hover m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Paid Amount</th>
                                                            <th>Payment Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $result = $mysqli->query("SELECT * FROM advertiser_transaction WHERE u_email='" . $_SESSION['ses_logid'] . "' ORDER BY payment_date DESC");
                                                        if ($result == true) {
                                                            $i = 0;
                                                            while ($row = $result->fetch_assoc()) {
                                                                $i = $i + 1;
                                                                echo "<tr>
                                                                        <th scope='row'>" . $i . "</th>
                                                                        <td>" . $row['paid_amount']. "</td>
                                                                        <td>" . $row['payment_date']. "</td>";
                                                            }
                                                        } else {
                                                            echo "<script>alert('Record not Display!');</script>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="min-height: 1000px;"></div>



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
        <script type="text/javascript">
            $(document).ready(function(){
                $(".btnclose").click(function(){
                    var element = $(this);
                    var btnid=element.attr("id");
                    var info = 'site_id='+btnid;
                    alert(info);
                    if(confirm("Are you sure want to delete your size?"))
                    {
                        $.ajax({
                            url: 'AJAX_website.php',
                            type: 'post',
                            data: info,
                            success: function(){
                                
                            }
                        });
                        $(this).parent().parent().parent().fadeOut(300, function(){
                           $(this).remove(); 
                        });
                    };
                    return false();
                });
            });
        </script>
        

    </body>
</html>