<?php
//комментарий
/**
 * Авторизация
 * test2
 * test3
 */
//<editor-fold desc="Авторизация">
//</editor-fold>
// функция sayHello(), выводит "Привет!".
function sayHello()
{
    echo "Привет!";
}
sayHello ();
echo '<br>';
echo '<br>';

//функция sum($a, $b), которая возвращает сумму двух чисел.
function sum($a,$b)
{
    echo $a + $b;
}
sum(2,3);
echo '<br>';
echo '<br>';

//функция greet($name = "Гость"), которая выводит приветствие с именем пользователя.
function greet($name = "Гость")
{
    echo 'Привет ' . $name;
}
greet('Артем');
echo '<br>';
echo '<br>';


//анонимная функция, которая умножает число на 2.
$count = function ($a)
{
    echo $a * 2;
};
$result = $count(4);
echo '<br>';
echo '<br>';

//с использованием стрелочной функции.
$count = fn($a) => $a * 2;
echo $count(4);
echo '<br>';
echo '<br>';

//многомерный массив и рекурсивная функция для его обхода.
$array = [
    "users" => [
        "id" => 10101,
        "name" => "Tem",
        "user1" => "User",
        "user2" => "Admin"
    ],
    "numbers" => [
        "age" => 20,
        "number" => 1
    ]
];
function testAround($value, $key)
{
        echo ("$key = $value<br>");
}
$result = array_walk_recursive($array,'testAround');
echo '<br>';

//функция array_map() для применения callback-функции к массиву чисел.(+1)
function sumArray($a)
{
    return (++$a);
}
$countArray = [1, 2, 3, 4, 5];
$results = array_map('sumArray', $countArray );
print_r($results);
echo '<br>';
echo '<br>';

//функция strlen() подсчитывает длину строки,
//strtoupper() все элементы в верхнем регистре,
//strtolower() все элементы в нижнем регистре.
$strResult = 'Hello world!';
echo strlen($strResult),'<br>';
echo strtoupper($strResult),'<br>';
echo strtolower($strResult);
echo '<br>';
echo '<br>';

//функция array_push() добавляет элемент в конец массива.
$functionArray = $array = ['user', 'admin','guest'];
array_push($functionArray, 'user 2', 'guest 2');
print_r ($functionArray);
echo '<br>';
echo '<br>';

// Функция array_pop возвращает последний элемент массива.
$last = array_pop($functionArray);
print_r($last);
echo '<br>';
echo '<br>';

 // Функция array_merge обьединяет несколько массивов.
$lastArray = ['color', 'id', 'age'];
$results = array_merge($functionArray, $lastArray);
print_r($results);
echo '<br>';
echo '<br>';

//функция is_string() возвращает булевое значение true или false.
$values = $array = ['1', 30, 'usr', 25, '20', 1, 'apple'];
foreach ($values as $value) {
    echo $value, " = ";
    echo var_dump(is_string($value)),'<br>';
}
echo '<br>';

//Функция is_numeric() вщзвращает булевое значение число или числовую строку.

$result = $array = [
    11111,
    '0001j34590',
    '2345',
    456960,
    '09397712w',
    '3456e0980-3',
    34,
    '0987123-23-i34',
    49538,
    '098-8901-345'
    ];
foreach ($result as $value) {
    if (is_numeric($value)){
        echo "Число = $value", '<br>';
    } else {
        echo "Не число = $value", '<br>';
    }
}
echo '<br>';

//Функция is_array() возвращает булевое значение, если массив присутствует, то True, если это не массив, то false.
function returnArray($array)
{
    if (is_array($array)) {
        echo "Это массив";
    } else {
       echo "Это не массив";
    }
}
$result = $array = [1, 2, 3];
returnArray($result);
echo '<br>';
echo '<br>';

//функциия abs() возвращает абсолютную величину целого числа или числа с плавающей точкой.
function testNum ($number)
{
    echo var_dump(abs($number));
}
$num = 5.4;
testNum($num);
echo '<br>';
echo '<br>';

// Функция sqrt() возвращает квадратный корень числа.
echo sqrt(9);
echo '<br>';
echo '<br>';

// Функция round() округляет число с плавающей точкой.
$num = 123.567;
var_dump(round($num));
echo '<br>';
var_dump(round($num, 1));
echo '<br>';
var_dump(round($num, 2));
echo '<br>';
var_dump(round($num, -1));
echo '<br>';
var_dump(round($num, -2));
echo '<br>';
echo '<br>';

// Функция ceil() округляет дробное число в большую сторону.
echo ceil(9.5), '<br>';
echo ceil(-4.3), '<br>';

// Функция floor() округдяет дробное значение в меньшую сторону.
echo floor(9.5), '<br>';
echo floor(-4.3), '<br>';
echo '<br>';

// Функция rand() генерирует случайное число, rand(int $min, int $max).
echo rand(1000, 9999), "\n";
echo rand(1000, 9999), "\n";
echo rand(1000, 9999), "\n";
echo rand(1000, 9999), "<br>";
echo rand(1, 30), "/";
echo rand(25, 40), "\n";
echo rand(100, 999), "<br>";
echo '<br>';
echo '<br>';

// Функция mt_rand() Генерирует случайное значение через генератор случайных чисел, быстрее чем rand(), mt_rand(int $min, int $max).
echo mt_rand(), "<br>";
echo mt_rand(-100, 100), "<br>";
echo '<br>';

// Функция date()

// Установка часового пояса по умолчанию
date_default_timezone_set('UTC');

echo $today = date("F j, Y, g:i a"), '<br>';
echo $today = date("m.d.y, H:i.s"), '<br>';
echo $today = date("Y-m-d H:i:s");
echo '<br>';
echo '<br>';

$data =
    [
        'login' => 'user267',
        'password' => 1234567
    ];
function userLogin(...$array)
{
    foreach ($array as $value) {
        return $value;
    }
}
$results = userLogin($data);
//
echo '<br>';
echo $results['login'], '<br>';
echo $results['password'], '<br>';
