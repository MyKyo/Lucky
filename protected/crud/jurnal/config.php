<?php
$servername = "localhost"; // Alamat server database
$username = "root";         // Username untuk login ke database
$password = "";             // Password untuk login (kosong untuk localhost)
$dbname = "tema";        // Nama database yang ingin diakses

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Menghentikan script jika koneksi gagal
}
?>