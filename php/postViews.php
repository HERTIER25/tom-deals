<?php

if((!isset($_COOKIE['clientAddr'])) or (!isset($_COOKIE['clientId']))){
    $clientIp= $_SERVER['REMOTE_ADDR'];
    $clientId= 'USER_'.rand(1,9999);
    setcookie('clientAddr',$clientIp,time()+(86400*365));
    setcookie('clientId',$clientId,time()+(86400*365));

    $date=date('Y-m-d');
    $time=date('H:i:s');
    $insertVisitors=mysqli_query($conn,"INSERT INTO webvisits(ipAddress,visitorId,date,time)
    VALUES('$clientIp','$clientId','$date','$time')");
}else{
    $cookieExp=(time()+(86400*365));
    $clientIp= $_COOKIE['clientAddr'];
    $clientId = $_COOKIE['clientId'];
    $itemId=$_GET['detail_id'];
    $date=date('Y-m-d');
    $time=date('H:i:s');

    //CHECK IF USER ALREADY VIEWED POST
    $checkIfUserAlreadyViewedPost=mysqli_query($conn,"SELECT * FROM webvisits WHERE (ipAddress='$clientIp' OR visitorId='$clientId') AND postId='$itemId'");
    if($checkIfUserAlreadyViewedPost->num_rows==0){
        $insertVisitors=mysqli_query($conn,"INSERT INTO webvisits(ipAddress,visitorId,date,time,postId)
        VALUES('$clientIp','$clientId','$date','$time','$itemId')");
    }

}