<div class="categoryPage">
    <form action="" method="post">
        <div><label for="category">Add Category</label></div>
        <div>
            <input type="text" placeholder="Add Category" name="category">
            <button name="add">Add</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['add'])) {
    $category = $_POST['category'];
    $addCategory = mysqli_query($conn, "INSERT INTO category(cate_name) VALUES('$category')");
}
$selectCat = mysqli_query($conn, "SELECT * FROM category");

?>
<div>
    <table class="categoryTable">
        <tr>
            <th>Category</th>
            <th>Action</th>
        </tr>
        <?php
        if ($selectCat->num_rows > 0) {
            while ($data = mysqli_fetch_assoc($selectCat)):
                ?>

                <tr>
                    <td>
                        <?php echo $data['cate_name'] ?>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="catId" value=" <?php echo $data['cate_id'] ?>" id="">
                            <button name="deleteCat">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
            endwhile;
        } else {
            ?>
            <td>No data found</td>
            <?php
        }
        ?>
    </table>
</div>

<?php
if(isset($_POST['deleteCat'])){
    $catId=$_POST['catId'];
    $deleteCatQry=mysqli_query($conn,"DELETE FROM category WHERE cate_id=$catId");
    if($deleteCatQry){
        echo '
    <script type="text/javascript">
    window.location.href="admin-home?page=category";
    </script>
    ';
    }
}
?>