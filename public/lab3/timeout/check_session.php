<?php
session_start();
$inactive_limit = 300; // 5 хвилин

if (isset($_SESSION['last_activity'])) {
    if ((time() - $_SESSION['last_activity']) > $inactive_limit) {
        session_unset();     
        session_destroy();   
        echo "<h2>Сесію завершено через неактивність (> 5 хв).</h2><a href='login.php'>Увійти знову</a>";
        exit;
    }
}
$_SESSION['last_activity'] = time();
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Таймаут</title></head>
<body>
    <h2>Привіт, <?php echo htmlspecialchars($_SESSION['user'] ?? 'Гість'); ?>!</h2>
    <p>Сесія активна. Ліміт неактивності — 5 хвилин.</p>
    <p><a href="check_session.php">Оновити сторінку</a> | <a href="login.php">Скинути час</a></p>
</body>
</html>