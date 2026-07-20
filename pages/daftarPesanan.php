<?php
session_start();
include 'config.php';

$id_log = $_SESSION['id_user'];
$alamat = $_SESSION['alamat_user'];

$query_pesanan = mysqli_query($connect_db, "SELECT * FROM produk WHERE id_pelanggan = '$id_log' ORDER BY id_pelanggan ASC");
$query_produk = [];
while($row = mysqli_fetch_assoc($query_pesanan)){
    $query_produk[] = $row;
}

$query_keranjang = mysqli_query($connect_db, "SELECT * FROM keranjang WHERE id_pelanggan = '$id_log' ORDER BY id_pelanggan ASC");

$query_desain = mysqli_query($connect_db, "SELECT * FROM desain WHERE id_pelanggan = '$id_log' ORDER BY id_pelanggan");
$list_desain = [];
while($row = mysqli_fetch_assoc($query_desain)){
    $list_desain[] = $row;
}

$total_produk = count($query_produk);
$total_desain = count($list_desain);
$total = max($total_produk, $total_desain);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/daftarPesanan.css">
</head>
<body>
<header class="kontainer_header">
    <div class="judul1">
        <h1 class="judul">daftar pesanan anda</h1>
    </div>
    <div></div>

    <div class="kontainer_btn_home">
        <a href="../index.php"><button class="btn_home">Home</button></a>
    </div>
</header>
<section class="daftar_seluruh">
<div class="kontainer_produk_utama">
        <?php  
            for($i = 0; $i < $total; $i++){
                $produk = isset($query_produk[$i]) ? $query_produk[$i] : null;
                $desain = isset($list_desain[$i]) ? $list_desain[$i] : null;
        ?>
    <div class="kontainer_card">
        <div class="produk_card">
            <?php if($desain['gambar_desain']) : ?>
            <img class="img_produk" src = "../desainProduk/<?php echo $desain['gambar_desain']; ?>?v=<?php echo time(); ?>">
            <?php else: ?>
                    <div class="no-image">Tidak ada gambar desain</div>
            <?php endif; ?>
        </div>

        <div class="card_body">
            <?php if($produk) : ?>
            <h3 class="nama_produk"><?php echo htmlspecialchars($produk['nama_produk']); ?></h3>
            <ul class="detail_list">
                <li>
                    <span class="label"><strong>Deskripsi produk</strong></span>
                </li>
                <li>
                    <span class="value deskripsi_produk"><?php echo htmlspecialchars($produk['deskripsi']); ?></span>
                </li>
                <li>
                    <span class="label">Ukuran produk</span>
                    <span class="value">: <?php echo htmlspecialchars($produk['ukuran']); ?></span>
                </li>
                <li>
                    <span class="label">Stock</span>
                    <span class="value">: <?php echo htmlspecialchars($produk['stok']); ?>Pcs</span>
                </li>
                <li>
                    <span class="label">Harga Total Produk</span>
                    <span class="value">: Rp. <?php echo htmlspecialchars($produk['harga_produk']); ?></span>
                </li>
                <li>
                    <span class="label"><strong>Alamat Pelanggan</strong></span>
                </li>
                <li>
                    <span class="value deskripsi_produk"><?php echo htmlspecialchars($alamat) ?></span></li>
            </ul>
                <?php else: ?>
                <p class="text-muted">Detail produk tidak ditemukan untuk desain ini.</p>
                <?php endif; ?>

                <?php if ($desain && $desain['keterangan']): ?>
                    <div class="keterangan-desain">
                        <strong>Keterangan Desain:</strong>
                        <p class ="deskripsi_produk"><?php echo htmlspecialchars($desain['keterangan']); ?></p>
                    </div>
                        <?php endif; ?>

                <div class="btn_control">
                    <div class="btn_produk">
                        <a href="edit_produk.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-edit">Edit Produk</a>
                        <a href="proses_hapus.php?jenis=produk&id=<?php echo $produk['id_produk']; ?>" onclick="return confirm('Hapus produk ini?')" class="btn btn-delete">Hapus produk</a>
                    </div>
                    <div class="btn_desain">
                    <a href="edit_desain.php?id=<?php echo $desain['id_desain']; ?>" class="btn btn-edit">Edit Desain</a>
                    <a href="proses_hapus.php?jenis=desain&id=<?php echo $desain['id_desain']; ?>" onclick="return confirm('Hapus desain ini?')" class="btn btn-delete">Hapus desain</a>
                    </div>
                </div>
                <div class="produk_card">
                    <?php if($produk['bukti_pembayaran']) : ?>
                        <img class="img_produk" src = "../buktiTransfer/<?php echo $produk['bukti_pembayaran']; ?>?v=<?php echo time(); ?>">
                    <?php else: ?>
                        <div class="no-image">Tidak ada bukti pembayaran</div>
                    <?php endif; ?>
                </div>
        </div>
    </div>
    <?php } ?>
</div>

    <div class="container_list_pesanan">
        <h2 class="judul2">Barang Di Keranjang Anda</h2>
        <!-- kontainer barang keranjang-->
        <?php while($data_keranjang = mysqli_fetch_assoc($query_keranjang)){ ?>
        <div class= "kontainer_keranjang">
            <h3 class="judul_keranjang">Pesanan anda</h3>
            <ul class="list_keranjang">
            <li class="data_keranjang">
                <span class="label_keranjang">Jenis Produk </span>
                <span class="value_keranjang"> : <?php echo $data_keranjang['jenis_produk']; ?></span>
            </li>
            <li class="data_keranjang">
                <span class="label_keranjang">Warna </span>
                <span class="value_keranjang"> : <?php echo $data_keranjang['warna_produk']; ?></span>
            </li>
            <li class="data_keranjang">
                <span class="label_keranjang">jumlah pesanan </span>
                <span class="value_keranjang"> : <?php echo $data_keranjang['stock_keranjang']; ?></span>
            </li>
            <li class="data_keranjang">
                <span class="label_keranjang">Ukuran produk </span>
                <span class="value_keranjang"> : <?php echo $data_keranjang['ukuran_produk']; ?></span>
            </li>
            <li class="data_keranjang">
                <span class="label_keranjang">Harga </span>
                <span class="value_keranjang"> : <?php echo $data_keranjang['harga_produk_pesanan']; ?></span>
            </li>
            </ul>
            <div class="data_keranjang">
                <a href="proses_hapus.php?jenis=keranjang&id=<?php echo $data_keranjang['id_keranjang']; ?>" onclick="return confirm('Yakin ingin menghapus dari keranjang?')"><button style="background: red; color: white;">Delete</button></a>
            </div>
        </div>
        <?php }?>
    </div>
</section>
</body>
</html>