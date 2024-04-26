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
    <title>Home Admin</title>
</head>

<body>
    <?php include 'topnav_view.php' ?>

    <div class="form_container">
        <form action="../controllers/create_restaurant_controller.php" method="post" novalidate onsubmit="return create_restaurant();" id="create_restaurant_form" class="form" autocomplete="off">

            <div class="logo_container">
                <img src="../images/restaurant.png" alt="" width="200" style="margin-bottom: -10px; margin-top: 10px">
            </div>

            <h2>Create New Restaurant</h2>

            <?php
            if (isset($_SESSION["success"]) && !empty($_SESSION["success"])) {
                echo "<p class='success'>" . $_SESSION["success"] . "</p><br>";
                $_SESSION["success"] = "";
            }
            ?>

            <!-- Name -->
            <label for="rname">Restaurant Name*</label><br>
            <input type="text" name="rname" id="rname" value="<?php echo isset($_SESSION["rname"]) ? $_SESSION["rname"] : "" ?>">
            <p class="" id="create_restaurant_rname_err"></p>
            <!-- <?php
                    if (isset($_SESSION["name_err"])) {
                        echo "<p>" . $_SESSION["name_err"] . "</p><br>";
                        $_SESSION["name_err"] = "";
                    }
                    ?> -->


            <!-- Email -->
            <br><label for="email">Restaurant Email*</label><br>
            <input type="email" name="email" id="email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>">
            <p class="" id="create_restaurant_email_err"></p>
            <?php
            if (isset($_SESSION["email_err"]) && !empty($_SESSION["email_err"])) {
                echo "<p class='error'>" . $_SESSION["email_err"] . "</p>";
                $_SESSION["email_err"] = "";
            }
            ?>


            <!-- Password -->
            <br><label for="password">Password*</label><br>
            <input type="password" name="password" id="password" value="<?php echo isset($_SESSION["password"]) ? $_SESSION["password"] : "" ?>">
            <p class="" id="create_restaurant_pass_err"></p>
            <!-- <?php
                    if (isset($_SESSION["password_err"])) {
                        echo "<p>" . $_SESSION["password_err"] . "</p><br>";
                        $_SESSION["password_err"] = "";
                    }
                    ?> -->

            <!-- SQ -->
            <br><label for="sq">Special Item (SQ)</label><br>
            <input type="text" name="sq" id="sq" value="<?php echo isset($_SESSION["sq"]) ? $_SESSION["sq"] : "" ?>">
            <p class="" id="create_restaurant_sq_err"></p>

            <!-- Address -->
            <br><label for="address">Restaurant Address</label><br>
            <input type="text" name="address" id="address" value="<?php echo isset($_SESSION["address"]) ? $_SESSION["address"] : "" ?>">
            <p class="" id="create_restaurant_address_err"></p>

            <br><input type="submit" value="CREATE RESTAURANT">
        </form>
    </div>

    <script src="js/create_restaurant.js"></script>

    <?php include 'footer_view.php' ?>
</body>

</html>