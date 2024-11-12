<?php
include './database/connection.php';
     session_start();
      $email=$_POST['email'];
      $password=$_POST['password'];
      $sqli=mysqli_query($conn,"
      SELECT * FROM admin WHERE email='".$email."' AND password='".$password."'");
      if(mysqli_num_rows($sqli)>0)
      {
       $data=mysqli_fetch_assoc($sqli);
       $_SESSION['sender_code']=$data['sms_code'];
       echo "success";
      }
      else
      {
       echo "Incorrect username or password";
      }
?>