<?php

require_once '../config/db.php';

$id_user = $_POST["id_user"];
$nama = $_POST["nama"];
$bio = $_POST["bio"];
$username = $_POST["username"];
$no_tlp = $_POST["no_tlp"];

$sql2 = "SELECT * FROM users WHERE id = :id";
$statement2 = $pdo->prepare($sql2);

$statement2->bindParam(':id', $id_user, PDO::PARAM_INT);

$statement2->execute();

$data = $statement2->fetch(PDO::FETCH_ASSOC);

$sql = "UPDATE users SET nama = :nama, bio = :bio, username = :username, no_tlp = :no_tlp, profile_img = :profile_img WHERE id = :id";

$statement = $pdo->prepare($sql);

$statement->bindParam(':id', $id_user, PDO::PARAM_INT);
$statement->bindParam(':nama', $nama, PDO::PARAM_STR);
$statement->bindParam(':bio', $bio, PDO::PARAM_STR);
$statement->bindParam(':username', $username, PDO::PARAM_STR);
$statement->bindParam(':no_tlp', $no_tlp, PDO::PARAM_STR);

if (isset($_FILES["file"]["name"])) {
    $filename = $_FILES["file"]["name"];

    $target = '../profile/' . $filename;

    $file_ext = pathinfo($target, PATHINFO_EXTENSION);

    $file_ext = strtolower($file_ext);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $statement->bindParam(':profile_img', $target, PDO::PARAM_STR);
        $statement->execute();
        echo "Upload Berhasil";
        exit;
    } else {
        echo "Upload gagal";
        exit;
    }
} else {
    $statement->bindParam(':profile_img', $data['profile_img'], PDO::PARAM_STR);
    $statement->execute();
    echo "Update berhasil";
    exit;
}

