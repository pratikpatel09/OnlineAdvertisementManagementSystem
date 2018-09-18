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

        <title>Publisher Offers | AdWale</title>

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
        <style>
            .media {
  display: inline-block;
  position: relative;
  vertical-align: top;
}

.media__image { display: block; }

.media__body {
  background: rgba(41, 128, 185, 0.7);
  bottom: 0;
  color: white;
  font-size: 1em;
  left: 0;
  opacity: 0;
  overflow: hidden;
  padding: 3.75em 3em;
  position: absolute;
  text-align: center;
  top: 0;
  right: 0;
  -webkit-transition: 0.6s;
  transition: 0.6s;
  border-radius:2%;
}

.media__body:hover { opacity: 1; }

.media__body:after,
.media__body:before {
  border: 1px solid rgba(255, 255, 255, 0.7);
  bottom: 1em;
  content: '';
  left: 1em;
  opacity: 0;
  position: absolute;
  right: 1em;
  top: 1em;
  -webkit-transform: scale(1.5);
  -ms-transform: scale(1.5);
  transform: scale(1.5);
  -webkit-transition: 0.6s 0.2s;
  transition: 0.6s 0.2s;
}

.media__body:before {
  border-bottom: none;
  border-top: none;
  left: 2em;
  right: 2em;
}

.media__body:after {
  border-left: none;
  border-right: none;
  bottom: 2em;
  top: 2em;
}

.media__body:hover:after,
.media__body:hover:before {
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  opacity: 1;
}

.media__body h2 { margin-top: 0; }

.media__body p { margin-bottom: 1.5em; }
        </style>
        
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
                                <a href="website.php" class="waves-effect"><i class="md-web"></i> <span> Websites </span> </a>
                            </li>
                            <li>
                                <a href="pub_feedback.php" class="waves-effect"><i class="md-announcement"></i> <span> Feedback </span> </a>
                            </li>
                            <li>
                                <a href="pub_offer.php" class="waves-effect active"><i class="md-local-offer"></i> <span> Offers </span> </a>
                            </li>
                            

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

             <?php
                if(isset($_POST['btnavailable']))
                {
                    $query=$mysqli->query("insert into user_offer values('".$_SESSION['ses_logid']."','".$_POST['btnavailable']."')");
                    if($query==true)
                    {
                        $to = $_SESSION['ses_logid'];
                        $subject = "Active Offers : AdWale";
                        $txt = "<h3>congratulations...</h3>";
                        $txt .= "<h3>Offer '".$_SESSION['ses_offername']."' is active now on your AdWale account.</h3>";
                        $txt .= "<br/><br/><h3>Thank You!</h3>";

                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= "From: adwale.supprt18@gmail.com";

                        if (mail($to, $subject, $txt, $headers)) {
                        } else {
                        }
                    }
                    else
                    {
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
                                    <li class="active">Offers</li>
                                </ol>
                            </div>
                        </div>
               
                        <div class="row">
                            <?php
                                $result=$mysqli->query("select * from offer_master where user_type='Publisher' and curdate() >= start_date and curdate() <= end_date and status='active'");
                                while($row=$result->fetch_assoc())
                                {
                                    
                                    $result1=$mysqli->query("select * from user_offer where offer_id='".$row['offer_id']."' and u_email='".$_SESSION['ses_logid']."'");
                                    if($result1->num_rows==1)
                                    {
                                        $row1=$result1->fetch_assoc();
                                        echo '<div class="col-lg-4">
                                        <div class="cngcolor panel panel-success panel-border">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">'.$row['offer_name'].'</h3>
                                            </div>
                                            <div class="panel-body">
                                            <div class="media">
                                                <img src='.$row['image'].' alt="'.$row['offer_name'].'" class="img-responsive img-rounded media__image" width="360" style="height:170px;">
                                                <div class="media__body">
                                                    <p>'.$row['offer_description'].'</p>
                                                  </div>
                                            </div>
                                                <br/>
                                                <div class="text-right">
                                                    <button id="btnactive" value="'.$row['offer_id'].'" class="btn btn-success">Active</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                    else
                                    {
                                        $_SESSION['ses_offername']=$row['offer_name'];
                                        echo '<div class="col-lg-4">
                                    <div class="cngcolor panel panel-inverse panel-border">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">'.$row['offer_name'].'</h3>
                                        </div>
                                        <div class="panel-body">
                                        <div class="media">
                                            <img src='.$row['image'].' alt="'.$row['offer_name'].'" class="img-responsive img-rounded media__image" width="360" style="height:170px;">
                                            <div class="media__body">
                                                    <p>'.$row['offer_description'].'</p>
                                                  </div>
                                            </div>
                                            <br/>
                                            <div class="text-right">
                                                <form method="post"><button id="btnavailable" name="btnavailable" value="'.$row['offer_id'].'" class="btn btn-inverse">Available</button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                    }
                                }
                            ?>
                            
                        </div>
                        
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