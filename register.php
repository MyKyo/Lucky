<?php
$host = 'localhost';
$db = 'user_login';
$user = 'root';
$pass = '';

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        echo "Username sudah terdaftar, silakan pilih username lain.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $hashed_password]);
        echo "Registrasi berhasil!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="POST">
        <h2>Register</h2>
        <div class="input-container">
            <input type="text" name="username" id="username" required>
            <label for="username">USERNAME</label>
        </div>

        <div class="input-container">
            <input type="password" name="password" id="password" required>
            <label for="password">PASSWORD</label>
        </div>

        <input type="submit" value="REGISTER">

        <a href="index.php" class="link">LOGIN</a>
    </form>
</body>

</html>