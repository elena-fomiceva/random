<?php
include 'dbinitializer.php';
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_SERVER['GAE_INSTANCE'];
    $num = rand(0, 100000);
    add_data($num, $name);
    echo json_encode(array($name => $num));
} else {
    die(header('HTTP/1.1 405 Request Method Not Allowed'));
}

function add_data($num, $name) {
    $conn = open_con();
    $sql = "INSERT INTO numbers (name, num) VALUES ('$name', $num)";
    $conn->query($sql);
    close_con($conn);
}

