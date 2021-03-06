<?php
$p1 = [
    'name' => 'Bill',
    'age' => 27,
    'gender' => 'male',
];

$p2 = $p1;
$p3 = &$p1; // '&' 是告訴程式不要另外複製一個array，完全參照同一個參數

$p1['name'] = '比爾';
$p2['age'] = 35;
$p3['gender'] = '男性';

// 輸出
// $p2: {"name":"Bill","age":35,"gender":"male"}
// $p1: {"name":"比爾","age":27,"gender":"男性"}
// $p3: {"name":"比爾","age":27,"gender":"男性"}

echo '$p2: ';
echo json_encode($p2, JSON_UNESCAPED_UNICODE) . '<br>';
echo '$p1: ';
echo json_encode($p1, JSON_UNESCAPED_UNICODE) . '<br>';
echo '$p3: ';
echo json_encode($p3, JSON_UNESCAPED_UNICODE) . '<br>';
