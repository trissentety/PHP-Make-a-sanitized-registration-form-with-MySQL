<?php

$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "businessdb";
$conn = "";


//Connect database
try {
    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
} catch (mysqli_sql_exception) {
    echo "Connection error<br>";
}

if ($conn) {
    // echo "Database is connected<br>";
}
//view webpage for file to check if connected
//localhost/website/database.php
