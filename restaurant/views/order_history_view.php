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
    <title>Order History</title>
</head>

<body>
    <?php require "nav_view.php" ?>


    <div class="orderh">
        <div class="order">
            <h2 style="margin-bottom: 20px;">Order History</h2>
            <hr> <br>



            <?php
            // Load Orders
            $filename = "../models/orders.json";
            $file = fopen($filename, 'r');

            $all_orders = fread($file, filesize($filename));
            $all_orders = json_decode($all_orders);
            ?>
            <table>
                <tr>
                    <th> OrderId </th>
                    <th> FoodName </th>
                    <th> Quantity </th>
                    <th> TotalPrice </th>
                    <th> OrderedBy </th>
                    <th> Status </th>
                </tr>
                <?php

                foreach ($all_orders as $order) {
                    if ($order->orderedFrom === $_SESSION["restaurant_email"]) {

                        echo "<tr>";
                        echo "<td>" . $order->orderId . "</td>";
                        echo "<td>" . $order->foodName . "</td>";
                        echo "<td>" . $order->quantity . "</td>";
                        echo "<td>" . $order->totalPrice . " BDT" . "</td>";
                        echo "<td>" . $order->orderedBy . "</td>";
                        echo "<td>" . $order->status . "</td>";
                        echo "</tr>";
                    }
                }
                ?>

            </table>
        </div>
    </div>

    <!-- <?php include "footer_view.php" ?> -->
</body>

</html>