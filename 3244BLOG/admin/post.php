<?php include "header.php"; ?>
<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $query = mysqli_query($con, "delete from post where id = '" . $_GET['id'] . "'");
        if ($query) {
            echo "<script>alert('Delete post successfully.');</script>";
            echo "<script>location.replace('http://localhost/PHPBLOG/3244BLOG/admin/post.php')</script> ";
        } else {
            echo "<script>alert('Error.');</script>";
            echo "<script>location.replace('http://localhost/PHPBLOG/3244BLOG/admin/post.php')</script> ";
        }
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-post.php">add post</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Category</th>                       
                        <th>Author</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php $query = mysqli_query($con, "select * from post ");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo htmlentities($row['id']); ?></td>
                                <td><?php echo htmlentities($row['title']); ?></td>
                                <td><?php echo htmlentities($row['category']); ?></td>                                
                                <td><?php echo htmlentities($row['author']); ?></td>
                                <td><?php echo htmlentities($row['description']); ?></td>
                                <td><?php echo htmlentities($row['img']); ?> &nbsp &nbsp &nbsp <a href="update-image.php?id=<?php echo $row['id'] ?>"><i class='fa fa-edit'></i></a> </td>
                                <td><?php echo htmlentities($row['date']); ?></td>
                                <td class='edit'><a href="update-post.php?id=<?php echo $row['id'] ?>"><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href="post.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"> <i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
                <ul class='pagination admin-pagination'>
                    <li class="active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>