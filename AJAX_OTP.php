<?php

session_start();

$conditionval = $_POST['infocondition'];

if ($conditionval == "thisotp1") {
    echo "<font color='#31708f'>sending OTP, please check your phone.</font>";
    $contact_no = $_SESSION['ses_contact_no'];

    //Your authentiction key
    $authKey = ""; //put your Authentication key here
//Multiple Mobile numbers separated by comma
    $mobileNumber = $contact_no;
//Sender ID, While using route4 sender id should be 6  characters long.
    $senderId = "AdWale";
//Your message to send, Add URL encoding here.
    $rndno = rand(1000, 9999); //Generate random number using rand function.
    $_SESSION['otp'] = $rndno;
    $message = urldecode("AdWale verification code is " . $rndno . "\n\n\n Thank you!");
//Define route
    $route = "route=4";
//Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
//API URL
    $url = "https://control.msg91.com/api/sendhttp.php"; //put your smp api provide by the  sms gateway company
//init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
    ));

//Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
    $output = curl_exec($ch);
//print error if any
    if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);
} 

else if ($conditionval == "thisotp2") {
    
    $user_eml = $_SESSION['ses_user_email'];

    $eemail = $user_eml;
    $ufnm=$_SESSION['ses_fname'];
    $ulnm=$_SESSION['ses_lname'];
    $rndno = rand(1000, 9999); //Generate random number using rand function.
    $_SESSION['otp'] = $rndno;
    
    $to = $eemail;
    $subject = "Verification : AdWale";
    $txt = "<h3>Hello $ufnm $ulnm ($eemail), <br/><br/><br/> Your <font color='#5190F7'>A</font>d<font color='#5190F7'>W</font>ale verification Code is : <font color='#3c763d'>" . $rndno . "</font></h3>";
    $txt .= "<br/><br/><h3>Thank You!</h3>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: adwale.supprt18@gmail.com";

    if (mail($to, $subject, $txt, $headers)) {
        echo "<font color='#31708f'>sending OTP, please check your email.</font>";
    } else {
        echo "<font color='red'>Mail not send, please try again!</font>";
    }
}

if ($conditionval == "thisotp3") {
    $myotp = $_POST['infootp'];
    if ($myotp == $_SESSION['otp']) {
        echo "<span id='mymsgspan' style='color:green;'>Verification is success.</span>";
    } else {
        echo "Your entered otp is wrong.!";
    }
}
?>

