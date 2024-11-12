<?php
include './database/connection.php';
session_start();
if (isset($_SESSION['sender_code'])){
    $cid_fk=$_SESSION['sender_code'];
    echo '
      <script type="text/javascript">
      window.location.href="admin-home";
      </script>
      ';
  }else{
      echo '
      <script type="text/javascript">
      window.location.href="admin_login";
      </script>
      ';
  }
?>