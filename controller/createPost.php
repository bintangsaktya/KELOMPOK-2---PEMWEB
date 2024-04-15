<?php

require_once '../config/db.php';

$id_user = $_POST["id_user"];
$nama_barang = $_POST["nama_barang"];
$deskripsi = $_POST["deskripsi"];
$lokasi = $_POST["lokasi"];
$tanggal = $_POST["tanggal"];

$sql = "INSERT INTO barang (id_user, nama_barang, deskripsi, lokasi, tanggal, img_url) VALUES (:id_user, :nama_barang, :deskripsi, :lokasi, :tanggal, :img_url)";

$statement = $pdo->prepare($sql);

$statement->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$statement->bindParam(':nama_barang', $nama_barang, PDO::PARAM_STR);
$statement->bindParam(':deskripsi', $deskripsi, PDO::PARAM_STR);
$statement->bindParam(':lokasi', $lokasi, PDO::PARAM_STR);
$statement->bindParam(':tanggal', $tanggal, PDO::PARAM_STR);

$filename = $_FILES["file"]["name"];

$target = '../upload/' . $filename;

$file_ext = pathinfo($target, PATHINFO_EXTENSION);

$file_ext = strtolower($file_ext);

if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
    $statement->bindParam(':img_url', $target, PDO::PARAM_STR);
    $statement->execute();
    echo "Upload Berhasil";
    exit;
} else {
    echo "Upload gagal";
    exit;
}