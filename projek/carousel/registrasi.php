<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko");

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];    
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $role='pelanggan';

   $query = "INSERT INTO tb_user(nama,email,username,password,alamat,hp,role)
     VALUES('$nama','$email','$username','$password','$alamat','$hp','$role')";

$simpan = mysqli_query($koneksi, $query); 
if($simpan) {
  header('Location: login.php');
  exit();
} else {
  echo "Gagal Menambahkan Data: " . mysqli_error($koneksi);
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleregister.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Registrasi</title>
    <style>
      @media (max-width: 767.98px) {
        .form-container {
          padding: 15px;
        }
      }
    </style>
  </head>
  <body>

<div class="container">
<form method="post" class="form-container mt-5">
<h3 class="text-judul text-center">REGISTER</h3>
    <div class="row">

    <div class="col-md-6">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><box-icon type='solid' name='user'></box-icon></span>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><b>@</b></span>
          <input type="text" name="username" class="form-control" id="username" placeholder="Username">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><box-icon type='solid' name='envelope'></box-icon></span>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><box-icon type='solid' name='key'></box-icon></span>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><box-icon name='location-plus' type='solid' color='#120f0f'></box-icon></span>
          <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="mb-3">
        <label for="hp" class="form-label">No. Handphone</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><box-icon type='solid' name='phone'></box-icon></span>
          <input type="text" name="hp" class="form-control" id="hp" placeholder="No. Handphone">
        </div>
      </div>
    </div>

    <div class="col-12 mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="terms">
      <label class="form-check-label" for="terms">Saya Menyetujui <span class="text-danger">Syarat & Ketentuan</span> Yang Berlaku<span class="text-danger">*</span></label>
    </div>

    <div class="col-12 mb-3">
      <button type="submit" name="submit" value="submit" class="btn btn-outline-primary w-100">Submit</button>
    </div>
    
    <div class="mt-3">
<div>
    <label>Sudah punya akun? <a href="login.php" class="text-login">Login Disini</label>
</div>
</div>

  </div>
</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  </body>
</html>
