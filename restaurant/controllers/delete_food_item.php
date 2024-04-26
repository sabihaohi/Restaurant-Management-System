<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    require '../models/food.php';

    $key = sanitize($_GET['id']);
    deleteFoodItem($_GET['id']);
}

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
