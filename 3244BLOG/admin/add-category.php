<?php include "header.php"; ?>
<?php

error_reporting(0);
include('includes/config.php');
// Code add user 
if (isset($_POST['save'])) {
    $category = $_POST['category'];

    $query = mysqli_query($con, "insert into categorytbl (category) values('$category')");

    if ($query) {
        echo "<script>alert('Category added successfully.');</script>";
        echo "<script> location.replace('http://localhost/PHPBLOG/3244BLOG/admin/category.php') </script> ";
    } else {
        echo "<script>alert('Not added something went worng.');</script>";
        echo "<script> location.replace('http://localhost/PHPBLOG/3244BLOG/admin/add-category.php') </script> ";
    }
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category" id="category" class="form-control" placeholder="Category Name" pattern="[A-Za-z ' ']+" title="Full name must have alphabet." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Category name is required.')" oninput="this.setCustomValidity('')" onkeyup="checkCategory()">
                        <span id="status" style="font-size:12px;"></span>
                    </div>
                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery-1.11.1.min.js"></script>
<script>
    function checkCategory() {

        jQuery.ajax({
            url: "../check_category.php",
            data: 'category' + $("#category").val(),
            type: "POST",
            success: function(data) 
            {
                $("#status").html(data).css("color","red");
            },
            error: function() {}
        });
    }
</script>
<?php include "footer.php"; ?>