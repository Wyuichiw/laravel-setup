<?php
echo "<h1>Лабораторна робота №1</h1>";
echo "<h2>1. Базовий скрипт</h2>";
echo "Hello, World!<br><hr>";


echo "<h2>2. Змінні та типи даних</h2>";
$myString = "Привіт, світ!";      
$myInt = 42;                     
$myFloat = 3.14;                  
$myBool = true;                 

echo "Значення змінних:<br>";
echo "Рядок: $myString<br>";
echo "Ціле число: $myInt<br>";
echo "Число з плаваючою комою: $myFloat<br>";
echo "Булеве значення: " . ($myBool ? 'true' : 'false') . "<br><br>";

echo "Типи змінних (var_dump):<br>";
var_dump($myString); echo "<br>";
var_dump($myInt); echo "<br>";
var_dump($myFloat); echo "<br>";
var_dump($myBool); echo "<hr>";

echo "<h2>3. Конкатенація рядків</h2>";
$part1 = "Національний технічний університет";
$part2 = " «Харківський політехнічний інститут»";
$fullString = $part1 . $part2; 
echo "Об'єднаний рядок: " . $fullString . "<hr>";

echo "<h2>4. Умовні конструкції</h2>";
$number = 7; 
echo "Перевіряємо число: $number<br>";

if ($number % 2 == 0) {
    echo "Число $number є парним.<br>";
} else {
    echo "Число $number є непарним.<br>";
}
echo "<hr>";

echo "<h2>5. Цикли</h2>";

echo "Цикл for (від 1 до 10): ";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br>";

echo "Цикл while (від 10 до 1): ";
$j = 10;
while ($j >= 1) {
    echo $j . " ";
    $j--;
}
echo "<hr>";

echo "<h2>6. Масиви</h2>";

$student = [
    'name' => 'Полина',
    'surname' => 'Коваль',
    'age' => 20,
    'major' => 'Комп\'ютерні науки'
];

echo "Інформація про студента (початковий масив):<br>";
echo "Ім'я: " . $student['name'] . "<br>";
echo "Прізвище: " . $student['surname'] . "<br>";
echo "Вік: " . $student['age'] . "<br>";
echo "Спеціальність: " . $student['major'] . "<br>";

$student['gpa'] = 92.5;

echo "<br>Оновлений масив (з середнім балом):<br>";
echo "<pre>";
print_r($student);
echo "</pre>";
?>