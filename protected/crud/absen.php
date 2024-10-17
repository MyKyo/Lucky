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
  echo date("d/m/Y H:i:s");?>
 <br> <br>
 <button class="button" onclick="inputAbsen('pulang')">Absen Masuk</button>

 <br>
 <?php
 date_default_timezone_set('Asia/Jakarta');
echo date("d/m/Y H:i:s");?>
 <br> <br>
 <button class="button" onclick="inputAbsen('pulang')">Absen Pulang</button>
 </div>

 <script>
 // JavaScript untuk menangani input absen
 function inputAbsen(type) {
 if (type === 'masuk') {
 alert('Absen masuk berhasil dicatat.');
 } else if (type === 'pulang') {
 alert('Absen pulang berhasil dicatat.');
 }
 }
 </script>
</body>
</html>