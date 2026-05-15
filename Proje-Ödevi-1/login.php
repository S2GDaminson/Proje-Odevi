<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_GET['cikis'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}


if (isset($_SESSION['ogrenci_no'])) {
    header("Location: index.php");
    exit();
}

$hata_mesaji = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($email) && !empty($password)) {


        $pattern = '/^[bgBG]\d+@sakarya\.edu\.tr$/';

        if (preg_match($pattern, $email)) {

            $parcalar = explode('@', $email);
            $ogrenci_no = $parcalar[0];


            if ($password === $ogrenci_no) {
                $_SESSION['ogrenci_no'] = $ogrenci_no;
                header("Location: index.php");
                exit();
            } else {
                $hata_mesaji = "Hatalı şifre! Şifreniz öğrenci numaranız olmalıdır.";
            }
        } else {
            $hata_mesaji = "Geçersiz mail formatı! Mail 'b' veya 'g' ile başlamalı ve @sakarya.edu.tr ile bitmelidir.";
        }
    } else {
        $hata_mesaji = "Lütfen tüm alanları doldurun!";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakarya Üniversitesi - Öğrenci Girişi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 380px;
        }

        h2 {
            text-align: center;
            color: #1a365d;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4a5568;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus {
            border-color: #3182ce;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3182ce;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        button:hover {
            background: #2b6cb0;
        }

        .error {
            color: #9b2c2c;
            background: #fed7d7;
            padding: 12px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
            border: 1px solid #feb2b2;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>Öğrenci Girişi</h2>

        <?php if (!empty($hata_mesaji)): ?>
            <div class="error"><?php echo htmlspecialchars($hata_mesaji); ?></div>
        <?php endif; ?>

        <form id="loginForm" action="login.php" method="POST" onsubmit="return formKontrol()">
            <div class="form-group">
                <label for="email">E-posta</label>
                <input type="text" id="email" name="email" placeholder="b2412100001@sakarya.edu.tr">
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" placeholder="Öğrenci Numaranız">
            </div>
            <button type="submit">Giriş Yap</button>
        </form>
    </div>

    <script>
        function formKontrol() {
            var email = document.getElementById('email').value.trim();
            var password = document.getElementById('password').value.trim();


            if (email === "" || password === "") {
                alert("Lütfen tüm alanları doldurunuz!");
                return false;
            }
            if (password.length != 10) {
                alert("Şifre tam olarak 10 karakter olmalıdır!");
                return false;
            }
            var sakaryaRegex = /^[bgBG]\d+@sakarya\.edu\.tr$/;

            if (!sakaryaRegex.test(email)) {
                alert("Geçersiz format!\n\n1. E-posta öğrenci numaranız ile (b veya g harfiyle) başlamalıdır.\n2. Uzantısı '@sakarya.edu.tr' olmalıdır.\n\nÖrnek: b2412100001@sakarya.edu.tr");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>