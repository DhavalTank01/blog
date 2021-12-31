<?php include "header.php"; ?>
<?php

error_reporting(0);
include('includes/config.php');
$pId = intval($_GET['id']);
// Code add post 
if (isset($_POST['save'])) {
    
    $img = $_FILES["img"]["name"];
    $title=$_POST['title'];
	
    
    move_uploaded_file($_FILES["img"]["tmp_name"], "postimages/$pId/" . $_FILES["img"]["name"]);
	$query = mysqli_query($con, "update  post set img='$img' ,title='$title' where id='$pId' ");    

    if ($query) {
        echo "<script>alert('Post image updated successfully.');</script>";
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
                            <label for="exampleInputPassword1">Post image</label>                            
                            <input type="file" name="img" id="img">                            
                            <img src="/PHPBLOG/3244BLOG/admin/postimages/<?php echo htmlentities($pId);?>/<?php echo htmlentities($row['img']);?>" width="200" height="100">
                        </div>

                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" required />
                    <?php } ?>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>