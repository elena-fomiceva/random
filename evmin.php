<?php
include 'dbinitializer.php';
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    get_min();
} else {
    die(header('HTTP/1.1 405 Request Method Not Allowed'));
}

function get_min()
{
    $conn = open_con();
    $sql = "SELECT ename, num FROM numbers WHERE num = (SELECT MIN(num) FROM numbers LIMIT 10000);";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $min_name = $row["ename"];
        $min_num = $row["num"];
        $min = array($min_name => $min_num);
        echo json_encode($min);
    }

    $sql = "TRUNCATE TABLE numbers;";
    $conn->query($sql);
    close_con($conn);
}