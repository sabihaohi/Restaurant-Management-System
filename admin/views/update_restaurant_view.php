<?php
session_start();
if (isset($_COOKIE["admin_email"])) {
    $_SESSION["admin_email"] = $_COOKIE["admin_email"];
}

if (!isset($_SESSION["admin_email"])) {
    header("Location: login_view.php");
}

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: restaurants_view.php");
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
        <form action="../controllers/update_restaurant_controller.php" method="post" novalidate onsubmit="return update_restaurant();" id="update_restaurant_form" class="form" autocomplete="off">

            <div class="logo_container">
                <img src="../images/restaurant.png" alt="" width="200" style="margin-bottom: -10px; margin-top: 10px">
            </div>

            <h2>Update Restaurant</h2>

            <?php

            $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, "SELECT id, rname, email, sq, address FROM restaurants WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $id, $rname, $email, $sq, $address);
            mysqli_stmt_fetch($stmt);
            ?>

            <!-- Name -->
            <label for="rname">Restaurant Name*</label><br>
            <input type="text" name="rname" id="rname" value="<?php echo $rname ?>">
            <p class="" id="update_restaurant_rname_err"></p>
            <!-- <?php
                    if (isset($_SESSION["rname_err"])) {
                        echo "<p>" . $_SESSION["rname_err"] . "</p><br>";
                        $_SESSION["rname_err"] = "";
                    }
                    ?> -->


            <!-- Email -->
            <br><label for="email">Restaurant Email*</label><br>
            <input type="email" name="email" id="email" value="<?php echo $email ?>" readonly>


            <!-- SQ -->
            <br><label for="sq">Special Item (SQ)</label><br>
            <input type="text" name="sq" id="sq" value="<?php echo $sq ?>">

            <!-- Address -->
            <br><label for="address">Restaurant Address</label><br>
            <input type="text" name="address" id="address" value="<?php echo $address ?>">

            <br><input type="submit" value="UPDATE RESTAURANT">
        </form>
    </div>

    <script src="js/create_restaurant.js"></script>

    <?php include 'footer_view.php' ?>
</body>

</html>