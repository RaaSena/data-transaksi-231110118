<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan";
    exit;
}

if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $total_pembelian = $_POST['total_pembelian'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    $update = mysqli_query($conn, "UPDATE transaksi SET tanggal='$tanggal', nama_pelanggan='$nama_pelanggan', total_pembelian='$total_pembelian', metode_pembayaran='$metode_pembayaran' WHERE id_transaksi='$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data Transaksi</h2>
    <form method="POST">
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required><br><br>

        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>" required><br><br>

        <label>Total Pembelian:</label><br>
        <input type="number" name="total_pembelian" step="0.01" value="<?= $data['total_pembelian'] ?>" required><br><br>

        <label>Metode Pembayaran:</label><br>
        <select name="metode_pembayaran" required>
            <option value="Tunai" <?= $data['metode_pembayaran']=='Tunai'?'selected':'' ?>>Tunai</option>
            <option value="Transfer" <?= $data['metode_pembayaran']=='Transfer'?'selected':'' ?>>Transfer</option>
            <option value="E-Wallet" <?= $data['metode_pembayaran']=='E-Wallet'?'selected':'' ?>>E-Wallet</option>
        </select><br><br>

        <input type="submit" name="update" value="Update">
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
