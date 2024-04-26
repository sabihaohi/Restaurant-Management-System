<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
    header("Location: ../views/login_view.php");
}

$admin_email = $_SESSION["admin_email"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $name = $_POST["name"];
    $sq = $_POST["sq"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    if (empty($name)) {
        $_SESSION["name_err"] = "Please enter your first name.";
        $isValid = false;
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $_SESSION["name_err"] = "Only alphabets are allowed.";
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
        require '../models/customer.php';
        updateProfile($name, $sq, $address, $email);

        $_SESSION["success"] = "Customer Updated successfully.";
        header("Location: ../views/update_customer_view.php");
    } else {
        header("Location: ../views/update_customer_view.php");
    }
} else {
    //

    header("Location: ../views/update_customer_view.php");
}
