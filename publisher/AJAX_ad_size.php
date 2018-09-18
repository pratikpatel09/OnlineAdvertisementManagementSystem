<?php session_start(); 
 include_once 'conn.php';
?>

<?php
    $myadtype=$_POST['adsize'];
    
    //echo $_SESSION['ses_logid'];
    //echo $_SESSION['ses_webid'];
    
    if($myadtype=="300 x 600")
    {
        $result=$mysqli->query("SELECT * FROM website WHERE website_id='".$_SESSION['ses_webid']."'");
        if($result->num_rows==1)
        {
            $row=$result->fetch_assoc();
            echo "<iframe src='http://localhost/OnlineAdvertisementManagementSystem/advertisement/ads_here.php?as=".$myadtype."&pu=".$_SESSION['ses_logid']."&wc=".$row['website_category']."' width='300px' height='600px' scrolling='No' frameborder='0' hspace='0' vspace='0'></iframe>";
        }
        
    }
    else if($myadtype=="300 x 250")
    {
        $result=$mysqli->query("SELECT * FROM website WHERE website_id='".$_SESSION['ses_webid']."'");
        if($result->num_rows==1)
        {
            $row=$result->fetch_assoc();
            echo "<iframe src='http://localhost/OnlineAdvertisementManagementSystem/advertisement/ads_here.php?as=".$myadtype."&pu=".$_SESSION['ses_logid']."&wc=".$row['website_category']."' width='300px' height='250px' scrolling='No' frameborder='0' hspace='0' vspace='0'></iframe>";
        }
    }
    else if($myadtype=="728 x 90")
    {
        $result=$mysqli->query("SELECT * FROM website WHERE website_id='".$_SESSION['ses_webid']."'");
        if($result->num_rows==1)
        {
            $row=$result->fetch_assoc();
            echo "<iframe src='http://localhost/OnlineAdvertisementManagementSystem/advertisement/ads_here.php?as=".$myadtype."&pu=".$_SESSION['ses_logid']."&wc=".$row['website_category']."' width='728px' height='90px' scrolling='No' frameborder='0' hspace='0' vspace='0'></iframe>";
            
        }
    }
?>