<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $total_pembelian = $_POST['total_pembelian'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    $query = "INSERT INTO transaksi (tanggal, nama_pelanggan, total_pembelian, metode_pembayaran) 
              VALUES ('$tanggal', '$nama_pelanggan', '$total_pembelian', '$metode_pembayaran')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Transaksi</title>
</head>
<body>
    <h2>Tambah Data Transaksi</h2>
    <form action="" method="POST">
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" required><br><br>

        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" required><br><br>

        <label>Total Pembelian:</label><br>
        <input type="number" name="total_pembelian" step="0.01" required><br><br>

        <label>Metode Pembayaran:</label><br>
        <select name="metode_pembayaran" required>
            <option value="">-- Pilih --</option>
            <option value="Tunai">Tunai</option>
            <option value="Transfer">Transfer</option>
            <option value="E-Wallet">E-Wallet</option>
        </select><br><br>

        <input type="submit" name="simpan" value="Simpan">
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
