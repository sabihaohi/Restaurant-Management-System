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
    $sq = $_POST["sq"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    require '../models/admin.php';

    if (empty($sq)) {
        $isValid = false;
    } else if (!checkSQ($email, $sq)) {
        $isValid = false;
    }

    if (empty($email)) {
        $isValid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
    } else if (!adminEmailUsed($email)) {
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
        updateAdminPassword($email, $password);

        session_unset();
        $_SESSION["success"] = "Password Changed Successfully.";

        header("Location: ../views/login_view.php");
    } else {
        header("Location: ../views/forget_pass_view.php");
    }
} else {
    $_SESSION["global_msg"] = "Something went wrong.";
    header("Location: ../views/forget_pass_view.php");
}
