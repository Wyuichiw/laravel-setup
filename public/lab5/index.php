<?php
// Вмикаємо відображення помилок для відладки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Підключаємо файли через повний шлях від поточної директорії
require_once __DIR__ . '/AccountInterface.php';
require_once __DIR__ . '/BankAccount.php';
require_once __DIR__ . '/SavingsAccount.php';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №5 - ООП в PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.6; }
        .success { color: green; }
        .error { color: red; background: #ffe6e6; padding: 10px; border-radius: 4px; margin-bottom: 10px; }
        .box { background: #f9f9f9; padding: 15px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ddd; }
    </style>
</head>
<body>

    <h2>Лабораторна робота №5: ООП, Інтерфейси та Винятки в PHP</h2>

    <div class="box">
        <h3>1. Робота зі звичайним банківським рахунком (BankAccount)</h3>
        <?php
        try {
            $account = new BankAccount(100.0, "USD");
            echo "<p>Створено рахунок з балансом: <strong>" . $account->getBalance() . " " . $account->getCurrency() . "</strong></p>";

            $account->deposit(50.0);
            echo "<p class='success'>Поповнено на 50. Баланс: " . $account->getBalance() . "</p>";

            $account->withdraw(30.0);
            echo "<p class='success'>Знято 30. Баланс: " . $account->getBalance() . "</p>";

            echo "<p><em>Спроба зняти 500 USD...</em></p>";
            $account->withdraw(500.0);

        } catch (Exception $e) {
            echo "<div class='error'><strong>Виняток піймано:</strong> " . $e->getMessage() . "</div>";
        }
        ?>
    </div>

    <div class="box">
        <h3>2. Перевірка негативних значень (некоректні операції)</h3>
        <?php
        try {
            echo "<p><em>Спроба поповнити рахунок на від'ємну суму (-20)...</em></p>";
            $account->deposit(-20.0);
        } catch (Exception $e) {
            echo "<div class='error'><strong>Виняток піймано:</strong> " . $e->getMessage() . "</div>";
        }
        ?>
    </div>

    <div class="box">
        <h3>3. Робота з накопичувальним рахунком (SavingsAccount)</h3>
        <?php
        try {
            $savings = new SavingsAccount(1000.0, "EUR");
            echo "<p>Створено накопичувальний рахунок з балансом: <strong>" . $savings->getBalance() . " " . $savings->getCurrency() . "</strong></p>";
            echo "<p>Поточна відсоткова ставка: " . (SavingsAccount::$interestRate * 100) . "%</p>";

            $addedInterest = $savings->applyInterest();
            echo "<p class='success'>Нараховано відсотки: +{$addedInterest} EUR. Новий баланс: <strong>" . $savings->getBalance() . " EUR</strong></p>";

        } catch (Exception $e) {
            echo "<div class='error'><strong>Виняток піймано:</strong> " . $e->getMessage() . "</div>";
        }
        ?>
    </div>

</body>
</html>