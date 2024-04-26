<?php

session_start();

if (isset($_COOKIE["restaurant_email"])) {
    $_SESSION["restaurant_email"] = $_COOKIE["restaurant_email"];
}

if (!isset($_SESSION["restaurant_email"])) {
    header("Location: login_view.php");
}

$restaurant_email = $_SESSION["restaurant_email"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    // Food Name Validation
    if (empty($_POST["foodname"])) {
        $_SESSION["foodname_err"] = "Please enter food name.";
        $isValid = false;
    }

    // price Validation
    if ($_POST["price"] <= 0) {
        $_SESSION["price_err"] = "Please enter a valid price.";
        $isValid = false;
    }


    if (isset($_FILES["fimage"]["name"])) {
        $source = $_FILES['fimage']['tmp_name'];
        $ext = explode(".", $_FILES['fimage']['name']);
        $ext = $ext[count($ext) - 1];
        $destination = '../images/' . $_POST["foodname"] . '.' . $ext;
        move_uploaded_file($source, $destination);
        $image = $destination;
    }

    if ($isValid) {


        require '../models/food.php';

        updateFood($_POST['id'], $_POST["foodname"], $_POST["price"], $image, $restaurant_email);

        session_unset();
        $_SESSION["restaurant_email"] = $restaurant_email;

        header("Location: ../views/food_items_view.php?id=" . $_POST['id']);
    } else {
        header("Location: ../views/update_food_item_view.php?id=" . $_POST['id']);
    }
} else {

    header("Location: ../views/update_food_item_view.php?id=" . $_POST['id']);
}
