<!DOCTYPE html>
<?php
session_start();
include_once 'conn.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="AdWale">
        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>Manage Publisher - Admin | AdWale</title>

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
                $(".user_close").click(function () {
                    var element = $(this);
                    var userclose_id = element.attr("id");
                    var info = 'user_id=' + userclose_id;
                    alert(info);
                    if (confirm("Are you sure want to delete?")) {
                        $.ajax({
                            url: 'AJAX_user_delete.php',
                            type: 'post',
                            data: info,
                            success: function () {
                                var $count = $(".counter");
                                var b = $count.html();
                                b--;
                                $count.html(b);
                            }
                        });
                        $(this).parent().parent().fadeOut(300, function () {
                            $(this).remove();
                        });
                    }
                    ;
                    return false;
                });
            });
        </script>
        <style>
            .i-hide{display: none;}
        </style>
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
                                <a href="#" class="waves-effect active"><i class="ion-settings"></i> <span> Manage Users </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="advertiser_manage.php">Advertiser</a></li>
                                    <li class="active"><a href="publisher_manage.php">Publisher</a></li>
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
                                <h4 class="page-title">Publishers</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li class="active">Manage Users</li>
                                    <li class="active">Publisher</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <form role="form">
                                                <!--<div class="form-group contact-search m-b-30">
                                                    <input type="text" id="search" class="form-control" placeholder="Search...">
                                                    <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                                                </div>--> <!-- form-group -->
                                            </form>
                                        </div>
                                        <!--<div class="col-sm-4">
                                            <a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal" 
                                               data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add Contact</a>
                                        </div>-->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover mails m-0 table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <!--<div class="checkbox checkbox-primary checkbox-single m-r-15">
                                                            <input id="action-checkbox" type="checkbox">
                                                            <label for="action-checkbox"></label>
                                                        </div>-->#
                                                        <!--<div class="btn-group dropdown">
                                                            <button type="button" class="btn btn-white btn-xs dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="caret"></i></button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">Action</a></li>
                                                                <li><a href="#">Another action</a></li>
                                                                <li><a href="#">Something else here</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">Separated link</a></li>
                                                            </ul>
                                                        </div>-->
                                                    </th>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact no.</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                if (isset($_POST['iconbtndel'])) {
                                                    $query = "delete from user_master where u_email='" . $_POST['iconbtndel'] . "'";
                                                    $result = $mysqli->query($query);
                                                    if ($result == true) {
                                                        echo "Row deleted Successfully..!";
                                                    } else
                                                        echo "Deletion fail...!";
                                                }
                                                ?>

                                                <?php
                                                $rowcount1 = "";
                                                $query2 = "SELECT u_type from user_master where u_type='publisher'";
                                                if ($result = mysqli_query($mysqli, $query2)) {
                                                    $rowcount1 = mysqli_num_rows($result);
                                                    mysqli_free_result($result);
                                                }
                                                ?>

                                                <?php
                                                $query = "select u_firstname,u_lastname,u_email,u_contact_no from user_master where u_type='publisher'";
                                                $result = $mysqli->query($query);
                                                if ($result == true) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                                    <td>
                                                        <div class='checkbox checkbox-primary m-r-15'>
                                                            <input id='checkbox2' type='checkbox'>
                                                            <label for='checkbox2'></label>
                                                        </div>
                                                    </td>
                                                        <td>
                                                        <img src='../assets/images/icon/profile_avatar.png' alt='contact-img' title='contact-img' class='img-circle thumb-sm' />
                                                    </td>

                                                    <td>
                                                        " . $row['u_firstname'] . " " . $row['u_lastname'] . "
                                                    </td>

                                                    <td>
                                                        <a href='#'>" . $row['u_email'] . "</a>
                                                </td>

                                                <td>
                                                " . $row['u_contact_no'] . "
                                                </td>
                                                <td>
                                                  <a href='' id='" . $row['u_email'] . "' class='table-action-btn user_close'><i class='md md-close'></i></a>
                                                </td>
                                                </tr>";
                                                    }
                                                    //<form method='post'><button class='md md-edit' name='iconbtnedit' value='" . $row['u_email'] . "' style='background-color: transparent; border:none; font-size:19px;'></button><button class='md md-close' name='iconbtndel' value='" . $row['u_email'] . "' style='background-color: transparent; border:none;  font-size:19px;'></button></form>  
                                                } else {
                                                    echo "Error : Fetch Data in Database!";
                                                }
                                                ?>





                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div> <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <div class="contact-card">
                                        <a class="pull-left" href="#">
                                            <img class = "img-circle " src = "../assets/images/icon/profile_avatar.png" alt = "">
                                        </a>
                                        <div class = "member-info">
                                            <p class = "text-dark text-shadow" style="font-size: 24px;"><b class="counter"><?php echo $rowcount1; ?></b></p>
                                            <h4 class = "m-t-0 m-b-5 header-title text-muted"><b>Total Publishers</b></h4>

                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>





                    </div> <!--container -->

                </div> <!--content -->

                <footer class = "footer text-right">
                    2018 © AdWale.
                </footer>

            </div>
        </div>
        <!--END wrapper -->

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

        <!-- jQuery  -->
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script type="text/javascript">
            $(document).ready(function ($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>
        

    </body>
</html>

