<?php

session_start();

if (isset($_COOKIE["restaurant_email"])) {
    $_SESSION["restaurant_email"] = $_COOKIE["restaurant_email"];
}

if (isset($_SESSION["restaurant_email"])) {
    header("Location: home_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;

    // Store Values in Session
    $_SESSION["rname"] = $_POST["rname"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["cpassword"] = $_POST["cpassword"];

    require '../models/restaurant.php';

    // Email Validation
    if (empty($_POST["email"])) {

        $_SESSION["email_err"] = "Please enter your email.";
        $isValid = false;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

        $_SESSION["email_err"] = "Please enter a valid email.";
        $isValid = false;
    } else if (restaurantExist($_POST['email'])) {

        $_SESSION["email_err"] = "This email is already used.";
        $isValid = false;
    }


    // Restaurant Name Validation
    if (empty($_POST["rname"])) {

        $_SESSION["rname_err"] = "Please enter your last name.";
        $isValid = false;
    }

    // Password Validation
    if (empty($_POST["password"])) {

        $_SESSION["password_err"] = "Please enter a password.";
        $isValid = false;
    }

    // Confirm Password Validation
    if (empty($_POST["cpassword"])) {

        $_SESSION["cpassword_err"] = "Please re-enter your password.";
        $isValid = false;
    } else if ($_POST["password"] != $_POST["cpassword"]) {

        $_SESSION["cpassword_err"] = "Password doesn't match.";
        $isValid = false;
    }


    if ($isValid) {
        createNewRestaurant($_POST["rname"], $_POST["email"], $_POST["password"]);

        session_unset();
        //Set Logged in user Email in Session
        $_SESSION["restaurant_email"] = $_POST["email"];

        // Set logged in user email in Cookies
        setcookie("restaurant_email", $_POST["email"], time() + (86400 * 30), "/");
        header("Location: ../views/home_view.php");
    } else {
        header("Location: ../views/signup_view.php");
    }
} else {

    header("Location: ../views/signup_view.php");
}
