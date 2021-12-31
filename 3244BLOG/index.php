<?php include 'header.php'; ?>
<div id="main-content">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">

                    <?php $query = mysqli_query($con, "select * from post ");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href='single.php?id=<?php echo $row['id'] ?>'><img
                                        src="/PHPBLOG/3244BLOG/admin/postimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['img']); ?>"
                                        style="width:207px; height:143px;" alt="" /></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a
                                            href='single.php?id=<?php echo $row['id'] ?>'><?php echo htmlentities($row['title']); ?></a>
                                    </h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href=''><?php echo htmlentities($row['category']); ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href=''><?php echo htmlentities($row['author']); ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo htmlentities($row['date']); ?>
                                        </span>
                                    </div>

                                    <p class="description" style="height: 3em; line-height: 1.5em;overflow: hidden;">
                                        <?php echo htmlentities($row['description']); ?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row['id'] ?>'>Read
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php  } ?>

                    <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
            
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>