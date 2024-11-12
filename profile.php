<?php
include './database/connection.php';
$m = "";
$f = "";
$nums = 0;

session_start();
$cid = null;

if (isset($_SESSION['unique_code'])) {
    $cid = $_SESSION['unique_code'];
    $sss = mysqli_query($conn, " SELECT * FROM customer_account
WHERE unique_code='$cid'
 ");
    $rows = mysqli_fetch_assoc($sss);
    $genderst = $rows['gender'];
    if ($genderst == "M") {
        $m = "checked";
    } else {
        $f = "checked";
    }
}else{
    echo '
    <script type="text/javascript">
    window.location.href="index.php";
    </script>
    ';
}

if (isset($_POST['btns'])) {
    $nation = $_POST['nation'];
    $gender = $_POST['gender'];
    $residence = $_POST['residence'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $ddate = $_POST['ddate'];
    $uploads_dir = './mediaFiles';
    $tmp_name = $_FILES["file"]["tmp_name"];
    $name = basename($_FILES["file"]["name"]);
    $dd = "UPDATE customer_account SET fname='" . $fname . "', lname='" . $lname . "', city='" . $residence . "',
    nationality='" . $nation . "', profile ='" . $name . "' WHERE unique_code='" . $cid . "'";
    if (mysqli_query($conn, $dd)) {
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        echo "<script> alert('Updated successfully!!');</script>";
    } else {
        echo "<script> alert('Noooo!1');</script>";
    }
    echo " <script> window.location.href='./profile.php' </script>";
}

$post = mysqli_query(
    $conn,
    "SELECT * FROM item WHERE unique_code='" . $cid . "'
                    AND status='Approved'"
);
$nums = mysqli_num_rows($post);


$posts = mysqli_query(
    $conn,
    "SELECT * FROM item WHERE (unique_code='" . $cid . "')
                    AND (status='Approved' OR status='Canceled' )
                     "
);
$num_no = mysqli_num_rows($posts);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <title>Profile</title>
</head>

<body class="user-profile-body">
    <nav class="nav-bar">
        <div class="nav-container">
            <div class="nav-navLogo">
                <a href="./index.php">
                    <img src="./mediaFiles/tomDealsLogo.png" width="100%" height="100%" alt="logo">
                </a>
            </div>
            <div class="top-nav-drop">
                <i class="fas fa-bars fa-bars-top" id="topDrop"></i>
            </div>
            <div class="nav-navLeft" id="NavNavLeft">
                <ul>
                    <?php
                    $sss = mysqli_query($conn, " SELECT * FROM customer_account
         WHERE unique_code='$cid'
          ");
                    $rows = mysqli_fetch_assoc($sss); ?>
                    <li><a href="./dealpage.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="./Support.php"><i class="fas fa-users"></i> AboutUs</a></li>
                    <!-- <li><a href="./SignIn.php"><i class="fas fa-sign-in-alt"></i> SignIn</a></li> -->
                    <!-- <li><a href="./SignUp.php"><i class="fas fa-sign-out-alt"></i> SignUp</a></li> -->
                    <li><a href="./profile.php"><i class="fas fa-user"></i> Profile
                            :
                            <?php echo ' ' . $rows['fname'] . ' ' . $rows['lname']; ?>
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="profile-pannel-show">
        <i class="fas fa-bars profile-bars-side"></i>
    </div>
    <div class="user-profile-container">
        <div class="profile-side-nav profile-btns-container">
            <div class="profile-msg-button-container">
                <ul>
                    <li onclick="showPannels(0,'#8DA242')" class="profile-msg-tab-btn"><i class="fas fa-home"></i>
                        Profile</li>
                    <li onclick="showPannels(1,'#8DA242')" class="profile-msg-tab-btn"><i class="fas fa-users"></i>
                        Notification
                        <span class="badge badge-success">
                            <?php
                            echo $num_no;
                            ?>
                        </span>
                    </li>
                    <li onclick="showPannels(2,'#8DA242')" class="profile-msg-tab-btn"><i class="fa fa-id-badge "></i>
                        Posts
                        <span class="badge badge-success">
                            <?php echo $nums; ?>
                        </span>
                    </li>
                    <!-- <li onclick="showPannels(3,'#8DA242')" class="profile-msg-tab-btn"><i class="fa fa-cogs"></i> Settings</li> -->
                    <!-- <a href="./messagepage.php" class="a-li"><li class="profile-msg-tab-btn"><i class="fas fa-bell"></i> Messages</li></a> -->
                </ul>
            </div>
        </div>
        <div class="profile-msg-tabs-contents">
            <div class="profile-msg-tabs-contents">
                <form method="post" enctype="multipart/form-data">
                    <div class="user-prof">


                        <div>
                            <h3>Personal Information</h3>
                        </div>
                        <div class="profile-photo-cont">

                            <div class="profile-img-cont" id="filediv">
                                <?php
                                $sss = mysqli_query($conn, " SELECT * FROM customer_account
                              WHERE unique_code='$cid' ");
                                $rows = mysqli_fetch_assoc($sss);
                                ?>


                                <div class="ProfileImageInput">
                                    <div>
                                        <img src="./mediaFiles/<?php echo $rows['profile']; ?>" alt="ProfileImage"
                                            id="photo">
                                    </div>
                                    <div>
                                        <input type="file" value="<?php echo $rows['profile']; ?>" id="file" name="file"
                                            accept="image/*" style="display: none;">
                                        <label for="file" id="filebtn">Change Picture</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="flex usernames">
                            <div>
                                <input type="text" placeholder="First Name" name="fname"
                                    value="<?php echo $rows['fname']; ?>" >
                            </div>
                            <div>
                                <input type="text" placeholder="Last Name" name="lname"
                                    value="<?php echo $rows['lname']; ?>">
                            </div>
                        </div>
                        <div class="title-user-profile">
                            <h4>Date of Birth</h4>
                        </div>
                        <div class="title-user-profile">
                            <input type="date" name="ddate" value="<?php echo $rows['date_time']; ?>">
                        </div>
                        <div class="title-user-profile">
                            <h4>Gender</h4>
                        </div>
                        <div class="title-user-profile">
                            <div>
                                <input type="radio" value="M" name="gender" <?php echo $m; ?>> Male
                            </div>
                            <div>
                                <input type="radio" value="F" name="gender" <?php echo $f; ?>> Female
                            </div>
                        </div>
                        <div class="flex usernames">
                            <div>
                                <input type="text" placeholder="residence" name="residence"
                                    value="<?php echo $rows['city']; ?>" disabled>
                            </div>
                            <div>
                                <input type="text" placeholder="Nationality" name="nation"
                                    value="<?php echo $rows['nationality']; ?>" disabled>
                            </div>

                        </div>
                        <!-- <div class="about">
                        <p>
                        About me Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Reiciendis fugiat quidem esse 
                        commodi cum, et odio perspiciatis magni labore quas, 
                        velit ipsam earum culpa, quia temporibus quibusdam ea 
                        possimus officiis?
                        </p>
                    </div> -->
                        <div class="flex Save-changes">
                            <button type="submit" name="btns">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="profile-msg-tabs-contents msgTabpan">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ItemName</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($rows_p = mysqli_fetch_assoc($posts)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $rows_p['item_type']; ?>
                                </td>
                                <td>
                                    <?php echo $rows_p['amount'] . $rows_p['currency']; ?>
                                </td>
                                <td>
                                    <?php echo $rows_p['short_description']; ?>
                                </td>
                                <td><img src="./mediaFiles/<?php echo $rows_p['item_picture']; ?>" style="width: 90px;">
                                </td>
                                <td>
                                    <?php echo $rows_p['status']; ?>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="profile-msg-tabs-contents">



                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ItemName</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($nums > 0) {

                            $i = 1;
                            while ($row_post = mysqli_fetch_assoc($post)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_post['item_type']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_post['amount'] . $row_post['currency']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_post['short_description']; ?>
                                    </td>
                                    <td><img src="./mediaFiles/<?php echo $row_post['item_picture']; ?>" style="width: 90px;">
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <p>No approved item is Found </p>
                            <?php
                        }
                        ?>



                    </tbody>
                </table>
            </div>
            <div class="profile-msg-tabs-contents">Settings tab</div>
        </div>
    </div>
</body>
<script>
    //DROPING MESSAGE PANNEL NAVIGATION BAR
    var msgSideDrop = document.getElementsByClassName('profile-bars-side')[0]
    var msgSideNav = document.getElementsByClassName('profile-btns-container')[0]

    msgSideDrop.addEventListener('click', () => {
        msgSideNav.classList.toggle('activeProfilePannel');
    })
</script>
<script>
    //DROPING TOP MAIN NAVIGATION BAR
    var topDrop = document.getElementsByClassName('fa-bars-top')[0]
    var navNavLeft = document.getElementsByClassName('nav-navLeft')[0]

    topDrop.addEventListener('click', () => {
        navNavLeft.classList.toggle('active')
    })
</script>
<script>
    //tab pannels codes

    var profile_msg_tabButtons = document.querySelectorAll(".profile-btns-container .profile-msg-button-container .profile-msg-tab-btn");
    var profile_msg_tabPannels = document.querySelectorAll(".profile-msg-tabs-contents .profile-msg-tabs-contents");

    function showPannels(pannelIndex, colorCode) {
        profile_msg_tabButtons.forEach(function (node) {
            node.style.backgroundColor = "";
            node.style.color = "";
        });
        profile_msg_tabButtons[pannelIndex].style.backgroundColor = colorCode;
        profile_msg_tabButtons[pannelIndex].style.color = "white";
        profile_msg_tabPannels.forEach(function (node) {
            node.style.display = "none";
        });
        profile_msg_tabPannels[pannelIndex].style.display = "block";
        profile_msg_tabPannels[pannelIndex].style.backgroundColor = colorCode;
    }
    showPannels(0, '#8DA242');

    const filediv = document.querySelector('.profile-img-cont');
    const image = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const filebtn = document.querySelector('#filebtn');
    // is user hover on profilw div 
    file.addEventListener('change', function () {
        const selectfile = this.files[0];
        if (selectfile) {

            const readfile = new FileReader();
            readfile.addEventListener('load', function () {
                image.setAttribute('src', readfile.result);
            });
            readfile.readAsDataURL(selectfile);
        }
    });

</script>

</html>