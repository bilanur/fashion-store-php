<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Fashion.store</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index.css">

	<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bila Fashion</title>
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<main>

  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/s1.jpg" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Fashion.store</h1>
            <p><a class="btn btn-lg btn-primary" href="#">Mulai Cari Produk</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/s2.jpg" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1>Pilih yang kau sukai</h1>
            <p><a class="btn btn-lg btn-primary" href="#">Lainnya</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/s3.jpg" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Apa yang anda sukai?</h1>
            <p><a class="btn btn-lg btn-primary" href="#">Produk serupa</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- Kategori -->
<div class="container-fluid mt-5">
  <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;">
    <h5 class="text-center" style="margin-top: 5px">KATEGORI</h5>
  </div>
  <div class="row justify-content-center text-center row-container mt-2">
    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
      <div class="menu-kategori">
        <a href="#baju"><img src="img/k.jpg" class="img-categori mt-3"></a>
        <p class="mt-2">Baju</p>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
      <div class="menu-kategori">
        <a href="#celana"><img src="img/k4.jpg" class="img-categori mt-3"></a>
        <p class="mt-2">Celana</p>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
      <div class="menu-kategori">
        <a href="#skirt"><img src="img/k1.jpg" class="img-categori mt-3"></a>
        <p class="mt-2">Skirt</p>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
      <div class="menu-kategori">
        <a href="#dress"><img src="img/k3.jpg" class="img-categori mt-3"></a>
        <p class="mt-2">Dress</p>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
      <div class="menu-kategori">
        <a href="#outer"><img src="img/y.jpg" class="img-categori mt-3"></a>
        <p class="mt-2">Outer</p>
      </div>
    </div>
  </div>
</div>
<!-- Kategori -->


  <!-- produk -->
   <div class="container mt-5" id="produk">
   <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;">
   <h5 class="text-center" style="margin-top: 5px">PRODUK</h5>
    <div class="row">
    
    <style>
    .card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        width: 200px;
        padding: 10px;
        text-align: center;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column; /* Flexbox layout to manage vertical content */
        justify-content: space-between; /* Distribute space between elements */
    }
    
    .card img {
        width: 100%;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }
    
    .card .title {
        font-size: 14px;
        margin-bottom: 5px;
    }
    
    .card .price {
        color: #000;
        font-weight: bold;
        margin: 10px 0;
    }
    
    .card .cart-icon {
        display: inline-block;
        background-color: #00ADEF;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 12px;
    }

    .card-body {
        flex-grow: 1; /* Allow body to take available vertical space */
    }

    .card .text {
        min-height: 40px; /* Ensure consistent height for product description */
    }
</style>

</head>
<body>

<div class="container mt-3">
   <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;" id="baju">
      <h5 class="text-center" style="margin-top: 5px">BAJU</h5><br>
      <div class="row g-2"> <!-- Ganti g-3 dengan g-2 untuk jarak lebih kecil -->
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "toko");

        $hasil = mysqli_query(
            $koneksi,
            "SELECT * FROM produk WHERE kategori='Baju'"                      
        );   

        while ($data = mysqli_fetch_array($hasil)) {
        ?>
          <!-- Start product item -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-2">
             <div class="card text-center">
                <img src="img/<?= $data['foto'] ?>" class="card-img-top" alt="<?= $data['nama'] ?>">
                <div class="card-body">
                   <h6 class="card-title"><?= $data['nama'] ?></h6>
                   <div class="text"><?= $data['deskripsi'] ?></div>
                   <div class="price">Rp. <?= number_format($data['harga']) ?></div>
                   <a href="detail.php?id=<?= $data['id']; ?>" class="cart-icon"><i class="bi bi-eye-fill"></i> Detail</a>
                </div>
             </div>
          </div>
          <!-- End product item -->
        <?php
        } 
        ?>
      </div>
   </div>
</div>

    <div class="container mt-5">
   <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;" id="celana">
      <h5 class="text-center" style="margin-top: 5px">CELANA</h5><br>
      <div class="row g-2"> <!-- Ganti g-3 dengan g-2 untuk jarak lebih kecil -->
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "toko");

        $hasil = mysqli_query(
            $koneksi,
            "SELECT * FROM produk WHERE kategori='Celana'"                      
        );   

        while ($data = mysqli_fetch_array($hasil)) {
        ?>
          <!-- Start product item -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-2">
             <div class="card text-center">
                <img src="img/<?= $data['foto'] ?>" class="card-img-top" alt="<?= $data['nama'] ?>">
                <div class="card-body">
                   <h6 class="card-title"><?= $data['nama'] ?></h6>
                   <div class="text"><?= $data['deskripsi'] ?></div>
                   <div class="price">Rp. <?= number_format($data['harga']) ?></div>
                   <a href="detail.php?id=<?= $data['id']; ?>" class="cart-icon"><i class="bi bi-eye-fill"></i> Detail</a>
                </div>
             </div>
          </div>
          <!-- End product item -->
        <?php
        } 
        ?>
      </div>
   </div>
</div>

<div class="container mt-5">
   <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;" id="skirt">
      <h5 class="text-center" style="margin-top: 5px">SKIRT</h5><br>
      <div class="row g-2"> <!-- Ganti g-3 dengan g-2 untuk jarak lebih kecil -->
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "toko");

        $hasil = mysqli_query(
            $koneksi,
            "SELECT * FROM produk WHERE kategori='Skirt'"                      
        );   

        while ($data = mysqli_fetch_array($hasil)) {
        ?>
          <!-- Start product item -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-2">
             <div class="card text-center">
                <img src="img/<?= $data['foto'] ?>" class="card-img-top" alt="<?= $data['nama'] ?>">
                <div class="card-body">
                   <h6 class="card-title"><?= $data['nama'] ?></h6>
                   <div class="text"><?= $data['deskripsi'] ?></div>
                   <div class="price">Rp. <?= number_format($data['harga']) ?></div>
                   <a href="detail.php?id=<?= $data['id']; ?>" class="cart-icon"><i class="bi bi-eye-fill"></i> Detail</a>
                </div>
             </div>
          </div>
          <!-- End product item -->
        <?php
        } 
        ?>
      </div>
   </div>
</div>

<div class="container mt-5">
   <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;" id="dress">
      <h5 class="text-center" style="margin-top: 5px">DRESS</h5><br>
      <div class="row g-2"> <!-- Ganti g-3 dengan g-2 untuk jarak lebih kecil -->
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "toko");

        $hasil = mysqli_query(
            $koneksi,
            "SELECT * FROM produk WHERE kategori='Dress'"                      
        );   

        while ($data = mysqli_fetch_array($hasil)) {
        ?>
          <!-- Start product item -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-2">
             <div class="card text-center">
                <img src="img/<?= $data['foto'] ?>" class="card-img-top" alt="<?= $data['nama'] ?>">
                <div class="card-body">
                   <h6 class="card-title"><?= $data['nama'] ?></h6>
                   <div class="text"><?= $data['deskripsi'] ?></div>
                   <div class="price">Rp. <?= number_format($data['harga']) ?></div>
                   <a href="detail.php?id=<?= $data['id']; ?>" class="cart-icon"><i class="bi bi-eye-fill"></i> Detail</a>
                </div>
             </div>
          </div>
          <!-- End product item -->
        <?php
        } 
        ?>
      </div>
   </div>
</div>

<div class="container mt-5">
   <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;" id="outer">
   <h5 class="text-center" style="margin-top: 5px">OUTER</h5><br>
    <div class="row">

        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "toko");

        $hasil = mysqli_query(
            $koneksi,
            "SELECT * FROM produk WHERE kategori='Outer'"                      
        );   

        while ($data = mysqli_fetch_array($hasil)) {
        ?>
          <!-- Start product item -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-2">
             <div class="card text-center">
                <img src="img/<?= $data['foto'] ?>" class="card-img-top" alt="<?= $data['nama'] ?>">
                <div class="card-body">
                   <h6 class="card-title"><?= $data['nama'] ?></h6>
                   <div class="text"><?= $data['deskripsi'] ?></div>
                   <div class="price">Rp. <?= number_format($data['harga']) ?></div>
                   <a href="detail.php?id=<?= $data['id']; ?>" class="cart-icon"><i class="bi bi-eye-fill"></i> Detail</a>
                </div>
             </div>
          </div>
          <!-- End product item -->
        <?php
        } 
        ?>
      </div>
   </div>
</div>
                            
                              
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
   <!-- produk -->

   <!-- footer -->
    <footer class="bg-light p-5 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <a href="" class="text-decoration-none">
              <img src="img/lg4.jpg" style="width: 50px;">
    </a>
    <span>Copyright @2024 | Created and Developed by <a href="https://www.instagram.com/sabilaaa_nr?igsh=bnNxbTFocnE4ZG9n" class="text-decoration-none text-dark fw-bold">Bila</a></span>
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
    <hr class="featurette-divider">
  </div>
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>
</html>