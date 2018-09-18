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

<?php
            $flag = true;
            $rankerr="";
            $werr1="";
            $werr2="";
            $werr3="";
            if (isset($_POST['btnsave'])) {
                if ($_POST['txttitle'] == "") {
                    $werr1="please enter Website Title";
                    $flag = false;
                }
                if ($_POST['txturl'] == "") {
                    $werr2="please enter Website Url";
                    $flag = false;
                }                    
                if ($_POST['txtcate'] == "") {
                    $werr3="please select Website Category";
                    $flag = false;
                }
                if ($flag == true) {
                    //Start Alexa Rank Finding Demo
                    $url=$_POST['txturl'];
                    $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url='.$url);
                    $rank=isset($xml->SD[1]->POPULARITY)?$xml->SD[1]->POPULARITY->attributes()->TEXT:0;
                    $web=(string)$xml->SD[0]->attributes()->HOST;
                    //echo $web." has Alexa Rank ".$rank;
                    //End Alexa Rank Finding Demo
                    
                    if($rank == 0)
                    {
                        $rankerr="<div class='alert alert-danger alert-dismissable fade in'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Sorry, Your website is not eligible.<br/>
                                Based on Alexa Rank your website rank is 0,<br/>
                                You need to improve your website rank.</strong>
                            </div>";
                    }
                    else
                    {
                        $query = $mysqli->query("insert into website (u_email,website_title,website_url,website_category) values('" . $_SESSION['ses_logid'] . "','" . $_POST['txttitle'] . "','" . $_POST['txturl'] . "','" . $_POST['txtcate'] . "')");
                        if ($query == true) {
                            header("location: website.php");
                        } else {
                            echo "<script>alert('Insertion Failed!');</script>";
                        }
                    }
                }
            }
            ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="AdWale">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>New Website | AdWale</title>        


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
                            <li>
                                <a href="pub_index.php" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> </a>
                            </li>
                            <li>
                                <a href="website.php" class="waves-effect active"><i class="md-web"></i> <span> Websites </span> </a>
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
                                <h4 class="page-title">Websites</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li class="active">Websites</li>
                                    <li class="active">New Website</li>
                                </ol>
                            </div>
                        </div>
                        
                        
                    <!--Alert Division-->
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <?php echo $rankerr; ?>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>

                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Website Details</b></h4>
                                    <p class="text-muted font-13 m-b-30">

                                    </p>

                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <label>Website Title:</label>
                                            <input type="text" name="txttitle" placeholder="Enter Website Title" class="form-control">
                                            <span class="text-danger"><?php echo $werr1; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Website Url:</label>
                                            <input type="url" name="txturl" placeholder="Enter Website Url" class="form-control">
                                            <span class="text-danger"><?php echo $werr2; ?><span>
                                        </div>
                                        <div class="form-group">
                                            <label>Website Category:</label><br/>
                                            <select class="form-control" name="txtcate">
                                                    <option value="Blogs">Blogs</option>
                                                    <option value="Booking">Booking</option>
                                                    <option value="Entertainment">Entertainment</option>
                                                    <option value="Education">Education</option>
                                                    <option value="Job">Job</option>
                                                    <option value="Social">Social</option>
                                                    <option value="Streaming">Streaming</option>
                                                    <option value="Shopping">Shopping</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            <span class="text-danger"><?php echo $werr3; ?></span>
                                        </div>

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name="btnsave">
                                                Save
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3">
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



    </body>
</html>