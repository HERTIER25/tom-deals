<?php
$Phone='250785068810';
session_start();
include './database/connection.php';
if (isset($_SESSION['unique_code'])) {
    $cid = $_SESSION['unique_code'];
    $sql3 = "SELECT * FROM customer_account WHERE unique_code ='$cid'";
    $sql_run = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($sql_run);
    $sql4 = mysqli_query($conn, "SELECT * FROM item WHERE status='Approved' ORDER BY iid DESC");
    $new_arrival = mysqli_query($conn, "SELECT * FROM item WHERE status='Approved ' ORDER BY iid DESC LIMIT 6");
    $num_arrival = mysqli_num_rows($new_arrival);
} else {
    header('location:SignIn.php');
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['unique_code'])) {
        unset($_SESSION['unique_code']);
        header('location:SignIn.php');
    }
}
$category_sql = mysqli_query($conn, "SELECT * FROM category  WHERE item > 0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

    <title>TomDeals</title>
</head>

<body>
    <nav class="nav-bar">
        <div class="nav-container">
            <div class="nav-navLogo">
                <a href="dealpage.php">
                    <img src="./mediaFiles/tomDealsLogo.png" width="100%" height="100%" alt="logo">
                </a>
            </div>
            <div class="nav-navSearch">
                <!-- <select name="All" id="" class="nav-select">
                <option value="">All</option>
                <option value="">All</option>
                <option value="">All</option>
                <option value="">All</option>
            </select> -->
                <form action="" method="get" class="searchForm">
                    <input type="text" class="search-input" placeholder="Search items or categories">
                    <button class="search-button"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="top-nav-drop">
                <i class="fas fa-bars fa-bars-top" id="topDrop"></i>
            </div>
            <div class="nav-navLeft" id="NavNavLeft">
                <ul>
                    <li><a href="./Support.php"><i class="fas fa-users"></i> Feedback</a></li>
                    <?php
                    if (!isset($_SESSION['unique_code'])) {
                        ?>
                        <li><a href="./SignIn.php"><i class="fas fa-sign-in-alt"></i> SignIn</a></li>
                        <li><a href="./SignUp.php"><i class="fas fa-sign-out-alt"></i> SignUp</a></li>
                        <?php
                    }
                    ?>

                    <li><a href="./profile.php"><i class="fas fa-user"></i> Profile:
                            <?php echo $row['fname'] . $row['lname']; ?>
                        </a></li>
                </ul>
            </div>
        </div>

    </nav>
    <div class="body-container">
        <div class="nav-2">
            <div class="side-nav-drop">
                <i class="fas fa-bars fa-bars-side"></i>
            </div>
            <div class="nav-2-buttons">
                <a href="#allProd"><button>All</button></a>
                <a href="#newArrivars"><button>Today's deal</button></a>
                <a href="./Support.php"><button>Customer Service</button></a>
                <a href="./upload-property.php"><button>Upload Now</button></a>
                <a href="https://wa.me/<?php echo $Phone ?>" target="_blank"> <button>Message</i></button></a>
                <!-- <a href="./messagepage.php"> <button>Message</i></button></a> -->
                <a href="./dealpage.php? logout=logout_page"><button>Logout </i></button> </a>
            </div>
        </div>
        <div class="main-body">
            <div class="side-nav">
                <div class="categories-heading">Categories</div>
                <div class="sideNavContents">
                    <div>
                        <?php
                        while ($rows = mysqli_fetch_assoc($category_sql)) {
                            ?>
                            <a href="dealpage.php?cate_id=<?php echo $rows['cate_id']; ?>"><button>
                                    <?php echo $rows['cate_name']; ?>
                                </button></a>
                            <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
            <div class="items-container" id="newArrivars">
                <div class="new-arrivars-heading">
                    New Arrivals - Discounts
                </div>
                <div class="new-arrivals-deals">
                    <!--New Arrival Porduct 1-->
                    <!-- <div class="row"> -->
                    <?php
                    if ($num_arrival > 0) {
                        while ($row_arr = mysqli_fetch_assoc($new_arrival)) {
                            ?>
                            <div class="card col-md-4 new-arrival-prod">
                                <div class="new-prod-image">
                                    <a href="./item.php?detail_id=<?php echo $row_arr['iid']; ?>">
                                        <img src='./mediaFiles/<?php echo $row_arr['item_picture']; ?>'>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <span class="card-text noWrapText">
                                        <?php echo $row_arr['short_description']; ?>
                                    </span>
                                    <span class="card-text PriceNewArrival">Price:
                                        <?php echo number_format($row_arr['amount']);
                                        echo $row_arr['currency']; ?>&nbsp;
                                    </span>
                                    <br>
                                    <!-- <span><a class="fav-prod" href="./messagepage.php?item=<?php echo $row_arr['iid']; ?>">Make
                                            Deal</a></span> -->
                                    <span><a class="fav-prod" target="_blank" href="https://wa.me/<?php echo $Phone ?>?text=http://tomdeals.rw/item.php?detail_id=<?php echo $row_arr['iid']; ?>%0a%0aI'm%20inquiring%20about%20this%20Item">Make
                                            Deal</a></span>
                                </div>

                            </div>

                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-primary" role="alert">
                            No new arrival item was found in the store
                        </div>
                        <?php
                    }
                    ?>

                    <!--New Arrival Porduct 1-->
                    <!-- </div> -->


                </div>
                <div class="new-arrivars-heading">
                    All Products
                </div>
                <!--product table-->
                <div class="prod-nav" id="allProd">
                    <div class="container">
                        <div class="productRowView">
                            <?php

                            $sql4 = mysqli_query($conn, "SELECT * FROM item WHERE status= 'Approved' ORDER BY iid DESC ");
                            $num_row = mysqli_num_rows($sql4);
                            if (isset($_GET['cate_id'])) {
                                include 'category.php';
                            } else {
                                if ($num_row > 0) {
                                    while ($row = mysqli_fetch_assoc($sql4)) {
                                        ?>
                                        <div class="card product">
                                            <div class="prod-image">
                                                <a href="./item.php?detail_id=<?php echo $row['iid']; ?>">
                                                    <img src='./mediaFiles/<?php echo $row['item_picture']; ?>'>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="ItemDetails">
                                                    <div class="prod-name">
                                                        <?php echo $row['item_type'] . ' ' . $row['province'] . ' ' . $row['district']; ?>
                                                    </div>
                                                    <div class="SizeAndLocation">
                                                        <div>
                                                            <div class="prod-price">Size</div>

                                                            <div><i class="fas fa-vector-square"></i>
                                                                <?php echo $row['long_description']; ?>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="prod-price">Location</div>
                                                            <div><i class="fa-solid fa-location-dot"></i>
                                                                <?php echo $row['sector']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="prod-price">
                                                        Price<br>
                                                        <span class="Price">
                                                            <?php echo $row['currency'].number_format($row['amount']);?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="indexOptions">
                                                    <!-- <a class="start-deal"
                                                        href="./messagepage.php?item=<?php echo $row['iid']; ?>">Make Deal</a> -->
                                                    <a class="start-deal" target="_blank"
                                                        href="https://wa.me/<?php echo $Phone ?>?text=http://tomdeals.rw/item.php?detail_id=<?php echo $row['iid']; ?>%0a%0aI'm%20inquiring%20about%20this%20Item">Make Deal</a>
                                                    <a class="fav-prod"
                                                        href="./item.php?detail_id=<?php echo $row['iid']; ?>">View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                    }
                                } else {
                                    "No data is found in database";
                                }

                            }
                            ?>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('./components/footer.php');
    ?>
    <script type="text/javascript" src="./javascript/script.js"></script>
</body>

</html>