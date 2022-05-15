<?php

function open_con()
{
    $dbhost = "172.17.0.1";
    $dbuser = "elena_user";
    $dbpass = "azazelo";
    $dbname = "random";
    $GCSocket ="/cloudsql/dark-carport-344412:europe-southwest1:random-database";
    $GCPort='3306';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $GCPort,$GCSocket) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function close_con($conn)
{
    $conn->close();
}


