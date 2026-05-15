<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['ogrenci_no'])) {
    header("Location: login.php");
    exit();
}


$giris_yapan_ogrenci = $_SESSION['ogrenci_no'];
?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Main Content Styles */
        .bg {
            background-color: rgba(215, 248, 248, 0.1);
            min-height: 100vh;
        }

        .main-container {
            padding: 200px 30px 30px 0;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 70px;
        }

        .main-image {
            display: flex;
            justify-content: left;
            position: relative;
            display: inline-block;
            background-color: rgb(190, 206, 228);
            border-radius: 10px;
            padding: 8px;
        }

        .image {
            display: inline-block;
            width: 300px;
            border-radius: 15px;
            display: block;
            transform: rotate(0deg);
            transition: all 0.4s ease;
        }

        .image:hover {
            transform: rotate(-4deg);
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
            padding: 0 30px;
        }

        .content>h6 {
            font-size: 0.8rem;
            font-weight: 600;
            color: #2330e6;
            margin: -10px 0 0 0;
        }

        .main-title {
            font-weight: 700;
            color: #111214;
            width: 370px;

        }

        .main-description {
            font-size: 1rem;
            font-weight: 400;
            width: 500px;
        }

        .main-info {
            display: flex;
            flex-direction: row;
            gap: 15px;
        }

        .info {
            background-color: #ffffff;
            text-transform: uppercase;
            border: 1px solid rgba(16, 30, 223, 0.08);
            color: rgb(61, 61, 80);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .more-Info {
            background-color: rgb(84, 49, 209);
            border: 1px solid #737385a1;
            color: #ffffff;
            padding: 12px 0;
            width: 150px;
            border-radius: 10px;
            margin-top: 40px;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .more-Info:hover {
            background-color: rgb(54, 3, 150);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container header-container">
            <div class="Brand">
                <img src="image/logo.jpg" alt="Logo" class="logo">
                <h2 class="title">MAI<span>SUTHORI</span></h2>
            </div>
            <nav class="nav-bar">
                <ul class="nav-links">
                    <li><a href="index.php" class="active nav">Hakkında</a></li>
                    <li><a href="cv.php">Özgeçmiş</a></li>
                    <li><a href="city.php">Şehrim</a></li>
                    <li><a href="heritage.php">Takımımız</a></li>
                    <li><a href="interests.php">İlgi Alanlarım</a></li>
                    <li><a href="contact.php">İletişim</a></li>
                </ul>
            </nav>

            <div class="account"><span class="account-name"><?php echo htmlspecialchars($giris_yapan_ogrenci); ?><span
                        class="status">Çevrimiçi</span></span>
                <a class="logout-btn" id="logout-btn" href="login.php?cikis=1"><i class="bi bi-box-arrow-right"></i></a>
            </div>
    </header>

    <!-- Main Content -->
    <main class="bg">
        <div class="container main-container">
            <div class="main-image">
                <img src="image/WhatsApp Image 2026-05-09 at 20.51.28.jpeg" alt="Resim" class="image">

            </div>

            <div class="content">
                <h6>TANIŞALIM MI?</h6>
                <h2 class="main-title">Merhaba , Ben Bir Gelecek Tasarımcısıyım.</h2>
                <p class="main-description">Merhaba! Ben Ahmet, bu projede size kendimi tanıtmak istiyorum. Siz de beni
                    tanıyın!
                    Ben Geleceği bekleyenlerden değil, inşa edenlerden olmayı seçtim.
                    Analiz eder, planlar ve hayata geçiririm.
                    Kendi hikayemin hem yazarı, hem de başrolüyüm.
                    Azim, sabır ve tutkulu...
                </p>
                <div class="main-info">
                    <div class="info">Full Stack</div>
                    <div class="info">Code</div>
                    <div class="info">Database Analysis</div>
                </div>

                <a href="cv.php"><button type="button" class="more-Info">Özgeçmişimi İncele</button></a>
            </div>
        </div>
    </main>

    <script src="app.js"></script>
</body>
<footer class="modern-footer">
    <div class="container footer-container">
        <div class="footer-row">
            <div class="footer-col brand-col">
                <div class="footer-brand">
                    <img src="image/logo.jpg" alt="Logo" class="footer-logo">
                    <h3 class="footer-title">MAI<span>SUTHORI</span></h3>
                </div>
                <p class="footer-text">Geleceğin tasarımlarını modern web teknolojileri ile buluşturuyoruz.</p>
                <div class="social-links">
                    <a href="https://github.com/S2GDaminson" target="_blank"><i class="bi bi-github"></i></a>
                    <a href="https://www.youtube.com/@avonXX" target="_blank"><i class="bi bi-youtube"></i></a>
                    <a href="https://www.instagram.com/monsieur_asgarzadeh/" target="_blank"><i
                            class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h4>Hızlı Menü</h4>
                <ul class="footer-links">
                    <li><a href="index.php">Hakkında</a></li>
                    <li><a href="cv.php">Özgeçmiş</a></li>
                    <li><a href="city.php">Şehrim</a></li>
                    <li><a href="contact.php">İletişim</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Keşfet</h4>
                <ul class="footer-links">
                    <li><a href="heritage.php">Mirasımız</a></li>
                    <li><a href="interests.php">İlgi Alanlarım</a></li>
                    <li><a href="https://github.com/S2GDaminson/Proje-Odevi/tree/main/Proje-%C3%96devi"
                            target="_blank">Kaynak Kodlar</a></li>
                    <li><a href="#">Gizlilik</a></li>

                </ul>
            </div>

            <div class="footer-col">
                <h4>İletişim</h4>
                <ul class="contact-info">
                    <li><i class="bi bi-geo-alt"></i> Sakarya, Türkiye</li>
                    <li><i class="bi bi-envelope"></i> b251210554@sakarya.edu.tr</li>
                    <li><i class="bi bi-telephone"></i> +90 534 077 05 43</li>
                </ul>
                <a href="contact.html" class="footer-btn">
                    <span>Bize Ulaşın</span>
                    <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>&copy; 2026 Tüm Hakları Saklıdır. | Designed by Ahmet Asgarzade</p>
        </div>
    </div>
</footer>

</html>