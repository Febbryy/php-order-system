<?php

session_start();
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/pesanan.css">
</head>
<body>
<div class="kontainer_judul">
    <h1 class="judul_pesanan">Masukan pesanan Anda</h1>
</div>
<div class="kontainer_form">
    <form action="proses_pesanan.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" id="harga_satuan" value="20000">

    <?php if(isset($_SESSION['id_user'])){?>
            <input class="input_form" hidden type="text" id="id_pelanggan" name="id_pelanggan" value="<?php echo $_SESSION['id_user']; ?>" required>
            <?php }
            ?>

<!--input form data pelanggan-->
        <div class="kontainer_data">
            <?php if(isset($_SESSION['nama_user'])){?>
            <input class="input_form" hidden type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $_SESSION['nama_user']; ?>" required>
            <?php } else {?>
            <label class="label_input">Masukan Nama Anda</label>
            <input class="input_form" type="text" id="nama_pelanggan" name="nama_pelanggan">
        <?php } ?>
        </div>
        <div class="kontainer_data">
            <?php if(isset($_SESSION['no_user'])){ ?>
            <input class="input_form" hidden type="number" id="no_telepon" name="no_telepon" value="<?php echo $_SESSION['no_user']; ?>" required>
            <?php }else { ?>
            <label class="label_input">No Telepon</label>
            <input class="input_form" type="number" id="no_telepon" name="no_telepon">
            <?php } ?>
        </div>
        <div class="kontainer_data">
            <?php if(isset($_SESSION['email_user'])){?>
            <input class="input_form" hidden type="text" id="email" name="email" value="<?php echo $_SESSION['email_user'] ?>" required>
            <?php } else { ?>
            <label class="label_input">Email</label>
            <input class="input_form" type="text" id="email" name="email" required>
            <?php } ?>
        </div>
        <div class="kontainer_data">
            <?php if(isset($_SESSION['alamat_user'])){ ?>
            <input class="input_form" hidden type ="text" id="alamat" name="alamat" value ="<?php echo $_SESSION['alamat_user'] ?>" required>
            <?php }else {?>
            <label class="label_input"> Masukan Alamat</label>
            <textarea class="input_form" id="alamat" name="alamat" required></textarea>
            <?php } ?>

        </div>
<!--masukan nama produk yang di pesan-->
        <div class="kontainer_data">
            <label class="label_input">Nama Produk</label>
            <input class="input_form" type="text" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="kontainer_data">
            <label class="label_input">Deskripsi Produk</label>
            <textarea class="input_form" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="kontainer_data">
            <label class="label_input">ukuran</label>
            <input class="input_form" type="text" id="ukuran" name="ukuran" required>
        </div>
        <div class="kontainer_data">
            <label class="label_input">Stock</label>
            <input class="input_form" type="number" id="stock" name="stock" min="1" value="1" oninput="hitungTotal()" required>
        </div>
        <div class="kontainer_data">
            <label class="label_input">Nama Desain</label>
            <input class="input_form" type="text" id="nama_desain" name="nama_desain" required>
        </div>
        <div class="kontainer_data">
            <label class="label_input">berikan keterangan desain</label>
            <textarea class="input_form" id="keterangan_desain" name="keterangan_desain" accept="desainProduk/*"></textarea>
        </div>
        <div class="kontainer_data_file">
            <label class="label_input">Gambar Desain</label>
            <div class="wrapper_upload">
                <!-- Tambahkan onchange langsung untuk memicu deteksi file & kalkulasi -->
                <input class="input_form input_file" type="file" id="gambar_desain" name="gambar_desain" onchange="handleGambarDesain()">
                <label for="gambar_desain" class="tombol_pilih">Choose File</label>
                <span id="status_file" class="teks_status">Belum ada file dipilih</span>
            </div>
        </div>

        <!-- Input Harga Produk Tersembunyi (Akan terisi otomatis oleh JavaScript) -->
        <div class="kontainer_data">
            <input class="input_form" type="hidden" name="harga_produk" id="harga_produk" value="20000">
        </div>
        
        <!-- Menampilkan Total Harga Real-time (Pindahkan ke dalam form sebelum submit) -->
        <div class="kontainer_data" style="margin: 15px 0; background: #f9f9f9; padding: 10px; border-radius: 5px;">
            <strong>Total Yang Harus Dibayar:</strong>
            <h3 style="color: green; margin: 5px 0 0 0;">Rp <span id="tampil_total">20.000</span></h3>
        </div>

        <!-- Bagian Bukti Pembayaran -->
        <div class="kontainer_data">
            <label class="label_input" for="bukti">Upload Bukti Transfer:</label>
            <ul class="listpembayaran">
                <li>OVO = 0841682511513 </li>
                <li>DANA = 08814815515</li>
            </ul>
            <input type="file" name="bukti_pembayaran" id="bukti" class="Bukti" required>
        </div>
        
        <br>
        
        <div class="kontainer_data">
            <input class="input_form" type="submit" name="submit" value="simpan" class="btn-submit">
        </div>
    </form>
</div>

<script>
    // 1. Fungsi Kalkulasi Utama
    function hitungTotal(){
        // Menggunakan nilai 20000 sesuai input hidden harga_satuan baru Anda
        var harga = parseInt(document.getElementById('harga_satuan').value) || 20000;
        var stock = parseInt(document.getElementById('stock').value);
        var inputDesain = document.getElementById('gambar_desain');

        if(isNaN(stock) || stock < 1){
            stock = 1;
        }

        // Cek apakah ada file desain yang diunggah
        var hargaDesain = 0;
        if (inputDesain && inputDesain.files && inputDesain.files.length > 0) {
            hargaDesain = 25000;
        }

        // Hitung total akhir
        var total = harga * stock;
        var totalAkhir = total + hargaDesain;

        // Amankan input hidden agar sinkron ke PHP
        var hiddenHarga = document.getElementById('harga_produk');
        if(hiddenHarga) {
            hiddenHarga.value = totalAkhir;
        }

        // Tampilkan ke layar
        var formatRupiah = totalAkhir.toLocaleString('id-ID');
        document.getElementById('tampil_total').innerText = formatRupiah;
    }

    // 2. Fungsi Khusus untuk Handle Perubahan Input Gambar Desain
    function handleGambarDesain() {
        var input = document.getElementById('gambar_desain');
        var status = document.getElementById('status_file');
        
        if (input.files && input.files.length > 0) {
            status.innerHTML = input.files[0].name;
        } else {
            status.innerHTML = "Belum ada file dipilih";
        }
        
        // Jalankan kalkulasi total harga
        hitungTotal();
    }
</script>
</body>
</html>