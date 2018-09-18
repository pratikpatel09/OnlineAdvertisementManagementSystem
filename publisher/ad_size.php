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

        <title>Ad Type | AdWale</title>        


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

        <script src="../assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".btn-getcode").attr("disabled", "disabled");
                $("input[name='rd_adtype']").click(function () {
                    $(".btn-getcode").removeAttr("disabled");
                });
                $(".btn-getcode").click(function () {
                    var myadtype = $("input[name='rd_adtype']:checked").val();
                    
                    if (myadtype)
                    {
                        $(".alrt_title").html(myadtype + " Advertisement size code");

                        $.ajax({
                            url: 'AJAX_ad_size.php',
                            type: 'post',
                            data: {adsize: myadtype},
                            success: function (data) {
                                mycode=$.trim(data);
                                $("#txtcode").html(mycode);
                            }
                        });

                    } else
                    {
                        $("btn-getcode").removeAttr("data-toggle");
                        alert("Please select Ad Size");
                    }
                });
                $(".btn_copied").click(function () {
                    try
                    {
                        $('#txtcode').select();
                        document.execCommand('copy');
                        $("#txtcopymsg").html("Copied to Clipboard");
                    } catch (e)
                    {
                        alert(e);
                    }
                });
            });
        </script>

    </head>

    <?php
    $webtitle = "";
    $weburl = "";
    $result = $mysqli->query("SELECT * FROM website where website_id='" . $_SESSION['ses_webid'] . "'");
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $webtitle = $row['website_title'];
        $weburl = $row['website_url'];
    } else {
        echo "<script>Data Not Found</script>";
    }
    ?>

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
                                <h4 class="page-title">Ad Size</h4>
                                <ol class="breadcrumb">
                                    <li>AdWale</li>
                                    <li class="active">Websites</li>
                                    <li class="active">Ad Size</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row card-box" style="background-color: #CEE4FA;" >
                            <h4 class="m-t-0 header-title"><b>Advertisement Size</b></h4>
                            <p class="font-bold m-b-15">
                                select any one ad size.
                            </p>
                            <div class="col-lg-4">
                                <div class="panel panel-border panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="color:#666666;">300 x 600</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div style="padding:0px 10px 10px 10px;">
                                            <img src="../images/adtype/adtype1.jpg" alt="adtype1 300x600" class="img-responsive">
                                        </div>
                                        <div class="radio radio-primary text-center">
                                            <input type="radio" name="rd_adtype" id="radio3" value="300 x 600">
                                            <label for="radio3">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-border panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="color:#666666;">300 x 250</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div style="padding:0px 10px 10px 10px;">
                                            <img src="../images/adtype/adtype2.jpg" alt="adtype1 300x600" class="img-responsive">
                                        </div>
                                        <div class="radio radio-primary text-center">
                                            <input type="radio" name="rd_adtype" id="radio3" value="300 x 250">
                                            <label for="radio3">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="panel panel-border panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="color:#666666;">728 x 90</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div style="padding:0px 10px 10px 10px;">
                                            <img src="../images/adtype/adtype3.jpg" alt="adtype1 300x600" class="img-responsive">
                                        </div>
                                        <div class="radio radio-primary text-center">
                                            <input type="radio" name="rd_adtype" id="radio3" value="728 x 90">
                                            <label for="radio3">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right m-r-10">
                                <button class="btn btn-danger waves-effect waves-light btn-getcode" data-toggle="modal" data-target="#con-close-modal">Get code</button>
                            </div>

                        </div>

                        <!--start Alert Pop-up-->
                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title alrt_title">XXXXXXXX-Title</h4> 
                                    </div> 
                                    <div class="modal-body"> 
                                        <div class="row"> 
                                            <div class="col-md-6"> 
                                                <div class="form-group"> 
                                                    <label class="control-label" id="txtsite">Selected Website : <?php echo "<span data-toggle='tooltip' title='" . $weburl . "' data-placement='bottom'>" . $webtitle . "</span>"; ?></label>
                                                </div> 
                                            </div> 
                                            <div class="col-md-6"> 
                                            </div> 
                                        </div> 
                                        <div class="row"> 
                                            <div class="col-md-12"> 
                                                <div class="form-group no-margin"> 
                                                    <label for="field-7" class="control-label">Generate Advertisement Code</label> 
                                                    <textarea class="form-control autogrow" id="txtcode" placeholder="Advertisement code here..." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                                </div>
                                                <span id="txtcopymsg" class="text-success"></span>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                        <button type="button" class="btn btn-info waves-effect waves-light btn_copied">Copy code</button> 
                                    </div> 
                                </div> 
                            </div>
                        </div><!-- /.modal -->
                        <!--end Alert Pop-up-->

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