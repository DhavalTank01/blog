<?php
session_start();
include('../includes/config.php');

// Code for User login
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = ($_POST['password']);
    $role="Admin";    
    
    $query = mysqli_query($con, "SELECT * FROM usertbl WHERE email='$email' and password='$password'  ");    
    $num = mysqli_fetch_array($query);   

    if ($num > 0) {

        $_SESSION['login'] = $num['email'];
        $_SESSION['userid'] = $num['userid'];
        $_SESSION['fullname'] = $num['fullname'];   
        $_SESSION['role'] = $num['role'];     

        echo "<script>alert('You are successfully login ');</script>";
        echo "<script>location.replace('http://localhost/PHPBLOG/3244BLOG/admin/post.php')</script> ";
        
    } else {
        
        echo "<script>alert('Invalid email id or Password ');</script>";
        echo "<script>location.replace('http://localhost/PHPBLOG/3244BLOG/admin/')</script> ";
        
        
    }
}

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/logo.jpg">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="../images/logo.jpg">
                    <h3 class="heading">Admin</h3>

                    <!-- Form Start -->
                    <form action="" method="POST">
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,}$" title="Email format is wrong." required="true" autocomplete="off" oninvalid="this.setCustomValidity('Email is required.')" onkeyup="checkemail()" oninput="this.setCustomValidity('')">
                            <span id="status1" style="font-size:12px;"></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="true" autocomplete="off" oninvalid="this.setCustomValidity('Password is required.')" oninput="this.setCustomValidity('')" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <span id="passresult" style="font-size:12px;"></span>

                        </div>
                        <input type="submit" name="login" id="login" class="btn btn-primary" value="login" />

                    </form>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/jquery-1.11.1.min.js"></script>
<script>
    function checkemail() {

        jQuery.ajax({
            url: "../match_email.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#status1").html(data);

            },
            error: function() {}
        });
    }

    function checkpass() {

        jQuery.ajax({
            url: "../match_password.php",
            data: 'password=' + $("#password").val(),
            type: "POST",
            success: function(data) {
                $("#passresult").html(data);

            },
            error: function() {}
        });
    }
</script>

</html>