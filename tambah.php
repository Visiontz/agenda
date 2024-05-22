<?php
require_once 'auth.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $sql = 'INSERT INTO agenda (judul, isi) VALUES (:judul, :isi)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':isi', $isi);

    if ($stmt->execute()) {
        header('Location: tabel.php');
        exit;
    } else {
        echo 'Error: '.$stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah agenda</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Tambah agenda</h1>

        <form action="tambah.php" method="post">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi:</label>
                <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <p class="mt-3"><a href="tabel.php" class="btn btn-secondary">Kembali ke Daftar </a></p>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

