<?php
function databaseConnection()
{
    $conn = mysqli_connect("localhost", "root", "", "rms_admins", 3306);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}


function deleteCoupon($id)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "DELETE FROM coupon WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}


function couponExist($code)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT id FROM coupon WHERE code = ?");
    mysqli_stmt_bind_param($stmt, "s", $code);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    if (isset($id)) {
        return true;
    } else {
        return false;
    };
}

function createNewCoupon($code, $discount)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "INSERT INTO coupon(code, discount) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "si", $code, $discount);
    mysqli_stmt_execute($stmt);
}


function cancelOrder($id)
{
    $conn = databaseConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE orders SET status = 'Canceled' WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}
