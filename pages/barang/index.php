<?php
include 'koneksi.php';

$query = "SELECT barang.*, kategori.nama_kategori
          FROM barang
          JOIN kategori ON barang.kategori_id = kategori.id";

$stmt = $pdo->query($query);
?>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Data Barang
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                    </tr>
                </thead>

                <tbody>

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

                </tbody>

            </table>

        </div>

    </div>

</div>