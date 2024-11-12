

<?php

include './database/connection.php';
session_start();
if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $delete_query = mysqli_query($conn, "DELETE FROM customer_account WHERE cid='" . $del_id . "'");
    if ($delete_query) {
        echo "<script> location.href='../Admin-pannel/admin-home.php?page=userspage';</script>";
    }
}
$status = array('ap' => 'Approved', 'disa' => 'Canceled');
if (isset($_GET['aprove'])) {
    $aprove = $_GET['aprove'];
    $change_status_query = mysqli_query($conn, "UPDATE  item SET status='" . $status['ap'] . "'  WHERE iid='" . $aprove . "'");
    if ($change_status_query) {
        echo "<script> location.href='../Admin-pannel/admin-home.php?page=requestpage';</script>";
    }
}

if (isset($_GET['disap'])) {
    $dis = $_GET['disap'];
    $change_status_query = mysqli_query($conn, "UPDATE  item SET status='" . $status['disa'] . "'  WHERE iid='" . $dis . "'");
    if ($change_status_query) {
        echo "<script> location.href='../Admin-pannel/admin-home.php?page=requestpage';</script>";
    }
}

if (isset($_GET['delete_id'])) {
    $del_id = $_GET['delete_id'];
    $selectImageNames = mysqli_query($conn, "SELECT item_picture,picture_2, picture_3,picture_4 FROM item WHERE iid=$del_id");
    if ($selectImageNames) {
        $imagePath = '../mediaFiles/';
        while ($Imagenames = mysqli_fetch_assoc($selectImageNames)) {
            unlink($imagePath . $Imagenames['item_picture']);
            unlink($imagePath . $Imagenames['picture_2']);
            unlink($imagePath . $Imagenames['picture_3']);
            unlink($imagePath . $Imagenames['picture_4']);
        }

        $delete_query = mysqli_query($conn, "DELETE FROM item WHERE iid='" . $del_id . "'");
        if ($delete_query) {
            echo "<script> location.href='../Admin-pannel/admin-home.php?page=allpostpage';</script>";
        }
    }

}
if (isset($_GET['id'])) {
    $del_id = $_GET['id'];
    $delete_query = mysqli_query($conn, "DELETE FROM support_message WHERE sid='" . $del_id . "'");
    if ($delete_query) {
        echo "<script> location.href='../Admin-pannel/admin-home.php?page=allpostpage';</script>";
    }
}
if (isset($_SESSION['sender_code'])) {
    $sender_code = $_SESSION['sender_code'];
} else {
    header('location:../Admin-pannel/admin_login.php');
}

$message_sqli = mysqli_query(
    $conn,
    "SELECT * FROM support_message WHERE status=0"
);
$message_number = mysqli_num_rows($message_sqli);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="./admin_css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../mediaFiles/tomDealsLogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <!--    <script src="../javascript/jquery.js"></script>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>TomDeals Admin Pannel</title>
</head>

<body style="">
    <nav style="background-color: #1D2228;" class="nav-bar">
        <div class="nav-container">
            <div class="nav-navLogo">
                <img src="../mediaFiles/tomDealsLogo.png" width="100%" height="100%" alt="logo">
            </div>
            <div class="nav-navLeft">
                <ul>
                    <li><a href="http://tomdeals.rw">Official web home Page</a></li>
                    <li><a href="#" onclick="alert('create account on the main site!')">Upload A Property For Sale</a>
                    </li>
                    <li><a href="admin-home.php?page=logout">Logout</a></li>
                    <li> <!!---message notification part!>
                            <span class="btn btn-dark" id="all_notification">
                                feedback
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-bell" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                </svg>
                                <span style="font-size: 20px; position: absolute;
                            top: 73px; right:14.3%;" id="notifications">
                                    <?php
                                    echo $message_number;
                                    ?>
                                </span>
                            </span></li>
                </ul>
            </div>
        </div>
    </nav><br>
    <div class="container">
        <div class="row">
            <div class="col-md-2 bg-white">
                <ul class="AdminNavigation">
                    <a href="admin-home.php?page=dashboard">
                        <li><i class="fa-solid fa-gauge"></i> Dashboard</li>
                    </a>
                    <a href="admin-home.php?page=requestpage">
                        <li><i class="fa-solid fa-code-pull-request"></i> Request(s)</li>
                    </a>
                    <a href="admin-home.php?page=userspage ">
                        <li><i class="fa-solid fa-users"></i> Users</li>
                    </a>
                    <!-- <a href="admin-home.php? page=messagepag">
                        <li><i class="fas fa-bell"></i> Messages</li>
                    </a> -->
                    <a href="admin-home.php?page=allpostpage">
                        <li><i class="fa-solid fa-signs-post"></i> All posts</li>
                    </a>
                    <a href="admin-home.php?page=addpage">
                        <li><i class="fa-solid fa-user-plus"></i> Add Admin</li>
                    </a>
                    <!-- <a href="admin-home.php? page=settingpage">
                        <li><i class="fa fa-cogs"></i>Settings</li>
                    </a> -->
                    <a href="admin-home.php?page=category">
                        <li><i class="fa fa-cogs"></i> Add Category</li>
                    </a>
                </ul>
            </div>
            <div class="col-md-10 bg-white">
                <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == "userspage") {
                        include 'userspage.php';
                    } else if ($_GET['page'] == "requestpage") {
                        include 'requestpage.php';
                    } else if ($_GET['page'] == "messagepag") {
                        include 'message_chat.php';
                    } else if ($_GET['page'] == "allpostpage") {
                        include 'allpostpage.php';
                    } else if ($_GET['page'] == "addpage") {
                        include 'add_admin_page.php';
                    } else if ($_GET['page'] == "dashboard") {
                        include 'dashboard.php';
                    } else if ($_GET['page'] == "settingpage") {
                        include 'setting_page.php';
                    }else if ($_GET['page'] == "category") {
                        include 'category.php';
                    } else if ($_GET['page'] == "logout") {
                        if (isset($_SESSION['sender_code'])) {
                            unset($_SESSION['sender_code']);
                            echo "<script> location.href='admin_login.php'; </script>";
                        }
                    }
                }else{
                    include 'dashboard.php';

                }
                ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#all_notification').click(function () {
                $.ajax({
                    url: 'update_notification.php',
                    method: 'post',
                    success: function (response) {
                        console.log(response);
                        $("#notifications").text(response);
                    }
                });

                $("#exampleModalLong").css({ display: 'block' });
                $("#close").click(function () {
                    $("#exampleModalLong").css({ display: 'none' });
                });

                $('a[data-role=share]').click(function () {
                    var id = $(this).data('id');
                    $.ajax({
                        url: 'update_message.php',
                        method: 'post',
                        data: { sid: id },
                        success: function (response) {
                            console.log(response);
                            $("#" + id).children("td").children('a[data-role=share]').text(response);
                        }
                    });
                });
            }
            );
        });

    </script>

    <!-- Modal -->
    <div class="modal " id="exampleModalLong" tabindex="-1" style="margin-top: 10%; width: 79% ; margin-left: 12%; ">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLongTitle" style="margin-left: 34%;">Feed back notification
                        status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="close">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover  ">
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
                            $ss = mysqli_query($conn, "SELECT * FROM support_message");
                            while ($row = mysqli_fetch_assoc($ss)) {
                                ?>
                                <tr id="<?php echo $row['sid']; ?>">
                                    <th scope="row">
                                        <?php echo $row['sid']; ?>
                                    </th>
                                    <td>
                                        <?php echo $row['sender_email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['receiver_email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['message']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['time_sent']; ?>
                                    </td>
                                    <td> <a href="admin-home.php? id=<?php echo $row['sid'] ?> ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg></a>
                                        &nbsp
                                        <a href="#" data-role="share" data-id="<?php echo $row['sid']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                                            </svg>
                                            <?php echo $row['send_status']; ?>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</body>

</html>