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
    <title>All Food Items</title>
</head>

<body>
    <?php require "nav_view.php" ?>

    <div class="searchd">
        <form action="../controllers/search_food_controller.php" method="GET" onsubmit="return searchFood(this);">
            <input class="searchi" type="text" placeholder="Search Food" name="name">
            <input type="submit">
        </form>
    </div>



    <div class="foods_container" id="foodscontainer">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);

        mysqli_stmt_prepare($stmt, "SELECT id, name, price, image FROM foods");
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $name, $price, $image);

        while (mysqli_stmt_fetch($stmt)) {
            echo "<div class='fooditem' id='food$id'>";
            echo "<img src='$image'>";
            echo "<h3>$name</h3>";
            echo "<p>Price: $price BDT</p>";
            echo "<div class='adddel'>";
            echo "<button class='upb' ><a href='update_food_item_view.php?id=$id'>Update Food</a></button>";
        ?>
            <form action="../controllers/delete_food_item.php" method="GET" onsubmit="return deleteFood(this);">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input class="deb" type="submit" value="Delete Food">
            </form>
        <?php
            // echo "<button class='deb'><a href='update_food_item_view.php?id=$id'>Delete Food</a></button>";
            echo "</div>";
            echo "</div>";
        }


        ?>
    </div>


    <!-- <?php include "footer_view.php" ?> -->

    <script src="js/ajax.js"></script>
</body>

</html>