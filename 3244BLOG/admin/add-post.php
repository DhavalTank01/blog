<?php include "header.php"; ?>
<?php

error_reporting(0);
include('includes/config.php');
// Code add user 
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = ($_POST['category']);
    $author = ($_POST['author']);
    $img = $_FILES["img"]["name"];

    //for getting product id
    $query = mysqli_query($con, "select max(id) as pid from post");
    $result = mysqli_fetch_array($query);
    $postid = $result['pid'] + 1;
    $dir = "postimages/$postid";
    if (!is_dir($dir)) { 
        mkdir("postimages/" . $postid);
    }

    move_uploaded_file($_FILES["img"]["tmp_name"], "postimages/$postid/" . $_FILES["img"]["name"]);

    $query = mysqli_query($con, "insert into post (title,description,category, img, author) values('$title','$description','$category', '$img', '$author')");

    if ($query) {
        echo "<script>alert('Post added successfully.');</script>";
        echo "<script> location.replace('http://localhost/PHPBLOG/3244BLOG/admin/post.php') </script> ";
    } else {
        echo "<script>alert('Not added something went worng.');</script>";
        echo "<script> location.replace('http://localhost/PHPBLOG/3244BLOG/admin/add-post.php') </script> ";
    }
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" autocomplete="off" placeholder="Enter Title" pattern="[A-Za-z ' ']+" title="Title must have alphabet." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Title is required.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="post_title">Author</label>
                        <input type="text" name="author" id="author" class="form-control" autocomplete="off" placeholder="Enter Author Name" pattern="[A-Za-z ' ']+" title="Author name must have alphabet." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Author name is required.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Description." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Description is required.')" oninput="this.setCustomValidity('')"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" id="category" class="form-control" required="true" oninvalid="this.setCustomValidity('Category is required.')" oninput="this.setCustomValidity('')">
                            <option value="" selected> Select Category</option>
                            <?php $query = mysqli_query($con, "select * from categorytbl ");
                            while ($row = mysqli_fetch_array($query)) {   ?>

                                <option value="<?php echo htmlentities($row['category']); ?>"> <?php echo htmlentities($row['category']); ?> </option>

                            <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="img" id="img" required="true" oninvalid="this.setCustomValidity('Post Image is required.')" oninput="this.setCustomValidity('')">
                    </div>
                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>