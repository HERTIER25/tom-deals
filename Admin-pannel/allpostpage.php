<?php
include './database/connection.php';
//$user=mysqli_query( $conn,"SELECT * FROM item where status='Approved'");
$user=mysqli_query($conn,"SELECT item.iid,item.item_type,
        item.amount,item.currency,
       item.province, item.short_description,
       item.short_description, 
       item.item_picture,item.unique_code, customer_account.fname,
       customer_account.job_title,customer_account.phone,
        customer_account.lname FROM item join customer_account on item.unique_code
        = customer_account.unique_code WHERE status='Approved'");
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
        <th scope="col">Itemtype</th>
        <th scope="col">Amount</th>
        <th scope="col">Province</th>
        <th scope="col">ShortDesc</th>
        <th scope="col">Firstname</th>
        <th scope="col">Role</th>
        <th scope="col">Phone</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
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
            <td><?php echo $row['amount'];?><?php echo $row['currency'];?></td>
            <td><?php echo $row['province'];?></td>
            <td><?php echo $row['short_description'];?></td>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['job_title'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td>  <img src="../mediaFiles/<?php echo $row['item_picture'];?>" style="width: 90px;"></td>
            <td>
             <a href="view_details_page?view_id=<?php echo $row['iid'];?>" class="btn btn-primary">View</a>
              <a href="admin-home?delete_id=<?php echo $row['iid'];?>" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                 <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                 <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
               </svg>
              </a>
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



