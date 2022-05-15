<?php
include 'dbinitializer.php';
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    get_max();
} else {
    die(header('HTTP/1.1 405 Request Method Not Allowed'));
}

function get_max() {
    $conn = open_con();
    $sql = "SELECT name, num FROM numbers WHERE num = (SELECT MAX(num) FROM numbers LIMIT 10000);";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $max_name = $row["name"];
        $max_num = $row["num"];
        $max = array($max_name => $max_num);
        echo json_encode($max);
    }
    close_con($conn);
}

