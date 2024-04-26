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
    <title>Admin Signup</title>
</head>

<body>
    <div class="form_container">
        <form action="../controllers/signup_controller.php" method="post" novalidate onsubmit="return signup();" id="signup_form" class="form" autocomplete="off">

            <div class="logo_container">
                <img src="../images/restaurant.png" alt="" width="140">
            </div>

            <?php
            if (isset($_SESSION["global_msg"]) && !empty($_SESSION["global_msg"])) {
                echo "<p class='error'>" . $_SESSION["global_msg"] . "</p><br>";
            }
            ?>

            <label for="name">Name*</label><br>
            <input type="text" name="name" id="name">
            <p class="" id="sne"></p>

            <br><label for="email">Email*</label><br>
            <input type="email" name="email" id="email">
            <p class="" id="see"></p>

            <br><label for="password">Password*</label><br>
            <input type="password" name="password" id="password">
            <p class="" id="spe"></p>

            <br><label for="cpassword">Confirm Password*</label><br>
            <input type="password" name="cpassword" id="cpassword">
            <p class="" id="scpe"></p>

            <br><input type="submit" value="SIGN UP">

            <p style="text-align: center; margin-top: 5px">Already Have an Account? <a href="login_view.php" style="text-decoration: underline;">Login.</a></p>
        </form>
    </div>

    <?php session_unset() ?>
    <script src="js/signup.js"></script>
</body>


</html>