
<?php
include './database/connection.php';
session_start();
if(isset($_SESSION['sender_code'])){
    $incoming_message_id=$_POST['incoming_message'];
    $outgoing_message_id=$_POST['outgoing_message'];
    if(!empty($_POST['messages']))
    {
        $message=$_POST['messages'];
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


