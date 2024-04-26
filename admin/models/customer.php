<?php
function customerExist($email)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM customers WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    return isset($id);
}

function createNewCustomer($name, $email, $password, $sq, $address)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "INSERT INTO customers(name, email, password, sq, address) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $password, $sq, $address);
    mysqli_stmt_execute($stmt);
}


function updateProfile($name, $sq, $address, $email)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE customers SET name = ?, sq = ?, address = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "ssss", $name, $sq, $address, $email);
    mysqli_stmt_execute($stmt);
}

function deleteCustomer($id)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "DELETE FROM customers WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}
