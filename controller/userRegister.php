<?php

require_once '../config/db.php';

$name = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

function alreadyused($pdo, string $email): bool
{
    $sql = 'SELECT * from users WHERE email = :email';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();

    $data = $statement->rowCount();

    if ($data > 0) {
        return true;
    } else {
        return false;
    }
}

if (alreadyused($pdo, $email)) {
    echo "Email already used";
    exit;
} else {
    $sql = 'INSERT INTO users(nama,email,password) VALUES(:name, :email, :password)';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password
    ]);

    echo "Registered Successful";
}

