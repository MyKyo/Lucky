# Lucky

   ![Waifu](https://i.pinimg.com/736x/a1/51/1b/a1511b5885428f8e6331fad46f8e8213.jpg)

**Lucky**: Simple and just simple.

## Features

- **Login**: Simple protected login process.
- **Logout**: Easy logout that redirects to `index.php`.

## Setting Up the Jurnal Database (localhost)

1. **Install XAMPP** (if you don't have it):
   

      | Software | Link |
      |----------|------|
      | XAMPP    | [Download XAMPP](https://www.apachefriends.org/download.html) |


2. **Access phpMyAdmin**:
   - Navigate to [phpMyAdmin](http://localhost/phpmyadmin/).
3. **Create Database**:
   Run the following SQL command to create a new database:
   
   ```sql
      CREATE DATABASE tema;

      CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
   );

      CREATE TABLE login_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    login_time DATETIME NOT NULL,
    success TINYINT(1) NOT NULL
      );

      CREATE TABLE jurnal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tema VARCHAR(255) NOT NULL,
    tgl_tema DATE NOT NULL,
    isi_tema TEXT NOT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    username VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      );

      CREATE TABLE absen (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('masuk', 'pulang') NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    username VARCHAR(50) NOT NULL
      );





