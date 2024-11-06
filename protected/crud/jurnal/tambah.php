<?php
include 'config.php'; // File koneksi database

// Pastikan session sudah dimulai dan ada variabel username
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $tema = $_POST['tema'];
    $tgl_tema = $_POST['tgl_tema'];
    $isi_tema = $_POST['isi_tema'];

    // Ambil username dari sesi
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Unknown'; // Gunakan 'Unknown' jika tidak ada sesi username

    // Proses upload foto
    $foto = $_FILES['foto'];
    $fotoPath = '';

    if ($foto['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/"; // Tentukan direktori untuk menyimpan foto
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Buat folder jika belum ada
        }

        $fotoName = basename($foto['name']);
        $fotoPath = $targetDir . uniqid() . "_" . $fotoName; // Nama file unik

        // Periksa dan pindahkan file yang diupload
        if (move_uploaded_file($foto['tmp_name'], $fotoPath)) {
            // Jika berhasil, simpan path-nya
            echo "Foto berhasil diunggah.<br>";
        } else {
            echo "Gagal mengunggah foto.<br>";
            $fotoPath = ''; // Kosongkan jika gagal
        }
    } else {
        echo "Tidak ada foto yang diunggah.<br>";
    }

    // Query INSERT menggunakan prepared statement tanpa id
    $stmt = $conn->prepare("INSERT INTO jurnal (tema, tgl_tema, isi_tema, foto, username) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $tema, $tgl_tema, $isi_tema, $fotoPath, $username);

    if ($stmt->execute()) {
        echo "Jurnal berhasil ditambahkan";
        header("Location: tambah.php");
        exit; // Menghentikan eksekusi setelah redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Jurnal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #292D83;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #292D83;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }
    </style>
</head>

<body>
    <h2>Tambah Jurnal</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label for="tema">Tema:</label>
        <input type="text" name="tema" required><br>
        <label for="tgl_tema">Tanggal Tema:</label>
        <input type="date" name="tgl_tema" required><br>
        <label for="isi_tema">Isi Tema:</label>
        <textarea name="isi_tema" required></textarea><br>
        <label for="foto">Upload Foto:</label>
        <input type="file" name="foto" id="foto"><br> <br>
        <input type="submit" value="Simpan"> <br> <br>
        <a href="index.php">Admin : Edit/Delete</a>
    </form>
</body>

</html>