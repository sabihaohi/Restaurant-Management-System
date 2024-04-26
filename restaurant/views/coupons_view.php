<?php

if (isset($_COOKIE["restaurant_email"])) {
    $_SESSION["restaurant_email"] = $_COOKIE["restaurant_email"];
}

session_start();
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
    <title>All Coupons</title>
</head>

<body>
    <?php require "nav_view.php" ?>

    <div class="orderc">

        <div class="orderc2">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $stmt = mysqli_stmt_init($conn);

            mysqli_stmt_prepare($stmt, "SELECT id, coupon, discount FROM coupons WHERE remail = ?");
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["restaurant_email"]);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $id, $coupon, $discount);

            echo "<table>";
            echo "<tr><th>ID</th><th>COUPON</th><th>DISCOUNT</th></tr>";

            while (mysqli_stmt_fetch($stmt)) {
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$coupon</td>";
                echo "<td>$discount</td>";
                echo "</tr>";
            }
            echo "</table>";

            ?>
        </div>

    </div>
    <!-- <?php include "footer_view.php" ?> -->
</body>

</html>