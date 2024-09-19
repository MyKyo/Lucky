<?php
include 'config.php';

// SQL untuk mengambil semua data
$sql = "SELECT * FROM jurnal";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Jurnal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Jurnal</h2>
    <a href="tambah.php">Tambah Jurnal</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tema</th>
            <th>Tgl Tema</th>
            <th>Isi Tema</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['tema'] ?></td>
            <td><?= $row['tgl_tema'] ?></td>
            <td><?= $row['isi_tema'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin akan di hapus?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>