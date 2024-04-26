<?php
function createNewCoupon($coupon, $discount, $remail)
{
    $conn = mysqli_connect("localhost", "root", "", "rms_restaurant", 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "INSERT INTO coupons(coupon, discount, remail) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sis", $coupon, $discount, $remail);
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
