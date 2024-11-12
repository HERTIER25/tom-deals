<?php
include './database/connection.php';
$user=mysqli_query( $conn,"SELECT * FROM customer_account ");

?>
<table class="table">
    <thead class="thead-primary bg-primary text-white">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Job title</th>
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
        <td><?php echo $row['fname'];?></td>
         <td><?php echo $row['lname'];?></td>
         <td><?php echo $row['email'];?></td>
         <td><?php echo $row['phone'];?></td>
         <td><?php echo $row['job_title'];?></td>
         <td><a href="edit_user_page?edit_id=<?php echo $row['cid'];?> " class="btn btn-primary">Edit</a>
         <a href="admin-home?page=userspage && del_id=<?php echo $row['cid'];?>" class="btn btn-success">Delete</a></td>
        </tr>
    <?php
        $count++;
    }
    ?>
    </tbody>
</table>