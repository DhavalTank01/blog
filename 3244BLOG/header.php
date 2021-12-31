<?php 
    error_reporting (0);
    session_start();

	include("includes/config.php");
	include("includes/function.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blog</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/main.css">

    <link rel="icon" href="images/logo.jpg">

    <style>


    </style>

</head>

<body>
    <!-- HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class=" col-md-offset-4 col-md-4">
                    <a href="index.php" id="logo"><img src="images/logo.jpg"></a>
                </div>
                <!-- /LOGO -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="menu-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class='menu'>


                        <li><a href='index.php'>Home</a></li>
                        <?php $query = mysqli_query($con, "select * from categorytbl ");
                            while ($row = mysqli_fetch_array($query)) {   ?>

                        <li><a
                                href="category.php?id=<?php echo $row['id'] ?>"><?php echo htmlentities($row['category']); ?></a>
                        </li>
                        <?php } ?>



                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->