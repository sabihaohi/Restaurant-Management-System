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
    <title>All Customers</title>
</head>

<body>
    <?php include 'topnav_view.php' ?>

    <div class="form_container">
        <div class="display_box">
            <div class="logo_container">
                <img src="../images/customer.png" alt="" width="200" style="margin-bottom: -10px; margin-top: 10px">
            </div>

            <h2>All Customers</h2>

            <div class="search_container">
                <form>
                    <input type="text" name='user' value="<?php echo isset($_GET["user"]) ? $_GET["user"] : '' ?>" placeholder="Search User By Name"> <input type="submit" value="Search">
                </form>
                <div>
                    <button class="create_customer_btn"><a href="create_customer_view.php">Create New Customer</a></button>
                </div>
            </div>

            <div>
                <table>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>SQ</th>
                            <th>image</th>
                            <th>Address</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, "SELECT id, name, email, sq, image, address FROM customers");
                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_bind_result($stmt, $id, $name, $email, $sq, $image, $address);

                        while (mysqli_stmt_fetch($stmt)) {
                            if (isset($_GET["user"]) && !empty($_GET["user"])) {
                                if (strpos(strtolower($name), $_GET["user"]) !== false) {
                                    echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td>$name</td>";
                                    echo "<td>$email</td>";
                                    echo "<td>$sq</td>";
                                    echo "<td class='td_img'><img src='$image' width='40'></td>";
                                    echo "<td>$address</td>";


                                    echo "<td><a href='update_customer_view.php?id=$id' class='update_btn'>Update</a> <a style='margin-top: 5px' href='../controllers/delete_customer_controller.php?id=$id' class='dlt_btn'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>$name</td>";
                                echo "<td>$email</td>";
                                echo "<td>$sq</td>";
                                echo "<td class='td_img'><img src='$image' width='40'></td>";
                                echo "<td>$address</td>";


                                echo "<td><a href='update_customer_view.php?id=$id' class='update_btn'>Update</a> <a style='margin-top: 5px' href='../controllers/delete_customer_controller.php?id=$id' class='dlt_btn'>Delete</a></td>";
                                echo "</tr>";
                            }
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