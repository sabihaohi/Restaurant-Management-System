<?php
session_start();
if (isset($_COOKIE["admin_email"])) {
    $_SESSION["admin_email"] = $_COOKIE["admin_email"];
}

if (!isset($_SESSION["admin_email"])) {
    header("Location: login_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>
    <?php include 'topnav_view.php' ?>


    <div class="form_container">
        <form action="../controllers/change_pass_controller.php" method="post" novalidate onsubmit="return changePass();" id="changepass_form" class="form" autocomplete="off">

            <h2>Change Password</h2>
            <?php
            if (isset($_SESSION["success"]) && !empty($_SESSION["success"])) {
                echo "<p class='success'>" . $_SESSION["success"] . "</p><br>";
                $_SESSION["success"] = "";
            }
            ?>

            <br><label for="password">Current Password*</label><br>
            <input type="password" name="password" id="password">
            <p class="" id="cppe"></p>

            <!-- Password -->
            <br><label for="npassword">New Password*</label><br>
            <input type="password" name="npassword" id="npassword">
            <p class="" id="cpnpe"></p>

            <!-- Confrim Password -->
            <br><label for="cpassword">Confirm Password*</label><br>
            <input type="password" name="cpassword" id="cpassword">
            <p class="" id="cpcpe"></p>

            <br><input type="submit" value="CHANGE PASSWORD">

        </form>
    </div>

    <script src="js/change_pass.js"></script>

    <?php include 'footer_view.php' ?>
</body>

</html>