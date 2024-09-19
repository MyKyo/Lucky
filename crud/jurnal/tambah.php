<?php
include 'config.php'; // File koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $tema = $_POST['tema'];
    $tgl_tema = $_POST['tgl_tema'];
    $isi_tema = $_POST['isi_tema'];

    // Query INSERT menggunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO jurnal (id, tema, tgl_tema, isi_tema) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id, $tema, $tgl_tema, $isi_tema);

    if ($stmt->execute()) {
        echo "Jurnal berhasil ditambahkan";
        header("Location: index.php");
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
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        textarea {
            height: 100px;
            resize: vertical; /* Allows vertical resizing only */
        }
    </style>
</head>
<body>
    <h2>Tambah Jurnal</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="id">ID:</label>
        <input type="text" name="id" required><br>
        <label for="tema">Tema:</label>
        <input type="text" name="tema" required><br>
        <label for="tgl_tema">Tanggal Tema:</label>
        <input type="date" name="tgl_tema" required><br>
        <label for="isi_tema">Isi Tema:</label>
        <textarea name="isi_tema" required></textarea><br>
        <input type="submit" value="Simpan"> <br> <br>
        <a href="index.php">Admin : Edit/Delete</a>
    </form>
</body>
</html>
