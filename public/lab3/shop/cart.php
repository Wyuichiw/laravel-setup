<?php
session_start();
if (!isset($_SESSION['cart'])) { 
    $_SESSION['cart'] = []; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product'])) {
    $product = trim($_POST['product']);
    if (!empty($product)) {
        $_SESSION['cart'][] = $product;
        $previous = isset($_COOKIE['previous_purchases']) ? json_decode($_COOKIE['previous_purchases'], true) : [];
        $previous[] = $product;
        setcookie('previous_purchases', json_encode(array_unique($previous)), time() + 86400, "/");
        header("Location: cart.php");
        exit;
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    $_SESSION['cart'] = [];
    header("Location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Кошик</title></head>
<body>
    <h2>Кошик (Сесії + Cookie)</h2>
    <form method="POST" action="">
        <select name="product">
            <option value="Смартфон">Смартфон</option>
            <option value="Ноутбук">Ноутбук</option>
            <option value="Навушники">Навушники</option>
        </select>
        <button type="submit">Додати</button>
    </form>
    <h3>Поточний кошик:</h3>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item) echo "<li>" . htmlspecialchars($item) . "</li>"; ?>
    </ul>
    <?php if (!empty($_SESSION['cart'])): ?><a href="cart.php?action=clear">Очистити кошик</a><?php endif; ?>
    <h3>Попередні покупки (з Cookie):</h3>
    <ul>
        <?php 
        if (isset($_COOKIE['previous_purchases'])) {
            foreach (json_decode($_COOKIE['previous_purchases'], true) as $p) {
                echo "<li>" . htmlspecialchars($p) . "</li>";
            }
        }
        ?>
    </ul>
</body>
</html>