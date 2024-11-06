<?php
include 'config.php'; // File koneksi database

// Ambil ID data yang akan dihapus dari parameter URL
$id = $_GET['id'];

// Ambil path file foto dari database
$stmt = $conn->prepare("SELECT foto FROM jurnal WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($fotoPath);
$stmt->fetch();
$stmt->close();

// Hapus file foto jika ada
if ($fotoPath && file_exists($fotoPath)) {
    unlink($fotoPath); // Menghapus file dari server
}

// Query DELETE menggunakan prepared statement untuk menghapus data jurnal
$stmt = $conn->prepare("DELETE FROM jurnal WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Jurnal berhasil dihapus";
    header("Location: index.php"); // Redirect ke halaman index setelah berhasil menghapus
    exit; // Menghentikan eksekusi setelah redirect
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
