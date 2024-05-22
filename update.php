<?php
require_once 'auth.php';
require_once 'config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo 'ID not provided';
    exit;
}

$id = $_GET['id'];

$sql = 'SELECT * FROM agenda WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$agenda_item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$agenda_item) {
    echo 'Agenda item not found';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $sql = 'UPDATE agenda SET judul = :judul, isi = :isi WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':isi', $isi);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: tabel.php');
    } else {
        echo 'Error updating agenda item';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Agenda</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Update Agenda</h1>

        <form method="POST">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" class="form-control" value="<?php echo htmlspecialchars($agenda_item['judul']); ?>" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi:</label>
                <textarea name="isi" id="isi" class="form-control" rows="5" required><?php echo htmlspecialchars($agenda_item['isi']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <p class="mt-3"><a href="tabel.php" class="btn btn-secondary">Kembali ke Daftar Agenda</a></p>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
