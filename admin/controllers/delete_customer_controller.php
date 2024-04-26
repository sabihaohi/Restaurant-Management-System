<?php
session_start();
if (isset($_COOKIE["admin_email"])) {
    $_SESSION["admin_email"] = $_COOKIE["admin_email"];
}
if (isset($_SESSION["admin_email"])) {
    header("Location: ../views/home_view.php");
}

if (isset($_GET["id"])) {

    require '../models/customer.php';

    deleteCustomer($_GET["id"]);
    header("Location: ../views/customers_view.php");
} else {
    header("Location: ../views/customers_view.php");
}
