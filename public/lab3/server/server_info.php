<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && isset($_GET['check_post'])) {
    header("Location: server_info.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Server Info</title></head>
<body>
    <h2>Інформація з масиву $_SERVER</h2>
    <ul>
        <li><strong>IP-адреса клієнта:</strong> <?php echo $_SERVER['REMOTE_ADDR'] ?? ''; ?></li>
        <li><strong>Браузер (User-Agent):</strong> <?php echo htmlspecialchars($_SERVER['HTTP_USER_AGENT'] ?? ''); ?></li>
        <li><strong>Назва скрипта (PHP_SELF):</strong> <?php echo htmlspecialchars($_SERVER['PHP_SELF'] ?? ''); ?></li>
        <li><strong>Метод запиту:</strong> <?php echo $_SERVER['REQUEST_METHOD'] ?? ''; ?></li>
        <li><strong>Шлях до файлу:</strong> <?php echo htmlspecialchars($_SERVER['SCRIPT_FILENAME'] ?? ''); ?></li>
    </ul>
    <a href="server_info.php?check_post=1">Тест перенаправлення (GET)</a>
    <form method="POST" action="" style="margin-top: 15px;">
        <button type="submit">Надіслати POST запит</button>
    </form>
</body>
</html>