<?php
include 'config.php'; // File koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $tema = $_POST['tema'];
    $tgl_tema = $_POST['tgl_tema'];
    $isi_tema = $_POST['isi_tema'];

    // Query UPDATE menggunakan prepared statement
    $stmt = $conn->prepare("UPDATE jurnal SET tema=?, tgl_tema=?, isi_tema=? WHERE id=?");
    $stmt->bind_param("sssi", $tema, $tgl_tema, $isi_tema, $id);

    if ($stmt->execute()) {
        echo "Jurnal berhasil diubah";
        header("Location: index.php"); // Redirect ke halaman index setelah berhasil mengubah
        exit; // Menghentikan eksekusi setelah redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Ambil data berdasarkan ID
    $id = $_GET['id'];
    $sql = "SELECT * FROM jurnal WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Data tidak ditemukan");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Jurnal</title>
</head>
<body>
    <h2>Edit Jurnal</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="tema">Tema:</label>
        <input type="text" name="tema" value="<?php echo $row['tema']; ?>" required><br>
        <label for="tgl_tema">Tanggal Tema:</label>
        <input type="date" name="tgl_tema" value="<?php echo $row['tgl_tema']; ?>" required><br>
        <label for="isi_tema">Isi Tema:</label>
        <textarea name="isi_tema" required><?php echo $row['isi_tema']; ?></textarea><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>