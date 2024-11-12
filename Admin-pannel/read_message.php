<?php
include './database/connection.php';
$status=1;
$read_message="";
if(isset($_GET['read_id']))
  {
      if ($_GET['read_id'])
      {
        $read_id=$_GET['read_id'];
      }

    $update_message_table=mysqli_query($conn, "UPDATE support_message SET status='".$status."' WHERE sid='".$read_id."'");

  }

if(isset($_GET['read_ids']))
{
    if ($_GET['read_ids'])
    {
      $read_idd=$_GET['read_ids'];
        $del_sql=mysqli_query($conn,"DELETE FROM support_message WHERE sid='".
            $read_idd."'");
        if ($del_sql)
        {
        echo "<script> alert('message has been deleted ');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Read Message</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="container py-4">
    <table class="table table-hover ">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">SenderEmail</th>
            <th scope="col">ReceiverEmail</th>
            <th scope="col">Message</th>
            <th scope="col">Time</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php

        if (isset($_GET['read_id']))
        {
            $read_id=$_GET['read_id'];
            $ss=mysqli_query($conn,"SELECT * FROM support_message
     WHERE status='".$status."' AND sid='".$read_id."'");
            while ($row=mysqli_fetch_assoc( $ss))
            {
                ?>
                  <tr id="<?php echo $row['sid'];?>">
                   <th scope="row"><?php echo $row['sid'];?></th>
                   <td><?php echo $row['sender_email'];?></td>
                    <td><?php echo $row['receiver_email'];?></td>
                    <td><?php echo $row['message'];?></td>
                    <td><?php echo $row['time_sent'];?></td>
                    <td> <a href="read_message?read_ids=<?php echo  $row['sid']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg></a>
                        &nbsp; &nbsp;
                    <a  href="#"  data-role="share" data-id="<?php echo $row['sid'];?>" id="shares">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                         <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                      </svg>
                        <?php echo $row['send_status']?>

                    </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

    <div class="m-auto" style="position: relative; left: 80%">
        <a href="admin-home" class="btn btn-success"> Back to admin</a>
    </div>
</div>
 <script>
   $(document).ready(function(){
     $('a[data-role=share]').click(function(){
     var id=$(this).data('id');
       $.ajax({
       url:'update_message.php',
       method:'post',
       data:{sid:id},
       success:function(response){
         $('a[data-role=share]').text(response);
      }
     });
    });
   });
 </script>
</body>
</html>



