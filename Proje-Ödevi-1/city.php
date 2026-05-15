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
    <title>Şehrim - Azerbaycan</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            overflow-y: auto;
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.5)), url('image/city-hero.jpg') center/cover no-repeat;
            color: white;
            padding: 150px 20px;
            text-align: center;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
        }

        .hero-section h1 {
            font-size: 4rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 15px;
        }

        .hero-section p {
            font-size: 1.4rem;
            max-width: 800px;
            margin: 0 auto;
            font-style: italic;
        }


        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background: #ff4d4d;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }


        .info-card {
            border: none;
            border-radius: 20px;
            transition: all 0.4s ease;
            overflow: hidden;
            background: white;
            height: 100%;
        }

        .info-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
        }


        .stat-bar {
            background: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 50px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-around;
            text-align: center;
            flex-wrap: wrap;
        }

        .stat-item h3 {
            color: #ff4d4d;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-item p {
            margin: 0;
            color: #666;
            font-weight: 500;
        }

        .footer-cta {
            background: #212529;
            color: white;
            padding: 60px 0;
            text-align: center;
            border-radius: 30px;
            margin-top: 50px;
            margin-bottom: 30px;
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
                    <li><a href="index.php">Hakkında</a></li>
                    <li><a href="cv.php">Özgeçmiş</a></li>
                    <li><a href="city.php" class="active nav">Şehrim</a></li>
                    <li><a href="heritage.php">Takımımız</a></li>
                    <li><a href="interests.php">İlgi Alanlarım</a></li>
                    <li><a href="contact.php">İletişim</a></li>
                </ul>
            </nav>
            <div class="account">
                <div class="account"><span
                        class="account-name"><?php echo htmlspecialchars($giris_yapan_ogrenci); ?><span
                            class="status">Çevrimiçi</span></span>
                    <a class="logout-btn" id="logout-btn" href="login.php?cikis=1"><i
                            class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <h1>AZERBAYCAN</h1>
                <p>"Odlar Yurdu"na, Kafkasya'nın parlayan yıldızına hoş geldiniz.</p>
            </div>
        </section>

        <div class="container">
            <div class="stat-bar">
                <div class="stat-item px-3">
                    <h3>Bakü</h3>
                    <p>Başkent</p>
                </div>
                <div class="stat-item px-3 border-start">
                    <h3>Manat</h3>
                    <p>Para Birimi</p>
                </div>
                <div class="stat-item px-3 border-start">
                    <h3>Azerice</h3>
                    <p>Resmi Dil</p>
                </div>
                <div class="stat-item px-3 border-start">
                    <h3>10 Milyon+</h3>
                    <p>Nüfus</p>
                </div>
            </div>

            <!-- Main Cards -->
            <h2 class="section-title">Azerbaycan'ın Değerleri</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card">
                        <img src="image/city-alevkuleleri.png" class="card-img-top" alt="Alev Kuleleri">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Modern Bakü ve Alev Kuleleri</h5>
                            <p class="card-text text-muted">Hazar Denizi kıyısında yükselen Flame Towers (Alev
                                Kuleleri), Azerbaycan'ın modern yüzünü ve "Ateş Ülkesi" sembolünü dünyaya tanıtan en
                                önemli mimari yapıdır.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card info-card">
                        <img src="image/city-oldcity.png" class="card-img-top" alt="İçeri Şehir">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Tarihi İçeri Şehir (Old City)</h5>
                            <p class="card-text text-muted">UNESCO Dünya Mirası listesinde yer alan İçeri Şehir, Kız
                                Kalesi ve Şirvanşahlar Sarayı ile ziyaretçilerini Orta Çağ atmosferine götüren tarihi
                                bir merkezdir.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card info-card">
                        <img src="image/city-yemekKulturu.png" class="card-img-top" alt="Azerbaycan Mutfağı">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Eşsiz Mutfak Kültürü</h5>
                            <p class="card-text text-muted">Şah Pilavı'ndan yaprak dolmasına, Hazar'ın taze
                                balıklarından meşhur Karabağ mutfağına kadar Azerbaycan, dünyanın en zengin gastronomi
                                duraklarından biridir.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-cta">
                <div class="container">
                    <h2>Kardeş Ülke: "İki Devlet, Tek Millet"</h2>
                    <p class="mt-3">Türkiye ve Azerbaycan arasındaki sarsılmaz bağ, tarihsel kökler ve kültürel
                        birliktelik üzerine kuruludur.</p>
                    <a href="heritage.html" class="btn btn-outline-light btn-lg mt-4 px-5">Ortak Mirasımızı Keşfet</a>
                </div>
            </div>
        </div>
    </main>

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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