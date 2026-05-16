<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori_id = $_POST['kategori_id'];

if($harga < 0) {
    header("Location: edit.php?id=$id&error=Harga tidak boleh negatif");
    exit;
}

$query = "UPDATE barang
          SET nama_barang=?, harga=?, stok=?, kategori_id=?
          WHERE id=?";

$stmt = $pdo->prepare($query);

$stmt->execute([
    $nama_barang,
    $harga,
    $stok,
    $kategori_id,
    $id
]);

header("Location: index.php?pesan=Data berhasil diupdate");
exit;
?>