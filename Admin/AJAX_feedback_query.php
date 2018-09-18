<?php
    include_once 'conn.php';
    
    //get the variable
    $feeddel_id = $_POST['infoid'];
    $feeddel_status = $_POST['infost']; 
    
    $fb_id=$_POST['ff_id'];
    $fb_status=$_POST['ff_status'];
    
    //create query
    if($feeddel_status == "pending")
    {
        $reject = "UPDATE feedback SET status='reject' where f_id='".$feeddel_id."'";
        $result = $mysqli->query($reject);
        if(!$reject)
        {
            echo "Pending Status is Changed!";
        }
        else
        {
            echo "Pending Status is Not Changed!";
        }
    }
    else if($feeddel_status == "accept")
    {
        $reject = "UPDATE feedback SET status='reject' where f_id='".$feeddel_id."'";
        $result = $mysqli->query($reject);
        if(!$reject)
        {
            echo "Accept Status is Changed!";
        }
        else
        {
            echo "Accept Status is Not Changed!";
        }
    }
    else if($feeddel_status == "reject")
    {
        $delete = "DELETE FROM feedback where f_id='" . $feeddel_id . "'";
        $result = $mysqli->query($delete);
        if(!$delete)
        {
            echo "Error";
        }
        else
        {
            echo "Success";
        }
    }
    else if($fb_status == "thistrue")
    {
        
        $fb_ddlstatusvalue=$_POST['ff_ddlstatusval'];
        $change = "UPDATE feedback SET status='".$fb_ddlstatusvalue."' where f_id='".$fb_id."'";
        $result = $mysqli->query($change);
        if(!$reject)
        {
            echo "Pending ddl Status is Changed!";
        }
        else
        {
            echo "Pending ddl Status is Not Changed!";
        }
    }
    else
    {
        echo "Danger Error!!!!";
    }
?>

