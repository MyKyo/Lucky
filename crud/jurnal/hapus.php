<?php
include 'config.php'; // File koneksi database

// Ambil ID data yang akan dihapus dari parameter URL
$id = $_GET['id'];

// Query DELETE menggunakan prepared statement
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
?>