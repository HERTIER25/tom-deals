<?php
include './database/connection.php';
$cate_id = null;
if (isset($_GET['cate_id'])) {
    $cate_id = $_GET['cate_id'];
}
$sql4 = mysqli_query($conn, "SELECT * FROM item WHERE status='Approved'
AND cate_id='" . $cate_id . "' ");

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
                    For sale<br>
                    <span class="Price">
                        <?php echo $row['currency'] . number_format($row['amount']); ?>
                    </span>
                </div>
            </div>
            <div class="indexOptions">
                <!-- <a class="start-deal"
                                                        href="./messagepage.php?item=<?php echo $row['iid']; ?>">Make Deal</a> -->
                <a class="start-deal"
                    href="https://wa.me/250786585008?text=http://tomdeals.rw/item.php?detail_id=<?php echo $row['iid']; ?>%0a%0aI'm%20inquiring%20about%20this%20Item">Make
                    Deal</a>
                <a class="fav-prod" href="./item.php?detail_id=<?php echo $row['iid']; ?>">View</a>
            </div>
        </div>
    </div>
    <?php
}

?>