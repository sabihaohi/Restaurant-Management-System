<?php

session_start();

if (isset($_COOKIE["restaurant_email"])) {
    $_SESSION["restaurant_email"] = $_COOKIE["restaurant_email"];
}

if (!isset($_SESSION["restaurant_email"])) {
    header("Location: login_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $restaurant_email = $_SESSION["restaurant_email"];

    $isValid = true;

    $_SESSION["curr_password"] = $_POST["curr_password"];
    $_SESSION["new_password"] = $_POST["new_password"];
    $_SESSION["cnew_password"] = $_POST["cnew_password"];

    require '../models/restaurant.php';

    // Current Password Validation
    if (empty($_POST["curr_password"])) {

        $_SESSION["curr_password_err"] = "Please enter your current password.";
        $isValid = false;
    } else if (!loginCredentials($restaurant_email, $_POST["curr_password"])) {
        $_SESSION["curr_password_err"] = "Incorrect Password";
        $isValid = false;
    }

    // New Password Validation
    if (empty($_POST["new_password"])) {

        $_SESSION["new_password_err"] = "Please enter a new password.";
        $isValid = false;
    }

    // Confirm New Password Validation
    if (empty($_POST["cnew_password"])) {

        $_SESSION["cnew_password_err"] = "Please re-enter your password.";
        $isValid = false;
    } else if ($_POST["new_password"] != $_POST["cnew_password"]) {

        $_SESSION["cnew_password_err"] = "Password doesn't match.";
        $isValid = false;
    }

    if ($isValid) {
        updatePassword($restaurant_email, $_POST["new_password"]);

        session_unset();
        $_SESSION["restaurant_email"] = $restaurant_email;
        $_SESSION["global_msg"] = "Password Changed Successfully.";

        header("Location: ../views/change_password_view.php");
    } else {
        header("Location: ../views/change_password_view.php");
    }
} else {

    header("Location: ../views/change_password_view.php");
}
