<?php

require_once '../config/db.php';

session_start();
$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id = :id";

$statement = $pdo->prepare($sql);

$statement->bindParam(':id', $id, PDO::PARAM_INT);

$statement->execute();

$row = $statement->fetch(PDO::FETCH_ASSOC);

if ($row) {

} else {
    echo "Tidak ditemukan";
}