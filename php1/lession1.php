<?php
/*
*Используя только две переменные, поменяйте их значение местами. 
*Например, если a = 1, b = 2, надо, чтобы получилось: b = 1, a = 2. Дополнительные переменные использовать нельзя.
*/

$a = mt_rand(10, 100);

$b = mt_rand(10, 100);

echo "Переменная a = {$a}, а переменная b = {$b}";
echo "<br>";

$a = $a + $b; //15 
$b = $a - $b; // 5
$a = $a -$b;

echo "Переменная a = {$a}, а переменная b = {$b}";


?>