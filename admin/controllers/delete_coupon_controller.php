<?php
session_start();
if (isset($_COOKIE["admin_email"])) {
    $_SESSION["admin_email"] = $_COOKIE["admin_email"];
}
if (isset($_SESSION["admin_email"])) {
    header("Location: ../views/home_view.php");
}

if (isset($_GET["id"])) {

    require '../models/coupon.php';

    deleteCoupon($_GET["id"]);
    header("Location: ../views/coupons_view.php");
} else {
    header("Location: ../views/coupons_view.php");
}
