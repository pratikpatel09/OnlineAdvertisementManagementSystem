<?php
    include_once 'conn.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="AdWale">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title></title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="../assets/js/modernizr.min.js"></script>
        
        
    </head>
    <body class="fixed-left">
        <div  id="wrapper">
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="admin_index.php" class="logo"><span><span style="font-size: 25px; color: #5190F7;">A</span>d<span style="font-size: 25px; color: #5190F7;">W</span>ale</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                <?php

                                //using get_client_ip_server function
                                function get_client_ip_server() {
                                    $ipaddress = '';
                                    $_SERVER['HTTP_CLIENT_IP'] = "";
                                    $_SERVER['HTTP_X_FORWARDED_FOR'] = "";
                                    $_SERVER['HTTP_X_FORWARDED'] = "";
                                    $_SERVER['HTTP_FORWARDED_FOR'] = "";
                                    $_SERVER['HTTP_FORWARDED'] = "";
                                    if ($_SERVER['HTTP_CLIENT_IP'])
                                        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                                    else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
                                        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                    else if ($_SERVER['HTTP_X_FORWARDED'])
                                        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                                    else if ($_SERVER['HTTP_FORWARDED_FOR'])
                                        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                                    else if ($_SERVER['HTTP_FORWARDED'])
                                        $ipaddress = $_SERVER['HTTP_FORWARDED'];
                                    else if ($_SERVER['REMOTE_ADDR'])
                                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                                    else
                                        $ipaddress = 'UNKNOWN';

                                    return $ipaddress;
                                }

                                echo '<p>Your IP address is ' . get_client_ip_server() . '</p>';
                                ?>
                                <!--<input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>-->
                            </form>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../assets/images/icon/profile_pic.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="admin_profile.php"><i class="ti-user m-r-5"></i> Profile</a></li>
                                        <li><a href="admin_logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>

    </body>
</html>
