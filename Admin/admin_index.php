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

        <title>Admin Dashboard | AdWale</title>

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
        <?php
        $rowcount1 = "";
        $rowcount2 = "";
        $rowcount3 = "";
        $rowcount4 = "";
        $query1 = "SELECT u_type from user_master where u_type='advertiser'";
        if ($result = mysqli_query($mysqli, $query1)) {
            $rowcount1 = mysqli_num_rows($result);
            mysqli_free_result($result);
        }

        $query2 = "SELECT u_type from user_master where u_type='publisher'";
        if ($result = mysqli_query($mysqli, $query2)) {
            $rowcount2 = mysqli_num_rows($result);
            mysqli_free_result($result);
        }

        $query3 = "SELECT advertisement_id from advertisement";
        if ($result = mysqli_query($mysqli, $query3)) {
            $rowcount3 = mysqli_num_rows($result);
            mysqli_free_result($result);
        }
        
        $query4 = "SELECT website_id from website";
        if ($result = mysqli_query($mysqli, $query4)) {
            $rowcount4 = mysqli_num_rows($result);
            mysqli_free_result($result);
        }
        
        ?>

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
                                <a href="admin_index.php" class="waves-effect active"><i class="ti-home"></i> <span> Dashboard </span></a>
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
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to AdWale admin panel !</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-purple pull-left">
                                        <i class="md md-perm-identity text-purple"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $rowcount1; ?></b></h3>
                                        <p class="text-muted">Total Advertisers</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-primary pull-left">
                                        <i class="md  md-account-child text-primary"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $rowcount2; ?></b></h3>
                                        <p class="text-muted">Total Publishers</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-inverse pull-left">
                                        <i class="md  md-dashboard text-inverse"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $rowcount3; ?></b></h3>
                                        <p class="text-muted">Total Advertisements</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                        <div class="bg-icon bg-icon-success pull-left">
                                            <i class="md  md-description text-success"></i>
                                        </div>
                                        <div class="text-right">
                                            <h3 class="text-dark"><b class="counter"><?php echo $rowcount4; ?></b></h3>
                                            <p class="text-muted">Total Websites</p>
                                        </div>
                                        <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-12">
                        		<div class="card-box">
                        			<div class="row">
                                                    <h4 class="header-title m-l-10">New Users</h4>
			                        </div>
			                        
                        			<div class="table-responsive">
                                        <table class="table table-hover mails m-0 table table-actions-bar">
                                        	<thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Contact No.</th>
                                                        <th>User Type</th>
                                                    </tr>
                                                </thead>				
                                            <tbody>
                                                <?php
                                                $myqry="select * from user_master ORDER BY u_email ASC LIMIT 5";
                                                    $result= $mysqli->query($myqry);
                                                    while($row=$result->fetch_assoc())
                                                    {
                                                        echo '<tr>
                                                    <td>                                                       
                                                        <img src="../icons/profile_pic.png" alt="contact-img" title="contact-img" class="img-circle thumb-sm" />
                                                    </td>
                                                    <td>
                                                        '.$row['u_firstname']." ".$row['u_lastname'].'
                                                    </td>
                                                    <td>
                                                        <a href="#">'.$row['u_email'].'</a>
                                                    </td>
                                                    <td>
                                                        '.$row['u_contact_no'].'
                                                    </td>
                                                    <td>
                                                    	'.$row['u_type'].'
                                                    </td>
                                                </tr>';
                                                    }
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                        		</div>
                                
                            </div> <!-- end col -->

                            
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


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<!-- Right Sidebar -->
<!--<div class="side-bar right-bar nicescroll">
    <h4 class="text-center">Chat</h4>
    <div class="contact-list nicescroll">
        <ul class="list-group contacts-list">
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-1.jpg" alt="">
                    </div>
                    <span class="name">Chadengle</span>
                    <i class="fa fa-circle online"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-2.jpg" alt="">
                    </div>
                    <span class="name">Tomaslau</span>
                    <i class="fa fa-circle online"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-3.jpg" alt="">
                    </div>
                    <span class="name">Stillnotdavid</span>
                    <i class="fa fa-circle online"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-4.jpg" alt="">
                    </div>
                    <span class="name">Kurafire</span>
                    <i class="fa fa-circle online"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-5.jpg" alt="">
                    </div>
                    <span class="name">Shahedk</span>
                    <i class="fa fa-circle away"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-6.jpg" alt="">
                    </div>
                    <span class="name">Adhamdannaway</span>
                    <i class="fa fa-circle away"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-7.jpg" alt="">
                    </div>
                    <span class="name">Ok</span>
                    <i class="fa fa-circle away"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-8.jpg" alt="">
                    </div>
                    <span class="name">Arashasghari</span>
                    <i class="fa fa-circle offline"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-9.jpg" alt="">
                    </div>
                    <span class="name">Joshaustin</span>
                    <i class="fa fa-circle offline"></i>
                </a>
                <span class="clearfix"></span>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <div class="avatar">
                        <img src="../assets/images/users/avatar-10.jpg" alt="">
                    </div>
                    <span class="name">Sortino</span>
                    <i class="fa fa-circle offline"></i>
                </a>
                <span class="clearfix"></span>
            </li>
        </ul>
    </div>
</div>-->
<!-- /Right-bar -->

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