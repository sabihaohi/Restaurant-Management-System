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
    <title>Add Food Item</title>
</head>


<body>
    <?php require "nav_view.php" ?>
    <div class="loginBg" style="height: 90vh;">
        <div class="loginform">
            <form action="../controllers/add_food_controller.php" method="post" enctype="multipart/form-data" novalidate onsubmit="return handleFood(this);">
                <h1>Add Food Item</h1>

                <!-- food Name -->
                <label for="foodname">Food Name*</label><br>
                <input type="text" name="foodname" id="foodname" value="<?php echo isset($_SESSION["foodname"]) ? $_SESSION["foodname"] : "" ?>">
                <p class="error" id="foodname_err"></p>
                <?php
                if (isset($_SESSION["foodname_err"]) && !empty($_SESSION["foodname_err"])) {
                    echo "<em>" . $_SESSION["foodname_err"] . "</em>";
                    $_SESSION["foodname_err"] = "";
                }
                ?>

                <!-- food price -->
                <br><label for="price">Food Price*</label><br>
                <input type="number" name="price" id="price" value="<?php echo isset($_SESSION["price"]) ? $_SESSION["price"] : "" ?>">
                <p class="error" id="foodprice_err"></p>
                <?php
                if (isset($_SESSION["price_err"]) && !empty($_SESSION["price_err"])) {
                    echo "<em>" . $_SESSION["price_err"] . "</em>";
                    $_SESSION["price_err"] = "";
                }
                ?>

                <!-- Profile Image -->
                <br><label for="fimage">Food Image*</label><br>

                <input type="file" name="fimage" id="fimage">
                <p class="error" id="fimage_err"></p>
                <?php
                if (isset($_SESSION["fimage_err"]) && !empty($_SESSION["fimage_err"])) {
                    echo "<em>" . $_SESSION["fimage_err"] . "</em>";
                    $_SESSION["fimage_err"] = "";
                }
                ?>

                <br><input class="button" type="submit" value="Add Food Item"><br>

            </form>
            <div>
                <img src="../images/burger.jpeg" alt="" width="100%" height="100%" style="object-fit: cover;">
            </div>
        </div>
    </div>



</body>


</html>