<?php
session_start();

if (isset($_SESSION["admin_email"])) {
    header("Location: ../views/home_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $email = $_SESSION["admin_email"];
    $password = $_POST["password"];
    $npassword = $_POST["npassword"];
    $cpassword = $_POST["cpassword"];

    require '../models/admin.php';

    if (empty($password)) {
        $isValid = false;
    } else if (!adminLogin($email, $password)) {
        $isValid = false;
    }


    if (empty($npassword)) {
        $isValid = false;
    }

    if (empty($cpassword)) {
        $isValid = false;
    } else if ($npassword != $cpassword) {
        $isValid = false;
    }

    if ($isValid) {
        updateAdminPassword($email, $npassword);

        session_unset();
        $_SESSION["admin_email"] = $email;
        $_SESSION["success"] = "Password Changed Successfully.";

        header("Location: ../views/change_pass_view.php");
    } else {
        header("Location: ../views/change_pass_view.php");
    }
} else {
    $_SESSION["global_msg"] = "Something went wrong. Please try again later";
    header("Location: ../views/change_pass_view.php");
}
