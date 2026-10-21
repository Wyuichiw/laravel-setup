<?php
$uploadDir = __DIR__ . '/uploads/';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список завантажених файлів</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        ul { list-style-type: none; padding: 0; }
        li { padding: 8px 0; border-bottom: 1px solid #eee; width: 400px; display: flex; justify-content: space-between; align-items: center; }
        a.download-btn { background: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 14px; }
        a.download-btn:hover { background: #218838; }
    </style>
</head>
<body>
    <h2>Список файлів у директорії uploads</h2>

    <ul>
        <?php
        if (file_exists($uploadDir)) {
            $files = array_diff(scandir($uploadDir), ['.', '..']);

            if (empty($files)) {
                echo "<li>Папка uploads порожня.</li>";
            } else {
                foreach ($files as $file) {
                    $filePath = 'uploads/' . $file;
                    echo "<li>";
                    echo "<span>" . htmlspecialchars($file) . "</span>";
                    echo '<a class="download-btn" href="' . $filePath . '" download>Завантажити</a>';
                    echo "</li>";
                }
            }
        } else {
            echo "<li>Директорія uploads ще не створена.</li>";
        }
        ?>
    </ul>

    <br>
    <a href="index.html"><button>Повернутися на головну</button></a>
</body>
</html>