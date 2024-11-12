<?php
include './database/connection.php';
$status=1;
$status_red=0;
 $sql_update=mysqli_query($conn,
 "UPDATE support_message  SET status= '$status' WHERE status='$status_red'");
 if ($sql_update)
 {
     echo $status_red;
 }
?>