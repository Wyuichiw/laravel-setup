<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = trim($_POST['name'] ?? '');
    $surname = trim($_POST['surname'] ?? '');


    if (empty($name) || empty($surname)) {
        echo "<h3>Помилка: Поля не можуть бути порожніми!</h3>";
        echo '<a href="index.html">Повернутися назад</a>';
    } else {

        $name = htmlspecialchars($name);
        $surname = htmlspecialchars($surname);

        echo "<h2>Привіт, $name $surname!</h2>";
        echo "<p>Ваші дані успішно оброблено.</p>";
        echo '<br><a href="index.html">Заповнити форму знову</a>';
    }
} else {
    echo "Помилка доступу. Будь ласка, скористайтеся формою.";
    echo '<br><a href="index.html">Перейти до форми</a>';
}
?>