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
    <title>All Coupons</title>
</head>

<body>
    <?php include 'topnav_view.php' ?>

    <div class="form_container">
        <div class="display_box">
            <div class="logo_container">
                <img src="../images/coupon.png" alt="" width="140">
            </div>

            <h2>All Coupons</h2>

            <div>
                <table>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                COUPON CODE
                            </th>
                            <th>
                                DISCOUNT
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
                        mysqli_stmt_prepare($stmt, "SELECT id, code, discount FROM coupon");
                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_bind_result($stmt, $id, $code, $discount);

                        while (mysqli_stmt_fetch($stmt)) {
                            echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$code</td>";
                            echo "<td>$discount %</td>";
                            echo "<td><a href='../controllers/delete_coupon_controller.php?id=$id' class='dlt_btn'>Delete</a></td>";
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