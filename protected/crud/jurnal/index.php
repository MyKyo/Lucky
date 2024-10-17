<?php
include 'config.php';

// SQL untuk mengambil semua data
$sql = "SELECT * FROM jurnal";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurnal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000; /* Ganti warna border sesuai kebutuhan */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2; /* Ganti warna latar belakang header sesuai kebutuhan */
        }
    </style>
</head>
<body>
    <h2>Data Jurnal</h2>
    <a href="tambah.php">Tambah Jurnal</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tema</th>
                <th>Tanggal Tema</th>
                <th>Isi Tema</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['tema']) ?></td>
                    <td><?= htmlspecialchars($row['tgl_tema']) ?></td>
                    <td><?= htmlspecialchars($row['isi_tema']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= urlencode($row['id']) ?>">Edit</a>
                        <a href="hapus.php?id=<?= urlencode($row['id']) ?>" onclick="return confirm('Yakin akan dihapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Tidak ada data jurnal.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>