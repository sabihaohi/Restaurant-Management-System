<?php

session_start();

if (isset($_COOKIE["restaurant_email"])) {
    $_SESSION["restaurant_email"] = $_COOKIE["restaurant_email"];
}

if (!isset($_SESSION["restaurant_email"])) {
    header("Location: login_view.php");
}

$restaurant_email = $_SESSION["restaurant_email"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;

    $_SESSION["coupon"] = $_POST["coupon"];
    $_SESSION["discount"] = $_POST["discount"];
    $image = "";


    // Food Name Validation
    if (empty($_POST["coupon"])) {
        $_SESSION["coupon_err"] = "Please enter coupon name.";
        $isValid = false;
    }

    // price Validation
    if ($_POST["discount"] <= 0) {
        $_SESSION["discount_err"] = "Please enter a valid number.";
        $isValid = false;
    }


    if ($isValid) {
        require '../models/coupon.php';
        createNewCoupon($_POST["coupon"], $_POST["discount"], $restaurant_email);

        session_unset();
        $_SESSION["restaurant_email"] = $restaurant_email;

        header("Location: ../views/add_coupon_view.php");
    } else {
        header("Location: ../views/add_coupon_view.php");
    }
} else {

    header("Location: ../views/add_coupon_view.php");
}
