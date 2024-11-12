<?php
// session_start();
include './database/connection.php';
include './database/functions.php';
if (isset($_POST['btns'])){ 

  $email=$_POST['email'];
  $password=$_POST['password'];
  $client=new Client();
  $client->signIn($conn, $email, $password);
}

if (isset($_SESSION['unique_code'])){
    echo '
    <script type="text/javascript">
    window.location.href="dealpage.php";
    </script>
    ';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <title>TomDeals</title>
</head>
<body>
    <nav class="nav-bar" style="z-index: 2;">
        <div class="nav-container">
        <div class="nav-navLogo">
            <a href="./index.php">
            <img src="./mediaFiles/tomDealsLogo.png" width="100%" height="100%" alt="logo">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
            </a>
        </div>
        <!-- <div class="nav-navSearch"> -->
            <!-- <select name="All" id="" class="nav-select">
                <option value="">All</option>
                <option value="">All</option>
                <option value="">All</option>
                <option value="">All</option>
            </select> -->
            <!-- <input type="text" class="search-input" placeholder="Search items or categories">
            <button class="search-button"><i class="fas fa-search"></i></button>
        </div> -->
        <div class="top-nav-drop" >
            <i class="fas fa-bars fa-bars-top" id="topDrop"></i>
        </div>
        <div class="nav-navLeft" id="NavNavLeft">
        <ul>
            <li><a href="./index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="./Support.php"><i class="fas fa-users" ></i> feedback</a></li>
            <!-- <li><a href="/website/pages/SignIn.php"><i class="fas fa-sign-in-alt"></i> SignIn</a></li> -->
            <li><a href="./SignUp.php"><i class="fas fa-sign-out-alt"></i> SignUp</a></li>
        </ul>
    </div>
</div>
    </nav>
    <div class="signin-body-container">
        <div class="image-container">
            <img src="./mediaFiles/tomDealsLogo.png" alt="">
        </div>
        <div class="form-container">
            <div class="login-header">
                <label for="#">Sign In</label>
            </div>
            <form  method="post">
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
                <div>
                    <!-- <input type="checkbox"> Remember Me
                    <br> -->
                    <a href="./forgot-password.php" class="quick-signin-a-links">Forgot password?</a>
                </div>
                <div>
                    <label>Not a Member?</label>
                    <a href="./SignUp.php" class="quick-signin-a-links">Sign Up</a>
                </div>
            </div>
            </form>
        </div>
    </div>

    <?php
    include('./components/footer.php');
    ?>
    <script>
        //DROPING TOP MAIN NAVIGATION BAR
        var topDrop=document.getElementsByClassName('fa-bars-top')[0]
        var navNavLeft=document.getElementsByClassName('nav-navLeft')[0]

        topDrop.addEventListener('click', () => {
            navNavLeft.classList.toggle('active')
        })
    </script>

    <!-- <script type="text/javascript">
   if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href)
}
</script> -->
</body>
</html>