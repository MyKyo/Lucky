<?php
session_start(); // Mulai sesi

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
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        

        header('Location: protected/index.php');
        exit;
    } else {
        echo "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="post">
        <h2>Login</h2>
       
        <div class="input-container">
            <input type="text" name="username" id="username" required>
            <label for="username">USERNAME</label>
        </div>

        <div class="input-container">
            <input type="password" name="password" id="password" required>
            <label for="password">PASSWORD</label>
        </div>

        <input type="submit" value="LOGIN">

        <a href="register.php" class="link">REGISTER</a>
    </form>

</body>

</html>