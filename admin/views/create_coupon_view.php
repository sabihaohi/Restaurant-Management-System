<?php
session_start();

if (isset($_COOKIE["restaurant_email"])) {
    $_SESSION["restaurant_email"] = $_COOKIE["restaurant_email"];
}

if (!isset($_SESSION["restaurant_email"])) {
    header("Location: login_view.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/addfood.js"></script>
    <title>Add Coupon</title>
</head>


<body>
    <?php require "nav_view.php" ?>
    <div class="loginBg" style="height: 90vh;">
        <div class="loginform">
            <form action="../controllers/add_coupon_controller.php" method="post" enctype="multipart/form-data" novalidate>
                <h1>Add Coupon</h1>

                <!-- food Name -->
                <label for="coupon">Coupon Name*</label><br>
                <input type="text" name="coupon" id="coupon" value="<?php echo isset($_SESSION["coupon"]) ? $_SESSION["coupon"] : "" ?>">
                <p class="error" id="coupon_err"></p>
                <?php
                if (isset($_SESSION["coupon_err"]) && !empty($_SESSION["coupon_err"])) {
                    echo "<em>" . $_SESSION["coupon_err"] . "</em>";
                    $_SESSION["coupon_err"] = "";
                }
                ?>

                <!-- food price -->
                <br><label for="discount">Discount*</label><br>
                <input type="number" name="discount" id="discount" value="<?php echo isset($_SESSION["discount"]) ? $_SESSION["discount"] : "" ?>">
                <p class="error" id="discount_err"></p>
                <?php
                if (isset($_SESSION["discount_err"]) && !empty($_SESSION["discount_err"])) {
                    echo "<em>" . $_SESSION["discount_err"] . "</em>";
                    $_SESSION["discount_err"] = "";
                }
                ?>

                <br><input class="button" type="submit" value="Add Coupon"><br>

            </form>
            <div>
                <img src="../images/burger.jpeg" alt="" width="100%" height="100%" style="object-fit: cover;">
            </div>
        </div>
    </div>



</body>


</html>