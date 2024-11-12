<?php
// session_start();
if (isset($_SESSION['unique_code'])){
    echo '
    <script type="text/javascript">
    window.location.href="dealpage.php";
    </script>
    ';
  }
$encPassword = '';
$copassword = '';
$fname = '';
$lname = '';
$email = '';
$phone = '';
$city = '';
$jobtitle = '';
$gender = '';
$nation = '';
include './database/connection.php';
include './database/functions.php';
$passworderror = "";
if (isset($_POST['sbtn'])) {
    $password = $_POST['password'];
    $copassword = $_POST['copassword'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $jobtitle = $_POST['jobtitle'];
    $gender = $_POST['gender'];
    $nation = $_POST['nationality'];
    
    $encPassword = password_hash($password, PASSWORD_DEFAULT);
    if ($password == $copassword) {
        $client = new Client();
        if ($client->checkClient($conn, $phone, $email)) {
            echo "<script> alert('user already exists! please Login');</script>";
        } else {
            $unique_code = rand(time(), 100000000);
            $client->registerClient($conn, $fname, $lname, $email, $phone, $city, $jobtitle, $gender, $encPassword, $nation, $unique_code);
        }
    } else {
        $passworderror = " Password Confirmation does not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <title>TomDeals</title>
</head>

<body>
    <nav class="nav-bar" style="z-index: 2;">
        <div class="nav-container">
            <div class="nav-navLogo">
                <a href="./index.php">
                    <img src="./mediaFiles/tomDealsLogo.png" width="100%" height="100%" alt="logo">
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                        crossorigin="anonymous">
                    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
                </a>
            </div>
            <!-- <div class="nav-navSearch">
            <select name="All" id="" class="nav-select">
                <option value="">All</option>
                <option value="">All</option>
                <option value="">All</option>
                <option value="">All</option>
            </select>
            <input type="text" class="search-input" placeholder="Search items or categories">
            <button class="search-button"><i class="fas fa-search"></i></button>
        </div> -->
            <div class="top-nav-drop">
                <i class="fas fa-bars fa-bars-top" id="topDrop"></i>
            </div>
            <div class="nav-navLeft" id="NavNavLeft">
                <ul>
                    <li><a href="./index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="./Support.php"><i class="fas fa-users"></i> AboutUs</a></li>
                    <li><a href="./SignIn.php"><i class="fas fa-sign-in-alt"></i> SignIn</a></li>
                    <!-- <li><a href="./SignUp.php"><i class="fas fa-sign-out-alt"></i> SignUp</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-container">
        <div class="singup-body-container">
            <div class="left-heading">
                <div class="welc-title">
                    <h1 class="welc-title-hd">Welcome</h1>
                </div>
                <div>
                    <h2 class="welc-title-hd2">
                        You are 30 seconds<br>Away From Creating <br> Your Account
                    </h2>
                </div>
                <div>
                    <a href="SignIn.php"><button class="submit-btn">Login</button></a>
                </div>
            </div>
            <div class="right-part">
                <div class="signup-form-container">
                    <form method="post">
                        <div class="signUp-header">
                            <td colspan="2">Creating Your Account</td>
                        </div>
                        <div class="two-rows-form">
                            <div class="div1">
                                <div>
                                    <input class="form-txt-inputs" type="text" placeholder="First Name" name="fname"
                                        value="<?php echo $fname ?>" required>
                                </div>
                                <div>
                                    <input class="form-txt-inputs" type="text" placeholder="Last Name" name="lname"
                                        value="<?php echo $lname ?>" required>
                                </div>
                                <div>
                                    <input class="form-txt-inputs1" type="password" placeholder="Password"
                                        name="password" value="<?php echo $encPassword ?>" required>
                                </div>
                                <div>
                                    <input class="form-txt-inputs1" type="password" placeholder="Comfirm Password"
                                        name="copassword" value="<?php echo $copassword ?>" required> <br>
                                    <span style="color: red;font-size: 14px; position: relative;
                    top: 10px;">
                                        <?php echo $passworderror; ?>
                                    </span>

                                </div>
                                <div>
                                    <input type="radio" name="gender" value="M"> Male <input type="radio" name="gender"
                                        required value="F"> Female
                                </div>
                            </div>
                            <div class="div1">
                                <div>
                                    <input class="form-txt-inputs1" type="email" placeholder="Email" name="email"
                                    value="<?php echo $email ?>" required>
                                </div>
                                <div>
                                    <input class="form-txt-inputs1" type="number" placeholder="Phone" name="phone"
                                    value="<?php echo $phone ?>"  required>
                                </div>
                                <div>
                                    <input class="form-txt-inputs1" type="text" placeholder="City" name="city" value="<?php echo $city ?>" required>
                                </div>
                                <div>
                                    <select name="jobtitle" id="" class="form-txt-inputs" required>
                                        <option value="" disabled selected>Role</option>
                                        <option value="Owner">Owner</option>
                                        <option value="Builder">Builder</option>
                                        <option value="Agent">Agent</option>
                                        <option value="Renter">Renter</option>
                                        <option value="Buyer">Buyer</option>

                                    </select>
                                </div>
                                <div>
                                    <select name="nationality" id="" class="form-txt-inputs" required>

                                        <option value="" disabled selected>Nationality</option>
                                        <option value="Rwandan">Rwandan</option>
                                        <option value="Ugandan">Ugandan</option>
                                        <option value="Burundian">Burundian</option>
                                        <option value="Kenyan">Kenyan</option>

                                    </select>
                                </div>
                                <div>
                                    <input class="submit-btn" type="submit" value="Register" name="sbtn">
                                </div>
                            </div>
                        </div>
                        <!-- <table class="form-table"> -->
                    </form>
                </div>
            </div>
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