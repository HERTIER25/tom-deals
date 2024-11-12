<?php
session_start();
global $row;
include './database/connection.php';
if (isset($_GET['detail_id']) && $_GET['detail_id'] != null) {
    $detail_id = $_GET['detail_id'];
    $sql4 = mysqli_query($conn, "SELECT * FROM item  WHERE iid='" . $detail_id . "'");
    $row = mysqli_fetch_assoc($sql4);
    $cate_id = $row['cate_id'];
    $simiralItem = mysqli_query($conn, " SELECT * FROM item  WHERE status='Approved' AND cate_id='$cate_id' ORDER BY iid DESC ");
    $similar = mysqli_fetch_assoc($simiralItem);
    include('./php/postViews.php');
    $selectViews=mysqli_query($conn,"SELECT postId FROM webvisits WHERE postId='$detail_id'");
    $views=mysqli_num_rows($selectViews);

} else {
    echo '
    <script type="text/javascript">
    window.location.href="index";
    </script>
    ';
}

$sqli_resport = mysqli_query($conn, " SELECT * FROM support_message WHERE send_status='shared'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Item Details</title>
</head>

<body>
    <main>
        <?php
        include('./components/navigation.php');
        ?>
    </main>
    <div class="item-container">
        <div class="nav-2">
            <div class="side-nav-drop">
                <i class="fas fa-bars fa-bars-side"></i>
            </div>
            <div class="nav-2-buttons">
                <a href="./index#allProd"><button>All</button></a>
                <a href="./index#newArrivars"><button>Today's deal</button></a>
                <a href="./Support"><button>Customer Service</button></a>
                <!--            <a href="./pages/upload-property"><button>Upload Now</button></a>-->
            </div>
        </div>
    </div>
    <div class="items-detail-container">
        <div class="product-view-container">
            <div class="main-img-view-container">
                <div class="product-name">
                    <h2>
                        <?php echo $row['item_type'] . ' ' . $row['province'] . ' ' . $row['district']; ?>
                    </h2>
                </div>
                <div class="RatingAndViews">
                    <div class="StarRating">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="Views">
                        <?php echo $views>1? $views.' - Views':$views.' - View'; ?>
                    </div>
                </div>
                <div class="product-img">
                    <img class="mainImage" src="./mediaFiles/<?php echo $row['item_picture']; ?>" alt="">
                </div>
            </div>
            <?php
            if (isset($_GET['Video']) && ($_GET['Video'] == 'on')) {
                $selectVideoLink=mysqli_query($conn,"SELECT link FROM item WHERE iid='$detail_id'");
                $link=mysqli_fetch_assoc($selectVideoLink);
                ?>
                <div class="videoContainer">
                <?php echo $link['link']; ?>
                <a href="./item?detail_id=<?php echo $_GET['detail_id']; ?>" class="closeVideo">Close</a>
                    </div>
                <?php
            }
            ?>
            <div class="side-imgs-container">
                <div class="side-img 1 primary" onclick="changeImage(this)">
                    <img class="sideimg" src="./mediaFiles/<?php echo $row['item_picture']; ?>" alt="">
                </div>
                <div class="side-img" onclick="changeImage(this)">
                    <img class="sideimg1" src="./mediaFiles/<?php echo $row['picture_2']; ?>" alt="">
                </div>
                <div class="side-img" onclick="changeImage(this)">
                    <img class="sideimg1" src="./mediaFiles/<?php echo $row['picture_3']; ?>" alt="">
                </div>
                <div class="side-img" onclick="changeImage(this)">
                    <img class="sideimg1" src="./mediaFiles/<?php echo $row['picture_4']; ?>" alt="">
                </div>
                <div class="side-img" onclick="changeImage(this)">
                    <img class="sideimg1" src="./mediaFiles/<?php echo $row['picture_4']; ?>" alt="">
                </div>
                <div class="side-img" onclick="changeImage(this)">
                    <img class="sideimg1" src="./mediaFiles/<?php echo $row['picture_4']; ?>" alt="">
                </div>
                <?php
                if ($row['link'] != null) {
                    ?>
                    <a class="videoLink" href="./item?detail_id=<?php echo $row['iid']; ?>&Video=on">
                        <div class="playYoutubeVideo">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </a>

                    <?php
                }
                ?>
                <script>
                    function changeImage(event) {
                        document.querySelector('.mainImage').src = event.children[0].src;
                    }
                </script>
            </div>
            <div class="about-prod-container">
                <div class="about-heading">
                    <h2>About Item</h2>
                </div>
                <div class="about-description">
                    <div>
                        <li>
                            <?php echo $row['short_description']; ?>
                        </li>
                        <li>Location:
                            <?php echo $row['province'] . ' - ' . $row['district'] . ' - ' . $row['sector']; ?>
                        </li>
                        <li>Size:
                            <?php echo $row['long_description']; ?>
                        </li>
                        <li>Price:
                            <?php echo number_format($row['amount']);
                            echo $row['currency']; ?>
                        </li>
                        <li>Upload Date:
                            <?php echo $row['uploadDate']; ?>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="feedback-info-container">
            <div class="prod-info">
                <div>
                    <h2>Item Information </h2>
                </div>
                <div class="prod-info-content">
                    <li>
                        <?php echo $row['short_description']; ?>
                    </li>
                    <li>Price:
                        <?php echo number_format($row['amount']);
                        echo $row['currency']; ?>
                    </li>
                    <li>Province:
                        <?php echo $row['province']; ?>
                    </li>
                    <li>District:
                        <?php echo $row['district']; ?>
                    </li>
                    <li>Sector:
                        <?php echo $row['sector']; ?>
                    </li>
                </div>
            </div>
            <div class="feedback">
                <div>
                    <h2>Feedback</h2>
                </div>
                <?php
                while ($row = mysqli_fetch_assoc($sqli_resport)) {
                    ?>
                    <!-- <div> -->
                    <!-- <div class="feedback-content"> -->
                    <div class="feedback-content">
                        <!-- <div style="padding: 10px; background-color: red;">
                            <div style="padding: 10px; background-color: green;">
                            </div>
                        </div> -->
                        <div class="feed-user-image"><img src="./mediaFiles/nuova-hyundai-santa-fe.jpg" alt=""></div>
                        <div>
                            <div class="Feed-user-name">
                                <p>
                                    <?php echo $row['name']; ?>
                                </p>
                            </div>
                            <div class="feed-user-content">
                                <p>
                                    <?php echo $row['message']; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="flex"> -->
                    <!-- <div></div> -->
                    <!-- <div class="feed-user-image"> -->
                    <!-- <img src="./mediaFiles/nuova-hyundai-santa-fe.jpg" alt=""> -->
                    <!-- </div> -->
                    <!-- <div class="Feed-user-name"> -->
                    <!-- <p><?php // echo $row['name'];?></p> -->
                    <!-- </div> -->
                    <!-- <div class="feed-user-content"> -->
                    <!-- <p> -->
                    <?php //echo $row['message'];?>
                    <!-- </p> -->
                    <!-- </div> -->
                    <?php
                }
                ?>
            </div>
        </div>
        <!-- <div class="feedback-info-container">
                <div>
                <h2>Simiral Items</h2>
            </div>

            <div>
                <div></div>
            </div>
            </div> -->


        <!-- <div class="flex feed-btns">
                    <div class="feed-user-helpful">
                        <button>helpfull</button>
                    </div>
                    <div class="Feed-user-abuse">
                        <button>Report</button>
                    </div>
                </div> -->
                <div class="feedback-info-container">
            <div class="prod-info">
                <div>
                    <h2>Recomended Items</h2>
                </div>
                <div class="prod-info-content prod-info-content-row">
                <?php
                $new_arrival = mysqli_query($conn, "SELECT * FROM item WHERE status='Approved' ORDER BY iid DESC LIMIT 10");
                $num_arrival = mysqli_num_rows($new_arrival);
                    if ($num_arrival > 0) {
                        while ($row_arr = mysqli_fetch_assoc($new_arrival)) {
                            ?>
                            <div class="card-col-md-4-new-arrival-prod-item">
                                <div class="new-prod-image">
                                    <a href="./item?detail_id=<?php echo $row_arr['iid']; ?>">
                                        <img src='./mediaFiles/<?php echo $row_arr['item_picture']; ?>'>
                                    </a>
                                </div>
                                <div class="card-body ">
                                    <br>
                                    <span class="card-text noWrapText">
                                        <?php echo $row_arr['short_description']; ?>
                                    </span>
                                    <!-- <span class="card-text">Size:<?php echo $row_arr['long_description']; ?></span>
                                        <br> -->
                                    <!-- <div class="new-prod-price"> -->
                                    <span class="card-text PriceNewArrival">Price:
                                        <?php echo number_format($row_arr['amount']);
                                        echo $row_arr['currency']; ?>&nbsp;
                                    </span>
                                    <br>
                                    <span><a class="fav-prod" target="_blank"
                                            href="https://wa.me/<?php echo $Phone ?>?text=http://tomdeals.rw/item?detail_id=<?php echo $row_arr['iid']; ?>%0a%0aI'm%20inquiring%20about%20this%20Item">Make
                                            Deal</a></span>
                                    <!-- <span><a class="fav-prod"  onclick="alert('Please! create account and Make login first');">Make Deal</a></span> -->
                                </div>

                            </div>

                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-primary" role="alert">
                            No recomended items
                        </div>
                        <?php
                    }
                    ?>
             <script>
                // Pause scroll on hover
container.addEventListener('mouseenter', function() {
    clearInterval(scrollInterval); // Stop scrolling on hover
});

// Resume scroll when the mouse leaves
container.addEventListener('mouseleave', function() {
    autoScroll(); // Restart scrolling when mouse leaves
});

             </script>
            </div>
            </div>
            </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->
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