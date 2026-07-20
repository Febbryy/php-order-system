<?php
session_start();

include 'config.php';

// Pastikan user sudah login
if (!isset($_SESSION['id_user'])) {
    die("Akses ditolak. Anda belum login.");
}

$id_desain = mysqli_real_escape_string($connect_db, $_GET['id']);
$id_user = $_SESSION['id_user'];

// Ambil data desain lama
$query = mysqli_query($connect_db, "SELECT * FROM desain WHERE id_desain = '$id_desain' AND id_pelanggan = '$id_user'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan atau Anda tidak memiliki akses.");
}

if(isset($_POST['update'])){
    $nama_desain = mysqli_real_escape_string($connect_db, $_POST['nama_desain']);
    $keterangan  = mysqli_real_escape_string($connect_db, $_POST['keterangan']);

    $nama_file  = $_FILES['gambar_desain']['name'];
    $tmp_file   = $_FILES['gambar_desain']['tmp_name'];
    $error_file = $_FILES['gambar_desain']['error'];

    // Gunakan nama gambar lama sebagai default jika tidak diganti
    $gambar_final = $data['gambar_desain']; 

    // Jika user mengupload gambar baru
    if($error_file === 0){
        $ekstensi_valid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensi_gambar = explode('.', $nama_file);
        $ekstensi_gambar = strtolower(end($ekstensi_gambar));

        // Validasi format file
        if (!in_array($ekstensi_gambar, $ekstensi_valid)) {
            echo "<script>alert('Format gambar harus JPG, JPEG, PNG, atau WEBP!'); window.location='daftarPesanan.php';</script>";
            exit;
        }

        // Beri nama unik agar tidak bentrok
        $gambar_final = time() . '_' . $nama_file;
        $folder_tujuan = '../desainProduk/' . $gambar_final;

        // Pindahkan file baru ke folder tujuan
        if(!move_uploaded_file($tmp_file, $folder_tujuan)){
            echo "<script>alert('Gagal mengunggah gambar baru.'); window.location='daftarPesanan.php';</script>";
            exit;
        }

        // Opsional: Hapus file gambar lama dari server jika ada agar hemat ruang penyimpanan
        if (!empty($data['gambar_desain']) && file_exists('../desainProduk/' . $data['gambar_desain'])) {
            unlink('../desainProduk/' . $data['gambar_desain']);
        }
    }

    // Query UPDATE diletakkan di luar IF gambar agar tetap berjalan walau gambar tidak diubah
    $query_update = "UPDATE desain SET 
                    nama_desain = '$nama_desain',
                    gambar_desain = '$gambar_final',
                    keterangan = '$keterangan'
                    WHERE id_desain = '$id_desain' AND id_pelanggan = '$id_user'";

    if (mysqli_query($connect_db, $query_update)) {
        echo "<script>alert('Data berhasil diubah!'); window.location='daftarPesanan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Desain</title>
</head>
<body>
    <h2>Edit Desain</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nama Desain:</label><br>
        <input type="text" name="nama_desain" value="<?php echo $data['nama_desain']; ?>" required><br><br>

        <label>Gambar Desain Saat Ini:</label><br>
        <?php if(!empty($data['gambar_desain'])): ?>
            <img src="../desainProduk/<?php echo $data['gambar_desain']; ?>?v=<?php echo time(); ?>" width="150"><br>
        <?php else: ?>
            <p style="color: gray; font-style: italic;">Tidak ada gambar</p>
        <?php endif; ?>
        
        <label>Ganti Gambar Baru (Kosongkan jika tidak ingin diubah):</label><br>
        <input type="file" name="gambar_desain"><br><br>

        <label>Keterangan Desain:</label><br>
        <textarea name="keterangan" required><?php echo $data['keterangan']; ?></textarea><br><br>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="daftarPesanan.php">Batal</a>
    </form>
</body>
</html>