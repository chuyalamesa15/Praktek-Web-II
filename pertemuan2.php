<?php
// Data contoh (bisa diganti sesuai kebutuhan)
$mahasiswa = [
    ["nama" => "Andi", "nilai" => 85],
    ["nama" => "Budi", "nilai" => 78],
    ["nama" => "Citra", "nilai" => 70],
    ["nama" => "Dewi", "nilai" => 62],
    ["nama" => "Eka", "nilai" => 55],
];

// Fungsi untuk menentukan grade
function getGrade($nilai) {
    if ($nilai > 80) {
        return "A";
    } elseif ($nilai > 75) {
        return "B+";
    } elseif ($nilai > 65) {
        return "C+";
    } elseif ($nilai > 60) {
        return "C";
    } else {
        return "D";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Nilai Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Daftar Nilai Mahasiswa</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nilai</th>
        <th>Grade</th>
    </tr>

    <?php
    $no = 1;
    foreach ($mahasiswa as $mhs) {
        $grade = getGrade($mhs["nilai"]);
        echo "<tr>
                <td>$no</td>
                <td>{$mhs['nama']}</td>
                <td>{$mhs['nilai']}</td>
                <td>$grade</td>
              </tr>";
        $no++;
    }
    ?>
</table>

</body>
</html>