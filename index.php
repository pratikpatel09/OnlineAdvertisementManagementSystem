<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewreport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <title>AdWale : Online Advertisement Management System</title>
        <link rel="stylesheet" href="css/mystyle.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>

        <script LANGUAGE="JavaScript">
            /*Scroll to top when arrow up clicked BEGIN*/
            $(window).scroll(function() {
                var height = $(window).scrollTop();
                if (height > 100) {
                    $('#back2Top').fadeIn();
                } else {
                    $('#back2Top').fadeOut();
                }
            });
            $(document).ready(function() {
                $("#back2Top").click(function(event) {
                    event.preventDefault();
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                });

            });
             /*Scroll to top when arrow up clicked END*/

        </script>

        <style>
            li .active{
                position: absolute;
            }

            .active a{
                text-decoration: none;

            }
            .active a{
                border-bottom: 3px solid #448AFF;
                border-left: 0px;
                font-weight: bold;
                /*top: 10;
                float: left;
                background-color: #448AFF;
                height: 2px;
                width: 100%;
                position: relative;*/ 
            }

            .img-div{
                background-color: #63B4D2;
            }
            .img-shado{
                position: absolute;
            }
            .divintro{
                padding: 100px;
            }
            .divintro1{
                padding: 50px 100px 100px 100px;
            }
            .reguser{font-size: 20px;}
            .psize{font-size: 21px; text-align: justify;}
            .psize1{font-size: 25px; text-align: center; font-weight: bold;}
            .btn-success{background-color: #43A047; text-align:center;}
            .btn-warning,.btn-warning:hover{background-color: #D50000;}
            .userdiv{text-align:center; margin-bottom: 25px; height:105px;}
            .userdivborder1{box-shadow: 5px 0 5px -5px #333;}
            .userdivborder2{box-shadow: -5px 0 5px -5px #333;}
            .divadheader{margin-top: 40px;}
            .divpad{padding: 20px;}
            .spandiv{background-color: #FFFFFF; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}
            .icon-part-4{text-align: center;}
            .imgpad{padding-top: 17px;}
            .icopart{border: 1px solid #D50000; border-radius: 50%; width: 50px; height: 50px; 
                     background-color: #FF5252; padding: 5px; box-shadow: 0 2px 6px rgba(0,0,0,.5); }
            .icopart:hover{background-color: #D50000; box-shadow: 0 2px 6px rgba(0,0,0,.8);}
            hr{border-top: 1px solid #ccc;
               margin: 1em 0;}
            .ppart4{padding-left: 20px; padding-right: 20px; padding-bottom: 8px;}
            .ppart4-1{font-size: 27px; font-family: arial;}
            .ppart4-2{font-size: 20px; color: #666666;}
            .ppart4-3{font-size: 14px; text-align: justify;}
            .apart4-4{font-size: 13px; color: #448AFF; text-decoration: none;}
            .apart4-4:link{color: #448AFF; text-decoration: none;}
            .apart4-4:visited{color: #448AFF; text-decoration: none;}
            .apart4-4:hover{color: #2962FF; text-decoration: none;}
            .apart4-4:active{color: #2962FF; text-decoration: none;}
            .apartdiv4-4{text-align: right;}

            .panim{font-size: 40px; float: right; margin-right: 100px; padding-top: 80px; font-weight: bold; color: #FFF;}

        </style>

    </head>
    <body>

        <div class="container-fluid">
            <!--Logo and Navigation-->

            <div class="row">
                <div class="col-sm-8">
                    <a href="index.php"><img src="logo/homelogoimage1.png" class="img-responsive mylogo" alt="home logo"></a>
                </div>
                <div class="col-sm-4"><a href="Login.php" class="btn btn-group mylogin">LOGIN</a></div>
            </div>


            <div class="row">
                <div class="col-sm-7 my_menu">

                    <nav class="navbar navbar-default">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="mynavbar">

                            <ul class="nav navbar-nav pull-left">
                                <li class="active"><a href="">Home</a><span class="underline_span"></li>
                                <li><a href="how_it_works.php">How it Works</a><span class="underline_span"></li>
                                <li><a href="">Ad Format</a><span class="underline_span"></li>
                                <li><a href="contact_us.php">Contact Us</a><span class="underline_span"></li>
                                <li><a href="feedback.php">Feedback</a><span class="underline_span"></li>
                            </ul>

                        </div>

                    </nav>

                </div>
                <div class="col-sm-5">

                </div>
            </div>
        </div>
        <div class="container img-shado" style="width:100%;">
            <img src="images/moover_shadow.png" alt="shadow" class="img-responsive" style="width:100%;">
            <p class="panim">Turn your <br/>business and passion<br/> into profit.</p>
        </div>

        <div class="img-div">
            <img src="images/slider image.png" alt="Slider Image" class="img-responsive">
        </div>

        <div>
            <div class="container-fluid">
                <div class="col-sm-6 divintro" height="3000px">
                    <p class="psize">AdWale is a simple way to Advertise your online business and make money online by placing ads on your website.</p>
                </div>
                <div class="col-sm-6 divintro1" height="3000px">
                    <p class="psize1">Get start with AdWale</p>
                    <div class="container-fluid">
                        <div class="row divadheader" align="center">
                            <div class="col-sm-6 userdiv userdivborder1">
                                <p class="reguser">Advertiser</p>
                                <a href="Registration.php?usertype=advertiser" class="btn btn-warning btn-lg">Register Now</a>
                            </div>
                            <div class="col-sm-6 userdiv userdivborder2">
                                <p class="reguser">Publisher</p>
                                <a href="Registration.php?usertype=publisher" class="btn btn-success btn-lg">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    

        <div style="background-color: #FF5252;">
            <div class="container">
                <div class="row" style="margin-top: 18px; margin-bottom: 18px;">
                    <div class="col-sm-4 divpad">
                        <div class="spandiv imgpad">
                            <div class="icon-part-4">
                                <img src="icons/advertiser_icon.png" alt="pub icon" class="icopart">
                            </div>
                            <hr/>
                            <div class="ppart4">
                                <p class="ppart4-1">Advertisers</p>
                                <p class="ppart4-2">Reach More Customers</p>
                                <p class="ppart4-3">AdMedia can set up compelling and targeted campaigns that are proven to grab the attention of users and turn them into paying customers.</p>
                                <div class="apartdiv4-4">
                                    <a href="#" class="apart4-4"><b>Read more &gt; </b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 divpad">
                        <div class="spandiv imgpad">
                            <div class="icon-part-4">
                                <img src="icons/publisher_icon.png" alt="pub icon" class="icopart">
                            </div>
                            <hr/>
                            <div class="ppart4">
                                <p class="ppart4-1">Publishers</p>
                                <p class="ppart4-2">Earn Extra Revenue</p>
                                <p class="ppart4-3">Add value to your website and earn money at the same time by displaying ads that your visitors actually want to see.</p>
                                <div class="apartdiv4-4">
                                    <a href="#" class="apart4-4"><b>Read more &gt; </b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 divpad">
                        <div class="spandiv imgpad">
                            <div class="icon-part-4">
                                <img src="icons/join_icon.png" alt="pub icon" class="icopart">
                            </div>
                            <hr/>
                            <div class="ppart4">
                                <p class="ppart4-1">Join Our Team</p>
                                <p class="ppart4-2">Put Your Skills to Good Use</p>
                                <p class="ppart4-3">If you're looking for job openings, swing by our careers page. You'll find listings of all the available positions in our company.</p>
                                <div class="apartdiv4-4">
                                    <a href="#" class="apart4-4"><b>Read more &gt; </b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer Part-->
        <div class="footerdiv">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4 footer-col3">
                        <span class="footertext">Copyright &copy; 2018 Adwale.com <a href="index.php"><img src="logo/homelogoimage1.png" class="img-responsive footerlogo"></a></span> 
                    </div>
                </div>
            </div>
        </div>
        <iframe src='http://localhost/OnlineAdvertisementManagementSystem/advertisement/ads_here.php?as=728 x 90&pu=pratik545p@gmail.com&wc=Shopping' width='728px' height="90px" scrolling="No" frameborder="0" hspace="0" vspace="0"></iframe>
        <a id="back2Top" title="Back to top" href="#">&#10148;</a>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
