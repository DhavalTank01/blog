<?php include "header.php"; ?>
<?php

error_reporting(0);
include('includes/config.php');
$pId = intval($_GET['id']);
// Code add post 
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = ($_POST['category']);
    $author = ($_POST['author']);   

    $query = mysqli_query($con, "update  post set title='$title',description='$description',category='$category' ,author='$author'   where id='$pId' ");

    if ($query) {
        echo "<script>alert('Post updated successfully.');</script>";
        echo "<script> location.replace('http://localhost/PHPBLOG/3244BLOG/admin/post.php') </script> ";
    } else {
        echo "<script>alert('Not updated something went worng.');</script>";
        echo "<script> location.replace('http://localhost/PHPBLOG/3244BLOG/admin/add-post.php') </script> ";
    }
}

?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php
                    $query = mysqli_query($con, "select * from post  where id ='$pId'");
                    while ($row = mysqli_fetch_array($query)) {

                    ?>

                        <div class="form-group">
                            <label for="post_title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" autocomplete="off" value="<?php echo $row['title']; ?>" placeholder="Enter Title" pattern="[A-Za-z ' ']+" title="Title must have alphabet." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Title is required.')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="post_title">Author</label>
                            <input type="text" name="author" id="author" class="form-control" autocomplete="off" value="<?php echo $row['author']; ?>" placeholder="Enter Author Name" pattern="[A-Za-z ' ']+" title="Author name must have alphabet." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Author name is required.')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Description</label>
                            <input type="text" name="description" id="description" class="form-control" rows="5" value="<?php echo $row['description']; ?>" placeholder="Enter Description." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Description is required.')" oninput="this.setCustomValidity('')">
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select name="category" id="category" class="form-control" required="true" oninvalid="this.setCustomValidity('Category is required.')" oninput="this.setCustomValidity('')">
                                <option value="<?php echo $row['category']; ?>"> <?php echo $row['category']; ?> </option>
                                <option value=""> Select Category</option>
                                <?php $query = mysqli_query($con, "select * from categorytbl ");
                                while ($row2 = mysqli_fetch_array($query)) {                            ?>

                                    <option value="<?php echo htmlentities($row2['category']); ?>">
                                        <?php echo htmlentities($row2['category']); ?> </option>

                                <?php  } ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">Post image</label>                            
                            <input type="file" name="img" id="img">                            
                            <img src="/PHPBLOG/3244BLOG/admin/postimages/<?php echo htmlentities($pId);?>/<?php echo htmlentities($row['img']);?>" width="200" height="100">
                        </div> -->

                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" required />
                    <?php } ?>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>