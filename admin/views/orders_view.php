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
    <link rel="stylesheet" href="css/style.css">
    <title>All Orders</title>
</head>

<body>
    <?php include 'topnav_view.php' ?>

    <div class="form_container">
        <div class="display_box">
            <div class="logo_container">
                <img src="../images/order.png" alt="" width="100" style="margin-left: -25px; margin-bottom: -10px; margin-top: 10px">
            </div>

            <h2>All Orders</h2>

            <div>
                <table>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                ORDERED ITEMS
                            </th>
                            <th>
                                QUANTITY
                            </th>
                            <th>
                                ORDERED BY
                            </th>
                            <th>
                                ORDERED FROM
                            </th>
                            <th>
                                TOTAL
                            </th>
                            <th>
                                COUPON
                            </th>
                            <th>
                                DISCOUNT
                            </th>
                            <th>
                                STATUS
                            </th>
                            <th>
                                ACTION
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, "SELECT id, items, quantity, orderedby, orderedfrom, total, coupon, discount, status FROM orders");
                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_bind_result($stmt, $id, $items, $quantity, $orderedby, $orderedfrom, $total, $coupon, $discount, $status);

                        while (mysqli_stmt_fetch($stmt)) {
                            echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$items</td>";
                            echo "<td>$quantity</td>";
                            echo "<td>$orderedby</td>";
                            echo "<td>$orderedfrom</td>";
                            echo "<td>$total Tk</td>";
                            echo "<td>$coupon</td>";
                            echo "<td>-$discount Tk</td>";
                            echo "<td>$status</td>";

                            if ($status == 'Pending') {
                                echo "<td><a href='../controllers/cancel_order_controller.php?id=$id' class='dlt_btn'>Cancel</a></td>";
                            }
                            echo "</tr>";
                        }

                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <?php include 'footer_view.php' ?>
</body>

</html>