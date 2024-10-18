# Lucky

![Waifu](https://i.pinimg.com/736x/a1/51/1b/a1511b5885428f8e6331fad46f8e8213.jpg)

**Lucky**: Simple and just simple.

## Features

- **Login**: Simple protected login process.
- **Logout**: Easy logout that redirects to `index.php`.

## Setting Up the Jurnal Database (localhost)

1. **Install XAMPP** (if you don't have it):
   - Download from the [XAMPP website](https://www.apachefriends.org/download.html).

2. **Access phpMyAdmin**:
   - Navigate to [phpMyAdmin](http://localhost/phpmyadmin/).

3. **Create Database**:
   Run the following SQL command to create a new database:
   ```sql
   CREATE DATABASE tema;
   
4. **Create Table**:
   Copy this
   CREATE TABLE jurnal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tema VARCHAR(255) NOT NULL,
    tgl_tema DATE NOT NULL,
    isi_tema TEXT NOT NULL
);
