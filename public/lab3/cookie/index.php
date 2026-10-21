<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = trim($_POST['username']);
    if (!empty($username)) {
        setcookie("user_name", $username, time() + (7 * 24 * 60 * 60), "/");
        header("Location: index.php");
        exit;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    setcookie("user_name", "", time() - 3600, "/");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Cookie</title></head>
<body>
    <h2>Робота з $_COOKIE</h2>
    <?php if (isset($_COOKIE['user_name'])): ?>
        <p style="color: green;">Вітаємо знову, <strong><?php echo htmlspecialchars($_COOKIE['user_name']); ?></strong>!</p>
        <a href="index.php?action=delete"><button>Видалити Cookie</button></a>
    <?php else: ?>
        <form method="POST" action="">
            <label>Введіть ваше ім'я:</label><br>
            <input type="text" name="username" required><br><br>
            <button type="submit">Зберегти</button>
        </form>
    <?php endif; ?>
</body>
</html>