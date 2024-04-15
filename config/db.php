<?php
$servername = "localhost";
$database = "unifind";
$username = "root";
$password = "lavon";

$dsn = "mysql:host=localhost;dbname=unifind;charset=UTF8";

try {
    $pdo = new PDO($dsn, $username, $password);

    // if ($pdo) {
    //     echo "Connected to the $database success";
    // }
} catch (PDOException $e) {
    echo $e->getMessage();
}