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

<?php
//error_reporting(E_ERROR);

set_error_handler("errorHandler");
register_shutdown_function("shutdownHandler");

function errorHandler($error_level, $error_message, $error_file, $error_line, $error_context)
{
$error = "lvl: " . $error_level . " | msg:" . $error_message . " | file:" . $error_file . " | ln:" . $error_line;
switch ($error_level) {
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_PARSE:
        mylog($error, "fatal");
        break;
    case E_USER_ERROR:
    case E_RECOVERABLE_ERROR:
        mylog($error, "error");
        break;
    case E_WARNING:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_USER_WARNING:
        mylog($error, "warn");
        break;
    case E_NOTICE:
    case E_USER_NOTICE:
        mylog($error, "info");
        break;
    case E_STRICT:
        mylog($error, "debug");
        break;
    default:
        mylog($error, "warn");
}
}

function shutdownHandler() //will be called when php script ends.
{
$lasterror = error_get_last();
switch ($lasterror['type'])
{
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_USER_ERROR:
    case E_RECOVERABLE_ERROR:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_PARSE:
        $error = "[SHUTDOWN] lvl:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
        mylog($error, "fatal");
}
}

function mylog($error, $errlvl)
{
    //Display error Message...
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="AdWale">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>Create Ads | AdWale</title>


        <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

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
            <?php
            function send_start_mail()
            {
                $adv_emailid=$_SESSION['ses_logid'];
                    
                    $to = $adv_emailid;
                    $subject = "Ads on AdWale";
                    $txt = "<h3>Hello $adv_emailid (Advertiser), <br/><br/><br/> <span> Congratulations,<br/>Today, Your Advertisement is Live...</h3></span>";
                    $txt .= "<br/><h3><span>Ad Name: <span style='color:green;'>'".$rowdt['ads_name']."'</span></span></h3>";
                    $txt .= "<br/><br/><h3>Thank You!</h3>";

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: adwale.supprt18@gmail.com";

                    if (mail($to, $subject, $txt, $headers)) {
                        
                    } else {
                        
                    }
            }
            ?>

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
                                <a href="created_ads.php" class="waves-effect active"><i class="md-add-box"></i> <span> Create Ads </span> </a>
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
            
            <?php
                $perclick_rate="";
                $perimpression_rate="";
                $perclick_cost="";
                $result=$mysqli->query("SELECT * FROM rate_updates WHERE rate_status='active'");
                if($result->num_rows==1)
                {
                    $row=$result->fetch_assoc();
                    $perclick_rate=$row['per_click_rate'];
                    $perimpression_rate=$row['per_impression_rate'];
                    $perclick_cost=$row['per_click_cost'];
                }
            ?>

            <?php
            $flag = true;
            $aderr1 = "";
            $aderr2 = "";
            $aderr3 = "";
            $aderr4 = "";
            $aderr5 = "";
            $aderr6 = "";
            $aderr7 = "";
            $aderr8 = "";
            $aderr9 = "";
            
            $_SESSION['ses_txtadsname']="";
                    $_SESSION['ses_txtbudget']="";
                    $_SESSION['ses_txtstartdate']="";
            $_SESSION['ses_txtenddate']="";
                    $_SESSION['ses_ddltype']="";
                    $_SESSION['ses_ddlsize']="";
                    $_SESSION['ses_txturl']="";
                    $_SESSION['ses_ddlcategory']="";
                    $_SESSION['ses_imgpath']="";
            
            if (isset($_POST['btnset'])) {
                if ($_POST['txtadsname'] == "") {
                    $aderr1 = "Please enter Ad Name!";
                    $flag = false;
                }
                if ($_POST['txtbudget'] == "") {
                    $aderr2 = "Please enter per day budget!";
                    $flag = false;
                }
                else if($_POST['txtbudget'] >= 30)
                {
                    
                }
                else
                {
                    $aderr2 = "Please enter 30 rupees in daily budget!";
                    $flag = false;
                }
                
                if ($_POST['txtstartdate'] == "") {
                    $aderr3 = "Please select ad starting date!";
                    $flag = false;
                } else {
                    if($_POST['txtstartdate']>=date('m/d/Y'))
                    {
                    }
                    else
                    {
                        $aderr3="Wrong date selected!";
                        $flag = false;
                    }
                    //$startdt=$_POST['txtstartdate'];
                    //$startdt=  explode('/', $startdt);
                    //$sdmonth = $startdt[0];
                    //$sdday = $startdt[1];
                    //$sdyear = $startdt[2];
                    //$aderr3= $sdyear."-".$sdmonth."-".$sdday;
                }
                if ($_POST['txtenddate'] == "") {
                    $aderr4 = "Please select ad ending date!";
                    $flag = false;
                }
                else
                {
                    if($_POST['txtenddate']>=$_POST['txtstartdate'] && $_POST['txtenddate']>=date('m/d/Y'))
                    {
                    }
                    else
                    {
                        $aderr4="Wrong date selected!";
                        $flag = false;
                    }
                }
                
                if ($_POST['ddltype'] == "") {
                    $aderr5 = "Please select ad type!";
                    $flag = false;
                }
                if ($_POST['ddlsize'] == "") {
                    $aderr6 = "Please select ad size!";
                    $flag = false;
                }
                if (!isset($_FILES['txtupload']) || $_FILES['txtupload']['error'] == UPLOAD_ERR_NO_FILE) {
                    $aderr7 = "Please upload ad file!";
                    $flag = false;
                }
                if ($_POST['txturl'] == "") {
                    $aderr8 = "Please enter ad redirect URL!";
                    $flag = false;
                }
                if ($_POST['ddlcategory'] == "") {
                    $aderr9 = "Please select ad category!";
                    $flag = false;
                }

                if ($flag == true) {
                    $txtadsname = $_POST['txtadsname'];
                    $txtbudget = $_POST['txtbudget'];
                    $txtstartdate = $_POST['txtstartdate'];
                    $startdt = explode('/', $txtstartdate);
                    $sdmonth = $startdt[0];
                    $sdday = $startdt[1];
                    $sdyear = $startdt[2];
                    $txtstartdate = $sdyear . "-" . $sdmonth . "-" . $sdday;

                    $txtenddate = $_POST['txtenddate'];
                    $enddt = explode('/', $txtenddate);
                    $edmonth = $enddt[0];
                    $edday = $enddt[1];
                    $edyear = $enddt[2];
                    $txtenddate = $edyear . "-" . $edmonth . "-" . $edday;

                    $ddltype = $_POST['ddltype'];
                    $ddlsize = $_POST['ddlsize'];
                    $txtupload = $_POST['txtupload'];
                    $txturl = $_POST['txturl'];
                    $ddlcategory = $_POST['ddlcategory'];

                    $_SESSION['ses_txtadsname']=$txtadsname;
                    $_SESSION['ses_txtbudget']=$txtbudget;
                    $_SESSION['ses_txtstartdate']=$txtstartdate;
                    $_SESSION['ses_txtenddate']=$txtenddate;
                    $_SESSION['ses_ddltype']=$ddltype;
                    $_SESSION['ses_ddlsize']=$ddlsize;
                    $_SESSION['ses_txturl']=$txturl;
                    $_SESSION['ses_ddlcategory']=$ddlcategory;
                    
                    if ($ddltype == "Image") {
                        //start Image Upload Script
                        $filename = $_FILES['txtupload']['name'];
                        $filepath = $_FILES['txtupload']['tmp_name'];
                        //move_uploaded_file($filepath, "myimg/" . $filename);
                        $imgpath = "banners/" . $filename;
                        $image_info = getimagesize($filepath);
                        $image_width = $image_info[0];
                        $image_height = $image_info[1];
                        //over Image Upload Script
                        
                        if($ddlsize == "300 x 600")
                        {
                            if($image_width == "300" && $image_height == "600")
                            {
                                move_uploaded_file($filepath, "../advertisement/banners/" . $filename);
                                $_SESSION['ses_imgpath']=$imgpath;
                                $myqry="insert into advertisement (u_email,ads_name,budget,status,ad_startdate,ad_enddate,perclick_rate,impression_rate,perclick_cost,ad_type,ad_size,ad_file,ad_link,ad_category) values('".$_SESSION['ses_logid']."','".$_SESSION['ses_txtadsname']."','".$_SESSION['ses_txtbudget']."','waiting','".$_SESSION['ses_txtstartdate']."','".$_SESSION['ses_txtenddate']."','".$perclick_rate."','".$perimpression_rate."','".$perclick_cost."','".$_SESSION['ses_ddltype']."','".$_SESSION['ses_ddlsize']."','".$_SESSION['ses_imgpath']."','".$_SESSION['ses_txturl']."','".$_SESSION['ses_ddlcategory']."')";
                                $query = $mysqli->query($myqry);
                                if($query == true)
                                {
                                    if($_SESSION['ses_txtstartdate']==date('Y-m-d'))
                                    {
                                        $start_dt_query=$mysqli->query("update advertisement set status='started' where ad_startdate='".date('Y-m-d')."'");
                                        if($start_dt_query==true)
                                        {
                                            send_start_mail();
                                        }
                                    }
                                }
                                else
                                {
                                echo "<script>alert('Not set the Advertisement, Database problem!!!');</script>";
                                }
                            }
                            else
                            {
                                $aderr7="your banner size is not 300 x 600";
                            }
                        }
                        else if($ddlsize == "300 x 250")
                        {
                            if($image_width == "300" && $image_height == "250")
                            {
                                move_uploaded_file($filepath, "../advertisement/banners/" . $filename);
                                $_SESSION['ses_imgpath']=$imgpath;
                                $myqry="insert into advertisement (u_email,ads_name,budget,status,ad_startdate,ad_enddate,perclick_rate,impression_rate,perclick_cost,ad_type,ad_size,ad_file,ad_link,ad_category) values('".$_SESSION['ses_logid']."','".$_SESSION['ses_txtadsname']."','".$_SESSION['ses_txtbudget']."','waiting','".$_SESSION['ses_txtstartdate']."','".$_SESSION['ses_txtenddate']."','".$perclick_rate."','".$perimpression_rate."','".$perclick_cost."','".$_SESSION['ses_ddltype']."','".$_SESSION['ses_ddlsize']."','".$_SESSION['ses_imgpath']."','".$_SESSION['ses_txturl']."','".$_SESSION['ses_ddlcategory']."')";
                                $query = $mysqli->query($myqry);
                                if($query == true)
                                {
                                if($_SESSION['ses_txtstartdate']==date('Y-m-d'))
                                    {
                                        $start_dt_query=$mysqli->query("update advertisement set status='started' where ad_startdate='".date('Y-m-d')."'");
                                        if($start_dt_query==true)
                                        {
                                            send_start_mail();
                                        }
                                    }
                                }
                                else
                                {
                                echo "<script>alert('Not set the Advertisement, Database problem!!!');</script>";
                                }
                            }
                            else
                            {
                                $aderr7="your banner size is not 300 x 250";
                            }
                        }
                        else if($ddlsize == "728 x 90")
                        {
                            if($image_width == "728" && $image_height == "90")
                            {
                                move_uploaded_file($filepath, "../advertisement/banners/" . $filename);
                                $_SESSION['ses_imgpath']=$imgpath;
                                $myqry="insert into advertisement (u_email,ads_name,budget,status,ad_startdate,ad_enddate,perclick_rate,impression_rate,perclick_cost,ad_type,ad_size,ad_file,ad_link,ad_category) values('".$_SESSION['ses_logid']."','".$_SESSION['ses_txtadsname']."','".$_SESSION['ses_txtbudget']."','waiting','".$_SESSION['ses_txtstartdate']."','".$_SESSION['ses_txtenddate']."','".$perclick_rate."','".$perimpression_rate."','".$perclick_cost."','".$_SESSION['ses_ddltype']."','".$_SESSION['ses_ddlsize']."','".$_SESSION['ses_imgpath']."','".$_SESSION['ses_txturl']."','".$_SESSION['ses_ddlcategory']."')";
                                $query = $mysqli->query($myqry);
                                if($query == true)
                                {
                                    if($_SESSION['ses_txtstartdate']==date('Y-m-d'))
                                    {
                                        $start_dt_query=$mysqli->query("update advertisement set status='started' where ad_startdate='".date('Y-m-d')."'");
                                        if($start_dt_query==true)
                                        {
                                            send_start_mail();
                                        }
                                    }
                                }
                                else
                                {
                                echo "<script>alert('Not set the Advertisement, Database problem!!!');</script>";
                                }
                            }
                            else
                            {
                                $aderr7="your banner size is not 728 x 90";
                            }
                        }
                        else
                        {
                            $aderr7="You size not selected!!!";
                        }
                                               
                      
                        
                    } else if ($ddltype == "Animation") {
                        //start Image Upload Script
                        $filename = $_FILES['txtupload']['name'];
                        $filepath = $_FILES['txtupload']['tmp_name'];
                        //move_uploaded_file($filepath, "myimg/" . $filename);
                        $imgpath = "banners/" . $filename;
                        $image_info = getimagesize($filepath);
                        $image_width = $image_info[0];
                        $image_height = $image_info[1];
                        //over Image Upload Script
                        
                        if($ddlsize == "300 x 600")
                        {
                            if($image_width == "300" && $image_height == "600")
                            {
                                move_uploaded_file($filepath, "../advertisement/banners/" . $filename);
                                $_SESSION['ses_imgpath']=$imgpath;
                                $myqry="insert into advertisement (u_email,ads_name,budget,status,ad_startdate,ad_enddate,perclick_rate,impression_rate,perclick_cost,ad_type,ad_size,ad_file,ad_link,ad_category) values('".$_SESSION['ses_logid']."','".$_SESSION['ses_txtadsname']."','".$_SESSION['ses_txtbudget']."','waiting','".$_SESSION['ses_txtstartdate']."','".$_SESSION['ses_txtenddate']."','".$perclick_rate."','".$perimpression_rate."','".$perclick_cost."','".$_SESSION['ses_ddltype']."','".$_SESSION['ses_ddlsize']."','".$_SESSION['ses_imgpath']."','".$_SESSION['ses_txturl']."','".$_SESSION['ses_ddlcategory']."')";
                                $query = $mysqli->query($myqry);
                                if($query == true)
                                {
                                if($_SESSION['ses_txtstartdate']==date('Y-m-d'))
                                    {
                                        $start_dt_query=$mysqli->query("update advertisement set status='started' where ad_startdate='".date('Y-m-d')."'");
                                        if($start_dt_query==true)
                                        {
                                            send_start_mail();
                                        }
                                    }
                                }
                                else
                                {
                                echo "<script>alert('Not set the Advertisement, Database problem!!!');</script>";
                                }
                            }
                            else
                            {
                                $aderr7="your banner size is not 300 x 600";
                            }
                        }
                        else if($ddlsize == "300 x 250")
                        {
                            if($image_width == "300" && $image_height == "250")
                            {
                                move_uploaded_file($filepath, "../advertisement/banners/" . $filename);
                                $_SESSION['ses_imgpath']=$imgpath;
                                $myqry="insert into advertisement (u_email,ads_name,budget,status,ad_startdate,ad_enddate,perclick_rate,impression_rate,perclick_cost,ad_type,ad_size,ad_file,ad_link,ad_category) values('".$_SESSION['ses_logid']."','".$_SESSION['ses_txtadsname']."','".$_SESSION['ses_txtbudget']."','waiting','".$_SESSION['ses_txtstartdate']."','".$_SESSION['ses_txtenddate']."','".$perclick_rate."','".$perimpression_rate."','".$perclick_cost."','".$_SESSION['ses_ddltype']."','".$_SESSION['ses_ddlsize']."','".$_SESSION['ses_imgpath']."','".$_SESSION['ses_txturl']."','".$_SESSION['ses_ddlcategory']."')";
                                $query = $mysqli->query($myqry);
                                if($query == true)
                                {
                                if($_SESSION['ses_txtstartdate']==date('Y-m-d'))
                                    {
                                        $start_dt_query=$mysqli->query("update advertisement set status='started' where ad_startdate='".date('Y-m-d')."'");
                                        if($start_dt_query==true)
                                        {
                                            send_start_mail();
                                        }
                                    }
                                }
                                else
                                {
                                echo "<script>alert('Not set the Advertisement, Database problem!!!');</script>";
                                }
                            }
                            else
                            {
                                $aderr7="your banner size is not 300 x 250";
                            }
                        }
                        else if($ddlsize == "728 x 90")
                        {
                            if($image_width == "728" && $image_height == "90")
                            {
                                move_uploaded_file($filepath, "../advertisement/banners/" . $filename);
                                $_SESSION['ses_imgpath']=$imgpath;
                                $myqry="insert into advertisement (u_email,ads_name,budget,status,ad_startdate,ad_enddate,perclick_rate,impression_rate,perclick_cost,ad_type,ad_size,ad_file,ad_link,ad_category) values('".$_SESSION['ses_logid']."','".$_SESSION['ses_txtadsname']."','".$_SESSION['ses_txtbudget']."','waiting','".$_SESSION['ses_txtstartdate']."','".$_SESSION['ses_txtenddate']."','".$perclick_rate."','".$perimpression_rate."','".$perclick_cost."','".$_SESSION['ses_ddltype']."','".$_SESSION['ses_ddlsize']."','".$_SESSION['ses_imgpath']."','".$_SESSION['ses_txturl']."','".$_SESSION['ses_ddlcategory']."')";
                                $query = $mysqli->query($myqry);
                                if($query == true)
                                {
                                    if($_SESSION['ses_txtstartdate']==date('Y-m-d'))
                                    {
                                        $start_dt_query=$mysqli->query("update advertisement set status='started' where ad_startdate='".date('Y-m-d')."'");
                                        if($start_dt_query==true)
                                        {
                                            send_start_mail();
                                        }
                                    }
                                echo "<script>alert('Congrats, Successfully set advertisement..');</script>";
                                }
                                else
                                {
                                echo "<script>alert('Not set the Advertisement, Database problem!!!');</script>";
                                }
                            }
                            else
                            {
                                $aderr7="your banner size is not 728 x 90";
                            }
                        }
                        else
                        {
                            $aderr7="You size not selected!!!";
                        }
                        
                        
                    } else if ($ddltype == "Video") {
                        
                    }



                    /* $myqry="INSERT INTO advertisement (u_email,ads_name,budget,status,ad_startdate,ad_enddate,perclick_rate,perclick_cost,ad_type,ad_size,ad_file,ad_link,ad_category) values('".$_SESSION['ses_logid']."',".$txtadsname."','".$txtbudget."','started','".$txtstartdate."','".$txtenddate."','".$perclick_rate."','".$perimpression_rate."','".$perclick_cost."','".$ddltype."','".$ddlsize."','".$txtupload."','".$txturl."','".$ddlcategory."')";
                      $query = $mysqli->query($myqry);
                      if($query == true)
                      {
                      echo "<script>alert('Congrats, Successfully set advertisement..');</script>";
                      }
                      else
                      {
                      echo "<script>alert('Not set the Advertisement, Database problem!!!');</script>";
                      } */
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
                                <h4 class="page-title">Create Ads</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li class="active">Create Ads</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box" style="border-top:3px solid #4c5667;">
                                    <h4 class="m-t-0 header-title"><b>Ads Details</b></h4><br/>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Ad Name:</label>
                                                <input type="text" class="form-control" placeholder="Enter your Ad Name" name="txtadsname" value="<?php echo @$_POST['txtadsname']; ?>">
                                                <span class="text-danger"><?php echo $aderr1; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Ad Daily Budget:</label>
                                                <input type="text" class="form-control" placeholder="Enter Budget" name="txtbudget" value="<?php echo @$_POST['txtbudget']; ?>">
                                                <span class="text-danger"><?php echo $aderr2; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Start date:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="txtstartdate" value="<?php echo @$_POST['txtstartdate']; ?>" id="datepicker-autoclose">
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                </div><!-- input-group -->
                                                <span class="text-danger"><?php echo $aderr3; ?></span>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">End date:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="txtenddate" value="<?php echo @$_POST['txtenddate']; ?>" id="datepicker-autoclose1">
                                                    <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                </div><!-- input-group -->
                                                <span class="text-danger"><?php echo $aderr4; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Ad Type:</label>
                                                <select class="form-control" name="ddltype">
                                                    <option value="Image" <?php if(@$_POST['ddltype']=="Image"){echo "selected";} ?>>Image</option>
                                                    <option value="Animation" <?php if(@$_POST['ddltype']=="Animation"){echo "selected";} ?>>Animation</option>
                                                    <option value="Video" <?php if(@$_POST['ddltype']=="Video"){echo "selected";} ?>>Video</option>
                                                </select>
                                                <span class="text-danger"><?php echo $aderr5; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Ad Size:</label>
                                                <select class="form-control" name="ddlsize">
                                                    <option value="300 x 600" <?php if(@$_POST['ddlsize']=="300 x 600"){echo "selected";} ?>>300 x 600</option>
                                                    <option value="300 x 250" <?php if(@$_POST['ddlsize']=="300 x 250"){echo "selected";} ?>>300 x 250</option>
                                                    <option value="728 x 90" <?php if(@$_POST['ddlsize']=="728 x 90"){echo "selected";} ?>>728 x 90</option> 
                                                </select>
                                                <span class="text-danger"><?php echo $aderr6; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Upload Ad File:</label>
                                                <input type="file" class="filestyle" data-placeholder="No file" name="txtupload" data-size="sm">
                                                <span class="text-danger"><?php echo $aderr7; ?></span>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Ad Link:</label>
                                                <input type="link" class="form-control" name="txturl" placeholder="Enter your ads URL" value="<?php echo @$_POST['txturl']; ?>">
                                                <span class="text-danger"><?php echo $aderr8; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label class="control-label">Ad Category:</label>
                                                <select class="form-control" name="ddlcategory">
                                                    <option value="Blogs" <?php if(@$_POST['ddlcategory']=="Blogs"){echo "selected";} ?>>Blogs</option>
                                                    <option value="Booking" <?php if(@$_POST['ddlcategory']=="Booking"){echo "selected";} ?>>Booking</option>
                                                    <option value="Entertainment" <?php if(@$_POST['ddlcategory']=="Entertainment"){echo "selected";} ?>>Entertainment</option>
                                                    <option value="Education" <?php if(@$_POST['ddlcategory']=="Education"){echo "selected";} ?>>Education</option>
                                                    <option value="Job" <?php if(@$_POST['ddlcategory']=="Job"){echo "selected";} ?>>Job</option>
                                                    <option value="Social" <?php if(@$_POST['ddlcategory']=="Social"){echo "selected";} ?>>Social</option>
                                                    <option value="Streaming" <?php if(@$_POST['ddlcategory']=="Streaming"){echo "selected";} ?>>Streaming</option>
                                                    <option value="Shopping" <?php if(@$_POST['ddlcategory']=="Shopping"){echo "selected";} ?>>Shopping</option>
                                                    <option value="Others" <?php if(@$_POST['ddlcategory']=="Others"){echo "selected";} ?>>Others</option>
                                                </select>
                                                <span class="text-danger"><?php echo $aderr9; ?></span>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <button type="submit" class="btn btn-inverse waves-effect waves-light" name="btnset"/>Set Now</button>
                                            </div>
                                            <div class="col-md-7"></div>
                                        </div>

                                    </form>


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