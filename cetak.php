<?php
require 'vendor/autoload.php';
include 'koneksi.php';

use Spipu\Html2Pdf\Html2Pdf;

$query = "SELECT barang.*, kategori.nama_kategori
          FROM barang
          JOIN kategori ON barang.kategori_id = kategori.id";

$stmt = $pdo->query($query);

ob_start();
?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background: #cccccc;
    }
</style>

<page>

<h2>Laporan Data Barang</h2>

<table>

<tr>
    <th>No</th>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Kategori</th>
</tr>

<?php
$no = 1;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_barang']; ?></td>
    <td><?= $row['harga']; ?></td>
    <td><?= $row['stok']; ?></td>
    <td><?= $row['nama_kategori']; ?></td>
</tr>

<?php } ?>

</table>

</page>

<?php
$html = ob_get_clean();

$pdf = new Html2Pdf('P', 'A4', 'en');
$pdf->writeHTML($html);
$pdf->output('laporan_barang.pdf');
?>