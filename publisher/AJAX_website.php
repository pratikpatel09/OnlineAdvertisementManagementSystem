<?php
    include_once 'conn.php';
    
    //get the variable
    $siteid = $_POST['site_id'];
    
    //create query
    $del = "DELETE FROM website where website_id='". $siteid ."'";
    $result = $mysqli->query($del);
    if(!$del)
    {
        echo "Error";
    }
    else
    {
        echo "Success";
    }
    
?>