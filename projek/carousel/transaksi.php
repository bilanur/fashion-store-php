<?php
// Connect to the database
$koneksi = mysqli_connect("localhost", "root", "", "toko");

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start session if not started
session_start();

// Handle delete action
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus' && isset($_GET['id'])) {
    $id = (int) $_GET['id']; // Sanitize input
    
    // Prepare statement to prevent SQL injection
    $stmt = $koneksi->prepare("DELETE FROM tb_transaksi WHERE id_transaksi = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = 'Transaksi berhasil dihapus';
    } else {
        $_SESSION['message'] = 'Gagal menghapus transaksi';
    }
    $stmt->close();
    
    // Redirect to avoid repeated deletion on refresh
    header("Location: transaksi.php");
    exit();
}

// Query to fetch data from the 'tb_transaksi' table
$sql = "SELECT * FROM tb_transaksi";
$result = mysqli_query($koneksi, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Data Transaksi</h3><br>
        
        <!-- Display session message if available -->
        <?php
        if (isset($_SESSION['message'])) {
            echo "<script>alert('" . htmlspecialchars($_SESSION['message']) . "');</script>";
            unset($_SESSION['message']); // Clear the message after displaying
        }
        ?>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">ID Pelanggan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Output each row of the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id_transaksi"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["id_pelanggan"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["tanggal"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["total_harga"]) . "</td>";
                        echo "<td><a href='?aksi=hapus&id=" . urlencode($row['id_transaksi']) . "' class='btn btn-danger'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data transaksi</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close database connection
mysqli_close($koneksi);
?>