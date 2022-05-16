<?php
include 'dbinitializer.php';
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    get_nums();
} else {
    die(header('HTTP/1.1 405 Request Method Not Allowed'));
}

function get_nums() {
    $conn = open_con();
    $sql = "SELECT name, num FROM numbers LIMIT 10000;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $result_all = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($result_all);
    }
    close_con($conn);
}