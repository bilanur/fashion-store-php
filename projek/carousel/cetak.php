<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek out Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="nav.css">

    <!-- CSS for hiding the navbar and buttons during printing -->
    <style>
        @media print {
            nav, .btn {
                display: none !important; /* Hide the navbar and buttons only in print mode */
            }
        }
    </style>
</head>

<body>

<!-- Navbar, visible on screen but hidden in print -->
 <style>
nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 8%; /* Adjust the padding if needed */
    background-color: #f8f9fa; /* Optional: Add background color for better visibility */
    border-bottom: 1px solid #ddd; /* Optional: Add a subtle border to separate the navbar */
    position: relative;
}

.navbar-brand {
    display: flex;
    align-items: center; /* Ensures logo and brand name are aligned vertically */
}

.navbar-brand img {
    margin-right: 10px; /* Adds spacing between the logo and text */
}

nav ul {
    list-style: none;
    display: flex;
    align-items: center; /* Aligns the items vertically */
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

/* Ensure the box-icon is aligned properly */
nav ul li box-icon {
    font-size: 24px;
    display: flex;
    align-items: center;
}
</style>
<nav>
  <a class="navbar-brand" href="#">
    <img src="img/lg4.jpg" alt="" width="60" height="60">
    <span>Fashion<strong>.Store</strong></span>
  </a>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#produk">Produk</a></li>
    <li><a href="keranjang.php">Keranjang</a></li>
    <li><a href="profil.php"><box-icon type='solid' name='user-circle'></box-icon></a></li>
  </ul>
</nav>

<br>
<div class="container mt-5">
    <?php
    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "toko");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Mengambil ID transaksi dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan detail transaksi
    $trans = "SELECT * FROM tb_detail INNER JOIN tb_transaksi ON tb_detail.id_transaksi = tb_transaksi.id_transaksi WHERE tb_detail.id_transaksi='$id'";
    $query = mysqli_query($koneksi, $trans);
    if (!$query) {
        die("Query failed: " . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($query);

    // Query untuk mendapatkan informasi pelanggan
    $res = "SELECT * FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_pelanggan = tb_user.id WHERE tb_transaksi.id_transaksi='$id'";
    $query2 = mysqli_query($koneksi, $res);
    if (!$query2) {
        die("Query failed: " . mysqli_error($koneksi));
    }
    $user = mysqli_fetch_assoc($query2);
    ?>

    <div style="clear: both;"></div>
    <h3 class="title2">Nota Pembelian</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No. Invoice</th>
                <td>INV-<?= $id ?></td>
            </tr>
            <tr>
                <th>Nama Pembeli</th>
                <td><?= ucfirst($user['nama']) ?></td>
            </tr>
            <tr>
                <th>Tanggal Pembelian</th>
                <td><?= $data['tanggal'] ?></td>
            </tr>
        </table>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th width="70%">Nama Barang</th>
                    <th width="30%">Qty</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mendapatkan detail produk
                $prod = "SELECT * FROM tb_detail INNER JOIN produk ON tb_detail.id_produk = produk.id WHERE tb_detail.id_transaksi='$id'";
                $query3 = mysqli_query($koneksi, $prod);

                while ($row = mysqli_fetch_array($query3)) {
                ?>
                    <tr>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td><strong>Grand Total</strong></td>
                    <td align="right"><strong>Rp <?= number_format($data['total_harga']); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Tombol Cetak -->
        <div class="text-end mt-4">
            <button onclick="window.print()" class="btn btn-primary">Cetak Nota</button>
        </div>
    </div>
</div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
