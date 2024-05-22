<?php

require_once 'config.php';

if (isset($_POST['register'])) {
    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // menyiapkan query
    $sql = 'INSERT INTO users (name, username, password) 
            VALUES (:name, :username, :password)';
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = [
        ':name' => $name,
        ':username' => $username,
        ':password' => $password,
    ];

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if ($saved) {
        header('Location: login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>&larr; <a href="index.php">Home</a></p>
                    <h4 class="card-title">Bergabunglah bersama ribuan orang lainnya...</h4>
                    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Nama kamu" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
                        </div>

                        <!-- Uncomment this section if email input is needed
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Alamat Email" required>
                        </div>
                        -->

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                        </div>

                        <button type="submit" class="btn btn-success btn-block" name="register">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
