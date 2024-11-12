<?php
include './database/connection.php';
if (isset($_GET['view_id']))
{
   $view_id=$_GET['view_id'];
   $view_query=mysqli_query($conn,"SELECT * FROM item WHERE iid ='".$view_id."'");
   $row=mysqli_fetch_assoc($view_query);
}
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eCommerce Product Detail</title>
    <link rel="stylesheet" href="admin_css/view_detail.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1">
                          <img src="../mediaFiles/<?php echo $row['item_picture'];?>"></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li><a data-target="#pic-2" data-toggle="tab"> <img src="../mediaFiles/<?php echo $row['item_picture'];?>"></a></li>
                        <li><a data-target="#pic-2" data-toggle="tab"> <img src="../mediaFiles/<?php echo $row['item_picture'];?>"></a></li>
                        <li><a data-target="#pic-3" data-toggle="tab"> <img src="../mediaFiles/<?php echo $row['item_picture'];?>"></a></li>
                        <li><a data-target="#pic-4" data-toggle="tab"> <img src="../mediaFiles/<?php echo $row['item_picture'];?>"></a></li>
                        <li><a data-target="#pic-5" data-toggle="tab"> <img src="../mediaFiles/<?php echo $row['item_picture'];?>"></a></li>
                    </ul>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">Item type: <?php echo $row['item_type']?> </h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
<!--                        <span class="review-no">41 reviews</span>-->
                    </div>
                    <p class="product-description"> <?php echo $row['short_description']?>.</p>
                    <h4 class="price">current price: <span> <?php echo $row['currency']?><?php echo $row['amount']?></span></h4>
<!--                    <p class="vote"><strong>91%</strong>of buyers enjoyed this product! <strong>(87 votes)</strong></p>-->
                    <h5 class="sizes">Status:
                        <?php echo $row['status']?>
                    </h5>
                    <h5 class="colors">Size:

<!--                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>-->
<!--                        <span class="color green"></span>-->
                        <span class="color ">
                              <?php echo $row['long_description']?>
                        </span>
                    </h5>
                    <div class="action">
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>