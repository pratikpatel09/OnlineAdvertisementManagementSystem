<?php
    include_once 'conn.php';
    
    //get the variable
    $userclose_id = $_POST['user_id'];
    
    //create query
    $select_adid=$mysqli->query("SELECT * FROM advertisement where u_email='".$userclose_id."'");
    while($row=$select_adid->fetch_assoc())
    {
        $adid = $row['advertisement_id'];
        $del_adv_click_count = $mysqli->query("DELETE FROM advertiser_click_count where advertisemnt_id='".$adid."'");
    }
    
    $del_ads = $mysqli->query("DELETE FROM advertisement where u_email='". $userclose_id ."'");
    $del_ad_tran = $mysqli->query("DELETE FROM advertiser_transaction where u_email='". $userclose_id ."'");
    $del_adv_wallet = $mysqli->query("DELETE FROM adv_wallet where u_email='". $userclose_id ."'"); 
    $del_user_offer = $mysqli->query("DELETE FROM user_offer where u_email='". $userclose_id ."'");
    $del_pub_ad_imp = $mysqli->query("DELETE FROM publisher_ad_impression where u_email='". $userclose_id ."'");
    $del_pub_click_count = $mysqli->query("DELETE FROM publisher_click_count where u_email='". $userclose_id ."'");
    $del_website = $mysqli->query("DELETE FROM website where u_email='". $userclose_id ."'");
    
    
    
    $delete = "DELETE FROM user_master where u_email='" . $userclose_id . "'";
    $result = $mysqli->query($delete);
    if(!$delete){
        echo "Error";
    }
    else
    {
        echo "Success";
    }
?>
