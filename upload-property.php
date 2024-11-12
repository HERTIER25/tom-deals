
<?php
include './database/connection.php';
session_start();
$cid_fk=null;
if (isset($_SESSION['unique_code'])){
  $cid_fk=$_SESSION['unique_code'];
}else{
    echo '
    <script type="text/javascript">
    window.location.href="index.php";
    </script>
    ';
}

if(isset($_POST['btnc'])){
$cate_id=$_POST['cate_id'];
$provice=$_POST['province'];
$district=$_POST['district'];
$sector=$_POST['sector'];
$amount=$_POST['amount'];
$currency=$_POST['currency'];
$shortword=$_POST['shortword'];
$longword=$_POST['longword'];
if($_POST['videoLink']){
    $videoLink=$_POST['videoLink'];
}else{
$videoLink=null;

}

$tmp_name=$_FILES["image"]["tmp_name"];
$tmp_name1=$_FILES["image1"]["tmp_name"];
$tmp_name2=$_FILES["image2"]["tmp_name"];
$tmp_name3=$_FILES["image3"]["tmp_name"];
$name=basename($_FILES["image"]["name"]);
$name1=basename($_FILES["image1"]["name"]);
$name2=basename($_FILES["image2"]["name"]);
$name3=basename($_FILES["image3"]["name"]);
$uploads_dir = './mediaFiles';
$cate_sql_s=mysqli_query($conn,"SELECT * FROM category WHERE cate_id='$cate_id'");
$prow=mysqli_fetch_assoc($cate_sql_s);
$p_name=$prow['cate_name'];
$sql1="INSERT INTO item(province,district,sector,amount,currency,short_description,long_description,item_picture,picture_2,picture_3,picture_4,unique_code,cate_id,item_type,link) VALUES ('$provice','$district','$sector','$amount','$currency','$shortword','$longword','$name','$name1','$name2','$name3','$cid_fk','$cate_id','$p_name','$videoLink')";
$run_data=mysqli_query($conn, $sql1);
 if($run_data){
     $cate_check=mysqli_query( $conn,"SELECT * FROM category WHERE cate_id='$cate_id'");
     $row_check=mysqli_fetch_assoc($cate_check);
      $count=$row_check['counts']+1;
    $udate_cate=mysqli_query($conn,
   "UPDATE category set item='$cate_id', counts='$count' WHERE cate_id='$cate_id'");
   move_uploaded_file($tmp_name,"$uploads_dir/$name");
   move_uploaded_file($tmp_name1,"$uploads_dir/$name1");
   move_uploaded_file($tmp_name2,"$uploads_dir/$name2");
   move_uploaded_file($tmp_name3,"$uploads_dir/$name3");
   move_uploaded_file($tmp_name4,"$uploads_dir/$name4");
   echo"<script> alert ('data has inserted successfully');</script>";
 }
 else
 {
   echo"<script> alert(' data has not been inserted successfully');</script>";
 }
}
 //$sql3="SELECT * FROM `customer_account` WHERE cid ='$cid_fk'";
 //$sql_run=mysqli_query($conn,$sql3);
 //$row=mysqli_fetch_row($sql_run);
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <title>Upload Item</title>
</head>
<body>
<main>
<?php
    include('./components/navigation.php');
    ?>
</main><center>
    <div class="upload-items-container">
         <form method="post" enctype="multipart/form-data">
        <div class="upload-items-secondary-container">
            <div class="Upload-Items-heading">
                <h1>Welcome to TomDeals</h1>
                <h3>You can upload your property now</h3>
                <p>We need some basic information<br>before you can 
                start listing and <br>Upload your product</p>
            </div>
            <?php $cate_sql=mysqli_query($conn,"SELECT * FROM category"); ?>
          
               <!--  <div class="type">
                <h3>What Is it for</h3>
                <select name="role" id="" required>
                    <option value="">Select role</option>
                    <option value="rent">Rent</option>
                    <option value="sale">Sale</option>
                </select>
            </div> -->

            <div class="property_address">
            <div>
                <h3>Address Of the Item / Property</h3>
            </div>
            <div>
                <input type="text" class="text-input-short" placeholder="Province"  name="province" required>
            </div>
            <div>
                <input type="text" class="text-input-short" placeholder="District" name="district" required>
            </div>
            <div>
                <input type="text" class="text-input-short" placeholder="Sector" name="sector" required>
            </div>
            <div class="select_type_div">
                <h3>Property Type</h3>
                <select name="cate_id" id=""  required>
                <option value="" disabled selected >Property Type</option>
                 <?php

                 while ($row_cat=mysqli_fetch_assoc($cate_sql))
                 {
                 ?>
                  <option value="<?php echo $row_cat['cate_id'];?>"><?php echo $row_cat['cate_name'] ;?></option>
                 <?php
                 }
                 ?>
                </select>
                </div>
        </div>
            <div class="pricing">
            <div>
                <h3>Pricing</h3>
            </div>
            <div>
                <input type="text" class="text-input-short" placeholder="Amount"  name="amount" required>
            </div>
            <div>
            <select id="" name="currency" required>
                <option value="" disabled selected >Currency</option>
                <option value="RWF">RWF</option>
                <option value="USD">USD</option>
            </select>
            </div>
                <div>
                <label>Size:W*L(m*2)</label>
                <br>
                <input type="text" class="text-input-short" placeholder="Size"  name="longword" required>
                <br>
            </div>
            <div>
                <textarea name="shortword" id="" cols="33" rows="5" placeholder="Put item Description"  required></textarea>
            </div>
            <div>
                <textarea name="videoLink" id="" cols="33" rows="5" placeholder="PostVideoLink"></textarea>
            </div>
        </div>
        <div class="prop-descr">
            <div>
                <h3>Images</h3>
            </div>
            <div>
                <input type="file" name="image" accept="image/*" >
            </div>
            <div>
                <input type="file" name="image1" accept="image/*" >
            </div>
         <div>
             <input type="file" name="image2" accept="image/*" >
         </div>
          <div>
             <input type="file" name="image3" accept="image/*" >
           </div>
           <div>
             <input type="file" name="image3" accept="image/*" >
           </div>
           <div>
             <input type="file" name="image3" accept="image/*" >
           </div>
           <div>
              <input type="submit" value="Save" name="btnc">
            </div>
            
            <div>
              <a href="dealpage.php">Back to home</a>
            </div>
          </div>
           
        </div>
    </form>
    </div>
    </center>
    <script src="./javascript/PreventResubmition.js"></script>
    <script>
        //DROPING TOP MAIN NAVIGATION BAR
        var topDrop=document.getElementsByClassName('fa-bars-top')[0]
        var navNavLeft=document.getElementsByClassName('nav-navLeft')[0]

        topDrop.addEventListener('click', () => {
            navNavLeft.classList.toggle('active')
        })
    </script>
</body>
</html>