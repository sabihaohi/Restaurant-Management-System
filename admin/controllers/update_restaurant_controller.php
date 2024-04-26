<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
    header("Location: ../views/login_view.php");
}

$admin_email = $_SESSION["admin_email"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $rname = $_POST["rname"];
    $sq = $_POST["sq"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    if (empty($rname)) {
        $_SESSION["name_err"] = "Please enter Restaurant Name.";
        $isValid = false;
    }


    if (empty($sq)) {
        $_SESSION["sq_err"] = "Please enter your favorite word.";
        $isValid = false;
    }


    if (empty($address)) {
        $_SESSION["address_err"] = "Please enter your address.";
        $isValid = false;
    }


    if ($isValid) {
        require '../models/restaurant.php';
        updateRes($rname, $sq, $address, $email);

        $_SESSION["success"] = "restaurant Updated successfully.";
        header("Location: ../views/update_restaurant_view.php");
    } else {
        header("Location: ../views/update_restaurant_view.php");
    }
} else {
    //

    header("Location: ../views/update_restaurant_view.php");
}
