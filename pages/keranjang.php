<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Produk - Toko Baju</title>
    <link rel="stylesheet" href="../css/keranjang.css">
</head>
<body>
    <header class="header">
            <!--kontainer logo header-->
            <div class="logo1_header">
                <img src="../img/Logo2.png" class="logo_utama">
            </div>
    </header>
        <div class="judul1">
            <h1>Pilih Produk</h1>
        </div>

    <div class="container">
        
        <div class="product-grid">
            <!-- Produk 1: Jaket -->
            <div class="product-card">
                <img src="../img/hoodie3.jpeg" class="img_produk_hoodie">
                <h3>Jaket</h3>
                <div class="price">Rp 250.000</div>
                <p style="color: #666; margin: 10px 0;">Jaket berkualitas tinggi</p>
                <a href="keranjangHoodie.php" class="btn">Pesan Sekarang</a>
            </div>

            <!-- Produk 2: Kaos -->
            <div class="product-card">
                <img src="../img/kaos3.jpeg" class="img_produk_kaos">
                <h3>Kaos</h3>
                <div class="price">Rp 150.000</div>
                <p style="color: #666; margin: 10px 0;">Kaos nyaman untuk sehari-hari</p>
                <a href="keranjangKaos.php" class="btn">Pesan Sekarang</a>
            </div>

            <!-- Produk 3: Kemeja -->
            <div class="product-card">
            <img src="../img/kemeja3.jpeg" class="img_produk_kemeja">
                <h3>Kemeja</h3>
                <div class="price">Rp 200.000</div>
                <p style="color: #666; margin: 10px 0;">Kemeja formal elegan</p>
                <a href="keranjangKemeja.php" class="btn">Pesan Sekarang</a>
            </div>
        </div>
    </div>
    <div>
        <a class="link_back" href="../index.php"><buttomn class="button_back_home">Home</button></a>
    </div>
</body>
</html>