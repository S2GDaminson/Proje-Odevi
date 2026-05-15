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
    <title>İlgi Alanlarım | Film ve Dizi Arşivi</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f3f5f8;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .interests-page {
            padding: 50px 0 70px;
        }

        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 40px;
        }

        .section-badge {
            background: rgba(35, 48, 230, 0.08);
            color: #2330e6;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 6px 18px;
            border-radius: 40px;
            display: inline-block;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
        }

        .section-title {
            font-size: 2.3rem;
            font-weight: 700;
            color: #111214;
            margin-bottom: 12px;
        }

        .section-desc {
            color: #5e6470;
            font-size: 1rem;
            line-height: 1.6;
            max-width: 650px;
            margin: 0 auto;
        }

        .heritage-line {
            width: 70px;
            height: 4px;
            background: #2330e6;
            border-radius: 4px;
            margin: 20px auto 0;
        }

        .search-area {
            max-width: 680px;
            margin: 30px auto 25px;
            position: relative;
        }

        .search-input {
            width: 100%;
            height: 58px;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 0 150px 0 24px;
            font-size: 1rem;
            background: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
            transition: 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: #2330e6;
            box-shadow: 0 0 0 3px rgba(35, 48, 230, 0.1);
        }

        .search-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            height: 42px;
            padding: 0 28px;
            background: #5431d1;
            color: white;
            border: none;
            border-radius: 14px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: 0.2s;
        }

        .search-btn:hover {
            background: #3b1fa6;
        }

        .status-message {
            text-align: center;
            background: white;
            width: fit-content;
            margin: 10px auto 35px;
            padding: 8px 28px;
            border-radius: 40px;
            color: #2c3e66;
            font-size: 0.9rem;
            font-weight: 500;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.02);
            border: 1px solid #eef2ff;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
            margin-top: 10px;
        }

        .movie-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.2s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
            border: 1px solid #edf2f7;
        }

        .movie-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 30px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }

        .poster-wrapper {
            position: relative;
            height: 360px;
            overflow: hidden;
            background: #f1f5f9;
        }

        .poster-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .movie-card:hover .poster-wrapper img {
            transform: scale(1.02);
        }

        .rating {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            color: #facc15;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 5px 12px;
            border-radius: 40px;
        }

        .movie-info {
            padding: 18px 18px 22px;
        }

        .movie-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .movie-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .year {
            background: #f1f5f9;
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 0.8rem;
            color: #334155;
        }

        .type {
            background: rgba(35, 48, 230, 0.08);
            color: #2330e6;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 30px;
            letter-spacing: 0.3px;
        }

        .loader-wrapper {
            grid-column: 1 / -1;
            display: flex;
            justify-content: center;
            padding: 50px;
        }

        .spinner {
            width: 42px;
            height: 42px;
            border: 3px solid #e2e8f0;
            border-top-color: #2330e6;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .empty-box {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 32px;
        }

        .footer-note {
            text-align: center;
            color: #6c757d;
            padding: 30px 0 20px;
            font-size: 0.85rem;
            border-top: 1px solid #e2edf2;
            margin-top: 55px;
        }

        @media (max-width: 700px) {
            .movies-grid {
                gap: 20px;
                grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            }

            .poster-wrapper {
                height: 280px;
            }

            .section-title {
                font-size: 1.9rem;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
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
                    <li><a href="heritage.php">Takımımız</a></li>
                    <li><a href="interests.php" class="active nav">İlgi Alanlarım</a></li>
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
    <main class="interests-page">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <i class="bi bi-collection-play"></i> İZLEDİKLERİM
                </div>
                <h1 class="section-title">Film & Dizi Arşivim</h1>
                <p class="section-desc">
                    Kendi izleme geçmişimden derlediğim yapımlar. Arama kutusu ile keşfedebilirsiniz.
                </p>
                <div class="heritage-line"></div>
            </div>

            <div class="search-area">
                <input type="text" id="searchInput" class="search-input"
                    placeholder="Örnek: Batman, Loki, Attack on Titan, Iron Man ..." autocomplete="off">
                <button class="search-btn" id="searchBtn"><i class="bi bi-search"></i> Ara</button>
            </div>

            <div id="statusMessage" class="status-message">
                Arşiv taranıyor...
            </div>

            <div id="moviesGrid" class="movies-grid">
                <!-- kartlar dinamik -->
            </div>
        </div>
        <div class="footer-note">
            <i class="bi bi-camera-reels"></i> OMDb API · Kişisel izleme listem
        </div>
    </main>

    <script>
        // ---------- API KEY ----------
        const API_KEY = "9e91c7d3";

        // ---------- İZLEME LİSTEM ----------
        const myWatchedList = [
            "Arrow", "The Flash", "Supergirl", "DC's Legends of Tomorrow", "Black Lightning", "Lucifer",
            "Freedom Fighters: The Ray", "Vixen", "Batwoman", "Loki", "Moon Knight", "She-Hulk", "Daredevil",
            "The Punisher", "Iron Fist", "Secret Invasion", "Daredevil: Born Again", "Jessica Jones",
            "Ms. Marvel", "Hawkeye", "WandaVision", "What If...?", "I Am Groot", "Agatha All Along", "Blade",
            "Superman & Lois", "The Sandman", "Smallville", "Titans", "Constantine", "Stargirl", "The Falcon and the Winter Soldier",
            "Iron Man", "Iron Man 2", "Iron Man 3", "Black Panther", "Black Panther: Wakanda Forever",
            "The Avengers", "Avengers: Age of Ultron", "Avengers: Infinity War", "Avengers: Endgame",
            "Justice League: The Flashpoint Paradox", "Justice League: War", "Son of Batman",
            "Justice League: Throne of Atlantis", "Batman vs. Robin", "Batman: Bad Blood",
            "Justice League vs. Teen Titans", "Justice League Dark", "Teen Titans: The Judas Contract",
            "Suicide Squad: Hell to Pay", "The Death of Superman", "Constantine: City of Demons",
            "Reign of the Supermen", "Batman: Hush", "Wonder Woman: Bloodlines", "Justice League Dark: Apokolips War",
            "The Dark Knight", "Man of Steel", "Superman", "The Incredible Hulk", "Hulk", "Thor", "Captain America: The First Avenger",
            "Thor: The Dark World", "Captain America: The Winter Soldier", "Guardians of the Galaxy", "Ant-Man", "Captain America: Civil War",
            "Doctor Strange", "Guardians of the Galaxy Vol. 2", "Spider-Man: Homecoming", "Thor: Ragnarok", "Ant-Man and the Wasp",
            "Captain Marvel", "Spider-Man: Far From Home", "Black Widow", "Shang-Chi and the Legend of the Ten Rings", "Eternals",
            "Spider-Man: No Way Home", "Doctor Strange in the Multiverse of Madness", "Thor: Love and Thunder",
            "The Guardians of the Galaxy Holiday Special", "Ant-Man and the Wasp: Quantumania", "Guardians of the Galaxy Vol. 3",
            "Deadpool & Wolverine", "Thunderbolts", "X-Men", "X2", "X-Men: The Last Stand", "X-Men Origins: Wolverine", "X-Men: First Class",
            "The Wolverine", "X-Men: Days of Future Past", "Deadpool", "X-Men: Apocalypse", "Logan", "Deadpool 2", "Dark Phoenix",
            "The New Mutants",
            "Re:Zero", "Tokyo Ghoul", "Vinland Saga", "Attack on Titan", "Spy x Family", "Jujutsu Kaisen", "Solo Leveling", "Demon Slayer",
            "Miraculous: Tales of Ladybug & Cat Noir", "Death Note"
        ];


        const gridContainer = document.getElementById("moviesGrid");
        const statusEl = document.getElementById("statusMessage");
        const searchInput = document.getElementById("searchInput");
        const searchBtn = document.getElementById("searchBtn");


        window.addEventListener("DOMContentLoaded", () => {
            fetchMovies(myWatchedList);
        });


        searchBtn.addEventListener("click", handleSearch);
        searchInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") handleSearch();
        });


        searchInput.addEventListener("input", () => {
            if (searchInput.value.trim() === "") {
                fetchMovies(myWatchedList);
            }
        });

        function handleSearch() {
            const query = searchInput.value.trim().toLowerCase();
            if (!query) {
                fetchMovies(myWatchedList);
                return;
            }
            const matched = myWatchedList.filter(item => item.toLowerCase().includes(query));
            if (matched.length === 0) {
                gridContainer.innerHTML = `<div class="empty-box"><i class="bi bi-emoji-frown" style="font-size: 2.5rem;"></i><h4 class="mt-3">"${escapeHtml(query)}" arşivimde yok</h4><p>Farklı bir film/dizi adı deneyin.</p></div>`;
                statusEl.innerHTML = `🔍 "${escapeHtml(query)}" için sonuç bulunamadı.`;
                return;
            }
            fetchMovies(matched);
        }


        async function fetchMovies(list) {
            gridContainer.innerHTML = `<div class="loader-wrapper"><div class="spinner"></div><span style="margin-left: 12px;">Yükleniyor...</span></div>`;
            statusEl.innerHTML = `<i class="bi bi-arrow-repeat"></i> ${list.length} yapım taranıyor...`;

            try {
                const limited = list.slice(0, 52);
                const requests = limited.map(title =>
                    fetch(`https://www.omdbapi.com/?t=${encodeURIComponent(title)}&apikey=${API_KEY}`)
                        .then(res => res.json())
                        .catch(() => ({ Response: "False" }))
                );
                const results = await Promise.all(requests);
                const validResults = results.filter(item => item.Response === "True");

                if (validResults.length === 0) {
                    gridContainer.innerHTML = `<div class="empty-box"><i class="bi bi-camera-reels"></i><h4>İçerik bulunamadı</h4></div>`;
                    statusEl.innerHTML = "⚠️ API'den geçerli veri alınamadı.";
                    return;
                }

                renderCards(validResults);
                const searchTerm = searchInput.value.trim();
                if (searchTerm === "") {
                    statusEl.innerHTML = `🎬 Toplam ${validResults.length} yapım gösteriliyor.`;
                } else {
                    statusEl.innerHTML = `🔎 "${escapeHtml(searchTerm)}" için ${validResults.length} sonuç bulundu.`;
                }
            } catch (err) {
                console.error(err);
                gridContainer.innerHTML = `<div class="empty-box"><i class="bi bi-wifi-off"></i><h4>Bağlantı hatası</h4><p>Lütfen daha sonra tekrar deneyin.</p></div>`;
                statusEl.innerHTML = "Hata oluştu, tekrar dene.";
            }
        }


        function renderCards(movies) {
            let html = "";
            for (let m of movies) {
                const poster = (m.Poster && m.Poster !== "N/A") ? m.Poster : "https://placehold.co/500x750?text=Poster+Yok&font=montserrat";
                const rating = (m.imdbRating && m.imdbRating !== "N/A") ? m.imdbRating : "—";
                const year = m.Year || "?";
                const type = (m.Type ? m.Type.toUpperCase() : "YAPIM");
                const title = m.Title || "Bilinmiyor";

                html += `
                <div class="movie-card">
                    <div class="poster-wrapper">
                        <img src="${poster}" alt="${escapeHtml(title)}" loading="lazy" onerror="this.onerror=null; this.src='https://placehold.co/500x750?text=Görsel+Yok';">
                        <div class="rating"><i class="bi bi-star-fill"></i> ${rating}</div>
                    </div>
                    <div class="movie-info">
                        <div class="movie-title">${escapeHtml(title)}</div>
                        <div class="movie-meta">
                            <span class="year"><i class="bi bi-calendar3"></i> ${year}</span>
                            <span class="type">${escapeHtml(type)}</span>
                        </div>
                    </div>
                </div>
            `;
            }
            gridContainer.innerHTML = html;
        }

        function escapeHtml(str) {
            if (!str) return "";
            return str.replace(/[&<>]/g, function (m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            });
        }



    </script>

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