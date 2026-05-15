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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style.css">

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <title>İletişim</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
        }

        .contact-wrapper {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .contact-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: inherit;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        .radio-group,
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 5px;
        }

        .radio-group label,
        .checkbox-group label {
            font-weight: normal;
            display: inline;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-vanilla {
            background-color: #f39c12;
            color: white;
        }

        .btn-vanilla:hover {
            background-color: #d68910;
        }

        .btn-vue {
            background-color: #41b883;
            color: white;
        }

        .btn-vue:hover {
            background-color: #35495e;
        }

        .messages {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            display: none;
        }

        .messages.error {
            display: block;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .messages.success {
            display: block;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
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
                    <li><a href="interests.php">İlgi Alanlarım</a></li>
                    <li><a href="contact.php" class="active nav">İletişim</a></li>
                </ul>
            </nav>

            <div class="account"><span class="account-name"><?php echo htmlspecialchars($giris_yapan_ogrenci); ?><span
                        class="status">Çevrimiçi</span></span>
                <a class="logout-btn" id="logout-btn" href="login.php?cikis=1"><i class="bi bi-box-arrow-right"></i></a>
            </div>
        </div>
    </header>

    <!-- FORM -->
    <div class="contact-wrapper">
        <div id="app" class="contact-container">

            <!DOCTYPE html>
            <html lang="tr">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>İletişim Sayfası</title>
                <!-- Vue.js 3 CDN -->
                <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
                <style>
                    body {
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        background-color: #f4f7f6;
                        display: flex;
                        justify-content: center;
                        padding: 40px 20px;
                        margin: 0;
                    }

                    .contact-container {
                        background-color: #fff;
                        padding: 30px;
                        border-radius: 8px;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                        width: 100%;
                        max-width: 500px;
                    }

                    h2 {
                        text-align: center;
                        color: #333;
                        margin-bottom: 20px;
                    }

                    .form-group {
                        margin-bottom: 15px;
                    }

                    label {
                        display: block;
                        margin-bottom: 5px;
                        font-weight: bold;
                        color: #555;
                    }

                    input[type="text"],
                    input[type="email"],
                    input[type="tel"],
                    select,
                    textarea {
                        width: 100%;
                        padding: 10px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        box-sizing: border-box;
                        font-family: inherit;
                    }

                    textarea {
                        resize: vertical;
                        height: 100px;
                    }

                    .radio-group,
                    .checkbox-group {
                        display: flex;
                        align-items: center;
                        gap: 15px;
                        margin-top: 5px;
                    }

                    .radio-group label,
                    .checkbox-group label {
                        font-weight: normal;
                        display: inline;
                    }

                    .buttons {
                        display: flex;
                        flex-direction: column;
                        gap: 10px;
                        margin-top: 20px;
                    }

                    button {
                        padding: 12px;
                        border: none;
                        border-radius: 4px;
                        font-size: 16px;
                        cursor: pointer;
                        font-weight: bold;
                        transition: background-color 0.3s;
                    }

                    .btn-vanilla {
                        background-color: #f39c12;
                        color: white;
                    }

                    .btn-vanilla:hover {
                        background-color: #d68910;
                    }

                    .btn-vue {
                        background-color: #41b883;
                        color: white;
                    }

                    .btn-vue:hover {
                        background-color: #35495e;
                    }

                    .messages {
                        margin-top: 20px;
                        padding: 10px;
                        border-radius: 4px;
                        display: none;
                    }

                    .messages.error {
                        display: block;
                        background-color: #f8d7da;
                        color: #721c24;
                        border: 1px solid #f5c6cb;
                    }

                    .messages.success {
                        display: block;
                        background-color: #d4edda;
                        color: #155724;
                        border: 1px solid #c3e6cb;
                    }
                </style>
            </head>

            <body>

                <div id="app" class="contact-container">
                    <h2>Bizimle İletişime Geçin</h2>

                    <div id="notificationArea" class="messages" :class="messageClass" v-show="showMessage">
                        <ul v-if="errors.length > 0">
                            <li v-for="err in errors">{{ err }}</li>
                        </ul>
                        <div v-else>{{ successMessage }}</div>
                    </div>

                    <form id="contactForm">
                        <div class="form-group">
                            <label for="fullName">Ad Soyad</label>
                            <input type="text" id="fullName" v-model="formData.fullName"
                                placeholder="Adınız ve Soyadınız">
                        </div>

                        <div class="form-group">
                            <label for="email">E-posta</label>
                            <input type="email" id="email" v-model="formData.email" placeholder="ornek@mail.com">
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefon Numarası</label>
                            <input type="tel" id="phone" v-model="formData.phone" placeholder="Örn: 05551234567">
                        </div>

                        <div class="form-group">
                            <label for="subject">Konu</label>
                            <select id="subject" v-model="formData.subject">
                                <option value="">Lütfen bir konu seçin</option>
                                <option value="Destek">Teknik Destek</option>
                                <option value="Satis">Satış</option>
                                <option value="Diger">Diğer</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Cinsiyet (Opsiyonel)</label>
                            <div class="radio-group">
                                <label><input type="radio" name="gender" value="Kadin" v-model="formData.gender">
                                    Kadın</label>
                                <label><input type="radio" name="gender" value="Erkek" v-model="formData.gender">
                                    Erkek</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message">Mesajınız</label>
                            <textarea id="message" v-model="formData.message"
                                placeholder="Mesajınızı buraya yazın..."></textarea>
                        </div>

                        <div class="form-group checkbox-group">
                            <input type="checkbox" id="terms" v-model="formData.terms">
                            <label for="terms">Kullanım koşullarını okudum ve kabul ediyorum.</label>
                        </div>

                        <div class="buttons">
                            <button type="button" class="btn-vanilla" onclick="validateWithVanillaJS()">Saf (Vanilla) JS
                                ile Denetle ve Gönder</button>

                            <button type="button" class="btn-vue" @click="validateWithVue">Vue.js ile Denetle ve
                                Gönder</button>
                        </div>
                    </form>
                </div>

                <script>

                    // Vanilla

                    function validateWithVanillaJS() {
                        const errors = [];
                        const fullName = document.getElementById('fullName').value.trim();
                        const email = document.getElementById('email').value.trim();
                        const phone = document.getElementById('phone').value.trim();
                        const subject = document.getElementById('subject').value;
                        const message = document.getElementById('message').value.trim();
                        const terms = document.getElementById('terms').checked;

                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        const phoneRegex = /^[0-9]{10,11}$/;

                        if (fullName === "") errors.push("Vanilla JS: Ad Soyad alanı boş bırakılamaz.");

                        if (email === "") {
                            errors.push("Vanilla JS: E-posta alanı boş bırakılamaz.");
                        } else if (!emailRegex.test(email)) {
                            errors.push("Vanilla JS: Geçerli bir e-posta adresi giriniz.");
                        }

                        if (phone === "") {
                            errors.push("Vanilla JS: Telefon alanı boş bırakılamaz.");
                        } else if (!phoneRegex.test(phone)) {
                            errors.push("Vanilla JS: Telefon numarası sadece rakamlardan oluşmalı ve 10-11 hane olmalıdır.");
                        }

                        if (subject === "") errors.push("Vanilla JS: Lütfen bir konu seçiniz.");
                        if (message === "") errors.push("Vanilla JS: Mesaj alanı boş bırakılamaz.");
                        if (!terms) errors.push("Vanilla JS: Kullanım koşullarını kabul etmelisiniz.");

                        const notificationArea = document.getElementById('notificationArea');
                        notificationArea.style.display = 'block';

                        if (errors.length > 0) {
                            notificationArea.className = 'messages error';
                            notificationArea.innerHTML = '<ul>' + errors.map(err => `<li>${err}</li>`).join('') + '</ul>';
                        } else {
                            notificationArea.className = 'messages success';
                            notificationArea.innerHTML = '<div>Vanilla JS: Form başarıyla doğrulandı ve gönderildi!</div>';
                            document.getElementById('contactForm').reset();
                        }
                    }


                    // VUE.JS

                    const { createApp } = Vue;

                    createApp({
                        data() {
                            return {
                                formData: {
                                    fullName: '',
                                    email: '',
                                    phone: '',
                                    subject: '',
                                    gender: '',
                                    message: '',
                                    terms: false
                                },
                                errors: [],
                                showMessage: false,
                                successMessage: ''
                            }
                        },
                        computed: {
                            messageClass() {
                                return this.errors.length > 0 ? 'error' : 'success';
                            }
                        },
                        methods: {
                            validateWithVue() {
                                this.errors = [];
                                this.showMessage = true;

                                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                const phoneRegex = /^[0-9]{10,11}$/;

                                if (!this.formData.fullName.trim()) this.errors.push("Vue.js: Ad Soyad alanı boş bırakılamaz.");

                                if (!this.formData.email.trim()) {
                                    this.errors.push("Vue.js: E-posta alanı boş bırakılamaz.");
                                } else if (!emailRegex.test(this.formData.email)) {
                                    this.errors.push("Vue.js: Geçerli bir e-posta adresi giriniz.");
                                }

                                if (!this.formData.phone.trim()) {
                                    this.errors.push("Vue.js: Telefon alanı boş bırakılamaz.");
                                } else if (!phoneRegex.test(this.formData.phone)) {
                                    this.errors.push("Vue.js: Telefon numarası sadece rakamlardan oluşmalı ve 10-11 hane olmalıdır.");
                                }

                                if (!this.formData.subject) this.errors.push("Vue.js: Lütfen bir konu seçiniz.");
                                if (!this.formData.message.trim()) this.errors.push("Vue.js: Mesaj alanı boş bırakılamaz.");
                                if (!this.formData.terms) this.errors.push("Vue.js: Kullanım koşullarını kabul etmelisiniz.");

                                if (this.errors.length === 0) {
                                    this.successMessage = "Vue.js: Form başarıyla doğrulandı ve gönderildi!";
                                    this.resetForm();
                                }
                            },
                            resetForm() {
                                this.formData = {
                                    fullName: '',
                                    email: '',
                                    phone: '',
                                    subject: '',
                                    gender: '',
                                    message: '',
                                    terms: false
                                };
                            }
                        }
                    }).mount('#app');
                </script>

        </div>
    </div>

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