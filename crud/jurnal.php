<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Form Jurnal PKL Siswa</title>
 <link rel="stylesheet" href="style.css">

 </head>
<body>
 <div class="container">
 <h2>Form Jurnal PKL Siswa</h2>
 <div class="form-group">
 <label for="theme">Tema Jurnal:</label>
 <input type="text" id="theme" name="theme" required>
 </div>
 <div class="form-group">
 <label for="content">Isi Jurnal:</label>
 <textarea id="content" name="content" rows="6"
required></textarea>
 </div>
 <div class="form-group">
 <label for="photo">Foto:</label>
 <input type="file" id="photo" name="photo" accept="image/*">
 </div>
 <button type="submit">Submit</button>
 </div>
</body>
</html>