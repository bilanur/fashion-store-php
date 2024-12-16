<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko");

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $hp = mysqli_real_escape_string($koneksi, $_POST['hp']);
    $password = !empty($_POST['password']);

    // Debugging untuk memastikan password diambil dengan benar
    var_dump($_POST['password']); // Cek apakah password terisi atau kosong
    // var_dump($password); // Cek hasil dari md5 jika ada

    if (!empty($_POST['password'])) {
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $query = "UPDATE tb_user SET nama='$nama', email='$email', username='$username', alamat='$alamat', hp='$hp', password='$password' WHERE id='$_SESSION[id_user]'";
    } else {
        $query = "UPDATE tb_user SET nama='$nama', email='$email', username='$username', alamat='$alamat', hp='$hp' WHERE id='$_SESSION[id_user]'";
    }
    

    // Debugging query untuk memastikan query benar
    echo $query;

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION['success'] = "Profile updated successfully!";
        header('Location: profil.php');
        exit;
    } else {
        $_SESSION['error'] = "Failed to update profile!";
    }
}

// Mengambil data pengguna
$query = "SELECT * FROM tb_user WHERE id='$_SESSION[id_user]'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <h1>Edit Profil</h1>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    <form method="post" action="">
        <table class="table table-striped">
            <tr><th colspan="2">User Details:</th></tr>
            <tr><th><i class="bi bi-person-circle"></i> Nama</th>
                <td>
                    <input value="<?=$data['nama']?>" type="text" class="form-control" name="nama" placeholder="Nama">
                </td>
            </tr>
            <tr><th><i class="bi bi-envelope"></i> Email</th>
                <td>
                    <input value="<?=$data['email']?>" type="text" class="form-control" name="email" placeholder="Email">
                </td>
            </tr>
            <tr><th><i>@</i> Username</th>
                <td>
                    <input value="<?=$data['username']?>" type="text" class="form-control" name="username" placeholder="Username">
                </td>
            </tr>
            <tr><th><i class="bi bi-key"></i> Password (Kosongkan jika tidak ingin mengubah)</th>
    <td>
        <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah">
    </td>
</tr>

            <tr><th><i class="bi bi-geo-alt-fill"></i> Alamat</th>
                <td>
                    <input value="<?=$data['alamat']?>" type="text" class="form-control" name="alamat" placeholder="Alamat">
                </td>
            </tr>
            <tr><th><i class="bi bi-telephone-fill"></i> No. Handphone</th>
                <td>
                    <input value="<?=$data['hp']?>" type="text" class="form-control" name="hp" placeholder="No. Handphone">
                </td>
            </tr>
        </table>
        <button class="btn btn-primary float-end">Save</button>
        <a href="profil.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
