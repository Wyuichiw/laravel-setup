<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$cacheLifetime = 600; 
$source = "";
$data = [];

if (isset($_SESSION['cached_data']) && isset($_SESSION['cached_time'])) {
    $age = time() - $_SESSION['cached_time'];
    if ($age < $cacheLifetime) {
        $data = $_SESSION['cached_data'];
        $source = "Взято з кешу сесії (минуло секунд: $age)";
    } else {
        $data = generateData();
        $_SESSION['cached_data'] = $data;
        $_SESSION['cached_time'] = time();
        $source = "Оновлено кеш сесії (минув час)";
    }
} else {
    $data = generateData();
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    $source = "Створено новий кеш сесії";
}

function generateData() {
    sleep(2); // Симуляція затримки
    return [
        'USD' => rand(3500, 3700) / 100,
        'EUR' => rand(3800, 4100) / 100,
        'PLN' => rand(850, 950) / 100
    ];
}

if (isset($_GET['clear'])) {
    unset($_SESSION['cached_data'], $_SESSION['cached_time']);
    header("Location: session-cache.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Кеш у сесії</title></head>
<body style="font-family: Arial, sans-serif; margin: 40px;">
    <h2>Курси валют (Кешування через $_SESSION)</h2>
    <p><strong>USD:</strong> <?php echo $data['USD']; ?> грн | <strong>EUR:</strong> <?php echo $data['EUR']; ?> грн | <strong>PLN:</strong> <?php echo $data['PLN']; ?> грн</p>
    <p style="color: green;"><strong>Джерело:</strong> <?php echo $source; ?></p>
    <br>
    <a href="session-cache.php"><button>Оновити сторінку</button></a> 
    <a href="?clear=1"><button style="background: #dc3545; color: white; border: none; padding: 5px 10px;">Очистити кеш сесії</button></a>
    <br><br>
    <a href="index.html">← На головну</a>
</body>
</html>