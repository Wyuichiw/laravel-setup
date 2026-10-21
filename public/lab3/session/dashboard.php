<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Кабінет</title></head>
<body>
    <h2>Головна сторінка</h2>
    <p style="color: green;">Вітаємо, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!</p>
    <a href="logout.php"><button style="background: red; color: white;">Вихід</button></a>
</body>
</html>