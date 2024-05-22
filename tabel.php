<?php
require_once 'auth.php';
require_once 'config.php';

$sql = 'SELECT * FROM agenda';
$stmt = $db->query($sql);
$agenda_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Daftar agenda</h1>
        <p><a href="logout.php" class="btn btn-danger">Logout</a></p>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agenda_items as $key => $item) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo htmlspecialchars($item['judul']); ?></td>
                        <td><?php echo htmlspecialchars($item['isi']); ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                            <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?');">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p><a href="tambah.php" class="btn btn-primary">Tambah agenda</a></p>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
