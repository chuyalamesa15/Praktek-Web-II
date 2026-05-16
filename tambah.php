<?php
include 'koneksi.php';

$queryKategori = "SELECT * FROM kategori";
$stmtKategori = $pdo->query($queryKategori);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-primary text-white">
            Tambah Barang
        </div>

        <div class="card-body">

            <form action="proses_tambah.php" method="POST">

                <div class="mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>

                    <select name="kategori_id" class="form-select" required>

                        <option value="">-- Pilih Kategori --</option>

                        <?php while($kategori = $stmtKategori->fetch(PDO::FETCH_ASSOC)) { ?>

                            <option value="<?= $kategori['id']; ?>">
                                <?= $kategori['nama_kategori']; ?>
                            </option>

                        <?php } ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html>