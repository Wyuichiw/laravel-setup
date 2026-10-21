<?php
$logFile = __DIR__ . '/log.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_text'])) {
    $text = trim($_POST['user_text']);
    
    if (!empty($text)) {
        $entry = "[" . date("Y-m-d H:i:s") . "] " . $text . "\n";
        file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX);
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Читання та запис у файл</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        pre { background: #f4f4f4; padding: 15px; border: 1px solid #ccc; border-radius: 4px; max-width: 600px; }
    </style>
</head>
<body>
    <h2>Вміст файлу log.txt:</h2>
    
    <pre><?php
    if (file_exists($logFile)) {
        echo htmlspecialchars(file_get_contents($logFile));
    } else {
        echo "Файл log.txt ще порожній або не створений.";
    }
    ?></pre>

    <br>
    <a href="index.html"><button>Повернутися до форм</button></a>
</body>
</html>