
<?php
include './database/connection.php';
session_start();
if(isset($_SESSION['unique_code'])){
 $incoming_message_id=$_POST['incoming_message_id']; 
 $outgoing_message_id=$_POST['outgoing_message_id']; 
 
 if(!empty($_POST['message']))
   {
   	$message=$_POST['message'];
    $sql1="INSERT INTO messages(incoming_message_id,outgoing_message_id,message) VALUES('$incoming_message_id','$outgoing_message_id','$message')";
     $message_run=mysqli_query($conn,$sql1);
      if($message_run)    
      {
        echo "data has been successfully inserted in the data base";
      }
      else
      {
      	echo "there are some errors inn the  codes";
      }
  }
 else
 {
     echo "this field is empty !! please ! fill all the filed";
 }
}
?>