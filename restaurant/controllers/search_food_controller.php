<?php

require '../models/food.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $key = sanitize($_GET['name']);
    $res = searchFood($key);

    $arr1 = array();
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($arr1, array("id" => $row['id'], "name" => $row['name'], "price" => $row['price'], "image" => $row['image']));
    }

    echo json_encode($arr1);
}

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
