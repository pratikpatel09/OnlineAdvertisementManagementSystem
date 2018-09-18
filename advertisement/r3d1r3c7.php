<!DOCTYPE html>
<?php
date_default_timezone_set('Asia/Calcutta');
    $mysqli = new mysqli("localhost", "root", "", "oams_db");
    
    $adid=$_REQUEST['adid'];
    $pu=$_REQUEST['pu'];
    $adv_id=$_REQUEST['adv_id'];
    
    function get_client_ip_server() {
                                    $myip="";
                                    $_SERVER['HTTP_CLIENT_IP'] = "";
                                    $_SERVER['HTTP_X_FORWARDED_FOR'] = "";
                                    $_SERVER['HTTP_X_FORWARDED'] = "";
                                    $_SERVER['HTTP_FORWARDED_FOR'] = "";
                                    $_SERVER['HTTP_FORWARDED'] = "";
                                    if ($_SERVER['HTTP_CLIENT_IP'])
                                        $myip = $_SERVER['HTTP_CLIENT_IP'];
                                    else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
                                        $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                    else if ($_SERVER['HTTP_X_FORWARDED'])
                                        $myip = $_SERVER['HTTP_X_FORWARDED'];
                                    else if ($_SERVER['HTTP_FORWARDED_FOR'])
                                        $myip = $_SERVER['HTTP_FORWARDED_FOR'];
                                    else if ($_SERVER['HTTP_FORWARDED'])
                                        $myip = $_SERVER['HTTP_FORWARDED'];
                                    else if ($_SERVER['REMOTE_ADDR'])
                                        $myip = $_SERVER['REMOTE_ADDR'];
                                    else
                                        $myip = 'UNKNOWN';

                                    return $myip;
                                }
             $myip=get_client_ip_server();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php
        $perclick_rate="";
        $perimpression_rate="";
        $perclick_cost="";
        $result=$mysqli->query("SELECT * FROM rate_updates WHERE rate_status='active'");
        if($result->num_rows==1)
        {
            $row=$result->fetch_assoc();
            $perclick_rate=$row['per_click_rate'];
            $perimpression_rate=$row['per_impression_rate'];
            $perclick_cost=$row['per_click_cost'];
        }
    ?>
    
    <?php
        $endtime = mktime(23, 59, 59);
        //$myip="192.108.159.88";
        $result=$mysqli->query("SELECT * FROM visitor_tracker WHERE ip_address='".$myip."' and DATE(visitor_date_time)='".date('Y-m-d')."'");
        if($result->num_rows==0)
        {
            $query=$mysqli->query("INSERT INTO visitor_tracker (advertisement_id,ip_address,visitor_date_time) VALUES('".$adid."','".$myip."','".date('Y-m-d H:i:s')."')");
            if($query==true)
            {  
            }
            
            //Publisher Offers click rate calculate
            $pub_queryoffer=$mysqli->query("SELECT start_date,end_date,sum(rupees),status,user_type,u_email FROM offer_master om,user_offer uo WHERE om.offer_id=uo.offer_id AND om.status='active' AND curdate() >= om.start_date AND curdate() <= om.end_date AND uo.u_email='".$pu."' AND om.user_type='Publisher'");
            if($pub_queryoffer->num_rows==1)
            {
                $row=$pub_queryoffer->fetch_assoc();
                if($row['sum(rupees)']=="")
                {
                    //Publisher Click Counter
                    $query = $mysqli->query("INSERT INTO publisher_click_count VALUES('" . $pu . "','" . $adid . "',1,$perclick_rate,'" . date('Y-m-d') . "')");
                    if ($query == true) {}
                }
                else
                {
                    $pc_rate=$perclick_rate+$row['sum(rupees)'];
                    //Publisher Click Counter
                    $query = $mysqli->query("INSERT INTO publisher_click_count VALUES('" . $pu . "','" . $adid . "',1,$pc_rate,'" . date('Y-m-d') . "')");
                    if ($query == true) {}
                }
            }
            
            //Advertiser Offers click cost calculate
            $adv_queryoffer=$mysqli->query("SELECT start_date,end_date,sum(rupees),status,user_type,u_email FROM offer_master om,user_offer uo WHERE om.offer_id=uo.offer_id AND om.status='active' AND curdate() >= om.start_date AND curdate() <= om.end_date AND uo.u_email='".$adv_id."' AND om.user_type='Advertiser'");
            if($adv_queryoffer->num_rows==1)
            {
                $row=$adv_queryoffer->fetch_assoc();
                if($row['sum(rupees)']=="")
                {
                    //Advertiser Click Counter
                    $query=$mysqli->query("INSERT INTO advertiser_click_count VALUES('".$adid."',1,'".$perclick_cost."','".date('Y-m-d')."')");
                    if($query==true){
                        $wallet_total=$mysqli->query("SELECT * FROM adv_wallet WHERE u_email='".$adv_id."'");
                        if($wallet_total->num_rows==1)
                        {
                            $row=$wallet_total->fetch_assoc();
                            $calc_money=$row['money']-$perclick_cost;
                            $query=$mysqli->query("UPDATE adv_wallet SET money='".$calc_money."' WHERE u_email='".$adv_id."'");
                        }
                    }
                }
                else
                {
                    $pc_cost=$perclick_cost-$row['sum(rupees)'];
                    //Advertiser Click Counter
                    $query=$mysqli->query("INSERT INTO advertiser_click_count VALUES('".$adid."',1,'".$pc_cost."','".date('Y-m-d')."')");
                    if($query==true){
                        $wallet_total=$mysqli->query("SELECT * FROM adv_wallet WHERE u_email='".$adv_id."'");
                        if($wallet_total->num_rows==1)
                        {
                            $row=$wallet_total->fetch_assoc();
                            $calc_money=$row['money']-$pc_cost;
                            $query=$mysqli->query("UPDATE adv_wallet SET money='".$calc_money."' WHERE u_email='".$adv_id."'");
                        }
                    }
                }
            }
        }        
    
        
    ?>
    
        <?php
            $iadr = $_REQUEST['iadr'];
            header('location:'.$iadr);
        ?> 
    
    <body>
        
    </body>
</html>
