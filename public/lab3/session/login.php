<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($login === 'admin' && $password === '12345') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $login;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Невірний логін або пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Вхід</title></head>
<body>
    <h2>Форма входу (Сесії)</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Логін (admin):</label><br>
        <input type="text" name="login" required><br><br>
        <label>Пароль (12345):</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Увійти</button>
    </form>
</body>
</html>