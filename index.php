<?php
$Phone = '250785068810';
session_start();
if (isset($_SESSION['unique_code'])) {
    echo '
    <script type="text/javascript">
    window.location.href="dealpage";
    </script>
    ';
}
include './database/connection.php';

// Items per page
$items_per_page = 10;

// Get current page number from query parameter, default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1; // Ensure page number is at least 1

// Calculate offset
$offset = ($page - 1) * $items_per_page;

// Get total number of products
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM item WHERE status='Approved'");
$total_row = mysqli_fetch_assoc($total_result);
$total_items = $total_row['total'];
$total_pages = ceil($total_items / $items_per_page);

// Fetch products for the current page
$sql4 = mysqli_query($conn, "SELECT * FROM item WHERE status='Approved' ORDER BY iid DESC LIMIT $items_per_page OFFSET $offset");
$num_row = mysqli_num_rows($sql4);

// Fetch categories
$category_sql = mysqli_query($conn, "SELECT * FROM category WHERE item > 0");
$new_arrival = mysqli_query($conn, "SELECT * FROM item WHERE status='Approved' ORDER BY iid DESC LIMIT 6");
$num_arrival = mysqli_num_rows($new_arrival);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="tport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
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
                <a href="./index">
                    <img src="./mediaFiles/tomDealsLogo.png" width="100%" height="100%" alt="logo">
                </a>
            </div>
            <div class="nav-navSearch">
            <form action="search_page.php" method="POST" class="">
                    <input type="text" class="search-input search_field" name="search_data"
                        placeholder="Search items or categories" required>
                    <button type="submit" class="search-button sbtn" name="submit-btn-1"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="top-nav-drop">
                <i class="fas fa-bars fa-bars-top" id="topDrop"></i>
            </div>
            <div class="nav-navLeft" id="NavNavLeft">
                <ul>
                    <li><a href="./index"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="./Support"><i class="fas fa-users"></i> Feedback</a></li>
                    <li><a href="./SignIn"><i class="fas fa-sign-in-alt"></i> SignIn</a></li>
                    <li><a href="./SignUp"><i class="fas fa-sign-out-alt"></i> SignUp</a></li>
                    <li><a href="./contact"><i class="fas fa-sign-in-alt"></i> contact</a></li>
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
                <a href="./Support"><button>Customer Service</button></a>
                <a href="#"><button onclick="alert('Please! create account and Make login first');">Upload Now</button></a>
            </div>
        </div>
        <?php
        include('./components/homeslider.php');
        ?>
        <!-- start of main body-->
        <div class="main-body">
            <div class="side-nav">
                <div class="categories-heading">Categories</div>
                <div class="sideNavContents">
                    <div>
                        <?php
                        while ($rows = mysqli_fetch_assoc($category_sql)) {
                            ?>
                            <a href="index?cate_id=<?php echo $rows['cate_id']; ?>"><button>
                                    <?php echo $rows['cate_name']; ?>
                                </button></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="items-container" id="newArrivars">
                <div class="new-arrivars-heading">New Arrivals - Discounts</div>
                <div class="new-arrivals-deals">
                    <?php
                    if ($num_arrival > 0) {
                        while ($row_arr = mysqli_fetch_assoc($new_arrival)) {
                            ?>
                            <div class="card-col-md-4-new-arrival-prod">
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
                                    <span class="card-text PriceNewArrival">Price:
                                        <?php echo number_format($row_arr['amount']) . $row_arr['currency']; ?>&nbsp;
                                    </span>
                                    <br>
                                    <span><a class="fav-prod" target="_blank"
                                            href="https://wa.me/<?php echo $Phone ?>?text=http://tomdeals.rw/item?detail_id=<?php echo $row_arr['iid']; ?>%0a%0aI'm%20inquiring%20about%20this%20Item">Make
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
                </div>

                <div class="new-arrivars-heading">All Products</div>
                <div class="prod-nav" id="allProd">
                    <div class="container">
                        <div class="productRowView">
                            <?php
                            if ($num_row > 0) {
                                while ($row = mysqli_fetch_assoc($sql4)) {
                                    ?>
                                    <div class="card product">
                                        <div class="prod-image">
                                            <a href="./item?detail_id=<?php echo $row['iid']; ?>">
                                                <img src='./mediaFiles/<?php echo $row['item_picture']; ?>'>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="ItemDetails">
                                                <div class="prod-name">
                                                    <?php echo $row['item_type'] . ' ' . $row['province'] . ' ' . $row['district']; ?>
                                                </div>
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
                                                <div class="prod-price">
                                                    Price<br>
                                                    <span class="Price">
                                                        <?php echo $row['currency'] . number_format($row['amount']); ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="indexOptions">
                                                <a class="start-deal" target="_blank"
                                                    href="https://wa.me/<?php echo $Phone ?>?text=http://tomdeals.rw/item?detail_id=<?php echo $row['iid']; ?>%0a%0aI'm%20inquiring%20about%20this%20Item">Make Deal</a>
                                                <a class="fav-prod" href="./item.php?detail_id=<?php echo $row['iid']; ?>">View</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="alert alert-primary" role="alert">
                                    No products found in the store
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of main body-->
           <!-- Pagination Links -->
           <div class="pagination">
    <?php
    // Previous link
    if ($page > 1) {
        echo '<a href="?page=' . ($page - 1) . '" class="page-link">Prev</a> ';
    }

    // Page number links
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i === $page) {
            echo "<span class='current-page'>$i</span> "; // Current page
        } else {
            echo '<a href="?page=' . $i . '" class="page-link">' . $i . '</a> ';
        }
    }

    // Next link
    if ($page < $total_pages) {
        echo '<a href="?page=' . ($page + 1) . '" class="page-link">Next</a>';
    }
    ?>
</div>
    </div>
    <?php
    include('./components/footer.php');
    ?>
    <script type="text/javascript" src="./javascript/script.js"></script>
</body>

</html>
