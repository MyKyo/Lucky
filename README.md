# Lucky

![Waifu](https://i.pinimg.com/736x/a1/51/1b/a1511b5885428f8e6331fad46f8e8213.jpg)



**Lucky** Simple And Ya Just Simple.

## Fitur

- **Login**: Simple Protected
- **Logout**: Logout with simple to jump -> index.php

## Make  Jurnal Database SQL (localhost)
- Localhost Download if you dont have ![XAMPP](https://www.apachefriends.org/download.html)
- Go to ![PHPADMIN](http://localhost/phpmyadmin/)
```sql
create database tema;
```
```sql
CREATE TABLE jurnal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tema VARCHAR(255) NOT NULL,
    tgl_tema DATE NOT NULL,
    isi_tema TEXT NOT NULL
);




