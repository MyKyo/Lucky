<?php
session_start(); // Mulai sesi untuk mengambil username

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tema";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $type = $_POST['type'];


    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Unknown';


    $stmt = $conn->prepare("INSERT INTO absen (type, timestamp, username) VALUES (?, NOW(), ?)");
    $stmt->bind_param("ss", $type, $username);


    if ($stmt->execute()) {
        echo "Absen " . ucfirst($type) . " berhasil dicatat.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Input Absen Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="menu">
        <h2>Menu Input Absen Siswa</h2>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        echo date("d/m/Y H:i:s");
        ?>
        <br><br>
        <button class="button" onclick="inputAbsen('masuk')">Absen Masuk</button>
        <br>
        <br>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        echo date("d/m/Y H:i:s");
        ?>
        <br><br>
        <button class="button" onclick="inputAbsen('pulang')">Absen Pulang</button>


        <div id="responseMessage"></div>
    </div>

    <script>
        function inputAbsen(type) {

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true); 
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
        
                    document.getElementById("responseMessage").innerHTML = xhr.responseText;
                } else {
                    alert("Error: " + xhr.status);
                }
            };
            xhr.send("type=" + type); 
        }
    </script>
</body>

</html>