<?php
$class='';
$msg='';
$pass='';
$copass='';
include './database/connection.php';
include './database/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <title>Forgot Password</title>
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
            <li><a href="./Support.php"><i class="fas fa-users" ></i> AboutUs</a></li>
            <!-- <li><a href="/website/pages/SignIn.php"><i class="fas fa-sign-in-alt"></i> SignIn</a></li> -->
            <li><a href="./SignIn.php"><i class="fas fa-sign-out-alt"></i> SignUp</a></li>
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
                <label for="#">Forgot Password</label>
            </div>
            <form method="post">
                <div class="actual-form">
                    
                    
                    <?php
                    if (isset($_POST['validate'])) {
                        $emailOrPhone = $_POST['emailOrPhone'];
                        $checkPasswordOrNumber = mysqli_query($conn, "SELECT * FROM customer_account WHERE email='$emailOrPhone' OR phone='$emailOrPhone' ");
                        //CHECK IF ACCOUNT EXISTS
                        if ($checkPasswordOrNumber->num_rows > 0) {
                            $msg = "Email found";
                            $class = "notificationSuccess";
                            $EmailOrPassValue=mysqli_fetch_assoc($checkPasswordOrNumber);
                            if($EmailOrPassValue['email'] == $emailOrPhone){
                                $value=$EmailOrPassValue['email'];
                            }else{
                                $value=$EmailOrPassValue['phone'];
                            }
                            if(isset($_POST['change'])){
                                $pass = $_POST['passw'];
                                $copass= $_POST['copassw'];
                                $userId= $_POST['userId'];
                                
                                if($pass == $copass){
                                    $encPassword = password_hash($password, PASSWORD_DEFAULT);
                                $updatePassword=mysqli_query($conn,"UPDATE customer_account SET password='$encPassword' WHERE cid=$userid");
                                if($updatePassword){
                                    echo '
                                    <script type="text/javascript">
                                    window.location.href="SignIn.php";
                                    </script>
                                    ';
                                }
                                 }else{
                                     $msg = "Password does not match";
                                     $class = "notificationFail";
                                }
                            }
                            ?>
                            <div>
                        <label for="#">Email or Phone</label>
                        <input class="form-txt-inputs" type="text" placeholder="Email or Phone" name="emailOrPhone" value="<?php echo $value; ?>"
                        required>
                        <input type="hidden"  value="<?php echo $EmailOrPassValue['cid']?>" name="userId">
                    </div>

                            <div>
                                <label for="#">New Password</label>
                                <input class="form-txt-inputs" type="password" placeholder="Password" name="passw" value="<?php echo $pass ?>" required>
                            </div>
                            <div>
                                <label for="#">Comfirm Password</label>
                                <input class="form-txt-inputs" type="password" placeholder="Password" name="copassw" value="<?php echo $copass ?>" required>
                            </div>

                            <div>
                                <button class="submit-btn" name="change">Change Password</button>
                            </div>
                            <?php                            
                        } else {
                            $msg = "Email Not Found";
                            $class = "notificationFail";
                            ?>
                        <div>
                            <button class="submit-btn" name="validate">Validate</button>
                        </div>
                        <?php
                        }
                        
                    } else {
                        ?>
                        <div>
                        <label for="#">Email or Phone</label>
                        <input class="form-txt-inputs" type="text" placeholder="Email or Phone" name="emailOrPhone"
                            required>
                    </div>
                        <div>
                            <input class="submit-btn" value="Validate" type="submit" name="validate">
                        </div>
                        <?php
                    }
                    ?>
                    <div class="<?php echo $class ?>">
                    <?php echo $msg;?>
                    </div>
                    <?php
                     if(isset($_POST['change'])){
                        $pass = $_POST['passw'];
                        $copass= $_POST['copassw'];
                        $userId= $_POST['userId'];
                        $encPassword = password_hash($pass, PASSWORD_DEFAULT);
                        
                        if($pass == $copass){
                        $updatePassword=mysqli_query($conn,"UPDATE customer_account SET password='$encPassword' WHERE cid=$userId");
                        if($updatePassword){
                            echo '
                            <script type="text/javascript">
                            window.location.href="signIn.php";
                            </script>
                            ';
                        }
                         }else{
                             $msg = "Password does not match";
                             $class = "notificationFail";
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <?php
    include('./components/footer.php');
    ?>
    <script>
        //DROPING TOP MAIN NAVIGATION BAR
        var topDrop = document.getElementsByClassName('fa-bars-top')[0]
        var navNavLeft = document.getElementsByClassName('nav-navLeft')[0]

        topDrop.addEventListener('click', () => {
            navNavLeft.classList.toggle('active')
        })
    </script>
</body>

</html>