<?php
session_start();
include 'pages/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <div class=header1>

            <!--kontainer search header-->
            <div class="search">
            <?php if(isset($_SESSION['id_user'])){?>
                <a href="pages/daftarPesanan.php"><button>Daftar Pesanan anda</button></a>
            <?php }
            ?>
            </div>

            <!--kontainer logo header-->
            <div class="logo1_header">
                <img src="img/Logo2.png" class="logo_utama">
            </div>

            <!--kontainer Login-->
            <div class="login_section">
                
                <!--kontianer logo keranjang-->
               <?php if (isset($_SESSION['nama_user'])) : ?>
                <a href="pages/keranjang.php"><img src="img/Logokeranjang.png" class="logo_shop"></a>
                    <span class="nama_pelanggan" style="margin-right: 10px; color: #333;">
                    Halo, <b><?php echo $_SESSION['nama_user']; ?></b>
                    </span>
        <a href="pages/logout.php">
            <button class="btn_login">LOGOUT</button>
        </a>
        
    <?php else : ?>
        <p>login untuk menambahkan opsi keranjang</p>
        <a href="pages/formLogin.php">
            <button class="btn_login">LOGIN</button>
        </a>
    <?php endif; ?>
            </div>
        </div>
            <!--kontainer navigasi header-->
        <div class="navigasi_header">
            <ul class="list_navigasi_header">
                <li class="list_navigasi"><a><button class="btn_navigasi_header">Menu Item</button></a></li>
                <li class="list_navigasi"><a href="pages/pesanan.php"><button class="btn_navigasi_header">Custom Design</button></a></li>
                <li class="list_navigasi"><a><button class="btn_navigasi_header">Galeri</button></a></li>
                <li class="list_navigasi"><a><button class="btn_navigasi_header">Tentang Kami</button></a></li>
                <li class="list_navigasi"><a><button class="btn_navigasi_header">Kontak</button></a></li>
            </ul>
        </div>
    </header>
    <main>
        <section class="kontainer_image_kontent1">
            <div class="slide">
                <img src="img/img_konten1.png" class="img_kontent1">
                <img src="img/img_konten2.png" class="img_kontent1">
                <img src="img/img_konten3.png" class="img_kontent1">
                <img src="img/img_konten4.png" class="img_kontent1">
            </div>
        </section>
        <section class="kontainer_kontent2">
            <div class="kontainer_about">
                <div class="deskripsi_about">
                    <h1 class="judul_about">TENTANG KAMI</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p> Ad quis quia facere temporibus rem explicabo, pariatur</p> <p>facilis, aspernatur rerum,</p>
                    <p> molestiae accusantium ab aut aperiam debitis quidem.</p><p>Officia deserunt commodi rem?</p>
                </div>
                <div class="kontainer_img_abaout">
                    <img src="img/img_kontent11.png" class="img_about">
                </div>
            </div>
                <div class="judul_keunggulan">
                    <h1>KEUNGGULAN MM JAYA</h1>
                </div>
                <div class="kontainer_keunggulan">
                    <div class="keunggulan_child">
                        <div class="gambar_kontent2">
                            <img src="img/mesin_jait.png" class="logo_kontent2">
                        </div>
                        <div class="deskripsi1">
                            <p class="keunggulan1">Mesin Berkualitas<p>
                            <p class="keunggulan2">Presisi, Rapih, Berkualitas<p>
                        </div>
                    </div>
                    <div class="keunggulan_child">
                        <div class="gambar_kontent2">
                            <img src="img/logo_kaos.png" class="logo_kontent2" >
                        </div>
                        <div class="deskripsi1">
                            <p class="keunggulan1">Bahan Kaos<p>
                            <p class="keunggulan2">Lembut, Nyaman, Elegan, Bisa Custom<p>
                        </div>
                    </div>
                    <div class="keunggulan_child">
                        <div class="gambar_kontent2">
                            <img src="img/logo_waktu.png" class="logo_kontent2">
                        </div>
                        <div class="deskripsi1">
                            <p class="keunggulan1">Pengerjaan Tepat Waktu<p>
                            <p class="keunggulan2">Lembut, Nyaman, Elegan, Bisa Custom<p>
                        </div>
                    </div>
                    <div class="keunggulan_child">
                        <div class="gambar_kontent2">
                            <img src="img/logo_kardus.png" class="logo_kontent2">
                        </div>
                        <div class="deskripsi1">
                            <p class="keunggulan1">minimal Order Fleksibel<p>
                            <p class="keunggulan2">6 PCS<p>
                        </div>
                    </div>
                </div>
            <img src="img/img_konten5.png" class="img_kontent5">
        </section>
<!--kategoris-->
    <section class="kontainer_kontent3">
        <div class="kontainer_judul_kategori">
            <h1 class="judul_kategori">KATEGORI</h1>
        </div>
    <div class="kontainer_kontent_kategori">
        <div class="kontainer_kontent3_child">
            <div class="kontainer_img_kontent3">
                <img src="img/img_kontent6.png" class="img_kontent3">
            </div>
            <div class="btn_kontent3">
                <a href=""><button>Buka</button></a>
            </div>
        </div>
        <div class="kontainer_kontent3_child">
            <div class="kontainer_img_kontent3">
                <img src="img/img_kontent7.png" class="img_kontent3">
            </div>
            <div class="btn_kontent3">
                <a href=""><button>Buka</button></a>
            </div>
        </div>
        <div class="kontainer_kontent3_child">
            <div class="kontainer_img_kontent3">
                <img src="img/img_kontent8.png" class="img_kontent3">
            </div>
            <div class="btn_kontent3">
                <a href=""><button>Buka</button></a>
            </div>
        </div>
        <div class="kontainer_kontent3_child">
            <div class="kontainer_img_kontent3">
                <img src="img/img_kontent9.png" class="img_kontent3">
            </div>
            <div class="btn_kontent3">
                <a href=""><button>Buka</button></a>
            </div>
        </div>
        <div class="kontainer_kontent3_child">
            <div class="kontainer_img_kontent3">
                <img src="img/img_kontent10.png" class="img_kontent3">
            </div>
            <div class="btn_kontent3">
                <a href=""><button>Buka</button></a>
            </div>
        </div>
    </div>
    </section>
    </main>
    <footer>
        <script src="js/script.js"></script>
</body>
</html>