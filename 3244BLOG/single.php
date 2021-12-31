<?php include "header.php"; ?>
<?php

error_reporting(0);
include('includes/config.php');
$pId = intval($_GET['id']);

?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <?php
                $query = mysqli_query($con, "select * from post  where id ='$pId'");
                while ($row = mysqli_fetch_array($query)) {

                ?>
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo htmlentities($row['title']); ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo htmlentities($row['category']); ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'><?php echo htmlentities($row['author']); ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo htmlentities($row['date']); ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="/PHPBLOG/3244BLOG/admin/postimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['img']); ?>" style="width:490px; height:330px;" />
                            <p class="description">
                                <?php echo htmlentities($row['description']); ?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                <?php } ?>
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>