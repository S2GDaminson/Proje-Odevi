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
    <title>Takımımız</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            overflow-y: auto;
            background-color: #f3f5f8;
        }

        .heritage-bg {
            min-height: 100vh;
            padding: 60px 0;
        }

        .heritage-container {
            display: flex;
            flex-direction: column;
            gap: 35px;
            max-width: 950px;
        }


        .heritage-top-card {
            background-color: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .heritage-image {
            position: relative;
            width: 100%;
            height: 420px;
        }

        .heritage-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .heritage-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 35px;
            color: white;
            background: linear-gradient(transparent,
                    rgba(0, 0, 0, 0.75));
        }

        .heritage-overlay h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .heritage-overlay p {
            font-size: 1rem;
            margin: 0;
        }



        .heritage-content {
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .heritage-tag {
            width: fit-content;
            padding: 7px 18px;
            border-radius: 30px;
            background-color: rgba(35, 48, 230, 0.08);
            color: #2330e6;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .heritage-title {
            font-size: 2.3rem;
            font-weight: 700;
            color: #111214;
        }

        .heritage-line {
            width: 80px;
            height: 4px;
            border-radius: 10px;
            background-color: #2330e6;
        }

        .heritage-text {
            font-size: 1rem;
            color: #5e6470;
            line-height: 1.9;
        }


        .heritage-features {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .heritage-feature {
            display: flex;
            align-items: center;
            gap: 10px;

            background-color: #ffffff;
            border: 1px solid rgba(35, 48, 230, 0.08);

            padding: 10px 18px;
            border-radius: 30px;

            font-size: 0.9rem;
            font-weight: 500;
            color: #3d3d50;
        }

        .heritage-feature i {
            color: #198754;
        }



        .heritage-button {
            width: 220px;
            padding: 14px 0;

            border: none;
            border-radius: 12px;

            background-color: rgb(84, 49, 209);
            color: white;

            font-size: 0.9rem;
            font-weight: 600;

            cursor: pointer;
            transition: all .3s ease;
        }

        .heritage-button:hover {
            background-color: rgb(54, 3, 150);
        }


        .heritage-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .heritage-stat-card {
            background-color: white;
            padding: 30px 20px;

            border-radius: 18px;

            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;

            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);

            transition: all .3s ease;
        }

        .heritage-stat-card:hover {
            transform: translateY(-5px);
        }

        .heritage-stat-card i {
            font-size: 2rem;
            color: #2330e6;
        }

        .heritage-stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111214;
        }

        .heritage-stat-title {
            font-size: 0.8rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }



        .heritage-history {
            background-color: white;
            border-radius: 18px;
            padding: 40px;

            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);

            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .heritage-history h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #111214;
        }

        .heritage-history p {
            color: #5e6470;
            line-height: 1.9;
            font-size: 1rem;
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
                    <li><a href="city.php">Şehrim</a></li>
                    <li><a href="heritage.php" class="active nav">Takımımız</a></li>
                    <li><a href="interests.php">İlgi Alanlarım</a></li>
                    <li><a href="contact.php">İletişim</a></li>

                </ul>

            </nav>

            <div class="account"><span class="account-name"><?php echo htmlspecialchars($giris_yapan_ogrenci); ?><span
                        class="status">Çevrimiçi</span></span>
                <a class="logout-btn" id="logout-btn" href="login.php?cikis=1"><i class="bi bi-box-arrow-right"></i></a>
            </div>

        </div>

    </header>

    <!-- Main Content -->
    <main class="heritage-bg">

        <div class="container heritage-container">


            <div class="heritage-top-card">

                <div class="heritage-image">

                    <img src="image/heritage.png" alt="Bakü Olimpiyat Stadı">

                    <div class="heritage-overlay">

                        <h2>
                            Bakü Olimpiyat Stadı
                        </h2>

                        <p>
                            Azerbaycan futbolunun en büyük sahnesi
                        </p>

                    </div>

                </div>

                <div class="heritage-content">

                    <div class="heritage-tag">
                        FUTBOL TAKIMIMIZ
                    </div>

                    <h1 class="heritage-title">
                        Azerbaycan Milli Futbol Takımı
                    </h1>

                    <div class="heritage-line"></div>

                    <p class="heritage-text">

                        Azerbaycan Milli Futbol Takımı,
                        1992 yılında FIFA ve UEFA üyeliği kazanarak
                        uluslararası arenada resmi olarak mücadele etmeye başladı.

                        Takımın yönetimi AFFA tarafından yürütülmektedir.
                        İç saha maçlarının büyük bölümü Bakü Olimpiyat Stadı'nda oynanmaktadır.

                        Son yıllarda yapılan altyapı yatırımları,
                        genç oyuncu gelişimi ve modern tesis çalışmaları sayesinde
                        Azerbaycan futbolu önemli bir gelişim sürecine girmiştir.

                    </p>

                    <div class="heritage-features">

                        <div class="heritage-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            UEFA Üyesi
                        </div>

                        <div class="heritage-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            Modern Stadyum
                        </div>

                        <div class="heritage-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            Genç Yetenekler
                        </div>

                        <div class="heritage-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            Güçlü Taraftar
                        </div>

                    </div>

                    <a href="https://www.affa.az/" target="_blank">
                        <button class="heritage-button">
                            Resmi Siteye Git
                        </button>

                    </a>

                </div>

            </div>

            <!-- Stats -->

            <div class="heritage-stats">

                <div class="heritage-stat-card">

                    <i class="bi bi-calendar-check"></i>

                    <div class="heritage-stat-number">
                        1992
                    </div>

                    <div class="heritage-stat-title">
                        Kuruluş
                    </div>

                </div>

                <div class="heritage-stat-card">

                    <i class="bi bi-people"></i>

                    <div class="heritage-stat-number">
                        68.700
                    </div>

                    <div class="heritage-stat-title">
                        Stadyum Kapasitesi
                    </div>

                </div>

                <div class="heritage-stat-card">

                    <i class="bi bi-trophy"></i>

                    <div class="heritage-stat-number">
                        AFFA
                    </div>

                    <div class="heritage-stat-title">
                        Federasyon
                    </div>

                </div>

                <div class="heritage-stat-card">

                    <i class="bi bi-star-fill"></i>

                    <div class="heritage-stat-number">
                        UEFA
                    </div>

                    <div class="heritage-stat-title">
                        Uluslararası Üyelik
                    </div>

                </div>

            </div>

            <!-- History -->

            <div class="heritage-history">

                <h3>
                    Azerbaycan Futbolunun Tarihi
                </h3>

                <div class="heritage-line"></div>

                <p>

                    Azerbaycan'da futbolun geçmişi
                    20. yüzyılın başlarına kadar uzanmaktadır.

                    Sovyetler Birliği döneminde çeşitli kulüpler ile
                    futbol kültürü gelişmiş,
                    bağımsızlığın ardından milli takım resmi olarak kurulmuştur.

                    Özellikle Bakü Olimpiyat Stadı'nın açılması,
                    Avrupa kupası finalleri ve uluslararası organizasyonların
                    ülkede düzenlenmesi Azerbaycan futbolunun dünya çapında
                    daha fazla tanınmasını sağlamıştır.

                </p>

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