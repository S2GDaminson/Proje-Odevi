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
    <title>Özgeçmiş - Ahmet Asgarzade</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .cv-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .cv-header {
            background: linear-gradient(135deg, #2330e6 0%, #4a54f1 100%);
            color: white;
            padding: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .cv-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
        }

        .cv-header p.subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-top: 5px;
        }

        .contact-info {
            text-align: right;
            font-size: 0.9rem;
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            padding-left: 20px;
        }

        .contact-info div {
            margin-bottom: 5px;
        }

        .contact-info strong {
            font-weight: 600;
        }

        .cv-body {
            padding: 40px;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #111214;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .section-title i {
            color: #2330e6;
        }

        .about-text {
            color: #545961;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            width: 2px;
            height: 100%;
            background: #e0e6ed;
            transform: translateX(-50%);
        }

        .timeline-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            width: 100%;
            position: relative;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            width: 12px;
            height: 12px;
            background: #2330e6;
            border-radius: 50%;
            transform: translateX(-50%);
            z-index: 2;
            border: 3px solid white;
            box-shadow: 0 0 0 2px rgba(35, 48, 230, 0.2);
        }

        .timeline-dot.empty {
            background: #cbd5e1;
        }

        .timeline-content {
            width: 45%;
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #edf2f7;
            transition: all 0.3s ease;
        }

        .timeline-content:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-content h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .timeline-content .major {
            color: #2330e6;
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .timeline-content time {
            display: inline-block;
            background: white;
            padding: 2px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            color: #64748b;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 10px;
        }

        .timeline-content p {
            font-size: 0.85rem;
            color: #545961;
            margin: 0;
        }

        .skill-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .badge-custom {
            background: #f1f5f9;
            color: #475569;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid #e2e8f0;
        }

        .skills-lang-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
        }

        .skills-lang-row>div:first-child {
            flex: 7;
            min-width: 250px;
        }

        .skills-lang-row>div:last-child {
            flex: 5;
            min-width: 200px;
        }

        @media (max-width: 768px) {
            .skills-lang-row {
                flex-direction: column;
                gap: 25px;
            }

            .skills-lang-row>div:first-child,
            .skills-lang-row>div:last-child {
                flex: unset;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container header-container">
            <div class="Brand">
                <img src="image/logo.jpg" alt="Logo" class="logo">
                <h2 class="title">MAI<span>SUTHORI</span></h2>
            </div>
            <nav class="nav-bar">
                <ul class="nav-links">
                    <li><a href="index.php">Hakkında</a></li>
                    <li><a href="cv.php" class="active nav">Özgeçmiş</a></li>
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
        </div>
    </header>

    <main class="container">
        <div class="cv-container">
            <header class="cv-header">
                <div>
                    <h1>Ahmet Asgarzade</h1>
                    <p class="subtitle">Yazılım Mühendisi</p>
                </div>
                <address class="contact-info">
                    <div><strong>E-posta:</strong> b251210554@sakarya.edu.tr</div>
                    <div><strong>Telefon:</strong> +90 (534) 077 05 43</div>
                    <div><strong>Konum:</strong> Serdivan, Sakarya</div>
                </address>
            </header>

            <div class="cv-body">
                <div>
                    <h2 class="section-title"><i class="bi bi-person"></i> Hakkımda</h2>
                    <p class="about-text">Yenilikçi teknolojilere meraklı, sürekli öğrenmeyi ve kendini geliştirmeyi
                        hedefleyen bir yazılım mühendisiyim. Özellikle web teknolojileri ve modern kullanıcı arayüzleri
                        konusunda akademik altyapımı pratik projelerle destekledim.</p>
                </div>

                <div>
                    <h2 class="section-title"><i class="bi bi-mortarboard"></i> Eğitim Bilgileri</h2>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h4>Sakarya Üniversitesi</h4>
                                <div class="major">Bilgisayar Mühendisliği (Lisans)</div>
                                <time>Eylül 2025 - Devam Ediyor</time>
                                <p>

                                    Sakarya Üniversitesi Bilgisayar Mühendisliği bölümünde eğitimine devam etmekte olup;
                                    web teknolojileri, nesneye dayalı programlama ve modern yazılım geliştirme
                                    alanlarında
                                    kendini geliştirmektedir. Front-end ve back-end teknolojileri üzerine projeler
                                    geliştirerek
                                    yazılım becerilerini aktif olarak ilerletmektedir.

                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot empty"></div>
                            <div class="timeline-content">
                                <h4>Step IT Academy</h4>
                                <div class="major">Software Development</div>
                                <time>Kasım 2022 - Devam Ediyor (Duraklatıldı) </time>
                                <p> Step IT Academy bünyesinde yazılım geliştirme eğitimi alarak algoritma mantığı,
                                    nesneye dayalı programlama, web geliştirme ve modern yazılım teknolojileri üzerine
                                    çalışmalar gerçekleştirdi. Eğitim sürecinde farklı programlama dilleri ve proje
                                    geliştirme yaklaşımları hakkında deneyim kazandı.</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-dot empty"></div>
                            <div class="timeline-content">
                                <h4>147№ Texniki Humanitar Liseyi</h4>
                                <div class="major">I GRUP</div>
                                <time>Eylül 2018 - Haziran 2025</time>
                                <p>Mezuniyet Derecesi: 5/5 .
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="skills-lang-row">
                    <div>
                        <h2 class="section-title" style="font-size: 1.1rem;">Teknik Yetkinlikler</h2>
                        <div class="skill-container">
                            <span class="badge-custom">HTML5 / CSS3</span>
                            <span class="badge-custom">JavaScript (ES6+)</span>
                            <span class="badge-custom">React.js</span>
                            <span class="badge-custom">C++</span>
                            <span class="badge-custom">Node.js</span>
                            <span class="badge-custom">Git / GitHub</span>
                            <span class="badge-custom">C#</span>
                            <span class="badge-custom">Python</span>
                            <span class="badge-custom">Database Analysis</span>
                        </div>
                    </div>
                    <div>
                        <h2 class="section-title" style="font-size: 1.1rem;">Yabancı Dil</h2>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">İngilizce</span>
                                <span class="badge bg-light text-dark border">İleri Seviye (C1)</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="fw-medium">Almanca</span>
                                <span class="badge bg-light text-dark border">Başlangıç (A2)</span>
                            </li>
                        </ul>
                    </div>
                </div>
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