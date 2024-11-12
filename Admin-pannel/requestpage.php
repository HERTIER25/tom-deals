<?php
include './database/connection.php';
$user=mysqli_query( $conn,"SELECT * FROM item ORDER BY iid DESC;
");

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<table class="table">
    <thead class="thead-primary bg-primary text-white">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Type</th>
        <th scope="col">Province</th>
        <th scope="col">Short_description</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count=1;
    while ($row=mysqli_fetch_assoc($user))
    {
        ?>
        <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $row['item_type'];?></td>
            <td><?php echo $row['province'];?></td>
            <td><?php echo $row['short_description'];?></td>
            <td>  <img src="../mediaFiles/<?php echo $row['item_picture'];?>" style="width: 90px;"></td>
            <td>
            <a href="admin-home?aprove=<?php echo $row['iid'];?>" class="btn btn-primary">Aprove</a>
            <a href="admin-home?disap=<?php echo $row['iid'];?>" class="btn btn-success">Cancel</a>
            </td>
            <td>
              <?php echo $row['status'];?>
            </td>
        </tr>
        <?php
        $count++;
    }

    ?>
    </tbody>
</table>
<!--<script src="../javascript/prove_cancel.js"></script>-->
</body>
</html>