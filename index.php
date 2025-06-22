<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi Penjualan</title>
</head>
<body>
    <h2>Data Transaksi Penjualan</h2>
    <a href="tambah.php">+ Tambah Data</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Total Pembelian</th>
            <th>Metode Pembayaran</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM transaksi");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?= $data['id_transaksi']; ?></td>
            <td><?= $data['tanggal']; ?></td>
            <td><?= $data['nama_pelanggan']; ?></td>
            <td><?= $data['total_pembelian']; ?></td>
            <td><?= $data['metode_pembayaran']; ?></td>
            <td>
                <a href="edit.php?id=<?= $data['id_transaksi']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $data['id_transaksi']; ?>" onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
