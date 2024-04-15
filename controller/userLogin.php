<?php

require_once '../config/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Check Email with Password
$sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

$statement = $pdo->prepare($sql);

$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':password', $password, PDO::PARAM_STR);

$statement->execute();

$userInfo = $statement->fetch(PDO::FETCH_ASSOC);

// Check Email
$avail = 'SELECT email FROM users WHERE email = :email';

$statement2 = $pdo->prepare($avail);
$statement2->bindParam(':email', $email, PDO::PARAM_STR);

$statement2->execute();

$row = $statement2->rowCount();

if ($row > 0) {
    if ($userInfo) {
        session_start();

        $_SESSION['id'] = $userInfo['id'];

        echo "Berhasil login";
        exit;
    } else {
        echo "Password salah";
        exit;
    }
} else {
    echo "Akun belum terdaftar";
    exit;
}