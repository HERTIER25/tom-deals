<?php
include './database/connection.php';
session_start();
if(isset($_GET['item'])){
    $data =$_GET['item'];
}

if(isset($_SESSION['unique_code'])) {
    $out_going_message_id=$_SESSION['unique_code'];
}

$dd=mysqli_query($conn,"SELECT * FROM admin") ;

?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="./Admin-pannel/admin_css/message_css.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
</head>
<!--Coded With Love By Mutiullah Samim-->
<body>
<div class="row justify-content-center h-100">
    <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
            <div class="card-header">

                <div class="input-group">

                    <input type="text" placeholder="Search..." name="" class="form-control search">
                    <div class="input-group-prepend">
                        <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body contacts_body">
              <span class="text-center text-white pl-5 ">Choose some one to chat with</span>
                <ui class="contacts ">
                  <?php

                  while ($row=mysqli_fetch_assoc($dd))
                  {
                  ?>
                      <li class="active">
                        <a  href="client_chart.php?add_id=<?php echo $row['sms_code'];?>">
                              <div class="d-flex bd-highlight">
                                  <div class="img_cont">
                                      <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                      <span class="online_icon"></span>
                                  </div>
                                  <div class="user_info">
                                      <span><?php echo $row['name'];?></span>
                                      <p><?php echo $row['status'];?></p>
                                  </div>
                              </div>
                         </a>
                      </li>

                 <?php
                  }
                  ?>
                </ui>
            </div>
            <div class="card-footer"></div>
        </div></div>
    <script src="./javascript/adminjs.js"></script>
</body>
</html>
