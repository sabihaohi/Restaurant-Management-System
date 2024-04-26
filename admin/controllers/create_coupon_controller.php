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
    $code = $_POST["code"];
    $discount = $_POST["discount"];

    $_SESSION["code"] = $_POST["code"];
    $_SESSION["discount"] = $_POST["discount"];

    require '../models/coupon.php';


    if (empty($code)) {
        $_SESSION["code_err"] = "Please Enter a Coupon Code.";
        $isValid = false;
    } else if (couponExist($code)) {
        $_SESSION["code_err"] = "Coupon Code Already Exists.";
        $isValid = false;
    }


    if ($discount < 1 || $discount > 75) {
        $_SESSION["password_err"] = "Please Enter A Number Between 1-75";
        $isValid = false;
    }


    if ($isValid) {
        createNewCoupon($code, $discount);

        session_unset();
        $_SESSION["success"] = "New Coupon Created. " . $code . " = " . $discount . "% Discount";

        header("Location: ../views/create_coupon_view.php");
    } else {
        header("Location: ../views/create_coupon_view.php");
    }
} else {
    $_SESSION["global_msg"] = "Something went wrong. Please try again later";
    header("Location: ../views/create_coupon_view.php");
}
