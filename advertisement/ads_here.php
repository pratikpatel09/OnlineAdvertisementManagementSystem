<!DOCTYPE html>
<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "oams_db");

//Ads is started
$result =$mysqli->query("SELECT u_email,status,ads_name,ad_startdate FROM advertisement WHERE ad_startdate='".date('Y-m-d')."'");
while($rowdt=$result->fetch_assoc())
{
    if($rowdt['status']=="waiting")
    {
        $dtstart=$mysqli->query("UPDATE advertisement SET status='started' WHERE ad_startdate='".date('Y-m-d')."'");
        if($dtstart==true)
        {
            $adv_emailid=$rowdt['u_email'];
                    
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
    }
}
//Ads is stopped
$result =$mysqli->query("SELECT u_email,ads_name,status,ad_startdate FROM advertisement WHERE ad_enddate='".date('Y-m-d',strtotime("-1 days"))."'");
while($rowdt=$result->fetch_assoc())
{
    if($rowdt['status']=="started")
    {
        //==========Below code removing===========
        $dtstart=$mysqli->query("UPDATE advertisement SET status='stopped' WHERE ad_enddate='".date('Y-m-d',strtotime("-1 days"))."'");
        if($dtstart==true)
        {
            $adv_emailid=$rowdt['u_email'];
                    
            $to = $adv_emailid;
                    $subject = "Ads on AdWale";
                    $txt = "<h3>Hello $adv_emailid (Advertiser), <br/><br/><br/> <span>Today, Your Advertisement is Stopped...</span></h3>";
                    $txt .= "<br/><h3><span>Ad Name: <span style='color:green;'>'".$rowdt['ads_name']."'</span></span></h3>";
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
<?php
    $perclick_rate="";
    $perimpression_rate="";
    $perclick_cost="";
    $perimpression_cost="";
    $result=$mysqli->query("SELECT * FROM rate_updates WHERE rate_status='active'");
    if($result->num_rows==1)
    {
        $row=$result->fetch_assoc();
        $perclick_rate=$row['per_click_rate'];
        $perimpression_rate=$row['per_impression_rate'];
        $perclick_cost=$row['per_click_cost'];
        $perimpression_cost=$row['per_impression_rate'];
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
        //$result=$mysqli->query("SELECT * FROM advertisement WHERE curdate() >= ad_startdate and curdate() <= ad_enddate AND ad_size='".$as."' AND ad_category='".$wc."' AND status='started' ORDER BY Rand()");
        $result=$mysqli->query("SELECT * FROM adv_wallet w,advertisement a WHERE a.u_email=w.u_email and w.money>=15 and curdate() >= a.ad_startdate and curdate() <= a.ad_enddate AND ad_size='".$as."' AND ad_category='".$wc."' AND a.status='started' ORDER BY Rand()");
        if($row=$result->fetch_assoc())
        {
            $ad_id=$row['advertisement_id'];
            echo "<a href='r3d1r3c7.php?iadr=".$row['ad_link']."&adid=".$ad_id."&pu=".$pu."&adv_id=".$row['u_email']."' target='_blank'><img src='".$row['ad_file']."'/></a>";
        }
        else
        {
            echo "";
        }
        
        ?>
                
        <?php
            //Publisher impression Count
            $query1=$mysqli->query("INSERT INTO publisher_ad_impression VALUES('".$pu."','".$ad_id."',1,'".$perimpression_rate."','".$perimpression_cost."','".date("Y-m-d")."')");
            if($query1==true)
            {
                
            }
            
        ?>
    </body>
</html>
