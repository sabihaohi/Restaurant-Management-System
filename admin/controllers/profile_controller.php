<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
    header("Location: ../views/login_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $image = $_POST["pimage"];
    $admin_email = $_SESSION["admin_email"];

    if (empty($_POST["name"])) {
        $isValid = false;
    }

    if (empty($_POST["sq"])) {
        $isValid = false;
    }

    if (empty($_POST["address"])) {
        $isValid = false;
    }

    if (!empty($_FILES["image"]["name"])) {
        $source = $_FILES['image']['tmp_name'];
        $ext = explode(".", $_FILES['image']['name']);
        $ext = $ext[count($ext) - 1];
        $destination = '../images/' . $name . '.' . $ext;
        move_uploaded_file($source, $destination);
        $image = $destination;
    }


    if ($isValid) {
        require '../models/admin.php';
        updateAdminProfile($name, $sq, $address, $image, $admin_email);

        $_SESSION["success"] = "Profile Updated successfully.";
        header("Location: ../views/profile_view.php");
    } else {
        header("Location: ../views/profile_view.php");
    }
} else {
    //

    header("Location: ../views/profile_view.php");
}
