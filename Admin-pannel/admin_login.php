<?php

include './database/connection.php';
//if (isset($_POST['btns'])){
//    $email=$_POST['email'];
//    $password=$_POST['password'];
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="./admin_css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../mediaFiles/tomDealsLogo.png">
    <title>TomDeals</title>
</head>
<body>

<div class="signin-body-container adminLoginContainer">
    <div class="form-container mx-auto my-5">
        <div class="login-header">
          <label for="#">Admin Panel Login</label>
        </div>
        <form  class="login_form">
            <div class="actual-form">
                <div>
                  <label for="#">EMAIL</label>
                    <input class="form-txt-inputs" type="text" placeholder="Email"
                       name="email" required>
                </div>
                <div>
                    <label for="#">PASSWORD</label>
                    <input class="form-txt-inputs" type="password" placeholder="Password" name="password" required>
                </div>
                <div>
                    <input class="submit-btn" type="submit" name="btns">
                </div>

                <div class="incorrect-password">
                    <span class="password-error">

                    </span>
                </div>
                <div>
            </div>
        </form>
    </div>
</div>

<script src="./javascript/adminjs.js">

</script>
</body>
</html>