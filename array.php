<?php
//Функция array_map() возвращает массив
function arrayMapTest($d) {
    return $d * 10;
}
$data = [1, 2, 3, 4, 5, 6];
$result = array_map('arrayMapTest', $data);
print_r ($result);
echo '<br>';

//array_filter — Фильтрует элементы массива
function countOdd($num) {
    if ($num) {
        return $num % 2 === 0;
    } else {
        return $num;
    }

    //return $num % 2 === 0;
}
$array = [1, 2, 3, 4, 5, 6];
print_r (array_filter($array, 'countOdd'));
echo '<br>';

//array_chunk — Разбивает массив на части
function testArrayChunk($array) {
    return array_chunk($array, 3, true);
}
$array = [1, 2, 3, 4, 5, 6];
$result = testArrayChunk($array);
print_r ($result);
echo '<br>';

// in_array — Проверяет, существует ли значение в массиве.
function testInArray($array) {
    if (in_array("Id", $array)){
        return "Id";
    } else {
        return "Значение не найдено в массиве";
    }
}
$array = ["Name", "Login", "Password", "Id"];
$result = testInArray($array);
print_r ($result);
echo '<br>';


//usort — Сортирует массив по значениям через пользовательскую функцию сравнения элементов
function sortTestArray($array) {
    foreach ($array as $value) {
        print_r ('Name' . ' = ' .$value['name']. ', '. 'Email'. ' = ' . $value['email']);
        echo "<br>";
    }
}
$student = [
    [
        'name' => 'Yasha 4',
        'email' => 'yasha@yasha.ru',
        'phone' => '+7(999)999-99-99',
        'age' => 23,
    ],
    [
        'name' => 'Yasha 2',
        'email' => 'yasha@yasha.ru',
        'age' => 21,
    ],
    [
        'name' => 'Yasha 3',
        'email' => 'yasha@yasha.ru',
        'age' => 26,
    ],
];
sortTestArray($student);
echo '<br>';


function sortArray ($a, $b) {
    return $a['age'] <=> $b['age'];
}
usort($student, 'sortArray');
//print_r ($student);
//echo '<br>';
foreach ($student as $user) {
    foreach ($user as $key => $value) {
        echo $key . ' ' . $value . '<br>';
    }
}
echo'<br>';

//implode — Объединяет элементы массива в строку
foreach ($student as $user) {
    foreach ($user as $key => $value) {
        $resultArray = implode(", ", $user);
        var_dump($resultArray);
    }
}
echo '<br>';

//explode — Разбивает строку разделителем
$test = "test, test1, test2, test3, test4, test5, test6, test7', test8";
var_dump (explode(", ", $resultArray));
echo '<br>';
var_dump (explode(", ", $test));
echo '<br>';

//json_encode — Возвращает JSON-представление данных
echo '<br>';
print_r ($jsEncode = (json_encode($student)));

echo '<br>';

//json_decode — Декодирует строку JSON
echo '<br>';
print_r (json_decode($jsEncode, true));
echo '<br>';

// Сортировка пузырьком
echo '<br>';
$data = [20, 39, 50, 120, 6, 5, 4, 1, 2, 3,];
$d = (count($data));
for ($j = 1; $j < $d; $j++) {
    ///print_r ($data);
    echo '<br>';
    for ($i = 0; $i < $d - $j; $i++) {
        if ($data[$i] > $data[$i+1]) {
            $r = $data[$i];
            $data[$i] = $data[$i+1];
            $data[$i+1] = $r;
            //print_r ($r);

        } else {
            $data[$i] = $data[$i];
            //print_r($data);
        }
        //var_dump ($data);
    }
    print_r ($data);
}
