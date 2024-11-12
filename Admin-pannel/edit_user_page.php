<?php
include './database/connection.php';


if (isset($_GET['edit_id']))
{
    $edit_id=$_GET['edit_id'];

    $user=mysqli_query( $conn,"SELECT * FROM customer_account WHERE cid='".$edit_id."'");
    $row=mysqli_fetch_assoc($user);
}

if (isset($_POST['update']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $job=$_POST['Jobtitle'];
   $update_query=mysqli_query($conn,"UPDATE customer_account SET fname='".$fname."',lname='".$lname."',email='".$email."',phone='".$phone."', job_title='".$job."' WHERE cid='".$edit_id."'") ;
   if ($update_query)
   {
    echo "<script>alert('Record has been Updated successfully'); </script>";
       echo "<script> location.href='../Admin-pannel/admin-home?page=userspage';</script>";
   }
   else
   {
     echo "<script>alert('Record has not been  Updated successfully'); </script>";

   }
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container" style="margin-top: 1%;">
    <form action="#" class="mb-2 add_form " method="post">
        <div class="alert alert-success"><h4 class=" text-center">Edit user Form</h4></div>
        <div class="form-group">
            <label for="name">Firstname</label>
            <input type="text" class="form-control" id="name" name="fname"
            value="<?php echo $row['fname'];?>">
        </div>
        <div class="form-group">
            <label for="name">Lastname</label>
            <input type="text" class="form-control" id="name" name="lname"
                   value="<?php echo $row['lname'];?>">
        </div>
        <div class="form-group">
            <label for="email" >Email address:</label>
            <input type="email" class="form-control  " id="email" name="email"
                   value="<?php echo $row['email'];?>" >
        </div>
        <div class="form-group">
            <label for="phone" >Phone:</label>
            <input type="number" class="form-control  " id="phone" name="phone"
             value="<?php echo $row['phone'];?>" >
        </div>
        <div class="form-group">
            <label for="Jobtitle" >Jobtitle:</label>
            <input type="text" class="form-control  " id="Jobtitle" name="Jobtitle"
                   value="<?php echo $row['job_title'];?>" >
        </div>

        <button type="submit" class="btn btn-success btt" name="update">
            <i class="fas fa-plus ">Update now</i></button>
        <button type="submit" class="btn btn-success btt" name="add">
            <i class="fas fa-plus ">Cancel</i></button>
    </form>
</div>
</body>

</html>


