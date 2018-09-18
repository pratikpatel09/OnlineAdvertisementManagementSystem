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

        <title>Offers | AdWale</title>

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
        <?php include_once 'conn.php'; ?>
        
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
                                <a href="rate_updates.php" class="waves-effect"><i class="fa fa-inr"></i> <span> Update rates </span> </a>
                            </li>
                            <li>
                                <a href="offers.php" class="waves-effect active"><i class="md-local-offer"></i> <span> Offers </span> </a>
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

            <?php 
                $flag=true;
                $err1="";
                $err2="";
                $err3="";
                $err4="";
                $err5="";
                $err6="";
                $err7="";
                $erralert="";
                if(isset($_POST['btnset']))
                {
                    if($_POST['txtoffername']=="")
                    {
                        $err1="Please enter Offer Name!";
                        $flag=false;
                    }
                    if($_POST['txtofferdesc']=="")
                    {
                        $err2="Please enter Offer Description!";
                        $flag=false;
                    }
                    if($_POST['txtstartdate']=="")
                    {
                        $err3="Please select start date!";
                        $flag=false;
                    }
                    else
                    {
                        if($_POST['txtstartdate']>=date('m/d/Y'))
                        {
                        }
                        else
                        {
                            $err3="Not allow past date!";
                            $flag = false;
                        }
                    }
                    if($_POST['txtenddate']=="")
                    {
                        $err4="Please select end date!";
                        $flag=false;
                    }
                    else
                    {
                        if($_POST['txtenddate']>=$_POST['txtstartdate'] && $_POST['txtenddate']>=date('m/d/Y'))
                        {
                        }
                        else
                        {
                            $err4="Now allow past date!";
                            $flag = false;
                        }
                    }
                    if($_POST['txtofferrupees']=="")
                    {
                        $err5="Please enter rupees!";
                        $flag=false;
                    }
                    if(!isset($_FILES['txtupload']) || $_FILES['txtupload']['error'] == UPLOAD_ERR_NO_FILE)
                    {
                        $err6="Please upload image!";
                        $flag=false;
                    }
                    if($_POST['ddlusertype']=="")
                    {
                        $err7="Please select user type!";
                        $flag=false;
                    }
                    
                    if($flag==true)
                    {
                        if(strlen($_POST['txtoffername'])>=30)
                        {
                            $err1="Maximum length is 30!";
                        }
                        if(strlen($_POST['txtofferdesc'])>=100)
                        {
                            $err2="Maximum length is 100!";
                        }
                        if(ctype_alpha($_POST['txtofferrupees']))
                        {
                            $err5="Enter only rupees!";
                        }
                        
                        $filename = $_FILES['txtupload']['name'];
                        $filepath = $_FILES['txtupload']['tmp_name'];
                        $imgpath = "../advertisement/offer_banner/" . $filename;
                        $image_info = getimagesize($filepath);
                        $image_width = $image_info[0];
                        $image_height = $image_info[1];
                        if($image_width == "470" && $image_height == "275")
                        {
                            $allowed =  array('png','jpg','gif');
                            $filename = $_FILES['txtupload']['name'];
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            if(in_array($ext,$allowed))
                            {
                                //echo "<script>alert('".$ext."');</script>";
                                //Write code for database
                                $adddate=date('Y-m-d');
                                
                                $startdate=$_POST['txtstartdate'];
                                $startdt = explode('/', $startdate);
                                $sdmonth = $startdt[0];
                                $sdday = $startdt[1];
                                $sdyear = $startdt[2];
                                $startdate = $sdyear . "-" . $sdmonth . "-" . $sdday;
                                
                                $enddate=$_POST['txtenddate'];
                                $enddt = explode('/', $enddate);
                                $edmonth = $enddt[0];
                                $edday = $enddt[1];
                                $edyear = $enddt[2];
                                $enddate = $edyear . "-" . $edmonth . "-" . $edday;
                                
                                move_uploaded_file($filepath, "../advertisement/offer_banner/" . $filename);
                                
                                        
                                $my_offer_qry="insert into offer_master (offer_name,offer_description,add_date,start_date,end_date,rupees,status,image,user_type) values('".$_POST['txtoffername']."','".$_POST['txtofferdesc']."','".$adddate."','".$startdate."','".$enddate."','".$_POST['txtofferrupees']."','deactive','".$imgpath."','".$_POST['ddlusertype']."')";
                                $query=$mysqli->query($my_offer_qry);
                                if($query==true)
                                {
                                    if($startdate==date('Y-m-d'))
                                    {
                                        $start_dt_query=$mysqli->query("update offer_master set status='active' where start_date='".date('Y-m-d')."'");
                                        if($start_dt_query==true)
                                        {
                                            
                                        }
                                    }
                                    $erralert="Successfully set new offer";
                                }
                                else
                                {
                                    $erralert="Something want wrong, Please check your Query...!";
                                }
                            }
                            else
                            {
                                $err6="Support only .jpg, .png or .gif Formats";
                            }
                        }
                        else
                        {
                            $err6="Use image size only 300 x 600";
                        }
                    }
                }
            ?>

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
                                <h4 class="page-title">Offers</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li class="active">Add offers</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                    if($erralert=="Successfully set new offer")
                                    {
                                        echo '<div class="alert alert-success alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> Successfully set new offer.
                            </div>';
                                    }
                                    else if($erralert=="Something want wrong, Please check your Query...!")
                                    {
                                        echo '<div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> Successfully set new offer.
                            </div>';
                                    }
                                ?>
                                
                                
                                <div class="card-box" style="border-top:3px solid #5fbeaa;">
                                    <h4 class="m-t-0 header-title"><b>Add Offers</b></h4><br/>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Offer Name:</label>
                                                <input type="text" class="form-control" placeholder="Enter Offer Name" name="txtoffername" value="<?php echo @$_POST['txtoffername']; ?>" tabindex="1">
                                                <span class="text-danger"><?php echo $err1; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Offer Description:</label>
                                                <textarea cols="7" rows="5" class="form-control" placeholder="Enter Description" name="txtofferdesc" tabindex="2"><?php echo @$_POST['txtofferdesc']; ?></textarea>
                                                <span class="text-danger"><?php echo $err2; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Start date:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="txtstartdate" value="<?php echo @$_POST['txtstartdate']; ?>" id="datepicker-autoclose" tabindex="3">
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                </div><!-- input-group -->
                                                <span class="text-danger"><?php echo $err3; ?></span>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">End date:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="txtenddate" value="<?php echo @$_POST['txtenddate']; ?>" id="datepicker-autoclose1" tabindex="4">
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                </div><!-- input-group -->
                                                <span class="text-danger"><?php echo $err4; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Rupees:</label>
                                                <input type="text" class="form-control" placeholder="Enter Rupees" name="txtofferrupees" value="<?php echo @$_POST['txtofferrupees']; ?>" tabindex="5">
                                                <span class="text-danger"><?php echo $err5; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Upload Offer Image:</label>
                                                <input type="file" class="filestyle" data-placeholder="No file" name="txtupload" data-size="sm" tabindex="6">
                                                <span class="text-danger"><?php echo $err6; ?></span>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">User Type:</label>
                                                <select class="form-control" name="ddlusertype" tabindex="7">
                                                    <option value="">-SELECT-</option>
                                                    <option value="Advertiser" <?php if(@$_POST['ddlusertype']=="Advertiser"){echo "selected";} ?>>Advertiser</option>
                                                    <option value="Publisher" <?php if(@$_POST['ddlusertype']=="Publisher"){echo "selected";} ?>>Publisher</option>
                                                </select>
                                                <span class="text-danger"><?php echo $err7; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <button type="submit" class="btn btn-default waves-effect waves-light" name="btnset" tabindex="8">Set Now</button>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <!-- end row -->
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
<script src="../assets/plugins/morris/morris.min.js"></script>
<script src="../assets/plugins/raphael/raphael-min.js"></script>

<script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>

<script src="../assets/pages/jquery.dashboard.js"></script>

<script src="../assets/js/jquery.core.js"></script>
<script src="../assets/js/jquery.app.js"></script>

<script src="../assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>

<script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


        <script>
            jQuery(document).ready(function () {

                // Date Picker
                jQuery('#datepicker-autoclose').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });
                jQuery('#datepicker-autoclose1').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });


                // Select2
                $(":file").filestyle({input: false});
            });
        </script>




</body>
</html>