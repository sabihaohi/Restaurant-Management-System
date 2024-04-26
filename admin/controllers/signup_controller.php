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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    require '../models/admin.php';

    if (empty($name)) {
        $isValid = false;
    }

    if (empty($email)) {
        $isValid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
    } else if (adminEmailUsed($email)) {
        $_SESSION["global_msg"] = "This Email is Already Used.";
        $isValid = false;
    }

    if (empty($password)) {
        $isValid = false;
    }

    if (empty($cpassword)) {
        $isValid = false;
    } else if ($password != $cpassword) {
        $isValid = false;
    }

    if ($isValid) {
        createNewAdmin($name, $email, $password);

        $_SESSION["success"] = "Account Created Successfully.";
        header("Location: ../views/login_view.php");
    } else {
        $_SESSION["global_msg"] = "Something went wrong.";
        header("Location: ../views/signup_view.php");
    }
} else {
    $_SESSION["global_msg"] = "Something went wrong.";
    header("Location: ../views/signup_view.php");
}
