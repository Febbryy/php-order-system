<?php
session_start();
include 'config.php';

$id_produk = mysqli_real_escape_string($connect_db, $_GET['id']);
$id_user = $_SESSION['id_user'];

// Ambil data lama produk tersebut
$query = mysqli_query($connect_db, "SELECT * FROM produk WHERE id_produk = '$id_produk' AND id_pelanggan = '$id_user'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan atau Anda tidak memiliki akses.");
}

// Proses Update ketika tombol simpan ditekan
if (isset($_POST['update'])) {
    $nama_produk = mysqli_real_escape_string($connect_db, $_POST['nama_produk']);
    $deskripsi   = mysqli_real_escape_string($connect_db, $_POST['deskripsi']);
    $ukuran      = mysqli_real_escape_string($connect_db, $_POST['ukuran']);
    $stok        = (int)$_POST['stok'];

    $query_update = "UPDATE produk SET 
                    nama_produk = '$nama_produk', 
                    deskripsi = '$deskripsi', 
                    ukuran = '$ukuran', 
                    stok = '$stok' 
                    WHERE id_produk = '$id_produk' AND id_pelanggan = '$id_user'";

    if (mysqli_query($connect_db, $query_update)) {
        echo "<script>alert('Data berhasil diubah!'); window.location='daftarPesanan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Produk</title></head>
<body>
    <h2>Edit Produk</h2>
    <form action="" method="POST">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea><br><br>

        <label>Ukuran:</label><br>
        <input type="text" name="ukuran" value="<?php echo $data['ukuran']; ?>" required><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required><br><br>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="daftarPesanan.php">Batal</a>
    </form>
</body>
</html>