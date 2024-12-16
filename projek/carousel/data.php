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
    $id = $_GET['id'];
    
    // Prepare statement to prevent SQL injection
    $stmt = $koneksi->prepare("DELETE FROM tb_user WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('User berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus user');</script>";
    }
    $stmt->close();
    
    // Redirect to avoid repeated deletion on refresh
    echo "<script>window.location='index.php';</script>";
}

// Query to fetch only 'pelanggan' data from the 'tb_user' table
$sql = "SELECT * FROM tb_user WHERE role = 'pelanggan'";
$result = mysqli_query($koneksi, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Data Pelanggan</h3><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">HP</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Output each row of the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["alamat"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["hp"]) . "</td>";
                        echo "<td><a href='?aksi=hapus&id=" . htmlspecialchars($row['id']) . "' class='btn btn-danger'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data pelanggan</td></tr>";
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