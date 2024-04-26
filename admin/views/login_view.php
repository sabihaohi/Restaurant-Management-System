<?php
session_start();
if (isset($_COOKIE["admin_email"])) {
    $_SESSION["admin_email"] = $_COOKIE["admin_email"];
}

if (isset($_SESSION["admin_email"])) {
    header("Location: home_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="form_container">
        <form action="../controllers/login_controller.php" method="post" novalidate onsubmit="return login();" id="login_form" class="form" autocomplete="off">

            <div class="logo_container">
                <img src="../images/restaurant.png" alt="" width="140">
            </div>

            <?php
            if (isset($_SESSION["global_msg"]) && !empty($_SESSION["global_msg"])) {
                echo "<p class='error'>" . $_SESSION["global_msg"] . "</p><br>";
            }
            ?>

            <?php
            if (isset($_SESSION["success"]) && !empty($_SESSION["success"])) {
                echo "<p class='success'>" . $_SESSION["success"] . "</p><br>";
            }
            ?>

            <label for="email">Email*</label><br>
            <input type="email" name="email" id="email">
            <p class="" id="lee"></p>

            <br><label for="password">Password*</label><br>
            <input type="password" name="password" id="password">
            <p class="" id="lpe"></p>

            <br><input type="submit" value="LOGIN">

            <p style="text-align: center; margin-top: 5px">Forgot Your Password? <a href="forget_pass_view.php" style="text-decoration: underline;">Reset Now.</a></p>
            <p style="text-align: center; margin-top: 5px">Don't Have an Account? <a href="signup_view.php" style="text-decoration: underline;">Sign Up.</a></p>
        </form>
    </div>
    <?php session_unset() ?>
    <script src="js/login.js"></script>
</body>


</html>