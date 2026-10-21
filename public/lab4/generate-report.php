<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$cacheDir = __DIR__ . '/cache/';
$cacheFile = $cacheDir . 'report.html';
$cacheTime = 600; // 10 хвилин

$isCached = false;

if (!file_exists($cacheDir)) {
    mkdir($cacheDir, 0777, true);
}

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
    $htmlContent = file_get_contents($cacheFile);
    $isCached = true;
} else {
    sleep(3); // Симуляція довгої генерації

    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="uk">
    <head>
        <meta charset="UTF-8">
        <title>Звіт</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            table { width: 100%; border-collapse: collapse; margin-top: 15px; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
            th { background: #f4f4f4; }
        </style>
    </head>
    <body>
        <h2>Згенерований звіт (1000 рядків)</h2>
        <p>Час генерації: <?php echo date("Y-m-d H:i:s"); ?></p>
        <table>
            <tr><th>#</th><th>Ім'я</th><th>Сума (грн)</th><th>Дата</th></tr>
            <?php
            $names = ['Олександр', 'Марія', 'Іван', 'Анна', 'Максим', 'Софія'];
            for ($i = 1; $i <= 1000; $i++) {
                $randName = $names[array_rand($names)];
                $randSum = rand(100, 50000) / 10;
                $randDate = date('Y-m-d', time() - rand(0, 10000000));
                echo "<tr><td>$i</td><td>$randName</td><td>$randSum</td><td>$randDate</td></tr>";
            }
            ?>
        </table>
    </body>
    </html>
    <?php
    $htmlContent = ob_get_clean();
    file_put_contents($cacheFile, $htmlContent);
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Звіт</title></head>
<body style="font-family: Arial, sans-serif; margin: 20px;">
    <div style="padding: 10px; margin-bottom: 15px; background: <?php echo $isCached ? '#d4edda' : '#f8d7da'; ?>;">
        <strong>Статус:</strong> <?php echo $isCached ? "Взято з файлового кешу (швидко без затримки)" : "Згенеровано заново (sleep 3 сек)"; ?>
    </div>
    <a href="index.html">← На головну</a>
    <hr>
    <?php echo $htmlContent; ?>
</body>
</html>