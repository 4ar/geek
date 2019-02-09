<?php
/* 1. Объявить две целочисленные переменные $a и $b и задать им 
*произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
*    если $a и $b положительные, вывести их разность;
*    если $а и $b отрицательные, вывести их произведение;
*    если $а и $b разных знаков, вывести их сумму;
*    *ноль можно считать положительным числом.
*/      


$a = mt_rand(-100, 100);

$b = mt_rand(-100, 100);

if ($a >= 0 && $b >= 0 ) {
    $znak = '-'; 
    $result = $a - $b;

} elseif ($a < 0 && $b < 0) {
    $znak = '*'; 
    $result = $a * $b;

} else {
    $znak = '+'; 
    $result = $a + $b;
}


echo "Результат {$a} {$znak} {$b} = $result" ;


/* *2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.  */

echo "<hr>";

$a = mt_rand(0, 15);
echo "a = {$a} <br>";
switch($a) {
    case 0:
        echo $a++ ;
    case 1:
        echo $a++ ;
    case 2:
        echo $a++ ;
    case 3:
        echo $a++;  
    case 4:
        echo $a++;
    case 5:
        echo $a++;
    case 6:
        echo $a++;
    case 7:
        echo $a++;
    case 8:
        echo $a++;
    case 9:
        echo $a++;
    case 10:
        echo $a++;
    case 11:
        echo $a++;
    case 12:
        echo $a++;
    case 13:
        echo $a++;
    case 14:
        echo $a++;
    case 15:
        echo $a++; 

};
 
echo "<hr>";

/* *3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return. */
function summ ($x, $y) {
    
    $result = $x + $y;
    return $result;
};

function minus ($x, $y) {
  
    $result = $x - $y;
    return $result;
};

function multi ($x, $y) {
  
    $result = $x * $y;
    return $result;
};

function del ($x, $y) {

    $result = ($y == 0 ? 'на ноль делить нельзя' : $x / $y);
    return $result;
};

/*
*4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 –
* значения аргументов, $operation – строка с названием операции. В зависимости от переданного
 *значения операции выполнить одну из арифметических операций (использовать функции из пункта 3)
* и вернуть полученное значение (использовать switch).
*/

function mathOperation($arg1, $arg2, $operation) {

    switch($operation){

        case "+":
            $result = summ($arg1, $arg2);
            break;
        
        case "-":
            $result = minus($arg1, $arg2);
            break;

        case "*":
            $result = multi($arg1, $arg2);
            break;

         case "/":
            $result = del($arg1, $arg2);
            break;
    }; 
    return $result;

};

$arg1 = 10;
$arg2 = 0;
$operation = "/";

$result = mathOperation($arg1, $arg2, $operation);

echo "{$arg1} {$operation} {$arg2} = {$result}";

echo "<hr>";


/* *6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень. */

function power($val, $pow) {

     if ($pow == 0 ) {
         return 1;
     } else {
       $result = $val * power($val, $pow-1);
       return $result;
     };

};

$result = power(4, 4);

echo $result;

echo "<hr>";

 /* 
*7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:*
*
*22 часа 15 минут
*21 час 43 минуты
*1, 21 час 
*2, 2, 3, 22, 23, часа
*5 - 20 , 0 часов

1 минута
2 3 4  минуты 
5 6 7 минут
*/


$chas = date("G");

$minut = date("i");

function time2($hour, $min) {

    if ($hour == 21 ||  $hour == 1  ) {
        $h = "час"; 
    }
    elseif ($hour== 2 || $hour == 3 ||  $hour == 4 || $hour == 22 ||  $hour == 23) {
        $h  = "часа"; 
    } 
    else {
        $h  = "часов"; 
    };
    
    if ($min == 1 ) {
       $m = "минута"; 
    }
    elseif ($min == 2|| $min == 3 || $min == 4){
        $m = "минуты"; 
    } 
    else {
        $m = "минут"; 
    };

    return $time = "{$hour} {$h} : {$min} {$m}";
};

$time = time2($chas, $minut);

echo $time;
