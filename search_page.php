 <!-- Navigation Bar -->
<nav class="navbar">
  <div class="navbar-container">
  <a href="./index">
                    <img src="./mediaFiles/tomDealsLogo.png" width="70%" height="70%" alt="logo">
                </a>
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="support">Feedback</a></li>
      <li class="nav-item"><a class="nav-link" href="signIn">signIn</a></li>
      <li class="nav-item"><a class="nav-link" href="signUp">signUp</a></li>
      <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
    </ul>
  </div>
</nav>
 <?php
$output="";
$path='./mediaFiles';
include './database/connection.php';

if (!empty($_POST['search_data'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search_data']);
    $search_sql = mysqli_query($conn, "SELECT * FROM item
    WHERE item_type like '%$search%' OR province like '%$search%'
    OR district like '%$search%' OR sector like '%$search%'
    OR amount like '%$search%' OR currency like '%$search%'
    OR short_description like '%$search%' OR long_description like '%$search%'");

    echo "<div class=\"card-container\">";
    $rum_row = mysqli_num_rows($search_sql);
    if ($rum_row > 0) {
        while ($row = mysqli_fetch_assoc($search_sql)) {
            $output .= '<div class="card col-md-4">
                <img src="./mediaFiles' . $row['item_picture'] . '" class="card-img-top">
                <div class="card-body">
                    <span class="card-text">Item type: ' . $row['item_type'] . '</span><br>
                    <span class="card-text">Description: ' . $row['short_description'] . '</span><br>
                    <span class="card-text">Size: ' . $row['long_description'] . '</span><br>
                    <span class="card-text">Price: ' . $row['amount'] . ' ' . $row['currency'] . '</span>
                </div>
            </div>';
        }
        echo $output;
    } else {
        echo "<div class='no-results'>No data has been found</div>";
    }
}
?>
<!-- Internal CSS -->
<style>
/* General styles for the page */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Navigation Bar */
.navbar {
    background-color:#1d2228;  /* Dark background color */
    padding: 15px 20px;  /* Add padding around the navbar */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);  /* Light shadow for depth */
}

.navbar-container {
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.navbar-brand {
    color: #ecf0f1;  /* Lighter color for brand */
    font-size: 1.8rem;  /* Larger font size */
    font-weight: bold;
    text-decoration: none;
}

.navbar-nav {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar-nav .nav-item {
    margin-left: 20px;  /* Space out the items */
}

.navbar-nav .nav-link {
    color: #ecf0f1;  /* Light text color for the links */
    font-size: 1.1rem;  /* Slightly larger text for the links */
    text-decoration: none;
    transition: color 0.3s ease;  /* Smooth transition for hover effect */
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-item.active .nav-link {
    color:#aec45f;  /* Red color when hovered or active */
}

/* Hover effect for navbar items */
.nav-item:hover .nav-link {
    color:#aec45f;  /* Change link color on hover */
}

/* Active link styling */
.nav-item.active .nav-link {
    font-weight: bold;
    color: #e74c3c;  /* Active link color */
}

/* Container for the cards */
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 20px;
}

/* Style for each individual card */
.card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    width:7cm;
    border-radius:3px;
    margin: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

/* Image inside the card */
.card-img-top {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

/* Card body styling */
.card-body {
    padding: 15px;
    text-align: left;
}

/* Text style inside the card */
.card-text {
    font-size: 14px;
    color: #333;
    margin-bottom: 8px;
}

/* Title of the item (item type) */
.card-text span:first-child {
    font-weight: bold;
}

/* Card body and price styling */
.card-body .card-text:last-child {
    font-size: 16px;
    font-weight: bold;
    color: #e74c3c;
}

/* Media Queries for smaller screens */
@media (max-width: 768px) {
    .card {
        width: 45%;
    }
}

@media (max-width: 480px) {
    .card {
        width: 100%;
    }

    .navbar-nav {
        display: block;  /* Stack navbar items vertically on mobile */
        text-align: center;
    }

    .navbar-nav .nav-item {
        margin: 10px 0;  /* Add vertical spacing between nav items */
    }
}

/* No results message */
.no-results {
    font-size: 18px;
    color: #333;
    text-align: center;
    margin-top: 20px;
}
</style>
