<?php
session_start();
if (isset($_SESSION["admin_email"])) {
    header("Location: ../views/home_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $isValid = true;
    $email = $_POST["email"];
    $password = $_POST["password"];

    require '../models/admin.php';

    if (empty($email)) {
        $isValid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
    }

    if (empty($password)) {
        $isValid = false;
    }

    if ($isValid) {
        if (adminLogin($email, $password)) {

            $_SESSION["admin_email"] = $email;
            setcookie("admin_email", $email, time() + (86400 * 30), "/");

            header("Location: ../views/home_view.php");
        } else {
            $_SESSION["global_msg"] = "Incorrect Email or Password.";
            header("Location: ../views/login_view.php");
        }
    } else {
        $_SESSION["global_msg"] = "Something went wrong.";
        header("Location: ../views/login_view.php");
    }
} else {
    $_SESSION["global_msg"] = "Something went wrong.";
    header("Location: ../views/login_view.php");
}
