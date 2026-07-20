<?php
session_start();

include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/keranjangHoodie.css">
</head>
<body>
    <div class="container">
        
        <a href="keranjang.php" class="back-link">← Kembali ke Pilihan Produk</a>
        <div class="product-detail">
            <div><img src ="../img/kaos3.jpeg" class="gambar_produk"></div>
            <div class="product-name">Kaos</div>
            <p style="color: #666; margin-top: 10px;">Silakan pilih ukuran, warna, dan jumlah yang diinginkan.</p>
        </div>

        <form action="prosesKeranjang.php" method="POST">
            <input type="hidden" name="jenis_produk" value="Kaos">

            <?php if(isset($_SESSION['id_user'])){?>
            <input hidden type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $_SESSION['id_user']; ?>" required>
            <?php }
            ?>

            <div class="form-group">
                <label for="ukuran">Ukuran</label>
                <select name="ukuran" id="ukuran" required>
                    <option value="">Pilih Ukuran</option>
                    <option value="S">S (Small)</option>
                    <option value="M">M (Medium)</option>
                    <option value="L">L (Large)</option>
                    <option value="XL">XL (Extra Large)</option>
                    <option value="XXL">XXL (Double Extra Large)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="warna">Warna</label>
                <select name="warna" id="warna" required>
                    <option value="">Pilih Warna</option>
                    <option value="Hitam">Hitam</option>
                    <option value="Putih">Putih</option>
                    <option value="Merah">Merah</option>
                    <option value="Biru">Biru</option>
                    <option value="Hijau">Hijau</option>
                    <option value="Kuning">Kuning</option>
                    <option value="Abu-abu">Abu-abu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" min="1" max="100" value="1" required>
            </div>

            <input type="submit" name="submit" class="btn" value="submit">
        </form>
    </div>
</body>
</html>