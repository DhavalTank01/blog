<?php include "header.php"; ?>

<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $cid = intval($_GET['id']); // user id.
    if (isset($_POST['sumbit'])) {
        $category = $_POST['category'];
        $sql = mysqli_query($con, "update  categorytbl set category='$category' where id='$cid' ");
        if ($sql) {
            echo "<script>alert('Category update successfully.');</script>";
            echo "<script>location.replace('http://localhost/PHPBLOG/3244BLOG/admin/category.php')</script> ";
        } else {
            echo "<script>alert('Error.');</script>";
            echo "<script>location.replace('http://localhost/PHPBLOG/3244BLOG/admin/users.php')</script> ";
        }
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form action="" method="POST">
                    <?php
                    $query = mysqli_query($con, "select * from categorytbl  where id ='$cid'");
                    while ($row = mysqli_fetch_array($query)) {

                    ?>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category" id="category" class="form-control" value="<?php echo htmlentities($row['category']); ?>" placeholder="Enter Category Name" pattern="[A-Za-z ' ']+" title="Full name must have alphabet." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Category name is required.')" oninput="this.setCustomValidity('')" >
                        </div>
                        <input type="submit" name="sumbit" id="sumbit" class="btn btn-primary" value="Update" required />
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery-1.11.1.min.js"></script>

<?php include "footer.php"; ?>