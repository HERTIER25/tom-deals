<?php
include './database/connection.php';
session_start();
$admin_id="";
$out_going_message_id="";
if (isset($_SESSION['unique_code']))
{
   $out_going_message_id=$_SESSION['unique_code'];
}
if(isset($_GET['add_id']))
{
  $admin_id=$_GET['add_id'];
  $ad_sql=mysqli_query($conn," SELECT * FROM admin WHERE sms_code='".$admin_id."'");
  $row=mysqli_fetch_assoc( $ad_sql);
}
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
<div class="container-fluid h-100">
    <div class="col-md-8 col-xl-6 chat">
        <div class="card">
            <div class="card-header msg_head">
                <div class="d-flex bd-highlight">
                    <div class="img_cont">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                        <span class="online_icon"></span>
                    </div>
                    <div class="user_info">
                        <span>Chat with <?php echo $row['name'];?></span>
                        <p> <?php echo $row['status'];?></p>
                    </div>
                    <div class="video_cam">
                        <span><i class="fas fa-video"></i></span>
                        <span><i class="fas fa-phone"></i></span>
                    </div>
                </div>
                <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
            </div>
            <div class="card-body msg_card_body">
            </div>
            <div class="card-footer">
                <form class="typing-area" action="#">
                <div class="input-group">
                 <div class="input-group-append">
                   <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                 </div>
                  <input type="text" name="outgoing_message_id" value="<?php echo  $out_going_message_id ;?>" hidden>
                  <input type="text" name="incoming_message_id" value="<?php echo $admin_id;?>" hidden>
                 <textarea name="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
                  <div class="input-group-append">
                   <button class="input-group-text send_btn" type="submit" ><i class="fas fa-location-arrow"></i></button>
                  </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="./javascript/clientChat.js"></script>
</body>
</html>
