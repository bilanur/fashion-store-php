<?php
session_start();
session_destroy(); // Manghancurkan sesi
header('Location: login.php'); // Kembali ke halaman login
exit();
?>