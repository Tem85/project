<?php
// необходимо найти общие пересечения и соединить их
// многомерный массив
$lastArray = [[1,3], [2,7], [9,11], [10,20]];
//$lastArray = [];
//array_walk_recursive($arrays, function ($item) use (&$lastArray) {
//    $lastArray[] = $item; // Сохраняется каждый элемент
//});
//sort($lastArray);
usort($lastArray, fn($a, $b) => $a <=> $b);
//print_r($lastArray);
echo '<br>';
$lastArrayNewMerge = [];
$lastArrayStart = $lastArray[0][0];
$lastArrayEnd = $lastArray[0][1];

foreach ($lastArray as $item) {
    if ($item[0] <= $lastArrayEnd + 1) {
        $lastArrayEnd = max($lastArrayEnd, $item[1]);
        //print_r($lastArrayEnd);
    } else {
        $lastArrayNewMerge[] = [$lastArrayStart, $lastArrayEnd];
        $lastArrayStart = $item[0];
        $lastArrayEnd = $item[1];
        //print_r($lastArrayEnd);
    }
}
$lastArrayNewMerge[] = [$lastArrayStart, $lastArrayEnd];
print_r(json_encode($lastArrayNewMerge));
