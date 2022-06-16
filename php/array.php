<?php
date_default_timezone_set('Asia/Shanghai');
echo date("H:i:s") . "<br>";
$number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16);
print_r($number);
echo "<br>";
//随机取一个下标
$index = array_rand($number, 1);
echo $number[$index] . "<br>";
//使用原始的随机数生成器也可以实现随机整数
echo rand(0, count($number) - 1) . "<br>";
//数组去重
$grade = array(88, 98, 78, 86, 98, 45, 45, 65, 35, 42, 85, 62);
$new = array_unique($grade);
print_r($new);
echo "<br>";

//排序
sort($grade);
for ($i = 0; $i < count($grade) - 1; $i++) {
    echo $grade[$i];
}
echo "<br>";
foreach ($grade as $g) {
    echo $g . "<br>";
}
//把一个字符串打成数组
$source = "TYpasdouiahwd.diuaehsdasklhjdkdalkj55646";
$myArray= explode(".",$source);
print_r($myArray);
echo "<br>";
//把数组合并成字符串
$grade = array(87,987,543,545,6346,126);
$myResult = implode("",$grade);
echo $myResult;