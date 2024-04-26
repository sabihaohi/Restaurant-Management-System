<?php
function databaseConnection()
{
    $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function deleteRestaurant($id)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "DELETE FROM restaurants WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}


function updateRes($rname, $sq, $address, $email)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE restaurants SET rname = ?, sq = ?, address = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "ssss", $rname, $sq, $address, $email);
    mysqli_stmt_execute($stmt);
}


function restaurantAvailable($email)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM restaurants WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    if (isset($id)) {
        return true;
    } else {
        return false;
    };
}

function createRestaurant($rname, $email, $password, $sq, $address)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "INSERT INTO restaurants(rname, email, password, sq, address) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $rname, $email, $password, $sq, $address);
    mysqli_stmt_execute($stmt);
}
