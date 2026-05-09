<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Form Sonucu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h2>Form Başarıyla Gönderildi</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            foreach ($_POST as $key => $value) {
                                echo "<tr>";
                                echo "<th class='w-25'>" . htmlspecialchars(ucfirst($key)) . "</th>";
                                
                                if (is_array($value)) {
                                    echo "<td>" . htmlspecialchars(implode(", ", $value)) . "</td>";
                                } else {
                                    echo "<td>" . htmlspecialchars($value) . "</td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2' class='text-danger'>Form verisi bulunamadı.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <a href="iletisim.html" class="btn btn-primary">Geri Dön</a>
            </div>
        </div>
    </div>
</body>
</html>