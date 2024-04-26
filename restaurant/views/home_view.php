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
    <link rel="stylesheet" href="css/home.css">
    <title>Home - Restaurant</title>
</head>

<body>
    <?php require "nav_view.php" ?>

    <section class="hero">

        <div>
            <h1>Discover <br> Restaurants <br>
                That deliver near You</h1> <br>
            <p>It is a long established fact that <br> a reader will be distracted by <br> the readable content of a page <br> when looking at it's layout.</p>

            <button>Add new item</button>
        </div>
        <div>
            <img src="../images/burger.jpeg" width="500px" height="500px">
        </div>



    </section>


    <?php include "footer_view.php" ?>
</body>

</html>