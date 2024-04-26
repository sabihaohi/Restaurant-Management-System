<?php
session_start();
if (isset($_COOKIE["admin_email"])) {
    $_SESSION["admin_email"] = $_COOKIE["admin_email"];
}
if (isset($_SESSION["admin_email"])) {
    header("Location: ../views/home_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $rname = $_POST["rname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sq = $_POST["sq"];
    $address = $_POST["address"];

    $_SESSION["rname"] = $_POST["rname"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["sq"] = $_POST["sq"];
    $_SESSION["address"] = $_POST["address"];

    require '../models/restaurant.php';


    if (empty($rname)) {
        $_SESSION["rname_err"] = "Please enter restaurant name.";
        $isValid = false;
    }


    if (empty($email)) {
        $_SESSION["email_err"] = "Please enter your email.";
        $isValid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["email_err"] = "Please enter a valid email.";
        $isValid = false;
    } else if (restaurantAvailable($email)) {
        $_SESSION["email_err"] = "Restaurant Already Exists.";
        $isValid = false;
    }


    if (empty($password)) {
        $_SESSION["password_err"] = "Please enter a password.";
        $isValid = false;
    }


    if ($isValid) {
        createRestaurant($rname, $email, $password, $sq, $address);

        session_unset();
        $_SESSION["success"] = "New Restaurant Created with " . $email;

        header("Location: ../views/create_restaurant_view.php");
    } else {
        header("Location: ../views/create_restaurant_view.php");
    }
} else {
    $_SESSION["global_msg"] = "Something went wrong. Please try again later";
    header("Location: ../views/create_restaurant_view.php");
}
