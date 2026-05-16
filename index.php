<?php if(isset($_GET['pesan'])) { ?>

<div class="alert alert-success">
    <?= $_GET['pesan']; ?>
</div>

<?php } ?>
<?php
include 'koneksi.php';

$query = "SELECT barang.*, kategori.nama_kategori
          FROM barang
          JOIN kategori ON barang.kategori_id = kategori.id";

$stmt = $pdo->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Data Barang</h2>

    <a href="tambah.php" class="btn btn-primary mb-3">
        Tambah Barang
    </a>
    <a href="cetak.php" class="btn btn-danger mb-3">
    Cetak PDF
</a>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
            
        </thead>

        <tbody>

        <?php
        $no = 1;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                <td>Rp <?= number_format($row['harga']); ?></td>
                <td><?= $row['stok']; ?></td>
                <td><?= $row['nama_kategori']; ?></td>
            </tr>
            <td>

    <a href="edit.php?id=<?= $row['id']; ?>"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <a href="proses_hapus.php?id=<?= $row['id']; ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Yakin ingin hapus data?')">
        Hapus
    </a>

</td>

        <?php } ?>

        </tbody>
    </table>
</div>

</body>
</html>