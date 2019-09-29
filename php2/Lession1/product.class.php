<?php
// Задание 1 - Создаем класс
class Product {

// Задание 2 - Создаем свойства класса    
    public $name; // Наименование товара
    public $article; // Артикул товара
    public $price; // Стоимость товар

// Задание 3 - Создаем методы    

    public function view(){
         // реализация метода вывода товара на экран
        echo "<h1>$this->name</h1><p>$this->article</p>";
    }
    public function buy(){
       // реализация метода покупки товара
    }
}
// Задание 4 - Создаем методы    
// Создаем дочерний класс

class ProductСlothes extends Product {
    
    public $size; // добавляем свойства для товара по типа одежда
}

class ProductCar extends Product {
    
    public $model; // добавляем свойства модели для товара по типа автомобили
}

// Задание 5

class A {
        public function foo() {
        static $x = 0;
        echo ++$x;
        }
    }

$a1 = new A();
$a2 = new A();
$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4
//Перенная $x является статичной и она не изменяется при работе с экземлярами класса 


// Задание 6

class A {
        public function foo() {
        static $x = 0;
        echo ++$x;
        }
    }

class B extends A {}

$a1 = new A();
$b1 = new B();
$a1->foo(); // 1 
$b1->foo(); // 1 
$a1->foo(); // 2
$b1->foo(); // 2

// Класса B является наследником Копией) класса A, а следовательно в классе A B переменные не взаимосвязанные


// Задание 7
    class A {
        public function foo() {
        static $x = 0;
        echo ++$x;
        }
    }

class B extends A {}

$a1 = new A;
$b1 = new B;
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
// В данном случае так как мы не передаем никаких аргументов при создание экземпляра класса, то использование () необязательно
