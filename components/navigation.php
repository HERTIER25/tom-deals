<?php
if(isset($_SESSION['unique_code'])){
    $cid = $_SESSION['unique_code'];
}else{
    $cid='';
}
$sql_run = mysqli_query($conn,"SELECT * FROM customer_account WHERE unique_code ='$cid'");
$UserRow = mysqli_fetch_assoc($sql_run);
?>

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
                <li><a href="./index"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="./Support"><i class="fas fa-users"></i> Feedback</a></li>
                <?php
                if (isset($_SESSION['unique_code'])) {
                    ?>
                    <li><a href="./profile"><i class="fas fa-user"></i> Profile:
                            <?php echo $UserRow['fname'] . $UserRow['lname']; ?>
                        </a></li>
                    <?php
                }else{
                    ?>
                    <li><a href="./SignIn"><i class="fas fa-sign-in-alt"></i> SignIn</a></li>
                    <li><a href="./SignUp"><i class="fas fa-sign-out-alt"></i> SignUp</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>