<!DOCTYPE html>
<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "oams_db");
$result =$mysqli->query("SELECT u_email,status,ad_startdate FROM advertisement WHERE ad_startdate='".date('Y-m-d')."'");
while($rowdt=$result->fetch_assoc())
{
    if($rowdt['status']=="waiting")
    {
        $dtstart=$mysqli->query("UPDATE advertisement SET status='started' WHERE ad_startdate='".date('Y-m-d')."'");
        if($dtstart==true)
        {
            $adv_emailid=$rowdt['u_email'];
                    
            $to = $adv_emailid;
                    $subject = "Recover password : AdWale";
                    $txt = "<h3>Hello $adv_emailid (Advertiser), <br/><br/><br/> <span> Congratulations,<br/>Today, Your Advertisement is Live...</span>";
                    $txt .= "<br/><br/><h3>Thank You!</h3>";

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: adwale.supprt18@gmail.com";

                    if (mail($to, $subject, $txt, $headers)) {
                        
                    } else {
                        
                    }
        }
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $as=$_REQUEST['as'];
        $pu=$_REQUEST['pu'];
        $wc=$_REQUEST['wc'];
        $ad_id="";
        
        $result=$mysqli->query("SELECT * FROM advertisement WHERE curdate() >= ad_startdate and curdate() <= ad_enddate AND ad_size='".$as."' AND ad_category='".$wc."' AND status='started' ORDER BY Rand()");
        if($row=$result->fetch_assoc())
        {
            $ad_id=$row['advertisement_id'];
            echo "<a href='r3d1r3c7.php?iadr=".$row['ad_link']."&adid=".$ad_id."&pu=".$pu."' target='_blank'><img src='".$row['ad_file']."'/></a>";
        }
        else
        {
            echo "";
        }
        
        /*$result = $mysqli->query("SELECT advertisement_id,ad_file,ad_link FROM advertisement WHERE ad_size='".$as."' and ad_category='".$wc."' ORDER BY Rand()");
        if($row=$result->fetch_assoc())
        {
            $ad_id=$row['advertisement_id'];
            echo "<a href='r3d1r3c7.php?iadr=".$row['ad_link']."&adid=".$ad_id."&pu=".$pu."' target='_blank'><img src='".$row['ad_file']."'/></a>";
            $ad_id=$row['advertisement_id'];
        }*/
        
        ?>
    </body>
</html>
