<?php
function createNewFood($name, $price, $image, $remail)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "INSERT INTO foods(name, price, image, remail) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "siss", $name, $price, $image, $remail);
    mysqli_stmt_execute($stmt);
}

function updateFood($id, $name, $price, $image)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = (int)$id;
    $price = (int)$price;

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE foods SET name = ?, price = ?, image = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sisi", $name, $price, $image, $id);
    mysqli_stmt_execute($stmt);
}

function searchFood($name)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, "SELECT id, name, price, image FROM foods WHERE name LIKE ?");
    $name = "%" . $name . "%";
    mysqli_stmt_bind_param($stmt, "s", $name);


    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}

function deleteFoodItem($id)
{
    $id = (int)$id;
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "DELETE FROM foods WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}
