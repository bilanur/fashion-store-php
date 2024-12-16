<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko");

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

$query = "SELECT * FROM tb_user where id='$_SESSION[id_user]'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>

<body>
    <style>

    <!-- HEADER START -->
    <header class="bg-light shadow sticky-top">

    nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 8%;
  }

  /* Ensure the logo and brand name are centered */
  .navbar-brand {
    display: flex;
    align-items: center; /* Align logo and text vertically */
  }

  .navbar-brand img {
    margin-right: 10px; /* Space between logo and text */
  }

  nav ul {
    list-style: none;
    display: flex;
    align-items: center; /* Align nav items vertically */
    margin: 0;
    padding: 0;
  }

  nav ul li {
    margin: 0 10px;
  }

  nav ul li a {
    color: #000;
    font-weight: 500;
    text-decoration: none;
    font-size: 17px;
    position: relative;
  }

  nav ul li a::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: #000;
    width: 0;
    height: 2.5px;
    transition: all 0.3s ease;
  }

  nav ul li a:hover::before {
    width: 100%;
  }

  nav ul li box-icon {
    font-size: 24px;
    display: flex;
    align-items: center;
  }
</style>

<nav>
<div class="container d-flex flex-wrap justify-content-between py-2 text-primary">
            Selamat datang di halaman profil...
            <div>
  </a>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#produk">Produk</a></li>
    <li><a href="keranjang.php">Keranjang</a></li>
    <li><a href="profil.php"><box-icon type='solid' name='user-circle'></box-icon></a></li>
  </ul>
</nav>

    </header>
    <!-- HEADER END -->

    
    
    <div class="container mt-5">
        <div class="row col-lg-8 border rounded mx-auto p-2 shadow-lg">
            <div class="col-md-4 text-center">
                <img src="img/p.jpg" class="img-fluid rounded-circle" style="width: 180px;height:180px;object-fit: cover;">
                <div class="mt-3">
                    <a href="profiledit.php">
                        <button class="btn btn-sm btn-info text-white">Edit Profile</button>
                    </a>
                    <a href="login.php">
                        <button class="btn btn-sm btn-warning text-white">Logout</button>
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="h2">User Profile</div>
                <table class="table table-striped">
                    <tr>
                        <th colspan="2">User Details:</th>
                    </tr>
                    <tr>
                        <th><i class="bi bi-person-circle"></i> Nama</th>
                        <td><?= $data['nama'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-envelope"></i> Email</th>
                        <td><?= $data['email'] ?></td>
                    </tr>
                    <tr>
                        <th><i>@</i> Username</th>
                        <td><?= $data['username'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-key"></i> Password</th>
                        <td><?= $data['password'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-geo-alt-fill"></i> Alamat</th>
                        <td><?= $data['alamat'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-telephone-fill"></i> No. Handphone</th>
                        <td><?= $data['hp'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="bg-light p-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <a href="" class="text-decoration-none">
                        <img src="img/lg4.jpg" style="width: 50px;">
                    </a>
                    <span class="ms-3">Copyright @2024 | Created and Developed by 
                        <a href="https://www.instagram.com/sabilaaa_nr?igsh=bnNxbTFocnE4ZG9n" class="text-decoration-none text-dark fw-bold">Bila</a>
                    </span>
                </div>
                <div class="col-md-6 text-end">
                    <a href="https://www.instagram.com/sabilaaa_nr?igsh=bnNxbTFocnE4ZG9n" class="text-decoration-none">
                        <img src="img/lg.jpg" class="ms-2" style="width: 25px;">
                    </a>
                    <a href="" class="text-decoration-none">
                        <img src="img/lg2.jpg" class="ms-3" style="width: 48px;">
                    </a>
                    <a href="" class="text-decoration-none">
                        <img src="img/lg1.jpg" style="width: 55px;">
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>
