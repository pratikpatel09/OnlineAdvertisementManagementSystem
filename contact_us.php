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
                                <li><a href="index.php">Home</a><span class="underline_span"></li>
                                <li><a href="how_it_works.php">How it Works</a><span class="underline_span"></li>
                                <li><a href="">Ad Format</a><span class="underline_span"></li>
                                <li class="active"><a href="">Contact Us</a><span class="underline_span"></li>
                                <li><a href="feedback.php">Feedback</a><span class="underline_span"></li>
                            </ul>

                        </div>

                    </nav>

                </div>
                <div class="col-sm-5">

                </div>
            </div>
        </div>
        

        <div class="container">
            <div style="min-height: 80px;"></div>
            <div class="row">
                <div class="col-sm-6">
                     <div class="container_12">
                <div class="grid_5">
                    <h3>CONTACT INFO</h3>
                    <div class="map">
                        <p class="text-justify">AdWale is a simple way to Advertise your online business and make money online by placing ads on your website.</p>
                        <p class="text-justify">If you have any questions regarding this system,then always ask Online Advertise Management System to help you.</p>
                        <br><br><br><br>
                        <div class="clear"></div>

                        <address>
                            <dl>
                                <dt>AdWale
                                </dt>
                                <dd><span>Mobile No.:</span>+91 7819994136</dd>
                                <dd><span>Telephone:</span>+91 1122334455</dd>
                                <dd>E-mail: <a href="#">adwale.supprt18@gmail.com</a></dd>
                            </dl>
                        </address>
                    </div>
                    <div style="min-height: 50px;"></div>
                </div>
            </div>

                </div>
                <div class="col-sm-6"></div>
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
       
        <a id="back2Top" title="Back to top" href="#">&#10148;</a>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
