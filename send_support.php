<?php
include './database/connection.php';
$admin_email=$_POST['admin_email'];
$sender_email=$_POST['client_email'];
$sender_name=$_POST['client_name'];
$messages=$_POST['messages'];
$send_status="not shared";
$date_time= date("d-m-Y H:i:s");
$insert_query=mysqli_query($conn," INSERT INTO support_message(message,sender_email, receiver_email,time_sent,name,send_status)
VALUES ('".$messages."','".$sender_email."','".$admin_email."','".$date_time."','".$sender_name."','".$send_status."')");
if($insert_query)
{
   echo "success";
}
else
{
   echo "fail";
}
?>