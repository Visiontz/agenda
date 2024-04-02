<!DOCTYPE html>
<html>
<head>
    <title>Tambah Agenda</title>
</head>
<body>
    <h1>Tambah Agenda</h1>

    <form action="tabel.php" method="post">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" required>
        <br>
        <label for="isi">Isi:</label>
        <textarea name="isi" id="isi" required></textarea>
        <br>
        <button type="submit">Simpan</button>
    </form>

    <p><a href="tabel.php">Kembali ke Daftar Agenda</a></p>
</body>
</html>