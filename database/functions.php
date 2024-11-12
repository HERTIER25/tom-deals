<?php
session_start();
class Client
{
   public $fname;
   public $lname;
   public $email;
   public $phone;
   public $city;
   public $jobtitle;
   public $gender;
   public $password;
   public $nationality;

   public $unique_code;

   // check if user alredy registered
   function checkClient($conn, $phone, $email)
   {
      $status;
      $sql2 = "SELECT * FROM `customer_account` WHERE phone= '$phone' || email='$email'";
      $run2 = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($run2) > 0) {
         $status = true;
      } else {
         $status = false;
      }
      return $status;
   }

   // register new client
   function registerClient($conn, $fname, $lname, $email, $phone, $city, $jobtitle, $gender, $encPassword, $nationality, $unique_code)
   {
      $date = date("Y-m-d");
      $sql1 = "INSERT INTO customer_account(cid, fname, lname, email, phone, city,job_title,gender,password,date_time,nationality,unique_code) VALUES (null,'$fname','$lname','$email','$phone','$city','$jobtitle','$gender','$encPassword','$date','$nationality','$unique_code')";
      $run = mysqli_query($conn, $sql1);
      if ($run) {
         echo " <script> alert('Account created successfully!!');
      window.location.href='./SignIn.php';
   </script>";
      } else {
         echo "<script> alert('Account has not created successfully!!');</script>";
      }
   }

   function signIn($conn, $email, $password)
   {
      $sql3 = "SELECT * FROM `customer_account` WHERE email='$email'";
      $sql_run = mysqli_query($conn, $sql3);
      if (mysqli_num_rows($sql_run) > 0) {
         $account=mysqli_fetch_assoc($sql_run);
         $userPassword = $account['password'];
         if(password_verify($password,$userPassword)){
         // $data = mysqli_fetch_assoc($sql_run);

         $_SESSION['unique_code'] = $account['unique_code'];


         header('Location:./index.php');
         }
      } else {
         echo "<script>alert('password is not correct!!!');</script>";
      }

   }
}

?>
<!-- <script type="text/javascript">
   if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href)
}
</script> -->