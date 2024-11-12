<?php
session_start();
$admin_email="goldens222sash@gmail.com";
include('./database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <title>TomDeals Support</title>
</head>
<body>
    <?php
    include('./components/navigation.php');
    ?>
    <div class="suportCont">
    <div class="feedback-support">
        <div class="support-heading">
            <h3>FEEDBACK & SUPPORT</h3>
        </div>
        <div class="support-inputs">
            <form class="support_form" action="#" method="post">
            <div>
            <input type="text" placeholder="Enter your  name" name="client_name" required >
            </div>
              <div>
                 <input type="hidden" value="<?php echo $admin_email;?>" name="admin_email">
                 <input type="text" placeholder="Enter Email your  or Phone" name="client_email" required >
              </div>
            <div>
           <textarea name="messages" id="" cols="30" rows="10" placeholder="Write your feedback or message"
           class="send_text" required></textarea>
            </div>
           <div class="alert  alert_message  alert-dismissible " role="alert" id="alert_m">
            </div>
            <div>
              <button type="submit" class="sendbtn">SEND</button>
            </div>
             </form>
        </div>
    </div>
    </div>
    <?php
    include('./components/footer.php');
    ?>
    <script src="./javascript/send_support.js"></script>
</body>
</html>