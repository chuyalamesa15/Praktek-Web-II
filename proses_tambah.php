<?php
include 'koneksi.php';

$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori_id = $_POST['kategori_id'];

$query = "INSERT INTO barang
          (nama_barang, harga, stok, kategori_id)
          VALUES (?, ?, ?, ?)";

$stmt = $pdo->prepare($query);

$stmt->execute([
    $nama_barang,
    $harga,
    $stok,
    $kategori_id
]);

header("Location: index.php");
exit;
?>