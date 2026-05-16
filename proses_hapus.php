<?php
require 'koneksi.php';
$id = $_GET['id'];

$sql = "DELETE FROM barang WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php?pesan=berhasil_hapus");
?>