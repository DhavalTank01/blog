<?php
error_reporting(0);
include("../includes/config.php");

session_start();
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADMIN Panel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" href="../images/logo.jpg">
</head>

<body>
    <!-- HEADER -->
    <div id="header-admin">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-2">
                    <a href="post.php"><img class="logo" src="../images/logo.jpg"></a>
                </div>
                <!-- /LOGO -->
                <!-- LOGO-Out -->
                <div class="col-md-offset-9  col-md-1">
                    <?php if (strlen($_SESSION['login'])) {   ?>
                    <a href="logout.php" class="admin-logout">logout</a>
                    <?php } ?>
                </div>

                <div class="col" style="text-align:center;">

                    <?php if (strlen($_SESSION['login'])) {   ?> <p class="admin-logout"> Hello
                        <span><?php echo htmlentities($_SESSION['login']); ?></span> </p>
                    <?php } ?>
                </div>
                <!-- /LOGO-Out -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="admin-menubar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="admin-menu">

                        <li>
                            <a href="post.php">Post</a>
                        </li>
                        <li>
                            <a href="category.php">Category</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->