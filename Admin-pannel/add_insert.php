
<?php
include './database/connection.php';

$output="";
if (!empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['name']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $ad_code=rand(time(),10000000);
    $sql_check=mysqli_query($conn,"SELECT * FROM admin where email='".$email."'");
    if (mysqli_num_rows($sql_check)>0)
    {
     $output=' <div class="alert alert-warning" role="alert">
       Please! Admin allready exists, create new one.
    </div>';
    }
    else
    {
       $sql_add=" INSERT INTO `admin`( `email`, `password`, `sms_code`, `name`, `status`)
    VALUES ('".$email."','".$password."','".$ad_code."','".$name."','online')";
        if(mysqli_query($conn,$sql_add))
        {
       $output='<div class="alert alert-warning" role="alert">
       New admin has been created successfully.
      </div>';
        }
    }
}
else
{
    $output=' <div class="alert alert-warning" role="alert">
   Some Filds are empty  Please! fill all the filds
    </div>';
}
echo $output;
?>

