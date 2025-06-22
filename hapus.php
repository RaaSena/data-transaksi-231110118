<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi='$id'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
