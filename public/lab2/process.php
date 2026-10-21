<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$uploadDir = __DIR__ . '/uploads/';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['uploaded_file'])) {
        $file = $_FILES['uploaded_file'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            die("Помилка завантаження файлу. Код помилки: " . $file['error']);
        }

        if (!is_uploaded_file($file['tmp_name'])) {
            die("Помилка: Файл не було завантажено.");
        }

        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        $fileType = mime_content_type($file['tmp_name']);
        
        if (!in_array($fileType, $allowedTypes)) {
            die("Помилка: Дозволено завантажувати лише зображення PNG, JPG або JPEG!");
        }

        $maxSize = 2 * 1024 * 1024; // 2 MB
        if ($file['size'] > $maxSize) {
            die("Помилка: Розмір файлу перевищує 2 МБ!");
        }

        $fileName = basename($file['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (file_exists($targetFilePath)) {
            $fileInfo = pathinfo($fileName);
            $fileName = $fileInfo['filename'] . '_' . time() . '.' . $fileInfo['extension'];
            $targetFilePath = $uploadDir . $fileName;
        }

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            $fileSizeKb = round($file['size'] / 1024, 2);
            
            echo "<h2>Файл успішно завантажено!</h2>";
            echo "<ul>";
            echo "<li><strong>Ім'я файлу:</strong> " . htmlspecialchars($fileName) . "</li>";
            echo "<li><strong>Тип файлу:</strong> " . htmlspecialchars($fileType) . "</li>";
            echo "<li><strong>Розмір файлу:</strong> " . $fileSizeKb . " КБ</li>";
            echo "</ul>";
            
            $downloadLink = 'uploads/' . $fileName;
            echo '<br><a href="' . $downloadLink . '" download><button>Завантажити файл назад</button></a>';
            echo '<br><br><a href="index.html">Повернутися на головну</a>';
        } else {
            echo "Помилка при збереженні файлу на сервері.";
        }
    } else {
        echo "Файл не передано.";
    }
} else {
    header("Location: index.html");
    exit;
}
?>