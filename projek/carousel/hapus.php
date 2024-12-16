<?php

$koneksi = mysqli_connect("localhost", "root", "", "toko");


if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $query = mysqli_query($koneksi, "DELETE FROM produk WHERE id=$id");

    // apakah query hapus berhasil?
    if( $query ){
        header ('Location: dashboard.php#table');
    } else {
        die("gagal menghapus...");
    }
}
?>
