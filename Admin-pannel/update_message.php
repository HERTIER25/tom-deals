<?php
include './database/connection.php';
$share="";
$sid=$_POST['sid'];
$message_status=mysqli_query($conn,"SELECT * FROM support_message WHERE 
  sid ='".$sid."'");
if($message_status)
{
    $row=mysqli_fetch_assoc($message_status);
    $status=$row['send_status'];
    if ($status=='shared')
    {
      $share='not shared';
      $sql_send=mysqli_query($conn,"UPDATE support_message SET send_status 
     ='".$share."' WHERE sid ='".$sid."'");
        if($sql_send)
        {
    $message_status=mysqli_query($conn,"
        SELECT * FROM support_message WHERE  sid = '".$sid."'");
       if($message_status)
            {
           $row=mysqli_fetch_assoc($message_status);
           echo $row['send_status'];
         }
        }
    }
    else
    {
     $share='shared';
     $sql_send=mysqli_query($conn,"UPDATE support_message SET send_status 
      ='".$share."' WHERE sid ='".$sid."'");
      if ($sql_send)
        {
            $message_status=mysqli_query($conn,"SELECT * FROM support_message WHERE 
           sid ='".$sid."'");
            if ( $message_status)
            {
                $row=mysqli_fetch_assoc( $message_status);
                echo  $row['send_status'];
            }
        }
    }
}
?>