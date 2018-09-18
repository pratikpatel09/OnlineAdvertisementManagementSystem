<!DOCTYPE html>
<?php
session_start();
include_once 'conn.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewreport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <title>Feedback | AdWale</title>
        <link rel="stylesheet" href="css/mystyle.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript"></script>
        <style>
            .container-fluid .mylogin{
                color: #FFF; font-weight: bold; float: right; margin-top: 15px; margin-right: 10px;
                background-color: transparent;
            }
            .container-fluid .mylogin:hover{text-decoration: none; color: #FFF;}
            .mylogin-div{background-color: #00c853; float: right; padding: 7px 20px 20px 25px; display: inline-block; width: auto;}
            .mylogin-div:hover{background-color: #00b34a;}
            .divshadow{box-shadow: 0 0 5px 0 rgba(0,0,0,.3);}
            .mytab1{padding: 10px; font-size: 17px; font-weight: bold; text-align: center; border-bottom: 3px solid #448AFF; box-shadow: 0 0 5px 0 rgba(0,0,0,.3);}
            .mytab2{padding: 10px; font-size: 17px; font-weight: bold; text-align: center;}
            .mytab3{padding: 10px; font-size: 17px; font-weight: bold; text-align: center;}
            .myhr{margin-top: 0px;}
            .spanerrcolor{color:#cc0000;}
        </style>
    </head>
    <?php
        $flag=true;
        $fberr1="";
        $fberr2="";
        $fberr3="";
        if(isset($_POST['btnfbsub']))
        {
            if($_POST['txtemail']=="")
            {
                $fberr1="Please enter Email Address!";
                $flag=false;
            }
            if($_POST['txtcomment']=="")
            {
                $fberr2="Please enter Comment!";
                $flag=false;
            }
            if($flag==true)
            {
                $query=$mysqli->query("INSERT INTO feedback (email,comment,date,status) VALUES('".$_POST['txtemail']."','".$_POST['txtcomment']."','".date('Y-m-d')."','pending')");
                if($query==true)
                {
                    $fberr3="<span class='text-success'>Your feedback is submited...</span>";
                }
                else
                {
                    $fberr3="<span class='text-danger'>Your feedback is not submit!</span>";
                }
            }
            
        }
    ?>
    <body>
        <div class="container-fluid divshadow">
            <div class="row">
                <div class="col-sm-8">
                    <a href="index.php"><img src="logo/homelogoimage1.png" class="img-responsive mylogo" alt="home logo"></a>
                </div>
                <div class="col-sm-4 mylogin-div">
                    <a href="Login.php" class="mylogin">LOGIN</a>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> 
                    <form role="form" method="post">
                        <h2 class="text-center">Give your Feedback</h2>
                        <div class="row">
                            
                        </div>
                        <div class="text-center">
                        <?php echo $fberr3; ?>
                        </div>
                        <hr class="myhr">
                        <div class="form-group">
                            <input type="email" name="txtemail" id="txtemail" class="form-control input-lg" placeholder="Email Address" tabindex="1">
                            <span class="spanerrcolor"><?php echo $fberr1; ?></span>
                        </div>
                        
                        <div class="form-group">
                            <textarea class="form-control input-lg" cols="5" rows="5" name="txtcomment" placeholder="Enter Comment" tabindex="2"></textarea>
                            <span class="spanerrcolor"><?php echo $fberr2; ?></span>
                        </div>
                           <hr>

                        <div class="text-center">
                            <div class="row"><input type="submit" class="btn btn-primary btn-lg" style="width:200px;" value="Submit" name="btnfbsub" tabindex="3" ></div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
// put your code here
        ?>

    </body>
</html>
