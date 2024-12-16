<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko");

session_start(); // Pastikan session dimulai

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'id' => $_GET["id"],
                'nama' => $_POST["hidden_nama"],
                'harga' => $_POST["hidden_harga"],
                'foto' => $_POST["hidden_foto"],
                'warna' => $_POST["warna"],
                'ukuran' => $_POST["ukuran"],
                'jumlah' => $_POST["jumlah"]
            );
            $_SESSION["cart"][$count] =  $item_array;

            if (empty($_POST["warna"]) || empty($_POST["ukuran"])) {
                echo '<script>alert("Ukuran dan warna harus dipilih!")</script>';
                echo '<script>window.history.back();</script>';
                exit();
            }

            echo '<script>alert("Produk berhasil dimasukkan ke keranjang")</script>';
            echo '<script>window.location="keranjang.php"</script>';
        } else {
            echo '<script>alert("Produk sudah ada di keranjang")</script>';
            echo '<script>window.location="keranjang.php"</script>';
        }
    } else {
        $item_array = array(
            'id' => $_GET["id"],
            'nama' => $_POST["hidden_nama"],
            'harga' => $_POST["hidden_harga"],
            'foto' => $_POST["hidden_foto"],
            'warna' => $_POST["warna"],
            'ukuran' => $_POST["ukuran"],
            'jumlah' => $_POST["jumlah"]
        );
        $_SESSION["cart"][0] =  $item_array;

        echo '<script>alert("Produk berhasil dimasukkan ke keranjang")</script>';
        echo '<script>window.location="index.php"</script>';
    }
}

if (isset($_GET["aksi"])) {
    if ($_GET["aksi"] == "hapus") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $itemDihapus = false;
            foreach ($_SESSION["cart"] as $key => $value) {
                if ($value['id'] == $id) {
                    $nama = $value['nama'];
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
                    $itemDihapus = true;

                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '$nama sudah terhapus!',
                                showConfirmButton: false,
                                timer: 1000,
                                backdrop: 'white'
                            }).then(function() {
                                window.location.href = 'keranjang.php#table';
                            });
                        });
                    </script>";
                    break;
                }
            }
            if (!$itemDihapus) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal menghapus item..',
                            timer: 1000,
                            backdrop: 'white'
                        }).then(function() {
                            window.location.href = 'keranjang.php#table';
                        });
                    });
                </script>";
            }
        }
    } 
}

/// Menangani pembelian
if (isset($_GET['aksi']) && $_GET['aksi'] == 'beli') {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        $id_pelanggan = $_SESSION['id_user'];

        foreach ($_SESSION['cart'] as $item) {
            $total += ($item['jumlah'] * $item['harga']);
        }

        $query = "INSERT INTO tb_transaksi (tanggal, id_pelanggan, total_harga) VALUES (NOW(), '$id_pelanggan', '$total')";
        if (mysqli_query($koneksi, $query)) {
            $id_transaksi = mysqli_insert_id($koneksi);

            foreach ($_SESSION['cart'] as $item) {
                $id_produk = $item['id'];
                $jumlah = $item['jumlah'];
                $warna = $item['warna'];
                $ukuran = $item['ukuran'];

                $sql = "INSERT INTO tb_detail (id_transaksi, id_produk, jumlah) VALUES ('$id_transaksi', '$id_produk', '$jumlah')";
                mysqli_query($koneksi, $sql);

                // Kurangi stok produk di database
                $sql_update_stok = "UPDATE produk SET stok = stok - '$jumlah' WHERE id='$id_produk'";
                mysqli_query($koneksi, $sql_update_stok);
            }

            unset($_SESSION['cart']);
            echo "<script>alert('Pembelian berhasil'); window.location.href='cetak.php?id=$id_transaksi';</script>";
        } else {
            echo "<script>alert('Pembelian gagal, coba lagi.')</script>";
        }
    } else {
        echo "<script>alert('Keranjang Anda kosong, tambahkan produk sebelum membeli.')</script>";
    }
}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang | Anda </title>
    <link rel="icon" href="" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<<style>
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
    <div class="mt-3">
    <div class="text-center mb-4">
    <h3>Keranjang Anda</h3><br>
        <table class="table table-bordered">
            <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value):
                        ?>
                            <tr style="vertical-align: middle;">
                                <td>
                                    <a href="detail.php?id=<?= $value['id']; ?>">
                                        <img src="img/<?= $value['foto'] ?>" height="100px">
                                    </a>
                                    <?= $value['nama'] ?>
                                </td>
                                <td><?= $value['jumlah'] ?></td>
                                <td><?= $value['warna'] ?></td>
                                <td><?= $value['ukuran'] ?></td>
                                <td>Rp. <?php echo number_format($value['harga'], 2) ?></td>
                                <td>
                                    Rp. <?php echo number_format($value['jumlah'] * $value['harga'], 2); ?></td>
                                 <td>
                                    <a href="keranjang.php?aksi=hapus&id=<?= $value['id'] ?>" class="btn btn-danger" id="delete-btn">
                                        <box-icon name='trash-alt' type='solid' color='#ffffff'></box-icon>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $total += ($value['jumlah'] * $value['harga']);
                        endforeach;
                        ?>
                        <tr style="vertical-align: middle;">
                            <td colspan="5" class="text-end fw-bold">Total:</td>
                            <td>Rp. <?php echo number_format($total, 2); ?></td>
                            <td>
                                <a href="keranjang.php?aksi=beli" class="btn btn-primary fw-medium" style="vertical-align: middle;">
                                    Beli
                                </a>
                            </td>
                        </tr>
                    </tbody>
        </table>
    </div>
    <div class="mt-1 d-flex align-items-center justify-content-center">
            <a href="index.php" class="btn btn-dark d-flex align-items-center text-white">
                Kembali ke beranda
            </a>
        </div>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>