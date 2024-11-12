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
$category_sql = mysqli_query($conn, "SELECT * FROM category  WHERE item > 0");
$sql4 = mysqli_query($conn, " SELECT * FROM item  WHERE status='Approved' ORDER BY iid DESC ");
$new_arrival = mysqli_query($conn, "SELECT * FROM item WHERE status='Approved' ORDER BY iid DESC LIMIT 6");
$num_row = mysqli_num_rows($sql4);
$num_arrival = mysqli_num_rows($new_arrival);
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
                <a href="./index">
                    <img src="./mediaFiles/tomDealsLogo.png" width="100%" height="100%" alt="logo">
                </a>
            </div>
            <div class="nav-navSearch">

            <form class="searchForm" action="#" method="GET">
    <input type="text" class="search-input" placeholder="Search...">
    <button type="submit" class="search-button">Search</button>
</form>

                <!-- <div class="container text-dark">
                        <div class="row rows">

                        </div>
                    </div> -->

            </div>
            <div class="top-nav-drop">
                <i class="fas fa-bars fa-bars-top" id="topDrop"></i>
            </div>
            <div class="nav-navLeft" id="NavNavLeft">
                <ul>
                    <li><a href="./index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="./Support.php"><i class="fas fa-users"></i> Feedback</a></li>
                    <li><a href="./SignIn.php"><i class="fas fa-sign-in-alt"></i> SignIn</a></li>
                    <li><a href="./SignUp.php"><i class="fas fa-sign-out-alt"></i> SignUp</a></li>
                    <li><a href="./contact.php"><i class="fas fa-sign-in-alt"></i> contact</a></li>
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
                <a href="#"><button onclick="alert('Please! create account and Make login first');">Upload
                        Now</button></a>
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
                        <!--                    <div><h3>Cars</h3></div>-->
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
                    <div>
                    </div>
                </div>
            </div>
            <div class="items-container" id="newArrivars">
                <div class="new-arrivars-heading">
                    New Arrivals - Discounts
                </div>
                <div class="new-arrivals-deals">
                    <!-- <div class="productRowView"> -->
                    <?php
                    if ($num_arrival > 0) {
                        while ($row_arr = mysqli_fetch_assoc($new_arrival)) {
                            ?>
                            <div class="card col-md-4 new-arrival-prod">
                                <div class="items">
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
                            if (isset($_GET['cate_id'])) {
                                include 'category.php';
                            } else {
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
                                                    <!-- <div class="SizeAndLocation"> -->
                                                        <div>
                                                            <div class="prod-price">Size</div>

                                                            <div><i class="fas fa-vector-square"></i>
                                                                <?php echo $row['long_description']; ?>
                                                            </div>
                                                        </div>
                                                        
                                                    <!-- </div> -->
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
                                                    <!-- <a class="start-deal"
                                                        href="./messagepage?item=<?php echo $row['iid']; ?>">Make Deal</a> -->
                                                    <a class="start-deal" target="_blank"
                                                        href="https://wa.me/<?php echo $Phone ?>?text=http://tomdeals.rw/item?detail_id=<?php echo $row['iid']; ?>%0a%0aI'm%20inquiring%20about%20this%20Item">Make
                                                        Deal</a>
                                                    <a class="fav-prod" href="./item?detail_id=<?php echo $row['iid']; ?>">View</a>
                                                </div>
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
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of main body-->
         <div>
         <div class="pagination">
            <button id="prev" disabled>Previous</button>
            <span id="page-info">Page 1 of 2</span>
            <button id="next">Next</button>
        </div>
    </div>
    <script>
        const  = document.querySelectorAll('.items');
const itemsPerPage = 5;
let currentPage = 1;

function showPage(page) {
    const totalPages = Math.ceil(items.length / itemsPerPage);
    
    // Hide all items
    items.forEach((item, index) => {
        item.style.display = 'none';
        if (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) {
            item.style.display = 'block'; // Show items for the current page
        }
    });

    // Update page info
    document.getElementById('page-info').innerText = `Page ${page} of ${totalPages}`;
    
    // Enable/disable buttons
    document.getElementById('prev').disabled = page === 1;
    document.getElementById('next').disabled = page === totalPages;
}

// Event listeners for buttons
document.getElementById('prev').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        showPage(currentPage);
    }
});

document.getElementById('next').addEventListener('click', () => {
    const totalPages = Math.ceil(items.length / itemsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        showPage(currentPage);
    }
});

// Show the first page initially
showPage(currentPage);

    </script>
         </div>
    </div>
    <?php
    include ('./components/footer.php');
    ?>
    <script type="text/javascript" src="./javascript/script.js"></script>
</body>

</html>