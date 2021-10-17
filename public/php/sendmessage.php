<?php

    $url = "http://66.45.237.70/api.php";
    $number= $POST["phone"];
    $text="You are selected for vaccine. First Dose: ";
    $data= array(
    'username'=>"01303016230",
    'password'=>"8V5DANTP",
    'number'=>"$number",
    'message'=>"$text"
    );

    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);
    $p = explode("|",$smsresult);
    $sendstatus = $p[0];

?>