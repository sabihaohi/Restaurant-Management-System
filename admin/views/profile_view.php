<?php
session_start();
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
    <title>Admin Profile</title>
</head>

<body>
    <?php require "topnav_view.php" ?>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id, name, image, sq, address FROM admins WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["admin_email"]);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id, $name, $image, $sq, $address);
    mysqli_stmt_fetch($stmt);
    ?>

    <div class="form_container">
        <form action="../controllers/profile_controller.php" method="post" novalidate onsubmit="return profile();" id="profile_form" class="form" autocomplete="off" enctype="multipart/form-data">

            <div class="logo_container">
                <img src="<?php echo $image ?>" alt="" width="140">
            </div>

            <?php
            if (isset($_SESSION["success"]) && !empty($_SESSION["success"])) {
                echo "<p class='success'>" . $_SESSION["success"] . "</p><br>";
                $_SESSION["success"] = "";
            }
            ?>

            <label for="name">Name*</label><br>
            <input type="text" name="name" id="name" value="<?php echo $name ?>">
            <p class="" id="pne"></p>

            <br><label for="email">Email*</label><br>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION["admin_email"] ?>" readonly>

            <br><label for="sq">Your Nickname (SQ)*</label><br>
            <input type="text" name="sq" id="sq" value="<?php echo $sq ?>">
            <p class="" id="psqe"></p>

            <br><label for="address">Address*</label><br>
            <input type="text" name="address" id="address" value="<?php echo $address ?>">
            <p class="" id="pse"></p>

            <br><label for="image">Image</label>
            <input type="file" name="image" id="image">

            <input type="hidden" name="pimage" value="<?php echo $image ?>">

            <br><input type="submit" value="UPDATE PROFILE">
        </form>
    </div>

    <script src="js/profile.js"></script>

    <?php include "footer_view.php" ?>
</body>

</html>