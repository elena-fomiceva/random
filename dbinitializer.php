<?php

function open_con()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "7176843";
    $dbname = "random";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function close_con($conn)
{
    $conn->close();
}


