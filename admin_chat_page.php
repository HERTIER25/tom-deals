<?php
include './database/connection.php';
$output="";
 $joins= mysqli_query($conn,"SELECT  DISTINCT customer_account.lname , customer_account.fname
  from customer_account inner join  messages on
  messages.outgoing_message_id =customer_account.unique_code");

 if(mysqli_num_rows($joins)>0)
 {
 while($row=mysqli_fetch_assoc($joins))
 {
   $output.=$row['fname'];
 }
 echo $output;
 }
 else
 {
   echo "No messages were found";
 }
?>