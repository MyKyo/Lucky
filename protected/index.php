<?php
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../index.php'); // Redirect jika belum login
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
    html,
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header,
    footer {
        background-color: #3C43BC;
        color: white;
        text-align: center;
        padding: 20px 0;
    }

    nav {
        background-color: #292D83;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    nav a {
        color: white;
        margin: 0 15px;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
    }

    nav a:hover {
        text-decoration: none;
        background-color: rgba(255, 255, 255, 0.2);
        transform: scale(1.05);
    }

    #content {
        padding: 20px;
    }

    .container {
        flex: 1;
        display: flex;
    }

    iframe {
        width: 100%;
        height: 100vh;
        border: none;
    }
    </style>
</head>

<body>

    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <!-- Include Menu -->
    <?php include 'menu.php'; ?>

    <!-- Main Content with Iframe -->
    <div id="content">
        <iframe name="contentFrame" src="crud/home.php"></iframe>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

</body>

</html>