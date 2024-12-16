<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "toko");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
    $produk = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Product</title>
    <link rel="stylesheet" type="text/css" href="detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<style>
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
<div class="logo">Fashion.Store</div>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#produk">Produk</a></li>
    <li><a href="keranjang.php">Keranjang</a></li>
    <li><a href="profil.php"><box-icon type='solid' name='user-circle'></box-icon></a></li>
  </ul>
</nav>



    <div class="flex-box">
        <div class="left">
            <?php if ($produk): ?>
                <div class="big-img">
                    <img src="img/<?= htmlspecialchars($produk['foto']) ?>" class="img-fluid" alt="<?= htmlspecialchars($produk['nama']) ?>">
                </div>
        </div>
        <div class="right">
            <div class="name"><?= htmlspecialchars($produk['nama']) ?></div><br>
            <p class="lead">Rp. <?= number_format($produk['harga']) ?></p><br>
            <div class="deskripsi"><?= htmlspecialchars($produk['deskripsi']) ?></div><br>
            <p>Stok tersedia: <?= htmlspecialchars($produk['stok']) ?></p>
            <form action="keranjang.php?id=<?= htmlspecialchars($produk['id']) ?>" method="post">
                <input type="hidden" name="hidden_nama" value="<?= htmlspecialchars($produk['nama']) ?>">
                <input type="hidden" name="hidden_harga" value="<?= htmlspecialchars($produk['harga']) ?>">
                <input type="hidden" name="hidden_foto" value="<?= htmlspecialchars($produk['foto']) ?>">
                <input type="hidden" name="id_produk" value="<?= htmlspecialchars($produk['id']) ?>">
                
                <div class="size">
                    <p>Size :</p>
                    <div class="psize">M</div>
                    <div class="psize">L</div>
                    <div class="psize">XL</div>
                    <div class="psize">XXL</div>
                </div>
                <input type="hidden" id="selected-size" name="ukuran" value="">
                
                <script>
                    const sizeButtons = document.querySelectorAll('.psize');
                    const selectedSizeInput = document.getElementById('selected-size');
                    sizeButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            sizeButtons.forEach(btn => btn.classList.remove('active'));
                            this.classList.add('active');
                            selectedSizeInput.value = this.textContent.trim();
                        });
                    });
                </script>

                <p>Warna :
                <select id="selected-color" name="warna" class="form-select" aria-label="Default select example">
                    <option selected value="">Pilih warna</option>
                    <option value="Hitam">Hitam</option>
                    <option value="Putih">Putih</option>
                    <option value="Biru">Biru</option>
                    <option value="Pink">Pink</option>
                    <option value="Coklat">Coklat</option>
                    <option value="Cream">Cream</option>
                </select>
                </p>
                <br>
                
                <div class="quantity">
                    <p>Quantity :</p>
                    <input type="number" name="jumlah" min="1" max="<?= htmlspecialchars($produk['stok']) ?>" value="1">
                </div>
                
                <div class="btn-box">
                    <button type="submit" name="add" class="cart-btn btn btn-warning">Tambah Ke Keranjang</button>
                </div>
            </form>
            <?php else: ?>
                <p>Produk tidak ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        let bigImg = document.querySelector('.big-img img');
        function showImg(pic){
            bigImg.src = pic;
        }
    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
