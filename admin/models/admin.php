<?php

function databaseConnection()
{
    $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}


function createNewAdmin($name, $email, $password)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "INSERT INTO admins(name, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
    mysqli_stmt_execute($stmt);
}

function adminEmailUsed($email)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM admins WHERE email = ?");
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

function adminLogin($email, $password)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM admins WHERE email = ? and password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    if (isset($id)) {
        return true;
    } else {
        return false;
    };
}

function updateAdminPassword($email, $password)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE admins SET password = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "ss", $password, $email);
    mysqli_stmt_execute($stmt);
}

function updateAdminProfile($name, $sq, $address, $image, $email)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE admins SET name = ?, sq = ?, address = ?, image = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "sssss", $name, $sq, $address, $image, $email);
    mysqli_stmt_execute($stmt);
}

function checkSQ($email, $sq)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM admins WHERE email = ? and sq = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $sq);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    if (isset($id)) {
        return true;
    } else {
        return false;
    };
}
